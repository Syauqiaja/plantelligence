<div class="bg-soft-purple text-purple">
    <div class="h-100 w-100 p-3 d-flex flex-column gap-2">
        <div class="flex gap-2">
            <h4 class="text-center border-dashed border-purple py-2 rounded flex-grow-1 fw-bold my-auto">
                MATERI 3 <br>
                Nutrisi dan Transport
            </h4>
            <div class="bg-white rounded-md p-1" style="height: 64px; aspect-ratio: 1;">
                <img src="{{ asset('images/qr-code.png') }}" alt="qr-code materi">
            </div>
        </div>
        <div class="flex-grow-1">
            <iframe
            src="{{asset('pdf/web/viewer.html')}}?file={{ asset('pdf/Materi_3.pdf') }}"
            width="100%"
            height="100%"
            ></iframe>
        </div>
    </div>
</div>
<x-materi-tiga.fakta-unik/>
<x-quiz-page :materi="3" :pageTitle="'Materi 3: Nutrisi dan Transport'" :color="'purple'"/>