<?php

namespace Modules\Admin\Entities;

use App\Models\HoSoTraLai;
use App\Models\TrinhTuGuiDuyetHoSo;
use Illuminate\Database\Eloquent\Model;
use Auth;

class CanBo extends Model
{

    protected $table = 'can_bo';

    const TRANG_THAI_DA_GUI_DUYET = 1;
    const TRANG_THAI_DA_GUI_DUYET_TRA_LAI = 2;
    const TRANG_THAI_DA_GUI_DUYET_DA_DUYET = 3;
    const GIOI_TINH_NAM = 1;
    const GIOI_TINH_NU = 2;

    public function hinhThucTuyen()
    {
        return $this->belongsTo(CongViecChuyenMon::class, 'trinh_do_1', 'id');
    }
    public function queQuan()
    {
        return $this->belongsTo(ThanhPho::class, 'thanh_pho_que_quan', 'id');
    }
    public function chucVuHienTai()
    {
        return $this->belongsTo(ChucVuHienTai::class, 'chuc_vu_hien_tai', 'id');
    }

    public function thanhPho()
    {
        return $this->belongsTo(ThanhPho::class, 'thanh_pho_que_quan', 'id');
    }
    public function danToc()
    {
        return $this->belongsTo(DanToc::class, 'dan_toc', 'id');
    }
    public function donVi()
    {
        return $this->belongsTo(ToChuc::class, 'don_vi', 'id');
    }

    public function toChuc()
    {
        return $this->belongsTo(ToChuc::class, 'don_vi', 'id');
    }



    public function tonGiao()
    {
        return $this->belongsTo(TonGiao::class, 'ton_giao', 'id');
    }

    public static function updateTrangThaiGuiDuyet($canBoId, $trangThai)
    {
        $canBo = CanBo::find($canBoId);
        if ($canBoId) {
            $canBo->trang_thai_duyet_ho_so = $trangThai;
            $canBo->save();
        }
    }

    public function trinhTuChoDuyetHoSo()
    {
        return $this->belongsTo(TrinhTuGuiDuyetHoSo::class, 'id', 'can_bo_id')
            ->where('can_bo_nhan_id', auth::user()->id)->whereNull('status')
            ->orderBy('id', 'DESC');
    }

    public function trinhTuTraLaiHoSo()
    {
        return $this->belongsTo(HoSoTraLai::class, 'id', 'can_bo_id')
            ->where('can_bo_chuyen_id', auth::user()->id)->whereNull('status')
            ->orderBy('id', 'DESC');
    }

    public function trinhTuTraLaiHoSoCanBoNhap()
    {
        return $this->belongsTo(HoSoTraLai::class, 'id', 'can_bo_id')
            ->where('can_bo_nhan_id', auth::user()->id)->whereNull('status')
            ->orderBy('id', 'DESC');
    }

    public function khenThuong()
    {
        return $this->belongsTo(QuaTrinhKhenThuong::class, 'id', 'users')
            ->where('type', 2)
            ->orderBy('id', 'DESC')
            ->whereYear('created_at', date('Y'));
    }

    public function kiLuat()
    {
        return $this->belongsTo(QuaTrinhKhenThuong::class, 'id', 'users')
            ->where('type', 1)
            ->orderBy('id', 'DESC')
            ->whereYear('created_at', date('Y'));
    }

    public function chuyenCongTac()
    {
        return $this->belongsTo(QuaTrinhChuyenDonVi::class, 'id', 'users')
            ->orderBy('id', 'DESC')
            ->whereYear('created_at', date('Y'));
    }

    public function veHuu()
    {
        return $this->belongsTo(QuaTrinhVeHuu::class, 'id', 'users')
            ->orderBy('id', 'DESC')
            ->whereYear('created_at', date('Y'));
    }
}

