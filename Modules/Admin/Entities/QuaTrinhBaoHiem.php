<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuaTrinhBaoHiem extends Model
{

    protected $table = 'qua_trinh_bao_hiem';
    public function thanhPho()
    {
        return $this->belongsTo(ThanhPho::class, 'thanh_pho', 'id');
    }


}

