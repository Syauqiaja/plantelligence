@php
$pageTitle = 'Materi 1: Air dan Sel Tumbuhan';
@endphp
<div class="bg-teal text-white">
    <div class="h-100 w-100 p-3 d-flex flex-column gap-2">
        <div>
            <h4 class="text-center border-dashed py-2 rounded">
                MATERI 1 <br>
                AIR DAN SEL TUMBUHAN
            </h4>
        </div>
        <div class="flex-grow-1">
            <iframe
            src="{{asset('pdfjs/web/viewer.html')}}?file={{ asset('pdf/dummy_document.pdf') }}"
            width="100%"
            height="100%"
            ></iframe>
        </div>
    </div>
</div>
<x-materi-satu.fakta-unik />
<x-quiz-page :materi="1" :pageTitle="'Materi 1: Air dan Sel Tumbuhan'" :color="'teal'" />
<x-refleksi-ai :materi="1" :pageTitle="'Materi 1: Air dan Sel Tumbuhan'" :color="'teal'" />