@extends('layouts.fe')
@section('title','Fullfill - OrderDetail')

@section('content')
    <div class="container-md-fluid container-lg mb-4" style="margin-top: 80px">
        <div class="row">
            <div class="col-12 mb-2 mt-2 text-center">
                <h2>รายละเอียดการจองสินค้ารีฟิล</h2>
            </div>
            <div class="col-md-6 ">
                <div class="detail-img">
                    <img src="{{ asset($order->product_img) }}" alt="">
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="product-name">
                    <h3><b>{{ $order->product_name }}</b></h3>
                    <h4>฿{{ $order->total_price }} / {{ $order->quantity }}g</h4>
                    <span>ร้าน {{ $order->shop }}</span>
                </div>
                <div class="mb-3">
                    <span>ชื่อลูกค้า: <p>{{ $order->customer_name }}</p>
                        อีเมลลูกค้า: <p>{{ $order->customer_email }}</p>
                        เบอร์โทรศัพท์: <p>{{ $order->phone }}</p>
                        วันที่ต้องการไปรีฟิล: <p>{{ $order->booking_date }}</p>
                        ช่วงเวลาต้องการไปรีฟิล: <p>{{ $order->booking_time }}</p>
                        ข้อความถึงร้านรีฟิล: <p>{{ $order->message }}</p></span>
                </div>
            </div>
            {{-- <form action="" method="post">
                    @csrf
                    <input id="product-name" type="hidden" name="product_name" value="{{ $order->product_name }}">
                    <input id="product-price" type="hidden" name="total_price" value="{{ $$order->total_price }}">
                    <input id="product-weight" type="hidden" name="weight" value="{{ $order->quantity }}">
                    <input id="product-shop" type="hidden" name="product_shop" value="{{ $order->shop }}">
                    <input id="product-img" type="hidden" name="product_img"
                        value="{{ asset($order->product_img) }}">
                    <button type="submit" class="btn btn-prm-outline">จองสินค้ารีฟิล</button>
                </form> --}}
        </div>
    </div>
@endsection
