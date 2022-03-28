<?php

namespace Modules\ChinhSach\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\Admin\Entities\ChinhSach;
use Modules\Admin\Entities\VanBan;
use DB,File, auth;

class ChinhSachController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $chinhSach = ChinhSach::all();
        $id = $request->id;
        $chinhSachfisst=null;
        if($id)
        {
            $chinhSachfisst = ChinhSach::where('id',$id)->first();
        }
        $title = 'Chế độ chính sách > Các chính sách';
        return view('chinhsach::chinh-sach.index',compact('chinhSach','chinhSachfisst','title'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('chinhsach::create');
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
            $vanbandv = new ChinhSach();
            $vanbandv->ten_chinh_sach = $request->ten_chinh_sach;
            $vanbandv->tu_ngay = !empty($request->tu_ngay) ? formatYMD($request->tu_ngay) : null;
            $vanbandv->den_ngay = !empty($request->den_ngay) ? formatYMD($request->den_ngay) : null;
            $vanbandv->nguoi_tao = auth::user()->id;
            $vanbandv->save();

            $uploadPath = UPLOAD_FILE_CHINH_SACH;
            if ($filevanban && count($filevanban) > 0) {
                foreach ($filevanban as $key => $getFile) {
                    if (!File::exists($uploadPath)) {
                        File::makeDirectory($uploadPath, 0777, true, true);
                    }
                    $fileName = date('Y_m_d') . '_' . Time() . '_' . $getFile->getClientOriginalName();
                    $urlFile = UPLOAD_FILE_CHINH_SACH . '/' . $fileName;
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
        $vanbandv =  ChinhSach::where('id',$id)->first();
        $vanbandv->ten_chinh_sach = $request->ten_chinh_sach;
        $vanbandv->tu_ngay = !empty($request->tu_ngay) ? formatYMD($request->tu_ngay) : null;
        $vanbandv->den_ngay = !empty($request->den_ngay) ? formatYMD($request->den_ngay) : null;
        $vanbandv->save();
        return redirect()->route('chinh-sach.index')->with('success', 'Cập nhật chính sách thành công !');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        ChinhSach::where('id',$id)->delete();
        return redirect()->back()->with('success', 'Xóa văn bản thành công !');
    }
}
