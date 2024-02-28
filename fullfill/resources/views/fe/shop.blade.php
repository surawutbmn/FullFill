@extends('layouts.fe')
@section('title','Fullfill - AllShop')

@section('content')
   @foreach ($shops as $shop)
        <!-- Pass each shop's data as props to the Vue component -->
        <shop-page
            :name="'{{ $shop->name }}'"
            :type="'{{ $shop->shop_type }}'"
            :promptpay="'{{ $shop->promptpay }}'"
            :logo="'{{ $shop->image }}'"
            :location="'{{ $shop->location }}'"
        ></shop-page>
    @endforeach
@endsection