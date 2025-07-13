<div class="d-flex align-items-center justify-content-center">
    <div id="flipbook" style="aspect-ratio: 1.4; height: 95vh; bottom: -20px;">
        <livewire:cover />
        <x-subcover />
        <x-kata-penganter />
        <x-petunjuk-penggunaan />
        <x-daftar-isi />
        <x-elemen-modul />
        <x-cpmk-tujuan-pembelajaran />
        <x-peta-konsep />
        <x-materi-satu />
        <x-materi-dua />
        <x-materi-tiga />
        <x-glosarium/>
        <x-daftar-pustaka/>
        <livewire:back-cover />
    </div>
</div>

@push('scripts')
<script>
    $('#flipbook').turn({gradients: true, acceleration: true});
</script>
@endpush