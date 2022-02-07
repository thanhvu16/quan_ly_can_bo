<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CanBo extends Model
{

    protected $table = 'can_bo';

    public function hinhThucTuyen()
    {
        return $this->belongsTo(CongViecChuyenMon::class, 'trinh_do_1', 'id');
    }
    public function queQuan()
    {
        return $this->belongsTo(ThanhPho::class, 'thanh_pho_que_quan', 'id');
    }

    public function toChuc()
    {
        return $this->belongsTo(ToChuc::class, 'don_vi', 'id');
    }

    public function danToc()
    {
        return $this->belongsTo(danToc::class, 'dan_toc', 'id');
    }

    public function tonGiao()
    {
        return $this->belongsTo(TonGiao::class, 'ton_giao', 'id');
    }

}

