@extends('admin::layouts.master')
@section('page_title', 'Danh sách cán bộ')
@section('content')
    <section class="content" style="font-size: 14px">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="col-md-6">
                            <div class="row">
                                <h3 class="box-title">Tìm kiếm nhanh &nbsp;
                                    <a class=" btn btn-primary btn-sm" data-toggle="collapse"
                                       href="#collapseExample"
                                       aria-expanded="false" aria-controls="collapseExample"> <i class="fa  fa-search"></i>
                                        <span
                                            style="font-size: 14px"></span>
                                    </a>
                                </h3>
                            </div>
                        </div>
                        <div class="col-md-6 text-right mt-4">
                            <a href="/"><i class="fa fa-home"> Trang chủ > </i></a>  <span style="font-size: 12px">{{isset($title) ? $title : '' }}</span>
                        </div>

                    </div>
                    <!-- /.box-header -->


                            <div class="box-body" style=" width: 100%;overflow-x: auto;">
                                <div class="col-md-12 mt-1 ">
                                    <div class="row">
                                        <div class="col-md-6">

                                        </div>
                                        <div class="col-md-6 text-right">
                                            <form method="GET" action="{{ route('tra-cuu.index') }}" class="form-export">
                                                <input type="hidden" name="type" value="">
                                                <input type="hidden" name="ten_cb" value="{{Request::get('ten_cb') }}">
                                                <input type="hidden" name="don_vi" value="{{Request::get('don_vi') }}">
                                                <input type="hidden" name="chuc_vu_chinh"
                                                       value="{{Request::get('chuc_vu_chinh') }}">
                                                <input type="hidden" name="page" value="{{Request::get('page') }}">

                                                <button type="button" data-type="excel"
                                                        class="btn btn-success waves-effect waves-light btn-sm btn-export-data"><i
                                                        class="fa fa-file-excel-o"></i> Xuất Excel
                                                </button>
                                            </form>
                                        </div>


                                        {{--                            @can('in sổ văn bản đơn vị')--}}
                                        {{--                           --}}
                                        {{--                            <div class="col-md-6 text-right">--}}
                                        {{--                                <a role="button" href="{{route('in-so-tra-cuu.index')}}"  class="btn btn-success ">--}}
                                        {{--                                    <span style="color: white;font-size: 14px"><i class="fa  fa-print"></i> In sổ</span></a>--}}
                                        {{--                            </div>--}}
                                        {{--                                @endcan--}}
                                    </div>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="row">

                                        <div class="col-md-12 collapse in }} " id="collapseExample">
                                            <form action="{{route('tra-cuu.index')}}" id="tim_kiem" method="get">
                                                <div class="row">
                                                    <div class="form-group col-md-3">
                                                        <label for="loai_van_ban_id" class="col-form-label">Tên cán bộ</label>
                                                        <input type="text" name="ten_cb" value="{{Request::get('ten_cb')}}"
                                                               class="form-control" placeholder="Nhập tên cán bộ..">
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label for="don_vi" class="col-form-label">Đơn vị</label>
                                                        <select class="form-control  select2 select-don-vi-id"
                                                                name="don_vi" id="don_vi">
                                                            <option value="">--Lựa chọn--</option>
                                                            @foreach($donVi as $dsdv)
                                                                <option
                                                                    value="{{$dsdv->id}}" {{Request::get('don_vi') == $dsdv->id || $cap2 == true ? 'selected' : ''}}>{{$dsdv->ten_don_vi}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div
                                                        class="form-group col-md-3 show-phong-ban {{ isset($danhSachPhongBan) && count($danhSachPhongBan) > 0
                                        ? 'show' : 'hide' }}">
                                                        <label class="col-form-label" for="phong-ban">Phòng ban trực thuộc</label>
                                                        <select class="form-control select2 select-phong-ban" name="phong_ban_id">
                                                            <option value="">-- Chọn phòng --</option>
                                                            @if (isset($danhSachPhongBan) && count($danhSachPhongBan) > 0)
                                                                @foreach($danhSachPhongBan as $donVi)
                                                                    <option
                                                                        value="{{ $donVi->id }}" {{ Request::get('phong_ban_id') == $donVi->id ? 'selected' : '' }}>{{ $donVi->ten_don_vi }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label for="sokyhieu" class="col-form-label">Chức vụ chính quyền</label>
                                                        <select class="form-control  select2 "
                                                                name="chuc_vu_chinh" id="chuc_vu_chinh">
                                                            <option value="">--Lựa chọn--</option>
                                                            @foreach($chucVuHienTai as $hientai)
                                                                <option
                                                                    value="{{$hientai->id}}" {{Request::get('chuc_vu_chinh') == $hientai->id ? 'selected' : ''}}>{{$hientai->ten}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="" class="col-form-label">&nbsp;</label><br>
                                                        <button class="btn btn-primary" type="submit" name="search" value="1"><i class="fa fa-search"></i>
                                                            Tìm kiếm
                                                        </button>
                                                        @if (Request::get('search'))
                                                            <a href="{{ route('tra-cuu.index') }}" class="btn btn-success"><i class="fa fa-refresh"></i></a>
                                                        @endif
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3" style="max-height:680px;  overflow:auto;border-style:double;">
                                    <div class="row">
                                        <table id="table" style="font-size: 12px"></table>
                                    </div>
                                </div>
                                <div class="col-md-9">

                                        <table class="table table-bordered table-striped dataTable mb-0" style="font-size: 12px">
                                            <thead>
                                            <tr>
                                                <th width="2%" style="vertical-align: middle" class="text-center">STT</th>
                                                <th width="" style="vertical-align: middle" class="text-center">Họ tên</th>
                                                <th width="5%" style="vertical-align: middle" class="text-center">Giới tính</th>
                                                <th width="7%" style="vertical-align: middle" class="text-center">Năm sinh</th>
                                                <th width="5%" style="vertical-align: middle" class="text-center">Dân tộc</th>
                                                <th width="8%" style="vertical-align: middle" class="text-center">Quê quán</th>
                                                <th width="15%" style="vertical-align: middle" class="text-center">Chức vụ</th>
                                                <th width="13%" style="vertical-align: middle" class="text-center">Đơn vị</th>
                                                <th width="8%" style="vertical-align: middle" class="text-center">Mã thẻ Đảng</th>
                                                <th width="10%" style="vertical-align: middle" class="text-center">Ngày vào Đảng CT</th>
                                                {{--                                <th width="13%" style="vertical-align: middle" class="text-center">Chức vụ Đảng</th>--}}
                                                {{--                                <th width="8%" style="vertical-align: middle" class="text-center">Đơn vị đảng</th>--}}
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse ($danhSach as $key=>$data)
                                                <tr>
                                                    <td class="text-center">{{$key+1}} </td>
                                                    <td style="text-transform: uppercase;font-weight: bold"><a
                                                            href="{{route('canBoDetail',$data->id)}}">@if($data->gioi_tinh == 1) <i
                                                                style="color: brown;" class="fa fa-user-secret"></i>  @else <i
                                                                style="color: hotpink"
                                                                class="fa  fa-female"></i> @endif {{$data->ho_ten}}</a></td>
                                                    <td class="text-center">{{$data->gioi_tinh == 1 ? 'Nam' : 'Nữ' }}</td>
                                                    <td class="text-center">{{date("d/m/Y", strtotime($data->ngay_sinh))}}</td>
                                                    <td class="text-center">Kinh</td>
                                                    <td class="text-center"><i
                                                            class="fa fa-map-marker margin-r-5"></i> {{$data->thanhPho->ten ?? ''}}</td>
                                                    <td>{{$data->chucVuHienTai->ten ?? ''}}</td>
                                                    <td>{{$data->donVi->ten_don_vi ?? ''}}</td>
                                                    <td class="text-center" style="vertical-align: middle">{{$data->so_the_dang}}</td>
                                                    <td class="text-center"
                                                        style="vertical-align: middle">@if($data->ngay_vao_dang_chinh_thuc){{date("d/m/Y", strtotime($data->ngay_vao_dang_chinh_thuc))}}@endif</td>

                                                </tr>



                                            @empty
                                                <td colspan="10" class="text-center">Không tìm thấy dữ liệu.</td>
                                            @endforelse
                                            </tbody>
                                        </table>
                                        <div class="row">
                                            <div class="col-md-6" style="margin-top: 5px">
                                                Tổng số cán bộ: <b style="font-size: 16px">{{ $danhSach->total() }}</b>

                                            </div>
                                            <div class="col-md-6 text-right">
                                                {!! $danhSach->appends(['ten_cb' => Request::get('ten_cb'),'don_vi' => Request::get('don_vi'),'chuc_vu_chinh' => Request::get('chuc_vu_chinh')])->render() !!}
                                            </div>
                                        </div>
                                </div>

                            </div>


                    <!-- /.box-body -->

                </div>
            </div>
        </div>
    </section>

@endsection
@section('script')
    <script type="text/javascript">
        $('.btn-export-data').on('click', function () {
            console.log(123);
            let type = $(this).data('type');
            $('input[name="type"]').val(type);
            $('.form-export').submit();
            hideLoading();
        });

        $('.select-don-vi-id').on('change', function () {
            let $this = $(this);
            let id = $this.val();

            if (id) {
                //lấy danh sach cán bộ phối hơp
                $.ajax({
                    url: APP_URL + '/get-chuc-vu/' + id,
                    type: 'GET',
                    beforeSend: showLoading()
                })
                    .done(function (response) {
                        hideLoading()
                        var html = '<option value="">--Tất cả--</option>';
                        if (response.success) {
                            let selectAttributes = response.data.map((function (attribute) {
                                return `<option value="${attribute.id}" >${attribute.ten_chuc_vu}</option>`;
                            }));
                            $('.chuc-vu').html(html + selectAttributes);
                        }
                        showPhongBan(response.phongBan);

                    })
                    .fail(function (error) {
                        hideLoading()
                        toastr['error'](error.message, 'Thông báo hệ thống');
                    });
            }

        });

        function showPhongBan(data) {
            let html = '<option value="">Chọn phòng ban</option>';
            if (data.length > 0) {
                let selectAttributes = data.map((function (attribute) {
                    return `<option value="${attribute.id}" >${attribute.ten_don_vi}</option>`;
                }));
                $('.show-phong-ban').removeClass('hide');

                $('.select-phong-ban').html(html + selectAttributes);
            } else {
                $('.show-phong-ban').addClass('hide');
                $('.select-phong-ban').html(' ');
            }
        }


    </script>
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













