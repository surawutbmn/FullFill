@extends('layouts.fe')
@section('title','Fullfill - Product')

@section('content')
    <div class="container" style="margin-top: 5rem;">
        @if (session()->get('success'))
            <div class="mt-4 alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="row mt-4 justify-content-center">
            <div class="txt-head col-12 justify-content-center d-flex">
                <h3>สินค้าที่เคยซื้อ</h3>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-3 col-md-2 d-flex justify-content-center">
                    <div class="rec-cat"></div>
                </div>
                <div class="col-3 col-md-2 d-flex justify-content-center">
                    <div class="rec-cat1"></div>
                </div>
                <div class="col-3 col-md-2 d-flex justify-content-center">
                    <div class="rec-cat2"></div>
                </div>
                <div class="col-3 col-md-2 d-flex justify-content-center">
                    <div class="rec-cat3"></div>
                </div>
                <div class="col-3 col-md-2 mt-3 mt-md-0 d-flex justify-content-center">
                    <div class="rec-cat4"></div>
                </div>
                <div class="col-3 col-md-2 mt-3 mt-md-0 d-flex justify-content-center">
                    <div class="rec-cat5"></div>
                </div>
            </div>
            <div class="col-12 mt-4 d-flex ">
                <div class="col-12">
                    <form action="{{ route('fe.product') }}" method="get">
                        <label>Search</label>
                        <div class="input-group">
                            <input placeholder="ค้นหา..." type="text" class="form-control" name="search"
                                value="{{ Request::get('search') }}">
                            <button class="btn btn-prm"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div>
                {{-- <div class="col-3 ms-auto">
                    <form id="sortForm" action="{{ route('fe.product') }}" method="get">
                        <label for="sort">Sort Category:</label>
                        <div class="input-group">
                            <select class="form-select form-bg" name="sort" id="sortSelect">
                                <option value="All"{{ Request::get('sort') === 'All' ? ' selected' : '' }}>All</option>
                                <option value="Food"{{ Request::get('sort') === 'Food' ? ' selected' : '' }}>Food</option>
                                <option value="Detergent"{{ Request::get('sort') === 'Detergent' ? ' selected' : '' }}>
                                    Detergent</option>
                            </select>
                        </div>
                    </form>
                </div> --}}
            </div>

            @if (!empty($products))
                <?php
                $catNameLookup = [];
                foreach ($result as $r) {
                    $catNameLookup[$r->id] = $r->cat_name;
                }
                ?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="sec-product-tab nav nav-tabs" id="categoryTabs" role="tablist">
                                <!-- Manually specify categories here -->
                                <li class="nav-item">
                                    <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all"
                                        role="tab" aria-controls="all" aria-selected="true"><span>ทั้งหมด </span><span class="product-count">(0)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="food-tab" data-toggle="tab" href="#food" role="tab"
                                        aria-controls="food" aria-selected="false"><span>อาหาร </span><span class="product-count"> (0)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="snack-tab" data-toggle="tab" href="#snack" role="tab"
                                        aria-controls="snack" aria-selected="false"><span>ของทานเล่น </span><span class="product-count"> (0)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="body-tab" data-toggle="tab" href="#body" role="tab"
                                        aria-controls="body" aria-selected="false"><span>ใช้กับร่างกาย </span><span class="product-count"> (0)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="hand-tab" data-toggle="tab" href="#hand" role="tab"
                                        aria-controls="hand" aria-selected="false"><span>ใช้กับมือ </span><span class="product-count"> (0)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="hair-tab" data-toggle="tab" href="#hair" role="tab"
                                        aria-controls="hair" aria-selected="false"><span>ใช้กับศรีษะ </span><span class="product-count"> (0)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="house-tab" data-toggle="tab" href="#house" role="tab"
                                        aria-controls="house" aria-selected="false"><span>ใช้ในบ้าน </span><span class="product-count"> (0)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="accesory-tab" data-toggle="tab" href="#accesory"
                                        role="tab" aria-controls="accesory"
                                        aria-selected="false"><span>ของใช้อื่นๆ </span><span class="product-count"> (0)</span></a>
                                </li>
                                <!-- Add more categories as needed -->
                            </ul>
                            <div class="tab-content" id="categoryTabsContent">
                                <!-- Content for each category -->
                                <div class="tab-pane fade show active" id="all" role="tabpanel"
                                    aria-labelledby="all-tab">
                                    <div class="row mt-3">
                                        @foreach ($products as $index => $product)
                                            <!-- Display food products -->
                                            <div class="product-all col-6 col-md-4 col-lg-2 mb-4" style="height: 350px;">
                                                <a style="text-decoration: none; height: 100%;"
                                                    href="{{ url('/product/' . $product->id) }}">
                                                    <div class="thumb txt-primary"
                                                        style="height: 100%; display: flex; flex-direction: column;">
                                                        <div class="thumb-img" style="flex: 1;">
                                                            <img src="{{ asset('uploads/' . $product->product_img) }}"
                                                                alt="" style="max-height: 100%; max-width: 100%;">
                                                        </div>
                                                        <div class="thumb-body">
                                                            <h5 class="thumb-title"
                                                                style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                                @if (!empty($product->product_name_th))
                                                                    {{ $product->product_name_th }}
                                                                @else
                                                                    {{ $product->product_name }}
                                                                @endif
                                                            </h5>
                                                            <p class="thumb-des"
                                                                style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                                {{ $product->shop }},
                                                                {{ $catNameLookup[$product->id] ?? 'N/A' }}
                                                            </p>
                                                            <div class="thumb-sub-des">
                                                                @if ($product->product_category == 401)
                                                                    <!-- Check if the product belongs to the "Accessory" category -->
                                                                    {{ $product->product_price . ' ฿' }}<span> / 1pcs</span>
                                                                @else
                                                                    {{ $product->product_price . ' ฿' }}<span> /
                                                                        100g</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="mt-2 w-100 btn btn-prm" style="flex-shrink: 0;">
                                                            เลือกสินค้า</div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade show" id="food" role="tabpanel"
                                    aria-labelledby="food-tab">
                                    <div class="row mt-3">
                                        @foreach ($products as $product)
                                            @if ($product->product_category == '101')
                                                <!-- Display food products -->
                                                <div class="product-all col-6 col-md-4 col-lg-2 mb-4"
                                                    style="height: 350px;">
                                                    <a style="text-decoration: none; height: 100%;"
                                                        href="{{ url('/product/' . $product->id) }}">
                                                        <div class="thumb txt-primary"
                                                            style="height: 100%; display: flex; flex-direction: column;">
                                                            <div class="thumb-img" style="flex: 1;">
                                                                <img src="{{ asset('uploads/' . $product->product_img) }}"
                                                                    alt=""
                                                                    style="max-height: 100%; max-width: 100%;">
                                                            </div>
                                                            <div class="thumb-body">
                                                                <h5 class="thumb-title"
                                                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                                    @if (!empty($product->product_name_th))
                                                                        {{ $product->product_name_th }}
                                                                    @else
                                                                        {{ $product->product_name }}
                                                                    @endif
                                                                </h5>
                                                                <p class="thumb-des"
                                                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                                    {{ $product->shop }},
                                                                    {{ $catNameLookup[$product->id] ?? 'N/A' }}
                                                                </p>
                                                                <div class="thumb-sub-des">
                                                                    {{ $product->product_price . ' ฿' }}<span> /
                                                                        100g</span>
                                                                </div>
                                                            </div>
                                                            <div class="mt-2 w-100 btn btn-prm" style="flex-shrink: 0;">
                                                                เลือกสินค้า</div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade show" id="snack" role="tabpanel"
                                    aria-labelledby="snack-tab">
                                    <div class="row mt-3">
                                        @foreach ($products as $product)
                                            @if ($product->product_category == '102')
                                                <!-- Display detergent products -->
                                                <div class="product-all col-6 col-md-4 col-lg-2 mb-4"
                                                    style="height: 350px;">
                                                    <a style="text-decoration: none; height: 100%;"
                                                        href="{{ url('/product/' . $product->id) }}">
                                                        <div class="thumb txt-primary"
                                                            style="height: 100%; display: flex; flex-direction: column;">
                                                            <div class="thumb-img" style="flex: 1;">
                                                                <img src="{{ asset('uploads/' . $product->product_img) }}"
                                                                    alt=""
                                                                    style="max-height: 100%; max-width: 100%;">
                                                            </div>
                                                            <div class="thumb-body">
                                                                <h5 class="thumb-title"
                                                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                                    @if (!empty($product->product_name_th))
                                                                        {{ $product->product_name_th }}
                                                                    @else
                                                                        {{ $product->product_name }}
                                                                    @endif
                                                                </h5>
                                                                <p class="thumb-des"
                                                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                                    {{ $product->shop }},
                                                                    {{ $catNameLookup[$product->id] ?? 'N/A' }}
                                                                </p>
                                                                <div class="thumb-sub-des">
                                                                    {{ $product->product_price . ' ฿' }}<span> /
                                                                        100g</span>
                                                                </div>
                                                            </div>
                                                            <div class="mt-2 w-100 btn btn-prm" style="flex-shrink: 0;">
                                                                เลือกสินค้า</div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade show" id="body" role="tabpanel"
                                    aria-labelledby="body-tab">
                                    <div class="row mt-3">
                                        @foreach ($products as $product)
                                            @if ($product->product_category == '201')
                                                <!-- Display detergent products -->
                                                <div class="product-all col-6 col-md-4 col-lg-2 mb-4"
                                                    style="height: 350px;">
                                                    <a style="text-decoration: none; height: 100%;"
                                                        href="{{ url('/product/' . $product->id) }}">
                                                        <div class="thumb txt-primary"
                                                            style="height: 100%; display: flex; flex-direction: column;">
                                                            <div class="thumb-img" style="flex: 1;">
                                                                <img src="{{ asset('uploads/' . $product->product_img) }}"
                                                                    alt=""
                                                                    style="max-height: 100%; max-width: 100%;">
                                                            </div>
                                                            <div class="thumb-body">
                                                                <h5 class="thumb-title"
                                                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                                    @if (!empty($product->product_name_th))
                                                                        {{ $product->product_name_th }}
                                                                    @else
                                                                        {{ $product->product_name }}
                                                                    @endif
                                                                </h5>
                                                                <p class="thumb-des"
                                                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                                    {{ $product->shop }},
                                                                    {{ $catNameLookup[$product->id] ?? 'N/A' }}
                                                                </p>
                                                                <div class="thumb-sub-des">
                                                                    {{ $product->product_price . ' ฿' }}<span> /
                                                                        100g</span>
                                                                </div>
                                                            </div>
                                                            <div class="mt-2 w-100 btn btn-prm" style="flex-shrink: 0;">
                                                                เลือกสินค้า</div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade show" id="hand" role="tabpanel"
                                    aria-labelledby="hand-tab">
                                    <div class="row mt-3">
                                        @foreach ($products as $product)
                                            @if ($product->product_category == '202')
                                                <!-- Display detergent products -->
                                                <div class="product-all col-6 col-md-4 col-lg-2 mb-4"
                                                    style="height: 350px;">
                                                    <a style="text-decoration: none; height: 100%;"
                                                        href="{{ url('/product/' . $product->id) }}">
                                                        <div class="thumb txt-primary"
                                                            style="height: 100%; display: flex; flex-direction: column;">
                                                            <div class="thumb-img" style="flex: 1;">
                                                                <img src="{{ asset('uploads/' . $product->product_img) }}"
                                                                    alt=""
                                                                    style="max-height: 100%; max-width: 100%;">
                                                            </div>
                                                            <div class="thumb-body">
                                                                <h5 class="thumb-title"
                                                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                                    @if (!empty($product->product_name_th))
                                                                        {{ $product->product_name_th }}
                                                                    @else
                                                                        {{ $product->product_name }}
                                                                    @endif
                                                                </h5>
                                                                <p class="thumb-des"
                                                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                                    {{ $product->shop }},
                                                                    {{ $catNameLookup[$product->id] ?? 'N/A' }}
                                                                </p>
                                                                <div class="thumb-sub-des">
                                                                    {{ $product->product_price . ' ฿' }}<span> /
                                                                        100g</span>
                                                                </div>
                                                            </div>
                                                            <div class="mt-2 w-100 btn btn-prm" style="flex-shrink: 0;">
                                                                เลือกสินค้า</div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade show" id="hair" role="tabpanel"
                                    aria-labelledby="hair-tab">
                                    <div class="row mt-3">
                                        @foreach ($products as $product)
                                            @if ($product->product_category == '203')
                                                <!-- Display detergent products -->
                                                <div class="product-all col-6 col-md-4 col-lg-2 mb-4"
                                                    style="height: 350px;">
                                                    <a style="text-decoration: none; height: 100%;"
                                                        href="{{ url('/product/' . $product->id) }}">
                                                        <div class="thumb txt-primary"
                                                            style="height: 100%; display: flex; flex-direction: column;">
                                                            <div class="thumb-img" style="flex: 1;">
                                                                <img src="{{ asset('uploads/' . $product->product_img) }}"
                                                                    alt=""
                                                                    style="max-height: 100%; max-width: 100%;">
                                                            </div>
                                                            <div class="thumb-body">
                                                                <h5 class="thumb-title"
                                                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                                    @if (!empty($product->product_name_th))
                                                                        {{ $product->product_name_th }}
                                                                    @else
                                                                        {{ $product->product_name }}
                                                                    @endif
                                                                </h5>
                                                                <p class="thumb-des"
                                                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                                    {{ $product->shop }},
                                                                    {{ $catNameLookup[$product->id] ?? 'N/A' }}
                                                                </p>
                                                                <div class="thumb-sub-des">
                                                                    {{ $product->product_price . ' ฿' }}<span> /
                                                                        100g</span>
                                                                </div>
                                                            </div>
                                                            <div class="mt-2 w-100 btn btn-prm" style="flex-shrink: 0;">
                                                                เลือกสินค้า</div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade show" id="house" role="tabpanel"
                                    aria-labelledby="house-tab">
                                    <div class="row mt-3">
                                        @foreach ($products as $product)
                                            @if ($product->product_category == '301')
                                                <!-- Display detergent products -->
                                                <div class="product-all col-6 col-md-4 col-lg-2 mb-4"
                                                    style="height: 350px;">
                                                    <a style="text-decoration: none; height: 100%;"
                                                        href="{{ url('/product/' . $product->id) }}">
                                                        <div class="thumb txt-primary"
                                                            style="height: 100%; display: flex; flex-direction: column;">
                                                            <div class="thumb-img" style="flex: 1;">
                                                                <img src="{{ asset('uploads/' . $product->product_img) }}"
                                                                    alt=""
                                                                    style="max-height: 100%; max-width: 100%;">
                                                            </div>
                                                            <div class="thumb-body">
                                                                <h5 class="thumb-title"
                                                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                                    @if (!empty($product->product_name_th))
                                                                        {{ $product->product_name_th }}
                                                                    @else
                                                                        {{ $product->product_name }}
                                                                    @endif
                                                                </h5>
                                                                <p class="thumb-des"
                                                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                                    {{ $product->shop }},
                                                                    {{ $catNameLookup[$product->id] ?? 'N/A' }}
                                                                </p>
                                                                <div class="thumb-sub-des">
                                                                    {{ $product->product_price . ' ฿' }}<span> /
                                                                        100g</span>
                                                                </div>
                                                            </div>
                                                            <div class="mt-2 w-100 btn btn-prm" style="flex-shrink: 0;">
                                                                เลือกสินค้า</div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade show" id="accesory" role="tabpanel"
                                    aria-labelledby="accesory-tab">
                                    <div class="row mt-3">
                                        @foreach ($products as $product)
                                            @if ($product->product_category == '401')
                                                <!-- Display detergent products -->
                                                <div class="product-all col-6 col-md-4 col-lg-2 mb-4"
                                                    style="height: 350px;">
                                                    <a style="text-decoration: none; height: 100%;"
                                                        href="{{ url('/product/' . $product->id) }}">
                                                        <div class="thumb txt-primary"
                                                            style="height: 100%; display: flex; flex-direction: column;">
                                                            <div class="thumb-img" style="flex: 1;">
                                                                <img src="{{ asset('uploads/' . $product->product_img) }}"
                                                                    alt=""
                                                                    style="max-height: 100%; max-width: 100%;">
                                                            </div>
                                                            <div class="thumb-body">
                                                                <h5 class="thumb-title"
                                                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                                    @if (!empty($product->product_name_th))
                                                                        {{ $product->product_name_th }}
                                                                    @else
                                                                        {{ $product->product_name }}
                                                                    @endif
                                                                </h5>
                                                                <p class="thumb-des"
                                                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                                    {{ $product->shop }},
                                                                    {{ $catNameLookup[$product->id] ?? 'N/A' }}
                                                                </p>
                                                                <div class="thumb-sub-des">
                                                                    {{ $product->product_price . ' ฿' }}<span> / 1
                                                                        pcs</span>
                                                                </div>
                                                            </div>
                                                            <div class="mt-2 w-100 btn btn-prm" style="flex-shrink: 0;">
                                                                เลือกสินค้า</div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <!-- Add more tab panes for other categories -->
                            </div>
                            <div class="d-flex justify-content-center mt-4">
                                {{ $products->links('pagination.custom') }}
                            </div>
                        </div>
                    </div>
                </div>
                {{-- @foreach ($products as $index => $p)
                    <div class="product-all col-6 col-md-4 col-lg-2 mb-4" style="height: 350px;">
                        <a style="text-decoration: none; height: 100%;" href="{{ url('/product/' . $p->id) }}">
                            <div class="thumb txt-primary" style="height: 100%; display: flex; flex-direction: column;">
                                <div class="thumb-img" style="flex: 1;">
                                    <img src="{{ asset('uploads/' . $p->product_img) }}" alt=""
                                        style="max-height: 100%; max-width: 100%;">
                                </div>
                                <div class="thumb-body">
                                    <h5 class="thumb-title"
                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        @if (!empty($p->product_name_th))
                                            {{ $p->product_name_th }}
                                        @else
                                            {{ $p->product_name }}
                                        @endif
                                    </h5>
                                    <p class="thumb-des"
                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        {{ $p->shop }}, {{ $catNameLookup[$p->id] ?? 'N/A' }}
                                    </p>
                                    <div class="thumb-sub-des">{{ $p->product_price . ' ฿' }}<span> / 100g</span></div>
                                </div>
                                <div class="mt-2 w-100 btn btn-prm" style="flex-shrink: 0;">เลือกสินค้า</div>
                            </div>
                        </a>
                    </div>
                @endforeach

                <div class="d-flex justify-content-center mt-4">
                    {{ $products->links('pagination.custom') }}
                </div> --}}
            @else
                <p>No products found.</p>
            @endif
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    
    $(document).ready(function() {
    // Initially hide all tab content except the first one
    $('#categoryTabsContent').children('.tab-pane:not(:first)').hide();

    // Function to update product counts in tabs
    function updateProductCounts() {
        $('#categoryTabs a').each(function() {
            var target = $(this).attr('href');
            var productCount = $(target).find('.product-all').length;
            $(this).find('span.product-count').text('(' + productCount + ')');
            console.log(productCount);
        });
    }

    // Calculate and update product counts on page load
    updateProductCounts();

    // Handle click event on tab links
    $('#categoryTabs a').on('click', function(event) {
        event.preventDefault();

        // Hide all tab content
        $('#categoryTabsContent').children('.tab-pane').hide();

        // Show the corresponding tab content based on href attribute
        var target = $(this).attr('href');
        $(target).show();

        // Update active class for tab links
        $('#categoryTabs a').removeClass('active');
        $(this).addClass('active');
    });

    // You may want to update product counts dynamically if products change
    // For example, after an AJAX call to fetch new products
    // Call updateProductCounts() after the products are updated.
});

</script>
