@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
    <script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
    <script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')

<style>
    .rounded-circle {
        border-radius: 50%;
    }
</style>

    <div class="row gy-4">
        @foreach($produk as $product)
            <div class="col-md-12 col-lg-4">
                <div class="card h-100 d-flex flex-column">
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title mb-1">{{ $product->name }}</h4>
                        <p class="flex-grow-1">{{ $product->desc }}</p>
                        <h4 class="text-primary mb-1">Rp.{{ number_format($product->price, 2) }}</h4>
                        <p class="mb-2 pb-1"></p>
                        <form action="{{ route('dashboard.buy') }}" method="POST">
                            @csrf
                            <input type="hidden" name="produk_id" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-sm btn-primary mt-auto">Buy</button>
                        </form>
                    </div>
                    <img src="{{asset('assets/img/icons/misc/triangle-light.png')}}"
                         class="scaleX-n1-rtl position-absolute bottom-0 end-0" width="166" alt="triangle background">
                    <img src="{{ $product->image }}"
                         class=" rounded-circle scaleX-n1-rtl position-absolute bottom-0 end-0 me-4 mb-5 pb-2" width="83" alt="view sales">
                </div>
            </div>
        @endforeach
    </div>
@endsection


