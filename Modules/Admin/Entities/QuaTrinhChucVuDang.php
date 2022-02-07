<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuaTrinhChucVuDang extends Model
{

    protected $table = 'qua_trinh_chuc_vu_dang';
    public function phuCap()
    {
        return $this->belongsTo(LoaiPhuCap::class, 'phu_cap', 'id');
    }
    public function trinhDo()
    {
        return $this->belongsTo(CongViecChuyenMon::class, 'trinh_do', 'id');
    }
    public function hinhThuc()
    {
        return $this->belongsTo(HinhThucDaoTao::class, 'hinh_thuc', 'id');
    }
    public function nhiemKy()
    {
        return $this->belongsTo(NhiemKy::class, 'nhiem_ky', 'id');
    }

}

