@extends('layouts.fe')
@section('title','Fullfill - OrderList')

@section('content')
    <div class="container container-lg" style="margin-top: 80px">
        <div>
            <h2>กรอกข้อมูลผู้จอง</h2>
        </div>
        <div class="card">
            <div class="card-sm-flex justify-content-sm-center">
                <div class="card-body">
                    <form method="get" action="{{ route('fe.success') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">ชื่อผู้จอง</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">อีเมล</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        @if (session()->has('error'))
                            <span class="text-danger mt-2 mb-2">{{ session()->get('error') }}</span>
                        @endif
                        <div class="">
                            <button type="submit" class="btn btn-prm">ดูรายการจอง</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
