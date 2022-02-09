<?php

namespace Modules\TraCuu\Http\Controllers;

use App\Exports\CanBoExort;
use App\Exports\VanbandenExport;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\BacHeSoLuong;
use Modules\Admin\Entities\BinhBauPhanLoaiCanBo;
use Modules\Admin\Entities\CanBo;
use DB, Excel;
use Modules\Admin\Entities\ChucVu;
use Modules\Admin\Entities\ChucVuHienTai;
use Modules\Admin\Entities\ChuyenNganhDaoTao;
use Modules\Admin\Entities\CongViecChuyenMon;
use Modules\Admin\Entities\DonVi;
use Modules\Admin\Entities\HinhThucDaoTao;
use Modules\Admin\Entities\KiemNhiemBietPhai;
use Modules\Admin\Entities\LoaiPhuCap;
use Modules\Admin\Entities\QuaTrinhDaoTao;
use Modules\Admin\Entities\ToChuc;
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
        $don_vi = $request->don_vi;
        $chuc_vu_chinh = $request->chuc_vu_chinh;
        $chucVuHienTai = ChucVuHienTai::orderBy('ten', 'asc')->get();
        $page = $request->get('page');
        $donVi = ToChuc::orderBy('ten_don_vi', 'asc')->get();


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
            ->where(function ($query) use ($chuc_vu_chinh) {
                if (!empty($chuc_vu_chinh)) {
                    return $query->where(DB::raw('lower(chuc_vu_hien_tai)'), 'LIKE', "%" . mb_strtolower($chuc_vu_chinh) . "%");
                }
            })
            ->where(function ($query) use ($don_vi) {
                if (!empty($don_vi)) {
                    return $query->where(DB::raw('lower(don_vi)'), 'LIKE', "%" . mb_strtolower($don_vi) . "%");
                }
            })
            ->paginate(PER_PAGE, ['*'], 'page', $page);

        if ($request->get('type') == 'excel') {
            $totalRecord = $danhSach->count();
            $fileName = 'Danh sách cán bộ ' . date('d-m-Y') . '.xlsx';

            return Excel::download(new CanBoExort($danhSach, $totalRecord),
                $fileName);
        }
        return view('tracuu::index', compact('danhSach', 'donVi', 'chucVuHienTai'));
    }

    public function nangCao(Request $request)
    {
        $ten = $request->ten_cb;
        $page = $request->get('page');
        $donViId = $request->get('don_vi_id') ?? null;
        $cmt = $request->cmt;
        $the_dang = $request->the_dang;
        $ngayVaoDang = formatYMD($request->start_date);
        $chuc_vu_dang = $request->chuc_vu_dang;
        $trinh_do_chuyen_mon = $request->trinh_do_chuyen_mon;
        $gioi_tinh = $request->gioi_tinh;
        $he_so_luong = $request->he_so_luong;
        $phu_cap = $request->phu_cap;
        $bac_luong = $request->bac_luong;
        $hinh_thuc = $request->hinh_thuc;
        $loai_dao_tao = $request->loai_dao_tao;
        $phan_loai = $request->phan_loai;
        $kiem_nhiem = $request->kiem_nhiem;
        $phonBanId = $request->phong_ban_id;
        $don_vi_id = $request->don_vi_id;
        $ton_giao = $request->ton_giao;
        $tinh_trang = $request->tinh_trang;
        $chuc_vu_chinh = $request->chuc_vu_chinh;


        $chucVuDang = ChucVu::orderBy('ten_chuc_vu', 'asc')->get();
        $congViecChuyenMon = CongViecChuyenMon::orderBy('ten', 'asc')->get();
        $chucVuHienTai = ChucVuHienTai::orderBy('ten', 'asc')->get();
        $trangThai = TrangThai::orderBy('ten', 'asc')->get();
        $tonGiao = TonGiao::orderBy('ten', 'asc')->get();
        $kiemNhiemBietPhai = KiemNhiemBietPhai::orderBy('ten', 'asc')->get();
        $hopDongBienChe = BinhBauPhanLoaiCanBo::orderBy('ten', 'asc')->get();
        $hinhThucDaoTao = HinhThucDaoTao::orderBy('ten', 'asc')->get();
        $chuyenNganhDT = ChuyenNganhDaoTao::orderBy('ten', 'asc')->get();
        $donVi = DonVi::orderBy('ten_don_vi', 'asc')->get();
        $bacLuong = BacHeSoLuong::orderBy('ten', 'asc')->get();
        $phuCap = LoaiPhuCap::orderBy('ten', 'asc')->get();
        $danhSachPhongBan = null;

        if ($donViId) {
            $danhSachPhongBan = ToChuc::where('parent_id', $donViId)->get();
        }
        $danhSachDonVi = ToChuc::select('id', 'ten_don_vi')
            ->where('parent_id', DonVi::NO_PARENT_ID)
            ->orderBy('ten_don_vi', 'asc')
            ->get();
        $quaTrinh = null;
        $user = null;

        if ($hinh_thuc || $loai_dao_tao) {
            if ($hinh_thuc && $loai_dao_tao) {
                $quaTrinh = QuaTrinhDaoTao::where(['hinh_thuc' => $hinh_thuc, 'loai_dao_tao' => $loai_dao_tao])->get();
                $user = $quaTrinh->pluck('users');
            } elseif ($loai_dao_tao) {
                $quaTrinh = QuaTrinhDaoTao::where('loai_dao_tao', $loai_dao_tao)->get();
                $user = $quaTrinh->pluck('users');
            } elseif ($hinh_thuc) {
                $quaTrinh = QuaTrinhDaoTao::where('hinh_thuc', $hinh_thuc)->get();
                $user = $quaTrinh->pluck('users');
            }
        }
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
            ->where(function ($query) use ($gioi_tinh) {
                if (!empty($gioi_tinh)) {
                    return $query->where(DB::raw('lower(gioi_tinh)'), 'LIKE', "%" . mb_strtolower($gioi_tinh) . "%");
                }
            })
            ->where(function ($query) use ($he_so_luong) {
                if (!empty($he_so_luong)) {
                    return $query->where(DB::raw('lower(he_so_luong)'), 'LIKE', "%" . mb_strtolower($he_so_luong) . "%");
                }
            })
            ->where(function ($query) use ($bac_luong) {
                if (!empty($bac_luong)) {
                    return $query->where(DB::raw('lower(bac_luong)'), 'LIKE', "%" . mb_strtolower($bac_luong) . "%");
                }
            })
            ->where(function ($query) use ($phu_cap) {
                if (!empty($phu_cap)) {
                    return $query->where(DB::raw('lower(phu_cap_cv)'), 'LIKE', "%" . mb_strtolower($phu_cap) . "%");
                }
            })
            ->where(function ($query) use ($phan_loai) {
                if (!empty($phan_loai)) {
                    return $query->where(DB::raw('lower(phan_loai_cb)'), 'LIKE', "%" . mb_strtolower($phan_loai) . "%");
                }
            })
            ->where(function ($query) use ($kiem_nhiem) {
                if (!empty($kiem_nhiem)) {
                    return $query->where(DB::raw('lower(kiem_nhiem_biet_phai)'), 'LIKE', "%" . mb_strtolower($kiem_nhiem) . "%");
                }
            })
            ->where(function ($query) use ($user) {
                if (!empty($user)) {
                    return $query->whereIN('id',$user);
                }
            })
            ->where(function ($query) use ($don_vi_id, $phonBanId, $danhSachPhongBan) {
                if (!empty($don_vi_id) && empty($phonBanId)) {
                    return $query->where('don_vi', $don_vi_id)
                        ->orWhereIn('don_vi', $danhSachPhongBan->pluck('id')->toArray());
                } else if (!empty($don_vi_id) && !empty($phonBanId)) {
                    return $query->where('don_vi', $phonBanId);
                }
            })
            ->paginate(PER_PAGE, ['*'], 'page', $page);

        if ($request->get('type') == 'excel') {
            $totalRecord = $danhSach->count();
            $fileName = 'Danh sách cán bộ ' . date('d-m-Y') . '.xlsx';

            return Excel::download(new CanBoExort($danhSach, $totalRecord),
                $fileName);
        }
        return view('tracuu::tim-kiem-nang-cao', compact('danhSach', 'chucVuDang', 'congViecChuyenMon', 'chucVuHienTai', 'phuCap',
            'hopDongBienChe', 'kiemNhiemBietPhai', 'danhSachDonVi', 'danhSachPhongBan', 'donVi', 'trangThai', 'tonGiao', 'chuyenNganhDT', 'hinhThucDaoTao', 'bacLuong'));
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
