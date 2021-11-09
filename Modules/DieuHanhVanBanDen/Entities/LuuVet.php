<?php

namespace Modules\DieuHanhVanBanDen\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Entities\DonVi;

class LuuVet extends Model
{
    protected $table = 'luu_vet_phan_lai';




    public function nguoiPhan()
    {
        return $this->belongsTo(User::class, 'nguoi_phan_lai', 'id');
    }
    public function donViVanBan()
    {
        return $this->belongsTo(DonVi::class, 'phong_cu', 'id');
    }
    public function nguoiPhanLai()
    {
        return $this->belongsTo(User::class, 'nguoi_phan_lai', 'id');
    }





}
