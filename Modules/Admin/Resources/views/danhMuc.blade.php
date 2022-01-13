@extends('admin::layouts.master')
@section('page_title', 'Đơn Vị')
@section('content')
    <section class="content">

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="{{ Request::get('tab') == 'tab_1' || empty(Request::get('tab')) ? 'active' : null }}">
                    <a href="{{ route('danhMucHeThong') }}">
                        <i class="fa fa-tasks"></i> Danh sách mục hệ thống
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div
                    class="tab-pane {{ Request::get('tab') == 'tab_1' || empty(Request::get('tab')) ? 'active' : null }}"
                    id="tab_1">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- /.box-header -->
                            <div class="col-md-3">

                            </div>

                            <div class="box-body">
                                <div class="col-md-6">
                                    <a href=""> 1. Cấp tổ chức</a><br>
                                    <a href=""> 2. Khối cơ quan</a><br>
                                    <a href="{{route('danhsachdonvi')}}"> 3. Đơn vị hành chính</a><br>
                                    <a href="{{route('danhsachchucvu')}}"> 4. Hình thức chức vụ</a><br>
                                    <a href=""> 5. Chuyên ngành đào tạo</a><br>
                                    <a href="{{route('danhsachloaivanban')}}"> 6. Loại văn bằng chứng chỉ</a><br>
                                    <a href=""> 7. Lĩnh vực nghiên cứu khoa học</a><br>
                                    <a href=""> 8. Danh mục dân tộc</a><br>
                                    <a href=""> 9. Danh mục tôn giáo</a><br>
                                    <a href=""> 10. Thành phần xuất thân</a><br>
                                    <a href=""> 11. Tình trạng hôn nhân</a><br>


                                </div>
                                <div class="col-md-6">
                                    <a href=""> 12. Hạng thương binh</a><br>
                                    <a href=""> 13. Danh hiệu phong tặng</a><br>
                                    <a href=""> 14. Quan hệ gia đình</a><br>
                                    <a href=""> 15. Đối tượng quản lý</a><br>
                                    <a href=""> 16. Công việc chuyên môn</a><br>
                                    <a href=""> 17. Ngạch,chức danh</a><br>
                                    <a href=""> 18. Bậc, hệ số lương</a><br>
                                    <a href=""> 19. Mức lương cơ bản</a><br>
                                    <a href=""> 20. Loại phụ cấp</a><br>
                                    <a href=""> 21. Bình bầu phân loại cán bộ</a><br>
                                    <a href=""> 22. Khen thưởng kỷ luật</a><br>
                                    <a href=""> 23. Lý do đi nước ngoài</a><br>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script type="text/javascript">
        $('.check_parent').on('click', function () {
            let status = $(this).val();
            if (status == 1) {
                $('.parent-id').removeClass('hide');
            } else {
                $('.parent-id').addClass('hide');
            }
        });
    </script>
@endsection
