<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DotCapHuyHieu extends Model
{

    protected $table = 'dot_cap_huy_hieu';

    public function CanBoCap()
    {
        return $this->hasMany(DanhSachHuyHieu::class, 'dot_cap_the_id', 'id');
    }

}

