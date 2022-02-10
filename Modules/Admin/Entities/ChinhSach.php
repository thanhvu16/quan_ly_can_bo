<?php

namespace Modules\Admin\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChinhSach extends Model
{

    protected $table = 'chinh_sach';


    public function getUrlFile()
    {
        return asset($this->file);
    }


}

