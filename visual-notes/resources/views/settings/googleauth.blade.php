@extends('app')
@section('content')
    <div class="page-page">
        <div class="page-heading">
            <h2 class="d-flex align-items-center mb-0 fw-semibold">Google Auth Settings</h2>
        </div>
        <div class="page-content">
            <section class="row gx-0">
                <div class="col-md-12 col-12 p-md-2 ps-md-0">
                    <div class="row">
                        <div class="card card-shadow p-4 border-0">

                            <div class="col">
                               
                                <span class="">
                                    <form method="POST" action="{{ route('settings.google-auth.store') }}"
                                        class="yohrm-ajax-form">
                                        <h4 class="mb-4 fw-semibold">Auth Settings</h4>
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="client_id" class="form-label"> Client Id </label>
                                                    <input type="text" class="form-control" name="client_id"
                                                        id="client_id"
                                                        value="{{ !empty($googleauth) ? $googleauth->client_id : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="client_secret" class="form-label"> Client Secret
                                                    </label>
                                                    <input type="text" class="form-control" name="client_secret"
                                                        id="client_secret"
                                                        value="{{ !empty($googleauth) ? $googleauth->client_secret : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="redirect" class="form-label"> Redirect Url
                                                    </label>
                                                    <input type="text" class="form-control" name="redirect"
                                                        id="redirect"
                                                        value="{{ !empty($googleauth) ? $googleauth->redirect : '' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-dark-theme w-md mt-4">Update</button>
                                        </div>
                                    </form>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
