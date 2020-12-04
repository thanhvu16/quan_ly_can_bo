@if (!empty($vanBanDen->noi_dung))
    <p>
        <b>Nội dung:</b> <i>{{ $vanBanDen->noi_dung }}</i>
    </p>
@endif
<p class="text-initial">- Nơi gửi
    đến: {{ $vanBanDen->co_quan_ban_hanh ?? null }}</p>
<p class="text-initial">- Ngày
    nhập: {{  !empty($vanBanDen->created_at) ? date('d/m/Y', strtotime($vanBanDen->created_at)) : null }}</p>
@if (!empty($loaiVanBanGiayMoi) && $vanBanDen->loai_van_ban_id == $loaiVanBanGiayMoi->id)
    @if (!empty($vanBanDen->lichCongTac->lanhDao))
        <p class="text-initial">
            <b>- Lãnh đạo dự họp:</b><i>{{ $vanBanDen->lichCongTac->lanhDao->ho_ten ?? null }}</i>
        </p>
    @endif
@endif
@if ($vanBanDen->nguoiDung)
    <p class="text-initial">- Cán bộ nhập: {{ $vanBanDen->nguoiDung->ho_ten  }}</p>
@endif
@if(!empty($vanBanDen->han_xu_ly))
<p class="text-initial">
    - <b>Hạn xử lý: {{ date('d/m/Y', strtotime($vanBanDen->han_xu_ly)) }}
    </b>
</p>
@endif

@if (isset($vanBanDen->vanBanDenFile))
    @foreach($vanBanDen->vanBanDenFile as $key => $file)
        <a href="{{ $file->getUrlFile() }}"
           target="popup"
           class="detail-file-name seen-new-window">[{{ $file->ten_file }}]</a>
        @if (count($vanBanDen->vanBanDenFile)-1 != $key)
            &nbsp;|&nbsp;
        @endif
    @endforeach
@endif