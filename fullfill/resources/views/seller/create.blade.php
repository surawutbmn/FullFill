@extends('layouts.be')
@section('title','Fullfill - CreateShop')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center mt-4">
            <div class="col-md-12">
                <div class="card w-70">
                    <div class="create-shop card-body">
                        <h5 class="card-title">Create your shop</h5>
                        <form action="{{ route('shops.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Shop Name</label>
                                <input type="text" class="form-control" name="shop_name" value="zeromomentrefillery">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Shop type</label>
                                <div class="form-group">
                                    <select class="form-control form-control-lg" name="shop_type">
                                        <option value="refill">ร้านรีฟิล</option>
                                        <option value="cafe">ร้านรีฟิล & คาเฟ่</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">เบอร์โทร หรือ เลขบัตรประชาชน (สำหรับ  Qr promptpay)</label>
                                <input type="text" class="form-control" name="promptpay" value="0809439669">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">ชื่อบัญชี</label>
                                <input type="text" class="form-control" name="acount_name" value="นายสุรวุธ บินมามุด">
                            </div>
                            {{-- <div class="mb-3">
                                <label class="form-label">เบอร์โทร หรือ เลขบัตรประชาชน (สำหรับ  Qr promptpay)</label>
                                <input type="text" name="promptpay" value="0809439669">
                            </div> --}}
                            <div class="mb-3">
                                <label class="form-label">วันที่ให้บริการ <small
                                        style="color: #808080">*เลือกวันที่ให้บริการ</small></label>
                                <div class="justify-content-center mt-3">
                                    @foreach (['วันจันทร์', 'วันอังคาร', 'วันพุธ', 'วันพฤหัสบดี', 'วันศุกร์', 'วันเสาร์', 'วันอาทิตย์'] as $day)
                                        <div class="d-flex align-items-center mb-2">
                                            <label class="d-flex align-items-center ms-2" style="width: 120px" for="{{ strtolower($day) }}">
                                            <input type="checkbox" class="me-2 btn-check day-checkbox plus-minus" name="work_days[]"
                                                value="{{ $day }}" id="{{ strtolower($day) }}" autocomplete="off">
                                                {{ $day }}
                                            </label>
                                            <div class="ms-4">
                                                <input type="time" class="form-control opening-time"
                                                    name="opening_times[{{ strtolower($day) }}]" value="09:00">
                                            </div>
                                            <div class="ms-2">
                                                <input type="time" class="form-control closing-time"
                                                    name="closing_times[{{ strtolower($day) }}]" value="18:00">
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="same_times" name="same_times">
                                        <label class="form-check-label" for="same_times">
                                            ใช้เวลาเดียวกันทั้งหมด<small> (เลือกอีกครั้งหากเพิ่มวัน)</small>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">ที่ตั้งร้าน<small> (เลือกแชร์แผนที่แล้วไปที่ฝังแผนที่)</small></label>
                                <textarea class="form-control" name="location"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.4905917737833!2d100.62319699999999!3d13.7492625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d61929e6ddb95%3A0x4ddc48358056958b!2sZeroMoment%20Refillery!5e0!3m2!1sen!2sth!4v1708120321207!5m2!1sen!2sth" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Shop Logo</label>
                                <div id="imagePreview" class="mt-2"></div>
                                <input type="file" class="form-control larger-input" name="logo" id="logo"
                                    accept="image/*">
                            </div>

                            <div class="justify-content-center d-flex">
                                <button type="submit" class="btn btn-prm-outline me-3">สร้างร้าน</button>
                                <button type="button" onclick="window.history.back();"
                                    class="btn btn-outline-danger">ยกเลิก</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
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

        // Function to preview the image
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#imagePreview').html('<img src="' + e.target.result +
                        '" class="img-fluid" style="max-width: 100px;">');
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        document.addEventListener('DOMContentLoaded', function() {
            const radioButtons = document.querySelectorAll('.btn-check');
            radioButtons.forEach(function(radioButton) {
                radioButton.addEventListener('change', function() {
                    // Hide all checkbox icons
                    document.querySelectorAll('.checkbox-icon').forEach(function(icon) {
                        icon.classList.add('d-none');
                    });

                    // Display checked icon for the selected radio button
                    const checkedIcon = radioButton.nextElementSibling.querySelector(
                        '.checkbox-icon');
                    checkedIcon.classList.remove('d-none');
                });
            });

            // Display default checked icon on page load
            const defaultCheckedRadio = document.querySelector('.btn-check:checked');
            const defaultCheckedIcon = defaultCheckedRadio.nextElementSibling.querySelector('.checkbox-icon');
            defaultCheckedIcon.classList.remove('d-none');
        });
    </script>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // When any time input changes
        $('.opening-time, .closing-time').change(function() {
            // Uncheck "Use same opening and closing times for checked days" checkbox
            $('#same_times').prop('checked', false);
        });

        // When a day checkbox is clicked
        $('.day-checkbox').change(function() {
            // Uncheck "Use same opening and closing times for checked days" checkbox
            $('#same_times').prop('checked', false);
        });

        // When "Use same opening and closing times for checked days" checkbox changes
        $('#same_times').change(function() {
            // If checked, apply the same time to checked days
            if ($(this).is(':checked')) {
                var openingTime = $('.opening-time').first().val();
                var closingTime = $('.closing-time').first().val();
                
                $('.day-checkbox:checked').each(function() {
                    var day = $(this).val();
                    $('input[name="opening_times[' + day + ']"]').val(openingTime);
                    $('input[name="closing_times[' + day + ']"]').val(closingTime);
                });
            }
        });
    });
</script>
   {{-- <script>
        window.onload = function() {
            // Get the input element
            var inputElement = document.getElementsByName('promptpay')[0];
            
            // Add event listener for input
            inputElement.addEventListener('input', function(event) {
                var inputValue = event.target.value.trim();
                
                // Check if it's a phone number
                if (isPhoneNumber(inputValue)) {
                    var formattedPhoneNumber = formatPhoneNumber(inputValue);
                    inputElement.value = formattedPhoneNumber;
                }
                // Check if it's an ID
                else if (isID(inputValue)) {
                    var formattedID = formatID(inputValue);
                    inputElement.value = formattedID;
                }
            });
        }

        // Function to check if it's a phone number
        function isPhoneNumber(value) {
            // Regular expression to match a phone number in the format XXXXXXXXXX
            var phoneRegex = /^\d{10}$/;
            return phoneRegex.test(value);
        }

        // Function to format the phone number
        function formatPhoneNumber(phoneNumber) {
            // Assuming phone number is in the format: XXXXXXXXXX
            return phoneNumber.replace(/(\d{3})(\d{3})(\d{4})/, '$1-$2-$3');
        }

        // Function to check if it's an ID
        function isID(value) {
            // Regular expression to match the ID format 1-1020-03313-65-3
            var idRegex = /^\d-\d{4}-\d{5}-\d{2}-\d$/;
            return idRegex.test(value);
        }

        // Function to format the ID
        function formatID(id) {
            // Format the ID as per the provided format: 1-1020-03313-65-3
            return id.replace(/(\d)(\d{4})(\d{5})(\d{2})(\d)/, '$1-$2-$3-$4-$5');
        }
    </script> --}}