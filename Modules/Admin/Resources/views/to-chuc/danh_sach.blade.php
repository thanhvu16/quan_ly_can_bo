@extends('admin::layouts.master')
@section('page_title', 'Đơn Vị')
@section('content')
    <section class="content">

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="{{ Request::get('tab') == 'tab_1' || empty(Request::get('tab')) ? 'active' : null }}">
                    <a href="{{ route('don-vi-to-chuc.index') }}">
                        <i class="fa fa-tasks"></i> Danh sách
                    </a>
                </li>
                @can('thêm người dùng')
                    <li class="{{ Request::get('tab') == 'tab_2' ? 'active' : null }}">
                        <a href="{{ route('don-vi-to-chuc.create') }}">
                            <i class="fa fa-plus"></i> Thêm đơn vị trực thuộc đơn vị</a>
                    </li>
                @endcan
            </ul>
            <div class="tab-content">
                <div
                    class="tab-pane {{ Request::get('tab') == 'tab_1' || empty(Request::get('tab')) ? 'active' : null }}"
                    id="tab_1">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- /.box-header -->
                            <div class="col-md-6">
                                @role(QUAN_TRI_HT)
                                <button type="button" class="btn btn-sm btn-info waves-effect waves-light mb-1"
                                        data-toggle="collapse"
                                        href="#collapseExample"
                                        aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fa fa-plus"></i>
                                    THÊM ĐƠN VỊ
                                </button>
                                @endrole
                                @can(\App\Common\AllPermission::themCanBo())
                                    <a type="button" href="{{route('ho_so_can_bo.create')}}" class="btn btn-sm btn-success waves-effect waves-light mb-1">
                                        <i class="fa fa-plus"></i>
                                        TẠO CÁN BỘ
                                    </a>
                                @endcan
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="collapse " id="collapseExample">
                                        <div class="row">
                                            @include('admin::to-chuc.index')
                                        </div>

                                    </div>
                                </div>
                            </div>
{{--                            <div class="col-md-12" style="margin-top: 20px">--}}
{{--                                <div class="row">--}}
{{--                                    <form action="{{route('don-vi-to-chuc.index')}}" method="get">--}}
{{--                                        <div class="col-md-3 form-group">--}}
{{--                                            <label for="exampleInputEmail1">Tìm theo tên đơn vị</label>--}}
{{--                                            <input type="text" class="form-control"--}}
{{--                                                   value="{{Request::get('ten_don_vi')}}"--}}
{{--                                                   name="ten_don_vi"--}}
{{--                                                   placeholder="Tên đơn vị">--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-3 form-group">--}}
{{--                                            <label for="exampleInputEmail1">Tìm theo tên viết tắt</label>--}}
{{--                                            <input type="text" class="form-control"--}}
{{--                                                   value="{{Request::get('ten_viet_tat')}}"--}}
{{--                                                   name="ten_viet_tat"--}}
{{--                                                   placeholder="Tên viết tắt">--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-3 form-group">--}}
{{--                                            <label for="exampleInputEmail1">Tìm theo mã hành chính</label>--}}
{{--                                            <input type="text" class="form-control"--}}
{{--                                                   value="{{Request::get('ma_hanh_chinh')}}"--}}
{{--                                                   name="ma_hanh_chinh"--}}
{{--                                                   placeholder="Mã hành chính">--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-3" style="margin-top: 20px">--}}
{{--                                            <button type="submit" name="search" class="btn btn-primary">Tìm Kiếm--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}

{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="box-body" style="margin: 50px 0px">

                                <table id="table"></table>

{{--                                <table class="table table-bordered table-striped table-hover">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th width="5%" class="text-center">STT</th>--}}
{{--                                        <th width="" class="text-center">Tên đơn vị</th>--}}
{{--                                        <th width="18%" class="text-center">Nhóm đơn vị</th>--}}
{{--                                        <th width="10%" class="text-center">Đơn vị chủ quản</th>--}}
{{--                                        <th width="10%" class="text-center">Mã hành chính</th>--}}
{{--                                        <th width="10%" class="text-center">Địa chỉ</th>--}}
{{--                                        <th width="10%" class="text-center">Điện thoại</th>--}}
{{--                                        <th width="10%" class="text-center">Email</th>--}}
{{--                                        <th width="10%" class="text-center">Xem</th>--}}
{{--                                        <th width="10%" class="text-center">Tác Vụ</th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    @forelse($ds_donvi as $key=>$donvi)--}}
{{--                                        <tr>--}}
{{--                                            <td class="text-center" style="vertical-align: middle">{{$key+1}}</td>--}}
{{--                                            <td class="text-left"--}}
{{--                                                style="vertical-align: middle">{{$donvi->ten_don_vi}}</td>--}}
{{--                                            <td class="text-left" style="vertical-align: middle">{{$donvi->nhomDonVi->ten_nhom_don_vi ?? ''}}</td>--}}
{{--                                            <td class="text-center"--}}
{{--                                                style="vertical-align: middle">{{ $donvi->getParent->ten_don_vi ?? null }}</td>--}}
{{--                                            <td class="text-center"--}}
{{--                                                style="vertical-align: middle">{{$donvi->ma_hanh_chinh}}</td>--}}
{{--                                            <td class="text-center"--}}
{{--                                                style="vertical-align: middle">{{$donvi->dia_chi}}</td>--}}
{{--                                            <td class="text-center"--}}
{{--                                                style="vertical-align: middle">{{$donvi->so_dien_thoai}}</td>--}}
{{--                                            <td class="text-center"--}}
{{--                                                style="vertical-align: middle">{{$donvi->email}}</td>--}}
{{--                                            <td class="text-center"--}}
{{--                                                style="vertical-align: middle"><a href="{{route('canBoDs',$donvi->id)}}">Xem chi tiết</a></td>--}}
{{--                                            <td class="text-center">--}}
{{--                                                <form method="POST" action="{{route('xoadonvi',$donvi->id)}}">--}}
{{--                                                    @csrf--}}
{{--                                                    <a class="btn-action btn btn-color-blue btn-icon btn-light btn-sm"--}}
{{--                                                       href="{{route('don-vi-to-chuc.edit',$donvi->id)}}" role="button"--}}
{{--                                                       title="Sửa">--}}
{{--                                                        <i class="fa fa-edit"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <button--}}
{{--                                                        class="btn btn-action btn-color-red btn-icon btn-ligh btn-sm btn-remove-item"--}}
{{--                                                        role="button"--}}
{{--                                                        title="Xóa">--}}
{{--                                                        <i class="fa fa-trash" aria-hidden="true"--}}
{{--                                                           style="color: red"></i>--}}
{{--                                                    </button>--}}
{{--                                                </form>--}}

{{--                                            </td>--}}

{{--                                        </tr>--}}
{{--                                    @empty--}}
{{--                                        <td class="text-center" colspan="9" style="vertical-align: middle">Không có dữ--}}
{{--                                            liệu !--}}
{{--                                        </td>--}}
{{--                                    @endforelse--}}

{{--                                    </tbody>--}}
{{--                                </table>--}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6" style="margin-top: 5px">
                                            Tổng số đơn vị: <b>{{ $ds_donvi->total() }}</b>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            {!! $ds_donvi->appends(['ten_don_vi' => Request::get('ten_don_vi'),'ma_hanh_chinh' => Request::get('ma_hanh_chinh'),
                                               'ten_viet_tat' => Request::get('ten_viet_tat'),'search' =>Request::get('search') ])->render() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('script')

<script>
    var $table = $('#table')

    $(function() {
        $table.bootstrapTable({
            url: 'lay-du-lieu',
            idField: 'id',
            showColumns: true,
            columns: [
                // {
                //     field: 'STT',
                //     title: 'STT',
                // },
                {
                    field: 'name',
                    sortable: true,

                    title: 'Đơn vị'
                },
                {
                    field: 'Email',
                    title: 'Email'
                },
                // {
                //     field: 'status',
                //     title: 'Trạng thái',
                //
                //     align: 'center',
                //     formatter: 'statusFormatter'
                // },
                {
                    field: 'permissionValue',
                    align: 'center',
                    title: 'Xem chi tiết'
                },
                {
                    field: 'tacvu',
                    align: 'center',
                    title: 'Tác vụ'
                }
            ],
            treeShowField: 'name',
            parentIdField: 'pid',
            onPostBody: function() {
                var columns = $table.bootstrapTable('getOptions').columns
                console.log(columns)
                if (columns && columns[0][1].visible) {
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

    function typeFormatter(value, row, index) {
        if (value === 'menu') {
            return '菜单'
        }
        if (value === 'button') {
            return '按钮'
        }
        if (value === 'api') {
            return '接口'
        }
        return '-'
    }

    function statusFormatter(value, row, index) {
        if (value === 1) {
            return '<span class="label label-success">正常</span>'
        }
        return '<span class="label label-default">锁定</span>'
    }
</script>
@endsection
