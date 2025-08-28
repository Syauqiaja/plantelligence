<div class="bg-purple text-white">
    <div class="h-100 w-100 p-3 d-flex flex-column gap-2">
        <div>
            <h4 class="text-center border-dashed py-2 rounded">
                MATERI 3 <br>
                Nutrisi dan Transport
            </h4>
        </div>
        <div class="flex-grow-1">
            <iframe
            src="{{asset('pdfjs/web/viewer.html')}}?file={{ asset('pdf/Materi_3.pdf') }}"
            width="100%"
            height="100%"
            ></iframe>
        </div>
    </div>
</div>
<x-materi-tiga.fakta-unik/>
<x-quiz-page :materi="3" :pageTitle="'Materi 3: Nutrisi dan Transport'" :color="'purple'"/>