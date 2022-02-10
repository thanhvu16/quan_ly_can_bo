<?php

namespace Modules\Admin\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VanBan extends Model
{

    protected $table = 'van_ban_quy_dinh';


    public function getUrlFile()
    {
        return asset($this->file);
    }


}

