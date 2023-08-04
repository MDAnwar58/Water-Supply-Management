@extends('layouts.backend')

@section('title', 'জারের দাম ইডিট')

@section('content')
    {{-- MAIN CONTENT start  --}}

    <main id="main" class="main">
        @include('backend.partials.pagetitle')
        <section class="section dashboard">
            <div class="row">
                @if (Session::has('success'))
                    <div class="col-12">
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    </div>
                @endif
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="fs-5 text-center text-muted fw-blod text-dark">জারের দাম এড করুন</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.jar.update', $jar->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group mt-2">
                                    <label for="">দাম</label>
                                    <input type="number" name="price" id="price" class="form-control" value="{{ $jar->price }}">
                                    @if ($errors->has('price'))
                                        <span class="alert text-danger">
                                            {{ $errors->first('price') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->



    {{-- MAIN CONTENT end --}}
@endsection
