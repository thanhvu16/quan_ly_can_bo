<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuaTrinhChuyenDonVi extends Model
{

    protected $table = 'qua_trinh_chuyen_don_vi';
    public function donVi()
    {
        return $this->belongsTo(ToChuc::class, 'don_vi_chuyen_den', 'id');
    }


}

