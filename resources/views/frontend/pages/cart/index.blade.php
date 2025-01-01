@extends('frontend.master')

@section('content')
    @include('frontend.pages.cart.breadcrumb')

    <!-- Placeholder for the cart area -->
    <div id="cart-main-content">
        <!-- The content will be loaded here via AJAX -->
    </div>



    @include('frontend.pages.cart.like-course')
@endsection

@push('scripts')


    <script src="{{asset('customjs/cart/index.js')}}"></script>
@endpush
