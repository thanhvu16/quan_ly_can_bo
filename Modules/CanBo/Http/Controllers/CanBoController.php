<?php

namespace Modules\CanBo\Http\Controllers;

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
use Modules\Admin\Entities\DonVi;
use Modules\Admin\Entities\HinhThucDaoTao;
use Modules\Admin\Entities\HinhThucThiTuyen;
use Modules\Admin\Entities\KhenThuongKyLuat;
use Modules\Admin\Entities\KyLuat;
use Modules\Admin\Entities\LoaiPhuCap;
use Modules\Admin\Entities\NgachChucDanh;
use Modules\Admin\Entities\NgoaiNgu;
use Modules\Admin\Entities\PhoThong;
use Modules\Admin\Entities\QuanHam;
use Modules\Admin\Entities\QuanLyHanhChinh;
use Modules\Admin\Entities\ThanhPhanXuatThan;
use Modules\Admin\Entities\ThanhPho;
use Modules\Admin\Entities\TiengAnh;
use Modules\Admin\Entities\TinHoc;
use Modules\Admin\Entities\ToChuc;
use Modules\Admin\Entities\TonGiao;
use Modules\Admin\Entities\TrangThai;
use Modules\Admin\Http\Controllers\LyLuanChinhTri;

class CanBoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('canbo::index');
    }

    public function canBo($id)
    {
        $danhSach = CanBo::paginate(20);
        return view('canbo::danh-sach-can-bo',compact('danhSach'));

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


        return view('canbo::index',compact('canBo','danToc','tonGiao','thanhPho','chucVuHienTai'
            ,'donVi','ngach','bacLuong','phuCap','chuyenNganhDT','congViecChuyenMon','phoThong','lyluanChinhTri','quanLyHanhChinh'
            ,'tiengAnh','ngoaiNgu','chucVuDang','quanHam','danhHieu','doiTuongQuanLy','hinhThucDaoTao','hinhThucTuyen','trangThai'
            ,'kyLuat','khenThuong','xuatThan'
            ,'tinHoc'));

    }
    public function canBoDanhGiatt(Request $request,$id)
    {
        $canBo = CanBo::where( 'id',$id)->first();
        $canBo->hinh_thuc_tuyen = $request->hinh_thuc_tuyen;
        $canBo->trang_thai_cb = $request->trang_thai_cb;
        $canBo->trung_uong_quan_ly = $request->trung_uong_quan_ly;
        $canBo->lam_cong_tac_quan_ly = $request->lam_cong_tac_quan_ly;
        $canBo->save();
        return redirect()->back()->with('cập nhật thành công !');
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
        $canBo->tu_nhan_xet_ban_than = $request->tu_nhan_xet_ban_than;
        $canBo->ngay_khai = !empty($request->ngay_khai) ? formatYMD($request->ngay_khai) : null;
        $canBo->ngay_xac_nhan = !empty($request->ngay_xac_nhan) ? formatYMD($request->ngay_xac_nhan) : null;
        $canBo->save();
        return redirect()->back()->with('cập nhật thành công !');
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
        return redirect()->back()->with('cập nhật thành công !');
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
        return redirect()->back()->with('cập nhật thành công !');
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
}
