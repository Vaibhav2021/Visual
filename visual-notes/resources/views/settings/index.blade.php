@extends('app')
@section('content')
    <div class="page-page">
        <div class="page-heading">
            <h2 class="d-flex align-items-center mb-0 fw-semibold">Settings</h2>
        </div>
        <div class="page-content">
            <div class="col-md-12 col-12 p-md-2 ps-md-0">
                <div class="row">
                    <div class="col-md-3 p-md-3 ps-md-0 py-md-0">
                        <div class="card card-shadow border-0 rounded-8px border-custom p-3 mb-0 cursor-pointer">
                            <h4 class="mb-2 text-center fw-semibold">
                                <span>Roles And Permissions</span>
                            </h4>
                            <div class="d-flex justify-content-center align-items-center">
                                <span class="material-symbols-outlined display-3">
                                    folder_managed
                                </span>
                            </div>
                            <div class="p-2 text-center">

                                <span>Manage Roles & Permissions</span>
                                <a href="{{ route('settings.roles') }}" class="btn btn-dark-theme mt-4">Manage</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 p-md-3 ps-md-0 py-md-0">
                        <div class="card card-shadow border-0 rounded-8px border-custom p-3 mb-0 cursor-pointer">
                            <h4 class="mb-2 text-center fw-semibold">
                                <span>SMTP Settings</span>
                            </h4>
                            <div class="d-flex justify-content-center align-items-center">
                                <span class="material-symbols-outlined display-3">
                                    settings
                                </span>
                            </div>
                            <div class="p-2 text-center">
                                <span>Manage SMTP Settings</span>
                                <a href="{{ route('settings.smtp') }}" class="btn btn-dark-theme mt-4">Manage</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 p-md-3 ps-md-0 py-md-0">
                        <div class="card card-shadow border-0 rounded-8px border-custom p-3 mb-0 cursor-pointer">
                            <h4 class="mb-2 text-center fw-semibold">
                                <span>Google Login Settings</span>
                            </h4>
                            <div class="d-flex justify-content-center align-items-center">

                                <span class="material-symbols-outlined display-3">
                                    login
                                </span>
                            </div>
                            <div class="p-2 text-center">
                                <span>Manage Google Login Settings</span>
                                <a href="{{ route('settings.google-auth') }}" class="btn btn-dark-theme mt-4">Manage</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 p-md-3 ps-md-0 py-md-0">
                        <div class="card card-shadow border-0 rounded-8px border-custom p-3 mb-0 cursor-pointer">
                            <h4 class="mb-2 text-center fw-semibold">
                                <span>Payment Settings</span>
                            </h4>
                            <div class="d-flex justify-content-center align-items-center">
                                <span class="material-symbols-outlined display-3">
                                    payments
                                </span>
                            </div>
                            <div class="p-2 text-center">
                                <span>Manage Payments Settings</span>
                                <a href="{{ route('settings.payments') }}" class="btn btn-dark-theme mt-4">Manage </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
