@extends('layouts.backend')

@section('title', 'Login')

@section('content')
    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            @if (Session::has('Login_error'))
                                <div class="alert alert-danger">{{ Session::get('Login_error') }}? <a
                                        href="{{ route('register') }}" class="text-primary">Register</a></div>
                            @endif
                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                        <p class="text-center small">Enter your email & password to login</p>
                                    </div>

                                    <form class="row g-3" action="{{ route('login.store') }}" method="POST">
                                        @csrf
                                        <div class="from-group">
                                            <label for="yourUsername" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" id="yourEmail.....">
                                            @if ($errors->has('email'))
                                                <span class="alert text-danger">
                                                    {{ $errors->first('email') }}
                                                </span>
                                            @endif
                                        </div>

                                        <div class="from-group">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="yourPassword">
                                            @if ($errors->has('password'))
                                                <span class="alert text-danger">
                                                    {{ $errors->first('password') }}
                                                </span>
                                            @endif
                                        </div>

                                        {{-- <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    value="true" id="remember">
                                                <label class="form-check-label" for="rememberMe">Remember me</label>
                                            </div>
                                        </div> --}}
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Login</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Don't have account? <a
                                                    href="{{ route('register') }}">Create
                                                    an account</a></p>
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
