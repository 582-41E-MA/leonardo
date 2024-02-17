@extends('master')
@section('title', 'Shopping Cart')
@section('content')
<!-- Section-->
<form action="{{ route('checkout' }}">
    @crsf
    <button type="submit">Checkout</button>
</form>

@endsection
