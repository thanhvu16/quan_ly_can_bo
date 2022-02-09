
@extends('admin::layouts.master')
@section('page_title', 'Thêm văn bản quy định')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thêm văn bản quy định</h3>
                    </div>
                    <form role="form" action="{{route('van-ban-quy-dinh.store')}}" method="post"
                          enctype="multipart/form-data"
                          id="myform">
                        @csrf
                        <div class="box-body">

                            <div id="moda-search" class="modal fade" role="dialog">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="{{ asset('modules/quanlyvanban/js/app.js') }}"></script>
    <script type="text/javascript">
        $('.ngay-ban-hanh').on('change', function () {
            // console.log($('[name=ngay_ban_hanh]').val());
            // $('.van-ban').removeClass('hidden');
        });

        function checktrung1()
        {
            var so_ky_hieu = $('[name=so_ky_hieu]').val();
            var ngay_ban_hanh = $('[name=ngay_ban_hanh]').val();
            var loai_van_ban = $('#loai-van-ban').val();
            var co_quan_ban_hanh = $('#co-quan-ban-hanh').val();
            // console.log(loai_van_ban);
            // console.log(them_tiep);
            // e.preventDefault();
            $.ajax({
                url: APP_URL + '/kiem_tra_trich_yeu',
                type: 'POST',
                beforeSend: showLoading(),
                dataType: 'json',
                data: {
                    so_ky_hieu: so_ky_hieu,
                    ngay_ban_hanh: ngay_ban_hanh,
                    loai_van_ban: loai_van_ban,
                    co_quan_ban_hanh: co_quan_ban_hanh,
                    _token: $('meta[name="csrf-token"]').attr('content'),
                },
            }).done(function (res) {
                if (res.is_relate || res.is_relate2) {
                    hideLoading();
                    if(res.is_relate)
                    {
                        $('#moda-search').html(res.html);
                        $('#moda-search').modal('show');
                    }else{
                        $('#moda-search').html(res.html2);
                        $('#moda-search').modal('show');
                    }
                    // document.getElementById("them-moi").submit();
                    // document.getElementById("them-moi").submit();

                } else {
                    var co_quan_ban_hanh = document.getElementById("co-quan-ban-hanh");
                    var so_ky_hieu = document.getElementById("so-ky-hieu-vb");
                    var vb_so_den = document.getElementById("so-den-vb");
                    var vb_ngay_ban_hanh = $('#ngay-ban-hanh-vb').val();
                    var trichYeu = document.getElementById("trich-yeu");
                    var nguoiKy = document.getElementById("nguoi-ky");
                    var loai_van_ban = document.getElementById("loai-van-ban");

                    console.log(vb_ngay_ban_hanh);
                    var value1 = co_quan_ban_hanh.value;
                    var value2 = so_ky_hieu.value;
                    var value3 = vb_so_den.value;
                    // var value4 = vb_ngay_ban_hanh.value;
                    var value5 = trichYeu.value;
                    var value6 = nguoiKy.value;
                    var value7 = loai_van_ban.value;

                    if( value1 == "" ||  value2 == ""||  value3 == ""||  vb_ngay_ban_hanh == ""||  value5 == ""||  value6 == ""||  value7 == "")  {
                        hideLoading();
                        alert("Bạn cần nhập đủ thông tin");
                        // so_van_ban_id.focus();
                        return false;
                    }else{
                        document.getElementById("myform").submit();

                    }
                }

            });
        }

        $(document).ready(function () {
            var ngay_nhan = $('input[name="ngay_nhan"]').val();
            var tieu_chuan = $('.tieu-chuan').val();

            console.log(ngay_nhan, tieu_chuan);
            $.ajax({
                // beforeSend: showLoading(),
                url: APP_URL + '/han-xu-ly-van-ban',
                type: 'POST',
                dataType: 'json',

                data: {
                    tieu_chuan: tieu_chuan,
                    ngay_nhan: ngay_nhan,
                    _token: $('meta[name="csrf-token"]').attr('content'),
                },

            }).done(function (res) {
                // hideLoading();
                $("input[name='han_xu_ly']").val(res.html);


            });
        });

        $('.lay_van_ban').on('change', function (e) {
            var tieu_chuan = $('[name=tieu_chuan]').val();
            var ngay_ban_hanh = $('input[name="ngay_nhan"]').val();
            e.preventDefault();
            $.ajax({
                beforeSend: showLoading(),
                url: APP_URL + '/han-van-ban',
                type: 'POST',
                dataType: 'json',

                data: {
                    tieu_chuan: tieu_chuan,
                    ngay_ban_hanh: ngay_ban_hanh,
                    _token: $('meta[name="csrf-token"]').attr('content'),
                },

            }).done(function (res) {
                hideLoading();
                $("input[name='han_xu_ly']").val(res.html);


            });
        });
        $('.ngay-nhan').on('change', function (e) {
            var tieu_chuan = $('[name=tieu_chuan]').val();
            var ngay_ban_hanh = $('input[name="ngay_nhan"]').val();
            e.preventDefault();
            $.ajax({
                beforeSend: showLoading(),
                url: APP_URL + '/han-van-ban',
                type: 'POST',
                dataType: 'json',

                data: {
                    tieu_chuan: tieu_chuan,
                    ngay_ban_hanh: ngay_ban_hanh,
                    _token: $('meta[name="csrf-token"]').attr('content'),
                },

            }).done(function (res) {
                hideLoading();
                $("input[name='han_xu_ly']").val(res.html);


            });
        });
    </script>
@endsection
