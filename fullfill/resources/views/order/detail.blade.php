@extends('layouts.fe')
@section('title','Order Detail')
@section('content')
    <div class="position-relative container" style="margin-top: 6vw">
        <h1>รายละเอียดการจอง</h1>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        {{-- <h4>หมายเลขสั่งจอง: {{ $orderDetails['order_number'] }}</h4>
                         <h4>โค้ดลับ: {{ $orderDetails['secret_code'] }}</h4> --}}
                        {{-- <h4>id: {{ $orderDetails['product_id'] }}</h4> --}}
                        <h4>รายการสินค้า: {{ $orderDetails['product_name'] }} {{ $orderDetails['quantity'] }} g</h4>
                        <h4>ร้าน: {{ $orderDetails['shop'] }}</h4>
                        <h4>ราคารวม: {{ $orderDetails['total_price'] }}฿</h4>
                        <h4>ชื่อ: {{ $orderDetails['customer_name'] }}</h4>
                        <h4>ข้อความ: {{ $orderDetails['message'] }}</h4>
                        <h4>เมล: {{ $orderDetails['customer_email'] }}</h4>
                        <h4>เบอร์: {{ $orderDetails['phone_number'] }}</h4>
                        {{-- 'product_img' => $request->input('product_img'), --}}
                        <h4>วันที่จะไปรีฟิล: {{ $orderDetails['booking_date'] }}</h4>
                        <h4>เวลาที่จะไปรีฟิล: {{ $orderDetails['booking_time'] }}</h4>

                        {{-- <h4>เวลาที่จะไปรีฟิล: {{ booking_date }}</h4> --}}
                    </div>
                    <div class="col-6">
                        <div class="qr-img text-center">
                            <img src="{{ asset($orderDetails['product_img']) }}" alt="Product Image" style="width: 400px">

                            {{-- <img src="{{ asset($order->product_img) }}" alt="" style="width: 250px"> --}}
                        </div>
                    </div>
                    <form action="{{ route('fe.orders.store', ['productId' => $orderDetails['product_id']]) }}"
                        method="post">
                        @csrf
                        {{-- <input id="productID" type="hidden" name="productId" value="{{ $orderDetails['product_id'] }}"> --}}
                        <input id="product-name" type="hidden" name="product_name"
                            value="{{ $orderDetails['product_name'] }}">
                        <input id="product-price" type="hidden" name="total_price"
                            value="{{ $orderDetails['total_price'] }}">
                        <input id="product-quantity" type="hidden" name="quantity"
                            value="{{ $orderDetails['quantity'] }}">
                        <input id="message" type="hidden" name="message"
                            value="{{ $orderDetails['message'] }}">
                        <input id="product-shop" type="hidden" name="product_shop" value="{{ $orderDetails['shop'] }}">
                        <input id="product-img" type="hidden" name="product_img" value="{{ $orderDetails['product_img'] }}">
                        <input type="hidden" class="form-control" id="booking_date" name="booking_date"
                            value="{{ $orderDetails['booking_date'] }}" />
                        <input type="hidden" class="form-control" id="booking_time" name="booking_time"
                            value="{{ $orderDetails['booking_time'] }}" />
                        <input type="hidden" class="form-control" id="customer_name" name="customer_name"
                            value="{{ $orderDetails['customer_name'] }}">
                        <input type="hidden" class="form-control" id="customer_email" name="customer_email"
                            value="{{ $orderDetails['customer_email'] }}">
                        <input type="hidden" class="form-control" id="phone_number" name="phone_number"
                            value="{{ $orderDetails['phone_number'] }}">
                            <div class="justify-content-center d-flex mt-3">
                                <button type="submit" class="btn btn-prm-outline">จองสินค้ารีฟิล</button>
                                        <button type="button" id="cancelButton" class="btn btn-danger ms-2">แก้ไข</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
<!-- Add this to the head section of your HTML file -->
<!-- Add SweetAlert script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add an event listener to the cancel button
        var cancelButton = document.getElementById('cancelButton');
        if (cancelButton) {
            cancelButton.addEventListener('click', function() {
                // Display a confirmation dialog using SweetAlert
                Swal.fire({
                    title: 'ต้องการแก้ไขข้อมูล?',
                    text: 'คุณจะถูกส่งไปยังหน้าก่อน',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: 'transparent',
                    cancelButtonColor: '#D61C1C',
                    confirmButtonText: 'ตกลง',
                    cancelButtonText: 'ยกเลิก'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If the user confirms, go back to the previous page
                        window.history.back();
                    }
                });
            });
        }
    });
</script>
