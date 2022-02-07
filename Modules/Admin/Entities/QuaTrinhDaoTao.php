<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuaTrinhDaoTao extends Model
{

    protected $table = 'qua_trinh_dao_tao';
    public function loaiDaoTao()
    {
        return $this->belongsTo(ChuyenNganhDaoTao::class, 'loai_dao_tao', 'id');
    }
    public function trinhDo()
    {
        return $this->belongsTo(CongViecChuyenMon::class, 'trinh_do', 'id');
    }
    public function hinhThuc()
    {
        return $this->belongsTo(HinhThucDaoTao::class, 'hinh_thuc', 'id');
    }
    public function truongHoc()
    {
        return $this->belongsTo(TruongHoc::class, 'truong', 'id');
    }

}

