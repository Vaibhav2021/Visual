@extends('app')
@section('content')
    <div class="page-page">
        <div class="page-heading">
            <h2 class="d-flex align-items-center mb-0 fw-semibold">{{ $create_or_edit }} Role</h2>
        </div>
        <div class="page-content">
            <div class="row">
                <div class="col">
                    <div class="card rounded-8px border-custom p-3 shadow-custom mb-0 cursor-pointer">
                        <section class="row gx-0">
                            <div class="col-md-12 col-12 p-md-2 ps-md-0">
                                <div class="row">
                                    <form method="post" action="{{ route('settings.roles.store', $role->id) }}"
                                        class="form form-vertical yohrm-ajax-form" data-modal-form="#yohrm-modal">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="role-name">Enter Role Name*</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="role-name" class="form-control" name="role"
                                                        placeholder="Enter Role Name" value="{{ $role->name }}">
                                                </div>
                                                <div class="col-md-12">
                                                    <h5 class="fw-semibold my-4">Role Permissions</h5>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="email-horizontal">Administrator Access</label>
                                                </div>

                                                <div class="col-md-8 form-group">
                                                    <div class="form-check">
                                                        <div class="checkbox1">
                                                            <input type="checkbox" id="selectAll" class="form-check-input"
                                                                @if (!empty($rolePermissions) && count($rolePermissions) == $permissions_count) checked @endif>
                                                            <label for="selectAll">Select All</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                @foreach ($permission as $key => $permissions)
                                                    <div class="col-md-4">
                                                        <label for="email-horizontal">
                                                            {{ $key }}
                                                        </label>
                                                    </div>




                                                    <div class="col-md-8 form-group">
                                                        <div class="d-flex justify-content-between align-items-center">

                                                            @foreach ($permissions as $key => $per_name)
                                                                <div class="form-check">
                                                                    <div class="checkbox1">
                                                                        <input type="checkbox" id="del-btn-hiring"
                                                                            name="permission[]"
                                                                            value="{{ $per_name['id'] }}"
                                                                            class="form-check-input selectAll-inner"
                                                                            @checked(in_array($per_name['id'], $rolePermissions))>

                                                                        <label for="del-btn-hiring">
                                                                            @php
                                                                                $name = explode('-', $per_name['name']);
                                                                            @endphp

                                                                            {{ str_replace('_', ' ', end($name)) }}
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div class="col-12 d-flex justify-content-end mt-4 mt-md-0 gap-1">
                                                    <button type="submit" class="btn btn-dark-theme me-1 mb-1">Submit</button>
                                                    <button type="reset"
                                                        class="btn btn-light-secondary me-1 mb-1 border">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
