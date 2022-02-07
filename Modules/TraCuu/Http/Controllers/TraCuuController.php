<?php

namespace Modules\TraCuu\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\CanBo;
use DB;
use Modules\Admin\Entities\ChucVu;
use Modules\Admin\Entities\ChucVuHienTai;
use Modules\Admin\Entities\CongViecChuyenMon;
use Modules\Admin\Entities\TonGiao;
use Modules\Admin\Entities\TrangThai;

class TraCuuController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $ten = $request->ten_cb;
        $cmt = $request->cmt;
        $the_dang = $request->the_dang;
        $ngayVaoDang = formatYMD($request->start_date);
        $chuc_vu_dang = $request->chuc_vu_dang;
        $trinh_do_chuyen_mon = $request->trinh_do_chuyen_mon;
        $hoc_ham = $request->hoc_ham;
        $ton_giao = $request->ton_giao;
        $tinh_trang = $request->tinh_trang;
        $chuc_vu_chinh = $request->chuc_vu_chinh;
        $chucVuDang = ChucVu::orderBy('ten_chuc_vu','asc')->get();
        $congViecChuyenMon = CongViecChuyenMon::orderBy('ten','asc')->get();
        $chucVuHienTai = ChucVuHienTai::orderBy('ten','asc')->get();
        $trangThai = TrangThai::orderBy('ten','asc')->get();
        $tonGiao = TonGiao::orderBy('ten','asc')->get();
        $danhSach = CanBo::
            where(function ($query) use ($ten) {
                if (!empty($ten)) {
                    return $query->where(DB::raw('lower(ho_ten)'), 'LIKE', "%" . mb_strtolower($ten) . "%");
                }
            })
            ->where(function ($query) use ($cmt) {
                if (!empty($cmt)) {
                    return $query->where(DB::raw('lower(cmnd)'), 'LIKE', "%" . mb_strtolower($cmt) . "%");
                }
            })
            ->where(function ($query) use ($ton_giao) {
                if (!empty($ton_giao)) {
                    return $query->where(DB::raw('lower(ton_giao)'), 'LIKE', "%" . mb_strtolower($ton_giao) . "%");
                }
            })
            ->where(function ($query) use ($tinh_trang) {
                if (!empty($tinh_trang)) {
                    return $query->where(DB::raw('lower(trang_thai_cb)'), 'LIKE', "%" . mb_strtolower($tinh_trang) . "%");
                }
            })
            ->where(function ($query) use ($chuc_vu_chinh) {
                if (!empty($chuc_vu_chinh)) {
                    return $query->where(DB::raw('lower(chuc_vu_hien_tai)'), 'LIKE', "%" . mb_strtolower($chuc_vu_chinh) . "%");
                }
            })
            ->where(function ($query) use ($trinh_do_chuyen_mon) {
                if (!empty($trinh_do_chuyen_mon)) {
                    return $query->where(DB::raw('lower(trinh_do_1)'), 'LIKE', "%" . mb_strtolower($trinh_do_chuyen_mon) . "%");
                }
            })
            ->where(function ($query) use ($ngayVaoDang) {
                if (!empty($ngayVaoDang)) {
                    return $query->where(DB::raw('lower(ngay_vao_dang_chinh_thuc)'), 'LIKE', "%" . mb_strtolower($ngayVaoDang) . "%");
                }
            })
            ->where(function ($query) use ($chuc_vu_dang) {
                if (!empty($chuc_vu_dang)) {
                    return $query->where(DB::raw('lower(chuc_vu_cao_nhat)'), 'LIKE', "%" . mb_strtolower($chuc_vu_dang) . "%");
                }
            })
            ->where(function ($query) use ($the_dang) {
                if (!empty($the_dang)) {
                    return $query->where(DB::raw('lower(so_the_dang)'), 'LIKE', "%" . mb_strtolower($the_dang) . "%");
                }
            })
            ->paginate(10);
        return view('tracuu::index',compact('danhSach','chucVuDang','congViecChuyenMon','chucVuHienTai','trangThai','tonGiao'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('tracuu::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('tracuu::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('tracuu::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
