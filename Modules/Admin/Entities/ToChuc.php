<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ToChuc extends Model
{

    protected $table = 'to_chuc';

    public function parentToChuc()
    {
        return $this->belongsTo(ToChuc::class, 'parent_id', 'id');
    }

    public function toChucCon()
    {
        return $this->hasMany(ToChuc::class, 'parent_id', 'id');
    }

}

