@extends('app')
@section('content')
    <div class="page-page">
        <div class="page-heading">
            <h2 class="d-flex align-items-center mb-0 fw-semibold">Create Tags</h2>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @endif


        <div class="page-content">
            <div class="card card-shadow border-0 rounded-8px border-custom p-3 mb-0">
                <span class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 fw-semibold">Tags List</h4>
                  

                    <a href="{{ route('tags.create.form') }}" class="btn btn-dark-theme text-decoration-none"
                    data-bs-toggle="modal" data-bs-target="#visual_notes_modal" data-bs-whatever = 'Create Tag'>
                        <span class="material-symbols-outlined">
                            add
                        </span>
                        <span>
                            Add Tags
                        </span>
                    </a>
                </span>
                <section class="row gx-0 mt-4">
                    <div class="col-md-12 col-12 p-md-2 ps-md-0">
                        <div class="row">
                            <table class="table table-bordered data-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th width="100px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('tag') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'tagname',
                        name: 'name'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

        });
    </script>
@endpush
