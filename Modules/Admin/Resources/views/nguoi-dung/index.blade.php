@extends('admin::layouts.master')
@section('page_title', 'Quản lý người dùng')
@section('content')
    <section class="content">
{{--        <div class="box">--}}
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="{{ Request::get('tab') == 'tab_1' || empty(Request::get('tab')) ? 'active' : null }}">
                        <a href="{{ route('nguoi-dung.index') }}">
                            <i class="fa fa-user"></i> Quản lý người dùng
                        </a>
                    </li>
                    @can('thêm người dùng')
                        <li class="{{ Request::get('tab') == 'tab_2' ? 'active' : null }}">
                            <a href="{{ route('nguoi-dung.create') }}">
                                <i class="fa fa-plus"></i> Thêm mới</a>
                        </li>
                    @endcan
                </ul>
                <div class="tab-content">
                    <div class="tab-pane {{ Request::get('tab') == 'tab_1' || empty(Request::get('tab')) ? 'active' : null }}" id="tab_1">
                        <div class="col-md-12">
                            <div class="row">
                                <form action="{{route('nguoi-dung.index')}}" method="get">
                                    <div class="col-md-3 form-group">
                                        <label for="exampleInputEmail1">Tìm theo đơn vị</label>
                                        <select name="don_vi_id" id="don-vi" onchange="selectDonViAppend()" class="form-control select2">
                                            <option value="">-- Tất cả --</option>
                                            @if (count($danhSachDonVi) > 0)
                                                @foreach($danhSachDonVi as $donVi)
                                                    <option value="{{ $donVi->id }}" {{ Request::get('don_vi_id') == $donVi->id ? 'selected' : '' }}>{{ $donVi->ten_don_vi }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label for="exampleInputEmail1">Tìm theo chức vụ</label>
                                        <select name="chuc_vu_id" class="form-control chuc-vu select2">
                                            <option value="">-- Tất cả --</option>
                                            @if (count($danhSachChucVu) > 0)
                                                @foreach($danhSachChucVu as $chucVu)
                                                    <option value="{{ $chucVu->id }}" {{ Request::get('chuc_vu_id') == $chucVu->id ? 'selected' : '' }}>{{ $chucVu->ten_chuc_vu }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label>Tìm theo họ tên</label>
                                        <input type="text" class="form-control" value="{{Request::get('ho_ten')}}"
                                               name="ho_ten"
                                               placeholder="Nhập họ tên...">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>Tìm theo tài khoản</label>
                                        <input type="text" class="form-control" value="{{Request::get('username')}}"
                                               name="username"
                                               placeholder="Nhập tài khoản...">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <button type="submit" name="search" class="btn btn-primary">Tìm Kiếm</button>
                                        @if (!empty(Request::get('don_vi_id')) || !empty(Request::get('chuc_vu_id')) ||
                                            !empty(Request::get('ho_ten')) || !empty(Request::get('username')))
                                            <a href="{{ route('nguoi-dung.index') }}" class="btn btn-success"><i class="fa fa-refresh"></i></a>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="box-body">
                            <table class="table table-bordered table-striped table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <th class="text-center">STT</th>
                                        <th class="text-center">Tài khoản</th>
                                        <th class="text-center">Họ tên</th>
                                        <th class="text-center">Chức vụ</th>
                                        <th class="text-center">Đơn vị</th>
                                        <th class="text-center">Giới tính</th>
                                        <th class="text-center">Trạng thái</th>
                                        <th class="text-center">Tác vụ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>{{ $order++ }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->ho_ten }}</td>
                                        <td>{{ $user->chucVu->ten_chuc_vu ?? null }}</td>
                                        <td>{{ $user->donVi->ten_don_vi ?? null }}</td>
                                        <td>{{ $user->gioi_tinh == 1 ? 'Nam' : 'Nữ' }}</td>
                                        <td class="text-center">{!! getStatusLabel($user->trang_thai) !!}</td>
                                        <td class="text-center">
                                            @can('sửa người dùng')
                                                <a class="btn-action btn btn-color-blue btn-icon btn-light btn-sm" href="{{ route('nguoi-dung.edit', $user->id) }}"
                                                   role="button" title="Sửa">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            @endcan
                                            @can('xoá người dùng')
                                                <form method="POST" action="{{ route('nguoi-dung.destroy', $user->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-action btn-color-red btn-icon btn-ligh btn-sm btn-remove-item" role="button" title="Xóa">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Không có dữ liệu</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    Tổng số Người dùng: <b>{{ $users->total() }}</b>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="pagination pagination-sm no-margin pull-right">
                                        {!! $users->appends(['don_vi_id' => Request::get('don_vi_id'), 'chuc_vu_id' => Request::get('chuc_vu_id'),
                                       'ho_ten' => Request::get('ho_ten'),'username' =>Request::get('username') ])->render() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
    </section>
@endsection
@section('script')
    <script>
        donVi='#don-vi';
        function selectDonViAppend() {
            let $this = $(donVi);
            var don_vi = $('[name=don_vi_id]').val();
            let arrId = $this.val;
            if (arrId) {
                //lấy danh sach cán bộ phối hơp
                $.ajax({
                    url: APP_URL + '/get-chuc-vu/' + don_vi,
                    type: 'GET',
                })
                    .done(function (response) {

                        var html = '<option value="">--Tất cả--</option>';
                        if (response.success) {
                            let selectAttributes = response.data.map((function (attribute) {
                                return `<option value="${attribute.id}" >${attribute.ten_chuc_vu}</option>`;
                            }));
                            $('.chuc-vu').html(html+ selectAttributes);
                        }
                    })
                    .fail(function (error) {
                        toastr['error'](error.message, 'Thông báo hệ thống');
                    });
            }

        }
    </script>
@endsection
