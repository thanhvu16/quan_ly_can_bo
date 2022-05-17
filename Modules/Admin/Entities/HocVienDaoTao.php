<?php

namespace Modules\Admin\Entities;

use App\Models\HoSoTraLai;
use App\Models\TrinhTuGuiDuyetHoSo;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class HocVienDaoTao extends Model
{

    protected $table = 'qldt_hoc_vien_dao_tao';
    use SoftDeletes;


    public function khoaHoc()
    {
        return $this->belongsTo(LopDaoTao::class, 'khoa_hoc_id', 'id');
    }
    public function hocVien()
    {
        return $this->belongsTo(User::class, 'ten_hoc_vien', 'id');
    }


}

