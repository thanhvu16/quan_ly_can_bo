<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaiLieuHuongDan extends Model
{

    protected $table = 'tai_lieu_huong_dan';

    public function getUrlFile()
    {
        return asset($this->duong_dan);
    }

}

