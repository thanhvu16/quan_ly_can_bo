<?php

namespace App\Models;

use App\User;
use Illuminate\Http\Request;
use Modules\Admin\Entities\DonVi;
use Modules\CongViecDonVi\Entities\CongViecDonVi;
use Modules\LichCongTac\Entities\CuocHopChiTiet;
use Modules\LichCongTac\Entities\DanhGiaGopY;
use Modules\LichCongTac\Entities\DanhGiaTaiLieu;
use Modules\LichCongTac\Entities\FileCuocHop;
use Modules\LichCongTac\Entities\ThanhPhanDuHop;
use Modules\VanBanDen\Entities\FileVanBanDen;
use Modules\VanBanDen\Entities\VanBanDen;
use Modules\DieuHanhVanBanDen\Entities\XuLyVanBanDen;
use Modules\DieuHanhVanBanDen\Entities\DonViChuTri;
use Illuminate\Database\Eloquent\Model;
use Modules\VanBanDi\Entities\VanBanDi;
use Auth;

class LichCongTac extends Model
{
    protected $table = 'dhvbd_lich_cong_tac';

    protected $fillable = [
        'object_id',
        'parent_id',
        'type',
        'lanh_dao_id',
        'ngay',
        'gio',
        'tuan',
        'noi_dung',
        'don_vi_id',
        'buoi',
        'dia_diem',
        'trang_thai_lich',
        'ghi_chu',
        'user_id',
        'don_vi_du_hop',
        'parent_don_vi_id',
        'thanh_phan_du_hop_id',
        'trang_thai'
    ];

    const TYPE_VB_DI = 1;
    const TYPE_NHAP_TRUC_TIEP = 2;
    const DON_VI_DU_HOP = 1;
    const TRANG_THAI_HOAT_DONG = 1;

    public function vanBanDen()
    {
        return $this->hasOne(VanBanDen::class, 'id', 'object_id');
    }

    public function lanhDao()
    {
        return $this->belongsTo(User::class, 'lanh_dao_id', 'id');
    }

    public static function checkLanhDaoDuHop($lanhDaoId)
    {
        return User::where('id', $lanhDaoId)->where('trang_thai', ACTIVE)->whereNull('deleted_at')->first();
    }

    public function chuanBiTruocCuocHop()
    {
        $xuLyVanBanDen = XuLyVanBanDen::where('van_ban_den_id', $this->object_id)
            ->where('can_bo_chuyen_id', $this->lanh_dao_id)->first();

        return $xuLyVanBanDen->id ?? null;
    }

    public function donViChuTri()
    {
        return DonViChuTri::where('van_ban_den_id', $this->object_id)->get();
    }

    public function vanBanDi()
    {
        return $this->belongsTo(VanBanDi::class, 'object_id', 'id');
    }

    public function congViecDonVi()
    {
        return $this->hasOne(CongViecDonVi::class, 'lich_cong_tac_id', 'id');
    }

    public static function taoLichCongTac($vanBanDi)
    {
        $tuan = date('W', strtotime($vanBanDi->ngay_hop));

        $lanhDaoDuHop = self::checkLanhDaoDuHop($vanBanDi->nguoi_ky);
        $noiDungMoiHop = $vanBanDi->noi_dung_hop ?? null;

        if (!empty($lanhDaoDuHop) && empty($vanBanDi->noi_dung_hop)) {

            $noiDungMoiHop = 'K??nh m???i ' . $lanhDaoDuHop->chucVu->ten_chuc_vu . ' ' . $lanhDaoDuHop->ho_ten . ' d??? h???p';
        }

        $dataLichCongTac = array(
            'object_id' => $vanBanDi->id,
            'lanh_dao_id' => $lanhDaoDuHop->id,
            'ngay' => $vanBanDi->ngay_hop,
            'gio' => $vanBanDi->gio_hop,
            'tuan' => $tuan,
            'buoi' => ($vanBanDi->gio_hop <= '12:00') ? 1 : 2,
            'noi_dung' => !empty($vanBanDi->noi_dung_hop) ? $vanBanDi->noi_dung_hop : $vanBanDi->trich_yeu,
            'dia_diem' => !empty($vanBanDi->dia_diem) ? $vanBanDi->dia_diem : null,
            'user_id' => auth::user()->id,
            'type' => LichCongTac::TYPE_VB_DI
        );
        //check lich cong tac
        $lichCongTac = LichCongTac::where('object_id', $vanBanDi->id)
            ->where('type', LichCongTac::TYPE_VB_DI)
            ->first();

        if (empty($lichCongTac)) {
            $lichCongTac = new LichCongTac();
        }
        $lichCongTac->fill($dataLichCongTac);
        $lichCongTac->save();
    }

    public static function taoLichHopVanBanDen($vanBanDenId, $lanhDaoDuHopId, $donViDuHop, $donViChuTriId, $chuyenTuDonVi = null)
    {
        $vanBanDen = VanBanDen::where('id', $vanBanDenId)->first();
        $currentUser = auth::user();
        $lanhDaoId = $lanhDaoDuHopId;

        $roles = [TRUONG_PHONG, CHANH_VAN_PHONG];
        $nguoiDung = null;
        $donVi = DonVi::where('id', $donViChuTriId)->whereNull('deleted_at')->first();
        $parentDonVi = DonVi::where('id', $donVi->parent_id ?? null)->whereNull('deleted_at')->first();

        if (!empty($donViChuTriId)) {
            if (isset($donVi) && $donVi->cap_xa == DonVi::CAP_XA) {
                $roles = [CHU_TICH];
            }
            $nguoiDung = User::where('trang_thai', ACTIVE)
                ->where('don_vi_id', $donViChuTriId)
                ->whereHas('roles', function ($query) use ($roles) {
                    return $query->whereIn('name', $roles);
                })
                ->orderBy('id', 'DESC')
                ->whereNull('deleted_at')->first();
        }

        $tuan = date('W', strtotime($vanBanDen->ngay_hop_chinh));

        $lanhDaoDuHop = LichCongTac::checkLanhDaoDuHop($lanhDaoDuHopId);
        $noiDungMoiHop = null;

        if (!empty($lanhDaoDuHop)) {

            $noiDungMoiHop = 'K??nh m???i ' . $lanhDaoDuHop->chucVu->ten_chuc_vu . ' ' . $lanhDaoDuHop->ho_ten . ' d??? h???p';
        }

        // don vi du hop tu ld
        if (!empty($donViDuHop) && $donViDuHop == VanBanDen::DON_VI_DU_HOP) {
            $lanhDaoId = $nguoiDung->id ?? null;
        }

        // chuyen tu truong phong don vi
        if (!empty($chuyenTuDonVi) && !empty($donViDuHop) && $donViDuHop == VanBanDen::DON_VI_DU_HOP) {
            $lanhDaoId = $lanhDaoDuHopId;
        }

        $dataLichCongTac = array(
            'object_id' => $vanBanDen->id,
            'lanh_dao_id' => $lanhDaoId,
            'ngay' => $vanBanDen->ngay_hop,
            'gio' => $vanBanDen->gio_hop,
            'tuan' => $tuan,
            'buoi' => ($vanBanDen->gio_hop <= '12:00') ? 1 : 2,
            'noi_dung' => !empty($vanBanDen->noi_dung_hop) ? $vanBanDen->noi_dung_hop : $vanBanDen->trich_yeu,
            'dia_diem' => !empty($vanBanDen->dia_diem) ? $vanBanDen->dia_diem : null,
            'user_id' => $currentUser->id,
            'don_vi_du_hop' => !empty($donViDuHop) ? $donViChuTriId : null,
            'parent_don_vi_id' => !empty($parentDonVi) ? $parentDonVi->id : $donVi->id ?? null
        );
        //check lich cong tac
        $lichCongTac = LichCongTac::where('object_id', $vanBanDenId)->whereNull('type')->first();
        if (empty($lichCongTac)) {
            $lichCongTac = new LichCongTac();
        }
        $lichCongTac->fill($dataLichCongTac);
        $lichCongTac->save();
        $lichCongTac->chu_tri = LichCongTac::TRANG_THAI_HOAT_DONG;

        //lanh dao duyet
        if (auth::user()->id == $lanhDaoId) {
            $lichCongTac->trang_thai = LichCongTac::TRANG_THAI_HOAT_DONG;
            $lichCongTac->save();
        } else {
//            $lichCongTac->trang_thai = null;
            $lichCongTac->trang_thai = LichCongTac::TRANG_THAI_HOAT_DONG;
            $lichCongTac->save();
        }

        //th??m file gi???y m???i v??o qu???n l?? cu???c h???p$vanBanDenId
        $fileVanBanDen = FileVanBanDen::where('vb_den_id', $vanBanDenId)->first();
        if (!empty($fileVanBanDen)) {
            $filecuochop = new FileCuocHop();
            $filecuochop->ten_file = $fileVanBanDen->ten_file;
            $filecuochop->duong_dan = $fileVanBanDen->duong_dan;
            $filecuochop->duoi_file = $fileVanBanDen->duoi_file;
            $filecuochop->lich_hop_id = $lichCongTac->id;
            $filecuochop->nguoi_tao = $fileVanBanDen->nguoi_dung_id;
            $filecuochop->trang_thai = 1;
            $filecuochop->save();
        }
    }

    public static function taoLichHopVanBanDenCV($vanBanDenId, $lanhDaoDuHopId, $donViDuHop, $donViChuTriId, $chuyenTuDonVi = null)
    {
        $vanBanDen = VanBanDen::where('id', $vanBanDenId)->first();
        $currentUser = auth::user();
        $lanhDaoId = $lanhDaoDuHopId;
        $donVi = DonVi::where('id', $donViChuTriId)->whereNull('deleted_at')->first();
        $parentDonVi = DonVi::where('id', $donVi->parent_id ?? null)->whereNull('deleted_at')->first();

        $tuan = date('W', strtotime($vanBanDen->ngay_hop_chinh));

        $lanhDaoDuHop = LichCongTac::checkLanhDaoDuHop($lanhDaoDuHopId);

        if (!empty($lanhDaoDuHop)) {

            $noiDungMoiHop = 'K??nh m???i ' . $lanhDaoDuHop->chucVu->ten_chuc_vu . ' ' . $lanhDaoDuHop->ho_ten . ' d??? h???p';
        }

        $dataLichCongTac = array(
            'object_id' => $vanBanDen->id,
            'lanh_dao_id' => $lanhDaoId,
            'ngay' => $vanBanDen->ngay_hop,
            'gio' => $vanBanDen->gio_hop,
            'tuan' => $tuan,
            'buoi' => ($vanBanDen->gio_hop <= '12:00') ? 1 : 2,
            'noi_dung' => !empty($vanBanDen->noi_dung_hop) ? $vanBanDen->noi_dung_hop : $vanBanDen->trich_yeu,
            'dia_diem' => !empty($vanBanDen->dia_diem) ? $vanBanDen->dia_diem : null,
            'user_id' => $currentUser->id,
            'don_vi_du_hop' => !empty($donViDuHop) ? $donViChuTriId : null,
            'parent_don_vi_id' => !empty($parentDonVi) ? $parentDonVi->id : $donVi->id ?? null
        );
        //check lich cong tac
        $lichCongTac = LichCongTac::where('object_id', $vanBanDenId)->where('lanh_dao_id',$lanhDaoId)->first();
//        $lichCongTac3 = LichCongTac::where('object_id', $vanBanDenId)->where('lanh_dao_id',$lanhDaoId)->where('chu_tri',1)->first();
        if($lichCongTac == null  )
        {
            $lichCongTac = new LichCongTac();
            $lichCongTac->fill($dataLichCongTac);
            $lichCongTac->save();
            $lichCongTac->trang_thai = LichCongTac::TRANG_THAI_HOAT_DONG;
            $lichCongTac->du_hop = LichCongTac::TRANG_THAI_HOAT_DONG;
            $lichCongTac->save();
        }


    }

    public static function taoLichHopPhoChuTich($vanBanDenId, $phoGiamDocDuHop)
    {
        $vanBanDen = VanBanDen::where('id', $vanBanDenId)->first();
        $currentUser = auth::user();
        $tuan = date('W', strtotime($vanBanDen->ngay_hop_chinh));

        foreach ($phoGiamDocDuHop as $lanhDaoId) {
            $dataLichCongTac = array(
                'object_id' => $vanBanDen->id,
                'lanh_dao_id' => $lanhDaoId,
                'ngay' => $vanBanDen->ngay_hop,
                'gio' => $vanBanDen->gio_hop,
                'tuan' => $tuan,
                'buoi' => ($vanBanDen->gio_hop <= '12:00') ? 1 : 2,
                'noi_dung' => !empty($vanBanDen->noi_dung_hop) ? $vanBanDen->noi_dung_hop : $vanBanDen->trich_yeu,
                'dia_diem' => !empty($vanBanDen->dia_diem) ? $vanBanDen->dia_diem : null,
                'user_id' => $currentUser->id,
                'don_vi_du_hop' => null,
                'parent_don_vi_id' => !empty($parentDonVi) ? $parentDonVi->id : $donVi->id ?? null,
                'trang_thai' => 1
            );
            //check lich cong tac
//            $lichCongTac = LichCongTac::where('object_id', $vanBanDenId)->whereNull('type')->first();
//            if (empty($lichCongTac)) {
            $lichCongTac = new LichCongTac();
//            }
            $lichCongTac->fill($dataLichCongTac);
            $lichCongTac->save();
        }


    }
    public static function taoLichHopVB($vanBanDenId, $lanhDaoDuHopId, $donViDuHop, $donViChuTriId, $chuyenTuDonVi = null)
    {
        $vanBanDen = VanBanDen::where('id', $vanBanDenId)->first();
        $currentUser = auth::user();
        $lanhDaoId = $lanhDaoDuHopId;
        $donVi = DonVi::where('id', $donViChuTriId)->whereNull('deleted_at')->first();
        $parentDonVi = DonVi::where('id', $donVi->parent_id ?? null)->whereNull('deleted_at')->first();

        $tuan = date('W', strtotime($vanBanDen->ngay_hop_chinh));

        $lanhDaoDuHop = LichCongTac::checkLanhDaoDuHop($lanhDaoDuHopId);

        if (!empty($lanhDaoDuHop)) {

            $noiDungMoiHop = 'K??nh m???i ' . $lanhDaoDuHop->chucVu->ten_chuc_vu . ' ' . $lanhDaoDuHop->ho_ten . ' d??? h???p';
        }

        $dataLichCongTac = array(
            'object_id' => $vanBanDen->id,
            'lanh_dao_id' => $lanhDaoId,
            'ngay' => $vanBanDen->ngay_hop,
            'gio' => $vanBanDen->gio_hop,
            'tuan' => $tuan,
            'buoi' => ($vanBanDen->gio_hop <= '12:00') ? 1 : 2,
            'noi_dung' => !empty($vanBanDen->noi_dung_hop) ? $vanBanDen->noi_dung_hop : $vanBanDen->trich_yeu,
            'dia_diem' => !empty($vanBanDen->dia_diem) ? $vanBanDen->dia_diem : null,
            'user_id' => $currentUser->id,
            'don_vi_du_hop' => !empty($donViDuHop) ? $donViChuTriId : null,
            'parent_don_vi_id' => !empty($parentDonVi) ? $parentDonVi->id : $donVi->id ?? null
        );
        //check lich cong tac
        $lichCongTac = LichCongTac::where('object_id', $vanBanDenId)->where('lanh_dao_id',$lanhDaoId)->first();
        if (empty($lichCongTac)) {
            $lichCongTac = new LichCongTac();
            $lichCongTac->fill($dataLichCongTac);
            $lichCongTac->save();
            $lichCongTac->trang_thai = LichCongTac::TRANG_THAI_HOAT_DONG;
            $lichCongTac->save();
        }


    }
    public static function kiemTraLichPP($vanBanDenId, $lanhDaoDuHopId, $donViDuHop, $donViChuTriId, $chuyenTuDonVi = null,$trangThai)
    {
        $vanBanDen = VanBanDen::where('id', $vanBanDenId)->first();
        $currentUser = auth::user();
        $lanhDaoId = $lanhDaoDuHopId;
        $donVi = DonVi::where('id', $donViChuTriId)->whereNull('deleted_at')->first();
        $parentDonVi = DonVi::where('id', $donVi->parent_id ?? null)->whereNull('deleted_at')->first();

        $tuan = date('W', strtotime($vanBanDen->ngay_hop_chinh));

        $lanhDaoDuHop = LichCongTac::checkLanhDaoDuHop($lanhDaoDuHopId);

        if (!empty($lanhDaoDuHop)) {

            $noiDungMoiHop = 'K??nh m???i ' . $lanhDaoDuHop->chucVu->ten_chuc_vu . ' ' . $lanhDaoDuHop->ho_ten . ' d??? h???p';
        }

        $dataLichCongTac = array(
            'object_id' => $vanBanDen->id,
            'lanh_dao_id' => $lanhDaoId,
            'ngay' => $vanBanDen->ngay_hop,
            'gio' => $vanBanDen->gio_hop,
            'tuan' => $tuan,
            'buoi' => ($vanBanDen->gio_hop <= '12:00') ? 1 : 2,
            'noi_dung' => !empty($vanBanDen->noi_dung_hop) ? $vanBanDen->noi_dung_hop : $vanBanDen->trich_yeu,
            'dia_diem' => !empty($vanBanDen->dia_diem) ? $vanBanDen->dia_diem : null,
            'user_id' => $currentUser->id,
            'don_vi_du_hop' => !empty($donViDuHop) ? $donViChuTriId : null,
            'parent_don_vi_id' => !empty($parentDonVi) ? $parentDonVi->id : $donVi->id ?? null
        );
        //check lich cong tac



        $lichCongTac = LichCongTac::where('object_id', $vanBanDenId)->where('lanh_dao_id',$lanhDaoId)->delete();
        $lichCongTac = new LichCongTac();
        $lichCongTac->fill($dataLichCongTac);
        $lichCongTac->save();
        if($trangThai == 2)
        {
            $LichCongTac1 = LichCongTac::where('object_id', $vanBanDenId)->where('chu_tri',1)->first();
            if($LichCongTac1)
            {
                $LichCongTac1->chu_tri = null;
                $LichCongTac1->save();
            }
            $lichCongTac->chu_tri = LichCongTac::TRANG_THAI_HOAT_DONG;
        }
        $lichCongTac->trang_thai = LichCongTac::TRANG_THAI_HOAT_DONG;
        $lichCongTac->save();


    }
    public static function kiemTraLichCV($vanBanDenId, $lanhDaoDuHopId, $donViDuHop, $donViChuTriId, $chuyenTuDonVi = null,$trangThai)
    {
        $vanBanDen = VanBanDen::where('id', $vanBanDenId)->first();
        $currentUser = auth::user();
        $lanhDaoId = $lanhDaoDuHopId;
        $donVi = DonVi::where('id', $donViChuTriId)->whereNull('deleted_at')->first();
        $parentDonVi = DonVi::where('id', $donVi->parent_id ?? null)->whereNull('deleted_at')->first();

        $tuan = date('W', strtotime($vanBanDen->ngay_hop_chinh));

        $lanhDaoDuHop = LichCongTac::checkLanhDaoDuHop($lanhDaoDuHopId);

        if (!empty($lanhDaoDuHop)) {

            $noiDungMoiHop = 'K??nh m???i ' . $lanhDaoDuHop->chucVu->ten_chuc_vu . ' ' . $lanhDaoDuHop->ho_ten . ' d??? h???p';
        }

        $dataLichCongTac = array(
            'object_id' => $vanBanDen->id,
            'lanh_dao_id' => $lanhDaoId,
            'ngay' => $vanBanDen->ngay_hop,
            'gio' => $vanBanDen->gio_hop,
            'tuan' => $tuan,
            'buoi' => ($vanBanDen->gio_hop <= '12:00') ? 1 : 2,
            'noi_dung' => !empty($vanBanDen->noi_dung_hop) ? $vanBanDen->noi_dung_hop : $vanBanDen->trich_yeu,
            'dia_diem' => !empty($vanBanDen->dia_diem) ? $vanBanDen->dia_diem : null,
            'user_id' => $currentUser->id,
            'don_vi_du_hop' => !empty($donViDuHop) ? $donViChuTriId : null,
            'parent_don_vi_id' => !empty($parentDonVi) ? $parentDonVi->id : $donVi->id ?? null
        );
        //check lich cong tac

        $lichCongTac2 = LichCongTac::where('object_id', $vanBanDenId)->where('lanh_dao_id',$lanhDaoId)->delete();

        $lichCongTac = new LichCongTac();
        $lichCongTac->fill($dataLichCongTac);
        $lichCongTac->save();
        if($trangThai == 3)
        {
            $LichCongTac1 = LichCongTac::where('object_id', $vanBanDenId)->where('chu_tri',1)->first();
            if($LichCongTac1)
            {
                $LichCongTac1->chu_tri = null;
                $LichCongTac1->save();
            }
            $lichCongTac->chu_tri = LichCongTac::TRANG_THAI_HOAT_DONG;
        }
        $lichCongTac->trang_thai = LichCongTac::TRANG_THAI_HOAT_DONG;
        $lichCongTac->save();


    }

    public function listThanhPhanDuHop()
    {
        return ThanhPhanDuHop::where(['lich_cong_tac_id' => $this->id,
            'don_vi_id' => auth::user()->don_vi_id,
        ])
            ->where('trang_thai', ThanhPhanDuHop::TRANG_THAI_DI_HOP)
            ->get();
    }

    public function lichCaNhanDuHop()
    {
        return ThanhPhanDuHop::where('user_id', auth::user()->id)
            ->where('lich_cong_tac_id', $this->id)
            ->select('id', 'trang_thai', 'trang_thai_lich')
            ->first();
    }

    public function checkDaChuyenLichCaNhan()
    {
        return ThanhPhanDuHop::where('lich_cong_tac_id', $this->id)
            ->where('user_id', auth::user()->id)
            ->where('trang_thai_lich', ThanhPhanDuHop::TRANG_THAI_LICH_DA_CHUYEN)
            ->select('id', 'trang_thai', 'trang_thai_lich')
            ->first();
    }

    public function fileKetLuan()
    {
        return $this->hasMany(FileCuocHop::class, 'lich_hop_id', 'id')->where('trang_thai', 3);
    }

    public function fileCuocHop()
    {
        return $this->hasMany(FileCuocHop::class, 'lich_hop_id', 'id')->where('trang_thai', 1);
    }

    public function fileThamKhao()
    {
        return $this->hasMany(FileCuocHop::class, 'lich_hop_id', 'id')->where('trang_thai', 2);
    }

    public function Danh()
    {
        return $this->hasMany(FileCuocHop::class, 'lich_hop_id', 'id')->where('trang_thai', 2);
    }

    public function getParent()
    {
        return LichCongTac::where('id', $this->parent_id)->first();
    }

    public function sLcuocHopChuTri($id)
    {
        $soluong = LichCongTac::where('lanh_dao_id', $id)->count();
        return $soluong;
    }

    public function sLcuocHopCoKetLuan($id)
    {
        $soluong = null;
        $lichct = LichCongTac::where('lanh_dao_id', $id)->get();
        foreach ($lichct as $data) {
            $cuocHop = CuocHopChiTiet::where('lich_hop_id', $data->id)->first();
            if ($cuocHop) {
                if ($cuocHop != null && $cuocHop->ket_luan_cuoc_hop != null) {
                    $soluong = $soluong + 1;
                }
            }

        }
        if ($soluong == 0) {
            return 0;

        } else {
            return $soluong;
        }
    }

    public function sLcuocHopCoTaiLieu($id)
    {
        $soluong = null;
        $lichct = LichCongTac::where('lanh_dao_id', $id)->get();
        foreach ($lichct as $data) {
            $file = FileCuocHop::where('lich_hop_id', $data->id)->whereIn('trang_thai', [1, 2])->first();
            if ($file) {
                $soluong = $soluong + 1;
            }
        }
        if ($soluong == 0) {
            return 0;

        } else {
            return $soluong;
        }
    }

    public function sLcuocHopCoYKien($id)
    {
        $soluong = null;
        $lichct = LichCongTac::where('lanh_dao_id', $id)->get();
        foreach ($lichct as $data) {
            $gopY = DanhGiaGopY::where('id_lich_hop', $data->id)->first();
            if ($gopY) {
                $soluong = $soluong + 1;
            }
        }
        if ($soluong == 0) {
            return 0;

        } else {
            return $soluong;
        }
    }

    public function sLcuocHopKhongDat($id)
    {
        $soluong = null;
        $lichct = LichCongTac::where(['lanh_dao_id' => $id])->where('danh_gia', 2)->count();
        return $lichct;
    }

    public function sLcuocHopCoTaiLieuKhongDat($id)
    {
        $soluong = null;
        $lichct = LichCongTac::where('lanh_dao_id', $id)->get();
        foreach ($lichct as $data) {
            $gopY = DanhGiaTaiLieu::where('id_lich_ct', $data->id)->first();
            if ($gopY && ($gopY->danh_gia_chat_luong_chuan_bi_tai_lieu == 2)) {
                $soluong = $soluong + 1;
            }
        }
        if ($soluong == 0) {
            return 0;

        } else {
            return $soluong;
        }
    }

    public function sLcuocHopCoTaiLieucham($id)
    {
        $soluong = null;
        $lichct = LichCongTac::where('lanh_dao_id', $id)->get();
        foreach ($lichct as $data) {
            $file = FileCuocHop::where('lich_hop_id', $data->id)->whereIn('trang_thai', [1, 2])->first();
            if ($file && (date_format($data->created_at, 'Y-m-d') == $data->ngay)) {
                $soluong = $soluong + 1;
            }
        }
        if ($soluong == 0) {
            return 0;

        } else {
            return $soluong;
        }
    }

    public static function taoLichTruongPhong($vanBanDenId, $lanhDaoDuHopId, $donViDuHop, $donViChuTriId, $phoPhong, $chuyeVien, $trangThai, $donViPhoiHop)
    {
        $vanBanDen = VanBanDen::where('id', $vanBanDenId)->first();
        $currentUser = auth::user();
        $donVi = DonVi::where('id', $donViChuTriId)->whereNull('deleted_at')->first();
        $parentDonVi = DonVi::where('id', $donVi->parent_id ?? null)->whereNull('deleted_at')->first();
        $tuan = date('W', strtotime($vanBanDen->ngay_hop_chinh));




        $dataLichCongTac1 = array(
            'object_id' => $vanBanDen->id,
            'lanh_dao_id' => $lanhDaoDuHopId,
            'ngay' => $vanBanDen->ngay_hop,
            'gio' => $vanBanDen->gio_hop,
            'tuan' => $tuan,
            'buoi' => ($vanBanDen->gio_hop <= '12:00') ? 1 : 2,
            'noi_dung' => !empty($vanBanDen->noi_dung_hop) ? $vanBanDen->noi_dung_hop : $vanBanDen->trich_yeu,
            'dia_diem' => !empty($vanBanDen->dia_diem) ? $vanBanDen->dia_diem : null,
            'user_id' => $currentUser->id,
            'don_vi_du_hop' => !empty($donViDuHop) ? $donViChuTriId : null,
            'parent_don_vi_id' => !empty($parentDonVi) ? $parentDonVi->id : $donVi->id ?? null
        );
        $dataLichCongTac2 = array(
            'object_id' => $vanBanDen->id,
            'lanh_dao_id' => $phoPhong,
            'ngay' => $vanBanDen->ngay_hop,
            'gio' => $vanBanDen->gio_hop,
            'tuan' => $tuan,
            'buoi' => ($vanBanDen->gio_hop <= '12:00') ? 1 : 2,
            'noi_dung' => !empty($vanBanDen->noi_dung_hop) ? $vanBanDen->noi_dung_hop : $vanBanDen->trich_yeu,
            'dia_diem' => !empty($vanBanDen->dia_diem) ? $vanBanDen->dia_diem : null,
            'user_id' => $currentUser->id,
            'don_vi_du_hop' => !empty($donViDuHop) ? $donViChuTriId : null,
            'parent_don_vi_id' => !empty($parentDonVi) ? $parentDonVi->id : $donVi->id ?? null
        );
        $dataLichCongTac3 = array(
            'object_id' => $vanBanDen->id,
            'lanh_dao_id' => $chuyeVien,
            'ngay' => $vanBanDen->ngay_hop,
            'gio' => $vanBanDen->gio_hop,
            'tuan' => $tuan,
            'buoi' => ($vanBanDen->gio_hop <= '12:00') ? 1 : 2,
            'noi_dung' => !empty($vanBanDen->noi_dung_hop) ? $vanBanDen->noi_dung_hop : $vanBanDen->trich_yeu,
            'dia_diem' => !empty($vanBanDen->dia_diem) ? $vanBanDen->dia_diem : null,
            'user_id' => $currentUser->id,
            'don_vi_du_hop' => !empty($donViDuHop) ? $donViChuTriId : null,
            'parent_don_vi_id' => !empty($parentDonVi) ? $parentDonVi->id : $donVi->id ?? null
        );
        //l???ch l??nh ?????o
        if ($trangThai == 1) {
            $lichCongTac = new LichCongTac();
            $lichCongTac->fill($dataLichCongTac1);
            $lichCongTac->save();
            $lichCongTac->trang_thai = LichCongTac::TRANG_THAI_HOAT_DONG;
            if ($trangThai == 1) {
                $lichCongTac->chu_tri = LichCongTac::TRANG_THAI_HOAT_DONG;

            }
            $lichCongTac->save();
        }
        if ($trangThai == 2) {
            if (!empty($phoPhong)) {
                $lichCongTac = new LichCongTac();
                $lichCongTac->fill($dataLichCongTac2);
                $lichCongTac->save();
                $lichCongTac->trang_thai = LichCongTac::TRANG_THAI_HOAT_DONG;
                if ($trangThai == 2) {
                    $lichCongTac->chu_tri = LichCongTac::TRANG_THAI_HOAT_DONG;

                }
                $lichCongTac->save();
            }
        }
        // l???ch c???a ph?? ph??ng

        // l???ch c???a chuy??n vi??n
        if($trangThai == 3)
        {
            if (!empty($chuyeVien)) {
                $lichCongTac = new LichCongTac();
                $lichCongTac->fill($dataLichCongTac3);
                $lichCongTac->save();
                $lichCongTac->trang_thai = LichCongTac::TRANG_THAI_HOAT_DONG;
                if ($trangThai == 3) {
                    $lichCongTac->chu_tri = LichCongTac::TRANG_THAI_HOAT_DONG;

                }
                $lichCongTac->save();
            }
        }
        if ($donViPhoiHop != null) {
            foreach ($donViPhoiHop as $dataHop) {
                $dataLichCongTac = array(
                    'object_id' => $vanBanDen->id,
                    'lanh_dao_id' => $dataHop,
                    'ngay' => $vanBanDen->ngay_hop,
                    'gio' => $vanBanDen->gio_hop,
                    'tuan' => $tuan,
                    'buoi' => ($vanBanDen->gio_hop <= '12:00') ? 1 : 2,
                    'noi_dung' => !empty($vanBanDen->noi_dung_hop) ? $vanBanDen->noi_dung_hop : $vanBanDen->trich_yeu,
                    'dia_diem' => !empty($vanBanDen->dia_diem) ? $vanBanDen->dia_diem : null,
                    'user_id' => $currentUser->id,
                    'don_vi_du_hop' => !empty($donViDuHop) ? $donViChuTriId : null,
                    'parent_don_vi_id' => !empty($parentDonVi) ? $parentDonVi->id : $donVi->id ?? null
                );
                $lichCongTac = new LichCongTac();
                $lichCongTac->fill($dataLichCongTac);
                $lichCongTac->save();
                $lichCongTac->trang_thai = LichCongTac::TRANG_THAI_HOAT_DONG;
                $lichCongTac->du_hop = LichCongTac::TRANG_THAI_HOAT_DONG;
                $lichCongTac->save();
            }
        }


    }

}
