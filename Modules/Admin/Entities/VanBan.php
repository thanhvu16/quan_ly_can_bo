<?php

namespace Modules\Admin\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VanBan extends Model
{

    protected $table = 'van_ban_quy_dinh';
    protected $fillable = [
        'ten_don_vi',
        'ten_viet_tat',
        'ma_hanh_chinh',
        'dia_chi',
        'so_dien_thoai',
        'email',
        'dieu_hanh'

    ];

    public function getUrlFile()
    {
        return asset($this->file);
    }


}

