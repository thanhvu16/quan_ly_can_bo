<?php

namespace Modules\ChinhSach\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\ChinhSach;
use Modules\Admin\Entities\ChiTra;
use Modules\Admin\Entities\DoiTuongQuanLy;
use DB,File, auth;

class ChitraChinhSachController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $doiTuongChinhSach = DoiTuongQuanLy::orderBy('ten','asc')->get();
        $chinhSach = ChiTra::all();
        $id = $request->id;
        $chinhSachfisst=null;
        if($id)
        {
            $chinhSachfisst = ChiTra::where('id',$id)->first();
        }
        return view('chinhsach::chi-tra.index',compact('doiTuongChinhSach','chinhSachfisst','chinhSach'));
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
            $vanbandv = new ChiTra();
            $vanbandv->noi_dung_chi_tra = $request->noi_dung_chi_tra;
            $vanbandv->doi_tuong = $request->doi_tuong;
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
            return redirect()->back()->with('success', 'Thêm chính sách thành công !');

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
        $vanbandv =  ChiTra::where('id',$id)->first();
        $vanbandv->noi_dung_chi_tra = $request->noi_dung_chi_tra;
        $vanbandv->doi_tuong = $request->doi_tuong;
        $vanbandv->save();
        return redirect()->route('chi-tra-chinh-sach.index')->with('success', 'Cập nhật thành công !');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        ChiTra::where('id',$id)->delete();
        return redirect()->back()->with('success', 'Xóa thành công !');
    }
}
