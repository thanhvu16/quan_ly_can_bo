<?php

namespace App\Common;

class AllPermission
{
    public static function nguoiDung()
    {
        return 'Người dùng';
    }
    public static function themNguoiDung()
    {
        return 'thêm người dùng';
    }

    public static function suaNguoiDung()
    {
        return 'sửa người dùng';
    }

    public static function xoaNguoiDung()
    {
        return 'xoá người dùng';
    }

    public static function canBo()
    {
        return 'Cán bộ';
    }

    public static function themCanBo()
    {
        return 'thêm cán bộ';
    }

    public static function suaCanBo()
    {
        return 'sửa cán bộ';
    }

    public static function xoaCanBo()
    {
        return 'xoá cán bộ';
    }

    public static function xemCanBo()
    {
        return 'xem cán bộ';
    }
}
