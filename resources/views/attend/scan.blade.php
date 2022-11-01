<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>

{{-- <script>
$(document).ready(function(){
    $("#btn-interval").click(function(){
    //    setInterval("alert('Hello World!');", 4000);
       setInterval({{ ("alert")QrCode::generate('Hello!'); }}, 4000);

    });
});
</script> --}}
</head>
<body>
    <div class="container mt-4">
        <div id="reader" width="600px"></div>
        {{-- <div class="visible-print text-center">
            {!! QrCode::size(500)->generate(Request::url()); !!}
            <p>Scan me to return to the original page.</p>
        </div> --}}
        {{-- <div id="reader" width="600px"></div> --}}
        {{-- <div class="common_box_body">
            <button id="btn-interval">Click</button>
            <p>Click the above given button and wait for 2 seconds. After 2 second will come alert box continuously</p>
        </div> --}}
            {{-- {{QrCode::generate('Hello!');}} --}}
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>
    function onScanSuccess(decodedText, decodedResult) {
        // handle the scanned code as you like, for example:
        console.log(`Code matched = ${decodedText}`, decodedResult);
    }

    function onScanFailure(error) {
        // handle scan failure, usually better to ignore and keep scanning.
        // for example:
        console.warn(`Code scan error = ${error}`);
    }

    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader",
    { fps: 10, qrbox: {width: 250, height: 250} },
        /* verbose= */ false);
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>
</html>
