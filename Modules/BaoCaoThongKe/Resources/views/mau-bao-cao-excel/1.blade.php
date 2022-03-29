<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BAO CAO THONG KE</title>
</head>

<body>
<table
    style='font-family:Arial; font-size: 13px; border-collapse: collapse;display: table;border-spacing: 2px;border-color: grey;width: 93%;margin-left: 30px;'>
    <thead>
    <tr role="row" class="text-center">
        <th class="text-center" valign="center"
            style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">
            TỈNH ỦY/HUYỆN ỦY…
        </th>
        <th rowspan="2" colspan="2"
            style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">
            THỐNG KÊ
            TĂNG, GIẢM ĐẢNG VIÊN
            .....NĂM {{ date('Y') }}.
        </th>
        <th
            style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">
            Biểu số 1-BTCTW
        </th>
    </tr>
    <tr role="row" class="text-center">
        <th class="text-center" valign="center"
            style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">
            BAN TỔ CHỨC
        </th>
        <th
            style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">
        </th>
    </tr>
    </thead>
</table>

<table
    style='font-family:Arial; font-size: 13px; border-collapse: collapse;display: table;border-spacing: 2px;border-color: grey;width: 93%;margin-left: 30px;'>
    <thead>
    <tr role="row" class="text-center">
        <th class="text-center" rowspan="2" valign="center"
            style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">
            Tiêu chí
        </th>
        <th colspan="2"
            style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">
            Thực hiện
        </th>
        <th rowspan="2"
            style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">
            (%) kỳ này so với cùng kỳ năm trước
        </th>
    </tr>
    <tr>
        <td valign="center"
            style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">
            Kỳ này
        </td>
        <td valign="center"
            style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">
            Cùng kỳ năm trước
        </td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">
            1
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">
            2
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">
            3
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">
            4(=2*100/3)
        </td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">
            A - Tổng số đảng viên cuối kỳ trước chuyển sang
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">
            B - Đảng viên tăng trong kỳ
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            1. Kết nạp
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word">{{ $data['ket_nap']['ky_nay'] }}</td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word">{{ $data['ket_nap']['ky_truoc'] }}</td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word">{{ $data['ket_nap']['ky_truoc'] > 0 ? ($data['ket_nap']['ky_nay'] * 100)/$data['ket_nap']['ky_truoc'] : 0 }}</td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            2. Chuyển đến
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            a. Tỉnh khác chuyển đến
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word">{{ $data['tinh_khac_chuyen_den']['ky_nay'] }}</td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word">{{ $data['tinh_khac_chuyen_den']['ky_truoc'] }}</td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word">{{ $data['tinh_khac_chuyen_den']['ky_truoc'] > 0 ? ($data['tinh_khac_chuyen_den']['ky_nay'] * 100)/$data['tinh_khac_chuyen_den']['ky_truoc'] : 0 }}</td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            b. Huyện khác trong tỉnh chuyển đến
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word">{{ $data['huyen_khac_trong_tinh_chuyen_den']['ky_nay'] }}</td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word">{{ $data['huyen_khac_trong_tinh_chuyen_den']['ky_truoc'] }}</td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word">{{ $data['huyen_khac_trong_tinh_chuyen_den']['ky_truoc'] > 0 ? ($data['huyen_khac_trong_tinh_chuyen_den']['ky_nay'] * 100)/$data['huyen_khac_trong_tinh_chuyen_den']['ky_truoc'] : 0 }}</td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            3. Phục hồi đảng tịch
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word">{{ $data['phuc_hoi_dang_tich']['ky_nay'] }}</td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word">{{ $data['phuc_hoi_dang_tich']['ky_truoc'] }}</td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word">{{ $data['phuc_hoi_dang_tich']['ky_truoc'] > 0 ? ($data['phuc_hoi_dang_tich']['ky_nay'] * 100)/$data['phuc_hoi_dang_tich']['ky_truoc'] : 0 }}</td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">
            C - Đảng viên giảm trong kỳ
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            1. Từ trần
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word">{{ $data['tu_tran']['ky_nay'] }}</td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word">{{ $data['tu_tran']['ky_truoc'] }}</td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word">{{ $data['tu_tran']['ky_truoc'] > 0 ? ($data['tu_tran']['ky_nay'] * 100)/$data['tu_tran']['ky_truoc'] : 0 }}</td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            2. Khai trừ
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word">{{ $data['khai_tru']['ky_nay'] }}</td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word">{{ $data['khai_tru']['ky_truoc'] }}</td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word">{{ $data['khai_tru']['ky_truoc'] > 0 ? ($data['khai_tru']['ky_nay'] * 100)/$data['khai_tru']['ky_truoc'] : 0 }}</td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            3. Xóa tên
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word">{{ $data['xoa_ten']['ky_nay'] }}</td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word">{{ $data['xoa_ten']['ky_truoc'] }}</td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word">{{ $data['xoa_ten']['ky_truoc'] > 0 ? ($data['xoa_ten']['ky_nay'] * 100)/$data['xoa_ten']['ky_truoc'] : 0 }}</td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            <i>Trong đó:</i> Đảng viên dự bị
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            4. Xin ra khỏi Đảng
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word">{{ $data['xin_ra_khoi_dang']['ky_nay'] }}</td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word">{{ $data['xin_ra_khoi_dang']['ky_truoc'] }}</td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word">{{ $data['xin_ra_khoi_dang']['ky_truoc'] > 0 ? ($data['xin_ra_khoi_dang']['ky_nay'] * 100)/$data['xin_ra_khoi_dang']['ky_truoc'] : 0 }}</td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            5. Chuyển đi
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            <i>a. Chuyển đi tỉnh khác</i>
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word">{{ $data['chuyen_di_tinh_khac']['ky_nay'] }}</td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word">{{ $data['chuyen_di_tinh_khac']['ky_truoc'] }}</td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word">{{ $data['chuyen_di_tinh_khac']['ky_truoc'] > 0 ? ($data['chuyen_di_tinh_khac']['ky_nay'] * 100)/$data['chuyen_di_tinh_khac']['ky_truoc'] : 0 }}</td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            <i>b. Chuyển đi huyện khác trong tỉnh</i>
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word">{{ $data['chuyen_di_huyen_khac_trong_tinh']['ky_nay'] }}</td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word">{{ $data['chuyen_di_huyen_khac_trong_tinh']['ky_truoc'] }}</td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word">{{ $data['chuyen_di_huyen_khac_trong_tinh']['ky_truoc'] > 0 ? ($data['chuyen_di_huyen_khac_trong_tinh']['ky_nay'] * 100)/$data['chuyen_di_huyen_khac_trong_tinh']['ky_truoc'] : 0 }}</td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">
            D - Đảng viên trong danh sách cuối kỳ báo cáo
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td colspan="2"
            style="font-family:Times New Roman;font-size: 12px; text-align:center; padding-top: 20px">

        </td>
        <td colspan="3"
            style="font-family:Times New Roman;font-size: 12px; text-align:center; padding-top: 20px">
            <i>………,ngày…tháng…năm 20…...</i>
        </td>
    </tr>
    <tr>
        <td colspan="2"
            style="font-family:Times New Roman;font-size: 12px; text-align:center; padding-top: 20px">
            <b> NGƯỜI LẬP BIỂU </b>
            <br>
            <i>(Ký, ghi rõ họ và tên; số điện thoại di động
                và cố định liên hệ)</i>
        </td>
        <td colspan="3"
            style="font-family:Times New Roman;font-size: 12px; text-align:center; padding-top: 20px">
            <b> TRƯỞNG BAN  </b>
            <br>
            <i>'(Ký, đóng dấu, ghi rõ họ và tên)</i>
        </td>
    </tr>
    </tbody>
</table>
</body>

</html>
