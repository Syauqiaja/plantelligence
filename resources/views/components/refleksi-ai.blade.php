@props(['materi', 'pageTitle', 'color' => 'teal'])

<div class="bg-{{ $color }}">
    <div class="h-100 w-100 position-relative">
        <div class="d-flex align-items-center justify-content-center flex-column p-3 text-white">

            <h4 class="text-center border-dashed py-2 rounded w-100 mx-3 mb-2">
                Refleksi AI
            </h4>
            <div style="width: 500px; height: 600px;">
                <iframe src="https://www.chatbase.co/chatbot-iframe/IT7tdSKVjb-hzFzFEhfZh" width="500px" height= "700px";
                    frameborder="0"></iframe>
            </div>
        </div>
        <div class="position-absolute text-white" style="bottom:12px; right: 16px;">
            <small>{{$pageTitle}}</small>
        </div>
    </div>
</div>