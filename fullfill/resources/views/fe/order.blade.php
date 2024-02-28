@extends('layouts.fe')
@section('title','Fullfill - Order')
@section('content')
    <div class="container-md-fluid container-lg mb-4" style="margin-top: 80px">
        <div class="row">
            <div class="col-12 mb-2 mt-2 text-center">
                <h2>รายละเอียดการจองสินค้ารีฟิล</h2>
            </div>
            <div class="col-md-6 ">
                <div class="product-name">
                    <h3><b>{{ $product->product_name }}</b></h3>
                    <h4>฿{{ $productPrice }} / {{ $productWeight }}g</h4>
                    <span>ร้าน {{ $product->shop }}</span>
                    {{-- <input id="product-name" type="hidden" name="productName" value="{{ $product->product_name }}">
                    <input id="product-price" type="hidden" name="total_price" value="{{ $productPrice }}">
                    <input id="product-weight" type="hidden" name="weight" value="{{ $productWeight }}">
                    <input id="product-shop" type="hidden" name="product_shop" value="{{ $product->shop }}"> --}}

                </div>
                <div class="detail-img">
                    <img src="{{ asset('uploads/' . $product->product_img) }}" alt="">
                </div>
            </div>
            <div class="col-md-6">
                {{-- {{ route('orders.store', ['productId' => $product->id]) }} --}}
                {{-- <form action="{{ route('fe.orders.store', ['productId' => $product->id]) }}" method="post"> --}}
                <form action="{{ route('order.detail')}}" method="post">
                    @csrf
                    <input id="productID" type="hidden" name="productId" value="{{ $product->id }}">
                    <input id="product-name" type="hidden" name="product_name" value="{{ $product->product_name }}">
                    <input id="product-price" type="hidden" name="total_price" value="{{ $productPrice }}">
                    <input id="product-weight" type="hidden" name="weight" value="{{ $productWeight }}">
                    <input id="product-shop" type="hidden" name="product_shop" value="{{ $product->shop }}">
                    <input id="product-img" type="hidden" name="product_img"
                        value="{{ asset('uploads/' . $product->product_img) }}">

                    <div class="mb-3">
                        <label for="customer_name" class="form-label">ชื่อลูกค้า</label>
                        <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ Auth::check() ? Auth::user()->name : 's' }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="customer_email" class="form-label">อีเมลลูกค้า</label>
                        <input type="email" class="form-control" id="customer_email" name="customer_email" value="{{ Auth::check() ? Auth::user()->email : 's@gmail.com' }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">เบอร์โทรศัพท์</label>
                        <input type="tel" class="form-control" id="phone_number" name="phone_number" value="{{ Auth::check() ? Auth::user()->phone_number : '0809439669' }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">ข้อความถึงร้านรีฟิล</label>
                        <textarea class="form-control" id="message" name="message" value="get it soon with my bottle"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="booking_date" class="form-label">วันที่ต้องการไปรีฟิล</label>
                        <input type="date" class="form-control" id="booking_date" name="booking_date" required
       min="{{ \Carbon\Carbon::now()->toDateString() }}" value="" />
                    </div>
                    <div class="mb-3">
                        <label for="booking_time" class="form-label">ช่วงเวลาต้องการไปรีฟิล</label>
                       <div class="d-flex book-time">
                         <input type="radio" class="btn-check" name="booking_time" value="ช่วงเช้า (08:00-12:00)" id="option1"
                                autocomplete="off" checked>
                            <label class="btn btn-prm-outline position-relative" for="option1">
                                <span class="radio-icon d-none">✔</span> ช่วงเช้า (08:00-12:00)
                            </label>
                        <input type="radio" class="btn-check" name="booking_time" value="ช่วงบ่าย (13:00-16:00)" id="option2"
                                autocomplete="off" checked>
                            <label class="btn btn-prm-outline position-relative" for="option2">
                                <span class="radio-icon d-none">✔</span> ช่วงบ่าย (13:00-16:00)
                            </label>
                        <input type="radio" class="btn-check" name="booking_time" value="ช่วงเย็น (17:00-19:00)" id="option3"
                                autocomplete="off" checked>
                            <label class="btn btn-prm-outline position-relative" for="option3">
                                <span class="radio-icon d-none">✔</span> ช่วงเย็น (17:00-19:00)
                            </label>
                       </div>
                        {{-- <select class="form-control" id="booking_time" name="booking_time" required>
                            <option value="">เลือกช่วงเวลารับสินค้า</option>
                            <option value="09:00-12:00">09:00-12:00</option>
                            <option value="13:00-16:00">13:00-16:00</option>
                            <option value="17:00-19:00">17:00-19:00</option>
                            <!-- Your time options here -->
                        </select> --}}
                    </div>
                    <button type="submit" class="btn btn-prm-outline">จองสินค้ารีฟิล</button>
                </form>
            </div>
        </div>
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var currentDate = new Date();
        // Format the date as YYYY-MM-DD (required for input type="date")
        var formattedDate = currentDate.toISOString().substring(0, 10);

        // Set the value of the input field to the formatted date
        var bookingDateInput = document.getElementById('booking_date');
        if (bookingDateInput) {
            bookingDateInput.value = formattedDate;
        } else {
            console.error("Element with ID 'booking_date' not found.");
        }

         const radioButtons = document.querySelectorAll('.btn-check');
        const priceElement = document.getElementById('product-price-preview');
        const priceElement2 = document.getElementById('product-price');

        const defaultCheckedIcon = document.querySelector('.btn-check:checked + .btn');
        defaultCheckedIcon.querySelector('.radio-icon').classList.remove('d-none');


        radioButtons.forEach(function(radioButton) {
            radioButton.addEventListener('change', function() {

                document.querySelectorAll('.radio-icon').forEach(function(icon) {
                    icon.classList.add('d-none');
                });
                // Display checked icon for the selected radio button
                const checkedIcon = radioButton.nextElementSibling.querySelector('.radio-icon');
                checkedIcon.classList.remove('d-none');
                // console.log(checkedIcon);
            });
        });
    });
</script>