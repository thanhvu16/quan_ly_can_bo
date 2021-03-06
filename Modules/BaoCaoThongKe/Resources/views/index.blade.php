@extends('admin::layouts.master')
@section('page_title', 'Đơn Vị')
@section('content')
    <section class="content">

        <div class="nav-tabs-custom">
            <div class="box-header with-border">
                <div class="col-md-6">
                    <div class="row">
                        <h4 class="text-uppercase">Thống kê cán bộ tại {{ auth::user()->donVi->ten_don_vi ?? TITLE_APP }}</h4>
                    </div>
{{--                    <div class="row">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputEmail4">Từ ngày</label>--}}
{{--                                <div class="input-group date">--}}
{{--                                    <input type="text" class="form-control  datepicker" name="start_date" id="start_date" value="" placeholder="dd/mm/yyyy">--}}
{{--                                    <div class="input-group-addon">--}}
{{--                                        <i class="fa fa-calendar-o"></i>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputEmail4">Đến ngày</label>--}}
{{--                                <div class="input-group date">--}}
{{--                                    <input type="text" class="form-control  datepicker" name="start_date" id="start_date" value="" placeholder="dd/mm/yyyy">--}}
{{--                                    <div class="input-group-addon">--}}
{{--                                        <i class="fa fa-calendar-o"></i>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
                <div class="col-md-6 text-right">
                    <a href="/"><i class="fa fa-home"> Trang chủ > </i></a>  <span style="font-size: 12px">{{isset($title) ? $title : '' }}</span>
                </div>
            </div>
            <div class="tab-content">
                <div
                    class="tab-pane {{ Request::get('tab') == 'tab_1' || empty(Request::get('tab')) ? 'active' : null }}"
                    id="tab_1">
                    <div class="row">
                        <div class="col-md-6 table-responsive">
                            <h4 class="text-uppercase">Đơn vị</h4>
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center" width="2%">STT</th>
                                    <th class="text-center">Đơn vị</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if (count($danhSachToChuc) > 0)
                                    @foreach($danhSachToChuc as $key => $toChucCha)
                                        <tr class="text-bold">
                                            <td colspan="2" class="text-left">{{ $key+1 }}. {{ $toChucCha->ten_don_vi }}</td>
                                        </tr>
                                        @foreach($toChucCha->toChucCon as $keyChild => $toChuc)
                                            <tr>
                                                <td class="text-right">{{ $key+1 }}.{{ $keyChild+1 }}</td>
                                                <td><a
                                                        href="{{ route('bao_cao_thong_ke.index', 'id='.$toChuc->id) }}">
                                                        {{ $toChuc->ten_don_vi }}</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 table-responsive">
                            @if (!empty(Request::get('id')))
                                <h4>{{ !empty($donViBaoCao) ? $donViBaoCao->ten_don_vi : null }} {{ !empty($donViBaoCao) ? ' ('. $donViBaoCao->parentToChuc->ten_don_vi.')' : null }}</h4>
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-center" width="2%">STT</th>
                                        <th class="text-center">Mẫu báo cáo</th>
                                        <th class="text-center" width="30%">Xuất file</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td>01-TINH (gửi in)</td>
                                            <td class="text-center">
                                                <a href="{{ route('xuat-bao-cao-thong-ke', 'don_vi_id='.Request::get('id').'&type=1') }}" class="btn-export-data"><i class="fa fa-file-excel-o"></i> Xuất Excel
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2</td>
                                            <td>02A-TINH (gửi in)</td>
                                            <td class="text-center">
                                                <a href="{{ route('xuat-bao-cao-thong-ke', 'don_vi_id='.Request::get('id').'&type=2a') }}" class="btn-export-data"><i class="fa fa-file-excel-o"></i> Xuất Excel
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">3</td>
                                            <td>02B-TINH (gửi in)</td>
                                            <td class="text-center">
                                                <a href="{{ route('xuat-bao-cao-thong-ke', 'don_vi_id='.Request::get('id').'&type=2b') }}" class="btn-export-data"><i class="fa fa-file-excel-o"></i> Xuất Excel
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">4</td>
                                            <td>03-TINH (gửi in)</td>
                                            <td class="text-center">
                                                <a href="{{ route('xuat-bao-cao-thong-ke', 'don_vi_id='.Request::get('id').'&type=3') }}" class="btn-export-data"><i class="fa fa-file-excel-o"></i> Xuất Excel
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">5</td>
                                            <td>Báo cáo thống kê Đảng viên chia theo dân
                                                tộc theo Biểu số 4-BTCTW
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('xuat-bao-cao-thong-ke', 'don_vi_id='.Request::get('id').'&type=4') }}" class="btn-export-data"><i class="fa fa-file-excel-o"></i> Xuất Excel
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">6</td>
                                            <td>05-TINH (gửi in)</td>
                                            <td class="text-center">
                                                <a href="{{ route('xuat-bao-cao-thong-ke', 'don_vi_id='.Request::get('id').'&type=5') }}" class="btn-export-data"><i class="fa fa-file-excel-o"></i> Xuất Excel
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">7</td>
                                            <td>06-TINH (GỬI IN)</td>
                                            <td class="text-center">
                                                <a href="{{ route('xuat-bao-cao-thong-ke', 'don_vi_id='.Request::get('id').'&type=6') }}" class="btn-export-data"><i class="fa fa-file-excel-o"></i> Xuất Excel
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">8</td>
                                            <td>07-TINH (gửi in)</td>
                                            <td class="text-center">
                                                <a href="{{ route('xuat-bao-cao-thong-ke', 'don_vi_id='.Request::get('id').'&type=7') }}" class="btn-export-data"><i class="fa fa-file-excel-o"></i> Xuất Excel
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">9</td>
                                            <td>08B-TINH (gửi in)</td>
                                            <td class="text-center">
                                                <a href="{{ route('xuat-bao-cao-thong-ke', Request::get('id').'&type=18') }}" class="btn-export-data"><i class="fa fa-file-excel-o"></i> Xuất Excel
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">10</td>
                                            <td>09-TINH (gửi in)</td>
                                            <td class="text-center">
                                                <a href="{{ route('xuat-bao-cao-thong-ke', Request::get('id').'&type=9') }}" class="btn-export-data"><i class="fa fa-file-excel-o"></i> Xuất Excel
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">11</td>
                                            <td>10-TINH (gửi in)</td>
                                            <td class="text-center">
                                                <a href="{{ route('xuat-bao-cao-thong-ke', Request::get('id').'&type=10') }}" class="btn-export-data"><i class="fa fa-file-excel-o"></i> Xuất Excel
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">12</td>
                                            <td>11A-TINH (gửi in)</td>
                                            <td class="text-center">
                                                <a href="{{ route('xuat-bao-cao-thong-ke', Request::get('id').'&type=11') }}" class="btn-export-data"><i class="fa fa-file-excel-o"></i> Xuất Excel
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">13</td>
                                            <td>12A-TINH (gửi in)</td>
                                            <td class="text-center">
                                                <a href="{{ route('xuat-bao-cao-thong-ke', Request::get('id').'&type=12') }}" class="btn-export-data"><i class="fa fa-file-excel-o"></i> Xuất Excel
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">14</td>
                                            <td>13-TINH (gửi in)</td>
                                            <td class="text-center">
                                                <a href="{{ route('xuat-bao-cao-thong-ke', Request::get('id').'&type=13') }}" class="btn-export-data"><i class="fa fa-file-excel-o"></i> Xuất Excel
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">15</td>
                                            <td>12B2-TINH (gửi in)</td>
                                            <td class="text-center">
                                                <a href="{{ route('xuat-bao-cao-thong-ke', Request::get('id').'&type=14') }}" class="btn-export-data"><i class="fa fa-file-excel-o"></i> Xuất Excel
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">16</td>
                                            <td>12C-TINH (gửi in)</td>
                                            <td class="text-center">
                                                <a href="{{ route('xuat-bao-cao-thong-ke', Request::get('id').'&type=15') }}" class="btn-export-data"><i class="fa fa-file-excel-o"></i> Xuất Excel
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">17</td>
                                            <td>9B-TINH (gửi in)</td>
                                            <td class="text-center">
                                                <a href="{{ route('xuat-bao-cao-thong-ke', Request::get('id').'&type=16') }}" class="btn-export-data"><i class="fa fa-file-excel-o"></i> Xuất Excel
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">18</td>
                                            <td>9C-TINH (gửi in)</td>
                                            <td class="text-center">
                                                <a href="{{ route('xuat-bao-cao-thong-ke', Request::get('id').'&type=17') }}" class="btn-export-data"><i class="fa fa-file-excel-o"></i> Xuất Excel
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            @else
                                <h4>Vui lòng chọn đơn vị để tạo báo cáo</h4>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
