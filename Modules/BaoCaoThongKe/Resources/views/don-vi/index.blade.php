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
                        <div class="col-md-12 table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center" width="2%">STT</th>
                                    <th class="text-center">Đơn vị</th>
                                    <th class="text-center">Tổng cán bộ</th>
                                    <th class="text-center">Tổng số đảng viên</th>
                                    <th class="text-center">Khen thưởng</th>
                                    <th class="text-center">Kỉ luật</th>
                                    <th class="text-center">Chuyển công tác</th>
                                    <th class="text-center">Về hưu</th>
                                </tr>
                                </thead>
                                <tbody>

                                    @if (count($danhSachToChuc) > 0)
                                        @foreach($danhSachToChuc as $key => $toChucCha)
                                            <tr class="text-bold">
                                                <td colspan="2" class="text-left">{{ $key+1 }}. {{ $toChucCha->ten_don_vi }}</td>
                                                <td class="text-center">{{ $toChucCha->tong_can_bo }}</td>
                                                <td class="text-center">{{ $toChucCha->tong_dang_vien }}</td>
                                                <td class="text-center">{{ $toChucCha->khen_thuong }}</td>
                                                <td class="text-center">{{ $toChucCha->ki_luat }}</td>
                                                <td class="text-center">{{ $toChucCha->chuyen_cong_tac }}</td>
                                                <td class="text-center">{{ $toChucCha->ve_huu }}</td>
                                            </tr>
                                            @foreach($toChucCha->danh_sach_con as $keyChild => $toChuc)
                                                <tr>
                                                    <td class="text-right">{{ $key+1 }}.{{ $keyChild+1 }}</td>
                                                    <td><a
                                                            href="{{ route('canBoDs', $toChuc->id) }}">
                                                            {{ $toChuc->ten_don_vi }}</a>
                                                    </td>
                                                    <td class="text-center"><a href="{{ route('allCanBo', 'don_vi_id='.$toChuc->id.'&thong_ke=1') }}" target="_blank">{{ $toChuc->tongCanBo }}</a></td>
                                                    <td class="text-center"><a href="{{ route('allCanBo', 'don_vi_id='.$toChuc->id.'&dang_vien=1&thong_ke=1') }}" target="_blank">{{ $toChuc->tongDangVien }}</a></td>
                                                    <td class="text-center"><a href="{{ route('allCanBo', 'don_vi_id='.$toChuc->id.'&khen_thuong=2&thong_ke=1') }}" target="_blank">{{ $toChuc->tongKhenThuong }}</a></td>
                                                    <td class="text-center"><a href="{{ route('allCanBo', 'don_vi_id='.$toChuc->id.'&ky_luat=1&thong_ke=1') }}" target="_blank">{{ $toChuc->tongKiLuat }}</a></td>
                                                    <td class="text-center"><a href="{{ route('allCanBo', 'don_vi_id='.$toChuc->id.'&chuyen_cong_tac=1&thong_ke=1') }}" target="_blank">{{ $toChuc->tongChuyenCongTac }}</a></td>
                                                    <td class="text-center"><a href="{{ route('allCanBo', 'don_vi_id='.$toChuc->id.'&ve_huu=1&thong_ke=1') }}" target="_blank">{{ $toChuc->tongVeHuu }}</a></td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
