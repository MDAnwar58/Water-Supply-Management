@extends('layouts.backend')

@section('title', 'Register')

@section('content')
    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            @if (Session::has('register_error'))
                                <div class="alert alert-danger">{{ Session::get('register_error') }}</div>
                            @endif
                            @if (Session::has('register_exception_error'))
                                <div class="alert alert-danger">{{ Session::get('register_exception_error') }}</div>
                            @endif
                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                        <p class="text-center small">Enter your personal details to create account</p>
                                    </div>

                                    <form class="row g-3" action="{{ route('register.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="yourName" class="form-label">Your Name</label>
                                            <input type="text" name="name" class="form-control" id="name">
                                            @if ($errors->has('name'))
                                                <span class="alert text-danger">
                                                    {{ $errors->first('name') }}
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="yourEmail" class="form-label">Your Email</label>
                                            <input type="email" name="email" class="form-control">
                                            @if ($errors->has('email'))
                                                <span class="alert text-danger">
                                                    {{ $errors->first('email') }}
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control">
                                            @if ($errors->has('password'))
                                                <span class="alert text-danger">
                                                    {{ $errors->first('password') }}
                                                </span>
                                            @endif
                                        </div>


                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Confirm Password</label>
                                            <input type="password" name="confirm_password"
                                                class="form-control password_confirmation" id="confirm_password">
                                            @if (!$errors->has('password'))
                                                @if ($errors->has('confirm_password'))
                                                    <span class="alert text-danger">
                                                        {{ $errors->first('confirm_password') }}
                                                    </span>
                                                    <style>
                                                        #confirm_password {
                                                            border: 2px solid red;
                                                        }
                                                    </style>
                                                @endif
                                            @else
                                                @if ($errors->has('confirm_password'))
                                                    <span class="alert text-danger">
                                                        {{ $errors->first('confirm_password') }}
                                                    </span>
                                                @endif
                                            @endif
                                        </div>

                                        {{-- <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" name="terms_and_conditions" type="checkbox"
                                                    value="terms and conditions" id="acceptTerms">
                                                <label class="form-check-label" for="acceptTerms">I agree and accept the <a
                                                        href="#">terms and conditions</a></label>
                                                @if ($errors->has('terms_and_conditions'))
                                                    <span class="alert text-danger">
                                                        {{ $errors->first('terms_and_conditions') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div> --}}
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Create Account</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Already have an account? <a
                                                    href="{{ route('login') }}">Log
                                                    in</a></p>
                                        </div>
                                    </form>

                                </div>
                            </div>

                            {{-- <div class="credits"> --}}
                            <!-- All the links in the footer should remain intact. -->
                            <!-- You can delete the links only if you purchased the pro version. -->
                            <!-- Licensing information: https://bootstrapmade.com/license/ -->
                            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                            {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                            </div> --}}

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->
@endsection
