@extends('layouts.pre')
@section('content')
    <div class="container">
        <script>
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
        </script>
        {{-- @if(session()->get('success'))
            <div class="mt-4 alert alert-success">
                {{session()->get('success')}}
            </div>
        @endif --}}
        <div class="container-fluid">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-8">
            <div class="pre-card-box">
                <div class="pre-txt text-center">
                    <img src="{{asset('/img/logo.png')}}" style="width: 5em" alt="">
                    <h2>เข้าสู่ระบบ FullFill</h2>
                </div>
                <div class="card-body login-body card-body-be">
                    <form action="{{ route('ff.login.postlogin') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="login" class="form-label">Email or Username</label>
        <input type="text" class="form-control" id="login" name="login">
        @if ($errors->has('login'))
            <span class="text-danger">{{ $errors->first('login') }}</span>
        @endif
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
        @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
    </div>
    @if(session()->has('error'))
        <span class="text-danger mt-2 mb-2">{{ session()->get('error') }}</span>
    @endif
    <div class="justify-content-center d-flex mt-3">
        <button type="submit" style="width: 200px" class="btn btn-prm">เข้าสู่ระบบ</button>
    </div>
</form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>