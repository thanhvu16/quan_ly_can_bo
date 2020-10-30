function noidungvanban(fileName) {
    let htmlForm = `<div class="remove-multi-file">
                     <div class="row">
                       <div class="col-md-8">
                            <label for="vb_ngay_ban_hanh" class="col-form-label">Nội dung</label>
                            <textarea rows="3" class="form-control" name="${fileName}"></textarea>
                        </div>
                        <div class="col-md-4">
                            <label for="vb_ngay_ban_hanh" class="col-form-label">Hạn giải quyết</label>
                            <div>
                                <input type="date" class="form-control" name="han_giai_quyet[]">
                            </div>
                        </div>
                     </div>
                    </div>`;

    $('.layout2').append(htmlForm);
}
$('.check-so-den-vb').on('change', function () {
    let soVanBanId = $(this).val();
    let donViId = $(this).data('don-vi');

    $.ajax({
        url: APP_URL + '/so-den',
        type: 'POST',
        beforeSend: showLoading(),
        data: {
            donViId: donViId,
            soVanBanId: soVanBanId
        },


    })
        .done(function (res) {
            hideLoading();
            if (res.html) {
                var soDen = res.html;
                $('[name=so_den]').val(soDen);
            }
        });

});