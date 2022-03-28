@extends('admin::layouts.master')
@section('page_title', 'Văn bản quy định')
@section('content')
    <section class="content" style="font-size: 14px">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="col-md-6">
                            <div class="row">
                                <h3 class="box-title">Danh sách chi trả chính sách</h3>
                            </div>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="/"><i class="fa fa-home"> Trang chủ > </i></a>  <span style="font-size: 12px">{{isset($title) ? $title : '' }}</span>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="col-md-12 mt-1 ">
                        <div class="row">
                            <div class="col-md-6">
                                <a class=" btn btn-primary" data-toggle="collapse" href="#collapseExample"
                                   aria-expanded="false" aria-controls="collapseExample"> <i class="fa  fa-plus-square-o"></i> <span
                                        style="font-size: 14px">{{isset($chinhSachfisst) ? 'Sửa chi trả chính sách' : 'Thêm chi trả chính sách'}}</span></a>
                            </div>
                            <div class="col-md-6 text-right">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="row">
                            <div class="col-md-12 collapse {{ $chinhSachfisst ? 'in' : '' }} " id="collapseExample">
                                <form action="{{isset($chinhSachfisst) ? route('chi-tra-chinh-sach.update',$chinhSachfisst->id) : route('chi-tra-chinh-sach.store')}}"  method="post" enctype="multipart/form-data" >
                                    @csrf
                                    @if($chinhSachfisst)
                                        @method('PUT')
                                    @endif
                                    <div class="row">


                                        <div class="col-md-3" >
                                            <div class="form-group">
                                                <label for="exampleInputEmail6">Đối tượng <span style="color: red">*</span></label>
                                                <div class="form-group">
                                                    <select class="form-control select2" name="doi_tuong" required>
                                                        @foreach($doiTuongChinhSach as $dsdt)
                                                            <option value="{{$dsdt->id}}"  {{isset($chinhSachfisst) && $chinhSachfisst->doi_tuong == $dsdt->id ? 'selected'  : ''}}>{{$dsdt->ten}}</option>
                                                        @endforeach

                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        @if($chinhSachfisst == null)
                                            <div class="col-md-3">
                                                <label for="exampleInputEmail4">File tài liệu</label>
                                                <input type="file" class="form-control han-xu-ly" multiple name="File[]" value="">
                                            </div>
                                        @endif
                                        <div class="col-md-12 mt-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail4">Nội dung chính sách chi trả <span style="color: red">*</span></label>
                                                <textarea class="form-control" name="noi_dung_chi_tra" id="ten_chinh_sach" rows="3" required>{{isset($chinhSachfisst) ? $chinhSachfisst->noi_dung_chi_tra : ''}}</textarea>
                                            </div>
                                        </div>

                                        <div class="row clearfix"></div>


                                        <div class="col-md-3 mt-4">
                                            <div class="form-group">
                                                <button type="submit"  class="btn btn-primary"><i
                                                        class="fa fa-plus-square-o mr-1"></i> {{isset($chinhSachfisst) ? 'Cập nhật' : 'Thêm mới'}}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="box-body" style=" width: 100%;overflow-x: auto;">
                        Tổng số chi trả chính sách: <b style="font-size: 16px">{{count($chinhSach)}}</b>
                        <table class="table table-bordered table-striped dataTable mb-0">
                            <thead>
                            <tr>
                                <th width="2%" style="vertical-align: middle" class="text-center">STT</th>
                                <th width="10%"  style="vertical-align: middle"class="text-center">Đối tượng áp dụng</th>
                                <th width="" style="vertical-align: middle" class="text-center">Chính sách</th>
                                <th width="10%" style="vertical-align: middle" class="text-center">File</th>
                                <th width="5%" style="vertical-align: middle" class="text-center">Tác vụ</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($chinhSach as $key=>$vb)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td class="text-left">{{$vb->doiTuong->ten ?? ''}}</td>
                                    <td class="text-left">{{$vb->noi_dung_chi_tra ?? ''}}</td>
                                    <td class="text-center"><a href="{{$vb->getUrlFile()}}" target="popup" class="seen-new-window">[File_van_ban]</a></td>
                                    <td class="text-center">
                                        <form method="POST" action="{{route('xoacscc',$vb->id)}}">
                                            @csrf
                                            <a href="{{route('chi-tra-chinh-sach.index','id='.$vb->id)}}"
                                               class="fa fa-edit" role="button"
                                               title="Sửa">
                                                <i class="fas fa-file-signature"></i>
                                            </a><br><br>
                                            <button class="btn btn-action btn-color-red btn-icon btn-ligh btn-remove-item" role="button"
                                                    title="Xóa">
                                                <i class="fa fa-trash" aria-hidden="true" style="color: red"></i>
                                            </button>
                                            <input type="text" class="hidden" value="{{$vb->id}}" name="id_vb">
                                        </form>
                                    </td>
                                </tr>



                            @empty
                                <td colspan="10" class="text-center">Không tìm thấy dữ liệu.</td>
                            @endforelse
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-6" style="margin-top: 5px">

                            </div>
                            <div class="col-md-6 text-right">

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

        function showModal() {
            console.log(1);
            $("#myModal").modal('show');
        }
        $(document).ready(function() {
            // show the alert
            console.log(1);
            // setTimeout(function() {
            //     $(".alert").alert('close');
            // }, 2000);
        });
        $('.btn-export-data').on('click', function () {
            let type = $(this).data('type');

            $('input[name="type"]').val(type);
            $('.form-export').submit();
            hideLoading();
        });


    </script>

@endsection













