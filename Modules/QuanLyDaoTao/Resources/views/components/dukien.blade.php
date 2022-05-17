
@extends('admin::layouts.master')
@section('page_title', 'Đăng ký học viên')
@section('content')

<section class="content">
    <div class="row">

        <div class="col-md-12">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Đăng ký học viên cho lớp học</h3>
                </div>


                <!-- /.box-header -->


                <div class="box-body" style=" width: 100%;overflow-x: auto;">


                    <div class="col-md-3" style="max-height:680px;  overflow:auto;border-style:double;">
                        <div class="row">
                            <table id="table" style="font-size: 12px"></table>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="box box-danger" >
                            <div class="box-header with-border">
                                <h3 class="box-title" style="color: #0a0a0a;font-weight: bold">Danh sách cán bộ đơn vị</h3>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">

                                    <div class="row">
                                        <form action="{{route('dangKyLop',$id)}}" method="GET">
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
                                            <label for="" class="col-form-label">&nbsp;</label><br>
                                            <button class="btn btn-primary" type="submit" name="search" value="1"><i class="fa fa-search"></i>
                                                Tìm kiếm
                                            </button>
                                            @if (Request::get('search'))
                                                <a href="{{route('dangKyLop',$id)}}" class="btn btn-success"><i class="fa fa-refresh"></i></a>
                                            @endif
                                        </div>
                                        </form>

                                    </div>
                                <div class="col-md-12 text-right">
                                    <form action="{{route('themcbvlop',$id)}}" id="can-bo" method="POST">
                                        @csrf
                                        <button type="submit" form="can-bo"
                                                class="btn btn-sm mt-1 btn-submit btn-primary waves-effect waves-light  btn-duyet-all   btn-sm mb-2"
                                                data-original-title=""
                                                title=""><i class="fa fa-check"></i> Duyệt
                                        </button>
                                    </form>
                                </div>


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
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($danhSach as $key=>$data)
                                        <tr>
                                            <td class="text-center" style="vertical-align: middle">
                                                <input type="checkbox" value="{{$data->canBo->id ?? '' }}" form="can-bo" class="sub-check" name="can_bo[{{ $data->id }}]" id="can-bo-{{ $data->id .'.3' }}">
                                            </td>
                                            <td style="text-transform: uppercase;font-weight: bold"><a
                                                    href="{{route('canBoDetail',$data->id)}}">@if($data->gioi_tinh == 1) <i
                                                        style="color: brown;" class="fa fa-user-secret"></i>  @else <i
                                                        style="color: hotpink"
                                                        class="fa  fa-female"></i> @endif {{$data->ho_ten}}</a></td>
                                            <td class="text-center">{{$data->gioi_tinh == 1 ? 'Nam' : 'Nữ' }}</td>
                                            <td class="text-center">{{date("d/m/Y", strtotime($data->ngay_sinh))}}</td>
                                            <td class="text-center">{{$data->canBo->danToc->ten ?? ''}}</td>
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
                                        {!! $danhSach->appends(['ten_cb' => Request::get('ten_cb'),'quy_hoachcb' => Request::get('quy_hoachcb'),'don_vi' => Request::get('don_vi'),'dao_tao' => Request::get('dao_tao'),'chuc_vu_chinh' => Request::get('chuc_vu_chinh')])->render() !!}
                                    </div>
                                </div>
                            </div>
                        </div>

{{--                        danh sách cử tham gia--}}


                        <div class="box box-danger mt-4" >
                            <div class="box-header with-border">
                                <h3 class="box-title" style="color: #0a0a0a;font-weight: bold">Danh sách cán bộ được cử tham gia khóa học</h3>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
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
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($danhSachHocVien as $key=>$data)
                                        <tr>
                                            <td class="text-center">{{$key+1}} </td>
                                            <td style="text-transform: uppercase;font-weight: bold"><a
                                                    href="{{route('canBoDetail',$data->hocVien->id)}}">@if($data->hocVien->gioi_tinh == 1) <i
                                                        style="color: brown;" class="fa fa-user-secret"></i>  @else <i
                                                        style="color: hotpink"
                                                        class="fa  fa-female"></i> @endif {{$data->hocVien->ho_ten}}</a></td>
                                            <td class="text-center">{{$data->hocVien->gioi_tinh == 1 ? 'Nam' : 'Nữ' }}</td>
                                            <td class="text-center">{{date("d/m/Y", strtotime($data->hocVien->ngay_sinh))}}</td>
                                            <td class="text-center">Kinh</td>
                                            <td class="text-center"><i
                                                    class="fa fa-map-marker margin-r-5"></i> {{$data->hocVien->thanhPho->ten ?? ''}}</td>
                                            <td>{{$data->hocVien->chucVuHienTai->ten ?? ''}}</td>
                                            <td>{{$data->hocVien->donVi->ten_don_vi ?? ''}}</td>
                                            <td class="text-center" style="vertical-align: middle">{{$data->hocVien->so_the_dang}}</td>
                                            <td class="text-center"
                                                style="vertical-align: middle">@if($data->hocVien->ngay_vao_dang_chinh_thuc){{date("d/m/Y", strtotime($data->hocVien->ngay_vao_dang_chinh_thuc))}}@endif</td>

                                        </tr>



                                    @empty
                                        <td colspan="10" class="text-center">Không tìm thấy dữ liệu.</td>
                                    @endforelse
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-md-6" style="margin-top: 5px">
                                        Tổng số cán bộ: <b style="font-size: 16px">{{ $danhSachHocVien->total() }}</b>

                                    </div>
                                    <div class="col-md-6 text-right">
                                        {!! $danhSachHocVien->appends(['ten_cb' => Request::get('ten_cb'),'quy_hoachcb' => Request::get('quy_hoachcb'),'don_vi' => Request::get('don_vi'),'dao_tao' => Request::get('dao_tao'),'chuc_vu_chinh' => Request::get('chuc_vu_chinh')])->render() !!}
                                    </div>
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
                url: APP_URL + '/lay-du-lieu3',
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

@endsection













