<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Báo cáo thống kê</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }
        h4 {
            text-align: center;
        }
        p {
            text-align: center;
        }
        table{
            border: 1px solid;
            border-collapse: collapse;
        }
        tr th{
            background: #eee;
            border: 1px solid;
        }
        tr td{
            border: 1px solid;
        }


        .main {
            margin: 0 auto;
        } table {
              margin: 0 auto;
          }
    </style>
</head>
<body>


<div class="main">
    <table class="table table-bordered table-striped dataTable mb-0">
        <thead>
        <tr>
            <td colspan="10" style="text-align: center">THỐNG KÊ DANH SÁCH CÁN BỘ</td>
        </tr>
        <tr>
            <td colspan="10" style="text-align: left">@for($i=0;$i<950;++$i)-@endfor </td>
        </tr>

        <tr>
            <th style='padding: 0.75rem;border: 1px solid #a4b7c1;text-align: inherit;font-weight: bold;display: table-cell;vertical-align: inherit;'  >STT</th>
            <th style='padding: 0.75rem;border: 1px solid #a4b7c1;text-align: center;font-weight: bold;display: table-cell;vertical-align: middle;'  >Họ tên</th>
            <th style='padding: 0.75rem;border: 1px solid #a4b7c1;text-align: center;font-weight: bold;display: table-cell;vertical-align: middle;'  >Giới tính</th>
            <th style='padding: 0.75rem;border: 1px solid #a4b7c1;text-align: inherit;font-weight: bold;display: table-cell;vertical-align: inherit;'  >Năm sinh</th>
            <th style='padding: 0.75rem;border: 1px solid #a4b7c1;text-align: center;font-weight: bold;display: table-cell;vertical-align: middle;'  >Dân tộc</th>
            <th style='padding: 0.75rem;border: 1px solid #a4b7c1;text-align: center;font-weight: bold;display: table-cell;vertical-align: middle;'  >Quê quán</th>
            <th style='padding: 0.75rem;border: 1px solid #a4b7c1;text-align: inherit;font-weight: bold;display: table-cell;vertical-align: inherit;'  >Chức vụ</th>
            <th style='padding: 0.75rem;border: 1px solid #a4b7c1;text-align: center;font-weight: bold;display: table-cell;vertical-align: middle;'  >Đơn vị</th>
            <th style='padding: 0.75rem;border: 1px solid #a4b7c1;text-align: center;font-weight: bold;display: table-cell;vertical-align: middle;'  >Mã thẻ Đảng</th>
            <th style='padding: 0.75rem;border: 1px solid #a4b7c1;text-align: inherit;font-weight: bold;display: table-cell;vertical-align: inherit;'  >Ngày vào Đảng CT</th>

        </tr>
        </thead>
        <tbody style='display: table-row-group;vertical-align: middle;border-color: inherit;'>
        @forelse ($ds_CanBo as $key=>$data)
            <tr>
            <td class="text-center">{{$key+1}} </td>
            <td style="font-weight: bold" ><a href="{{route('canBoDetail',$data->id)}}">@if($data->gioi_tinh == 1) <i style="color: brown;" class="fa fa-user-secret"></i>  @else <i style="color: hotpink" class="fa  fa-wheelchair"></i> @endif {{$data->ho_ten}}</a></td>
            <td class="text-center">{{$data->gioi_tinh == 1 ? 'Nam' : 'Nữ' }}</td>
            <td class="text-center">{{date("d/m/Y", strtotime($data->ngay_sinh))}}</td>
            <td class="text-center">{{$data->danToc->ten ?? ''}}</td>
            <td class="text-center"><i class="fa fa-map-marker margin-r-5"></i> {{$data->thanhPho->ten ?? ''}}</td>
                <td>{{$data->chucVuHienTai->ten ?? ''}}</td>
                <td>{{$data->donVi->ten_don_vi ?? ''}}</td>
            <td class="text-center" style="vertical-align: middle">{{$data->so_the_dang}}</td>
            <td class="text-center" style="vertical-align: middle">@if($data->ngay_vao_dang_chinh_thuc){{date("d/m/Y", strtotime($data->ngay_vao_dang_chinh_thuc))}}@endif</td>

            </tr>
        @empty
        @endforelse

        </tbody>
    </table>

</div>
</body>
</html>
