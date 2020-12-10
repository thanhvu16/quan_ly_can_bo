<?php

namespace Modules\DanhGiaCanBo\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\DanhGiaCanBo\Entities\ChuyenNoiVu;
use Modules\DanhGiaCanBo\Entities\DuyetDanhGia;
use auth;
use Modules\DanhGiaCanBo\Entities\UbndDanhGiaChiTiet;

class DanhGiaCanBoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $thang = $request->get('thang_danh_gia');
        $nguoinhan = null;
        $month = Carbon::now()->format('m');
        switch (auth::user()->role_id) {
            case QUYEN_CHUYEN_VIEN:
                $nguoinhan = User::role([ TRUONG_PHONG,PHO_PHONG])->where('don_vi_id',auth::user()->don_vi_id)->get();
                break;
            case QUYEN_PHO_PHONG:
                $nguoinhan = User::role([ TRUONG_PHONG])->where('don_vi_id',auth::user()->don_vi_id)->get();
                break;
            case QUYEN_TRUONG_PHONG:
                $nguoinhan = User::role([ QUYEN_CHANH_VAN_PHONG,QUYEN_PHO_CHANH_VAN_PHONG])->get();
                break;
            case QUYEN_PHO_CHUC_TICH:
                $nguoinhan = User::role([CHU_TICH])->get();
                break;
            case QUYEN_CHANH_VAN_PHONG:
                $nguoinhan = User::role([ CHU_TICH,PHO_CHUC_TICH])->get();
                break;
            case QUYEN_PHO_CHANH_VAN_PHONG:
                $nguoinhan = User::role([QUYEN_PHO_CHANH_VAN_PHONG])->get();
                break;
            case QUYEN_CHU_TICH:
                $nguoinhan = null;
                break;
            case QUYEN_VAN_THU_DON_VI:
                $nguoinhan = User::role([ TRUONG_PHONG,PHO_PHONG])->where('don_vi_id',auth::user()->don_vi_id)->get();
                break;
            case QUYEN_VAN_THU_HUYEN:
                $nguoinhan = User::role([ CHU_TICH,PHO_CHUC_TICH,QUYEN_CHANH_VAN_PHONG,QUYEN_PHO_CHANH_VAN_PHONG])->where('don_vi_id',auth::user()->don_vi_id)->get();
                break;

        }
        $laydanhgiacanhan=null;
        if (empty($thang))
        {
            $laydanhgiacanhan = DuyetDanhGia::where(['thang' => $month, 'cap_danh_gia' => 1,'can_bo_goc'=>auth::user()->id])->first();
            $laydanhgiaphophong = DuyetDanhGia::where(['thang' => $month, 'cap_danh_gia' => 3,'can_bo_goc'=>auth::user()->id])->first();
            $laydanhgiatruongphong = DuyetDanhGia::where(['thang' => $month, 'cap_danh_gia' => 2,'can_bo_goc'=>auth::user()->id])->first();
        }else{
            $laydanhgiacanhan = DuyetDanhGia::where(['thang' => $thang, 'cap_danh_gia' => 1,'can_bo_goc'=>auth::user()->id])->first();
            $laydanhgiaphophong = DuyetDanhGia::where(['thang' => $thang, 'cap_danh_gia' => 3,'can_bo_goc'=>auth::user()->id])->first();
            $laydanhgiatruongphong = DuyetDanhGia::where(['thang' => $thang, 'cap_danh_gia' => 2,'can_bo_goc'=>auth::user()->id])->first();
        }
        return view('danhgiacanbo::tieu_chi_danh_gia.mau_so_1', compact('nguoinhan', 'month','laydanhgiaphophong','laydanhgiacanhan','laydanhgiatruongphong'));

    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('danhgiacanbo::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $chitietdanhgia0 = new UbndDanhGiaChiTiet();
        $chitietdanhgia0->field_1 = $request->tong_canhan_ythuctochuckyluat;
        $chitietdanhgia0->field_2 = $request->tong_canhan_ythuc;
        $chitietdanhgia0->field_3 = $request->canhan_ythuc1;
        $chitietdanhgia0->field_4 = $request->canhan_ythuc2;
        $chitietdanhgia0->field_5 = $request->canhan_ythuc3;
        $chitietdanhgia0->field_6 = $request->tong_canhan_thuchien;
        $chitietdanhgia0->field_7 = $request->canhan_thuchien1;
        $chitietdanhgia0->field_8 = $request->canhan_thuchien2;
        $chitietdanhgia0->field_9 = $request->canhan_thuchien3;
        $chitietdanhgia0->field_10 = $request->canhan_thuchien4;
        $chitietdanhgia0->field_11 = $request->canhan_thuchien5;
        $chitietdanhgia0->field_12 = $request->canhan_thuchien6;
        $chitietdanhgia0->field_13 = $request->tong_canhan_ketquathuchiennhiemvu;
        $chitietdanhgia0->field_14 = $request->tong_canhan_nangluc;
        $chitietdanhgia0->field_15 = $request->canhan_nangluc1;
        $chitietdanhgia0->field_16 = $request->canhan_nangluc2;
        $chitietdanhgia0->field_17 = $request->canhan_nangluc3;
        $chitietdanhgia0->field_18 = $request->canhan_nangluc4;
        $chitietdanhgia0->field_19 = $request->canhan_nangluc5;
        $chitietdanhgia0->field_20 = $request->canhan_nangluc6;
        $chitietdanhgia0->field_21 = $request->canhan_nangluc7;
        $chitietdanhgia0->field_22 = $request->canhan_nangluc8;
        $chitietdanhgia0->field_23 = $request->canhan_nangluc9;
        $chitietdanhgia0->field_24 = $request->canhan_nangluc10;
        $chitietdanhgia0->field_25 = $request->tong_canhan_thuchiennhiemvu;
        $chitietdanhgia0->field_26 = $request->tong_canhan_diemthuong;
        $chitietdanhgia0->field_27 = $request->canhan_diemthuong1;
        $chitietdanhgia0->field_28 = $request->tong_canhan_tongdiem;
        $chitietdanhgia0->mau_chi_tieu = $request->mau_van_ban;
        $chitietdanhgia0->save();

        if (auth::user()->role_id == QUYEN_VAN_THU_HUYEN || auth::user()->role_id == QUYEN_CHU_TICH || auth::user()->role_id == QUYEN_PHO_CHUC_TICH ||
            auth::user()->role_id == QUYEN_CHANH_VAN_PHONG || auth::user()->role_id == QUYEN_TRUONG_PHONG || auth::user()->role_id == QUYEN_PHO_CHANH_VAN_PHONG) {
            $duyetdanhgia = new DuyetDanhGia();
            $duyetdanhgia->can_bo_chuyen = auth::user()->id;
            $duyetdanhgia->can_bo_nhan = $request->lanhdao;
//            $duyetdanhgia->diem = $request->tong_canhan_tongdiem;
            $duyetdanhgia->nhan_xet = $request->nhanxet;
            $duyetdanhgia->danh_gia_id = $chitietdanhgia0->id;
            $duyetdanhgia->thang = $request->thang_danh_gia;
            $duyetdanhgia->don_vi_id = auth::user()->donvi_id;
            $duyetdanhgia->can_bo_goc = auth::user()->id;

            $duyetdanhgia->trang_thai = 5;
            $duyetdanhgia->save();
            $lay_danh_gia_dau = DuyetDanhGia::where('id', $duyetdanhgia->id)->first();
            $lay_danh_gia_dau->id_dau_tien = $duyetdanhgia->id;
            $lay_danh_gia_dau->save();
        } elseif (auth::user()->role_id == QUYEN_CHUYEN_VIEN || auth::user()->role_id == QUYEN_PHO_PHONG ||
             auth::user()->role_id == QUYEN_VAN_THU_DON_VI) {
            $duyetdanhgia = new DuyetDanhGia();
            $duyetdanhgia->can_bo_chuyen = auth::user()->id;
            $duyetdanhgia->can_bo_nhan = $request->lanhdao;
            $duyetdanhgia->diem = $request->tong_canhan_tongdiem;
            $duyetdanhgia->nhan_xet = $request->nhanxet;
            $duyetdanhgia->danh_gia_id = $chitietdanhgia0->id;
            $duyetdanhgia->can_bo_goc = auth::user()->id;
            $duyetdanhgia->thang = $request->thang_danh_gia;
            $duyetdanhgia->don_vi_id = auth::user()->don_vi_id;
            $duyetdanhgia->trang_thai = 2;
            $duyetdanhgia->save();
            $lay_danh_gia_dau = DuyetDanhGia::where('id', $duyetdanhgia->id)->first();
            $lay_danh_gia_dau->id_dau_tien = $duyetdanhgia->id;
            $lay_danh_gia_dau->save();
        }


        return redirect()->back()->with('success', 'Đánh giá thành công !!');
    }
    public function thongkephongthang(Request $request)
    {
        $thang = $request->get('thang');
        $month = Carbon::now()->format('m');

        if (empty($thang)) {
            $allcanbophong = DuyetDanhGia::where(['trang_thai' => 4, 'thang' => $month, 'don_vi_id'=>auth::user()->don_vi_id])->where('lanh_dao_da_danh_gia',2 )->get();
            $layphongdachuyennoivu = ChuyenNoiVu::where(['thang' => $month, 'phong'=>auth::user()->donvi_id])->first();
        } else {
            $allcanbophong = DuyetDanhGia::where(['trang_thai' => 4, 'thang' => $thang, 'don_vi_id'=>auth::user()->don_vi_id])->where('lanh_dao_da_danh_gia', 2)->get();
            $layphongdachuyennoivu = ChuyenNoiVu::where(['thang' => $thang, 'phong'=>auth::user()->donvi_id])->first();
        }


        return view('danhgiacanbo::thong_ke_thang.thong_ke_phong', compact('allcanbophong', 'month','layphongdachuyennoivu','thang'));
    }
    public function captrendanhgia(Request $request)
    {
        $thang = $request->get('thang');
        $month = Carbon::now()->format('m');
        $nguoinhan = null;
        switch (auth::user()->role_id) {
            case QUYEN_CHUYEN_VIEN:
                $nguoinhan = User::role([ TRUONG_PHONG,PHO_PHONG])->where('don_vi_id',auth::user()->don_vi_id)->get();
                break;
            case QUYEN_PHO_PHONG:
                $nguoinhan = User::role([ TRUONG_PHONG])->where('don_vi_id',auth::user()->don_vi_id)->get();
                break;
            case QUYEN_TRUONG_PHONG:
                $nguoinhan = User::role([ QUYEN_CHANH_VAN_PHONG,QUYEN_PHO_CHANH_VAN_PHONG])->get();
                break;
            case QUYEN_PHO_CHUC_TICH:
                $nguoinhan = User::role([CHU_TICH])->get();
                break;
            case QUYEN_CHANH_VAN_PHONG:
                $nguoinhan = User::role([ CHU_TICH,PHO_CHUC_TICH])->get();
                break;
            case QUYEN_PHO_CHANH_VAN_PHONG:
                $nguoinhan = User::role([QUYEN_PHO_CHANH_VAN_PHONG])->get();
                break;
            case QUYEN_CHU_TICH:
                $nguoinhan = null;
                break;
            case QUYEN_VAN_THU_DON_VI:
                $nguoinhan = User::role([ TRUONG_PHONG,PHO_PHONG])->where('don_vi_id',auth::user()->don_vi_id)->get();
                break;
            case QUYEN_VAN_THU_HUYEN:
                $nguoinhan = User::role([ CHU_TICH,PHO_CHUC_TICH,QUYEN_CHANH_VAN_PHONG,QUYEN_PHO_CHANH_VAN_PHONG])->where('don_vi_id',auth::user()->don_vi_id)->get();
                break;

        }

        if (empty($thang)) {
            $laydanhgiacanhan = DuyetDanhGia::where(['thang' => $month, 'cap_danh_gia' => 1,'can_bo_nhan'=>auth::user()->id])->first();
            $laydanhgiaphophong = DuyetDanhGia::where(['thang' => $month, 'cap_danh_gia' => 3,'can_bo_nhan'=>auth::user()->id])->first();
            $laydanhgiatruongphong = DuyetDanhGia::where(['thang' => $month, 'cap_danh_gia' => 2,'can_bo_nhan'=>auth::user()->id])->first();
            $thongtincanhancham = DuyetDanhGia::where(['can_bo_nhan' => auth::user()->id, 'thang' => $month])->get();;
        } else {
            $laydanhgiacanhan = DuyetDanhGia::where(['thang' => $thang, 'cap_danh_gia' => 1,'can_bo_nhan'=>auth::user()->id])->first();
            $laydanhgiaphophong = DuyetDanhGia::where(['thang' => $thang, 'cap_danh_gia' => 3,'can_bo_nhan'=>auth::user()->id])->first();
            $laydanhgiatruongphong = DuyetDanhGia::where(['thang' => $thang, 'cap_danh_gia' => 2,'can_bo_nhan'=>auth::user()->id])->first();
            $thongtincanhancham = DuyetDanhGia::where(['can_bo_nhan' => auth::user()->id, 'thang' => $thang])->get();
        }

        return view('danhgiacanbo::danh_gia_can_bo.index', compact('thongtincanhancham', 'month', 'nguoinhan','laydanhgiacanhan','laydanhgiatruongphong','laydanhgiaphophong'));
    }


    public function danhgiacaptren(Request $request)
    {
        //lấy đánh giá cũ và cập nhật trạng thái
        $capnhatdanhgiacu = DuyetDanhGia::where('id', $request->id_danh_gia)->first();
        $laycanbogoc = DuyetDanhGia::where('id_dau_tien', $capnhatdanhgiacu->id_dau_tien)->orderBy('created_at', 'asc')->first();
        if (auth::user()->role_id == QUYEN_PHO_CHUC_TICH || auth::user()->role_id == QUYEN_PHO_CHANH_VAN_PHONG|| auth::user()->role_id == QUYEN_VAN_THU_HUYEN) {
            $capnhatdanhgiacu->trang_thai = 3;
            $capnhatdanhgiacu->save();
        } elseif (auth::user()->role_id == QUYEN_CHU_TICH || auth::user()->role_id == QUYEN_CHANH_VAN_PHONG || auth::user()->role_id == QUYEN_TRUONG_PHONG) {
            $capnhatdanhgiacu->trang_thai = 4;
            $capnhatdanhgiacu->save();
        }
        $chitietdanhgia0 = new UbndDanhGiaChiTiet();
        $chitietdanhgia0->field_1 = $request->tong_canhan_ythuctochuckyluat;
        $chitietdanhgia0->field_2 = $request->tong_canhan_ythuc;
        $chitietdanhgia0->field_3 = $request->canhan_ythuc1;
        $chitietdanhgia0->field_4 = $request->canhan_ythuc2;
        $chitietdanhgia0->field_5 = $request->canhan_ythuc3;
        $chitietdanhgia0->field_6 = $request->tong_canhan_thuchien;
        $chitietdanhgia0->field_7 = $request->canhan_thuchien1;
        $chitietdanhgia0->field_8 = $request->canhan_thuchien2;
        $chitietdanhgia0->field_9 = $request->canhan_thuchien3;
        $chitietdanhgia0->field_10 = $request->canhan_thuchien4;
        $chitietdanhgia0->field_11 = $request->canhan_thuchien5;
        $chitietdanhgia0->field_12 = $request->canhan_thuchien6;
        $chitietdanhgia0->field_13 = $request->tong_canhan_ketquathuchiennhiemvu;
        $chitietdanhgia0->field_14 = $request->tong_canhan_nangluc;
        $chitietdanhgia0->field_15 = $request->canhan_nangluc1;
        $chitietdanhgia0->field_16 = $request->canhan_nangluc2;
        $chitietdanhgia0->field_17 = $request->canhan_nangluc3;
        $chitietdanhgia0->field_18 = $request->canhan_nangluc4;
        $chitietdanhgia0->field_19 = $request->canhan_nangluc5;
        $chitietdanhgia0->field_20 = $request->canhan_nangluc6;
        $chitietdanhgia0->field_21 = $request->canhan_nangluc7;
        $chitietdanhgia0->field_22 = $request->canhan_nangluc8;
        $chitietdanhgia0->field_23 = $request->canhan_nangluc9;
        $chitietdanhgia0->field_24 = $request->canhan_nangluc10;
        $chitietdanhgia0->field_25 = $request->tong_canhan_thuchiennhiemvu;
        $chitietdanhgia0->field_26 = $request->tong_canhan_diemthuong;
        $chitietdanhgia0->field_27 = $request->canhan_diemthuong1;
        $chitietdanhgia0->field_28 = $request->tong_canhan_tongdiem;
        $chitietdanhgia0->mau_chi_tieu = $request->mau_van_ban;
        $chitietdanhgia0->save();


        $duyetdanhgia = new DuyetDanhGia();
        $duyetdanhgia->can_bo_chuyen = auth::user()->id;
        if ($request->lanhdao) {
            $duyetdanhgia->can_bo_goc = $request->can_bo_goc;
            $duyetdanhgia->can_bo_nhan = $request->lanhdao;
            $duyetdanhgia->trang_thai = 3;
        } else {
            $duyetdanhgia->can_bo_goc = $laycanbogoc->can_bo_chuyen;
            $duyetdanhgia->danh_gia_chot = $laycanbogoc->can_bo_chuyen;
            $duyetdanhgia->da_danh_gia_xong = 2;
            $duyetdanhgia->lanh_dao_da_danh_gia = 2;
            $duyetdanhgia->trang_thai = 4;
        }

        if (auth::user()->role_id == QUYEN_CHU_TICH || auth::user()->role_id == QUYEN_CHANH_VAN_PHONG || auth::user()->role_id == QUYEN_TRUONG_PHONG) {
            $duyetdanhgia->cap_danh_gia = 2;
        } elseif (auth::user()->role_id == QUYEN_PHO_CHUC_TICH || auth::user()->role_id == QUYEN_PHO_CHANH_VAN_PHONG|| auth::user()->role_id == QUYEN_VAN_THU_HUYEN) {
            $duyetdanhgia->cap_danh_gia = 3;
        }

        $duyetdanhgia->diem = $request->tong_canhan_tongdiem;
        $duyetdanhgia->nhan_xet = $request->nhan_xet;
        $duyetdanhgia->danh_gia_id = $chitietdanhgia0->id;
        $duyetdanhgia->parent_id = $capnhatdanhgiacu->id;
        $duyetdanhgia->id_dau_tien = $capnhatdanhgiacu->id_dau_tien;
        $duyetdanhgia->thang = $request->thang;
        $duyetdanhgia->don_vi_id = auth::user()->don_vi_id;
        $duyetdanhgia->save();
        return redirect()->back()->with('success', 'Đánh giá thành công !!');
    }
    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('danhgiacanbo::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('danhgiacanbo::edit');
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