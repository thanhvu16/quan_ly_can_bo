<?php

namespace Modules\Admin\Entities;

use App\Models\HoSoTraLai;
use App\Models\TrinhTuGuiDuyetHoSo;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Auth;

class LopDaoTao extends Model
{
    const DU_KIEN_MO = 1;
    const DANG_MO = 2;
    const DA_KET_THUC = 3;

    protected $table = 'qldt_lop_dao_tao';

    public function hocVien()
    {
        return $this->belongsTo(User::class, 'ten_hoc_vien', 'id');
    }
}

