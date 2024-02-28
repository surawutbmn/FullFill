@extends('layouts.fe')
@section('title','Fullfill - Home')

@section('content')
    <banner-comp></banner-comp>
    <pd-home></pd-home>
    <info-home></info-home>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#sortSelect').change(function() {
            $('#sortForm').submit();
        });
    });
</script>
