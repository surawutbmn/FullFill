@extends('layouts.fe')
@section('title','Fullfill - OrderList')

@section('content')
    <div class="container container-lg" style="margin-top: 80px">
        <div>
            @if (Auth::check())
                <h2>รายการที่คุณ {{ Auth::user()->name }} จองไว้</h2>
            @else
                @if (!empty($name))
                    <h2>รายการที่คุณ {{ $name }} จองไว้</h2>
                @else
                    <h2>รายการที่คุณ ไม่ระบุชื่อ จองไว้</h2>
                @endif
            @endif

        </div>
        {{-- <div class="card">
            <div class="card-sm-flex justify-content-sm-center">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 d-flex align-items-center justify-content-center">
                            <div class="card-body card-body-be ">
                                <table class="table tb-be">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">สินค้า</th>
                                            <th scope="col">ร้าน</th>
                                            <th scope="col">ราคา</th>
                                            <th scope="col">จำนวน</th>
                                            <th scope="col">วันที่จองรับของ</th>
                                            <th scope="col">สถานะการจอง</th>
                                            <th scope="col">วันที่ทำรายการ</th>
                                            <th scope="col">QRcode สำหรับยืนยัน</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $key => $order)
                                            <tr>
                                                <th scope="row">{{ $key + 1 }}</th>
                                                <td>
                                                    <div class="d-flex flex-column">
                                                        {{ $order->product_name }}
                                                        <img class="img-thumbnail" src="{{ asset($order->product_img) }}"
                                                            width="70" height="70" alt=""><br>
                                                    </div>
                                                </td>
                                                <td>{{ $order->shop }}</td>
                                                <td>{{ $order->total_price }} ฿</td>
                                                <td>{{ $order->quantity }} g</td>
                                                <td>{{ $order->booking_date }} <br>
                                                    {{ $order->booking_time }}</td>
                                                @if ($order->payment)
                                                    @if ($order->payment->payment_status == 'waiting')
                                                        <td>รออนุมัติ... <i class="fa-regular fa-hourglass-half ms-2"></i>
                                                        </td>
                                                    @else
                                                        <td>เตรียมของ... <i class="fa-regular fa-hourglass-half ms-2"></i>
                                                        </td>
                                                    @endif
                                                @else
                                                    <td>N/A</td>
                                                @endif
                                                <td>{{ $order->created_at }}</td>
                                                <td>

                                                    <button class="btn btn-prm"
                                                        onclick="showQRPopup('{{ $order->secret_code }}')">แสดง
                                                        QRcode</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body card-body-be table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">สินค้า</th>
                                    <th scope="col">ร้าน</th>
                                    <th scope="col">ราคา</th>
                                    <th scope="col">จำนวน</th>
                                    <th scope="col">วันที่จองรับของ</th>
                                    <th scope="col">สถานะการจอง</th>
                                    <th scope="col">วันที่ทำรายการ</th>
                                    <th scope="col">QRcode สำหรับยืนยัน</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $key => $order)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        {{-- <th scope="row">{{ $order->id }}</th> --}}
                                        <td>
                                            <div class="d-flex flex-column">
                                                {{ $order->product_name }}
                                                <img class="img-thumbnail" src="{{ asset($order->product_img) }}"
                                                    width="70" height="70" alt=""><br>
                                            </div>
                                        </td>
                                        <td>{{ $order->shop }}</td>
                                        <td>{{ $order->total_price }} ฿</td>
                                        <td>{{ $order->quantity }} g</td>
                                        <td>{{ $order->booking_date }} <br>
                                            {{ $order->booking_time }}</td>
                                        @if ($order->payment)
                                            @if ($order->payment->payment_status == 'waiting')
                                                <td>รออนุมัติ... <i class="fa-regular fa-hourglass-half ms-2"></i>
                                                </td>
                                            @else
                                                <td>เตรียมของ... <i class="fa-regular fa-hourglass-half ms-2"></i>
                                                </td>
                                            @endif
                                        @else
                                            <td>N/A</td>
                                        @endif
                                        <td>{{ $order->created_at }}</td>
                                        <td>

                                            <button class="btn btn-prm"
                                                onclick="showQRPopup('{{ $order->secret_code }}')">แสดง
                                                QRcode</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>

    </div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

<script>
    function showQRPopup(orderNumber) {
        // Create a container for the QR code
        var container = document.createElement("div");
        container.id = "qrcode-container";

        // Show SweetAlert with a loading message
        Swal.fire({
            title: 'QR Code สำหรับรับของ',
            html: `สินค้า: <b>{{ $order->product_name }} {{ $order->quantity }} g</b></br>เลขรายการ: <b>{{ $order->order_number }}</b></br>
            โค้ดรับของ: <b>{{ $order->secret_code }}</b></br>ชื่อลูกค้า: <b>{{ $name }}</b>`,
            allowOutsideClick: true,
            confirmButtonColor: 'rgba(62, 35, 5, 1)',
            confirmButtonText: 'ตกลง',
            onBeforeOpen: () => {
                // Append the container to SweetAlert content
                Swal.getContent().appendChild(container);
            },
            didRender: () => {
                // Generate the QR code after SweetAlert is rendered
                var qrcode = new QRCode(container, {
                    text: orderNumber,
                    width: 128,
                    height: 128
                });
                var imgElement = container.getElementsByTagName("img")[0];
                if (imgElement) {
                    imgElement.style.display = "block";
                    imgElement.style.margin = "1rem auto";
                }
            }
        }).then(() => {
            // Clear loading message after QR code is generated
            Swal.update({
                title: 'QR Code รับของ'
            });
        });
    }
</script>
