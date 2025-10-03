
<div class="bg-soft-blue text-blue">
    
    <div class="h-100 w-100 p-3 d-flex flex-column gap-2">
        <div class="flex gap-2 align-items-center justify-content-center">
            <h4 class="text-center border-dashed border-blue py-3 rounded flex-grow-1 fw-bold flex align-items-center justify-content-center">
                MATERI 2 <br>
                Keseimbangan Air dalam Tubuh Tumbuhan
            </h4>
            <div>
                <span style="font-size: 12px;">Scan di sini</span>
                <div class="bg-white rounded-md p-1" style="height: 64px; aspect-ratio: 1;">
                    <a href="https://drive.google.com/drive/folders/1GBm74uVGFBXeo60KOwNtqEESaAwkQTM9?usp=drive_link"
                        target="_blank">
                        <img src="{{ asset('images/qr-code.png') }}" alt="qr-code materi">
                    </a>
                </div>
            </div>
        </div>
        <div class="flex-grow-1">
            <iframe
            src="{{asset('pdf/web/viewer.html')}}?file={{ asset('pdf/Materi_2.pdf') }}"
            width="100%"
            height="100%"
            ></iframe>
        </div>
    </div>
</div>
<x-materi-dua.fakta-unik/>
<x-quiz-page :materi="2" :pageTitle="'Materi 2: Keseimbangan Air dalam Tubuh Tumbuhan'" :color="'blue'"/>