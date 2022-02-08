<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuaTrinhBienCheHopDong extends Model
{

    protected $table = 'qua_trinh_bien_che_hop';
    public function loaiCanBo()
    {
        return $this->belongsTo(BinhBauPhanLoaiCanBo::class, 'bien_che', 'id');
    }


}

