<?php

if (!function_exists('uploadFile')) {
    function uploadFile($inputFile, $uploadPath, $folderUploads, $urlFileInDB = null)
    {
        $fileName = date('Y_m_d') . '_' . Time() . '_' . $inputFile->getClientOriginalName();
        $urlFile = $folderUploads . '/' . $fileName;

        //delete file in db and update
        if ($urlFileInDB) {
            File::delete($urlFileInDB);
        }

        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0775, true, true);
        }

        $inputFile->move($uploadPath, $fileName);

        return $urlFile;
    }
}
function strSlugFileName($title, $separator = '-', $language = 'en')
{
    return Str::slug($title, $separator, $language);
}

if (!function_exists('getUrlFile')) {
    function getUrlFile($urlFile)
    {
        if (!empty($urlFile)) {

            return asset($urlFile);
        }
    }
}

if (!function_exists('getStatusLabel')) {
    function getStatusLabel($status)
    {
        if ($status == 1) {

            return '<span class="label label-pill label-sm label-success">Hoạt động</span>';
        }

        return '<span class="label label-pill label-sm label-danger">Không hoạt động</span>';
    }
}

if (!function_exists('canPermission')) {
    function canPermission($permission)
    {
        if (!Auth::user()->can($permission)) {
            return abort(403);
        }
    }
}

function api_add($arr ,$url)
{
    $arr=  json_encode($arr);
    $curl = curl_init();
    curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $arr,
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
            ))

    );
    $response = curl_exec($curl);
    curl_close($curl);
    echo $response;




}function api_list($url)
{
   // $arr=  json_encode($arr);
    $curl = curl_init();
    curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
            ))

    );
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;




}
function dateFromBusinessDays($days, $dateTime=null) {
    $dateTime = is_null($dateTime) ? time() : strtotime(str_replace('/', '-', $dateTime));
    $_day = 0;
    $_direction = $days == 0 ? 0 : intval($days/abs($days));
    $_day_value = (60 * 60 * 24);
    while($_day !== $days) {
        $dateTime += $_direction * $_day_value;
        $_day_w = date("w", $dateTime);
        if ($_day_w > 0 && $_day_w < 6) {
            $_day += $_direction * 1;
        }
    }
    return date('Y-m-d',$dateTime);
}
function dateformat($format)
{
    $ngay = date('d-m-Y', strtotime($format)) ;
    return $ngay;
}
