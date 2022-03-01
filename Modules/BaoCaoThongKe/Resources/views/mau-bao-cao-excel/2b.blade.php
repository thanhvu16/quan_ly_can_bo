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
        <th colspan="10" valign="center"
            style="font-family:Times New Roman;font-size: 15px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">
            ĐẢNG VIÊN MỚI KẾT NẠP <br>
            Chia theo dân tộc và tôn giáo
        </th>
    </tr>
    </thead>
</table>

<table
    style='font-family:Arial; font-size: 13px; border-collapse: collapse;display: table;border-spacing: 2px;border-color: grey;width: 93%;margin-left: 30px;'>
    <thead>
    <tr>
        <th class="text-center" rowspan="2" valign="center"
            style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">
            TT
        </th>
        <th class="text-center" rowspan="2" valign="center"
            style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">
            Tên dân tộc, tôn giáo
        </th>
        <th class="text-center" colspan="2" valign="center"
            style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">
            Đảng viên chia theo dân tộc, tôn giáo
        </th>
        <th class="text-center" rowspan="2" valign="center"
            style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">
            Tỷ lệ (%)
        </th>
        <th class="text-center" rowspan="2" valign="center"
            style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">
            TT
        </th>
        <th class="text-center" rowspan="2" valign="center"
            style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">
            Tên dân tộc, tôn giáo
        </th>
        <th class="text-center" colspan="2" valign="center"
            style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">
            Đảng viên chia theo dân tộc, tôn giáo
        </th>
        <th class="text-center" rowspan="2" valign="center"
            style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">
            Tỷ lệ (%)
        </th>
    </tr>
    <tr>

        <th class="text-center" valign="center"
            style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">
            Tổng số
        </th>
        <th class="text-center" valign="center"
            style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word">
            <i>Trong đó: nữ</i>
        </th>
        <th class="text-center" valign="center"
            style="font-family:Times New Roman;font-size: 12px;text-align: center;font-weight: bold;border: 1px solid #000000;word-wrap: break-word">
            Tổng số
        </th>
        <th class="text-center" valign="center"
            style="font-family:Times New Roman;font-size: 12px;text-align: center;border: 1px solid #000000;word-wrap: break-word">
            <i>Trong đó: nữ</i>
        </th>
    </tr>
    </thead>
    <tbody>
    <tr>
        @for($i = 1; $i <= 2; $i ++)
            <td style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word; text-align: center">
                <i>1</i>
            </td>
            <td style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word; text-align: center">
                <i>2</i>
            </td>
            <td style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word; text-align: center">
                <i>3</i>
            </td>
            <td style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word; text-align: center">
                <i>4</i>
            </td>
            <td style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word; text-align: center">
                <i>5</i>
            </td>
        @endfor

    <tr>
        @foreach(DANG_VIEN_THEO_TON_GIAO as $key => $tonGiao)
        <tr>
            <td style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word; text-align: center; font-weight: bold">
                @if ($key === 'I')
                    <b>{{ $key }}</b>
                @else
                    {{ $key }}
                @endif
            </td>
            <td style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word;">
                @if ($key == 'I')
                    <b>{{ $tonGiao }}</b>
                @else
                    {{ $tonGiao }}
                @endif
            </td>
            <td style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word; text-align: center">

            </td>
            <td style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word; text-align: center">

            </td>
            <td style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word; text-align: center">
            </td>

            <td style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word; text-align: center; font-weight: bold">
                {!! isset(DANG_VIEN_1[$key][0]) ? DANG_VIEN_1[$key][0] : null !!}
            </td>
            <td style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word;">
                {!!  DANG_VIEN_1[$key][1] ?? null  !!}
            </td>
            <td style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word; text-align: center">

            </td>
            <td style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word; text-align: center">

            </td>
            <td style="font-family:Times New Roman;font-size: 12px;border: 1px solid #000000;word-wrap: break-word; text-align: center">
            </td>

        </tr>
        @endforeach


    <tr>
        <td colspan="5"
            style="font-family:Times New Roman;font-size: 12px; text-align:center; padding-top: 20px">

        </td>
        <td colspan="5"
            style="font-family:Times New Roman;font-size: 12px; text-align:center; padding-top: 20px">
            <i>………,ngày…tháng…năm 20…...</i>
        </td>
    </tr>
    <tr>
        <td colspan="5"
            style="font-family:Times New Roman;font-size: 12px; text-align:center; padding-top: 20px">
            <b> NGƯỜI LẬP BIỂU </b>
            <br>
            <i>(Ký, ghi rõ họ và tên; số điện thoại di động
                và cố định liên hệ)</i>
        </td>
        <td colspan="5"
            style="font-family:Times New Roman;font-size: 12px; text-align:center; padding-top: 20px">
            <b> TRƯỞNG BAN </b>
            <br>
            <i>'(Ký, đóng dấu, ghi rõ họ và tên)</i>
        </td>
    </tr>
    </tbody>
</table>
</body>

</html>
