@extends('admin::layouts.master')
@section('page_title', 'Đơn Vị')
@section('content')
    <section class="content">

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="{{ Request::get('tab') == 'tab_1' || empty(Request::get('tab')) ? 'active' : null }}">
                    <a href="{{ route('don-vi-to-chuc.index') }}">
                          @if(Request::get('don_vi')) <b style="color: blue"><i class="fa fa-tasks"></i> Danh sách cán bộ {{donViNow(Request::get('don_vi'))}}</b> @else<i class="fa fa-tasks"></i> Danh sách @endif
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="row">
                        <div class="box-body" >
                            <div class="col-md-3">
                                <div class="row">
                                    <table id="table" style="font-size: 12px"></table>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <table class="table table-bordered table-striped table-hover" style="font-size: 12px">
                                    <thead>
                                    <tr>
                                        <th class="text-center" width="3%">STT</th>
                                        <th class="text-center">Họ tên</th>
                                        <th class="text-center" width="7%">Giới tính</th>
                                        <th class="text-center" width="10%">Năm sinh</th>
                                        <th class="text-center" width="8%">Dân tộc</th>
                                        <th class="text-center" width="10%">Quê quán</th>
                                        <th class="text-center" width="13%">Chức vụ hiện tại</th>
                                        <th class="text-center" width="15%">Đơn vị</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($danhSach as $key=>$data)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td style="text-transform: uppercase;font-weight: bold"><a href="{{route('canBoDetail',$data->id)}}">@if($data->gioi_tinh == 1) <i style="color: brown" class="fa fa-user-secret"></i>  @else <i style="color: hotpink" class="fa   fa-venus"></i> @endif {{$data->ho_ten}}</a></td>
                                            <td class="text-center">{{$data->gioi_tinh == 1 ? 'Nam' : 'Nữ' }}</td>
                                            <td class="text-center">{{date("d/m/Y", strtotime($data->ngay_sinh))}}</td>
                                            <td class="text-center">{{$data->danToc->ten ?? ''}}</td>
                                            <td class="text-center"><i class="fa fa-map-marker margin-r-5"></i> {{$data->thanhPho->ten ?? ''}}</td>
                                            <td>{{$data->chucVuHienTai->ten ?? ''}}</td>
                                            <td>{{$data->donVi->ten_don_vi ?? ''}}</td>
                                        </tr>
                                    @empty
                                        <td class="text-center" colspan="8" style="vertical-align: middle">Không có dữ liệu !</td>
                                    @endforelse

                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6" style="margin-top: 5px">
                                            {{--                                                Tổng số : <b>{{ $danhSach->total() }}</b>--}}
                                        </div>
                                        <div class="col-md-6 text-right">
                                            {!! $danhSach->appends(['ten' => Request::get('ten'),
                                               'mo_ta' => Request::get('mo_ta'),'search' =>Request::get('search') ])->render() !!}
                                        </div>
                                    </div>
                                </div>
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
                url: 'lay-du-lieu2',
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
