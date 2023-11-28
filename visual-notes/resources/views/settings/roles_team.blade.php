@extends('app')
@section('content')

<div class="tab-pane fade show active" id="pills-all-candidates" role="tabpanel" aria-labelledby="pills-all-candidates-tab" tabindex="0">
    <div class="outer-box">
        <div class="page-heading d-flex justify-content-start align-items-center mt-4">
            <h2 class="d-flex align-items-center mb-0 fw-semibold">Teams</h2>
        </div>
        <div class="page-content">
            <section class="section">

                    <div class="card-body table-responsive">
                        <table class="table rounded-8px overflow-hidden table-responsive" id="yohrm-table">
                            <thead class="text-nowrap table-header-bg text-color">
                                <tr>

                                    <th class="min-width-10"><span class="text-dark">Name</span></th>
                                    <th class="min-width-10"><span class="text-dark">Employee Id</span></th>
                                    <th class="min-width-10"><span class="text-dark">Departmant </span></th>
                                    <th class="min-width-10"><span class="text-dark">Deginatition</span></th>

                                </tr>
                            </thead>
                            <tbody></tbody>
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
        table = $('#yohrm-table').DataTable({
            buttons: [
                'print',
                'postExcel',
                'postCsv',
                'postPdf',
            ],
            responsive: true,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            searching: false,
            ajax: {
                url: "{{ route('teams.datatable') }}",
                type: 'GET',
                data:{'role_id': {{request('id')}} },
            },
            columns: [

                {
                    data: 'name',
                    name: 'name',
                    'orderable': false
                },

                {
                    data: 'emp_id',
                    name: 'emp_id',
                    'orderable': false
                },

                {
                    data: 'department',
                    name: 'department',
                    'orderable': false
                },

                {
                    data: 'desigination',
                    name: 'desigination'
                },


            ],
            "order": [
                [0, "desc"]
            ]
        });



    })
</script>

@endpush