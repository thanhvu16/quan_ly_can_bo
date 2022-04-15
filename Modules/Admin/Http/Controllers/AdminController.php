<?php

namespace Modules\Admin\Http\Controllers;

use App\Common\AllPermission;
use App\Models\LichCongTac;
use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth, DB, File;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Modules\Admin\Entities\BinhBauPhanLoaiCanBo;
use Modules\Admin\Entities\CanBo;
use Modules\Admin\Entities\CauHinh;
use Modules\Admin\Entities\CongViecChuyenMon;
use Modules\Admin\Entities\DoiTuongQuanLy;
use Modules\Admin\Entities\DonVi;
use Modules\Admin\Entities\LoaiVanBan;
use Modules\Admin\Entities\LuuVetDangNhap;
use Modules\Admin\Entities\SoVanBan;
use Modules\Admin\Entities\TaiLieuHuongDan;
use Modules\CongViecDonVi\Entities\ChuyenNhanCongViecDonVi;
use Modules\CongViecDonVi\Entities\CongViecDonViGiaHan;
use Modules\CongViecDonVi\Entities\CongViecDonViPhoiHop;
use Modules\CongViecDonVi\Entities\GiaiQuyetCongViecDonVi;
use Modules\DieuHanhVanBanDen\Entities\ChuyenVienPhoiHop;
use Modules\DieuHanhVanBanDen\Entities\GiaHanVanBan;
use Modules\DieuHanhVanBanDen\Entities\GiaiQuyetVanBan;
use Modules\DieuHanhVanBanDen\Entities\LanhDaoChiDao;
use Modules\DieuHanhVanBanDen\Entities\LanhDaoXemDeBiet;
use Modules\DieuHanhVanBanDen\Entities\VanBanQuanTrong;
use Modules\DieuHanhVanBanDen\Entities\VanBanTraLai;
use Modules\LayVanBanTuEmail\Entities\GetEmail;
use Modules\LichCongTac\Entities\ThanhPhanDuHop;
use Modules\VanBanDen\Entities\VanBanDen;
use Modules\VanBanDi\Entities\CanBoPhongDuThao;
use Modules\VanBanDi\Entities\CanBoPhongDuThaoKhac;
use Modules\VanBanDi\Entities\Duthaovanbandi;
use Modules\VanBanDi\Entities\NoiNhanVanBanDi;
use Modules\VanBanDi\Entities\VanBanDi;
use Modules\VanBanDi\Entities\VanBanDiChoDuyet;
use Modules\DieuHanhVanBanDen\Entities\XuLyVanBanDen;
use Modules\DieuHanhVanBanDen\Entities\DonViChuTri;
use Modules\DieuHanhVanBanDen\Entities\DonViPhoiHop;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

//    public static function layDBT()
//    {
//            $db = \Session()->get('tenDB');
//            dd($db);
//            return $db;
//    }
    public function vetDangNhap(Request $request)
    {
        $ten = $request->get('ten');
        $taiKhoan = $request->get('tai_khoan');
        $ngay = $request->get('ngay');

        $duLieu = LuuVetDangNhap::where(function ($query) use ($ten) {
            if (!empty($ten)) {
                return $query->where(DB::raw('lower(ho_ten)'), 'LIKE', "%" . mb_strtolower($ten) . "%");
            }
        })
            ->where(function ($query) use ($taiKhoan) {
                if (!empty($taiKhoan)) {
                    return $query->where(DB::raw('lower(tai_khoan)'), 'LIKE', "%" . mb_strtolower($taiKhoan) . "%");
                }
            })
            ->where(function ($query) use ($ngay) {
                if (!empty($ngay)) {
                    return $query->wheredate('created_at', formatYMD($ngay));
                }
            })->paginate(PER_PAGE);
        return view('admin::VetDangNhap', compact('duLieu'));
    }

    public function taiLieuHuongDan()
    {
        $taiLieu = TaiLieuHuongDan::paginate(PER_PAGE);
        return view('admin::uploadFile', compact('taiLieu'));
    }

    public function cauHinhHeThong()
    {
        $cauHinh = CauHinh::first();
        return view('admin::cauHinh', compact('cauHinh'));
    }

    public function postCauHinh(Request $request, $id)
    {
        $cauHinh = CauHinh::first();
        $cauHinh->ten_don_vi = $request->ten_don_vi;
        $cauHinh->dia_chi = $request->dia_chi;
        $cauHinh->dien_thoai = $request->dien_thoai;
        $cauHinh->Fax = $request->Fax;
        $cauHinh->thu_dien_tu = $request->thu_dien_tu;
        $cauHinh->mat_khau_dien_tu = $request->mat_khau_dien_tu;
        $cauHinh->host = $request->host;
        $cauHinh->port_smtp = $request->port_smtp;
        $cauHinh->port_pop3 = $request->port_pop3;
        $cauHinh->bao_mat = $request->bao_mat;
        $cauHinh->licht7 = $request->licht7;
        $cauHinh->lichcn = $request->lichcn;
        $cauHinh->save();
        return redirect()->back()->with('cập nhật thành công');
    }

    public function xoafile($id)
    {
        $taiLieu = TaiLieuHuongDan::where('id', $id)->delete();
        return redirect()->back()->with('xóa file thành công');
    }

    public function postTaiLieuThamKhao(Request $request)
    {
        $uploadPath = UPLOAD_FILE_TAI_LIEU;
        $file = !empty($request['ten_file']) ? $request['ten_file'] : null;
        if ($file && count($file) > 0) {
            foreach ($file as $key => $getFile) {
                $extFile = $getFile->extension();
                $fileTaiLieu = new TaiLieuHuongDan();
                $fileName = date('Y_m_d') . '_' . Time() . '_' . $getFile->getClientOriginalName();

                $urlFile = UPLOAD_FILE_TAI_LIEU . '/' . $fileName;
                if (!File::exists($uploadPath)) {
                    File::makeDirectory($uploadPath, 0777, true, true);
                }
                $getFile->move($uploadPath, $fileName);

                $fileTaiLieu->ten_file = $fileName;
                $fileTaiLieu->duong_dan = $urlFile;
                $fileTaiLieu->duoi_file = $extFile;
                $fileTaiLieu->save();

            }

        }

        return redirect()->back()
            ->with('success', 'Thêm file thành công !');
    }

    public function setDB(Request $request)
    {
        if ($request->year == 2021) {
            \Config::set('database.connections.sqlsrv.database', 'so_tai_nguyen_moi_truong');
            \Session::put('tenDB', 'so_tai_nguyen_moi_truong');
            \Session::put('nam', $request->year);

        } else {
            \Config::set('database.connections.sqlsrv.database', 'so_tai_nguyen_moi_truong' . $request->get('year'));
            \Session::put('tenDB', 'so_tai_nguyen_moi_truong_' . $request->get('year'));
            \Session::put('nam', $request->year);

        }
        return redirect()->back();

    }

    public function danhMucHeThong()
    {

        return view('admin::danhMuc');
    }

    public function index()
    {

        if (auth::user()->hasRole(LANH_DAO) && auth::user()->donVi->parent_id == 0) {
            return redirect()->route('nangCao');
        }

        $hoSoCanBoPiceCharts = [];
        $hoSoCanBoCoLors = [];

        $thongKeDangPiceCharts = [];
        $thongKeDangCoLors = [];

        $quanLyPiceCharts = [];
        $quanLyCoLors = [];

        $chuyenMonPiceCharts = [];
        $chuyenMonCoLors = [];

        $thongKeCanBoPiceCharts = [];
        $thongKeCanBoCoLors = [];

        $hoSocanBoChoGuiDuyet = 0;
        $hoSoGuiDuyetBiTraLai = 0;

//        vị trí tuyển dung
        $tongSoCongChuc = 0;
        $tongSoVienChuc = 0;
        $tongSoNhanVien = 0;
        $viTriPiceCharts = [];
        $viTriCoLors = [];

        $tongCanBoTrongDonVi = 0;
        $tongSoNamTrongDonVi = 0;
        $tongSoNuTrongDonVi = 0;
        $tongSoHoSoVeHuu = 0;

        //đảng
        $tongSoDangVien = 0;
        $tongSoDoanVien = 0;
        $tongSoDiBoDoi = 0;
        $tongSoGiaiNgu = 0;

        //quản lý cán bộ
        $tonghoSoChoDuyet = 0;
        $tongSoDaDuyet = 0;
        $tongSoBiTraLai = 0;
        $tongSoChoGuiDuyet = 0;

        //chuyên môn
        $trenDaiHoc = 0;
        $daiHoc = 0;
        $caoDang = 0;
        $trungCap = 0;
        $soCap = 0;
        //cảnh báo
        $ngay = 2;
        $date = date('Y-m-d');
        $newdate = strtotime("+$ngay day", strtotime($date));
        $newdate = date('Y-m-j', $newdate);
        $CanhBaoCoLors = [];
        $canhBaoPiceCharts = [];
        $canBoSapNhanQDVeHuu = 0;
        $canBoSapNangLuong = 0;
        $canBoSinhNhat = 0;
        $CanBoBoNhiem = 0;
        $CanBoBoNhiemLai = 0;


        $trenDaiHocID = CongViecChuyenMon::where('ten', 'like', '%Trên đại học%')->first();
        $daiHocID = CongViecChuyenMon::where('ten', 'like', '%Đại học%')->first();
        $caoDangID = CongViecChuyenMon::where('ten', 'like', '%Cao đẳng%')->first();
        $trungCapID = CongViecChuyenMon::where('ten', 'like', '%Trung cấp%')->first();
        $soCapID = CongViecChuyenMon::where('ten', 'like', '%Sơ cấp%')->first();


//        trinh_do_chuyen_mon_cao_nhat_id


        array_push($hoSoCanBoPiceCharts, array('Task', 'Danh sách'));
        array_push($viTriPiceCharts, array('Task', 'Danh sách'));
        array_push($thongKeCanBoPiceCharts, array('Task', 'Danh sách'));
        array_push($thongKeDangPiceCharts, array('Task', 'Danh sách'));
        array_push($quanLyPiceCharts, array('Task', 'Danh sách'));
        array_push($chuyenMonPiceCharts, array('Task', 'Danh sách'));


        if (auth::user()->hasRole([CAN_BO])) {
            $hoSocanBoChoGuiDuyet = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->whereNull('trang_thai_duyet_ho_so')
                ->count();
            array_push($hoSoCanBoPiceCharts, array('Hồ sơ chờ gửi duyệt lãnh đạo', $hoSocanBoChoGuiDuyet));
            array_push($hoSoCanBoCoLors, COLOR_WARNING);


            //cán bộ đơn vị
            $tongCanBoTrongDonVi = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->count();

            $tongSoNamTrongDonVi = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->where('gioi_tinh', CanBo::GIOI_TINH_NAM)->count();

            $tongSoNuTrongDonVi = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->where('gioi_tinh', CanBo::GIOI_TINH_NU)->count();

            $tongSoHoSoVeHuu = CanBo::whereHas('veHuu')->where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->count();

            array_push($thongKeCanBoPiceCharts, array('Tổng số', $tongCanBoTrongDonVi));
            array_push($thongKeCanBoCoLors, COLOR_GREEN);

            array_push($thongKeCanBoPiceCharts, array('Tổng hồ sơ nam', $tongSoNamTrongDonVi));
            array_push($thongKeCanBoCoLors, COLOR_INFO);

            array_push($thongKeCanBoPiceCharts, array('Tổng hồ sơ nữ', $tongSoNuTrongDonVi));
            array_push($thongKeCanBoCoLors, COLOR_ORANGE);

            array_push($thongKeCanBoPiceCharts, array('Tổng hồ về hưu', $tongSoHoSoVeHuu));
            array_push($thongKeCanBoCoLors, COLOR_PURPLE);
            //end cán bộ đơn vị

            //Trình độ
            $trenDaiHoc = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->where('trinh_do_chuyen_mon_cao_nhat_id', $trenDaiHocID->id)
                ->count();
            $daiHoc = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->where('trinh_do_chuyen_mon_cao_nhat_id', $daiHocID->id)
                ->count();
            $caoDang = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->where('trinh_do_chuyen_mon_cao_nhat_id', $caoDangID->id)
                ->count();
            $trungCap = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->where('trinh_do_chuyen_mon_cao_nhat_id', $trungCapID->id)
                ->count();
            $soCap = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->where('trinh_do_chuyen_mon_cao_nhat_id', $soCapID->id)
                ->count();

            array_push($chuyenMonPiceCharts, array('Trên đại học', $trenDaiHoc));
            array_push($chuyenMonCoLors, COLOR_GREEN);

            array_push($chuyenMonPiceCharts, array('Đại học', $daiHoc));
            array_push($chuyenMonCoLors, COLOR_INFO);

            array_push($chuyenMonPiceCharts, array('Cao đẳng', $caoDang));
            array_push($chuyenMonCoLors, COLOR_ORANGE);

            array_push($chuyenMonPiceCharts, array('Trung cấp', $trungCap));
            array_push($chuyenMonCoLors, COLOR_PURPLE);

            array_push($chuyenMonPiceCharts, array('Sơ cấp', $soCap));
            array_push($chuyenMonCoLors, COLOR_RED);

            //kết thúc


            //start vị trí
            $tongSoCongChuc = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->wherenotNull('vi_tri_cong_chuc')
                ->count();
            array_push($viTriPiceCharts, array('Tổng số hồ sơ công chức', $tongSoCongChuc));
            array_push($viTriCoLors, COLOR_INFO);
            $tongSoVienChuc = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->wherenotNull('vi_tri_vien_chuc')
                ->count();
            array_push($viTriPiceCharts, array('Tổng số hồ sơ viên chức', $tongSoVienChuc));
            array_push($viTriCoLors, COLOR_ORANGE);
            $tongSoNhanVien = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->wherenotNull('vi_tri_nhan_vien')
                ->count();
            array_push($viTriPiceCharts, array('Tổng số hồ sơ nhân viên', $tongSoNhanVien));
            array_push($viTriCoLors, COLOR_PURPLE);
            //end vị trí


            //start đảng viên
            $tongSoDangVien = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->where('la_dang_vien', 1)
                ->count();
            array_push($thongKeDangPiceCharts, array('Tổng số đảng viên', $tongSoDangVien));
            array_push($thongKeDangCoLors, COLOR_GREEN);

            $tongSoDoanVien = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->wherenotNull('ngay_vao_doan')
                ->count();

            array_push($thongKeDangPiceCharts, array('Tổng số đoàn viên', $tongSoDoanVien));
            array_push($thongKeDangCoLors, COLOR_INFO);
            $tongSoDiBoDoi = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->where('da_di_bo_doi', 1)
                ->count();
            array_push($thongKeDangPiceCharts, array('Tổng số đã đi bộ đội', $tongSoDiBoDoi));
            array_push($thongKeDangCoLors, COLOR_ORANGE);
            $tongSoGiaiNgu = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->wherenotNull('ngay_giai_ngu')
                ->count();
            array_push($thongKeDangPiceCharts, array('Tổng số giải ngũ', $tongSoGiaiNgu));
            array_push($thongKeDangCoLors, COLOR_PURPLE);
            //end đảng viên


            $hoSoGuiDuyetBiTraLai = CanBo::with('trinhTuTraLaiHoSoCanBoNhap')
                ->whereHas('trinhTuTraLaiHoSoCanBoNhap')
                ->where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_TRA_LAI)
                ->count();

            array_push($thongKeDangPiceCharts, array('Hồ sơ gửi duyệt bị trả lại', $hoSoGuiDuyetBiTraLai));
            array_push($thongKeDangCoLors, COLOR_RED);
            //cảnh báo
            $canBoSapNhanQDVeHuu = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->where('ngay_ve_huu', $newdate)->count();
            $canBoSapNangLuong = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->where('moc_xet_tang_luong', $newdate)->count();
            $canBoSinhNhat = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->where('ngay_sinh', $date)->count();
            $CanBoBoNhiem = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->where('can_bo_bo_nhiem', 1)->count();
            $CanBoBoNhiemLai = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->where('can_bo_bo_nhiem_lai', 1)->count();

            //đối tượng cán bộ
            $doiTuongPiceCharts = [];
            $doiTuongCoLors = [];

            array_push($doiTuongPiceCharts, array('Task', 'Số lượng'));
            $doiTuongCanBo = BinhBauPhanLoaiCanBo::all();
            foreach ($doiTuongCanBo as $cb) {
                $canBoDT = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                    ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                    ->where('phan_loai_cb', $cb->id)
                    ->count();
                array_push($doiTuongPiceCharts, array($cb->ten, $canBoDT));

            }
            //kết thúc


//             return redirect()->route('ho_so_can_bo.cho_gui_duyet');
        }
//
        if (auth::user()->hasRole([LANH_DAO])) {

            $hoSocanBoChoGuiDuyet = CanBo::whereHas('trinhTuChoDuyetHoSo')
                ->where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET)
                ->count();

            array_push($hoSoCanBoPiceCharts, array('Hồ sơ chờ duyệt', $hoSocanBoChoGuiDuyet));
            array_push($hoSoCanBoCoLors, COLOR_WARNING);

            $hoSoGuiDuyetBiTraLai = CanBo::with('trinhTuTraLaiHoSo')
                ->whereHas('trinhTuTraLaiHoSo')
                ->where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_TRA_LAI)
                ->count();

            array_push($hoSoCanBoPiceCharts, array('Hồ sơ gửi trả lại', $hoSoGuiDuyetBiTraLai));
            array_push($hoSoCanBoCoLors, COLOR_RED);

            //cán bộ đơn vị
            $tongCanBoTrongDonVi = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->count();

            $tongSoNamTrongDonVi = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->where('gioi_tinh', CanBo::GIOI_TINH_NAM)->count();

            $tongSoNuTrongDonVi = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->where('gioi_tinh', CanBo::GIOI_TINH_NU)->count();

            $tongSoHoSoVeHuu = CanBo::whereHas('veHuu')->where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->count();

            array_push($thongKeCanBoPiceCharts, array('Tổng số', $tongCanBoTrongDonVi));
            array_push($thongKeCanBoCoLors, COLOR_GREEN);

            array_push($thongKeCanBoPiceCharts, array('Tổng hồ sơ nam', $tongSoNamTrongDonVi));
            array_push($thongKeCanBoCoLors, COLOR_INFO);

            array_push($thongKeCanBoPiceCharts, array('Tổng hồ sơ nữ', $tongSoNuTrongDonVi));
            array_push($thongKeCanBoCoLors, COLOR_ORANGE);

            array_push($thongKeCanBoPiceCharts, array('Tổng hồ về hưu', $tongSoHoSoVeHuu));
            array_push($thongKeCanBoCoLors, COLOR_PURPLE);
            //end cán bộ đơn vị


            //start vị trí
            $tongSoCongChuc = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->wherenotNull('vi_tri_cong_chuc')
                ->count();
            array_push($viTriPiceCharts, array('Tổng số hồ sơ công chức', $tongSoCongChuc));
            array_push($viTriCoLors, COLOR_INFO);
            $tongSoVienChuc = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->wherenotNull('vi_tri_vien_chuc')
                ->count();
            array_push($viTriPiceCharts, array('Tổng số hồ sơ viên chức', $tongSoVienChuc));
            array_push($viTriCoLors, COLOR_ORANGE);
            $tongSoNhanVien = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->wherenotNull('vi_tri_nhan_vien')
                ->count();
            array_push($viTriPiceCharts, array('Tổng số hồ sơ nhân viên', $tongSoNhanVien));
            array_push($viTriCoLors, COLOR_PURPLE);
            //end vị trí

            //start đảng viên
            $tongSoDangVien = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->where('la_dang_vien', 1)
                ->count();
            array_push($thongKeDangPiceCharts, array('Tổng số đảng viên', $tongSoDangVien));
            array_push($thongKeDangCoLors, COLOR_GREEN);

            $tongSoDoanVien = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->wherenotNull('ngay_vao_doan')
                ->count();

            array_push($thongKeDangPiceCharts, array('Tổng số đoàn viên', $tongSoDoanVien));
            array_push($thongKeDangCoLors, COLOR_INFO);
            $tongSoDiBoDoi = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->where('da_di_bo_doi', 1)
                ->count();
            array_push($thongKeDangPiceCharts, array('Tổng số đã đi bộ đội', $tongSoDiBoDoi));
            array_push($thongKeDangCoLors, COLOR_ORANGE);
            $tongSoGiaiNgu = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->wherenotNull('ngay_giai_ngu')
                ->count();
            array_push($thongKeDangPiceCharts, array('Tổng số giải ngũ', $tongSoGiaiNgu));
            array_push($thongKeDangCoLors, COLOR_PURPLE);
            //end đảng viên


            //Trình độ
            $trenDaiHoc = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->where('trinh_do_chuyen_mon_cao_nhat_id', $trenDaiHocID->id)
                ->count();
            $daiHoc = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->where('trinh_do_chuyen_mon_cao_nhat_id', $daiHocID->id)
                ->count();
            $caoDang = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->where('trinh_do_chuyen_mon_cao_nhat_id', $caoDangID->id)
                ->count();
            $trungCap = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->where('trinh_do_chuyen_mon_cao_nhat_id', $trungCapID->id)
                ->count();
            $soCap = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->where('trinh_do_chuyen_mon_cao_nhat_id', $soCapID->id)
                ->count();

            array_push($chuyenMonPiceCharts, array('Trên đại học', $trenDaiHoc));
            array_push($chuyenMonCoLors, COLOR_GREEN);

            array_push($chuyenMonPiceCharts, array('Đại học', $daiHoc));
            array_push($chuyenMonCoLors, COLOR_INFO);

            array_push($chuyenMonPiceCharts, array('Cao đẳng', $caoDang));
            array_push($chuyenMonCoLors, COLOR_ORANGE);

            array_push($chuyenMonPiceCharts, array('Trung cấp', $trungCap));
            array_push($chuyenMonCoLors, COLOR_PURPLE);

            array_push($chuyenMonPiceCharts, array('Sơ cấp', $soCap));
            array_push($chuyenMonCoLors, COLOR_RED);

            //kết thúc
            $canBoSapNhanQDVeHuu = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->where('ngay_ve_huu', $newdate)->count();
            $canBoSapNangLuong = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->where('moc_xet_tang_luong', $newdate)->count();
            $canBoSinhNhat = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->where('ngay_sinh', $date)->count();
            $CanBoBoNhiem = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->where('can_bo_bo_nhiem', 1)->count();
            $CanBoBoNhiemLai = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->where('can_bo_bo_nhiem_lai', 1)->count();

            array_push($canhBaoPiceCharts, array('Task', 'Danh sách'));
            array_push($canhBaoPiceCharts, array('Cán bộ sắp nhận quyết định về hưu', $canBoSapNhanQDVeHuu));
            array_push($CanhBaoCoLors, COLOR_GREEN);

            array_push($canhBaoPiceCharts, array('Cán bộ sắp được nâng lương', $canBoSapNangLuong));
            array_push($CanhBaoCoLors, COLOR_INFO);

            array_push($canhBaoPiceCharts, array('Cán bộ được bổ nhiệm', $CanBoBoNhiem));
            array_push($CanhBaoCoLors, COLOR_ORANGE);

            array_push($canhBaoPiceCharts, array('Cán bộ được bổ nhiệm lại', $CanBoBoNhiemLai));
            array_push($CanhBaoCoLors, COLOR_PURPLE);

            array_push($canhBaoPiceCharts, array('Cán bộ sinh nhật hôm nay', $canBoSinhNhat));
            array_push($CanhBaoCoLors, COLOR_RED);
            //đối tượng cán bộ
            $doiTuongPiceCharts = [];
            $doiTuongCoLors = [];

            array_push($doiTuongPiceCharts, array('Task', 'Số lượng'));
            $doiTuongCanBo = BinhBauPhanLoaiCanBo::all();
            foreach ($doiTuongCanBo as $cb) {
                $canBoDT = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                    ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                    ->where('phan_loai_cb', $cb->id)
                    ->count();
                array_push($doiTuongPiceCharts, array($cb->ten, $canBoDT));

            }
            //kết thúc


//            return redirect()->route('ho_so_can_bo.lanh_dao_cho_duyet');
        }
//        if (!auth::user()->hasRole([QUAN_TRI_HT])) {
        if (auth::user()->hasRole([QUAN_TRI_HT])) {

            //cán bộ đơn vị
            $tongCanBoTrongDonVi = CanBo::count();

            $tongSoNamTrongDonVi = CanBo::where('gioi_tinh', CanBo::GIOI_TINH_NAM)->count();

            $tongSoNuTrongDonVi = CanBo::where('gioi_tinh', CanBo::GIOI_TINH_NU)->count();

            $tongSoHoSoVeHuu = CanBo::whereHas('veHuu')->count();

            array_push($thongKeCanBoPiceCharts, array('Tổng số', $tongCanBoTrongDonVi));
            array_push($thongKeCanBoCoLors, COLOR_GREEN);

            array_push($thongKeCanBoPiceCharts, array('Tổng hồ sơ nam', $tongSoNamTrongDonVi));
            array_push($thongKeCanBoCoLors, COLOR_INFO);

            array_push($thongKeCanBoPiceCharts, array('Tổng hồ sơ nữ', $tongSoNuTrongDonVi));
            array_push($thongKeCanBoCoLors, COLOR_ORANGE);

            array_push($thongKeCanBoPiceCharts, array('Tổng hồ về hưu', $tongSoHoSoVeHuu));
            array_push($thongKeCanBoCoLors, COLOR_PURPLE);
            //end cán bộ đơn vị

            //start vị trí
            $tongSoCongChuc = CanBo::wherenotNull('vi_tri_cong_chuc')->count();
            array_push($viTriPiceCharts, array('Tổng số hồ sơ công chức', $tongSoCongChuc));
            array_push($viTriCoLors, COLOR_INFO);
            $tongSoVienChuc = CanBo::wherenotNull('vi_tri_vien_chuc')->count();
            array_push($viTriPiceCharts, array('Tổng số hồ sơ viên chức', $tongSoVienChuc));
            array_push($viTriCoLors, COLOR_ORANGE);
            $tongSoNhanVien = CanBo::wherenotNull('vi_tri_nhan_vien')->count();
            array_push($viTriPiceCharts, array('Tổng số hồ sơ nhân viên', $tongSoNhanVien));
            array_push($viTriCoLors, COLOR_PURPLE);
            //end vị trí

            //start đảng viên
            $tongSoDangVien = CanBo::where('la_dang_vien', 1)
                ->count();
            array_push($thongKeDangPiceCharts, array('Tổng số đảng viên', $tongSoDangVien));
            array_push($thongKeDangCoLors, COLOR_GREEN);

            $tongSoDoanVien = CanBo::wherenotNull('ngay_vao_doan')
                ->count();

            array_push($thongKeDangPiceCharts, array('Tổng số đoàn viên', $tongSoDoanVien));
            array_push($thongKeDangCoLors, COLOR_INFO);
            $tongSoDiBoDoi = CanBo::where('da_di_bo_doi', 1)
                ->count();
            array_push($thongKeDangPiceCharts, array('Tổng số đã đi bộ đội', $tongSoDiBoDoi));
            array_push($thongKeDangCoLors, COLOR_ORANGE);
            $tongSoGiaiNgu = CanBo::wherenotNull('ngay_giai_ngu')
                ->count();
            array_push($thongKeDangPiceCharts, array('Tổng số giải ngũ', $tongSoGiaiNgu));
            array_push($thongKeDangCoLors, COLOR_PURPLE);
            //end đảng viên

            //quản lý
            $tonghoSoChoDuyet = CanBo::where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET)
                ->count();


            $tongSoDaDuyet = CanBo::where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)->count();

            $tongSoBiTraLai = CanBo::where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_TRA_LAI)->count();

            $tongSoChoGuiDuyet = CanBo::where('trang_thai_duyet_ho_so', null)
                ->count();

            array_push($quanLyPiceCharts, array('Tổng số hồ sơ chờ duyệt', $tonghoSoChoDuyet));
            array_push($quanLyCoLors, COLOR_GREEN);

            array_push($quanLyPiceCharts, array('Tổng hồ sơ đã duyệt', $tongSoDaDuyet));
            array_push($quanLyCoLors, COLOR_INFO);

            array_push($quanLyPiceCharts, array('Tổng hồ sơ bị trả lại', $tongSoBiTraLai));
            array_push($quanLyCoLors, COLOR_ORANGE);

            array_push($quanLyPiceCharts, array('Tổng hồ sơ chờ gửi duyệt ', $tongSoChoGuiDuyet));
            array_push($quanLyCoLors, COLOR_PURPLE);
            //end quản lý

            //Trình độ
            $trenDaiHoc = CanBo::where('trinh_do_chuyen_mon_cao_nhat_id', $trenDaiHocID->id)
                ->count();
            $daiHoc = CanBo::where('trinh_do_chuyen_mon_cao_nhat_id', $daiHocID->id)
                ->count();
            $caoDang = CanBo::where('trinh_do_chuyen_mon_cao_nhat_id', $caoDangID->id)
                ->count();
            $trungCap = CanBo::where('trinh_do_chuyen_mon_cao_nhat_id', $trungCapID->id)
                ->count();
            $soCap = CanBo::where('trinh_do_chuyen_mon_cao_nhat_id', $soCapID->id)
                ->count();

            array_push($chuyenMonPiceCharts, array('Trên đại học', $trenDaiHoc));
            array_push($chuyenMonCoLors, COLOR_GREEN);

            array_push($chuyenMonPiceCharts, array('Đại học', $daiHoc));
            array_push($chuyenMonCoLors, COLOR_INFO);

            array_push($chuyenMonPiceCharts, array('Cao đẳng', $caoDang));
            array_push($chuyenMonCoLors, COLOR_ORANGE);

            array_push($chuyenMonPiceCharts, array('Trung cấp', $trungCap));
            array_push($chuyenMonCoLors, COLOR_PURPLE);

            array_push($chuyenMonPiceCharts, array('Sơ cấp', $soCap));
            array_push($chuyenMonCoLors, COLOR_RED);

            //kết thúc



            $canBoSapNhanQDVeHuu = CanBo::where('ngay_ve_huu', $newdate)->count();
            $canBoSapNangLuong = CanBo::where('moc_xet_tang_luong', $newdate)->count();
            $canBoSinhNhat = CanBo::where('ngay_sinh', $date)->count();
            $CanBoBoNhiem = CanBo::where('can_bo_bo_nhiem', 1)->count();
            $CanBoBoNhiemLai = CanBo::where('can_bo_bo_nhiem_lai', 1)->count();

            array_push($canhBaoPiceCharts, array('Task', 'Danh sách'));
            array_push($canhBaoPiceCharts, array('Cán bộ sắp nhận quyết định về hưu', $canBoSapNhanQDVeHuu));
            array_push($CanhBaoCoLors, COLOR_GREEN);

            array_push($canhBaoPiceCharts, array('Cán bộ sắp được nâng lương', $canBoSapNangLuong));
            array_push($CanhBaoCoLors, COLOR_INFO);

            array_push($canhBaoPiceCharts, array('Cán bộ được bổ nhiệm', $CanBoBoNhiem));
            array_push($CanhBaoCoLors, COLOR_ORANGE);

            array_push($canhBaoPiceCharts, array('Cán bộ được bổ nhiệm lại', $CanBoBoNhiemLai));
            array_push($CanhBaoCoLors, COLOR_PURPLE);

            array_push($canhBaoPiceCharts, array('Cán bộ sinh nhật hôm nay', $canBoSinhNhat));
            array_push($CanhBaoCoLors, COLOR_RED);

//            kết thúc

            //đối tượng cán bộ
            $doiTuongPiceCharts = [];
            $doiTuongCoLors = [];

            array_push($doiTuongPiceCharts, array('Task', 'Số lượng'));
            $doiTuongCanBo = BinhBauPhanLoaiCanBo::all();
            foreach ($doiTuongCanBo as $cb) {
                $canBoDT = CanBo::where('phan_loai_cb', $cb->id)
                    ->count();
                array_push($doiTuongPiceCharts, array($cb->ten, $canBoDT));

            }
            //kết thúc

        }


//
//        if (auth::user()->hasRole([QUAN_TRI_HT])) {
//            return redirect()->route('nguoi-dung.index');
//        }


        return view('admin::index',
            [
                'canhBaoPiceCharts' => $canhBaoPiceCharts,
                'CanhBaoCoLors' => $CanhBaoCoLors,
                'canBoSapNhanQDVeHuu' => $canBoSapNhanQDVeHuu,
                'canBoSapNangLuong' => $canBoSapNangLuong,
                'canBoSinhNhat' => $canBoSinhNhat,
                'CanBoBoNhiem' => $CanBoBoNhiem,
                'CanBoBoNhiemLai' => $CanBoBoNhiemLai,
                'doiTuongCoLors' => $doiTuongCoLors,
                'doiTuongPiceCharts' => $doiTuongPiceCharts,
                'hoSoCanBoPiceCharts' => $hoSoCanBoPiceCharts,
                'hoSoCanBoCoLors' => $hoSoCanBoCoLors,
                'hoSocanBoChoGuiDuyet' => $hoSocanBoChoGuiDuyet,
                'hoSoGuiDuyetBiTraLai' => $hoSoGuiDuyetBiTraLai,
                'thongKeCanBoPiceCharts' => $thongKeCanBoPiceCharts,
                'thongKeCanBoCoLors' => $thongKeCanBoCoLors,
                'tongCanBoTrongDonVi' => $tongCanBoTrongDonVi,
                'tongSoNamTrongDonVi' => $tongSoNamTrongDonVi,
                'tongSoNuTrongDonVi' => $tongSoNuTrongDonVi,
                'tongSoHoSoVeHuu' => $tongSoHoSoVeHuu,
                'tongSoCongChuc' => $tongSoCongChuc,
                'tongSoVienChuc' => $tongSoVienChuc,
                'tongSoNhanVien' => $tongSoNhanVien,
                'viTriPiceCharts' => $viTriPiceCharts,
                'viTriCoLors' => $viTriCoLors,
                'thongKeDangPiceCharts' => $thongKeDangPiceCharts,
                'thongKeDangCoLors' => $thongKeDangCoLors,
                'tongSoDangVien' => $tongSoDangVien,
                'tongSoDoanVien' => $tongSoDoanVien,
                'tongSoDiBoDoi' => $tongSoDiBoDoi,
                'tongSoGiaiNgu' => $tongSoGiaiNgu,
                'quanLyPiceCharts' => $quanLyPiceCharts,
                'quanLyCoLors' => $quanLyCoLors,
                'tonghoSoChoDuyet' => $tonghoSoChoDuyet,
                'tongSoDaDuyet' => $tongSoDaDuyet,
                'tongSoBiTraLai' => $tongSoBiTraLai,
                'tongSoChoGuiDuyet' => $tongSoChoGuiDuyet,
                'trenDaiHoc' => $trenDaiHoc,
                'daiHoc' => $daiHoc,
                'caoDang' => $caoDang,
                'trungCap' => $trungCap,
                'soCap' => $soCap,
                'trenDaiHocID' => $trenDaiHocID,
                'daiHocID' => $daiHocID,
                'caoDangID' => $caoDangID,
                'trungCapID' => $trungCapID,
                'soCapID' => $soCapID,
                'chuyenMonPiceCharts' => $chuyenMonPiceCharts,
                'chuyenMonCoLors' => $chuyenMonCoLors,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
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
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
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

    public function createBackup()
    {
        try {
            // start the backup process
            Artisan::call('backup:run --only-db');
            $output = Artisan::output();
            // log the results
            Log::info("Backpack\BackupManager -- new backup started from admin interface \r\n" . $output);
            // return the results as a response to the ajax call
            return redirect()->back()->with('success', 'Tạo mới sao lưu thành công.');
        } catch (Exception $e) {
            dd($e);
            return redirect()->back();
        }
    }

    public function exportDatabase()
    {
        $disk = Storage::disk(config('backup.backup.destination.disks')[0]);
        $files = $disk->files(config('backup.backup.name'));
        $backups = [];
        foreach ($files as $k => $f) {

            // only take the zip files into account
            if (substr($f, -4) == '.zip' && $disk->exists($f)) {
                $backups[] = [
                    'file_path' => $f,
                    'file_name' => str_replace(config('backup.backup.name') . '/', '', $f),
                    'file_size' => $disk->size($f),
                    'last_modified' => $disk->lastModified($f),
                ];
            }
        }

        // reverse the backups, so the newest one would be on top
        $backups = array_reverse($backups);

        return view('admin::backup.index', compact('backups'));
    }

    public function downloadBackup($file_name)
    {
        $file = config('backup.backup.name') . '/' . $file_name;

        $disk = Storage::disk(config('backup.backup.destination.disks')[0]);
        if ($disk->exists($file)) {
            $fs = Storage::disk(config('backup.backup.destination.disks')[0])->getDriver();
            $stream = $fs->readStream($file);

            return \Response::stream(function () use ($stream) {
                fpassthru($stream);
            }, 200, [
                "Content-Type" => $fs->getMimetype($file),
                "Content-Length" => $fs->getSize($file),
                "Content-disposition" => "attachment; filename=\"" . basename($file) . "\"",
            ]);
        } else {
            abort(404, "The backup file doesn't exist.");
        }
    }

    public function deleteBackup($file_name)
    {
        $disk = Storage::disk(config('backup.backup.destination.disks')[0]);
        if ($disk->exists(config('backup.backup.name') . '/' . $file_name)) {
            $disk->delete(config('backup.backup.name') . '/' . $file_name);
            return redirect()->back()->with('success', "Đã xoá sao lưu dữ liệu!");
        } else {
            abort(404, "The backup file doesn't exist.");
        }
    }
}
