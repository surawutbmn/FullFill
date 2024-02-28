@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center  mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body card-body-be ">
                                {{-- <pre>
                                    <?php echo $payments; ?>
                                </pre> --}}
                                <table class="table tb-be">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">ผู้สั่งจอง</th>
                                            <th scope="col">สินค้า</th>
                                            <th scope="col">ราคารวม</th>
                                            <th scope="col">จำนวน</th>
                                            <th scope="col">วันที่จองรับของ</th>
                                            <th scope="col">หลักฐการโอน</th>
                                            <th scope="col">การตรวจสอบ</th>
                                            <th scope="col">การจัดการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- <tr>
                                            <th scope="row">1</th>
                                            <td>sarath</td>
                                            <td>Dired strawberry</td>
                                            <td>20 ฿</td>
                                            <td>100 g</td>
                                            <td>2024-01-12 บ่าย</td>
                                            <td><img class="img-thumbnail" src="{{ asset('img/qr-payment.jpg') }}"
                                                    width="70" height="70" alt=""></td>
                                            <td>ตรวจสอบแล้ว <i class="fa-regular fa-circle-check ms-2"></i></td>
                                            <td><button class="btn btn-prm" disabled>อนุมัติการจอง</button></td>
                                        </tr> --}}
                                        @foreach($orders as $key => $order)
                                        <tr>
                                                <th scope="row">{{ $key + 1 }}</th>
                                                {{-- <th scope="row">{{ $order->id }}</th> --}}
                                                {{-- <td><img class="img-thumbnail" src="" width="70" height="70" alt=""></td> --}}
                                                <td>{{ $order->customer_name }}</td>
                                                <td>{{ $order->product_name }}</td>
                                                <td>{{ $order->total_price }} ฿</td>
                                                <td>{{ $order->quantity }} g</td>
                                                <td>{{ $order->booking_date }} <br> {{ $order->booking_time }}</td>
                                                @if ($order->payment)
                                                    <td>
                                                        <a href="#" class="preview-receipt"
                                                            data-image="{{ asset('uploads/' . $order->payment->transfer_receipt_img) }}">
                                                            <img class="img-thumbnail"
                                                                src="{{ asset('uploads/' . $order->payment->transfer_receipt_img) }}"
                                                                width="70" height="70" alt="">
                                                        </a>
                                                        <p>{{$order->payment->payment_time}}</p>
                                                    </td>
                                                    @if ($order->payment->payment_status == 'waiting')
                                                        <td>รอตรวจสอบ <i class="fa-regular fa-hourglass-half ms-2"></i></td>
                                                    @else
                                                        <td>ตรวจสอบแล้ว <i class="fa-regular fa-circle-check ms-2"></i></td>
                                                    @endif
                                                    @if ($order->payment->status == 'pending')
                                                        <td>รอจ่ายเงิน <i class="fa-regular fa-hourglass-half ms-2"></i>
                                                        </td>
                                                    @else
                                                        <td>รอรับของ <i class="fa-regular fa-hourglass-half ms-2"></i></td>
                                                    @endif
                                                @else
                                                    <td>N/A</td>
                                                    <td>N/A</td>
                                                    <td>N/A</td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-kvvOXwb+xO8ZdI3I3VI1N9Z9/0p1FzoS+/hZ5yGPdRg=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        // Handle click event on the receipt image link
        $('.preview-receipt').on('click', function(e) {
            e.preventDefault();

            // Get the image source
            var imageUrl = $(this).data('image');

            // Display SweetAlert2 modal with the image preview
            Swal.fire({
                imageUrl: imageUrl,
                imageWidth: 400, // Customize image width as needed
                imageAlt: 'Receipt Image'
            });
        });
    });
</script>
