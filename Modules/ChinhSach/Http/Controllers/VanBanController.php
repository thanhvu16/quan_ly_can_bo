<?php

namespace Modules\ChinhSach\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\VanBan;
use DB,File, auth;

class VanBanController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $vanBan = VanBan::all();
        $id = $request->id;
        $vanBanfisst=null;
        if($id)
        {
            $vanBanfisst = VanBan::where('id',$id)->first();
        }
        return view('chinhsach::van-ban-quy-dinh.index',compact('vanBan','vanBanfisst'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {

        return view('chinhsach::van-ban-quy-dinh.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $filevanban = !empty($request['File']) ? $request['File'] : null;
        try {
            DB::beginTransaction();
            $vanbandv = new VanBan();
            $vanbandv->so_ky_hieu = $request->so_ky_hieu;
            $vanbandv->ngay_ban_hanh = !empty($request->ngay_ban_hanh) ? formatYMD($request->ngay_ban_hanh) : null;
            $vanbandv->co_quan_ban_hanh = $request->co_quan_ban_hanh;
            $vanbandv->trich_yeu = $request->trich_yeu;
            $vanbandv->nguoi_ky = $request->nguoi_ky;
            $vanbandv->nguoi_tao = auth::user()->id;
            $vanbandv->save();

            $uploadPath = UPLOAD_FILE_VAN_BAN;
            if ($filevanban && count($filevanban) > 0) {
                foreach ($filevanban as $key => $getFile) {
                    if (!File::exists($uploadPath)) {
                        File::makeDirectory($uploadPath, 0777, true, true);
                    }
                    $fileName = date('Y_m_d') . '_' . Time() . '_' . $getFile->getClientOriginalName();
                    $urlFile = UPLOAD_FILE_VAN_BAN . '/' . $fileName;
                    $getFile->move($uploadPath, $fileName);
                    $vanbandv->file = $urlFile;
                    $vanbandv->save();
                }
            }

            DB::commit();
            return redirect()->back()->with('success', 'Thêm văn bản thành công !');

        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('chinhsach::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('chinhsach::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $vanbandv =  VanBan::where('id',$id)->first();
        $vanbandv->so_ky_hieu = $request->so_ky_hieu;
        $vanbandv->ngay_ban_hanh = !empty($request->ngay_ban_hanh) ? formatYMD($request->ngay_ban_hanh) : null;
        $vanbandv->co_quan_ban_hanh = $request->co_quan_ban_hanh;
        $vanbandv->trich_yeu = $request->trich_yeu;
        $vanbandv->nguoi_ky = $request->nguoi_ky;
        $vanbandv->save();
        return redirect()->route('van-ban-quy-dinh.index')->with('success', 'Cập nhật văn bản thành công !');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        VanBan::where('id',$id)->delete();
        return redirect()->back()->with('success', 'Xóa văn bản thành công !');
    }
}
