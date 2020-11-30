@extends('admin::layouts.master')
@section('page_title', 'Danh sách văn bản đi')
@section('content')
    <section class="content">
        <div class="row">

            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Danh sách văn bản đi</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="col-md-12 mt-1 ">
                        <a role="button" onclick="showModal()" class="btn btn-primary ">
                            <span style="color: white;font-size: 14px"><i class="fa fa-folder-open-o"></i> Tải nhiều tệp tin</span></a>
                        <a class=" btn btn-primary" data-toggle="collapse"
                           href="#collapseExample"
                           aria-expanded="false" aria-controls="collapseExample"> <i class="fa  fa-search"></i> <span
                                style="font-size: 14px">Tìm kiếm văn bản</span>
                        </a>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="row">
                            <form action="{{route('van-ban-di.index')}}" method="get">
                                <div class="col-md-12 collapse {{ Request::get('search') == 1 ? 'in' : '' }}" id="collapseExample">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="linhvuc_id" class="col-form-label">Loại văn bản</label>
                                            <select class="form-control show-tick select2-search" autofocus
                                                    name="loaivanban_id" id="loaivanban_id">
                                                <option value="">-- Chọn Loại Văn Bản --</option>
                                                @foreach ($ds_loaiVanBan as $loaiVanBan)
                                                    <option value="{{$loaiVanBan->id}}"  {{Request::get('loaivanban_id') == $loaiVanBan->id ? 'selected' : ''}}
                                                    >{{$loaiVanBan->ten_loai_van_ban}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="cap_ban_hanh_id" class="col-form-label">Sổ văn bản đi</label>
                                            <select class="form-control show-tick select2-search" name="sovanban_id">
                                                <option value="">-- Chọn Sổ Văn Bản Đi --</option>
                                                @foreach ($ds_soVanBan as $soVB)
                                                    <option value="{{$soVB->id}}" {{Request::get('sovanban_id') == $soVB->id ? 'selected' : ''}}
                                                    >{{$soVB->ten_so_van_ban}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="sokyhieu" class="col-form-label">Số ký hiệu</label>
                                            <input type="text" value="{{Request::get('vb_sokyhieu')}}"
                                                   id="vb_sokyhieu" name="vb_sokyhieu"  class="form-control"
                                                   placeholder="Nhập số ký hiệu văn bản đi...">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="linhvuc_id" class="col-form-label">Đơn vị soạn thảo</label>
                                            <select class="form-control show-tick select2-search"
                                                    name="donvisoanthao_id">
                                                <option value="">Chọn đơn vị</option>
                                                @foreach ($ds_DonVi as $donVi)
                                                    <option value="{{ $donVi->id }}" {{Request::get('donvisoanthao_id') == $donVi->id ? 'selected' : ''}}
                                                    >{{ $donVi->ten_don_vi }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3" >
                                            <label for="sokyhieu" class="col-form-label">Nhập từ ngày</label>
                                            <input type="date" name="start_date" class="form-control"
                                                   value="{{Request::get('start_date')}}"
                                                   autocomplete="off">
                                        </div>
                                        <div class="form-group col-md-3" >
                                            <label for="sokyhieu" class="col-form-label">Nhập đến ngày</label>
                                            <input type="date" name="end_date" id="vb_ngaybanhanh" class="form-control"
                                                   value="{{Request::get('end_date')}}"
                                                   autocomplete="off">
                                        </div>
                                        <div class="form-group col-md-3" >
                                            <label for="co_quan_ban_hanh_id" class="col-form-label">Người ký</label>
                                            <select class="form-control show-tick select2-search" name="nguoiky_id">
                                                <option value="">-- Chọn Người Ký --</option>
                                                @foreach ($ds_nguoiKy as $nguoiKy)
                                                    <option value="{{ $nguoiKy->id }}" {{Request::get('nguoiky_id') == $nguoiKy->id ? 'selected' : ''}}
                                                    >{{$nguoiKy->ho_ten}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3" >
                                            <label for="co_quan_ban_hanh_id" class="col-form-label">Chức vụ</label>
                                            <input type="text" class="form-control" placeholder="chức vụ" name="chuc_vu"
                                                   value="{{Request::get('chuc_vu')}}">
                                        </div>

                                        <div class="form-group col-md-12" >
                                            <label for="sokyhieu" class="col-form-label ">Trích yếu</label>
                                            <textarea rows="3" name="vb_trichyeu" class="form-control no-resize"
                                                      placeholder="Nhập nội dung trích yếu ..."
                                            >{{Request::get('vb_trichyeu')}}</textarea>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary" value="1" name="search"><i class="fa  fa-search"></i> Tìm kiếm</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>


                    <div class="box-body">
                        <table class="table table-bordered table-striped dataTable mb-0">
                            <thead>
                            <tr>
                                <th width="2%" style="vertical-align: middle" class="text-center">STT</th>
                                <th width="26%" style="vertical-align: middle" class="text-center">Thông
                                    tin
                                </th>
                                <th width="38%" style="vertical-align: middle" class="text-center">Trích yếu
                                </th>
                                <th width="21%" style="vertical-align: middle" class="text-center">Nơi
                                    nhận
                                </th>
                                <th width="6%" style="vertical-align: middle" class="text-center">Tác vụ
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($ds_vanBanDi as $key=>$vbDi)
                                <tr>
                                    <td class="text-center">{{$key+1}}</td>
                                    <td>
                                        <p>- Số ký hiệu: {{$vbDi->so_ky_hieu}}</p>
                                        <p>- Ngày ban
                                            hành: {{ date('d-m-Y', strtotime($vbDi->ngay_ban_hanh)) }}</p>
                                        <p>- Loại văn bản: {{$vbDi->loaivanban->ten_loai_van_ban ?? ''}}</p>
                                        <p>- Số đi: <span
                                                class="font-bold color-red">{{$vbDi->so_di}}</span></p>
                                    </td>
                                    <td style="text-align: justify"><a
                                            href=""
                                            title="{{$vbDi->vb_trichyeu}}">{{$vbDi->trich_yeu}}</a>
                                        <div class="text-right " style="pointer-events: auto">
                                            @forelse($vbDi->filetrinhky as $filedata)
                                                <a class="seen-new-window" target="popup" href="{{$filedata->getUrlFile()}}">[File trình ký]</a>
                                            @empty
                                            @endforelse
                                            @forelse($vbDi->filephieutrinh as $filedata)
                                                &nbsp; |<a class="seen-new-window" target="popup" href="{{$filedata->getUrlFile()}}"> [File phiếu
                                                    trình]</a>
                                            @empty
                                            @endforelse
                                            @forelse($vbDi->filehoso as $filedata)
                                                &nbsp; |<a href="{{$filedata->getUrlFile()}}"> [File hồ
                                                    sơ]</a>
                                            @empty
                                            @endforelse
                                            {{--                                                        @if(Auth::user()->quyen_vanthu_cq == 1 || Auth::user()->quyen_vanthu_dv == 1)--}}
                                            {{--                                                            <a title="Cập nhật file" href="{{route('ds_file_di',$vbDi->id)}}"><span role="button">&emsp;<i class="fa  fa-search"></i></span></a>@endif--}}
                                        </div>
                                    </td>
                                    <td>
                                        {{--                                                    {{$vbDi->mailtrongtp}}--}}
                                        @forelse($vbDi->mailtrongtp as $key=>$item)
                                            - {{$item->laytendonvi->ten_don_vi}}<br>
                                        @empty
                                        @endforelse
                                        @forelse($vbDi->mailngoaitp as $key=>$item)
                                            - {{$item->laytendonvingoai->ten_don_vi}}<br>
                                        @empty
                                        @endforelse
                                    </td>
                                    <td class="text-center" style="vertical-align: middle">
                                            @hasanyrole('văn thư đơn vị|văn thư huyện')
                                            @if(auth::user()->id == $vbDi->nguoi_tao)
                                                <form method="Get" action="{{route('vanbandidelete',$vbDi->id)}}">
                                                    @csrf
                                                    <a href="{{route('van-ban-di.edit',$vbDi->id)}}"
                                                       class="fa fa-edit" role="button"
                                                       title="Sửa">
                                                        <i class="fas fa-file-signature"></i>
                                                    </a><br><br>
                                                    <button
                                                        class="btn btn-action btn-color-red btn-icon btn-ligh btn-sm btn-remove-item"
                                                        role="button"
                                                        title="Xóa">
                                                        <i class="fa fa-trash" aria-hidden="true" style="color: red"></i>
                                                    </button>
                                                    <input type="text" class="hidden" value="{{$vbDi->id}}" name="id_vb">
                                                </form>
                                            @else
                                                -
                                            @endif
                                            @endrole
                                    </td>
                                </tr>
                            @empty
                                <td colspan="5" class="text-center">Không tìm thấy dữ liệu.</td>
                            @endforelse
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-6" style="margin-top: 5px">
                                    Tổng số văn bản: <b>{{ $ds_vanBanDi->total() }}</b>
                                </div>
                                <div class="col-md-6 text-right">
                                    {!! $ds_vanBanDi->appends(['loaivanban_id' => Request::get('loaivanban_id'), 'sovanban_id' => Request::get('sovanban_id')
                                       ,'vb_sokyhieu' => Request::get('vb_sokyhieu'),
                                       'donvisoanthao_id' => Request::get('donvisoanthao_id'),'start_date' => Request::get('start_date'),
                                       'end_date' => Request::get('end_date'),'nguoiky_id' => Request::get('nguoiky_id'),'chuc_vu' => Request::get('chuc_vu'),
                                       'vb_trichyeu' => Request::get('vb_trichyeu'),'search' =>Request::get('search') ])->render() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title"><i
                                            class="fa fa-folder-open-o"></i> Tải nhiều tệp tin</h4>
                                </div>
                                <form class="form-row" method="post"
                                      action="{{route('multiple_file_di')}}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group col-md-12">
                                        <label for="sokyhieu" class="col-form-label">Chọn tệp tin
                                            <br>
                                            <small><i>(Đặt tên file theo định dạng: tên viết tắt
                                                    loại văn bản + số đi + năm (vd:
                                                    QD-1-2020.pdf))</i></small>
                                        </label><br>
                                        <input type="file" multiple name="ten_file[]"
                                               accept=".xlsx,.xls,image/*,.doc, .docx,.txt,.pdf"/>
                                        <input type="text" id="url-file" value="123" class="hidden"
                                               name="txt_file[]">
                                    </div>
                                    <div class="form-group col-md-4" >
                                        <button class="btn btn-primary"><i class="fa fa-cloud-upload"></i> Tải lên</button>
                                    </div>

                                </form>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-outline">Save changes</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>



                </div>
            </div>
        </div>
    </section>

@endsection


@section('script')
    <script src="{{ asset('modules/quanlyvanban/js/app.js') }}"></script>
    <script type="text/javascript">
        function showModal() {
            $("#myModal").modal('show');
        }
    </script>
@endsection
