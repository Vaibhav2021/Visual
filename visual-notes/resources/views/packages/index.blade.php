@extends('app')
@section('content')
    <div class="page-page">
        <div class="page-heading">
            <h4 class="mb-0 fw-semibold">Packages</h4>

        </div>
        <div class="page-content">
            <div class="d-flex justify-content-between align-items-start gap-40">
                <div class="max-width-1440">
                    <div class="d-flex gap-24 justify-content-between align-items-center w-100">
                        <div class="d-flex gap-24 justify-content-between align-items-center">
                            <div class="search-360">
                                <div class="has-right position-relative">
                                    <input type="text" placeholder="Seach" class="form-control">
                                    <span class="material-symbols-outlined position-absolute search-absolute-btn">
                                        search
                                    </span>
                                </div>
                            </div>
                            <div class="select-tag-240">
                                <select class="js-example-basic-single form-control" name="state">
                                    <option value="AL" selected>Search by tags</option>
                                    <option value="AL">Search by tags</option>
                                    ...
                                    <option value="WY">Wyoming</option>
                                </select>
                            </div>
                        </div>
                        <a class="btn btn-dark-theme" href="{{ route('package.create.form') }}"
                            class="text-decoration-none a-visual" data-bs-toggle="modal"
                            data-bs-target="#visual_notes_modal" data-bs-whatever = 'Create Package'>
                            <span class="material-symbols-outlined">
                                add
                            </span>
                            <span>
                                Create Package
                            </span>
                        </a>
                    </div>

                    <div class="d-flex gap-24 flex-wrap justify-content-start align-items-center mt-32 w-10">
                        @forelse ($packages as $package)
                            <div class="d-flex flex-row gap-24 justify-content-between align-items-center mt-32 w-10">
                                    <div class="card card-shadow border-0 bg-white p-4 max-width-510 min-width-250">
                                        <div class="d-flex justify-content-start align-items-start flex-column gap-2">
                                            <div class="d-flex justify-content-between align-items-center gap-3">
                                                <h5 class="mb-0">{{ ucwords($package->name ?? '') }} </h5>
                                                <hr>
                                            </div>






                                            <div class="d-flex justify-content-start align-items-center gap-3 mt-2">
                                                <h3 class="mb-0 fs-7 fw-medium text-el">
                                                    $ {{ $package->price ?? 0 }}
                                                </h3>
                                            </div>

                                            <div class="hr"></div>

                                            <div
                                                class="d-flex justify-content-between align-items-center gap-3 mt-10 w-100">


                                                <div class="d-flex gap-3">

                                                    <div class="d-flex align-items-center gap-2">
                                                        @if ($package->created_by == auth()->user()->id)
                                                            <a href="{{ route('package.create.form', $package->id) }}"
                                                                class="text-decoration-none" data-bs-toggle="modal"
                                                                data-bs-target="#visual_notes_modal"
                                                                data-bs-whatever = 'Edit Package'>
                                                                <button type="button" class="btn btn-dark-theme">Edit
                                                                    Package</button>
                                                            </a>
                                                        @endif


                                                        <a href="{{ route('package.payment.method', $package->id) }}"
                                                            class="text-decoration-none" data-bs-toggle="modal"
                                                            data-bs-target="#visual_notes_modal"
                                                            data-bs-whatever = 'Select Payment Method'>
                                                            <button type="button" class="btn border bg-theme">Buy
                                                                Package</button>
                                                        </a>

                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                            </div>


                        @empty
                        @endforelse

                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        const RazorpaySubscriptionSave = (formData, _url) => {
            $.ajax({
                url: _url,
                type: 'POST',
                data: formData,
                success: function(res) {
                    if (res.status == 200) {
                        Swal.fire({
                            text: res.message,
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-dark-theme"
                            }
                        });
                        setTimeout(() => {
                            window.location.href = "{{ Route('package') }}"
                        }, 2000);
                    }
                }
            });
        }

        const RazorpaySubscription = (response, packageId, gateway) => {
            var options = {
                "key": response.Razorpay_key,
                "subscription_id": response.subscription_id,
                "name": "{{ env('APP_NAME') }}",
                "description": response.description,
                "image": "{{ asset('assets/compiled/svg/logo.svg') }}",
                "handler": function(res) {
                    let formData = {
                        'packageId': packageId,
                        'payment_id': res.razorpay_payment_id,
                        'subscription_id': response.subscription_id,
                        'gateway': gateway,
                        '_token': "{{ csrf_token() }}"
                    };
                    RazorpaySubscriptionSave(formData, response.url);
                },
                "prefill": {
                    "name": "{{ auth()->user()->name }}",
                    "email": "{{ auth()->user()->email }}",
                    "contact": ""
                },
                "notes": {
                    "note_key_1": response.description,
                },
                "theme": {
                    "color": "#006FD6"
                }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
        }


        // $(document).ready(function() {

        $('body').on('click', '.gateway-btn', function() {
            let _this = $(this);

            _this.append(`<div class="spinner-border text-warning ms-2 spinner-border-sm" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>`);
            $('button.gateway-btn').attr('disabled', true);
            let gateway = $(this).attr('data-gateway');
            let packageId = $('input[name=package]').val();
            let _token = "{{ csrf_token() }}";


            $.post("{{ Route('packages.checkout') }}", {
                gateway,
                packageId,
                _token
            }, function(response) {
                $('button.gateway-btn').attr('disabled', false);
                _this.find('.spinner-border').remove();
                if (gateway == 'razorpay') {
                    RazorpaySubscription(response, packageId, gateway);
                } else if (gateway == 'stripe' && response.status == '200') {
                    window.location.href = response.url;
                } else if (gateway == 'paypal' && response.status == '200') {
                    window.location.href = response.url;
                }
            });
        })
        // });
    </script>
@endpush
