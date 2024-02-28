@extends('layouts.pre')

@section('content')
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row justify-content-center vh-100">
            <div class="col-md-8">
                <div class="pre-card-rebox">
                    <div class="pre-txt text-center">
                        <img src="{{ asset('/img/logo.png') }}" style="width: 5em" alt="">
                        <h2>สมัครเป็นร้านค้ากับเรา</h2>
                    </div>
                    <div class="card-body login-body card-body-be">
                        <form method="post" action="{{ route('be.register.seller.post') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Username:</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ old('name') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{ old('email') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone_number" class="form-label">Phone Number:</label>
                                <input type="tel" class="form-control" id="phone_number" name="phone_number"
                                    value="{{ old('phone_number') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password:</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-prm w-100">สมัครเป็นร้านค้า</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
