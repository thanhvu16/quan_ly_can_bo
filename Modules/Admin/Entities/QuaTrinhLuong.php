<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuaTrinhLuong extends Model
{

    protected $table = 'qua_trinh_luong';

    public function ngachCongChuc()
    {
        return $this->belongsTo(NgachChucDanh::class, 'ngach_cong_chuc', 'id');
    }
    public function BacLuong()
    {
        return $this->belongsTo(BacHeSoLuong::class, 'bac', 'id');
    }
    public function HeSo()
    {
        return $this->belongsTo(BacHeSoLuong::class, 'he_so', 'id');
    }
    public function truongHoc()
    {
        return $this->belongsTo(TruongHoc::class, 'truong', 'id');
    }
    public function phuCap()
    {
        return $this->belongsTo(LoaiPhuCap::class, 'phu_cap', 'id');
    }

}

