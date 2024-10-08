@extends('layouts.backend')

@section('title', 'Forget Password')

@section('content')
<main>
        <div class="container">
                <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                        <div class="container">
                                <div class="row justify-content-center">
                                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                                                <div class="card mb-3">

                                                        <div class="card-body">

                                                                <div class="pt-4 pb-2">
                                                                        <h5 class="card-title text-center pb-0 fs-4">Forget Password</h5>
                                                                        @if (Session::has('sendEamil'))
                                                                        <p class="text-center small text-success">{{ Session::get('sendEamil') }}</p>
                                                                        @endif
                                                                </div>

                                                                <form class="row g-3" action="{{ route("forget.password.send") }}" method="POST">
                                                                        @csrf
                                                                        <div class="from-group">
                                                                                <label for="yourUsername" class="form-label">Email</label>
                                                                                <input type="email" name="email" class="form-control" id="yourEmail">
                                                                                @if ($errors->has('email'))
                                                                                <span class="alert text-danger">
                                                                                        {{ $errors->first('email') }}
                                                                                </span>
                                                                                @endif
                                                                                @if (Session::has('emailSendFail'))
                                                                                <span class="alert text-danger">
                                                                                        {{ Session::get('emailSendFail') }}
                                                                                </span>
                                                                                @endif
                                                                        </div>
                                                                        <div class="col-12">
                                                                                <button class="btn btn-primary w-100" type="submit">Send Email</button>
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
