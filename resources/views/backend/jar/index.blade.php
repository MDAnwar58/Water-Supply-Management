@extends('layouts.backend')

@section('title', 'জারের দাম')

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
                @if (Session::has('error'))
                    <div class="col-12">
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    </div>
                @endif
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="fs-5 text-center text-muted fw-blod text-dark">জারের দাম এড করুন</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.jar.store') }}" method="POST">
                                @csrf
                                <div class="form-group mt-2">
                                    <label for="">দাম</label>
                                    <input type="number" name="price" id="price" class="form-control">
                                    @if ($errors->has('price'))
                                        <span class="alert text-danger">
                                            {{ $errors->first('price') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="fs-5 text-center text-muted fw-blod text-dark">জারের দামের লিট</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>দাম</th>
                                                    <th>ইডিট/ডিলিট</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($jars->count()>0)
                                                    @foreach ($jars as $jar)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $jar->price }}</td>
                                                        <td>
                                                            <a href="{{ route('admin.jar.edit', $jar->id) }}" class="btn btn-primary btn-sm">ইডিট</a>
                                                            <a href="{{ route('admin.jar.destroy', $jar->id) }}" class="btn btn-danger btn-sm">ডিলিট</a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="3" class="text-center">জারের দাম নেই</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->



    {{-- MAIN CONTENT end --}}
@endsection
