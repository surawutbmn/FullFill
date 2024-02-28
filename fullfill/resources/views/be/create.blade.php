@extends('layouts.be')
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Create new product</h5>
                        <form action="{{ route('be.home.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">หมวดหมู่สินค้า</label>
                                <div class="form-group">
                                    <select class="form-control form-control-lg" name="product_category"
                                        value="{{ old('product_category') }}">
                                        <option value="101">Food</option>
                                        <option value="102">Snack</option>
                                        <option value="201">Body</option>
                                        <option value="202">Hand</option>
                                        <option value="203">Hair</option>
                                        <option value="301">House</option>
                                    </select>
                                </div>
                                {{--                                <input type="text" class="form-control" > --}}
                                @if ($errors->has('product_category'))
                                    <span class="text-danger">{{ $errors->first('product_category') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label class="form-label">ชื่อภาษาอังกฤษ</label>
                                <input type="text" class="form-control" name="product_name"
                                    value="{{ old('product_name') }}">
                                @if ($errors->has('product_name'))
                                    <span class="text-danger">{{ $errors->first('product_name') }}</span>
                                @endif
                                <label class="form-label mt-2">ชื่อภาษาไทย</label>
                                <input type="text" class="form-control" name="product_name_th"
                                    value="{{ old('product_name_th') }}">
                                @if ($errors->has('product_name_th'))
                                    <span class="text-danger">{{ $errors->first('product_name_th') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label class="form-label">รายละเอียด</label>
                                <textarea class="form-control" name="product_detail">{{ old('product_detail') }}</textarea>
                                @if ($errors->has('product_detail'))
                                    <span class="text-danger">{{ $errors->first('product_detail') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label class="form-label">ราคาสินค้า (per 100g or 1 pieces)</label>
                                <input type="text" class="form-control" name="product_price"
                                    value="{{ old('product_price') }}">
                                @if ($errors->has('product_price'))
                                    <span class="text-danger">{{ $errors->first('product_price') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label>ภาพสินค้า</label>
                                <div id="imagePreview" class="mt-2"></div>
                                <input type="hidden" id="base64Image" name="product_img">
                                <input type="file" class="form-control larger-input" name="product_img" id="product_img"
                                    accept="image/*">
                                @if ($errors->has('product_img'))
                                    <span class="text-danger">
                                        {{ $errors->first('product_img') }}
                                    </span>
                                @endif
                            </div>

                            <div id="cropModal" class="modal fade" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <img id="cropperImage" src="" alt="Crop Image">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                               id="cancelCropButton">ยกเลิก</button>
                                            <button type="button" class="btn btn-prm" id="cropButton">ตัดภาพ</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="croppedResult"></div>
                            <input type="hidden" name="cropped_image_data" id="croppedImageData">
                            <input type="hidden" name="shop" id="shop" value="Refill">
                            <div class="justify-content-center d-flex">
                                <button type="submit" class="btn btn-prm-outline me-3">เพิ่มสินค้า</button>
                                <button type="button" onclick="window.location.href='{{ route('be.home.index') }}'"
                                    class="btn btn-outline-danger">ยกเลิก</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
<script>
    $(document).ready(function() {
        let cropper;

        // Function to initialize Cropper
        function initCropper(imageSource) {
            if (cropper) {
                cropper.replace(imageSource); // Replace the image source
            } else {
                cropper = new Cropper(document.getElementById('cropperImage'), {
                    aspectRatio: 1, // You can set aspect ratio as per your requirements
                    viewMode: 1,
                });
            }
        }

        // When the file input changes
        $('#product_img').change(function(event) {
            const input = event.target;
            const reader = new FileReader();
            reader.onload = function(e) {
                const tempImage = new Image();
                tempImage.src = e.target.result;
                tempImage.onload = function() {
                    const MAX_WIDTH = 800; // Adjust the maximum width as needed
                    const MAX_HEIGHT = 600; // Adjust the maximum height as needed
                    let canvas = document.createElement('canvas');
                    let ctx = canvas.getContext('2d');
                    let width = tempImage.width;
                    let height = tempImage.height;
                    if (width > height) {
                        if (width > MAX_WIDTH) {
                            height *= MAX_WIDTH / width;
                            width = MAX_WIDTH;
                        }
                    } else {
                        if (height > MAX_HEIGHT) {
                            width *= MAX_HEIGHT / height;
                            height = MAX_HEIGHT;
                        }
                    }
                    canvas.width = width;
                    canvas.height = height;
                    ctx.drawImage(tempImage, 0, 0, width, height);
                    $('#cropperImage').attr('src', canvas.toDataURL(
                    'image/jpeg')); // Set the resized image as the source
                    $('#cropModal').modal('show');

                    // Initialize Cropper on modal shown
                    $('#cropModal').on('shown.bs.modal', function() {
                        initCropper($('#cropperImage').attr(
                        'src')); // Initialize Cropper
                    });
                };
            };
            reader.readAsDataURL(input.files[0]);
        });
         $('#cancelCropButton').click(function() {
            // Hide the modal when the cancel button is clicked
            $('#cropModal').modal('hide');
        });
        // Crop button click event
        $('#cropButton').click(function() {
            const canvas = cropper.getCroppedCanvas({
                width: 160,
                height: 160,
            });

            $('#croppedResult').html(canvas); // Show the cropped canvas directly
            // Convert cropped canvas to a data URL (base64 encoded)
            const croppedImageData = canvas.toDataURL('image/jpeg');
            // Append the cropped image data to a hidden input field in the form
            $('#croppedImageData').val(croppedImageData);

            // Hide the modal or perform any other necessary actions
            $('#cropModal').modal('hide');
        });
    });
</script>
