<div class="adv-banners">
@foreach ($banners as $banner)
    <div class="adv-banner{{ $banner->advertisement ? ' adv-banner--adv' : '' }}">
        <img src="{{ $banner->img }}" alt="" />
    @if ($banner->advertisement)
        <div class="adv-banner__adv-from">
            <div>Реклама</div>
            <div>erid: {{ $banner->erid }}</div>
            <div>ИНН: {{ $banner->org_inn }}</div>
            <div>Название: {{ $banner->org_name }}</div>
        </div>
    @endif
    </div>
@endforeach
</div>
