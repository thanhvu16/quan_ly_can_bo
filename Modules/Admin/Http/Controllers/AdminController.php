<?php

namespace Modules\Admin\Http\Controllers;

use App\Common\AllPermission;
use App\Models\LichCongTac;
use App\User;
use Carbon\Carbon;
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
use Modules\Admin\Entities\ToChuc;
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
        return redirect()->back()->with('c???p nh???t th??nh c??ng');
    }

    public function xoafile($id)
    {
        $taiLieu = TaiLieuHuongDan::where('id', $id)->delete();
        return redirect()->back()->with('x??a file th??nh c??ng');
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
            ->with('success', 'Th??m file th??nh c??ng !');
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

//        v??? tr?? tuy???n dung
        $tongSoCongChuc = 0;
        $tongSoVienChuc = 0;
        $tongSoNhanVien = 0;
        $viTriPiceCharts = [];
        $viTriCoLors = [];

        $tongCanBoTrongDonVi = 0;
        $tongSoNamTrongDonVi = 0;
        $tongSoNuTrongDonVi = 0;
        $tongSoHoSoVeHuu = 0;

        //?????ng
        $tongSoDangVien = 0;
        $tongSoDoanVien = 0;
        $tongSoDiBoDoi = 0;
        $tongSoGiaiNgu = 0;

        //qu???n l?? c??n b???
        $tonghoSoChoDuyet = 0;
        $tongSoDaDuyet = 0;
        $tongSoBiTraLai = 0;
        $tongSoChoGuiDuyet = 0;

        //chuy??n m??n
        $trenDaiHoc = 0;
        $daiHoc = 0;
        $caoDang = 0;
        $trungCap = 0;
        $soCap = 0;
        //c???nh b??o
        $ngay = 2;
        $date = date('Y-m-d');
        $newdate = strtotime("+$ngay day", strtotime($date));
        $newdate = date('Y-m-j', $newdate);

        $soNgayTru = strtotime("-$ngay day", strtotime($date));
        $ngayTru = date('Y-m-j', $soNgayTru);
        $namHH = strtotime ( '-20 year' , strtotime ( $ngayTru ) ) ;
        $newHH = date('Y-m-j', $namHH);
        //end

        $CanhBaoCoLors = [];
        $canhBaoPiceCharts = [];
        $canBoSapNhanQDVeHuu = 0;
        $canBoSapNangLuong = 0;
        $canBoSinhNhat = 0;
        $CanBoBoNhiem = 0;
        $CanBoBoNhiemLai = 0;


        $trenDaiHocID = CongViecChuyenMon::where('ten', 'like', '%Tr??n ?????i h???c%')->first();
        $daiHocID = CongViecChuyenMon::where('ten', 'like', '%?????i h???c%')->first();
        $caoDangID = CongViecChuyenMon::where('ten', 'like', '%Cao ?????ng%')->first();
        $trungCapID = CongViecChuyenMon::where('ten', 'like', '%Trung c???p%')->first();
        $soCapID = CongViecChuyenMon::where('ten', 'like', '%S?? c???p%')->first();


//        trinh_do_chuyen_mon_cao_nhat_id


        array_push($hoSoCanBoPiceCharts, array('Task', 'Danh s??ch'));
        array_push($viTriPiceCharts, array('Task', 'Danh s??ch'));
        array_push($thongKeCanBoPiceCharts, array('Task', 'Danh s??ch'));
        array_push($thongKeDangPiceCharts, array('Task', 'Danh s??ch'));
        array_push($quanLyPiceCharts, array('Task', 'Danh s??ch'));
        array_push($chuyenMonPiceCharts, array('Task', 'Danh s??ch'));


        if (auth::user()->hasRole([CAN_BO])) {
            $hoSocanBoChoGuiDuyet = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->whereNull('trang_thai_duyet_ho_so')
                ->count();
            array_push($hoSoCanBoPiceCharts, array('H??? s?? ch??? g???i duy???t l??nh ?????o', $hoSocanBoChoGuiDuyet));
            array_push($hoSoCanBoCoLors, COLOR_WARNING);


            //c??n b??? ????n v???
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

            array_push($thongKeCanBoPiceCharts, array('T???ng s???', $tongCanBoTrongDonVi));
            array_push($thongKeCanBoCoLors, COLOR_GREEN);

            array_push($thongKeCanBoPiceCharts, array('T???ng h??? s?? nam', $tongSoNamTrongDonVi));
            array_push($thongKeCanBoCoLors, COLOR_INFO);

            array_push($thongKeCanBoPiceCharts, array('T???ng h??? s?? n???', $tongSoNuTrongDonVi));
            array_push($thongKeCanBoCoLors, COLOR_ORANGE);

            array_push($thongKeCanBoPiceCharts, array('T???ng h??? v??? h??u', $tongSoHoSoVeHuu));
            array_push($thongKeCanBoCoLors, COLOR_PURPLE);
            //end c??n b??? ????n v???

            //Tr??nh ?????
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

            array_push($chuyenMonPiceCharts, array('Tr??n ?????i h???c', $trenDaiHoc));
            array_push($chuyenMonCoLors, COLOR_GREEN);

            array_push($chuyenMonPiceCharts, array('?????i h???c', $daiHoc));
            array_push($chuyenMonCoLors, COLOR_INFO);

            array_push($chuyenMonPiceCharts, array('Cao ?????ng', $caoDang));
            array_push($chuyenMonCoLors, COLOR_ORANGE);

            array_push($chuyenMonPiceCharts, array('Trung c???p', $trungCap));
            array_push($chuyenMonCoLors, COLOR_PURPLE);

            array_push($chuyenMonPiceCharts, array('S?? c???p', $soCap));
            array_push($chuyenMonCoLors, COLOR_RED);

            //k???t th??c


            //start v??? tr??
            $tongSoCongChuc = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->wherenotNull('vi_tri_cong_chuc')
                ->count();
            array_push($viTriPiceCharts, array('T???ng s??? h??? s?? c??ng ch???c', $tongSoCongChuc));
            array_push($viTriCoLors, COLOR_INFO);
            $tongSoVienChuc = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->wherenotNull('vi_tri_vien_chuc')
                ->count();
            array_push($viTriPiceCharts, array('T???ng s??? h??? s?? vi??n ch???c', $tongSoVienChuc));
            array_push($viTriCoLors, COLOR_ORANGE);
            $tongSoNhanVien = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->wherenotNull('vi_tri_nhan_vien')
                ->count();
            array_push($viTriPiceCharts, array('T???ng s??? h??? s?? nh??n vi??n', $tongSoNhanVien));
            array_push($viTriCoLors, COLOR_PURPLE);
            //end v??? tr??


            //start ?????ng vi??n
            $tongSoDangVien = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->where('la_dang_vien', 1)
                ->count();
            array_push($thongKeDangPiceCharts, array('T???ng s??? ?????ng vi??n', $tongSoDangVien));
            array_push($thongKeDangCoLors, COLOR_GREEN);

            $tongSoDoanVien = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->wherenotNull('ngay_vao_doan')
                ->count();

            array_push($thongKeDangPiceCharts, array('T???ng s??? ??o??n vi??n', $tongSoDoanVien));
            array_push($thongKeDangCoLors, COLOR_INFO);
            $tongSoDiBoDoi = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->where('da_di_bo_doi', 1)
                ->count();
            array_push($thongKeDangPiceCharts, array('T???ng s??? ???? ??i b??? ?????i', $tongSoDiBoDoi));
            array_push($thongKeDangCoLors, COLOR_ORANGE);
            $tongSoGiaiNgu = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->wherenotNull('ngay_giai_ngu')
                ->count();
            array_push($thongKeDangPiceCharts, array('T???ng s??? gi???i ng??', $tongSoGiaiNgu));
            array_push($thongKeDangCoLors, COLOR_PURPLE);
            //end ?????ng vi??n


            $hoSoGuiDuyetBiTraLai = CanBo::with('trinhTuTraLaiHoSoCanBoNhap')
                ->whereHas('trinhTuTraLaiHoSoCanBoNhap')
                ->where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_TRA_LAI)
                ->count();

            array_push($thongKeDangPiceCharts, array('H??? s?? g???i duy???t b??? tr??? l???i', $hoSoGuiDuyetBiTraLai));
            array_push($thongKeDangCoLors, COLOR_RED);
            //c???nh b??o

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
                ->where('ngay_vao_dang', $newHH)
                ->count();



            array_push($canhBaoPiceCharts, array('Task', 'Danh s??ch'));
            array_push($canhBaoPiceCharts, array('C??n b??? s???p nh???n quy???t ?????nh v??? h??u', $canBoSapNhanQDVeHuu));
            array_push($CanhBaoCoLors, COLOR_GREEN);

            array_push($canhBaoPiceCharts, array('C??n b??? s???p ???????c n??ng l????ng', $canBoSapNangLuong));
            array_push($CanhBaoCoLors, COLOR_INFO);

            array_push($canhBaoPiceCharts, array('C??n b??? s???p ???????c c???p huy hi???u ?????ng', $CanBoBoNhiem));
            array_push($CanhBaoCoLors, COLOR_ORANGE);

            array_push($canhBaoPiceCharts, array('C??n b??? sinh nh???t h??m nay', $canBoSinhNhat));
            array_push($CanhBaoCoLors, COLOR_RED);

            //?????i t?????ng c??n b???
            $doiTuongPiceCharts = [];
            $doiTuongCoLors = [];

            array_push($doiTuongPiceCharts, array('Task', 'S??? l?????ng'));
            $doiTuongCanBo = BinhBauPhanLoaiCanBo::all();
            foreach ($doiTuongCanBo as $cb) {
                $canBoDT = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                    ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                    ->where('phan_loai_cb', $cb->id)
                    ->count();
                array_push($doiTuongPiceCharts, array($cb->ten, $canBoDT));

            }
            //k???t th??c


//             return redirect()->route('ho_so_can_bo.cho_gui_duyet');
        }
//
        if (auth::user()->hasRole([LANH_DAO])) {

            $hoSocanBoChoGuiDuyet = CanBo::whereHas('trinhTuChoDuyetHoSo')
                ->where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET)
                ->count();

            array_push($hoSoCanBoPiceCharts, array('H??? s?? ch??? duy???t', $hoSocanBoChoGuiDuyet));
            array_push($hoSoCanBoCoLors, COLOR_WARNING);

            $hoSoGuiDuyetBiTraLai = CanBo::with('trinhTuTraLaiHoSo')
                ->whereHas('trinhTuTraLaiHoSo')
                ->where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_TRA_LAI)
                ->count();

            array_push($hoSoCanBoPiceCharts, array('H??? s?? g???i tr??? l???i', $hoSoGuiDuyetBiTraLai));
            array_push($hoSoCanBoCoLors, COLOR_RED);

            //c??n b??? ????n v???
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

            array_push($thongKeCanBoPiceCharts, array('T???ng s???', $tongCanBoTrongDonVi));
            array_push($thongKeCanBoCoLors, COLOR_GREEN);

            array_push($thongKeCanBoPiceCharts, array('T???ng h??? s?? nam', $tongSoNamTrongDonVi));
            array_push($thongKeCanBoCoLors, COLOR_INFO);

            array_push($thongKeCanBoPiceCharts, array('T???ng h??? s?? n???', $tongSoNuTrongDonVi));
            array_push($thongKeCanBoCoLors, COLOR_ORANGE);

            array_push($thongKeCanBoPiceCharts, array('T???ng h??? v??? h??u', $tongSoHoSoVeHuu));
            array_push($thongKeCanBoCoLors, COLOR_PURPLE);
            //end c??n b??? ????n v???


            //start v??? tr??
            $tongSoCongChuc = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->wherenotNull('vi_tri_cong_chuc')
                ->count();
            array_push($viTriPiceCharts, array('T???ng s??? h??? s?? c??ng ch???c', $tongSoCongChuc));
            array_push($viTriCoLors, COLOR_INFO);
            $tongSoVienChuc = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->wherenotNull('vi_tri_vien_chuc')
                ->count();
            array_push($viTriPiceCharts, array('T???ng s??? h??? s?? vi??n ch???c', $tongSoVienChuc));
            array_push($viTriCoLors, COLOR_ORANGE);
            $tongSoNhanVien = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->wherenotNull('vi_tri_nhan_vien')
                ->count();
            array_push($viTriPiceCharts, array('T???ng s??? h??? s?? nh??n vi??n', $tongSoNhanVien));
            array_push($viTriCoLors, COLOR_PURPLE);
            //end v??? tr??

            //start ?????ng vi??n
            $tongSoDangVien = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->where('la_dang_vien', 1)
                ->count();
            array_push($thongKeDangPiceCharts, array('T???ng s??? ?????ng vi??n', $tongSoDangVien));
            array_push($thongKeDangCoLors, COLOR_GREEN);

            $tongSoDoanVien = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->wherenotNull('ngay_vao_doan')
                ->count();

            array_push($thongKeDangPiceCharts, array('T???ng s??? ??o??n vi??n', $tongSoDoanVien));
            array_push($thongKeDangCoLors, COLOR_INFO);
            $tongSoDiBoDoi = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->where('da_di_bo_doi', 1)
                ->count();
            array_push($thongKeDangPiceCharts, array('T???ng s??? ???? ??i b??? ?????i', $tongSoDiBoDoi));
            array_push($thongKeDangCoLors, COLOR_ORANGE);
            $tongSoGiaiNgu = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->wherenotNull('ngay_giai_ngu')
                ->count();
            array_push($thongKeDangPiceCharts, array('T???ng s??? gi???i ng??', $tongSoGiaiNgu));
            array_push($thongKeDangCoLors, COLOR_PURPLE);
            //end ?????ng vi??n


            //Tr??nh ?????
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

            array_push($chuyenMonPiceCharts, array('Tr??n ?????i h???c', $trenDaiHoc));
            array_push($chuyenMonCoLors, COLOR_GREEN);

            array_push($chuyenMonPiceCharts, array('?????i h???c', $daiHoc));
            array_push($chuyenMonCoLors, COLOR_INFO);

            array_push($chuyenMonPiceCharts, array('Cao ?????ng', $caoDang));
            array_push($chuyenMonCoLors, COLOR_ORANGE);

            array_push($chuyenMonPiceCharts, array('Trung c???p', $trungCap));
            array_push($chuyenMonCoLors, COLOR_PURPLE);

            array_push($chuyenMonPiceCharts, array('S?? c???p', $soCap));
            array_push($chuyenMonCoLors, COLOR_RED);

            //k???t th??c
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
                ->where('ngay_vao_dang', $newHH)->count();
            $CanBoBoNhiemLai = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                ->where('can_bo_bo_nhiem_lai', 1)->count();

            array_push($canhBaoPiceCharts, array('Task', 'Danh s??ch'));
            array_push($canhBaoPiceCharts, array('C??n b??? s???p nh???n quy???t ?????nh v??? h??u', $canBoSapNhanQDVeHuu));
            array_push($CanhBaoCoLors, COLOR_GREEN);

            array_push($canhBaoPiceCharts, array('C??n b??? s???p ???????c n??ng l????ng', $canBoSapNangLuong));
            array_push($CanhBaoCoLors, COLOR_INFO);

            array_push($canhBaoPiceCharts, array('C??n b??? s???p ???????c c???p huy hi???u ?????ng', $CanBoBoNhiem));
            array_push($CanhBaoCoLors, COLOR_ORANGE);

            array_push($canhBaoPiceCharts, array('C??n b??? ???????c b??? nhi???m l???i', $CanBoBoNhiemLai));
            array_push($CanhBaoCoLors, COLOR_PURPLE);

            array_push($canhBaoPiceCharts, array('C??n b??? sinh nh???t h??m nay', $canBoSinhNhat));
            array_push($CanhBaoCoLors, COLOR_RED);
            //?????i t?????ng c??n b???
            $doiTuongPiceCharts = [];
            $doiTuongCoLors = [];

            array_push($doiTuongPiceCharts, array('Task', 'S??? l?????ng'));
            $doiTuongCanBo = BinhBauPhanLoaiCanBo::all();
            foreach ($doiTuongCanBo as $cb) {
                $canBoDT = CanBo::where('don_vi_tao_id', auth::user()->don_vi_id)
                    ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
                    ->where('phan_loai_cb', $cb->id)
                    ->count();
                array_push($doiTuongPiceCharts, array($cb->ten, $canBoDT));

            }
            //k???t th??c


//            return redirect()->route('ho_so_can_bo.lanh_dao_cho_duyet');
        }
//        if (!auth::user()->hasRole([QUAN_TRI_HT])) {
        if (auth::user()->hasRole([QUAN_TRI_HT])) {

            //c??n b??? ????n v???
            $tongCanBoTrongDonVi = CanBo::count();

            $tongSoNamTrongDonVi = CanBo::where('gioi_tinh', CanBo::GIOI_TINH_NAM)->count();

            $tongSoNuTrongDonVi = CanBo::where('gioi_tinh', CanBo::GIOI_TINH_NU)->count();

            $tongSoHoSoVeHuu = CanBo::whereHas('veHuu')->count();

            array_push($thongKeCanBoPiceCharts, array('T???ng s???', $tongCanBoTrongDonVi));
            array_push($thongKeCanBoCoLors, COLOR_GREEN);

            array_push($thongKeCanBoPiceCharts, array('T???ng h??? s?? nam', $tongSoNamTrongDonVi));
            array_push($thongKeCanBoCoLors, COLOR_INFO);

            array_push($thongKeCanBoPiceCharts, array('T???ng h??? s?? n???', $tongSoNuTrongDonVi));
            array_push($thongKeCanBoCoLors, COLOR_ORANGE);

            array_push($thongKeCanBoPiceCharts, array('T???ng h??? v??? h??u', $tongSoHoSoVeHuu));
            array_push($thongKeCanBoCoLors, COLOR_PURPLE);
            //end c??n b??? ????n v???

            //start v??? tr??
            $tongSoCongChuc = CanBo::wherenotNull('vi_tri_cong_chuc')->count();
            array_push($viTriPiceCharts, array('T???ng s??? h??? s?? c??ng ch???c', $tongSoCongChuc));
            array_push($viTriCoLors, COLOR_INFO);
            $tongSoVienChuc = CanBo::wherenotNull('vi_tri_vien_chuc')->count();
            array_push($viTriPiceCharts, array('T???ng s??? h??? s?? vi??n ch???c', $tongSoVienChuc));
            array_push($viTriCoLors, COLOR_ORANGE);
            $tongSoNhanVien = CanBo::wherenotNull('vi_tri_nhan_vien')->count();
            array_push($viTriPiceCharts, array('T???ng s??? h??? s?? nh??n vi??n', $tongSoNhanVien));
            array_push($viTriCoLors, COLOR_PURPLE);
            //end v??? tr??

            //start ?????ng vi??n
            $tongSoDangVien = CanBo::where('la_dang_vien', 1)
                ->count();
            array_push($thongKeDangPiceCharts, array('T???ng s??? ?????ng vi??n', $tongSoDangVien));
            array_push($thongKeDangCoLors, COLOR_GREEN);

            $tongSoDoanVien = CanBo::wherenotNull('ngay_vao_doan')
                ->count();

            array_push($thongKeDangPiceCharts, array('T???ng s??? ??o??n vi??n', $tongSoDoanVien));
            array_push($thongKeDangCoLors, COLOR_INFO);
            $tongSoDiBoDoi = CanBo::where('da_di_bo_doi', 1)
                ->count();
            array_push($thongKeDangPiceCharts, array('T???ng s??? ???? ??i b??? ?????i', $tongSoDiBoDoi));
            array_push($thongKeDangCoLors, COLOR_ORANGE);
            $tongSoGiaiNgu = CanBo::wherenotNull('ngay_giai_ngu')
                ->count();
            array_push($thongKeDangPiceCharts, array('T???ng s??? gi???i ng??', $tongSoGiaiNgu));
            array_push($thongKeDangCoLors, COLOR_PURPLE);
            //end ?????ng vi??n

            //qu???n l??
            $tonghoSoChoDuyet = CanBo::where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET)
                ->count();


            $tongSoDaDuyet = CanBo::where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)->count();

            $tongSoBiTraLai = CanBo::where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_TRA_LAI)->count();

            $tongSoChoGuiDuyet = CanBo::where('trang_thai_duyet_ho_so', null)
                ->count();

            array_push($quanLyPiceCharts, array('T???ng s??? h??? s?? ch??? duy???t', $tonghoSoChoDuyet));
            array_push($quanLyCoLors, COLOR_GREEN);

            array_push($quanLyPiceCharts, array('T???ng h??? s?? ???? duy???t', $tongSoDaDuyet));
            array_push($quanLyCoLors, COLOR_INFO);

            array_push($quanLyPiceCharts, array('T???ng h??? s?? b??? tr??? l???i', $tongSoBiTraLai));
            array_push($quanLyCoLors, COLOR_ORANGE);

            array_push($quanLyPiceCharts, array('T???ng h??? s?? ch??? g???i duy???t ', $tongSoChoGuiDuyet));
            array_push($quanLyCoLors, COLOR_PURPLE);
            //end qu???n l??

            //Tr??nh ?????
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

            array_push($chuyenMonPiceCharts, array('Tr??n ?????i h???c', $trenDaiHoc));
            array_push($chuyenMonCoLors, COLOR_GREEN);

            array_push($chuyenMonPiceCharts, array('?????i h???c', $daiHoc));
            array_push($chuyenMonCoLors, COLOR_INFO);

            array_push($chuyenMonPiceCharts, array('Cao ?????ng', $caoDang));
            array_push($chuyenMonCoLors, COLOR_ORANGE);

            array_push($chuyenMonPiceCharts, array('Trung c???p', $trungCap));
            array_push($chuyenMonCoLors, COLOR_PURPLE);

            array_push($chuyenMonPiceCharts, array('S?? c???p', $soCap));
            array_push($chuyenMonCoLors, COLOR_RED);

            //k???t th??c



            $canBoSapNhanQDVeHuu = CanBo::where('ngay_ve_huu', $newdate)->count();
            $canBoSapNangLuong = CanBo::where('moc_xet_tang_luong', $newdate)->count();
            $canBoSinhNhat = CanBo::where('ngay_sinh', $date)->count();
            $CanBoBoNhiem = CanBo::where('ngay_vao_dang', $newHH)->count();
            $CanBoBoNhiemLai = CanBo::where('can_bo_bo_nhiem_lai', 1)->count();

            array_push($canhBaoPiceCharts, array('Task', 'Danh s??ch'));
            array_push($canhBaoPiceCharts, array('C??n b??? s???p nh???n quy???t ?????nh v??? h??u', $canBoSapNhanQDVeHuu));
            array_push($CanhBaoCoLors, COLOR_GREEN);

            array_push($canhBaoPiceCharts, array('C??n b??? s???p ???????c n??ng l????ng', $canBoSapNangLuong));
            array_push($CanhBaoCoLors, COLOR_INFO);

            array_push($canhBaoPiceCharts, array('C??n b??? s???p ???????c c???p huy hi???u ?????ng', $CanBoBoNhiem));
            array_push($CanhBaoCoLors, COLOR_ORANGE);

            array_push($canhBaoPiceCharts, array('C??n b??? ???????c b??? nhi???m l???i', $CanBoBoNhiemLai));
            array_push($CanhBaoCoLors, COLOR_PURPLE);

            array_push($canhBaoPiceCharts, array('C??n b??? sinh nh???t h??m nay', $canBoSinhNhat));
            array_push($CanhBaoCoLors, COLOR_RED);

//            k???t th??c

            //?????i t?????ng c??n b???
            $doiTuongPiceCharts = [];
            $doiTuongCoLors = [];

            array_push($doiTuongPiceCharts, array('Task', 'S??? l?????ng'));
            $doiTuongCanBo = BinhBauPhanLoaiCanBo::all();
            foreach ($doiTuongCanBo as $cb) {
                $canBoDT = CanBo::where('phan_loai_cb', $cb->id)
                    ->count();
                array_push($doiTuongPiceCharts, array($cb->ten, $canBoDT));

            }
            //k???t th??c

        }

        $donVi = ToChuc::where(function ($query) {
            if (auth::user()->donVi && auth::user()->donVi->parent_id != 0) {
                return $query->where('id', auth::user()->don_vi_id)
                    ->orwhere('parent_id', auth::user()->don_vi_id);
            }
        })->get();
//
//        if (auth::user()->hasRole([QUAN_TRI_HT])) {
//            return redirect()->route('nguoi-dung.index');
//        }


        return view('admin::index',
            [
                'donVi' => $donVi,
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
            return redirect()->back()->with('success', 'T???o m???i sao l??u th??nh c??ng.');
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
            return redirect()->back()->with('success', "???? xo?? sao l??u d??? li???u!");
        } else {
            abort(404, "The backup file doesn't exist.");
        }
    }
}
