@props(['status'])

@if ($status)
    <div class="page-login__status">
        {{ $status }}
    </div>
@endif
