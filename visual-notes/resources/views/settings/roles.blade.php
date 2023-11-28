@extends('app')
@section('content')
    <div class="page-page">
        <div class="page-heading">
            <h2 class="d-flex align-items-center mb-0 fw-semibold">Roles & Permissions</h2>
            <a href="{{ route('settings.roles.create') }}"
                class="btn btn-dark-theme d-flex text-nowrap align-items-center w-fc gap-2">Add Role Permission<span><i
                        class="bi bi-plus-lg"></i></span></a>
        </div>
        <div class="page-content">
            <section class="row gx-0">
                <div class="col-md-12 col-12 p-md-2 ps-md-0">
                    <div class="row">
                        @foreach ($roles as $role)
                            <div class="col-md-3 col-12">
                                <div class="card border-custom shadow-custom mb-0">
                                    <div class="p-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="mb-0">
                                                <a href="#"
                                                    class="text-decoration-none text-color hover-effect fw-semibold">{{ ucwords($role->name) }}</a>
                                            </h5>
                                            <a href="{{ route('settings.roles.create', $role->id) }}"
                                                class="text-decoration-none">
                                                <span>
                                                    <div
                                                        class="box-32 bg-theme rounded-circle d-flex justify-content-center align-items-center">
                                                        <span class="material-symbols-outlined text-color fs-6">
                                                            edit
                                                        </span>
                                                    </div>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mt-4">
                                            <div>
                                                <h6 class="mb-2 fw-medium text-uppercase">Members</h6>
                                                <div class="ms-2">
                                                    <a href="#" class="text-decoration-none user-member"> <img
                                                            src="{{ asset('/') }}assets/compiled/other/user1.png"
                                                            class="img-fluid user-member mx-0"> </a>
                                                    <a href="#" class="text-decoration-none user-member"> <img
                                                            src="{{ asset('/') }}assets/compiled/other/user2.png"
                                                            class="img-fluid user-member"></a>
                                                    <a href="#" class="text-decoration-none user-member"> <img
                                                            src="{{ asset('/') }}assets/compiled/other/vaibhav.jpg"
                                                            class="img-fluid user-member rounded-circle"></a>
                                                </div>
                                            </div>
                                            <a href="{{ route('settings.roles.add_member', $role->id) }}"
                                                class="candidate-btn d-flex align-items-center rounded-5px w-fc gap-2 p-2 px-3 mt-2 btn btn-dark-theme"
                                                data-bs-toggle="modal" data-bs-target="#yohrm-modal"
                                                data-bs-whatever="Add Member">Add Member
                                                <span><i class="bi bi-plus-lg"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
