@extends('layouts.fe')
@section('title', 'Fullfill - Payment')

@section('content')
    <div class="position-relative container" style="margin-top: 5vw">
        <h1>Process Payment</h1>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <span>หมายเลขสั่งจอง: {{ $order->order_number }}</span>
                    <span>รายการสินค้า: {{ $order->product_name }} {{ $order->quantity }} g</span>
                    <span>ร้าน: {{ $order->shop }}</span>
                    <span>ราคารวม: {{ $order->total_price }}฿</span>
                    <span>ชื่อลูกค้า: {{ $order->customer_name }}</span>
                    <span>อีเมลลูกค้า: {{ $order->customer_email }}</span>
                    <div class="qr-img text-center">
                        {{-- <p>Payload: {{ $payload }}</p> --}}
                        <div class="qr-wrapper text-center">
                            <div class="qr-bg">
                                <img src="{{asset('img/qr-banner.jpg')}}" alt="Icon" class="qr-banner">
                                <div class="qr-imgcon">
                                    <span class="d-block"> <b>หมายเลขสั่งจอง: {{ $order->order_number }}</b></span>
                                    <span class="d-block"> <b>ร้าน: {{ $order->shop }}</b></span>
                                    <div class="qr-con">
                                        <div id="qrcode"></div>
                                        <img src="{{asset('img/icon-qrcode.png')}}" alt="Icon" class="qr-icon">
                                    </div>
                                    <span class="d-block"> <b>ชื่อบัญชี: นายสุรวุธ บินมามุด<br>ราคารวม: {{ $order->total_price }}฿</b></span>
                                </div>
                            </div>
                        </div>
                        {{-- <button class="btn btn-prm" onclick="captureAndSave()">บันบึกภาพ</button> --}}
                    </div>

                    {{-- <img src="{{ asset('img/qr-payment.jpg') }}" alt="" style="width: 250px"> --}}
                </div>
                <form action="{{ url('/payment/' . $order->id . '/process') }}" method="post" enctype="multipart/form-data"
                    onsubmit="showOrderDetails(event)">
                    @csrf
                    <input id="customer_name" type="hidden" name="customer_name" value="{{ $order->customer_name }}">
                    <input id="customer_email" type="hidden" name="customer_email" value="{{ $order->customer_email }}">

                    <div class="mb-3">
                        <label>หลักฐานการโอนเงิน</label>
                        <div class="mb-3">
                            <img id="imagePreview" style="max-width: 100%; max-height: 200px;" alt="..." />
                        </div>
                        <input type="file" class="form-control" name="transfer_receipt_img" id="transfer_receipt_img"
                            accept="image/*" onchange="previewImage(this)">
                        @if ($errors->has('transfer_receipt_img'))
                            <span class="text-danger">
                                {{ $errors->first('transfer_receipt_img') }}
                            </span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="payment_time" class="form-label">เวลาที่โอน</label>
                        <input type="date" class="form-control" id="payment_time" name="payment_time" required
                            min="{{ \Carbon\Carbon::now()->toDateString() }}" value="{{ \Carbon\Carbon::now()->toDateString() }}" />
                    </div>
                    <div class="justify-content-center d-flex">
                        <button type="submit" class="btn btn-prm-outline me-3"
                            onclick="showOrderDetails()">ตรวจสอบรายละเอียด</button>
                        <button type="button" onclick="" class="btn btn-outline-danger">ยกเลิก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <!-- Add this to the head section of your HTML file -->
    <script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs/qrcode.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        var currentDateTime = new Date();

        // Format the date and time as YYYY-MM-DDTHH:MM (required for input type="datetime-local")
        var formattedDateTime = currentDateTime.toISOString().substring(0, 16);

        // Set the value of the input field to the formatted date and time
        var paymentTimeInput = document.getElementById('payment_time_input');
        if (paymentTimeInput) {
            paymentTimeInput.value = formattedDateTime;
        } else {
            console.error("Element with ID 'payment_time_input' not found.");
        }
        // Set the value of the input field to the formatted date
        var bookingDateInput = document.getElementById('booking_date');
        if (bookingDateInput) {
            bookingDateInput.value = formattedDate;
        } else {
            console.error("Element with ID 'booking_date' not found.");
        }

        function previewImage(input) {
            var file = input.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('imagePreview').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }

        function showOrderDetails(event) {
            event.preventDefault(); // Prevent the form from submitting immediately

            // Get the preview image source
            const paymentTimeInput = document.querySelector('input[name="payment_time"]');
            const previewImageSrc = document.getElementById('imagePreview').src;

            // Get the value of the payment time input
            const paymentTimeValue = paymentTimeInput.value;

            // Convert the payment time to a Date object
            const paymentDateTime = new Date(paymentTimeValue);
            const day = paymentDateTime.getDate().toString().padStart(2, '0');
            const month = (paymentDateTime.getMonth() + 1).toString().padStart(2, '0');
            const year = paymentDateTime.getFullYear().toString().padStart(4, '0');
            // Get the local date and time string
            // const localPaymentDateTimeString = paymentDateTime.toLocaleDateString(); 
            const localPaymentDateTimeString = `${day}/${month}/${year}`;
            // Customize the order details content as needed
            const orderDetailsContent = `
            <strong>หลักฐานการโอนเงิน</strong> <br><img src="${previewImageSrc}" alt="Receipt Image" style="max-width: 400px; max-height: 200px;"><br>
            <p style="text-align: left;">หมายเลขสั่งจอง: {{ $order->order_number }}</br> ร้าน: {{ $order->shop }}<br>
                รายการสินค้า: {{ $order->product_name }} {{ $order->quantity }} g
                <br>ราคารวม: {{ $order->total_price }} ฿ </br>โอนเมื่อ: ${localPaymentDateTimeString}</p>
                `;

            // Use SweetAlert to show the order details popup
            Swal.fire({
                title: 'รายละเอียดการจอง',
                html: orderDetailsContent,
                showCancelButton: true,
                confirmButtonColor: 'rgba(62, 35, 5, 1)',
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก',
            }).then((result) => {
                if (result.isConfirmed) {
                    // If the user clicks "ตกลง", submit the form
                    event.target.submit();
                }
            });
        }
    </script>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Your code to access and manipulate the DOM here
        var payload = "{{ $payload }}";
        var qrcode = new QRCode(document.getElementById("qrcode"), {
            text: payload,
            width: 180,
            height: 180
        });
       function captureAndSave() {
    // Get the element to capture
    var element = document.querySelector('.qr-img');

    // Use html2canvas to capture the element
    html2canvas(element).then(function(canvas) {
        // Convert the canvas to a data URL
        var imgData = canvas.toDataURL('image/png');
        
        // Create a link element to download the image
        var link = document.createElement('a');
        link.download = 'captured_image.png';
        link.href = imgData;
        link.click();
        console.log('Capture and save function called.');
    });
} 
    });
</script>
