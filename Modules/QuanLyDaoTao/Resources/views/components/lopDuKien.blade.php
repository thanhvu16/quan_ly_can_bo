<div class="box-body" style=" width: 100%;overflow-x: auto;">
    <form action="{{route('quan-ly-dao-tao.index')}}" id="tim_kiem" method="get">
        <div class="row">
            <div class="form-group col-md-3">
                <label for="loai_van_ban_id" class="col-form-label">Tên lớp đào tạo</label>
                <input type="text" name="ten" value="{{Request::get('ten')}}"
                       class="form-control" placeholder="Nhập tên lớp..">
            </div>
            <div class="form-group col-md-3 mt-4">
                <button class="btn btn-primary" type="submit" name="search" value="1"><i class="fa fa-search"></i>
                    Tìm kiếm
                </button>

            </div>
        </div>
        <div class="col-md-6">

        </div>

    </form>
    <table class="table table-bordered table-striped dataTable mb-0" style="font-size: 12px">
        <thead>
        <tr>
            <th width="2%" style="vertical-align: middle" class="text-center">STT</th>
            <th width="" style="vertical-align: middle" class="text-center">Tên lớp</th>
            <th width="15%" style="vertical-align: middle" class="text-center">Đơn vị mở lớp</th>
            <th width="7%" style="vertical-align: middle" class="text-center">Số lượng</th>
            <th width="8%" style="vertical-align: middle" class="text-center">Ngày khai giảng</th>
            <th width="8%" style="vertical-align: middle" class="text-center">Ngày bế giảng</th>
            <th width="15%" style="vertical-align: middle" class="text-center">Nội dung đào tạo</th>
            <th width="10%" style="vertical-align: middle" class="text-center">Trạng thái</th>
            <th width="5%" style="vertical-align: middle" class="text-center">Tác vụ</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($danhSachDuKien as $key=>$data)
            <tr>
                <td class="text-center">{{$key+1}} </td>
                <td class="text-left" style="vertical-align: middle"><a href="{{route('dangKyLop',$data->id)}}">{{$data->ten}}</a></td>
                <td class="text-left" style="vertical-align: middle">{{$data->donVi->ten_don_vi ?? ''}}</td>
                <td class="text-center" style="vertical-align: middle">{{$data->so_luong}}</td>
                <td class="text-center" style="vertical-align: middle">@if($data->ngay_khai_giang){{date("d/m/Y", strtotime($data->ngay_khai_giang))}}@endif</td>
                <td class="text-center" style="vertical-align: middle">@if($data->ngay_be_giang){{date("d/m/Y", strtotime($data->ngay_be_giang))}}@endif</td>
                <td class="text-left" style="vertical-align: middle">{{$data->noi_dung_dt}}</td>
                <td class="text-center" style="vertical-align: middle">
                    @if($data->trang_thai == 1)
                        <span class="label label-info">Dự kiến mở</span>
                    @elseif($data->trang_thai == 2)
                        <span class="label label-success">Đang mở</span>
                    @else
                        <span class="label label-danger">Đã kết thúc</span>
                    @endif
                </td>
                <td class="text-center" style="vertical-align: middle">
                    <a href="{{route('dangKyLop',$data->id)}}" title="Thêm cán bộ vào lớp"><i class="fa fa-edit "></i></a>
                </td>

            </tr>



        @empty
            <td colspan="10" class="text-center">Không tìm thấy dữ liệu.</td>
        @endforelse
        </tbody>
    </table>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6" style="margin-top: 5px">
                Tổng số lớp: <b style="font-size: 16px">{{ $danhSachDuKien->total() }}</b>

            </div>
            <div class="col-md-6 text-right">
                {!! $danhSachDuKien->appends(['ten_cb' => Request::get('ten_cb')])->render() !!}
            </div>
        </div>
    </div>

</div>
@section('script')
    <script>
        var $table = $('#table')

        $(function() {
            $table.bootstrapTable({
                url: 'lay-du-lieu3',
                idField: 'id',
                showColumns: false,
                columns: [
                    {
                        field: 'permissionValue',
                        align: 'left',
                        title: 'Đơn vị'
                    }

                ],
                treeShowField: 'permissionValue',
                parentIdField: 'pid',
                onPostBody: function() {
                    var columns = $table.bootstrapTable('getOptions').columns
                    if (columns && columns[0][0].visible) {
                        $table.treegrid({
                            treeColumn: 0,
                            onChange: function() {
                                $table.bootstrapTable('resetView')
                            }
                        })
                    }
                }
            })
        })
    </script>

@endsection













