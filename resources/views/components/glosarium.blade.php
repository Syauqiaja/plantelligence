<div class="bg-white">
    <div class="h-100 p-4">
        <h5 class="text-center my-3 title-text">Glosarium</h5>
        <div>
            <table class="table table-hover" style="font-size: 13px;">
                @foreach ($glosariumPageOne as $key => $item)
                    <tr>
                        <td>
                            {{ $key }}
                        </td>
                        <td>
                            {{ $item }}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
<div class="bg-white">
    <div class="h-100 p-4">
        <div>
            <table class="table table-hover" style="font-size: 13px;">
                @foreach ($glosariumPageTwo as $key => $item)
                    <tr>
                        <td>
                            {{ $key }}
                        </td>
                        <td>
                            {{ $item }}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
<div class="bg-white">
    <div class="h-100 p-4">
        <div>
            <table class="table table-hover" style="font-size: 13px;">
                @foreach ($glosariumPageThree as $key => $item)
                    <tr>
                        <td>
                            {{ $key }}
                        </td>
                        <td>
                            {{ $item }}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>