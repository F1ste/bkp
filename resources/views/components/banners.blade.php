<div class="banners">
@foreach ($banners as $banner)
    <div class="banner{{ $banner->advertisement ? ' banner--adv' : '' }}">
        <img src="{{ $banner->img }}" alt="" />
    @if ($banner->advertisement)
        <div class="banner__adv-from">
            <div>Реклама</div>
            <div>erid: {{ $banner->erid }}</div>
            <div>ИНН: {{ $banner->org_inn }}</div>
            <div>Название: {{ $banner->org_name }}</div>
        </div>
    @endif
    </div>
@endforeach
</div>
