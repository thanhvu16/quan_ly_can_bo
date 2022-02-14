<?php

namespace Modules\ThemCanBo\Http\Controllers;

use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\BacHeSoLuong;
use Modules\Admin\Entities\CanBo;
use Modules\Admin\Entities\ChinhTri;
use Modules\Admin\Entities\ChucVu;
use Modules\Admin\Entities\ChucVuHienTai;
use Modules\Admin\Entities\ChuyenNganhDaoTao;
use Modules\Admin\Entities\CongViecChuyenMon;
use Modules\Admin\Entities\DanhHieu;
use Modules\Admin\Entities\DanToc;
use Modules\Admin\Entities\DoiTuongQuanLy;
use Modules\Admin\Entities\HinhThucDaoTao;
use Modules\Admin\Entities\HinhThucThiTuyen;
use Modules\Admin\Entities\KhenThuongKyLuat;
use Modules\Admin\Entities\KyLuat;
use Modules\Admin\Entities\LoaiPhuCap;
use Modules\Admin\Entities\NgachChucDanh;
use Modules\Admin\Entities\NgoaiNgu;
use Modules\Admin\Entities\NhiemKy;
use Modules\Admin\Entities\PhoThong;
use Modules\Admin\Entities\QuaChucVu;
use Modules\Admin\Entities\QuanHam;
use Modules\Admin\Entities\QuanLyHanhChinh;
use Modules\Admin\Entities\QuaTrinhChucVuDang;
use Modules\Admin\Entities\QuaTrinhCongTac;
use Modules\Admin\Entities\QuaTrinhDaoTao;
use Modules\Admin\Entities\QuaTrinhLuong;
use Modules\Admin\Entities\QuaTrinhNuocNgoai;
use Modules\Admin\Entities\QuaTrinhQuyHoachCanBo;
use Modules\Admin\Entities\ThanhPhanXuatThan;
use Modules\Admin\Entities\ThanhPho;
use Modules\Admin\Entities\TiengAnh;
use Modules\Admin\Entities\TinHoc;
use Modules\Admin\Entities\ToChuc;
use Modules\Admin\Entities\TonGiao;
use Modules\Admin\Entities\TrangThai;
use Modules\Admin\Entities\TruongHoc;
use Auth;

class ThemCanBoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */


    public function canBo($id)
    {
        $danhSach = CanBo::paginate(20);
        return view('canbo::danh-sach-can-bo', compact('danhSach'));

    }

    public function choGuiDuyet()
    {
        $danhSach = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
            ->whereNull('trang_thai_duyet_ho_so')
            ->paginate(20);

        $danhSachLanhDaoDuyet = User::role([LANH_DAO])
            ->where('don_vi_id', auth::user()->don_vi_id)
            ->where('trang_thai', ACTIVE)->whereNull('deleted_at')->get();

        return view('themcanbo::danh-sach-can-bo', compact('danhSach', 'danhSachLanhDaoDuyet'));
    }

    public function daGuiDuyet(Request $request)
    {
        $hoTen = $request->get('ho_ten') ?? null;
        $queQuan = $request->get('que_quan') ?? null;
        $gioiTinh = $request->get('gioi_tinh') ?? null;
        $donViId = $request->get('don_vi_id') ?? null;

        $danhSach = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
            ->where(function ($query) use ($hoTen) {
                if (!empty($hoTen)) {
                    return $query->where('ho_ten', 'LIKE', "%$hoTen%");
                }
            })
            ->where(function ($query) use ($queQuan) {
                if (!empty($queQuan)) {
                    return $query->where('que_quan', 'LIKE', "%$queQuan%");
                }
            })
            ->where(function ($query) use ($gioiTinh) {
                if (!empty($gioiTinh)) {
                    return $query->where('gioi_tinh', $gioiTinh);
                }
            })
            ->where(function ($query) use ($donViId) {
                if (!empty($donViId)) {
                    return $query->where('don_vi_id', $donViId);
                }
            })
            ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET)
            ->paginate(20);

        $danhSachToChuc = ToChuc::all();

        return view('themcanbo::danh-sach-can-bo-da-gui-duyet',
            compact('danhSach', 'danhSachToChuc'));
    }

    public function guiDuyetBiTraLai(Request $request)
    {
        $hoTen = $request->get('ho_ten') ?? null;
        $queQuan = $request->get('que_quan') ?? null;
        $gioiTinh = $request->get('gioi_tinh') ?? null;
        $donViId = $request->get('don_vi_id') ?? null;

        $danhSach = CanBo::with('trinhTuTraLaiHoSoCanBoNhap')
            ->whereHas('trinhTuTraLaiHoSoCanBoNhap')
            ->where('don_vi_tao_id', auth::user()->don_vi_id)
            ->where(function ($query) use ($hoTen) {
                if (!empty($hoTen)) {
                    return $query->where('ho_ten', 'LIKE', "%$hoTen%");
                }
            })
            ->where(function ($query) use ($queQuan) {
                if (!empty($queQuan)) {
                    return $query->where('que_quan', 'LIKE', "%$queQuan%");
                }
            })
            ->where(function ($query) use ($gioiTinh) {
                if (!empty($gioiTinh)) {
                    return $query->where('gioi_tinh', $gioiTinh);
                }
            })
            ->where(function ($query) use ($donViId) {
                if (!empty($donViId)) {
                    return $query->where('don_vi_id', $donViId);
                }
            })
            ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_TRA_LAI)
            ->paginate(20);

        $danhSachToChuc = ToChuc::all();

        return view('themcanbo::danh_sach_ho_so_bi_tra_lai',
            compact('danhSach', 'danhSachToChuc'));
    }

    public function index(Request $request)
    {
        $hoTen = $request->get('ho_ten') ?? null;
        $queQuan = $request->get('que_quan') ?? null;
        $gioiTinh = $request->get('gioi_tinh') ?? null;
        $donViId = $request->get('don_vi_id') ?? null;

        $thongKe = $request->get('thong_ke') ?? null;
        $dangVien = $request->get('dang_vien') ?? null;
        $khenThuong = $request->get('khen_thuong') ?? null;
        $kyLuat = $request->get('ky_luat') ?? null;
        $chuyenCongTac = $request->get('chuyen_cong_tac') ?? null;
        $veHuu = $request->get('ve_huu') ?? null;

        $tenDonVi = auth::user()->donVi->ten_don_vi;
        if (!empty($donViId)) {
            $tenDonVi = ToChuc::where('id', $donViId)->select('id', 'ten_don_vi')->first()->ten_don_vi;
        }

        $danhSach = CanBo::where(function ($query) use ($thongKe) {
                if (empty($thongKe)) {
                    return $query->where('don_vi_tao_id', auth::user()->don_vi_id);
                }
            })
            ->where(function ($query) use ($hoTen) {
                if (!empty($hoTen)) {
                    return $query->where('ho_ten', 'LIKE', "%$hoTen%");
                }
            })
            ->where(function ($query) use ($queQuan) {
                if (!empty($queQuan)) {
                    return $query->where('que_quan', 'LIKE', "%$queQuan%");
                }
            })
            ->where(function ($query) use ($gioiTinh) {
                if (!empty($gioiTinh)) {
                    return $query->where('gioi_tinh', $gioiTinh);
                }
            })
            ->where(function ($query) use ($donViId) {
                if (!empty($donViId)) {
                    return $query->where('don_vi_id', $donViId);
                }
            })
            ->where(function ($query) use ($khenThuong) {
                if (!empty($khenThuong)) {
                    return $query->whereHas('khenThuong');
                }
            })
            ->where(function ($query) use ($kyLuat) {
                if (!empty($kyLuat)) {
                    return $query->whereHas('kiLuat');
                }
            })
            ->where(function ($query) use ($chuyenCongTac) {
                if (!empty($chuyenCongTac)) {
                    return $query->whereHas('chuyenCongTac');
                }
            })
            ->where(function ($query) use ($veHuu) {
                if (!empty($veHuu)) {
                    return $query->whereHas('veHuu');
                }
            })
            ->where(function ($query) use ($dangVien) {
                if (!empty($dangVien)) {
                    return $query->where('la_dang_vien', $dangVien);
                }
            })
            ->where(function ($query) use ($thongKe) {
                if (empty($thongKe)) {
                    return $query->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET);
                }
            })
            ->paginate(20);

        $danhSachToChuc = ToChuc::all();

        return view('themcanbo::index',
            compact('danhSach', 'danhSachToChuc', 'tenDonVi'));
    }

    public function create()
    {
        $danToc = DanToc::orderBy('ten', 'asc')->get();
        $tonGiao = TonGiao::orderBy('ten', 'asc')->get();
        $thanhPho = ThanhPho::orderBy('ten', 'asc')->get();
        $chucVuHienTai = ChucVuHienTai::orderBy('ten', 'asc')->get();
        $donVi = ToChuc::where('parent_id', auth::user()->don_vi_id)->orderBy('created_at', 'asc')->get();
        $ngach = NgachChucDanh::orderBy('ten', 'asc')->get();
        $bacLuong = BacHeSoLuong::orderBy('ten', 'asc')->get();
        $phuCap = LoaiPhuCap::orderBy('ten', 'asc')->get();

        $chuyenNganhDT = ChuyenNganhDaoTao::orderBy('ten', 'asc')->get();
        $congViecChuyenMon = CongViecChuyenMon::orderBy('ten', 'asc')->get();
        $phoThong = PhoThong::orderBy('ten', 'asc')->get();
        $lyluanChinhTri = ChinhTri::orderBy('ten', 'asc')->get();
        $quanLyHanhChinh = QuanLyHanhChinh::orderBy('ten', 'asc')->get();
        $tinHoc = TinHoc::orderBy('ten', 'asc')->get();
        $tiengAnh = TiengAnh::orderBy('ten', 'asc')->get();
        $ngoaiNgu = NgoaiNgu::orderBy('ten', 'asc')->get();
        $chucVuDang = ChucVu::orderBy('ten_chuc_vu', 'asc')->get();
        $quanHam = QuanHam::orderBy('ten', 'asc')->get();
        $danhHieu = DanhHieu::orderBy('ten', 'asc')->get();
        $doiTuongQuanLy = DoiTuongQuanLy::orderBy('ten', 'asc')->get();
        $hinhThucDaoTao = HinhThucDaoTao::orderBy('ten', 'asc')->get();


        $hinhThucTuyen = HinhThucThiTuyen::orderBy('ten', 'asc')->get();
        $trangThai = TrangThai::orderBy('ten', 'asc')->get();

        $khenThuong = KhenThuongKyLuat::orderBy('ten', 'asc')->get();
        $kyLuat = KyLuat::orderBy('ten', 'asc')->get();
        $xuatThan = ThanhPhanXuatThan::orderBy('ten', 'asc')->get();

        $quaTrinhNuocNgoai = QuaTrinhNuocNgoai::get();
        $quaTrinhDaoTao = QuaTrinhDaoTao::get();
        $quaTrinhCongTac = QuaTrinhCongTac::get();

        $quaTrinhLuong = QuaTrinhLuong::get();
        $quaTrinhChucVuDang = QuaTrinhChucVuDang::get();
        $quaTrinhChucVu = QuaChucVu::get();
        $quaTrinhQuyHoachCanBo = QuaTrinhQuyHoachCanBo::get();

        $truongHoc = TruongHoc::orderBy('ten', 'asc')->get();
        $nhiemKy = NhiemKy::orderBy('ten', 'asc')->get();

        return view('themcanbo::create', compact('danToc', 'tonGiao', 'thanhPho', 'chucVuHienTai'
            , 'donVi', 'ngach', 'bacLuong', 'phuCap', 'chuyenNganhDT', 'congViecChuyenMon', 'phoThong', 'lyluanChinhTri', 'quanLyHanhChinh'
            , 'tiengAnh', 'ngoaiNgu', 'chucVuDang', 'quanHam', 'danhHieu', 'doiTuongQuanLy', 'hinhThucDaoTao', 'hinhThucTuyen', 'trangThai'
            , 'kyLuat', 'khenThuong', 'xuatThan', 'quaTrinhCongTac', 'quaTrinhDaoTao', 'quaTrinhNuocNgoai', 'truongHoc'
            , 'quaTrinhLuong', 'quaTrinhChucVu', 'quaTrinhChucVuDang', 'quaTrinhQuyHoachCanBo', 'nhiemKy'
            , 'tinHoc'));
    }


    public function postSoLuoc1(Request $request)
    {
//        dd($request->all());
        $canBo = new CanBo();
        $canBo->ho_ten = $request->ten;
        $canBo->ten_khac = $request->ten_khac;
        $canBo->gioi_tinh = $request->gioi_tinh;
        $canBo->ngay_sinh = !empty($request->ngay_sinh) ? formatYMD($request->ngay_sinh) : null;
        $canBo->dan_toc = $request->dan_toc;
        $canBo->ton_giao = $request->ton_giao;

        $canBo->ngay_vao_don_vi = !empty($request->ngay_vao_don_vi) ? formatYMD($request->ngay_vao_don_vi) : null;

        $canBo->co_quan_tuyen = $request->co_quan_tuyen;
        $canBo->noi_sinh = $request->noi_sinh_xa;
        $canBo->huyen_noi_sinh = $request->noi_sinh_huyen;
        $canBo->thanh_pho_noi_sinh = $request->noi_sinh_tp;
        $canBo->que_quan = $request->que_quan_xa;
        $canBo->huyen_que_quan = $request->que_quan_huyen;
        $canBo->thanh_pho_que_quan = $request->que_quan_tp;
        $canBo->ho_khau = $request->ho_khau;
        $canBo->noi_o_hien_nay = $request->noi_o_hien_nay;
        $canBo->nghe_nghiep_khi_duoc_tuyen = $request->nghe_nghiep_khi_tuyen;
        $canBo->ngay_bat_dau_di_lam = !empty($request->ngay_bat_dau_di_lam) ? formatYMD($request->ngay_bat_dau_di_lam) : null;

        $canBo->chuc_danh = $request->chuc_danh;
        $canBo->chuc_vu_hien_tai = $request->chuc_vu_hien_tai;
        $canBo->don_vi = $request->don_vi;
        $canBo->don_vi_id = $request->don_vi;
        $canBo->ngach_cong_chuc = $request->ngach_cong_chuc;
        $canBo->ma_ngach = $request->ma_ngach;
        $canBo->bac_luong = $request->bac_luong;
        $canBo->he_so_luong = $request->he_so_luong;
        $canBo->ngay_huong = !empty($request->ngay_huong) ? formatYMD($request->ngay_huong) : null;
        $canBo->som = $request->som;
        $canBo->phu_cap_cv = $request->phu_cap;
        $canBo->phu_cap_khac = $request->phu_cap_khac;
        $canBo->phan_tram_huong = $request->phan_tram_huong;
        $canBo->phan_tram_khung = $request->khung;
        $canBo->BHXH = $request->bhxh;
        $canBo->BHYT = $request->bhyt;
        $canBo->don_vi_tao_id = auth::user()->don_vi_id;
        $canBo->user_id = auth::user()->id;

        $canBo->save();
        return redirect()->route('canBoDetail', $canBo->id)->with('Thêm mới thành công !');
    }

    public function uploadAnh()
    {
        $multiFiles = !empty($request['ten_file']) ? $request['ten_file'] : null;
        $uploadPath = UPLOAD_ANH;
        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0777, true, true);
        }

        $fileName = date('Y_m_d') . '_' . Time() . '_' . $multiFiles->getClientOriginalName();
        $urlFile = UPLOAD_ANH . '/' . $fileName;
        $canBo = CanBo:: where('id', $request->can_bo)->first();

        $multiFiles->move($uploadPath, $fileName);
        $canBo->anh_dai_dien = $urlFile;
        $canBo->save();
        return redirect()->route('canBoDetail', $canBo->id)->with('Thêm mới thành công !');


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
        return view('themcanbo::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('themcanbo::edit');
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
