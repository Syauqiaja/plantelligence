@props(
    ['height' => 48, 'width' => 48]
)
<div class="bg-dark rounded text-white text-center h4 d-flex align-items-center justify-content-center"
    style="height: {{$height}}px; width: {{$width}}px;">
    <div>
        {{ $slot }}
    </div>
</div>