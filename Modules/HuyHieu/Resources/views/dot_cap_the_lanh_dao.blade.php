@extends('admin::layouts.master')
@section('page_title', 'Đợt cấp huy hiệu')
@section('content')
    <section class="content">
        <div class="row">

            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Danh sách đợt cấp huy hiệu đảng </h3>
                    </div>
                    <div class="box-body">

                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th width="5%" class="text-center">STT</th>
                                <th width="10%" class="text-center">Đợt cấp huy hiệu</th>
                                <th width="25%" class="text-center">Danh sách cán bộ</th>
                                <th width="" class="text-center">Ghi chú</th>
                                <th width="10%" class="text-center">Trạng thái</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($danhSach as $key=>$data)
                                <form action="{{route('guiDuyet',$data->id)}}" id="gui-duyet-{{$data->id}}" method="POST">
                                <tr>
                                    <td class="text-center" style="vertical-align: middle">{{$key+1}}</td>
                                    <td class="text-center" style="vertical-align: middle"><a href="{{route('capSoHuyHieu',$data->id)}}">{{date("d/m/Y", strtotime($data->dot_cap_the))}}</a></td>
                                    <td class="text-left" style="vertical-align: middle">
                                        <div style="max-height:200px;  overflow:auto">
                                            @if($data->CanBoCap)
                                                @foreach($data->CanBoCap as $canBo)
                                                     <label for="">- {{$canBo->canBo->ho_ten ?? ''}}</label> <br>
                                                @endforeach
                                            @endif
                                        </div>
                                    </td>
                                    <td class="text-left" style="vertical-align: middle">{{$data->ghi_chu}}</td>

                                    <td class="text-center">
                                        @if($data->trang_thai == 1)
                                        <span class="label label-warning">Chờ lãnh đạo duyệt</span>
                                        @else
                                            <span class="label label-danger">Đã duyệt</span>
                                        @endif

                                    </td>

                                </tr>
                                </form>
                            @empty
                                <td class="text-center" colspan="5" style="vertical-align: middle">Không có dữ liệu !
                                </td>
                            @endforelse

                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-6" style="margin-top: 5px">
                                    Tổng số : <b>{{ $danhSach->total() }}</b>
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
    </section>

@endsection
