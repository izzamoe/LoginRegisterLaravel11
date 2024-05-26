@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Account')

@section('page-script')
    <script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection




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


@section('content')
    <h4 class="">
        <span class="text-muted fw-light">Pengguna /</span> User
    </h4>


    <div id="errorToast" class="toast error-toast" style="position: absolute; top: 60px; right: 20px;">
        <div class="toast-header">
            <strong class="me-auto mdi mdi-alert-circle text-danger me-2">Error</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">

        </div>
    </div>

    <div id="successToast" class="toast" style="position: absolute; top: 60px; right: 20px;">

        <div class="toast-header">
            <strong class="me-auto mdi mdi-check-circle text-success me-2">Notification</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{ session('success') }}
        </div>
    </div>

    <div class="row">

        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-4 gap-2 gap-lg-0">
                <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i
                            class="mdi mdi-account-outline mdi-20px me-1"></i>Account</a></li>
            </ul>
            <div class="card mb-4">
                <h4 class="card-header">Profile Details</h4>
                <!-- Account -->
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="{{asset('assets/img/avatars/1.png')}}" alt="user-avatar"
                             class="d-block w-px-120 h-px-120 rounded" id="uploadedAvatar"/>
                    </div>
                </div>
                <div class="card-body pt-2 mt-1">
                    <form id="formAccountSettings" method="POST" action="{{route("dashboard.user.update")}}">
                        @csrf

                        <div class="row mt-2 gy-4">

                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control" type="text" id="name" name="name"
                                           value="{{ $user->name }}" autofocus/>
                                    <label for="name">Name</label>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control" type="email" id="email" name="email"
                                           value="{{ $user->email }}"/>
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <select id="currency" class="select2 form-select">
                                        <option value="">Select Currency</option>
                                        <option value="usd">USD</option>
                                        <option value="euro">Euro</option>
                                        <option value="pound">Pound</option>
                                        <option value="bitcoin">Bitcoin</option>
                                    </select>
                                    <label for="currency">Currency</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>


            <div class="card mb-4">
                <h4 class="card-header">Change Password </h4>

                <div class="card-body pt-2">
                    <form method="POST" action="{{ route('dashboard.user.password') }}">
                        @csrf
{{--                        @if ($errors->any())--}}
{{--                            <div class="col-md-12">--}}
{{--                                <div class="alert alert-danger">--}}
{{--                                    <ul>--}}
{{--                                        @foreach ($errors->all() as $error)--}}
{{--                                            <li>{{ $error }}</li>--}}
{{--                                        @endforeach--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endif--}}

                        <div class="row mt-2 gy-4">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label for="current_password">Current Password</label>
                                    <input type="password" class="form-control" id="current_password"
                                           name="current_password"
                                           required>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="new_password">New Password</label>
                                    <input type="password" class="form-control" id="new_password"
                                           name="new_password"
                                           required>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="new_confirm_password">Confirm New Password</label>
                                    <input type="password" class="form-control" id="new_confirm_password"
                                           name="new_confirm_password" required>
                                </div>

                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Change Password</button>

                            </div>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>


            <div class="card">
                <h5 class="card-header fw-normal">Delete Account</h5>
                <div class="card-body">
                    <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                            <h6 class="alert-heading mb-1">Are you sure you want to delete your account?</h6>
                            <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                        </div>
                    </div>
                    <form id="formAccountDeactivation" method="POST" action="{{ route('dashboard.user.destroy') }}">
                        @csrf
                        @method('DELETE')

                        <div class="form-check mb-3 ms-3">
                            <input class="form-check-input" type="checkbox" name="accountActivation"
                                   id="accountActivation" required/>
                            <label class="form-check-label" for="accountActivation">I confirm my account
                                deactivation</label>
                        </div>
                        <button type="submit" class="btn btn-danger">Deactivate Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
