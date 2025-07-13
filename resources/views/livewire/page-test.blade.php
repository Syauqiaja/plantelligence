<div class="d-flex align-items-center justify-content-center">
    <div id="flipbook" style="aspect-ratio: 1.4; height: 95vh; bottom: -20px;">
        <livewire:back-cover/>
    </div>
</div>

@push('scripts')
<script>
    $('#flipbook').turn({gradients: true, acceleration: true});
</script>
@endpush