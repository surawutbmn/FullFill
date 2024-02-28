@extends('layouts.be') <!-- Assuming you have a layout file -->

@section('title','Fullfill - ShopDetail')
@section('content')
    <div class="container">
        <h1>Shop Detail</h1>
        @if ($shop)
            <h2>{{ $shop->name }}</h2>
            <p><strong>Type:</strong> {{ $shop->shop_type }}</p>
            <p><strong>promptpay:</strong> {{ $shop->promptpay }}</p>
            <p><strong>Location:</strong> </p>
            <div class="map-container">
                <!-- Use the stored location to generate the map iframe -->
                {!! $shop->location !!} <!-- Assuming $shop->location contains the iframe URL -->
            </div>
             <p><strong>Work Time:</strong></p>
           <ul>
                @foreach (json_decode($shop->work_time, true) as $day => $time)
                    <li><strong>{{ $day }}:</strong> {{ $time['opening_time'] }} - {{ $time['closing_time'] }}</li>
                @endforeach
            </ul>
             <p><strong>Logo:</strong></p>
            <img style="width: 200px" src="{{ asset('uploads/'.$shop->image)}}" alt="Shop Logo">
        @else
            <p>Shop not found.</p>
        @endif
    </div>
@endsection
