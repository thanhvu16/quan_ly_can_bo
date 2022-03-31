<?php

namespace Modules\CacQuaTrinh\Http\Controllers;

use App\Exports\CanBoExort;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\BacHeSoLuong;
use Modules\Admin\Entities\CanBo;
use Modules\Admin\Entities\ChucVuHienTai;
use Modules\Admin\Entities\ChuyenNganhDaoTao;
use Modules\Admin\Entities\CongViecChuyenMon;
use Modules\Admin\Entities\HinhThucDaoTao;
use Modules\Admin\Entities\LoaiPhuCap;
use Modules\Admin\Entities\NgachChucDanh;
use Modules\Admin\Entities\QuaChucVu;
use Modules\Admin\Entities\QuaTrinhChucVuDang;
use Modules\Admin\Entities\QuaTrinhCongTac;
use Modules\Admin\Entities\QuaTrinhDaoTao;
use Modules\Admin\Entities\QuaTrinhDoan;
use Modules\Admin\Entities\QuaTrinhGiaDinh;
use Modules\Admin\Entities\QuaTrinhKhenThuong;
use Modules\Admin\Entities\QuaTrinhLuong;
use Modules\Admin\Entities\QuaTrinhNghienCuu;
use Modules\Admin\Entities\QuaTrinhNuocNgoai;
use Modules\Admin\Entities\QuaTrinhPhuCapKhac;
use Modules\Admin\Entities\QuaTrinhQuocHoi;
use Modules\Admin\Entities\QuaTrinhQuyHoachCanBo;
use Modules\Admin\Entities\QuaTrinhVuotKhung;
use Modules\Admin\Entities\ToChuc;
use auth, DB, Excel;
use Modules\Admin\Entities\TruongHoc;

class CacQuaTrinhController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $ten = $request->ten_cb;
        $cmt = $request->cmt;
        $donViId = $request->don_vi;
        $phongBanId = $request->phong_ban_id ?? null;
        $chuc_vu_chinh = $request->chuc_vu_chinh;
        $chucVuHienTai = ChucVuHienTai::orderBy('ten', 'asc')->get();
        $page = $request->get('page');
        $search = $request->search;

        $danhSachPhongBan = null;
        if ($search || !empty($donViId)) {
            $danhSachPhongBan = ToChuc::where('parent_id', $donViId)->select('id', 'ten_don_vi', 'parent_id')->get();
            if (!empty($donViId)) {
                $donViCha = ToChuc::where('id', $donViId)->select('id', 'ten_don_vi', 'parent_id')->first();
                if ($donViCha->parent_id == 0) {
                    $donViId = null;
                }
            }

        }

        $cap2 = false;
        if (auth::user()->hasRole(QUAN_TRI_HT) || auth::user()->donVi->parent_id == 0) {
            $donViCap1 = ToChuc::where('parent_id', 0)->select('id', 'ten_don_vi')->first();

            $donVi = ToChuc::where('parent_id', $donViCap1->id)->select('id', 'ten_don_vi')->get();
        } else {
            $donVi = ToChuc::where('id', auth::user()->don_vi_id)->select('id', 'ten_don_vi')->get();
            $donViId = auth::user()->don_vi_id;
            $danhSachPhongBan = ToChuc::where('parent_id', $donViId)->select('id', 'ten_don_vi')->get();
            $cap2 = true;
        }


        $danhSach = CanBo::where(function ($query) use ($donViId) {
            if (!empty($donViId)) {
                return $query->where('don_vi_tao_id', $donViId);
            }
        })
            ->where(function ($query) use ($ten) {
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
            ->where(function ($query) use ($phongBanId) {
                if (!empty($phongBanId)) {
                    return $query->where('don_vi_id', $phongBanId);
                }
            })
            ->paginate(PER_PAGE, ['*'], 'page', $page);

        if ($request->get('type') == 'excel') {
            $totalRecord = $danhSach->count();
            $fileName = 'Danh sách cán bộ ' . date('d-m-Y') . '.xlsx';

            return Excel::download(new CanBoExort($danhSach, $totalRecord),
                $fileName);
        }
        if ($request->dao_tao == 1) {
            $title = 'Quản lý hồ sơ cán bộ  > Các quá trình > Quá trình đào tạo';
        } elseif ($request->ban_than == 1) {
            $title = 'Quản lý hồ sơ cán bộ  > Các quá trình > Bản thân và công tác';
        } elseif ($request->nuoc_ngoai == 1) {
            $title = 'Quản lý hồ sơ cán bộ  > Các quá trình > Hoạt động nước ngoài';
        } elseif ($request->luong == 1) {
            $title = 'Quản lý hồ sơ cán bộ  > Các quá trình > Quá trình lương';
        } elseif ($request->quoc_hoi == 1) {
            $title = 'Quản lý hồ sơ cán bộ  > Các quá trình > Tham gia Quốc hội';
        } elseif ($request->chuc_vu == 1) {
            $title = 'Quản lý hồ sơ cán bộ  > Các quá trình > Chức vụ';
        } elseif ($request->dang == 1) {
            $title = 'Quản lý hồ sơ cán bộ  > Các quá trình > Chức vụ Đảng';
        } elseif ($request->doan_the == 1) {
            $title = 'Quản lý hồ sơ cán bộ  > Các quá trình > Chức vụ đoàn thể';
        } elseif ($request->tham_nien == 1) {
            $title = 'Quản lý hồ sơ cán bộ  > Các quá trình > Phụ cấp thâm niên vượt khung';
        } elseif ($request->phu_cap_khac == 1) {
            $title = 'Quản lý hồ sơ cán bộ  > Các quá trình > Diễn biến phụ cấp khác';
        } elseif ($request->nghien_cuu == 1) {
            $title = 'Quản lý hồ sơ cán bộ  > Các quá trình > Nghiên cứu khoa học';
        } elseif ($request->gia_dinh == 1) {
            $title = 'Quản lý hồ sơ cán bộ  > Các quá trình > Quan hệ gia đình';
        } else {
            $title = 'Quản lý hồ sơ cán bộ  > Các quá trình > Quá trình đào tạo';
        }
        return view('cacquatrinh::index',
            compact('danhSach', 'donVi', 'chucVuHienTai', 'danhSachPhongBan', 'cap2', 'title'));
    }

    public function capNhatQuaTrinhDaoTao($id, Request $request)
    {
        $quaTrinhDaoTao = QuaTrinhDaoTao::where('users', $id)->get();
        $chuyenNganhDT = ChuyenNganhDaoTao::orderBy('ten', 'asc')->get();
        $hinhThucDaoTao = HinhThucDaoTao::orderBy('ten', 'asc')->get();
        $truongHoc = TruongHoc::orderBy('ten', 'asc')->get();
        $congViecChuyenMon = CongViecChuyenMon::orderBy('ten', 'asc')->get();
        $quaTrinhCongTac = QuaTrinhCongTac::where('users', $id)->get();
        $quaTrinhNuocNgoai = QuaTrinhNuocNgoai::where('users', $id)->get();
        $quaTrinhLuong = QuaTrinhLuong::where('users', $id)->get();
        $ngach = NgachChucDanh::orderBy('ten', 'asc')->get();
        $bacLuong = BacHeSoLuong::orderBy('ten', 'asc')->get();
        $phuCap = LoaiPhuCap::orderBy('ten', 'asc')->get();
        $quaTrinhQuocHoi = QuaTrinhQuocHoi::where('users', $id)->get();
        $quaTrinhChucVu = QuaChucVu::where('users', $id)->get();
        $quaTrinhChucVuDang = QuaTrinhChucVuDang::where('users', $id)->get();
        $quaTrinhQuyHoachCanBo = QuaTrinhDoan::where('users', $id)->get();
        $quaTrinhVuotKhung = QuaTrinhVuotKhung::where('users', $id)->get();
        $quaTrinhPhuCapKhac = QuaTrinhPhuCapKhac::where('users', $id)->get();
        $quaTrinhNghienCuu = QuaTrinhNghienCuu::where('users', $id)->get();
        $quaTrinhGiaDinh = QuaTrinhGiaDinh::where('users', $id)->get();
        $quaTrinhQuyHoachCanBo2 = QuaTrinhQuyHoachCanBo::where('users', $id)->get();
        $chucVuHienTai = ChucVuHienTai::orderBy('ten', 'asc')->get();
        $canBo = CanBo::where('id', $id)->first();
        if ($request->dao_tao == 1) {
            $title = 'Quản lý hồ sơ cán bộ  > Các quá trình > Quá trình đào tạo';
        } elseif ($request->ban_than == 1) {
            $title = 'Quản lý hồ sơ cán bộ  > Các quá trình > Bản thân và công tác';
        } elseif ($request->nuoc_ngoai == 1) {
            $title = 'Quản lý hồ sơ cán bộ  > Các quá trình > Hoạt động nước ngoài';
        } elseif ($request->luong == 1) {
            $title = 'Quản lý hồ sơ cán bộ  > Các quá trình > Quá trình lương';
        } elseif ($request->quoc_hoi == 1) {
            $title = 'Quản lý hồ sơ cán bộ  > Các quá trình > Tham gia Quốc hội';
        } elseif ($request->chuc_vu == 1) {
            $title = 'Quản lý hồ sơ cán bộ  > Các quá trình > Chức vụ';
        } elseif ($request->dang == 1) {
            $title = 'Quản lý hồ sơ cán bộ  > Các quá trình > Chức vụ Đảng';
        } elseif ($request->doan_the == 1) {
            $title = 'Quản lý hồ sơ cán bộ  > Các quá trình > Chức vụ đoàn thể';
        } elseif ($request->tham_nien == 1) {
            $title = 'Quản lý hồ sơ cán bộ  > Các quá trình > Phụ cấp thâm niên vượt khung';
        } elseif ($request->phu_cap_khac == 1) {
            $title = 'Quản lý hồ sơ cán bộ  > Các quá trình > Diễn biến phụ cấp khác';
        } elseif ($request->nghien_cuu == 1) {
            $title = 'Quản lý hồ sơ cán bộ  > Các quá trình > Nghiên cứu khoa học';
        } elseif ($request->gia_dinh == 1) {
            $title = 'Quản lý hồ sơ cán bộ  > Các quá trình > Quan hệ gia đình';
        } elseif ($request->quy_hoachcb == 1) {
            $title = 'Quản lý hồ sơ cán bộ  > Các quá trình > Quá trình quy hoạch cán bộ';
        } else {
            $title = 'Quản lý hồ sơ cán bộ  > Các quá trình > Quá trình đào tạo';
        }
        if ($request->dao_tao == 1) {
            return view('cacquatrinh::components.quaTrinhDaoTao', compact('quaTrinhDaoTao', 'canBo', 'title', 'chuyenNganhDT', 'hinhThucDaoTao', 'truongHoc', 'congViecChuyenMon'));

        } elseif ($request->ban_than == 1) {
            return view('cacquatrinh::components.banThan', compact('quaTrinhCongTac', 'title', 'canBo'));
        } elseif ($request->nuoc_ngoai == 1) {
            return view('cacquatrinh::components.nuocNgoai', compact('quaTrinhCongTac', 'canBo', 'title', 'quaTrinhNuocNgoai'));
        } elseif ($request->luong == 1) {
            return view('cacquatrinh::components.luong', compact('quaTrinhLuong', 'canBo', 'ngach', 'title', 'bacLuong', 'phuCap'));
        } elseif ($request->quoc_hoi == 1) {
            return view('cacquatrinh::components.quocHoi', compact('quaTrinhQuocHoi', 'title', 'canBo'));
        } elseif ($request->chuc_vu == 1) {
            return view('cacquatrinh::components.chucVu', compact('quaTrinhChucVu', 'title', 'canBo'));
        } elseif ($request->dang == 1) {
            return view('cacquatrinh::components.chucVuDang', compact('quaTrinhChucVuDang', 'title', 'canBo'));
        } elseif ($request->doan_the == 1) {
            return view('cacquatrinh::components.chucVuDoan', compact('quaTrinhQuyHoachCanBo', 'title', 'canBo'));
        } elseif ($request->tham_nien == 1) {
            return view('cacquatrinh::components.thamNien', compact('quaTrinhVuotKhung', 'title', 'canBo'));
        } elseif ($request->phu_cap_khac == 1) {
            return view('cacquatrinh::components.phuCapKhac', compact('quaTrinhPhuCapKhac', 'title', 'canBo'));
        } elseif ($request->nghien_cuu == 1) {
            return view('cacquatrinh::components.nghienCuu', compact('quaTrinhNghienCuu', 'title', 'canBo'));
        } elseif ($request->gia_dinh == 1) {
            return view('cacquatrinh::components.giaDinh', compact('quaTrinhGiaDinh', 'title', 'canBo'));
        } elseif ($request->quy_hoachcb == 1) {
            return view('cacquatrinh::components.QuyHoach', compact('quaTrinhQuyHoachCanBo2', 'title', 'canBo','chucVuHienTai'));
        } else {
            return redirect()->back();
        }


    }
    public function khenThuong($id, Request $request)
    {

        $canBo = CanBo::where('id', $id)->first();
        $title = 'khen thưởng';
        $quaTrinhKhenThuong = QuaTrinhKhenThuong::where('users', $id)->where('type', 2)->get();
        return view('cacquatrinh::components.khenThuong', compact( 'canBo', 'title','quaTrinhKhenThuong'));




    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('cacquatrinh::create');
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
        return view('cacquatrinh::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('cacquatrinh::edit');
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
