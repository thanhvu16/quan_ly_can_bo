<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DanhSachHuyHieu extends Model
{

    protected $table = 'danh_sach_huy_hieu_dang';

    public function canBo()
    {
        return $this->belongsTo(CanBo::class, 'can_bo_id', 'id');
    }
    public function dotCapThe()
    {
        return $this->belongsTo(DotCapHuyHieu::class, 'dot_cap_the_id', 'id');
    }
}

