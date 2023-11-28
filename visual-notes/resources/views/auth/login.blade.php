@include('layout.header')
<div id="auth-bg">
    <div class="d-flex justify-content-center align-items-center gap-32 h-100 px-sm-2">
        <div class="auth-form gap-32 d-flex flex-column">
            <div class="w-100 d-flex flex-column justify-content-center align-items-center">
                <div class="d-flex justify-content-center align-items-center gap-2">
                    <img src="{{ asset('assets/images/logo.png') }}" width="32" class="img-fuild" alt="">
                    <span class="text-white fw-bold fs-3">Visual<span class="fw-normal">Notes</span></span>
                </div>
                <h3 class="text-white mb-0 mt-24">Login</h3>
                <p class="text-gray mb-0">Please Sign-in to your account </p>
            </div>
            <form method="post"action="{{ route('login') }}" class="d-flex gap-32 flex-column">
                @csrf

                <div class="form-group position-relative has-icon-right">
                    <input type="email" placeholder="Enter Your Email"
                        class="form-control auth-input @error('email') is-invalid @enderror" id="email"
                        name="email" autocomplete="off">
                    <div class="form-control-icon">
                        <i class="bi bi-eye-slash lh-sm" id="togglePassword"></i>
                    </div>
                    @error('email')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>



                <div class="form-group position-relative has-icon-right">
                    <input type="password" placeholder="Enter Your Password"
                        class="form-control auth-input @error('password') is-invalid @enderror" id="password"
                        name="password" autocomplete="off">
                    <div class="form-control-icon">
                        <i class="bi bi-eye-slash lh-sm" id="togglePassword"></i>
                    </div>
                    @error('password')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>




                <div class="d-flex justify-content-between align-items-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label text-white" for="flexCheckDefault">
                            Keep me logged in
                        </label>
                    </div>
                    <a href="#" class="text-decoration-none text-gray fs-7">Forgot password?</a>
                </div>
                <button class="btn btn-primary-custom btn-block btn-lg text-white fw-semibold auth-btn border-0">Log
                    In</button>
            </form>
            <div class="d-flex justify-content-center">
                <div class="text-white fs-6 fw-bold bg-transparent">OR</div>
            </div>
            <div class="d-flex justify-content-center align-items-center gap-3 text-center text-lg fs-6 ">
                <p class="text-gray">New to our platform?
                </p>
                <div class="vr text-white fs-6 h-2rem"></div>
                <p><a href="#" class="font-bold text-primary text-decoration-none text-white">Create
                        Account</a></p>
            </div>
            <a href="{{ route('google.login') }}" class="text-decoration-none">
                <button
                    class="btn btn-google-custom btn-block btn-lg w-100 text-white fw-semibold auth-btn border-0 d-flex justify-content-center align-items-center gap-2">
                    <img src="{{ asset('assets/images/google.png') }}" width="32" class="img-fuild" />
                    <h6 class="mb-0 text-white">Sign in with Google</h6>
                </button>
            </a>
        </div>
    </div>
</div>
</body>

</html>
