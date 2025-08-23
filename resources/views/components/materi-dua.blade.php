
<div class="bg-blue text-white">
    <div class="h-100 w-100 p-3 d-flex flex-column gap-2">
        <div>
            <h4 class="text-center border-dashed py-2 rounded">
                MATERI 2 <br>
                Transpirasi
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
<x-materi-dua.fakta-unik/>
<x-quiz-page :materi="2" :pageTitle="'Materi 2: Transpirasi'" :color="'blue'"/>
<x-refleksi-ai :materi="2" :pageTitle="'Materi 2: Transpirasi'" :color="'blue'" />