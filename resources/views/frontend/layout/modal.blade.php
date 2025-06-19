<div class="modal fade" id="authModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content px-4 py-4 p-md-5">
            <button type="button" class="close_btn position-absolute top-0 end-0 m-3" data-bs-dismiss="modal"
                aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
            <div class="text-center mb-3">
                <img src="{{ asset('assets/frontend/images/logo.png') }}" alt="Logo" class="img-fluid"
                    style="max-height: 35px;">
            </div>
            <div class="text-center mb-4">
                <h4 id="authTitle">Login</h4>
                <p class="mb-0">
                    <span id="authToggleText">Don't have an account?</span>
                    <a href="#" id="toggleAuthForm" class="signup_btn fw-bold">Sign Up</a>
                </p>
            </div>
            <form id="loginForm" action="{{route('auth.login')}}" method="POST">
                <div class="mb-3">
                    <input type="text" class="form-control rounded-pill" placeholder="Email id" name="email">
                    <span class="error email_error"></span>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control rounded-pill" placeholder="Password" name="password">
                    <span class="error password_error"></span>
                </div>
                <div class="text-end mb-3">
                    <a href="#" class="forgot_pass">Forgot password?</a>
                </div>
                <div class="d-flex justify-content-center">
                    <button class="button2 login-btn" type="submit">Login</button>
                </div>
            </form>
            <form id="signupForm" class="d-none" action="{{route('auth.signup')}}" method="POST">
                <p class="im mb-2 text-center">I Am</p>
                <div class="d-flex justify-content-center gap-3 mb-3">
                    <label>
                        <input type="radio" name="type" value="agent">
                        Agent/Property Owner
                    </label>
                    <label>
                        <input type="radio" name="type" value="user">
                        Looking to buy/rent
                    </label>
                </div>
                <span class="error type_error"></span>
                <div class="row g-3">
                    <div class="col-6">
                        <input type="text" class="form-control rounded-pill" placeholder="First name *"
                            name="first_name">
                        <span class="error first_name_error"></span>
                    </div>

                    <div class="col-6">
                        <input type="text" class="form-control rounded-pill" placeholder="Last name *"
                            name="last_name">
                        <span class="error last_name_error"></span>
                    </div>
                    <div class="col-12">
                        <input type="email" class="form-control rounded-pill" placeholder="Email Id *" name="email">
                        <span class="error email_error"></span>
                    </div>
                    <div class="col-12">
                        <input type="tel" class="form-control rounded-pill" placeholder="Phone *" name="phone">
                        <span class="error phone_error"></span>
                    </div>
                    <div class="col-12">
                        <input type="text" class="form-control rounded-pill" placeholder="Address" name="address">
                        <span class="error address_error"></span>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control rounded-pill" placeholder="City" name="city">
                        <span class="error city_error"></span>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control rounded-pill" placeholder="State" name="state">
                        <span class="error state_error"></span>
                    </div>
                    <div class="col-6">
                        <select class="form-select rounded-pill" name="country">
                            <option selected disabled>Country *</option>
                            @foreach (all_active_countries() as $item)
                                <option value="{{ $item->id }}">{{ $item->name ?? '' }}</option>
                            @endforeach
                        </select>
                        <span class="error country_error"></span>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control rounded-pill" placeholder="Zip Code"
                            name="zip">
                        <span class="error zip_error"></span>
                    </div>
                    <div class="col-12">
                        <input type="password" class="form-control rounded-pill" placeholder="Password *"
                            name="password">
                        <span class="error password_error"></span>
                    </div>
                    <div class="col-12">
                        <input type="password" class="form-control rounded-pill" placeholder="Confirm Password *"
                            name="confirm_password">
                        <span class="error confirm_password_error"></span>
                    </div>
                </div>

                <div class="form-check mt-3 mb-3">
                    <input class="form-check-input" type="checkbox" id="termsCheck" name="terms" value="1">
                    <label class="form-check-label small" for="termsCheck">
                        I accept the <a href="{{ route('terms') }}" target="_blank">General T&C</a>
                    </label>
                </div>
                <span class="error terms_error"></span>
                <div class="d-flex justify-content-center">
                    <button class="button2 signup-btn" type="submit">Sign Up</button>
                </div>
            </form>
            <form id="forgotForm" class="d-none" action="{{route('auth.forgot.password')}}" method="POST">
                <div class="mb-3">
                    <input type="text" class="form-control rounded-pill" placeholder="Email address" name="email">
                    <span class="error email_error"></span>
                </div>
                <div class="text-end mb-3">
                    <a href="javascript:void(0);" class="forgot_pass">Go back</a>
                </div>
                <div class="d-flex justify-content-center">
                    <button class="button2 login-btn" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
