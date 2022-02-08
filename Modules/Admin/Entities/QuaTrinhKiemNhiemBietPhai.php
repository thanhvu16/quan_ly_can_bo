<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuaTrinhKiemNhiemBietPhai extends Model
{

    protected $table = 'qua_trinh_kiem_nhiem_biet_phai';
    public function kiemNhiem()
    {
        return $this->belongsTo(KiemNhiemBietPhai::class, 'biet_phai', 'id');
    }


}

