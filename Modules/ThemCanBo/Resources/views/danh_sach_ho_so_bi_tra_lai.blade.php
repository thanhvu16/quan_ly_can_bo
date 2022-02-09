@extends('admin::layouts.master')
@section('page_title', 'Thông tin hồ sơ cán bộ')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="header-title pt-2">Hồ sơ đã gửi trả lại &nbsp;
                                    <a class="btn btn-default btn-sm" data-toggle="collapse"
                                       href="#collapse-tim-kiem-can-bo"
                                       aria-expanded="false" aria-controls="collapse-tim-kiem-can-bo"> <i
                                            class="fa  fa-search"></i> <span
                                            style="font-size: 14px">Tìm kiếm cán bộ</span>
                                    </a>
                                </h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 collapse {{ Request::get('search') ? 'in' : null }}"
                                 id="collapse-tim-kiem-can-bo">
                                <form action="" id="tim_kiem" method="get">
                                    <div class="form-group col-md-3">
                                        <label for="ho-ten" class="col-form-label">Tên cán bộ</label>
                                        <input type="text" name="ho_ten" value="{{ Request::get('ho_ten') }}"
                                               class="form-control" placeholder="Nhập tên cán bộ..">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="que-quan" class="col-form-label">Quê quán</label>
                                        <input type="text" name="que_quan" value="{{ Request::get('que_quan') }}"
                                               class="form-control" placeholder="Nhập quê quán..">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="gioi-tinh" class="col-form-label">Giới tính</label>
                                        <select class="form-control select2"
                                                name="gioi_tinh" id="gioi-tinh">
                                            <option value="">--Lựa chọn--</option>
                                            <option value="1" {{Request::get('gioi_tinh') == 1 ? 'selected' : ''}}>Nam
                                            </option>
                                            <option value="2" {{Request::get('gioi_tinh') == 2 ? 'selected' : ''}}>Nữ
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="don-vi" class="col-form-label">Đơn vị</label>
                                        <select class="form-control select2"
                                                name="don_vi_id" id="don-vi">
                                            <option value="">--Lựa chọn--</option>
                                            @foreach($danhSachToChuc as $toChuc)
                                                <option
                                                    value="{{ $toChuc->id }}" {{Request::get('don_vi_id') == $toChuc->id ? 'selected' : ''}}>{{ $toChuc->ten_don_vi }}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <button class="btn btn-primary" type="submit" name="search" value="1"><i
                                                class="fa fa-search"></i> Tìm
                                            kiếm
                                        </button>
                                        @if (Request::get('search'))
                                            <a href="{{ route('ho_so_can_bo.da_gui_duyet') }}"
                                               class="btn btn-success"><i class="fa fa-refresh"></i></a>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <table class="table table-bordered table-striped table-hover data-row">
                                    <thead>
                                    <tr>
                                        <th class="text-center" width="2%">STT</th>
                                        <th class="text-center">Thông tin cán bộ</th>
                                        <th class="text-center" width="13%">Chức vụ hiện tại</th>
                                        <th class="text-center" width="20%">Đơn vị</th>
                                        <th class="text-center" width="12%">Nội dung trả lại</th>
                                        <th class="text-center" width="8%">Tác vụ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($danhSach as $key=>$data)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>
                                                <a
                                                    href="{{route('canBoDetail',$data->id)}}" target="_blank"
                                                    style="text-transform: uppercase;font-weight: bold">
                                                    @if($data->gioi_tinh == 1)
                                                        <i style="color: brown" class="fa fa-user-secret"></i>
                                                    @else <i style="color: hotpink"
                                                             class="fa fa-female"></i> @endif {{$data->ho_ten}}
                                                </a>
                                                <p>
                                                    - Giới tính: {{ $data->gioi_tinh == 1 ? 'Nam' : 'Nữ' }}
                                                </p>
                                                <p>
                                                    - Năm
                                                    sinh: {{ !empty($data->ngay_sinh) ? date("d/m/Y", strtotime($data->ngay_sinh)) : null }}
                                                </p>
                                                <p>
                                                    - Dân tộc: {{ $data->danToc->ten ?? '' }}
                                                </p>
                                                <p>
                                                    - Quê quán: {{ $data->thanhPho->ten ?? '' }}
                                                </p>
                                            </td>
                                            <td>{{$data->chucVuHienTai->ten ?? ''}}</td>
                                            <td>{{$data->donVi->ten_don_vi ?? ''}}</td>
                                            <td class="color-red">
                                                <p>
                                                    {{ $data->trinhTuTraLaiHoSoCanBoNhap->noi_dung ?? null }}
                                                </p>
                                            </td>
                                            <td>
                                                <a class="btn-action btn btn-color-blue btn-icon btn-light btn-sm" href="{{ route('canBoDetail', $data->id) }}"
                                                   role="button" title="Sửa">
                                                    <i class="fa fa-edit"></i> Sửa
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="9">Không có dữ liệu</td>
                                        </tr>
                                    @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" style="margin-top: 5px">
                                Tổng số : <b>{{ $danhSach->total() }}</b>
                            </div>
                            <div class="col-md-6 text-right">
                                {!! $danhSach->appends(['ho_ten' => Request::get('ho_ten'),
                                   'que_quan' => Request::get('que_quan'),
                                   'gioi_tinh' => Request::get('gioi_tinh'),
                                   'don_vi_id' => Request::get('don_vi_id'),
                                   'search' =>Request::get('search') ])->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
