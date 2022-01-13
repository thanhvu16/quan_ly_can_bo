@extends('admin::layouts.master')
@section('page_title', 'Loại Văn Bản')
@section('content')
    <section class="content">
        <div class="row">

            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Danh sách loại văn bằng</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="col-md-3 form-group mt-4">
                        <button type="button" class="btn btn-sm btn-info waves-effect waves-light mb-1"
                                data-toggle="collapse"
                                href="#collapseExample"
                                aria-expanded="false" aria-controls="collapseExample">
                            THÊM LOẠI VĂN BẰNG</button>
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="collapse " id="collapseExample">
                                <div class="row">
                                    @include('admin::Loai_van_ban.index')
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-top: 20px">
                        <div class="row">

                            <form action="{{route('danhsachloaivanban')}}" method="get">
                                <div class="col-md-3 form-group">
                                    <label for="exampleInputEmail1">Tìm theo tên loại văn bằng</label>
                                    <input type="text" class="form-control" value="{{Request::get('ten_loai_van_ban')}}"
                                           name="ten_loai_van_ban"
                                           placeholder="Tên loại văn bản">
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="exampleInputEmail1">Tìm theo tên viết tắt</label>
                                    <input type="text" class="form-control" value="{{Request::get('ten_viet_tat')}}"
                                           name="ten_viet_tat"
                                           placeholder="Tên viết tắt">
                                </div>
{{--                                <div class="col-md-3 form-group">--}}
{{--                                    <label for="exampleInputEmail1">Tìm theo loại áp dụng</label>--}}
{{--                                    <select name="loai_ap_dung" class="form-control lay-so">--}}
{{--                                        <option value="">Chọn loại sổ</option>--}}
{{--                                        <option value="1" {{ Request::get('loai_ap_dung') == 1 ? 'selected' : '' }}>Áp--}}
{{--                                            dụng cho vb đến--}}
{{--                                        </option>--}}
{{--                                        <option value="2" {{ Request::get('loai_ap_dung') == 2 ? 'selected' : '' }}>Áp--}}
{{--                                            dụng cho vb đi--}}
{{--                                        </option>--}}
{{--                                        <option value="3" {{ Request::get('loai_ap_dung') == 3 ? 'selected' : '' }}>Dùng--}}
{{--                                            chung--}}
{{--                                        </option>--}}
{{--                                        <option value="4" {{ Request::get('loai_ap_dung') == 4 ? 'selected' : '' }}>Dùng--}}
{{--                                            riêng--}}
{{--                                        </option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
                                <div class="col-md-3" style="margin-top: 20px">
                                    <button type="submit" name="search" class="btn btn-primary">Tìm Kiếm</button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="box-body">
                        <form action="{{route('loai_van_ban.dataSort')}}" name="Sapxep"
                              method="post">
                            @csrf
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th width="5%" style="vertical-align: middle" class="text-center">STT</th>
                                <th width="" style="vertical-align: middle" class="text-center">Tên loại văn bằng</th>
                                <th width="10%" style="vertical-align: middle" class="text-center">Tên viết tắt</th>
                                <th width="8%" style="vertical-align: middle" class="text-center">Mô tả</th>
{{--                                <th width="10%">Thứ tự--}}
{{--                                    <button name="sapxep_btn" type="submit"--}}
{{--                                            class="btn btn-primary waves-effect btn-sm">Sắp xếp--}}
{{--                                    </button>--}}
{{--                                </th>--}}
                                <th width="7%" style="vertical-align: middle" class="text-center">Tác Vụ</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($ds_loaivanban as $key=>$loaivanban)

                                <tr>
                                    <td class="text-center" style="vertical-align: middle">{{$key+1}}</td>
                                    <td class="text-left"
                                        style="vertical-align: middle">{{$loaivanban->ten_loai_van_ban}}</td>
                                    <td class="text-center"
                                        style="vertical-align: middle">{{$loaivanban->ten_viet_tat}}</td>
{{--                                    <td class="text-center"--}}
{{--                                        style="vertical-align: middle">@if($loaivanban->loai_van_ban == 3)Dùng--}}
{{--                                        chung @elseif($loaivanban->loai_van_ban ==2) Văn bản--}}
{{--                                        đi @elseif($loaivanban->loai_van_ban == 1) Văn bản đến @else Loại--}}
{{--                                        riêng @endif</td>--}}
{{--                                    <td class="text-center"--}}
{{--                                        style="vertical-align: middle">{{ $loaivanban->nam_truoc_skh == 1 ? 'Có' : 'Không' }}</td>--}}
{{--                                    <td class="text-center"--}}
{{--                                        style="vertical-align: middle">{{ $loaivanban->ma_van_ban == 1 ? 'Có' : 'Không' }}</td>--}}
{{--                                    <td class="text-center"--}}
{{--                                        style="vertical-align: middle">{{ $loaivanban->ma_phong_ban == 1 ? 'Có' : 'Không' }}</td>--}}
{{--                                    <td class="text-center"--}}
{{--                                        style="vertical-align: middle">{{ $loaivanban->ma_don_vi == 1 ? 'Có' : 'Không' }}</td>--}}
                                    <td class="text-center" style="vertical-align: middle">{{$loaivanban->mo_ta}}</td>
{{--                                    <td>--}}
{{--                                        <input type="hidden" class="form-control"--}}
{{--                                               name="sovanban_id[]"--}}
{{--                                               value="{{$loaivanban->id}}">--}}
{{--                                        <input type="text" style="width:40%"--}}
{{--                                               class="form-control" name="a_sapXep[]"--}}
{{--                                               value="{{$loaivanban->thu_tu}}">--}}
{{--                                    </td>--}}
{{--                                    <td class="text-center"--}}
{{--                                        style="vertical-align: middle">{{$loaivanban->donvi->ten_don_vi ?? ''}}</td>--}}
                                    <td class="text-center">

                                        @can('sửa loại văn bản')
                                            <a class="btn-action btn btn-color-blue btn-icon btn-light btn-sm"
                                               href="{{route('loai-van-ban.edit',$loaivanban->id)}}" role="button"
                                               title="Sửa">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('xoá loại văn bản')
                                            <form method="POST" action="{{route('xoaloaivanban',$loaivanban->id)}}">
                                                @csrf
                                                <button
                                                    class="btn btn-action btn-color-red btn-icon btn-ligh btn-sm btn-remove-item"
                                                    role="button"
                                                    title="Xóa">
                                                    <i class="fa fa-trash" aria-hidden="true" style="color: red"></i>
                                                </button>
                                            </form>
                                        @endcan

                                    </td>

                                </tr>
                            @empty
                                <td class="text-center" colspan="7" style="vertical-align: middle">Không có dữ liệu !
                                </td>
                            @endforelse

                            </tbody>
                        </table>
                        </form>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-6" style="margin-top: 5px">
                                    Tổng số loại văn bản: <b>{{ $ds_loaivanban->total() }}</b>
                                </div>
                                <div class="col-md-6 text-right">
                                    {!! $ds_loaivanban->appends(['ten_loai_van_ban' => Request::get('ten_loai_van_ban'),'loai_ap_dung' => Request::get('loai_ap_dung'),
                                       'ten_viet_tat' => Request::get('ten_viet_tat'),'search' =>Request::get('search') ])->render() !!}
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
