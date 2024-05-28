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
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            @if (session('success'))
            var successToastEl = document.querySelector('#successToast');
            var successToast = new bootstrap.Toast(successToastEl);

            // Set the success message
            successToastEl.querySelector('.toast-body').textContent = '{{ session('success') }}';

            // Show the toast
            successToast.show();
            @endif

            @if ($errors->any())
            var errorToastEl = document.querySelector('#errorToast');
            var errorToast = new bootstrap.Toast(errorToastEl);

            // Set the error message
            errorToastEl.querySelector('.toast-body').textContent = '{{ $errors->first() }}';

            // Show the toast
            errorToast.show();
            @endif
        });
    </script>

    <div id="successToast" class="toast" style="position: fixed; top: 60px; right: 20px; z-index: 9999;">
        <div class="toast-header">
            <strong class="me-auto mdi mdi-check-circle text-success me-2">Notification</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{ session('success') }}
        </div>
    </div>

    <div id="errorToast" class="toast" style="position: fixed; top: 120px; right: 20px; z-index: 9999;">
        <div class="toast-header">
            <strong class="me-auto mdi mdi-alert-circle text-danger me-2">Error</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{ $errors->first() }}
        </div>
    </div>

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


