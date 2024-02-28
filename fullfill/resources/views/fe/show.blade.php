@extends('layouts.fe')
@section('content')
    <h2>Generated QR Code Image</h2>
    <div id="qrcode"></div>
    <p>{{$payload}}</p>
    {{-- <img src="{{ asset("uploads/qrcode.png") }}" alt="QR Code"> --}}
@endsection
<script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs/qrcode.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Your code to access and manipulate the DOM here
    var payload = "{{$payload}}";
    var qrcode = new QRCode(document.getElementById("qrcode"), {
        text: payload,
        width: 128,
        height: 128
    });
});
</script>
{{-- <script src="https://cdn.jsdelivr.net/npm/qrcode@1.4.4"></script>
<script>
    // Data for QR code
    var qrData = {!! json_encode($payload) !!}; // Encode PHP variable as JavaScript variable

    // Generate QR code
    var qrCodeDiv = document.getElementById("qrcode");
    new QRCode(qrCodeDiv, qrData);
</script> --}}