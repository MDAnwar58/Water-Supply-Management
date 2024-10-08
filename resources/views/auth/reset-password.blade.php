@extends('layouts.backend')

@section('title', 'Reset Password')

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
                                                                        <h5 class="card-title text-center pb-0 fs-4">Reset Password</h5>
                                                                </div>

                                                                <form class="row g-3" action="{{ route("reset.password.store") }}" method="POST">
                                                                        @csrf
                                                                        <input type="email" name="email" id="email" class="d-none">
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
                                                                                <input type="password" name="confirm_password" class="form-control password_confirmation" id="confirm_password">
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
                                                                        <div class="col-12">
                                                                                <button class="btn btn-primary w-100" type="submit">Reset</button>
                                                                        </div>
                                                                </form>

                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>

                </section>

        </div>
</main><!-- End #main -->
@endsection

@section('script')
<script>
        let emailInput = document.getElementById('email');
        emailInput.value = "";
        let urlParams = new URLSearchParams(window.location.search);
        let email = urlParams.get('email');
        emailInput.value = email;

</script>
@endsection
