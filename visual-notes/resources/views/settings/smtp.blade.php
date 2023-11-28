@extends('app')
@section('content')
    <div class="page-page">
        <div class="page-heading">
            <h2 class="d-flex align-items-center mb-0 fw-semibold">SMTP Settings</h2>
        </div>
        <div class="page-content">
            <section class="row gx-0">
                <div class="col-md-12 col-12 p-md-2 ps-md-0">
                    <div class="row">
                        <div class="col">
                            <div class="card card-shadow p-4 border-0">
                                <div class="row mb-5">
                                    <div class="col-md-3">
                                        <label class="form-label">Select Settings</label>
                                        <select name="ds" onchange="chooseSettings(this.value)"
                                            class="form-select setSelectedSetting" aria-placeholder="Select an option">
                                            <option value="smtp">SMTP Settings</option>
                                            <option value="aws">AWS Settings</option>
                                        </select>
                                    </div>
                                    <div class="col"></div>
                                    <div class="col-md-3 my-auto">
                                        <div class="d-flex flex-row">
                                            <input type="email" class="form-control" id="mail"
                                                placeholder="Enter email">
                                            <button type="button" class="btn btn-dark-theme testEmail mx-2">Test</button>
                                        </div>
                                    </div>
                                </div>
                                <span class="hideSMTP">
                                    <form method="POST" action="{{ url('/smtp') }}">
                                        <h4 class="mb-4">SMTP Settings</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="driver" class="form-label"> Driver </label>
                                                    <input type="text" class="form-control" name="driver" id="driver"
                                                        value="{{ $smtp->driver ?? '' == 'smtp' ? $smtp->driver ?? '' : '' }}"
                                                        readonly>
                                                    <span class="error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="encryption" class="form-label"> Encryption
                                                    </label>
                                                    <input type="text" class="form-control" name="encryption"
                                                        id="encryption"
                                                        value="{{ $smtp->driver ?? '' == 'smtp' ? $smtp->encryption ?? '' : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="username" class="form-label"> Username </label>
                                                    <input type="text" class="form-control" name="username"
                                                        id="username"
                                                        value="{{ $smtp->driver ?? '' == 'smtp' ? $smtp->username ?? '' : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="smtp_host" class="form-label"> SMTP Host
                                                    </label>
                                                    <input type="text" class="form-control" name="smtp_host"
                                                        id="smtp_host"
                                                        value="{{ $smtp->driver ?? '' == 'smtp' ? $smtp->smtp_host ?? '' : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="smtp_port" class="form-label"> SMTP Port
                                                    </label>
                                                    <input type="text" class="form-control" name="smtp_port"
                                                        id="smtp_port"
                                                        value="{{ $smtp->driver ?? '' == 'smtp' ? $smtp->smtp_port ?? '' : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="smtp_from_email" class="form-label"> SMTP From
                                                        Email </label>
                                                    <input type="text" class="form-control" name="smtp_from_email"
                                                        id="smtp_from_email" value="{{ $smtp->smtp_from_email ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="smtp_from_name" class="form-label"> SMTP From
                                                        Name </label>
                                                    <input type="text" class="form-control" name="smtp_from_name"
                                                        id="smtp_from_name" value="{{ $smtp->smtp_from_name ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="smtp_pass" class="form-label"> SMTP Pass
                                                    </label>
                                                    <input type="text" class="form-control" name="smtp_pass"
                                                        id="smtp_pass"
                                                        value="{{ $smtp->driver ?? '' == 'smtp' ? $smtp->smtp_pass ?? '' : '' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <center><button type="button"
                                                    class="btn btn-dark-theme w-md mt-4 smtpUpdate">Update</button>
                                            </center>
                                        </div>
                                    </form>
                                </span>

                                <span class="hideAWS d-none">
                                    <h4 class="mt-5 mb-4">AWS Settings</h4>
                                    <form method="POST" action="{{ url('/smtp-aws') }}">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="awsdriver" class="form-label"> Driver </label>
                                                    <input type="text" class="form-control" name="awsdriver"
                                                        id="awsdriver"
                                                        value="{{ $smtp->driver ?? '' == 'ses' ? $smtp->driver ?? '' : 'ses' }}">
                                                    @error('awsdriver')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="awsAccessKey" class="form-label"> AWS Access
                                                        Key </label>
                                                    <input type="text" class="form-control" name="awsAccessKey"
                                                        id="awsAccessKey"
                                                        value="{{ $smtp->driver ?? '' == 'ses' ? $smtp->awsAccessKey ?? '' : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="awsSecretKey" class="form-label"> AWS Secret
                                                        Key </label>
                                                    <input type="text" class="form-control" name="awsSecretKey"
                                                        id="awsSecretKey"
                                                        value="{{ $smtp->driver ?? '' == 'ses' ? $smtp->awsSecretKey ?? '' : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="awsDefaultRegion" class="form-label"> AWS
                                                        Default Region </label>
                                                    <input type="text" class="form-control" name="awsDefaultRegion"
                                                        id="awsDefaultRegion"
                                                        value="{{ $smtp->driver ?? '' == 'ses' ? $smtp->awsDefaultRegion ?? '' : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="awsBucket" class="form-label"> AWS Bucket
                                                    </label>
                                                    <input type="text" class="form-control" name="awsBucket"
                                                        id="awsBucket"
                                                        value="{{ $smtp->driver ?? '' == 'ses' ? $smtp->awsBucket ?? '' : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="from_email" class="form-label">From Email
                                                    </label>
                                                    <input type="text" class="form-control" name="from_email"
                                                        id="from_email" value="{{ $smtp->smtp_from_email ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="from_name" class="form-label">From Name
                                                    </label>
                                                    <input type="text" class="form-control" name="from_name"
                                                        id="from_name" value="{{ $smtp->smtp_from_name ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="flexSwitchCheckDefault" class="form-label">
                                                        Use Path Style Endpoint </label>
                                                    <div class="form-check form-switch py-1">
                                                        <input class="form-check-input" name="awsPathStyle"
                                                            id="awsPathStyle" type="checkbox" id="flexSwitchCheckDefault"
                                                            value="1"
                                                            {{ $smtp->awsPathStyle ?? '' == '1' ? 'checked' : '' }} />
                                                        <label class="form-check-label"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <center><button type="button"
                                                    class="btn btn-dark-theme w-md mt-4 smtpAWSUpdate">Update</button>
                                            </center>
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
