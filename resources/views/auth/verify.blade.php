@extends('layouts.backend')

@section('title', 'Verification')

@section('content')
    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            @if ($errors->count() > 0)
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif
                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Verify Your Account</h5>
                                        <p class="text-center small">Please check your <b>email</b></p>
                                    </div>

                                    <form class="row g-3" action="{{ route('verify.send') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="yourName" class="form-label">Verification code</label>
                                            <input type="number" name="code" class="form-control" id="code"
                                                placeholder="Please enter your verification code...">
                                            @if ($errors->has('code'))
                                                <span class="alert text-danger">
                                                    {{ $errors->first('code') }}
                                                </span>
                                            @endif
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Verify</button>
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
