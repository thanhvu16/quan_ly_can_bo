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
                                <h3 class="box-title">Danh sách chính sách</h3>
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
                                        style="font-size: 14px">{{isset($chinhSachfisst) ? 'Sửa chính sách' : 'Thêm chính sách'}}</span></a>
                            </div>
                            <div class="col-md-6 text-right">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="row">
                            <div class="col-md-12 collapse {{ $chinhSachfisst ? 'in' : '' }} " id="collapseExample">
                                <form action="{{isset($chinhSachfisst) ? route('chinh-sach.update',$chinhSachfisst->id) : route('chinh-sach.store')}}"  method="post" enctype="multipart/form-data" >
                                    @csrf
                                    @if($chinhSachfisst)
                                    @method('PUT')
                                    @endif
                                    <div class="row">


                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail4">Áp dụng từ ngày <span
                                                        style="color: red">*</span></label>
                                                <div class="input-group date">
                                                    <input type="text" class="form-control  datepicker" value="{{isset($chinhSachfisst) ? formatDMY($chinhSachfisst->tu_ngay) : ''}}"
                                                           name="tu_ngay" id="tu_ngay" autocomplete="off"
                                                           placeholder="dd/mm/yyyy" required>
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar-o"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail4">Áp dụng đến ngày <span
                                                        style="color: red">*</span></label>
                                                <div class="input-group date">
                                                    <input type="text" class="form-control  datepicker" value="{{isset($chinhSachfisst) ? formatDMY($chinhSachfisst->den_ngay) : ''}}"
                                                           name="den_ngay" id="den_ngay" autocomplete="off"
                                                           placeholder="dd/mm/yyyy" required>
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar-o"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if($chinhSachfisst == null)
                                        <div class="col-md-3">
                                            <label for="exampleInputEmail4">File chính sách</label>
                                            <input type="file" class="form-control han-xu-ly" multiple name="File[]" value="">
                                        </div>
                                        @endif
                                        <div class="col-md-12 mt-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail4">Nội dung chính sách <span style="color: red">*</span></label>
                                                <textarea class="form-control" name="ten_chinh_sach" id="ten_chinh_sach" rows="3" required>{{isset($chinhSachfisst) ? $chinhSachfisst->ten_chinh_sach : ''}}</textarea>
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
                        Tổng số chính sách: <b style="font-size: 16px">{{count($chinhSach)}}</b>
                        <table class="table table-bordered table-striped dataTable mb-0">
                            <thead>
                            <tr>
                                <th width="2%" style="vertical-align: middle" class="text-center">STT</th>
                                <th width="10%"  style="vertical-align: middle"class="text-center">Áp dụng từ ngày</th>
                                <th width="10%"  style="vertical-align: middle"class="text-center">Áp dụng đến ngày</th>
                                <th width="" style="vertical-align: middle" class="text-center">Chính sách</th>
                                <th width="10%" style="vertical-align: middle" class="text-center">File</th>
                                <th width="5%" style="vertical-align: middle" class="text-center">Tác vụ</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($chinhSach as $key=>$vb)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td class="text-center">{{ date('d/m/Y', strtotime($vb->tu_ngay)) }}</td>
                                    <td class="text-center">{{ date('d/m/Y', strtotime($vb->den_ngay)) }}</td>
                                    <td class="text-left">{{$vb->ten_chinh_sach}}</td>
                                    <td class="text-center"><a href="{{$vb->getUrlFile()}}" target="popup" class="seen-new-window">[File_van_ban]</a></td>
                                    <td class="text-center">
                                        <form method="POST" action="{{route('xoacs',$vb->id)}}">
                                            @csrf
                                            <a href="{{route('chinh-sach.index','id='.$vb->id)}}"
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
            // let loai_van_ban= $('[name=loai_van_ban_id]').val();
            // let so_van_ban_id= $('[name=so_van_ban_id]').val();
            // let vb_so_den= $('[name=vb_so_den]').val();
            // let vb_so_ky_hieu= $('[name=vb_so_ky_hieu]').val();
            // let don_vi_phoi_hop_id= $('[name=don_vi_phoi_hop_id]').val();
            // let start_date= $('[name=start_date]').val();
            // let end_date= $('[name=end_date]').val();
            // let cap_ban_hanh_id= $('[name=cap_ban_hanh_id]').val();
            // let co_quan_ban_hanh_id= $('[name=co_quan_ban_hanh_id]').val();
            // let nguoi_ky_id= $('[name=nguoi_ky_id]').val();
            // let vb_trich_yeu= $('[name=vb_trich_yeu]').val();
            // let year= $('[name=year]').val();
            // let don_vi_id= $('[name=don_vi_id]').val();
            // let trinh_tu_nhan_van_ban= $('[name=trinh_tu_nhan_van_ban]').val();
            $('input[name="type"]').val(type);
            $('.form-export').submit();
            hideLoading();
        });


    </script>

@endsection













