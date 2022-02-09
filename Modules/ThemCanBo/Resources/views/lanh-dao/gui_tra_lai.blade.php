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
                            <div class="col-md-6">
                                <form action="{{ route('ho_so_can_bo.lanh_dao_duyet') }}" method="post"
                                      id="form-duyet-ho-so">
                                    @csrf
                                    <input type="hidden" name="can_bo_id" value="">
                                    <input type="hidden" name="multi" value="1">
                                    <input type="hidden" name="status" value="1">
                                    <button type="button"
                                            class="btn btn-sm mt-1 btn-submit btn-primary waves-effect btn-luu-all waves-light pull-right hide pull-right btn-sm"
                                            data-original-title=""
                                            title=""><i class="fa fa-check"></i> Duyệt
                                    </button>
                                </form>

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
                                                    {{ $data->trinhTuTraLaiHoSo->noi_dung ?? null }}
                                                </p>
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
    @include('themcanbo::components.modal_tra_lai_ho_so')
@endsection
@section('script')
    <script type="text/javascript">
        // tra lai van ban
        $('.btn-tra-lai').on('click', function () {
            let id = $(this).data('id');
            let traLai = $(this).data('type');

            $('#modal-tra-lai').find('input[name="can_bo_id"]').val(id);
            $('#modal-tra-lai').find('input[name="type"]').val(traLai);
        });

        let arrCanBoId = [];

        $(document).on('change', 'input[name=check_all]', function () {

            if ($(this).is(':checked', true)) {
                $(this).closest('.data-row').find(".sub-check").prop('checked', true);

                $(this).closest('.data-row').find('.sub-check:checked').each(function () {
                    arrCanBoId.push($(this).val());
                });

                if (arrCanBoId.length != 0) {
                    $('.btn-luu-all').removeClass('hide');
                    $('#form-duyet-ho-so').find('input[name="can_bo_id"]').val(JSON.stringify(arrCanBoId));
                }
            } else {
                $(this).closest('.data-row').find(".sub-check").prop('checked', false);
                $('.btn-luu-all').addClass('hide');
                arrCanBoId = [];
                $('#form-duyet-ho-so').find('input[name="can_bo_id"]').val(JSON.stringify(arrCanBoId));
            }

        });

        $('.sub-check').on('click', function () {
            let id = $(this).val();
            if ($(this).is(':checked')) {
                if (arrCanBoId.indexOf(id) === -1) {
                    arrCanBoId.push(id);
                }
                $('#form-duyet-ho-so').find('input[name="can_bo_id"]').val(JSON.stringify(arrCanBoId));
            } else {
                var index = arrCanBoId.indexOf(id);
                if (index > -1) {
                    arrCanBoId.splice(index, 1);
                }
                $('#form-duyet-ho-so').find('input[name="can_bo_id"]').val(JSON.stringify(arrCanBoId));
            }

            if (arrCanBoId.length != 0) {
                $('.btn-luu-all').removeClass('hide');
            } else {
                $('.btn-luu-all').addClass('hide');
            }
        });

        $('.btn-luu-all').on('click', function () {
            if (confirm('Xác nhận duyệt hồ sơ?')) {
                $('#form-duyet-ho-so').submit();
            }
        });


        $('.btn-submit').on('click', function () {
            let id = $('#form-duyet-ho-so').find('input[name="can_bo_id"]').val();
            if (id.length == 0) {
                toastr['warning']('Vui lòng chọn trước khi duyệt', 'Thông báo hệ thống');
            } else {
                $('#form-duyet-ho-so').submit();
            }
        });

        $('.btn-choose-status').on('click', function () {
            let message = `Xác nhận duyệt hồ sơ`;
            if (confirm(message)) {
                let status = $(this).data('type');
                let id = $(this).data('id');

                $.ajax({
                    url: APP_URL + '/lanh-dao-duyet',
                    type: 'POST',
                    data: {
                        can_bo_id: id,
                        status: status,
                    },
                    success: function (data) {
                        if (data.success) {
                            toastr['success'](data.message, 'Thông báo hệ thống');
                            location.reload();
                        } else {
                            toastr['error'](data.message, 'Thông báo hệ thống');
                        }

                    }
                })
            }
        });
    </script>
@endsection
