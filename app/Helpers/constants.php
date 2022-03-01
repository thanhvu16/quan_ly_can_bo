<?php

define('PER_PAGE', 20);
define('PER_PAGE_10', 10);
define('UPLOAD_USER', 'uploads/nguoi-dung');

define('UPLOAD_FILE_VAN_BAN', 'uploads/van-ban-' . date('Y'));
define('PHIEU_CAN_BO', 'uploads/phieu-can-bo');

define('UPLOAD_FILE_CHINH_SACH', 'uploads/chinh-sach-' . date('Y'));
define('UPLOAD_ANH', 'uploads/anh-' . date('Y'));
define('ACTIVE', 1);
define('INACTIVE', 2);

define('TITLE_APP', 'QUẢN LÝ CÁN BỘ');
define('LANH_DAO_UY_BAN', '%Ban giám đốc sở%');


//rold_id
define('ADMIN', 1);
define('QUYEN_CHUYEN_VIEN', 3);
define('QUYEN_PHO_PHONG', 5);
define('QUYEN_TRUONG_PHONG', 4);
define('QUYEN_CHU_TICH', 7);
define('QUYEN_PHO_CHU_TICH', 8);
define('QUYEN_TRUONG_PHONG_DON_VI', 9);
define('QUYEN_PHO_PHONG_DON_VI', 10);
define('QUYEN_VAN_THU_DON_VI', 11);
define('QUYEN_VAN_THU_HUYEN', 12);
define('QUYEN_CHANH_VAN_PHONG', 13);
define('QUYEN_PHO_CHANH_VAN_PHONG', 14);
//id của đơn vị UBND Huyện
define('UBND_HUYEN', 8);

const TRANG_THAI_HOAT_DONG = 1;

//Role
CONST QUAN_TRI_HT = 'Quản trị hệ thống';
CONST CHUYEN_VIEN = 'chuyên viên';
CONST TRUONG_PHONG = 'trưởng phòng';
CONST PHO_PHONG = 'phó trưởng phòng';
CONST CHANH_VAN_PHONG = 'chánh văn phòng';
CONST PHO_CHANH_VAN_PHONG = 'phó chánh văn phòng';
CONST CHU_TICH = 'giám đốc / chi cục trưởng';
CONST PHO_CHU_TICH = 'phó giám đốc / phó chi cục trưởng';
CONST TRUONG_BAN = 'tp đơn vị cấp 2';
CONST PHO_TRUONG_BAN = 'phó tp đơn vị cấp 2';
CONST VAN_THU_DON_VI = 'văn thư đơn vị';
CONST VAN_THU_HUYEN = 'văn thư sở';
CONST TXT_CHI_CUC = 'chi cục';


//role
CONST LANH_DAO = 'Lãnh đạo';
CONST CAN_BO = 'Cán bộ';
//CONST LANH_DAO_CAP_TO_CHUC = 'Lãnh đạo cấp tổ chức';
//CONST CAN_BO_CAP_TO_CHUC = 'Cán bộ cấp tổ chức';


define('COLOR_INFO', '#4fbde9');
define('COLOR_PRIMARY', '#119bea');
define('COLOR_GREEN', '#2b982b');
define('COLOR_INFO_SHADOW', '#0269f3');
define('COLOR_WARNING', '#f9bc0b');
define('COLOR_TEAL', '#02a8b5');
define('COLOR_ORANGE', '#ff9900');
define('COLOR_RED', '#fb483a');
define('COLOR_PURPLE', '#8552f5');
define('COLOR_PINK', '#e061c9');
define('COLOR_LIGHT_PINK', '#b661bf');
define('COLOR_BLUE_DARK', '#4937de');
define('COLOR_PINTEREST', '#cb2027');
define('COLOR_YELLOW', '#f1df07');
define('COLOR_GREEN_LIGHT', '#0fd0b5');


//api code
define('TOKEN_TYPE', 'Bearer');
define('SUCCESS', 200);
define('FOUND', 302);
define('SEE_OTHER', 303);
define('BAD_REQUEST', 400);
define('UNAUTHORIZED', 401);
define('FORBIDDEN', 403);
define('NOT_FOUND', 404);
define('METHOD_NOT_ALLOWED', 405);
define('SERVER_ERROR', 500);
define('ERROR_VALIDATE', 422);

CONST USER_TOKEN = 'eyQiLCJhbGciOiJIU1NiJ9';
CONST API_VERSION = 1;

const DANG_VIEN_THEO_TON_GIAO = [
    'I' => 'Đảng viên chia theo dân tộc',
    1 => 'Kinh',
    2 => 'Tày',
    3 => 'Thái',
    4 => 'Hoa',
    5 => 'Khơ-me',
    6 => 'Mường',
    7 => 'Nùng',
    8 => 'Mông',
    9 => 'Dao',
    10 => 'Gia lai',
    11 => 'Ê-đê',
    12 => 'Ngái',
    13 => 'Ba-Na',
    14 => 'Xơ-Đăng',
    15 => 'Sán chay',
    16 => 'Cơ Ho',
    17 => 'Chăm',
    18 => 'Sán Dìu',
    19 => 'HRê',
    20 => 'M.Nông',
    21 => 'Raglai',
    22 => 'XTiêng',
    23 => 'Bru - Vân Kiều',
    24 => 'Thổ',
    25 => 'Giáy',
    26 => 'Cơ Tu',
    27 => 'Giẻ Triêng',
    28 => 'Mạ',
    29 => 'Khơ Mú',
    30 => 'Co',
    31 => 'Tà Ôi',
    32 => 'Chơ - Ro',
];

const DANG_VIEN_1 = [
    "I" => [33, 'Kháng'],
    1 => [ 34, 'Xinh Mun'],
    2 => [35, 'Hà Nhì'],
    3 => [36, 'Chu Ru'],
    4 => [37, 'Lào'],
    5 => [38, 'La Chí'],
    6 => [39, 'La Ha'],
    7 => [40, 'Phù Lá'],
    8 => [41, 'La Hủ'],
    9 => [42, 'Lự'],
    10 => [43, 'Lô Lô'],
    11 => [44, 'Chứt'],
    12 => [45, 'Mảng'],
    13 => [46, 'Pà Thẻn'],
    14 => [47, 'Cơ Lao'],
    15 => [48, 'Cống'],
    16 => [49, 'Bố Y'],
    17 => [50, 'Si La'],
    18 => [51, 'Pu Péo'],
    19 => [52, 'B Râu'],
    20 => [53, 'Ơ Đu'],
    21 => [54, 'Rơ - Măm'],
    22 => [55, 'Dân tộc khác'],
    23 => [56, 'Q.tịch gốc nước ngoài'],
    24 => ['<b>II</b>', '<b> Đảng viên chia theo tôn giáo</b>'],
    25 => [1, 'Phật giáo'],
    26 => [2, 'Công giáo'],
    27 => [3, 'Phật giáo Hòa Hảo'],
    28 => [4, 'Cao Đài'],
    29 => [5, 'Tin Lành'],
    30 => [6, 'Hồi giáo'],
    31 => [7, 'Đạo khác'],
];
