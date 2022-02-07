<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuaTrinhQuyHoachCanBo extends Model
{

    protected $table = 'qua_trinh_quy_hoach_can_bo';
    public function chucVu()
    {
        return $this->belongsTo(ChucVuHienTai::class, 'chuc_vu', 'id');
    }


}

