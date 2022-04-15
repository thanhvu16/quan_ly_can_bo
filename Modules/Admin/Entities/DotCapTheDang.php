<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DotCapTheDang extends Model
{

    protected $table = 'dot_cap_the_dang';

    public function CanBoCap()
    {
        return $this->hasMany(DanhSachTheDang::class, 'dot_cap_the_id', 'id');
    }

}

