@extends('layouts.fe')
@section('title','Fullfill - ProductDetail')

@section('content')
    <div class="detail-con container-md-fluid container-lg">
        <div class="row">
            <span class="d-flex">
                <a href="/" class="me-2" style="text-decoration: none; color:black;">หน้าแรก</a>>
                <a href="/product" class="me-2 ms-2" style="text-decoration: none; color:black;">สินค้า</a>
                ><p class="ms-2"><b>{{ $product->product_name }}</b></p>
            </span>
            <div class="col-md-6 detail-img">
                <img src="{{ asset('uploads/' . $product->product_img) }}" alt="">
            </div>
            <div class="col-md-6">
                <form action="{{ url('/' . $product->id . '/order') }}" method="post">
                    @csrf
                    <div class="product-name">
                        <h3><b>
                                @if (!empty($product->product_name_th))
                                    {{ $product->product_name_th }} ({{ $product->product_name }})
                                @else
                                    {{ $product->product_name }}
                                @endif
                            </b> <a href="javascript:void(0)" style="color: #000"></a></h3>
                    </div>
                    <div class="detail mb-3">
                        <span>ร้าน {{ $result->shop }}, {{ $result->cat_name }}</span>
                        <i class="fa-regular fa-share-from-square ms-2"></i>
                        <p>{{ $product->product_detail }}</p>
                        {{-- <h4>฿{{$product->product_price}} / 100g</h4> --}}
                    </div>
                    <div class="">
                        <h4><b>เลือกปริมาณสินค้า (กรัม)</b></h4>
                    </div>
                    <div class="tab-pane active" id="quantity" role="tabpanel">
                        <div class="justify-content-center mt-3">
                            <input type="radio" class="btn-check" name="weight" value="100" id="option5"
                                autocomplete="off" checked>
                            <label class="btn btn-prm position-relative" for="option5">
                                <span class="radio-icon d-none">✔</span> 100 g
                            </label>

                            <input type="radio" class="btn-check" name="weight" value="300" id="option6"
                                autocomplete="off">
                            <label class="btn btn-prm position-relative ms-2" for="option6">
                                <span class="radio-icon d-none">✔</span> 300 g
                            </label>

                            <input type="radio" class="btn-check" name="weight" value="500" id="option7"
                                autocomplete="off">
                            <label class="btn btn-prm position-relative ms-2" for="option7">
                                <span class="radio-icon d-none">✔</span> 500 g
                            </label>

                            <input type="radio" class="btn-check" name="weight" value="1,000" id="option8"
                                autocomplete="off">
                            <label class="btn btn-prm position-relative ms-2" for="option8">
                                <span class="radio-icon d-none">✔</span> 1,000 g
                            </label>
                        </div>

                        <div class=" price mt-3">
                            <?php
                            $total_price = intval($product->product_price);
                            //                                            echo $total_price
                            ?>
                            <h3>
                                <span> ราคาสินค้า </span>
                                <span id="product-price-preview">{{ $total_price }} THB</span>
                                <input id="product-price" type="hidden" name="total_price" value="{{ $total_price }}">
                            </h3>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button class="btn btn-prm me-2" type="submit">จองสินค้ารีฟิล</button>
                        <button class="btn btn-outline-scd" type="">เพิ่มในรายการโปรด</button>
                        {{--                                            <a href="{{url('/'.$product->id.'/order')}}" class="btn btn-outline-primary me-3">จองสินค้ารีฟิล</a> --}}
                        {{--                                            {{ route('fe.reserve.index') }} --}}
                    </div>
                </form>
            </div>
        </div>
        {{-- <div class="container mt-3">
                <div class="head-txt"><h3>ตัวอย่างบรรจุภัณฑ์</h3></div>
            </div> --}}
        <div class="container mt-5">
            <h3>สินค้าที่คุณอาจสนใจ</h3>
            {{-- <div class="container row mt-2 g-4">
                @foreach ($randomProducts as $randomProduct)
                    <div class="product-all col-6 col-md-4 col-lg-2 mb-4" style="height: 350px;">
                        <a style="text-decoration: none; height: 100%;" href="{{ url('/product/' . $randomProduct->id) }}">
                            <div class="thumb txt-primary" style="height: 100%; display: flex; flex-direction: column;">
                                <div class="thumb-img" style="flex: 1;">
                                    <img src="{{ asset('uploads/' . $randomProduct->product_img) }}" alt="">
                                </div>
                                <div class="thumb-body">
                                    <h5 class="thumb-title">
                                        @if (!empty($randomProduct->product_name_th))
                                            {{ $randomProduct->product_name_th }}
                                        @else
                                            {{ $randomProduct->product_name }}
                                        @endif
                                    </h5>
                                    <p class="thumb-des">ร้าน {{ $randomProduct->shop }},
                                        {{ $randomProduct->cat_name ?? 'N/A' }}</p>
                                    <div class="thumb-sub-des">
                                        @if ($randomProduct->cat_name == 'Accessory')
                                            <!-- Check if the product belongs to the "Accessory" category -->
                                            {{ $randomProduct->product_price . ' ฿' }}<span> / 1pcs</span>
                                        @else
                                            {{ $randomProduct->product_price . ' ฿' }}<span> / 100g</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mt-2 w-100 btn btn-prm" style="flex-shrink: 0;">เลือกสินค้า</div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div> --}}
            <div class="container position-relative">
                <div class="swiper-container" style="width: 100%; height: 25vw; overflow: hidden; margin: 30px 0px;">
                    <div class="swiper-wrapper">
                        @foreach ($randomProducts as $randomProduct)
                            <div class="swiper-slide">
                                <a style="text-decoration: none; height: 100%;"
                                    href="{{ url('/product/' . $randomProduct->id) }}">
                                    <div class="thumb txt-primary"
                                        style="height: 100%; display: flex; flex-direction: column;">
                                        <div class="thumb-img" style="flex: 1; ">
                                            <img style="max-height: 15vw;"
                                                src="{{ asset('uploads/' . $randomProduct->product_img) }}" alt="">
                                        </div>
                                        <div class="thumb-body">
                                            <h5 class="thumb-title">
                                                @if (!empty($randomProduct->product_name_th))
                                                    {{ $randomProduct->product_name_th }}
                                                @else
                                                    {{ $randomProduct->product_name }}
                                                @endif
                                            </h5>
                                            <p class="thumb-des">ร้าน {{ $randomProduct->shop }},
                                                {{ $randomProduct->cat_name ?? 'N/A' }}</p>
                                            <div class="thumb-sub-des">
                                                @if ($randomProduct->cat_name == 'Accessory')
                                                    <!-- Check if the product belongs to the "Accessory" category -->
                                                    {{ $randomProduct->product_price . ' ฿' }}<span> / 1pcs</span>
                                                @else
                                                    {{ $randomProduct->product_price . ' ฿' }}<span> / 100g</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="mt-2 w-100 btn btn-prm" style="flex-shrink: 0;">เลือกสินค้ารีฟิล</div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <!-- Add Pagination -->
                    {{-- <div class="swiper-pagination"></div> --}}
                    <div class="randProduct-navigate">
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </div>
        </randomProduct-slide>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
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

                if (radioButton.id === 'option5') {
                    priceElement.textContent = '{{ $total_price }} ฿';
                    priceElement2.value = '{{ $total_price }}';
                } else if (radioButton.id === 'option6') {
                    priceElement.textContent = '{{ $total_price * 3 }} ฿';
                    priceElement2.value = '{{ $total_price * 3 }}';
                } else if (radioButton.id === 'option7') {
                    priceElement.textContent = '{{ $total_price * 5 }} ฿';
                    priceElement2.value = '{{ $total_price * 5 }}';
                } else if (radioButton.id === 'option8') {
                    priceElement.textContent = '{{ $total_price * 10 }} ฿';
                    priceElement2.value = '{{ $total_price * 10 }}';
                }
            });
        });
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: '1.6',
            spaceBetween: 10,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                768: {
                    slidesPerView: 3.6, // Display 3 slides at a time for screens >= 768px
                    spaceBetween: 20
                },
                1024: {
                    slidesPerView: 4.6, // Display 4 slides at a time for screens >= 1024px
                    spaceBetween: 30
                },
                1119: {
                    spaceBetween: 25,
                    slidesPerView: 5.6,
                    simulateTouch: true,
                },
            },
        });
        document.querySelector('.custom-prev-button').addEventListener('click', function() {
            mySwiper.slidePrev();
        });

        document.querySelector('.custom-next-button').addEventListener('click', function() {
            mySwiper.slideNext();
        });
    });
</script>
