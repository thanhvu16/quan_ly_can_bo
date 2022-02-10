<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class TrinhTuGuiDuyetHoSo extends Model
{
    protected $table = 'trinh_tu_gui_duyet_ho_so';

    public static function updateTrangThai($canBoId)
    {
        TrinhTuGuiDuyetHoSo::where('can_bo_id', $canBoId)
            ->where('can_bo_nhan_id', auth::user()->id)->whereNull('status')
            ->update(['status' => 1]);
    }
}
