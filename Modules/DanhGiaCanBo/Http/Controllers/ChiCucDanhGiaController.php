<?php

namespace Modules\DanhGiaCanBo\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use auth;
use Modules\Admin\Entities\DonVi;
use Modules\Admin\Entities\NhomDonVi;
use Modules\DanhGiaCanBo\Entities\DuyetDanhGia;
use Modules\DanhGiaCanBo\Entities\UbndDanhGiaChiTiet;

class ChiCucDanhGiaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
//        dd(auth::user()->id);
        $thang = $request->get('thang_danh_gia');
        $nguoinhan = null;
        $month = Carbon::now()->format('m');
        $user = auth::user();
        $donVi = $user->donVi;
        $nhomDonVi = NhomDonVi::where('ten_nhom_don_vi', 'LIKE', LANH_DAO_UY_BAN)->first();
        $donViCapHuyen = DonVi::where('nhom_don_vi', $nhomDonVi->id ?? null)->first();
//        switch (auth::user()->roles->pluck('name')[0]) {
//            case CHUYEN_VIEN:
//                if (empty($donVi->cap_xa)) {
//                    $nguoinhan = User::role([TRUONG_PHONG, PHO_PHONG, CHANH_VAN_PHONG, PHO_CHANH_VAN_PHONG])->where('don_vi_id', auth::user()->don_vi_id)->get();
//                } else {
//                    $nguoinhan = User::role([TRUONG_BAN, PHO_TRUONG_BAN])->where('don_vi_id', auth::user()->don_vi_id)->get();
//                }
//                break;
//            case PHO_CHU_TICH:
//                if (empty($donVi->cap_xa)) {
//                    $nguoinhan = User::role([CHU_TICH])->where('don_vi_id', auth::user()->don_vi_id)->get();
//                } else {
//                    $nguoinhan = User::role([CHU_TICH])->where('don_vi_id', $donVi->id)->get();
//                }
//                break;
//            case CHU_TICH:
//                if (empty($donVi->cap_xa)) {
//                    $nguoinhan = null;
//                } else {
//                    $nguoinhan = User::role([CHU_TICH, PHO_CHU_TICH])->get();
//                }
//                break;
//            case TRUONG_BAN:
//                $nguoinhan = User::role([PHO_CHU_TICH, CHU_TICH])->where('don_vi_id', $donVi->id)->get();
//                break;
//            case PHO_TRUONG_BAN:
//                $nguoinhan = User::role([TRUONG_BAN])->where('don_vi_id', auth::user()->don_vi_id)->get();
//                break;
//
//        }

        $lanhDaoSo = User::role([CHU_TICH, PHO_CHU_TICH])
            ->whereHas('donVi', function ($query) {
                return $query->whereNull('cap_xa');
            })->get();
        switch (auth::user()->roles->pluck('name')[0]) {
            case CHUYEN_VIEN:
                if ($donVi->parent_id == 0) {
                    $nguoinhan = User::role([TRUONG_PHONG, PHO_PHONG, CHANH_VAN_PHONG, PHO_CHANH_VAN_PHONG])->where('don_vi_id', auth::user()->don_vi_id)->get();

                } else {
                    $nguoinhan = User::role([TRUONG_BAN, PHO_TRUONG_BAN])->where('don_vi_id', auth::user()->don_vi_id)->get();
                }
                break;
            case PHO_PHONG:
                $nguoinhan = User::role([TRUONG_PHONG])->where('don_vi_id', auth::user()->don_vi_id)->get();
                break;
            case TRUONG_PHONG:
                if ($donVi->parent_id == 0) {
                    $nguoinhan = $lanhDaoSo;
                } else {
                    $nguoinhan = User::role([CHU_TICH, PHO_CHU_TICH])->where('don_vi_id', $donVi->parent_id)->get();
                }
                break;
            case PHO_CHU_TICH:
                if ($donVi->parent_id == 0) {
                    $nguoinhan = User::role([CHU_TICH])->where('don_vi_id', auth::user()->don_vi_id)->get();
                } else {
                    $nguoinhan = User::role([CHU_TICH])->where('don_vi_id', $donVi->parent_id)->get();
                }
                break;
            case CHU_TICH:
                if ($donVi->parent_id == 0) {
                    $nguoinhan = null;
                } else {
                    $nguoinhan = User::role([CHU_TICH, PHO_CHU_TICH])->get();
                }
                break;
            case CHANH_VAN_PHONG:
                if ($donVi->parent_id == 0) {
                    $nguoinhan = $lanhDaoSo;
                }
                break;
            case PHO_CHANH_VAN_PHONG:
                $nguoinhan = User::role([CHANH_VAN_PHONG])->get();
                break;
            case VAN_THU_DON_VI:
                $nguoinhan = User::role([TRUONG_BAN, PHO_TRUONG_BAN])->where('don_vi_id', auth::user()->don_vi_id)->get();
                break;
            case VAN_THU_HUYEN:
                $nguoinhan = User::role([CHU_TICH, PHO_CHU_TICH, CHANH_VAN_PHONG, PHO_CHANH_VAN_PHONG])
                    ->whereHas('donVi', function ($query) {
                        return $query->whereNull('cap_xa');
                    })->get();
                break;
            case TRUONG_BAN:
                $nguoinhan = User::role([PHO_CHU_TICH, CHU_TICH])->where('don_vi_id', $donVi->parent_id)->get();;
                break;
            case PHO_TRUONG_BAN:
                $nguoinhan = User::role([TRUONG_BAN])->where('don_vi_id', auth::user()->don_vi_id)->get();
                break;

        }
        $laydanhgiacanhan = null;
        if (empty($thang)) {
            $laydanhgiacanhan = DuyetDanhGia::where(['thang' => $month, 'cap_danh_gia' => 1, 'can_bo_goc' => auth::user()->id])->first();
            $laydanhgiaphophong = DuyetDanhGia::where(['thang' => $month, 'cap_danh_gia' => 3, 'can_bo_goc' => auth::user()->id])->first();
            $laydanhgiatruongphong = DuyetDanhGia::where(['thang' => $month, 'cap_danh_gia' => 2, 'can_bo_goc' => auth::user()->id])->first();
        } else {
            $laydanhgiacanhan = DuyetDanhGia::where(['thang' => $thang, 'cap_danh_gia' => 1, 'can_bo_goc' => auth::user()->id])->first();
            $laydanhgiaphophong = DuyetDanhGia::where(['thang' => $thang, 'cap_danh_gia' => 3, 'can_bo_goc' => auth::user()->id])->first();
            $laydanhgiatruongphong = DuyetDanhGia::where(['thang' => $thang, 'cap_danh_gia' => 2, 'can_bo_goc' => auth::user()->id])->first();
        }
        return view('danhgiacanbo::tieu_chi_danh_gia.mau_so_1_chi_cuc', compact('nguoinhan', 'month', 'laydanhgiaphophong', 'laydanhgiacanhan', 'laydanhgiatruongphong'));

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
        $user = auth::user();
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


    if ($user->hasRole(CHUYEN_VIEN) || $user->hasRole(TRUONG_BAN) || $user->hasRole(PHO_TRUONG_BAN)|| $user->hasRole(PHO_CHU_TICH) ) {
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


        return redirect()->back()->with('success', 'Đánh giá thành công !');
    }

    public function captrendanhgia(Request $request)
    {

        $thang = $request->get('thang');
        $month = Carbon::now()->format('m');
        $user = auth::user();
        $donVi = $user->donVi;
        $nguoinhan = null;
//        switch (auth::user()->roles->pluck('name')[0]) {
//            case CHUYEN_VIEN:
//                $nguoinhan = User::role([TRUONG_PHONG, PHO_PHONG])->where('don_vi_id', auth::user()->don_vi_id)->get();
//                break;
//            case PHO_PHONG:
//                $nguoinhan = User::role([TRUONG_PHONG])->where('don_vi_id', auth::user()->don_vi_id)->get();
//                break;
//            case TRUONG_PHONG:
//                $nguoinhan = User::role([CHANH_VAN_PHONG, PHO_CHANH_VAN_PHONG])->get();
//                break;
//            case PHO_CHU_TICH:
//                $nguoinhan = User::role([CHU_TICH])->get();
//                break;
//            case CHU_TICH:
//                $nguoinhan = null;
//                break;
//            case CHANH_VAN_PHONG:
//                $nguoinhan = User::role([PHO_CHU_TICH, CHU_TICH])->get();
//                break;
//            case PHO_CHANH_VAN_PHONG:
//                $nguoinhan = User::role([QUYEN_CHANH_VAN_PHONG])->get();
//                break;
//            case VAN_THU_DON_VI:
//                $nguoinhan = User::role([TRUONG_PHONG, PHO_PHONG])->where('don_vi_id', auth::user()->don_vi_id)->get();
//                break;
//            case VAN_THU_HUYEN:
//                $nguoinhan = User::role([CHU_TICH, PHO_CHU_TICH, CHANH_VAN_PHONG, PHO_CHANH_VAN_PHONG])->get();
//                break;
//
//        }

        $lanhDaoSo = User::role([CHU_TICH, PHO_CHU_TICH])
            ->whereHas('donVi', function ($query) {
                return $query->whereNull('cap_xa');
            })->get();
        switch (auth::user()->roles->pluck('name')[0]) {
            case CHUYEN_VIEN:
                if ($donVi->parent_id == 0) {
                    $nguoinhan = User::role([TRUONG_PHONG, PHO_PHONG, CHANH_VAN_PHONG, PHO_CHANH_VAN_PHONG])->where('don_vi_id', auth::user()->don_vi_id)->get();

                } else {
                    $nguoinhan = User::role([TRUONG_BAN, PHO_TRUONG_BAN])->where('don_vi_id', auth::user()->don_vi_id)->get();
                }
                break;
            case PHO_PHONG:
                $nguoinhan = User::role([TRUONG_PHONG])->where('don_vi_id', auth::user()->don_vi_id)->get();
                break;
            case TRUONG_PHONG:
                if ($donVi->parent_id == 0) {
                    $nguoinhan = $lanhDaoSo;
                } else {
                    $nguoinhan = User::role([CHU_TICH, PHO_CHU_TICH])->where('don_vi_id', $donVi->parent_id)->get();
                }
                break;
            case PHO_CHU_TICH:
                if ($donVi->parent_id == 0) {
                    $nguoinhan = User::role([CHU_TICH])->where('don_vi_id', auth::user()->don_vi_id)->get();
                } else {
                    $nguoinhan = User::role([CHU_TICH])->where('don_vi_id', $donVi->parent_id)->get();
                }
                break;
            case CHU_TICH:
                if ($donVi->parent_id == 0) {
                    $nguoinhan = null;
                } else {
                    $nguoinhan = User::role([CHU_TICH, PHO_CHU_TICH])->get();
                }
                break;
            case CHANH_VAN_PHONG:
                if ($donVi->parent_id == 0) {
                    $nguoinhan = $lanhDaoSo;
                }
                break;
            case PHO_CHANH_VAN_PHONG:
                $nguoinhan = User::role([CHANH_VAN_PHONG])->get();
                break;
            case VAN_THU_DON_VI:
                $nguoinhan = User::role([TRUONG_BAN, PHO_TRUONG_BAN])->where('don_vi_id', auth::user()->don_vi_id)->get();
                break;
            case VAN_THU_HUYEN:
                $nguoinhan = User::role([CHU_TICH, PHO_CHU_TICH, CHANH_VAN_PHONG, PHO_CHANH_VAN_PHONG])
                    ->whereHas('donVi', function ($query) {
                        return $query->whereNull('cap_xa');
                    })->get();
                break;
            case TRUONG_BAN:
                $nguoinhan = User::role([PHO_CHU_TICH, CHU_TICH])->where('don_vi_id', $donVi->parent_id)->get();;
                break;
            case PHO_TRUONG_BAN:
                $nguoinhan = User::role([TRUONG_BAN])->where('don_vi_id', auth::user()->don_vi_id)->get();
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
        if (auth::user()->hasRole(PHO_CHU_TICH) || auth::user()->hasRole(PHO_CHANH_VAN_PHONG)|| auth::user()->hasRole(VAN_THU_HUYEN)|| auth::user()->hasRole(PHO_PHONG)) {
            $capnhatdanhgiacu->trang_thai = 3;
            $capnhatdanhgiacu->save();
        } elseif (auth::user()->hasRole(CHU_TICH) || auth::user()->hasRole(CHANH_VAN_PHONG) || auth::user()->hasRole(TRUONG_PHONG)) {
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

        if (auth::user()->hasRole(CHU_TICH) || auth::user()->hasRole(CHANH_VAN_PHONG) || auth::user()->hasRole(TRUONG_PHONG)) {
            $duyetdanhgia->cap_danh_gia = 2;
        } elseif (auth::user()->hasRole(PHO_CHU_TICH) || auth::user()->hasRole(PHO_CHANH_VAN_PHONG)|| auth::user()->hasRole(PHO_PHONG) || auth::user()->hasRole(VAN_THU_HUYEN)) {
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
        return redirect()->back()->with('success', 'Đánh giá thành công !');
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
