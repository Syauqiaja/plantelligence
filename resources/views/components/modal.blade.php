@props(['modalId' => 'defaultModalId'])
<!-- Auth Modal -->
<div class="modal fade" id="{{ $modalId }}" tabindex="-1" aria-labelledby="{{$modalId}}Label" aria-hidden="true"
    style="background: rgba(0,0,0,0.6); backdrop-filter: blur(3px);">
    <div class="modal-dialog modal-dialog-centered">
        {{ $slot }}
    </div>
</div>