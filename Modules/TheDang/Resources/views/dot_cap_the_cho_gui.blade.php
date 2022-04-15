@extends('admin::layouts.master')
@section('page_title', 'Đợt cấp thẻ')
@section('content')
    <section class="content">
        <div class="row">

            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Danh sách đợt cấp thẻ đảng chờ gửi</h3>
                    </div>
                    <div class="box-body">

                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th width="5%" class="text-center">STT</th>
                                <th width="10%" class="text-center">Đợt cấp thẻ</th>
                                <th width="" class="text-center">Ghi chú</th>
                                <th width="15%" class="text-center">Lãnh đạo</th>
                                <th width="10%" class="text-center">Tác Vụ</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($danhSach as $key=>$data)
                                <form action="{{route('guiDuyet',$data->id)}}" id="gui-duyet-{{$data->id}}" method="POST">
                                    @csrf
                                <tr>
                                    <td class="text-center" style="vertical-align: middle">{{$key+1}}</td>
                                    <td class="text-center" style="vertical-align: middle"><a href="{{route('cap-the-dang.index','dot_cap='.$data->id)}}">{{date("d/m/Y", strtotime($data->dot_cap_the))}}</a></td>
                                    <td class="text-left" style="vertical-align: middle">{{$data->ghi_chu}}</td>
                                    <td>
                                        <select class="form-control select2" name="lanh_dao_duyet" form="gui-duyet-{{$data->id}}" required>
                                            <option value="">--Lựa chọn--</option>
                                            @foreach($danhSachLanhDaoDuyet as $ds)
                                                <option value="{{$ds->id}}" >{{$ds->ho_ten}}</option>
                                            @endforeach

                                        </select>
                                    </td>
                                    <td class="text-center">
                                        <button type="submit" form="gui-duyet-{{$data->id}}"
                                                class="btn btn-sm mt-1 btn-submit btn-primary waves-effect waves-light  btn-duyet-all   btn-sm mb-2"
                                                data-original-title=""
                                                title=""><i class="fa fa-check"></i> Duyệt
                                        </button>

                                    </td>

                                </tr>
                                </form>
                            @empty
                                <td class="text-center" colspan="4" style="vertical-align: middle">Không có dữ liệu !
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
                    <!-- /.box-body -->

                </div>
            </div>
        </div>
    </section>

@endsection
