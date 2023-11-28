@extends('app')
@section('content')
    <div class="page-page">
        <div class="page-heading">
            <h2 class="d-flex align-items-center mb-0 fw-semibold">Package Settings</h2>
        </div>
        <div class="page-content">
            <section class="row gx-0">
                <div class="col-md-12 col-12 p-md-2 ps-md-0">
                    <div class="row gap-3">
                        <div class="col-md-3 p-md-2 ps-md-0">
                            <div class="card card-shadow border-0 rounded-8px border-custom p-3 mb-0 cursor-pointer">
                                <h4 class="mb-2 text-center fw-semibold">
                                    <span>Manage Packages</span>
                                </h4>
                                <div class="d-flex justify-content-center align-items-center my-2">
                                    <span class="material-symbols-outlined display-3">
                                        deployed_code_update
                                        </span>
                                </div>
                                <div class="text-center">
                                    <span>Manage Packages</span>
                                    <a href="{{ route('package') }}" class="btn btn-dark-theme mt-4">Manage</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 p-md-2 ps-md-0">
                            <div class="card card-shadow border-0 rounded-8px border-custom p-3 mb-0 cursor-pointer">
                                <h4 class="mb-2 text-center fw-semibold">
                                    <span>Manage Tags</span>
                                </h4>
                                <div class="d-flex justify-content-center align-items-center my-2">
                                    <span class="material-symbols-outlined display-3">
                                        sell
                                        </span>
                                </div>
                                <div class="text-center">
                                    <span>Manage Tags</span>
                                    <a href="{{ route('tag') }}" class="btn btn-dark-theme mt-4">Manage</a>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
