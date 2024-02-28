@extends('layouts.fe')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h2 class="text-center">PromptPay QR Code Generator</h2>
                <form action="{{ route('generate') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="phoneNumber">Phone Number or ID (PromptPay ID): </label>
                        <input type="text" class="form-control" name="phoneNumber" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="amount">Amount: </label>
                        <input type="number" step="0.01" class="form-control" name="amount" required>
                    </div>
                    
                    <button type="submit" class="mt-3 btn btn-prm btn-block">Generate QR Code</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
