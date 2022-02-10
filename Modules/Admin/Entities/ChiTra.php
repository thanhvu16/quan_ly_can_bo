<?php

namespace Modules\Admin\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChiTra extends Model
{

    protected $table = 'chi_tra_chinh_sach';


    public function getUrlFile()
    {
        return asset($this->file);
    }
    public function doiTuong()
    {
        return $this->belongsTo(DoiTuongQuanLy::class, 'doi_tuong', 'id');
    }


}

