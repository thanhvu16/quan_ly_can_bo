<?php

namespace Modules\ThemCanBo\Http\Controllers;

use App\Models\HoSoTraLai;
use App\Models\UserLogs;
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

        $viTri = $request->get('vi_tri') ?? null;
        $all = $request->get('all') ?? null;
        $dangVienC = $request->get('dang_vienC') == 1 ?? null;
        $doanVien = $request->get('doan_vien') == 1 ?? null;
        $boDoi = $request->get('bo_doi') == 1 ?? null;
        $giaiNgu = $request->get('giai_ngu') == 1 ?? null;
        $choDuyet = $request->get('cho_duyet') == 1 ?? null;
        $daDuyet = $request->get('da_duyet') == 1 ?? null;
        $traLai = $request->get('tra_lai') == 1 ?? null;
        $guiDuyet = $request->get('gui_duyet') == 1 ?? null;

        $thongKe = $request->get('thong_ke') ?? null;
        $dangVien = $request->get('dang_vien') ?? null;
        $khenThuong = $request->get('khen_thuong') ?? null;
        $kyLuat = $request->get('ky_luat') ?? null;
        $chuyenCongTac = $request->get('chuyen_cong_tac') ?? null;
        $veHuu = $request->get('ve_huu') ?? null;
        $tuoiDang = $request->get('tuoidang') ?? null;
        $trenDaiHoc = $request->get('tren_dai_hoc') ?? null;
        $daiHoc = $request->get('dai_hoc') ?? null;
        $CaoDang = $request->get('cao_dang') ?? null;
        $trungCap = $request->get('trung_cap') ?? null;
        $soCap = $request->get('so_cap') ?? null;
        $canBoSapNhanQDVeHuu = $request->get('sap_nhan_ve_huu') ?? null;
        $canBoSapNangLuong = $request->get('sap_nang_luong') ?? null;
        $CanBoBoNhiem = $request->get('bo_nhiem') ?? null;
        $CanBoBoNhiemLai = $request->get('bo_nhiem_lai') ?? null;
        $canBoSinhNhat = $request->get('sinh_nhat') ?? null;
        $title = null;
        $trenDaiHocID = CongViecChuyenMon::where('ten','like','%Trên đại học%')->first();
        $daiHocID = CongViecChuyenMon::where('ten','like','%Đại học%')->first();
        $caoDangID = CongViecChuyenMon::where('ten','like','%Cao đẳng%')->first();
        $trungCapID = CongViecChuyenMon::where('ten','like','%Trung cấp%')->first();
        $soCapID = CongViecChuyenMon::where('ten','like','%Sơ cấp%')->first();

        $ngay = 2;
        $date = date('Y-m-d');
        $newdate = strtotime("+$ngay day", strtotime($date));
        $newdate = date('Y-m-j', $newdate);

        if($all == 1)
        {
            $title = 'tổng số hồ sơ cán bộ';

        }elseif($gioiTinh == 1){
            $title = 'tổng số hồ sơ nam';
        }elseif($gioiTinh == 2){
            $title = 'tổng số hồ sơ nữ';
        }elseif($veHuu == 1){
            $title = 'tổng số hồ sơ về hưu';
        }elseif($choDuyet == 1){
            $title = 'hồ sơ cán bộ chờ duyệt';
        }elseif($daDuyet == 1){
            $title = 'hồ sơ cán bộ đã duyệt';
        }elseif($traLai == 1){
            $title = 'hồ sơ cán bộ bị trả lại';
        }elseif($traLai == 1){
            $title = 'hồ sơ cán bộ chờ gửi duyệt';
        }elseif($viTri == 1){
            $title = 'tổng số hồ sơ công chức';
        }elseif($viTri == 2){
            $title = 'tổng số hồ sơ viên chức';
        }elseif($viTri == 3){
            $title = 'tổng số hồ sơ nhân viên';
        }elseif($doanVien == 1){
            $title = 'tổng số hồ sơ là đoàn viên';
        }elseif($boDoi == 1){
            $title = 'tổng số hồ sơ đã đi bộ đội';
        }elseif($giaiNgu == 1){
            $title = 'tổng số hồ sơ đã giải ngũ';
        }elseif($canBoSapNhanQDVeHuu == 1){
            $title = 'Cán bộ sắp nhận quyết định về hưu';
        }elseif($canBoSapNangLuong == 1){
            $title = 'Cán bộ sắp nâng lương';
        }elseif($CanBoBoNhiem == 1){
            $title = 'Cán bộ bổ được nhiệm';
        }elseif($CanBoBoNhiemLai == 1){
            $title = 'Cán bộ được bổ nhiệm lại';
        }elseif($canBoSinhNhat == 1){
            $title = 'Cán bộ sinh nhật hôm nay';
        }elseif($trenDaiHocID->id == $trenDaiHoc){
            $title = 'trên đại học';
        }elseif($daiHocID->id == $daiHoc){
            $title = 'đại học';
        }elseif($caoDangID->id == $CaoDang){
            $title = 'cao đẳng';
        }elseif($trungCapID->id == $trungCap){
            $title = 'trung cấp';
        }elseif($soCapID->id == $soCap){
            $title = 'sơ cấp';
        }elseif($dangVienC == 1){
            $title = 'Quản lý đảng viên  > hồ sơ đảng viên';
        }







        $tenDonVi = auth::user()->donVi->ten_don_vi;
        if (!empty($donViId)) {
            $tenDonVi = ToChuc::where('id', $donViId)->select('id', 'ten_don_vi')->first()->ten_don_vi;
        }

        $danhSach = CanBo::where(function ($query) use ($thongKe) {
            if (empty($thongKe)) {
                if (!auth::user()->hasRole([QUAN_TRI_HT])) {
                    return $query->where('don_vi_tao_id', auth::user()->don_vi_id);
                }
            }
        })

            ->where(function ($query) use ($canBoSapNhanQDVeHuu,$newdate) {
                if (!empty($canBoSapNhanQDVeHuu)) {
                    return $query->where('ngay_ve_huu', $newdate);
                }
            })
            ->where(function ($query) use ($canBoSapNangLuong,$newdate) {
                if (!empty($canBoSapNangLuong)) {
                    return $query->where('moc_xet_tang_luong', $newdate);
                }
            })
            ->where(function ($query) use ($hoTen) {
                if (!empty($hoTen)) {
                    return $query->where('ho_ten', 'LIKE', "%$hoTen%");
                }
            })
            ->where(function ($query) use ($trenDaiHoc) {
                if (!empty($trenDaiHoc)) {
                    return $query->where('trinh_do_chuyen_mon_cao_nhat_id', 'LIKE', "%$trenDaiHoc%");
                }
            })
            ->where(function ($query) use ($daiHoc) {
                if (!empty($daiHoc)) {
                    return $query->where('trinh_do_chuyen_mon_cao_nhat_id', 'LIKE', "%$daiHoc%");
                }
            })
            ->where(function ($query) use ($CaoDang) {
                if (!empty($CaoDang)) {
                    return $query->where('trinh_do_chuyen_mon_cao_nhat_id', 'LIKE', "%$CaoDang%");
                }
            })
            ->where(function ($query) use ($trungCap) {
                if (!empty($trungCap)) {
                    return $query->where('trinh_do_chuyen_mon_cao_nhat_id', 'LIKE', "%$trungCap%");
                }
            })
            ->where(function ($query) use ($soCap) {
                if (!empty($soCap)) {
                    return $query->where('trinh_do_chuyen_mon_cao_nhat_id', 'LIKE', "%$soCap%");
                }
            })

            ->where(function ($query) use ($choDuyet) {
                if (!empty($choDuyet)) {
                    return $query->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET);
                }
            })
            ->where(function ($query) use ($daDuyet) {
                if (!empty($daDuyet)) {
                    return $query->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET);
                }
            })
            ->where(function ($query) use ($traLai) {
                if (!empty($traLai)) {
                    return $query->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_TRA_LAI);
                }
            })
            ->where(function ($query) use ($guiDuyet) {
                if (!empty($guiDuyet)) {
                    return $query->where('trang_thai_duyet_ho_so', null);
                }
            })
            ->where(function ($query) use ($queQuan) {
                if (!empty($queQuan)) {
                    return $query->where('que_quan', 'LIKE', "%$queQuan%");
                }
            })
            ->where(function ($query) use ($dangVienC) {
                if (!empty($dangVienC)) {
                    return $query->where('la_dang_vien',1);
                }
            })
            ->where(function ($query) use ($doanVien) {
                if (!empty($doanVien)) {
                    return $query->wherenotNull('ngay_vao_doan');
                }
            })
            ->where(function ($query) use ($boDoi) {
                if (!empty($boDoi)) {
                    return $query->where('da_di_bo_doi',1);
                }
            })
            ->where(function ($query) use ($CanBoBoNhiemLai) {
                if (!empty($CanBoBoNhiemLai)) {
                    return $query->where('can_bo_bo_nhiem_lai',1);
                }
            })
            ->where(function ($query) use ($CanBoBoNhiem) {
                if (!empty($CanBoBoNhiem)) {
                    return $query->where('can_bo_bo_nhiem',1);
                }
            })
            ->where(function ($query) use ($canBoSinhNhat) {
                if (!empty($canBoSinhNhat)) {
                    return $query->where('ngay_sinh',date('Y-m-d'));
                }
            })
            ->where(function ($query) use ($giaiNgu) {
                if (!empty($giaiNgu)) {
                    return $query->wherenotNull('ngay_giai_ngu');
                }
            })
            ->where(function ($query) use ($viTri) {
                if (!empty($viTri)) {
                    if ($viTri == 1) {
                        return $query->wherenotNull('vi_tri_cong_chuc');
                    } elseif ($viTri == 2) {
                        return $query->wherenotNull('vi_tri_vien_chuc');
                    } elseif ($viTri == 3) {
                        return $query->wherenotNull('vi_tri_nhan_vien');
                    }

                }
            })
            ->where(function ($query) use ($all) {
                if (!empty($all)) {
                    if ($all == 1 && !auth::user()->hasRole([QUAN_TRI_HT])) {
                        return $query->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET);
                    }
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
                    if (!auth::user()->hasRole([QUAN_TRI_HT])) {
                        return $query->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET);
                    }
                }
            })
            ->paginate(20);


        $danhSachToChuc = ToChuc::all();

        return view('themcanbo::index',
            compact('danhSach', 'danhSachToChuc', 'tenDonVi','title'));
    }
    public function tuoiDang(Request $request)
    {
        $hoTen = $request->get('ho_ten') ?? null;
        $queQuan = $request->get('que_quan') ?? null;
        $gioiTinh = $request->get('gioi_tinh') ?? null;
        $donViId = $request->get('don_vi_id') ?? null;

        $viTri = $request->get('vi_tri') ?? null;
        $all = $request->get('all') ?? null;
        $dangVienC = $request->get('dang_vienC') == 1 ?? null;
        $doanVien = $request->get('doan_vien') == 1 ?? null;
        $boDoi = $request->get('bo_doi') == 1 ?? null;
        $giaiNgu = $request->get('cho_duyet') == 1 ?? null;
        $choDuyet = $request->get('cho_duyet') == 1 ?? null;
        $daDuyet = $request->get('da_duyet') == 1 ?? null;
        $traLai = $request->get('tra_lai') == 1 ?? null;
        $guiDuyet = $request->get('gui_duyet') == 1 ?? null;

        $thongKe = $request->get('thong_ke') ?? null;
        $dangVien = $request->get('dang_vien') ?? null;
        $khenThuong = $request->get('khen_thuong') ?? null;
        $kyLuat = $request->get('ky_luat') ?? null;
        $chuyenCongTac = $request->get('chuyen_cong_tac') ?? null;
        $veHuu = $request->get('ve_huu') ?? null;
        $tuoiDang = $request->get('tuoidang') ?? null;
        $id = null;









        $id30 = null;
        $id40 = null;
        $id50 = null;
        $id60 = null;
        $id65 = null;
        $id70 = null;
        $id75 = null;
        $id80 = null;
        if($request->get('arrayId30')) {
            $id30 = \GuzzleHttp\json_decode($request->get('arrayId30'));
        }
        if ($request->get('arrayId40')) {
            $id40 = \GuzzleHttp\json_decode($request->get('arrayId40'));
        }
        if ($request->get('arrayId50')) {
            $id50 = \GuzzleHttp\json_decode($request->get('arrayId50'));
        }
        if ($request->get('arrayId60')) {
            $id60 = \GuzzleHttp\json_decode($request->get('arrayId60'));
        }
        if ($request->get('arrayId65')) {
            $id65 = \GuzzleHttp\json_decode($request->get('arrayId65'));
        }
        if ($request->get('arrayId70')) {
            $id70 = \GuzzleHttp\json_decode($request->get('arrayId70'));
        }
        if ($request->get('arrayId80')) {
            $id80 = \GuzzleHttp\json_decode($request->get('arrayId80'));
        }
        if ($request->get('arrayId75')) {
            $id75 = \GuzzleHttp\json_decode($request->get('arrayId75'));
        }


        if($request->get('arrayId30'))
        {
            $id = $id30;
        }elseif ($request->get('arrayId40'))
        {
            $id = $id40;
        }elseif ($request->get('arrayId50'))
        {
            $id = $id50;
        }elseif ($request->get('arrayId60'))
        {
            $id = $id60;
        }elseif ($request->get('arrayId65'))
        {
            $id = $id65;
        }elseif ($request->get('arrayId70'))
        {
            $id = $id70;
        }elseif ($request->get('arrayId75'))
        {
            $id = $id75;
        }elseif ($request->get('arrayId80'))
        {
            $id = $id80;
        }
        $now = date('Y-m-d');
        $danhSach = CanBo::first();
        $dang = $danhSach->ngay_vao_dang;


        $diff = abs(strtotime($now) - strtotime($dang));
        $years = floor($diff / (365 * 60 * 60 * 24));


        $tenDonVi = auth::user()->donVi->ten_don_vi;
        if (!empty($donViId)) {
            $tenDonVi = ToChuc::where('id', $donViId)->select('id', 'ten_don_vi')->first()->ten_don_vi;
        }

        $danhSach = CanBo::where(function ($query) use ($thongKe) {
            if (empty($thongKe)) {
                if (!auth::user()->hasRole([QUAN_TRI_HT])) {
                    return $query->where('don_vi_tao_id', auth::user()->don_vi_id);
                }
            }
        })

            ->where(function ($query) use ($hoTen) {
                if (!empty($hoTen)) {
                    return $query->where('ho_ten', 'LIKE', "%$hoTen%");
                }
            })
            ->where(function ($query) use ($id) {
                if (!empty($id)) {
                    return $query->whereIn('id', $id);
                }else{
                    return $query->where('id', null);
                }
            })
//            ->whereIn('id', $id)
            ->where(function ($query) use ($choDuyet) {
                if (!empty($choDuyet)) {
                    return $query->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET);
                }
            })
            ->where(function ($query) use ($daDuyet) {
                if (!empty($daDuyet)) {
                    return $query->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET);
                }
            })
            ->where(function ($query) use ($traLai) {
                if (!empty($traLai)) {
                    return $query->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_TRA_LAI);
                }
            })
            ->where(function ($query) use ($guiDuyet) {
                if (!empty($guiDuyet)) {
                    return $query->where('trang_thai_duyet_ho_so', null);
                }
            })
            ->where(function ($query) use ($queQuan) {
                if (!empty($queQuan)) {
                    return $query->where('que_quan', 'LIKE', "%$queQuan%");
                }
            })
            ->where(function ($query) use ($dangVienC) {
                if (!empty($dangVienC)) {
                    return $query->where('la_dang_vien',1);
                }
            })
            ->where(function ($query) use ($doanVien) {
                if (!empty($doanVien)) {
                    return $query->wherenotNull('ngay_vao_doan');
                }
            })
            ->where(function ($query) use ($boDoi) {
                if (!empty($boDoi)) {
                    return $query->where('da_di_bo_doi',1);
                }
            })
            ->where(function ($query) use ($giaiNgu) {
                if (!empty($giaiNgu)) {
                    return $query->wherenotNull('ngay_giai_ngu');
                }
            })
            ->where(function ($query) use ($viTri) {
                if (!empty($viTri)) {
                    if ($viTri == 1) {
                        return $query->wherenotNull('vi_tri_cong_chuc');
                    } elseif ($viTri == 2) {
                        return $query->wherenotNull('vi_tri_vien_chuc');
                    } elseif ($viTri == 3) {
                        return $query->wherenotNull('vi_tri_nhan_vien');
                    }

                }
            })
            ->where(function ($query) use ($all) {
                if (!empty($all)) {
                    if ($all == 1 && !auth::user()->hasRole([QUAN_TRI_HT])) {
                        return $query->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET);
                    }
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
                    if (!auth::user()->hasRole([QUAN_TRI_HT])) {
                        return $query->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET);
                    }
                }
            })
            ->paginate(20);


        $danhSachToChuc = ToChuc::all();

        return view('themcanbo::tuoi_dang',
            compact('danhSach', 'danhSachToChuc', 'tenDonVi'));
    }

    public function create()
    {
        $danToc = DanToc::orderBy('ten', 'asc')->get();
        $tonGiao = TonGiao::orderBy('ten', 'asc')->get();
        $thanhPho = ThanhPho::orderBy('ten', 'asc')->get();
        $chucVuHienTai = ChucVuHienTai::orderBy('ten', 'asc')->get();
        $donVi = ToChuc::where('parent_id', auth::user()->don_vi_id)->orwhere('id',auth::user()->don_vi_id)->orderBy('created_at', 'asc')->get();
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
        $canBo->ngay_cap_cmt = !empty($request->ngay_cap_cmt) ? formatYMD($request->ngay_cap_cmt) : null;
        $canBo->tuyen_dung_chinh_thuc = !empty($request->tuyen_dung_chinh_thuc) ? formatYMD($request->tuyen_dung_chinh_thuc) : null;
        $canBo->tuyen_dung_dau_tien = !empty($request->tuyen_dung_dau_tien) ? formatYMD($request->tuyen_dung_dau_tien) : null;
        $canBo->cmnd = $request->cmnd;
        $canBo->email = $request->email;
        $canBo->so_dien_thoai = $request->so_dien_thoai;
        $canBo->noi_cap = $request->noi_cap;
        $canBo->so_so_bao_hiem = $request->so_so_bao_hiem;
        $canBo->linh_vuc_theo_doi = $request->linh_vuc_theo_doi;
        $canBo->bi_danh = $request->bi_danh;
        $canBo->nghe_nghiep_truoc_khi_tuyen = $request->nghe_nghiep_truoc_khi_tuyen;
        $canBo->dan_toc = $request->dan_toc;
        $canBo->ton_giao = $request->ton_giao;

        $canBo->ngay_vao_don_vi = !empty($request->ngay_vao_don_vi) ? formatYMD($request->ngay_vao_don_vi) : null;
        $canBo->ngay_bo_nhiem_ngach = !empty($request->ngay_bo_nhiem_ngach) ? formatYMD($request->ngay_bo_nhiem_ngach) : null;
        $canBo->ngay_huong_vuot_khung = !empty($request->ngay_huong_vuot_khung) ? formatYMD($request->ngay_huong_vuot_khung) : null;
        $canBo->ngay_cap_bao_hiem = !empty($request->ngay_cap_bao_hiem) ? formatYMD($request->ngay_cap_bao_hiem) : null;
        $canBo->moc_xet_tang_luong = !empty($request->moc_xet_tang_luong) ? formatYMD($request->moc_xet_tang_luong) : null;
        $canBo->ngay_bo_nhiem_chuc_vu_hien_tai = !empty($request->ngay_bo_nhiem_chuc_vu_hien_tai) ? formatYMD($request->ngay_bo_nhiem_chuc_vu_hien_tai) : null;
        $canBo->ngay_bo_nhiem_chuc_vu_chuc_vu_kiem_nhiem = !empty($request->ngay_bo_nhiem_chuc_vu_chuc_vu_kiem_nhiem) ? formatYMD($request->ngay_bo_nhiem_chuc_vu_chuc_vu_kiem_nhiem) : null;

        $canBo->he_so_phu_cap_chuc_vu_hien_tai = $request->he_so_phu_cap_chuc_vu_hien_tai;
        $canBo->chuc_vu_kiem_nhiem = $request->chuc_vu_kiem_nhiem;
        $canBo->he_so_phu_cap_chuc_vu_chuc_vu_kiem_nhiem = $request->he_so_phu_cap_chuc_vu_chuc_vu_kiem_nhiem;
        $canBo->vi_tri_cong_chuc = $request->vi_tri_cong_chuc;
        $canBo->vi_tri_vien_chuc = $request->vi_tri_vien_chuc;
        $canBo->vi_tri_nhan_vien = $request->vi_tri_nhan_vien;
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
        $canBo->cb_btv_thanh_uy = $request->cb_btv_thanh_uy;
        $canBo->cb_btv_quan_uy = $request->cb_btv_quan_uy;
        $canBo->trung_uong = $request->trung_uong;


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


        UserLogs::saveUserLogs('Tạo hồ sơ cán bộ', $canBo);


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
