@extends('layouts.be')
@section('title','Fullfill - Product')
@section('content')
    <div class="container">
        <script>
            @if (session()->get('failed'))
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '{{ session()->get('failed') }}',
                });
            @endif
            @if (session()->get('success'))
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: 'success',
                    title: '{{ session()->get('success') }}'
                });
            @endif
            @if (session()->get('update'))
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: 'success',
                    title: '{{ session()->get('update') }}'
                });
            @endif
            @if (session()->get('login'))
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: 'success',
                    title: '{{ session()->get('login') }}'
                });
            @endif
        </script>
        {{-- @if (session()->get('failed'))
            <div class="mt-4 alert alert-danger">
                {{session()->get('failed')}}
            </div>
        @endif
        @if (session()->get('success'))
            <div class="mt-4 alert alert-success">
                {{session()->get('success')}}
            </div>
        @endif
        @if (session()->get('update'))
            <div class="mt-4 alert alert-success">
                {{session()->get('update')}}
            </div>
        @endif
        @if (session()->get('login'))
            <div class="mt-4 alert alert-success">
                {{session()->get('login')}}
            </div>
        @endif --}}
        <div class="row justify-content-center  mt-4">
            <div class="col-md-12">
                <div class="ms-auto col d-flex">
                    <h2 class="me-auto">รายการสินค้าทั้งหมด</h2>
                    <a class="mb-3 btn btn-prm" href="{{ route('be.home.create') }}">Add Product</a>
                </div>
                <div class="card">
                    <div class="card-header card-hbg">
                        <div class="row">
                            <div class="col-10">
                                <form action="{{ route('shops.product') }}" method="get">
                                    <label>Search</label>
                                    <div class="input-group">
                                        <input placeholder="ค้นหา..." type="text" class="form-control" name="search"
                                            value="{{ Request::get('search') }}">
                                        <button class="btn btn-prm"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="col">
                                <form id="sortForm" action="{{ route('shops.product') }}" method="get">
                                    <label>Sort By</label>
                                    <div class="input-group">
                                        <select class="form-select form-bg-be" name="sort" id="sortSelect">
                                            <option value="All"{{ Request::get('sort') === 'All' ? ' selected' : '' }}>
                                                All</option>
                                            <option value="Food"{{ Request::get('sort') === 'Food' ? ' selected' : '' }}>
                                                Food</option>
                                            <option
                                                value="Detergent"{{ Request::get('sort') === 'Detergent' ? ' selected' : '' }}>
                                                Detergent</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body card-body-be ">
                        <table class="table tb-be">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ภาพสินค้า</th>
                                    <th scope="col">หมวดหมู่</th>
                                    <th scope="col">ชื่อภาษาไทย</th>
                                    <th scope="col">ชื่อภาษาอังกฤษ</th>
                                    <th scope="col">รายละเอียด</th>
                                    <th scope="col">ราคา</th>
                                    <th scope="col">การจัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!$products->isEmpty())
                                    @php
                                        $catNameLookup = [];
                                        foreach ($product_cat as $r) {
                                            $catNameLookup[$r->id] = $r->cat_name;
                                        }
                                    @endphp
                                    @foreach ($products as $index => $product)
                                        <tr>
                                            <th scope="row">{{ $loop->index + 1 }}</th>
                                            <td><img class="img-thumbnail"
                                                    src="{{ asset('uploads/' . $product->product_img) }}" width="100"
                                                    height="100" alt="">
                                            </td>
                                            <td>
                                                {{ $catNameLookup[$product->id] ?? 'N/A' }}
                                                {{--                                            @foreach ($product_cat as $item) --}}
                                                {{--                                                @if ($item->product_category == $product->product_category) --}}
                                                {{--                                                    {{ $item->cat_name }} --}}
                                                {{--                                                @endif --}}
                                                {{--                                            @endforeach --}}
                                            </td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->product_name_th }}</td>
                                            <td>
                                                <p style="max-height: 150px; overflow-y: auto;">
                                                    {{ $product->product_detail }}</p>
                                            </td>
                                            <td>{{ $product->product_price }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <form action="{{ route('be.home.edit', ['id' => $product->id]) }}">
                                                        <button type="submit"
                                                            class="me-2 btn btn-outline-primary">Edit</button>
                                                    </form>

                                                    <form id="deleteForm{{ $product->id }}" class="ms-2"
                                                        action="{{ route('be.home.delete', ['id' => $product->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" onclick="confirmDelete({{ $product->id }})"
                                                            class="btn btn-outline-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        {!! $products->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    document.getElementById('sortSelect').addEventListener('change', function() {
        document.getElementById('sortForm').submit();
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#sortSelect').change(function() {
            $('#sortForm').submit();
        });
    });
</script>
<script>
    function confirmDelete(productId) {
        Swal.fire({
            title: 'ต้องการลบรายการ?',
            text: "รายการจะหายไปตลอดการ!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#ff6f6f',
            cancelButtonColor: '#888888',
            confirmButtonText: 'ลบ!',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm' + productId).submit();
            }
        });
    }
</script>
