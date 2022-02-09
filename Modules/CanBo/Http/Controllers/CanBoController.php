<?php

namespace Modules\CanBo\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\BacHeSoLuong;
use Modules\Admin\Entities\BinhBauPhanLoaiCanBo;
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
use Modules\Admin\Entities\KiemNhiemBietPhai;
use Modules\Admin\Entities\KyLuat;
use Modules\Admin\Entities\LoaiPhuCap;
use Modules\Admin\Entities\NgachChucDanh;
use Modules\Admin\Entities\NgoaiNgu;
use Modules\Admin\Entities\NhiemKy;
use Modules\Admin\Entities\PhoThong;
use Modules\Admin\Entities\QuaChucVu;
use Modules\Admin\Entities\QuanHam;
use Modules\Admin\Entities\QuanLyHanhChinh;
use Modules\Admin\Entities\QuaTrinhBaoHiem;
use Modules\Admin\Entities\QuaTrinhBienCheHopDong;
use Modules\Admin\Entities\QuaTrinhChucVuDang;
use Modules\Admin\Entities\QuaTrinhCongTac;
use Modules\Admin\Entities\QuaTrinhDaoTao;
use Modules\Admin\Entities\QuaTrinhKhenThuong;
use Modules\Admin\Entities\QuaTrinhKiemNhiemBietPhai;
use Modules\Admin\Entities\QuaTrinhLuong;
use Modules\Admin\Entities\QuaTrinhNuocNgoai;
use Modules\Admin\Entities\QuaTrinhQuyHoachCanBo;
use Modules\Admin\Entities\QuaTrinhVeHuu;
use Modules\Admin\Entities\ThanhPhanXuatThan;
use Modules\Admin\Entities\ThanhPho;
use Modules\Admin\Entities\TiengAnh;
use Modules\Admin\Entities\TinHoc;
use Modules\Admin\Entities\ToChuc;
use Modules\Admin\Entities\TonGiao;
use Modules\Admin\Entities\TrangThai;
use Modules\Admin\Entities\TruongHoc;
use Modules\Admin\Http\Controllers\LyLuanChinhTri;
use File;
use PhpOffice\PhpWord\TemplateProcessor;

class CanBoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('canbo::them-moi-can-bo');
    }

    public function canBo($id)
    {
        $donVi = ToChuc::where('id',$id)->first();
        $danhSach = CanBo::where('don_vi',$id)->paginate(20);
        return view('canbo::danh-sach-can-bo',compact('danhSach','donVi'));

    }
    public function getlistcb()
    {
        $donVi = ToChuc::get();
        $arayEcabinet = array();

        foreach ($donVi as $key=>$data)
        {
            $arayEcabinet[$key]['id'] = $data->id;
            $arayEcabinet[$key]['STT'] = $key+1;
            $arayEcabinet[$key]['pid'] = $data->parent_id;
            $arayEcabinet[$key]['Email'] = $data->email;
//            $arayEcabinet[$key]['status'] = 1;
            $arayEcabinet[$key]['name'] ="<b style='color: black'>$data->ten_don_vi</b>";
            $arayEcabinet[$key]['permissionValue'] = '<a href="danh-sach-don-vi/'.$data->id.'">Xem chi tiết</a>';
            $arayEcabinet[$key]['tacvu'] = '<a href="sua-don-vi-to-chuc/'.$data->id.'"'.'><i class="'.'fa fa-edit'.'"></i></a> &emsp; <a href="xoa-don-vi-to-chuc/'.$data->id.'"'.'><i style="color: red"class="'.'fa fa-trash'.'"></i></a> ';
        }


        return $arayEcabinet;
    }
    public function canBoDetail($id)
    {
        $canBo = CanBo:: where('id',$id)->first();

        $danToc = DanToc::orderBy('ten','asc')->get();
        $tonGiao = TonGiao::orderBy('ten','asc')->get();
        $thanhPho = ThanhPho::orderBy('ten','asc')->get();
        $chucVuHienTai = ChucVuHienTai::orderBy('ten','asc')->get();
        $donVi = ToChuc::orderBy('ten_don_vi','asc')->get();
        $ngach = NgachChucDanh::orderBy('ten','asc')->get();
        $bacLuong = BacHeSoLuong::orderBy('ten','asc')->get();
        $phuCap = LoaiPhuCap::orderBy('ten','asc')->get();

        $chuyenNganhDT = ChuyenNganhDaoTao::orderBy('ten','asc')->get();
        $congViecChuyenMon = CongViecChuyenMon::orderBy('ten','asc')->get();
        $phoThong = PhoThong::orderBy('ten','asc')->get();
        $lyluanChinhTri = ChinhTri::orderBy('ten','asc')->get();
        $quanLyHanhChinh = QuanLyHanhChinh::orderBy('ten','asc')->get();
        $tinHoc = TinHoc::orderBy('ten','asc')->get();
        $tiengAnh = TiengAnh::orderBy('ten','asc')->get();
        $ngoaiNgu = NgoaiNgu::orderBy('ten','asc')->get();
        $chucVuDang = ChucVu::orderBy('ten_chuc_vu','asc')->get();
        $quanHam = QuanHam::orderBy('ten','asc')->get();
        $danhHieu = DanhHieu::orderBy('ten','asc')->get();
        $doiTuongQuanLy = DoiTuongQuanLy::orderBy('ten','asc')->get();
        $hinhThucDaoTao = HinhThucDaoTao::orderBy('ten','asc')->get();


        $hinhThucTuyen = HinhThucThiTuyen::orderBy('ten','asc')->get();
        $trangThai = TrangThai::orderBy('ten','asc')->get();

        $khenThuong =KhenThuongKyLuat::orderBy('ten','asc')->get();
        $kyLuat =KyLuat::orderBy('ten','asc')->get();
        $xuatThan =ThanhPhanXuatThan::orderBy('ten','asc')->get();
        $loaiCanBo =BinhBauPhanLoaiCanBo::orderBy('ten','asc')->get();

        $quaTrinhNuocNgoai = QuaTrinhNuocNgoai::where('users',$id)->get();
        $quaTrinhDaoTao = QuaTrinhDaoTao::where('users',$id)->get();
        $quaTrinhCongTac = QuaTrinhCongTac::where('users',$id)->get();
        $kiemNhiem = KiemNhiemBietPhai::orderBy('ten','asc')->get();

        $quaTrinhLuong = QuaTrinhLuong::where('users',$id)->get();
        $quaTrinhChucVuDang = QuaTrinhChucVuDang::where('users',$id)->get();
        $quaTrinhChucVu = QuaChucVu::where('users',$id)->get();
        $quaTrinhQuyHoachCanBo = QuaTrinhQuyHoachCanBo::where('users',$id)->get();
        $quaTrinhKiemNhiemBietphai = QuaTrinhKiemNhiemBietPhai::where('users',$id)->get();
        $quaTrinhBienCheHopDong = QuaTrinhBienCheHopDong::where('users',$id)->get();
        $quaTrinhKhenThuong = QuaTrinhKhenThuong::where('users',$id)->where('type',2)->get();
        $quaTrinhKyLuat = QuaTrinhKhenThuong::where('users',$id)->where('type',1)->get();
        $quaTrinhVeHuu = QuaTrinhVeHuu::where('users',$id)->get();
        $quaTrinhBaoHiem = QuaTrinhBaoHiem::where('users',$id)->get();

        $truongHoc = TruongHoc::orderBy('ten','asc')->get();
        $nhiemKy = NhiemKy::orderBy('ten','asc')->get();

        //tao phieu can bo
        $this->taoPhieuCanBo($canBo);

        return view('canbo::index',compact('canBo','danToc','tonGiao','thanhPho','chucVuHienTai'
            ,'donVi','ngach','bacLuong','phuCap','chuyenNganhDT','congViecChuyenMon','phoThong','lyluanChinhTri','quanLyHanhChinh'
            ,'tiengAnh','ngoaiNgu','chucVuDang','quanHam','danhHieu','doiTuongQuanLy','hinhThucDaoTao','hinhThucTuyen','trangThai'
            ,'kyLuat','khenThuong','xuatThan','quaTrinhCongTac','quaTrinhDaoTao','quaTrinhNuocNgoai','truongHoc'
            ,'quaTrinhLuong','quaTrinhChucVu','quaTrinhChucVuDang','quaTrinhQuyHoachCanBo','nhiemKy','quaTrinhBienCheHopDong','quaTrinhKiemNhiemBietphai'
            ,'kiemNhiem','loaiCanBo','quaTrinhKhenThuong','quaTrinhKyLuat','quaTrinhBaoHiem','quaTrinhVeHuu'
            ,'tinHoc'));

    }
    public function quaTrinhKiemNhiem(Request $request,$id)
    {
        $canBo = CanBo::where('id',$id)->first();
        $daoTao = new QuaTrinhKiemNhiemBietPhai();
        $daoTao->tu_ngay = !empty($request->tu_ngay) ? formatYMD($request->tu_ngay) : null;
        $daoTao->den_ngay = !empty($request->den_ngay) ? formatYMD($request->den_ngay) : null;
        $daoTao->users = $canBo->id;
        $daoTao->biet_phai = $request->biet_phai;
        $daoTao->ly_do = $request->ly_do;
        $daoTao->save();

        return redirect()->back()->with('success', 'cập nhật thành công !');

    }
    public function quaTrinhBaoHiem(Request $request,$id)
    {
        $canBo = CanBo::where('id',$id)->first();
        $daoTao = new QuaTrinhBaoHiem();
        $daoTao->tu_ngay = !empty($request->tu_ngay) ? formatYMD($request->tu_ngay) : null;
        $daoTao->den_ngay = !empty($request->den_ngay) ? formatYMD($request->den_ngay) : null;
        $daoTao->users = $canBo->id;
        $daoTao->thanh_pho = $request->thanh_pho;
        $daoTao->save();

        return redirect()->back()->with('success', 'cập nhật thành công !');

    }
    public function quaTrinhVeHuu(Request $request,$id)
    {
        $canBo = CanBo::where('id',$id)->first();
        $daoTao = new QuaTrinhVeHuu();
        $daoTao->ngay_ve_huu = !empty($request->ngay_ve_huu) ? formatYMD($request->ngay_ve_huu) : null;
        $daoTao->users = $canBo->id;
        $daoTao->tuoi_dang = $request->tuoi_dang;
        $daoTao->save();

        return redirect()->back()->with('success', 'cập nhật thành công !');

    }


    public function quaTrinhKhenKy(Request $request,$id)
    {
        $canBo = CanBo::where('id',$id)->first();
        $daoTao = new QuaTrinhKhenThuong();
        $daoTao->ngay_quyet_dinh = !empty($request->ngay_quyet_dinh) ? formatYMD($request->ngay_quyet_dinh) : null;
        $daoTao->users = $canBo->id;
        $daoTao->so_quyet_dinh = $request->so_quyet_dinh;
        $daoTao->ly_do = $request->ly_do;
        $daoTao->co_quan = $request->co_quan;
        $daoTao->noi_dung = $request->noi_dung;
        $daoTao->type = $request->type;
        $daoTao->save();

        return redirect()->back()->with('success', 'cập nhật thành công !');

    }
    public function quaTrinhBienChe(Request $request,$id)
    {
        $canBo = CanBo::where('id',$id)->first();
        $daoTao = new QuaTrinhBienCheHopDong();
        $daoTao->tu_ngay = !empty($request->tu_ngay) ? formatYMD($request->tu_ngay) : null;
        $daoTao->den_ngay = !empty($request->den_ngay) ? formatYMD($request->den_ngay) : null;
        $daoTao->users = $canBo->id;
        $daoTao->bien_che = $request->bien_che;
        $daoTao->save();

        return redirect()->back()->with('success', 'cập nhật thành công !');

    }
    public function quaTrinhluong(Request $request,$id)
    {
        $canBo = CanBo::where( 'id',$id)->first();
        $daoTao = new QuaTrinhLuong();
        $daoTao->tu_ngay = !empty($request->tu_ngay) ? formatYMD($request->tu_ngay) : null;
        $daoTao->den_ngay = !empty($request->den_ngay) ? formatYMD($request->den_ngay) : null;
        $daoTao->users = $canBo->id;
        $daoTao->ngach_cong_chuc = $request->ngach_cong_chuc;
        $daoTao->bac = $request->bac_luong;
        $daoTao->he_so = $request->he_so_luong;
        $daoTao->phu_cap = $request->phu_cap;
        $daoTao->phan_tram = $request->phan_tram_huong;
        $daoTao->tong_luong = $request->tong_luong;
        $daoTao->save();

        return redirect()->back()->with('success', 'cập nhật thành công !');

    }
    public function quaTrinhChucVu(Request $request,$id)
    {
        $canBo = CanBo::where( 'id',$id)->first();
        $daoTao = new QuaChucVu();
        $daoTao->thoi_gian = !empty($request->thoi_gian) ? formatYMD($request->thoi_gian) : null;
        $daoTao->users = $canBo->id;
        $daoTao->cong_viec = $request->cong_viec;
        $daoTao->phu_cap = $request->phu_cap;
        $daoTao->co_quan = $request->co_quan;
        $daoTao->save();

        return redirect()->back()->with('success', 'cập nhật thành công !');

    }
    public function quaTrinhChucVuDang(Request $request,$id)
    {
        $canBo = CanBo::where( 'id',$id)->first();
        $daoTao = new QuaTrinhChucVuDang();
        $daoTao->thoi_gian = !empty($request->thoi_gian) ? formatYMD($request->thoi_gian) : null;
        $daoTao->users = $canBo->id;
        $daoTao->cong_viec = $request->cong_viec;
        $daoTao->phu_cap = $request->phu_cap;
        $daoTao->co_quan = $request->co_quan;
        $daoTao->nhiem_ky = $request->nhiem_ky;
        $daoTao->save();

        return redirect()->back()->with('success', 'cập nhật thành công !');

    }
    public function quaTrinhCanBo(Request $request,$id)
    {
        $canBo = CanBo::where( 'id',$id)->first();
        $daoTao = new QuaTrinhQuyHoachCanBo();
        $daoTao->ngay_quyet_dinh = !empty($request->ngay_quyet_dinh) ? formatYMD($request->ngay_quyet_dinh) : null;
        $daoTao->users = $canBo->id;
        $daoTao->chuc_vu = $request->chuc_vu;
        $daoTao->save();

        return redirect()->back()->with('success', 'cập nhật thành công !');

    }

    public function quaTrinhDaoTao(Request $request,$id)
    {
        $canBo = CanBo::where( 'id',$id)->first();
        $daoTao = new QuaTrinhDaoTao();
        $daoTao->tu_ngay = !empty($request->tu_ngay) ? formatYMD($request->tu_ngay) : null;
        $daoTao->den_ngay = !empty($request->den_ngay) ? formatYMD($request->den_ngay) : null;
        $daoTao->users = $canBo->id;
        $daoTao->loai_dao_tao = $request->loai_dao_tao;
        $daoTao->trinh_do = $request->trinh_do;
        $daoTao->hinh_thuc = $request->hinh_thuc;
        $daoTao->noi_dao_tao = $request->noi_dao_tao;
        $daoTao->truong = $request->truong;
        $daoTao->save();

        return redirect()->back()->with('success', 'cập nhật thành công !');

    }
    public function quaTrinhCongTac(Request $request,$id)
    {
        $canBo = CanBo::where( 'id',$id)->first();
        $daoTao = new QuaTrinhCongTac();
        $daoTao->tu_ngay = !empty($request->tu_ngay) ? formatYMD($request->tu_ngay) : null;
        $daoTao->den_ngay = !empty($request->den_ngay) ? formatYMD($request->den_ngay) : null;
        $daoTao->users = $canBo->id;
        $daoTao->chuc_danh = $request->chuc_danh;
        $daoTao->save();

        return redirect()->back()->with('success', 'cập nhật thành công !');

    }
    public function quaTrinhNuocNgoai(Request $request,$id)
    {
        $canBo = CanBo::where( 'id',$id)->first();
        $daoTao = new QuaTrinhNuocNgoai();
        $daoTao->tu_ngay = !empty($request->tu_ngay) ? formatYMD($request->tu_ngay) : null;
        $daoTao->den_ngay = !empty($request->den_ngay) ? formatYMD($request->den_ngay) : null;
        $daoTao->users = $canBo->id;
        $daoTao->noi_den = $request->noi_dao_tao;
        $daoTao->cong_viec = $request->cong_viec;
        $daoTao->ly_do = $request->ly_do;
        $daoTao->save();

        return redirect()->back()->with('success', 'cập nhật thành công !');

    }
    public function canBoDanhGiatt(Request $request,$id)
    {
        $canBo = CanBo::where( 'id',$id)->first();
        $canBo->hinh_thuc_tuyen = $request->hinh_thuc_tuyen;
        $canBo->trang_thai_cb = $request->trang_thai_cb;
        $canBo->trung_uong_quan_ly = $request->trung_uong_quan_ly;
        $canBo->lam_cong_tac_quan_ly = $request->lam_cong_tac_quan_ly;
        $canBo->save();
        return redirect()->back()->with('success', 'cập nhật thành công !');
    }
    public function canBoDanhGiac3(Request $request,$id)
    {
        $canBo = CanBo::where('id',$id)->first();
        $canBo->khen_thuong_cao_nhat = $request->khen_thuong_cao_nhat;
        $canBo->xuat_than = $request->xuat_than;
        $canBo->hoc_ham = $request->hoc_ham;
        $canBo->ky_luat_cao_nhat = $request->ky_luat_cao_nhat;
        $canBo->bi_dich_bat = $request->bi_dich_bat;
        $canBo->dac_diem_lich_su_ban_than = $request->dac_diem_lich_su_ban_than;
        $canBo->dac_diem_lich_su_ban_than_tai_san = $request->dac_diem_lich_su_ban_than_tai_san;
        $canBo->danh_gia_cua_can_bo = $request->danh_gia_cua_can_bo;
        $canBo->phan_loai_cb = $request->phan_loai_cb;
        $canBo->tu_nhan_xet_ban_than = $request->tu_nhan_xet_ban_than;
        $canBo->ngay_khai = !empty($request->ngay_khai) ? formatYMD($request->ngay_khai) : null;
        $canBo->ngay_xac_nhan = !empty($request->ngay_xac_nhan) ? formatYMD($request->ngay_xac_nhan) : null;
        $canBo->save();
        return redirect()->back()->with('success', 'cập nhật thành công !');
    }

    public function canBoDanhGia(Request $request,$id)
    {
//        dd($request->all());
        $canBo = CanBo::where( 'id',$id)->first();
        $canBo->chuyen_nganh_id = $request->chuyen_nganh_id;
        $canBo->trinh_do_pho_thong_id = $request->trinh_do_pho_thong_id;
        $canBo->trinh_do_chuyen_mon_cao_nhat_id = $request->trinh_do_chuyen_mon_cao_nhat_id;
        $canBo->ly_luan_chinh_tri = $request->ly_luan_chinh_tri;
        $canBo->quan_ly_hanh_chinh = $request->quan_ly_hanh_chinh;
        $canBo->tin_hoc = $request->tin_hoc;
        $canBo->tieng_anh = $request->tieng_anh;
        $canBo->ngon_ngu = $request->ngon_ngu;
        $canBo->la_dang_vien = $request->la_dang_vien;
        $canBo->ngay_vao_dang = !empty($request->ngay_vao_dang) ? formatYMD($request->ngay_vao_dang) : null;
        $canBo->ngay_vao_dang_chinh_thuc = !empty($request->ngay_vao_dang_chinh_thuc) ? formatYMD($request->ngay_vao_dang_chinh_thuc) : null;
        $canBo->ngay_tham_gia_to_chuc = !empty($request->ngay_tham_gia_to_chuc) ? formatYMD($request->ngay_tham_gia_to_chuc) : null;
        $canBo->noi_vao_dang = $request->noi_vao_dang;
        $canBo->chuc_vu_cao_nhat = $request->chuc_vu_cao_nhat;
        $canBo->cong_viec_chinh = $request->cong_viec_chinh;
        $canBo->da_di_bo_doi = $request->da_di_bo_doi;

        $canBo->nhap_ngu = !empty($request->nhap_ngu) ? formatYMD($request->nhap_ngu) : null;
        $canBo->xuat_ngu = !empty($request->xuat_ngu) ? formatYMD($request->xuat_ngu) : null;

        $canBo->quan_ham_cao_nhat = $request->quan_ham_cao_nhat;
        $canBo->danh_hieu_phong_tang_cao_nhat = $request->danh_hieu_phong_tang_cao_nhat;
        $canBo->suc_khoe = $request->suc_khoe;
        $canBo->so_truong_cong_tac = $request->so_truong_cong_tac;
        $canBo-> chieu_cao= $request->chieu_cao;
        $canBo->can_nang = $request->can_nang;
        $canBo->nhom_mau = $request->nhom_mau;
        $canBo->thuong_binh = $request->thuong_binh;
        $canBo->bang1 = $request->bang1;
        $canBo->bang2 = $request->bang2;
        $canBo->trinh_do_1 = $request->trinh_do_1;
        $canBo->trinh_do_2 = $request->trinh_do_2;
        $canBo->doi_tuong_chinh_sach = $request->doi_tuong_chinh_sach;
        $canBo->save();
        return redirect()->back()->with('success', 'cập nhật thành công !');
    }

    public function postSoLuoc1(Request $request,$id)
    {
//        dd($request->all());
        $canBo = CanBo::where('id',$id)->first();
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
        $canBo-> thanh_pho_noi_sinh= $request->noi_sinh_tp;
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

        $canBo->save();
        return redirect()->back()->with('success', 'cập nhật thành công !');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('canbo::create');
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
        return view('canbo::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('canbo::edit');
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

    public function taoPhieuCanBo($canBo)
    {
        $file = public_path('template_phieu_can_bo/phieu_cbcc.docx');
        $uploadPhieuChuyen = public_path(PHIEU_CAN_BO);

        $fileDoc = $canBo->id. "_phieu_can_bo.docx";

        if (!File::exists($uploadPhieuChuyen)) {
            File::makeDirectory($uploadPhieuChuyen, 0775, true, true);
        }

        $dateOrBirth = !empty($canBo->ngay_sinh) ? explode('-', $canBo->ngay_sinh) : null;
        $noiSinh = $canBo->noi_sinh. ', '.$canBo->noi_sinh_huyen.', '.($canBo->queQuan->ten ?? null);
        $gioiTinh = !empty($canBo->gioi_tinh) ? ($canBo->gioi_tinh == 1 ? 'Nam' : 'Nữ') : null;

        $wordTemplate = new TemplateProcessor($file);
        $wordTemplate->setImageValue('image', ['path' => public_path('images/default-user.png'), 'width' => 119, 'height' => 160]);
        $wordTemplate->setValue('donViQuanLy', 'BAN TỔ CHỨC QUẬN ỦY');
        $wordTemplate->setValue('donViChuQuan', 'QUẬN ỦY NAM TỪ LIÊM');
        $wordTemplate->setValue('donViCongTac', $canBo->toChuc->ten_don_vi ?? null);
        $wordTemplate->setValue('maSoHoSo', '123');
        $wordTemplate->setValue('soHieuCongChucVienChuc', $canBo->ma_ngach ?? null);
        $wordTemplate->setValue('hoTen', $canBo->ho_ten ?? null);
        $wordTemplate->setValue('tenGoiKhac', $canBo->ten_khac ?? null);
        $wordTemplate->setValue('gioiTinh', $gioiTinh);
        $wordTemplate->setValue('biDanh', $canBo->ten_khac ?? null);
        $wordTemplate->setValue('ngaySinh', $dateOrBirth[2] ?? null);
        $wordTemplate->setValue('thangSinh', $dateOrBirth[1] ?? null);
        $wordTemplate->setValue('namSinh', $dateOrBirth[0] ?? null);
        $wordTemplate->setValue('noiSinh', $noiSinh ?? null);
        $wordTemplate->setValue('danToc', $canBo->danToc->ten ?? null);
        $wordTemplate->setValue('tonGiao', $canBo->tonGiao->ten ?? null);
        $wordTemplate->setValue('queQuanGoc', $noiSinh ?? null);
        $wordTemplate->setValue('queQuanTheoDonViHanhChinh', $noiSinh ?? null);
        $wordTemplate->setValue('hoKhauThuongTru', $canBo->ho_khau ?? null);
        $wordTemplate->setValue('noiOHienNay', $canBo->noi_o_hien_nay ?? null);
        $wordTemplate->setValue('dtCoQuan', '……………');
        $wordTemplate->setValue('dtNhaRieng', '……………');
        $wordTemplate->setValue('dtDiDong', $canBo->so_dien_thoai ?? '……………');
        $wordTemplate->setValue('email', $canBo->email ?? null);
        $wordTemplate->setValue('soCMND', $canBo->cmnd ?? null);
        $wordTemplate->setValue('noiCap',  null);
        $wordTemplate->setValue('ngayCap', $canBo->ngay_cap_cmt ?? null);
        $wordTemplate->saveAs($uploadPhieuChuyen . "/" . $fileDoc);
    }
}
