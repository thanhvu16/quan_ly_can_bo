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

}

