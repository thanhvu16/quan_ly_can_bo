@extends('admin::layouts.master')
@section('page_title', 'Danh sách cán bộ')
@section('content')
    <section class="content" style="font-size: 14px">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Huy hiệu đảng</h3>
                        <div class="box-tools pull-right">
                            <span class="label label-danger">8 huy hiệu đảng</span>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>

                    <div class="box-body no-padding">
                        <ul class="users-list clearfix">
                            <li>
                                <img src="{{asset('huyhieu.jpg')}}" style="border-radius:20%"  alt="User Image" width="128px" height="128px">
                                <a class="users-list-name" href="{{route('tuoiDang','arrayId30='.$id30)}}">Huy hiệu </a>
                                <span class="users-list-date">30 năm tuổi đảng</span>
                            </li>
                            <li>
                                <img src="{{asset('huyhieu.jpg')}}" style="border-radius:20%"  alt="User Image" width="128px" height="128px">
                                <a class="users-list-name" href="{{route('tuoiDang','arrayId40='.$id40)}}">Huy hiệu </a>
                                <span class="users-list-date">40 năm tuổi đảng</span>
                            </li>
                            <li>
                                <img src="{{asset('huyhieu.jpg')}}" style="border-radius:20%"  alt="User Image" width="128px" height="128px">
                                <a class="users-list-name" href="{{route('tuoiDang','arrayId50='.$id50)}}">Huy hiệu </a>
                                <span class="users-list-date">50 năm tuổi đảng</span>
                            </li>
                            <li>
                                <img src="{{asset('huyhieu.jpg')}}" style="border-radius:20%"  alt="User Image" width="128px" height="128px">
                                <a class="users-list-name" href="{{route('tuoiDang','arrayId60='.$id60)}}">Huy hiệu </a>
                                <span class="users-list-date">60 năm tuổi đảng</span>
                            </li>
                            <li>
                                <img src="{{asset('huyhieu.jpg')}}" style="border-radius:20%"  alt="User Image" width="128px" height="128px">
                                <a class="users-list-name" href="{{route('tuoiDang','arrayId65='.$id65)}}">Huy hiệu </a>
                                <span class="users-list-date">65 năm tuổi đảng</span>
                            </li>
                            <li>
                                <img src="{{asset('huyhieu.jpg')}}" style="border-radius:20%"  alt="User Image" width="128px" height="128px">
                                <a class="users-list-name" href="{{route('tuoiDang','arrayId70='.$id70)}}">Huy hiệu </a>
                                <span class="users-list-date">70 năm tuổi đảng</span>
                            </li>
                            <li>
                                <img src="{{asset('huyhieu.jpg')}}" style="border-radius:20%"  alt="User Image" width="128px" height="128px">
                                <a class="users-list-name" href="{{route('tuoiDang','arrayId75='.$id75)}}">Huy hiệu </a>
                                <span class="users-list-date">75 năm tuổi đảng</span>
                            </li>
                            <li>
                                <img src="{{asset('huyhieu.jpg')}}" style="border-radius:20%"  alt="User Image" width="128px" height="128px">
                                <a class="users-list-name" href="{{route('tuoiDang','arrayId80='.$id80)}}">Huy hiệu </a>
                                <span class="users-list-date">80 năm tuổi đảng</span>
                            </li>
                        </ul>

                    </div>

                    <div class="box-footer text-center">
                        <a href="{{route('allCanBo','dang_vienC=1')}}" class="uppercase">Tất cả đảng viên</a>
                    </div>

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

@endsection













