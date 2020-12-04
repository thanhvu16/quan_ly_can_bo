<?php

namespace Modules\DieuHanhVanBanDen\Entities;

use Illuminate\Database\Eloquent\Model;
use Auth;

class LanhDaoXemDeBiet extends Model
{
    protected $table = 'dhvbd_lanh_dao_xem_de_biet';

    protected $fillable = [
        'van_ban_den_id',
        'lanh_dao_id',
        'don_vi_id',
        'user_id'
    ];

    public static function saveLanhDaoXemDeBiet($arrLanhDaoId, $vanBanDenId)
    {
        LanhDaoXemDeBiet::where('van_ban_den_id', $vanBanDenId)
            ->whereNull('don_vi_id')
            ->delete();

        if (!empty($arrLanhDaoId) && count($arrLanhDaoId) > 0) {
            foreach ($arrLanhDaoId as $lanhDaoId) {
                $lanhDaoPhoiHop = new LanhDaoXemDeBiet();
                $lanhDaoPhoiHop->van_ban_den_id = $vanBanDenId;
                $lanhDaoPhoiHop->lanh_dao_id = $lanhDaoId;
                $lanhDaoPhoiHop->user_id = auth::user()->id;
                $lanhDaoPhoiHop->save();
            }
        }
    }

}