<?php

namespace Modules\Admin\Entities;


use Illuminate\Database\Eloquent\Model;
use Auth;

class ThongBao extends Model
{

    protected $table = 'thong_bao';
    public function khenThuongCaoNhat()
    {
        return $this->belongsTo(KhenThuongKyLuat::class, 'khen_thuong_cao_nhat', 'id');
    }

}

