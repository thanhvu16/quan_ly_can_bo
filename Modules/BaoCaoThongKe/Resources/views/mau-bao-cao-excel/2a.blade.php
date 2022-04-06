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
        <th colspan="2" rowspan="2"
            style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">
            THỐNG KÊ
            ĐẢNG VIÊN MỚI KẾT NẠP
            ...NĂM 20…
        </th>
        <th
            style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">
            Biểu số 2-BTCTW
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

    <thead>
    <tr role="row" class="text-center">
        <th class="text-center" valign="center" rowspan="2"
            style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">
            Tiêu chí
        </th>
        <th colspan="2"
            style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">
            Thực hiện
        </th>
        <th rowspan="2" valign="center"
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
            style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000; justify-content: center; word-wrap: break-word">
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
            I. Tổng số đảng viên mới kết nạp
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            &nbsp;&nbsp;&nbsp;&nbsp;- Dân tộc thiểu số
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">{{ $data['dan_toc']['ky_nay']  }}</td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">{{ $data['dan_toc']['ky_truoc']  }}</td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">{{ $data['dan_toc']['ky_truoc'] > 0 ? ($data['dan_toc']['ky_nay'] * 100)/$data['dan_toc']['ky_truoc'] : 0  }}</td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            &nbsp;&nbsp;&nbsp;&nbsp;- Đoàn viên Đoàn TNCS Hồ Chí Minh
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            &nbsp;&nbsp;&nbsp;&nbsp;- Chủ doanh nghiệp tư nhân
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            &nbsp;&nbsp;&nbsp;&nbsp;- Quần chúng vi phạm chính sách KHHGĐ
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            &nbsp;&nbsp;&nbsp;&nbsp;- Có quan hệ hôn nhân với người nước ngoài
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            &nbsp;&nbsp;&nbsp;&nbsp;- Kết nạp lại
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">
            II. Phân tích đảng viên mới kết nạp
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">
            <i>1. Nghề nghiệp</i>
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            - Cán bộ, công chức cơ quan Nhà nước tính từ cấp huyện trở lên
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>

    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            - Cán bộ, công chức cơ quan Đảng, Mặt trận Tổ quốc, đoàn thể chính trị - xã hội tính từ cấp huyện trở lên
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            - Cán bộ, công chức; người hoạt động không chuyên trách ở xã, phường, thị trấn
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            - Người hoạt động không chuyên trách thôn, tổ dân phố, bản (ấp, khóm)
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            - Viên chức trong các đơn vị sự nghiệp công lập
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            - Người lao động trong các đơn vị sự nghiệp ngoài công lập
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            - Lãnh đạo, quản lý và lao động trong các doanh nghiệp, chia ra:
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            <i>+ Người lãnh đạo, quản lý doanh nghiệp</i>
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            <i>+ Nhân viên, người gián tiếp sản xuất </i>
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>

    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            <i>+ Công nhân, lao động trực tiếp sản xuất </i>
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            - Người làm nông, lâm, ngư nghiệp
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            - Sỹ quan, chiến sỹ quân đội và công an (lực lượng vũ trang)
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            - Sinh viên
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            - Học sinh
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            - Khác (lao động hợp đồng, tự do…)
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">
            <i>2. Tuổi đời:</i>
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            - Từ 18 - 30 tuổi
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            - Từ 31 - 35 tuổi
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            - Từ 36 - 40 tuổi
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            - Từ 41 - 45 tuổi
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            - Từ 46 - 50 tuổi
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            - Từ 51 - 55 tuổi
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            - Từ 56 - 60 tuổi
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            - Trên 60 tuổi
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            - Tuổi bình quân
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            <b><i>3. Trình độ giáo dục phổ thông</i></b>
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            - Biết đọc, biết viết chữ quốc ngữ
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            - Tiểu học
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
             - Trung học cơ sở
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            - Trung học phổ thông
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>

    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            <b><i>4. Trình độ chuyên môn nghiệp vụ</i></b>
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            - Công nhân kỹ thuật, nhân viên nghiệp vụ, sơ cấp
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    @if (count($data['trinh_do_chuyen_mon_nghiep_vu']) > 0)
        @foreach($data['trinh_do_chuyen_mon_nghiep_vu'] as $item)
            <tr>
                <td
                    style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
                    - {{ $item->ten }}
                </td>
                <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word">{{ $item->ky_nay }}</td>
                <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word">{{ $item->ky_truoc }}</td>
                <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word">{{ $item->ky_truoc > 0 ? ($item->ky_nay * 100)/$item->ky_truoc : 0  }}</td>
            </tr>
        @endforeach
    @else
        <tr>
            <td
                style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
                - Trung cấp
            </td>
            <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
            <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
            <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        </tr>
        <tr>
            <td
                style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
                - Cao đẳng
            </td>
            <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
            <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
            <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        </tr>
        <tr>
            <td
                style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
                - Đại học
            </td>
            <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
            <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
            <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        </tr>
        <tr>
            <td
                style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
                - Thạc sỹ
            </td>
            <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
            <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
            <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        </tr>
        <tr>
            <td
                style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
                - Tiến sỹ
            </td>
            <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
            <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
            <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        </tr>
    @endif
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            <b><i>5. Chức danh khoa học</i></b>
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            - Phó Giáo sư
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            - Giáo sư
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            <b>III. Số tổ chức cơ sở đảng có đến cuối kỳ báo cáo</b>
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            <b><i>1. Đảng bộ cơ sở</i></b>
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            <i>Trong đó:</i> + Có kết nạp đảng viên
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+ Không còn quần chúng
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            <b><i>2. Chi bộ cơ sở</i></b>
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            <i>Trong đó:</i> + Có kết nạp đảng viên
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    <tr>
        <td
            style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+ Không còn quần chúng
        </td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
        <td style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word"></td>
    </tr>
    </tbody>
</table>
</body>

</html>
