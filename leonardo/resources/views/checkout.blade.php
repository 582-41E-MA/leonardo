@extends('master')
@section('title', 'checkout')
@section('content')
<!-- Section-->
<form action="{{ route('checkout' }}">
    @crsf
    <button type="submit">Checkout</button>
</form>

@endsection
