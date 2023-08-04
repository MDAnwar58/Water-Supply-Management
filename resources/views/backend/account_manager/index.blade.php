@extends('layouts.backend')

@section('title', 'অ্যাকাউন্ট ম্যানেজার')

@section('content')
    {{-- MAIN CONTENT start  --}}

    <main id="main" class="main">
        @include('backend.partials.pagetitle')
        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    @if (Session::has('success_admin'))
                        <div class="alert alert-success">
                            {{ Session::get('success_admin') }}
                        </div>
                    @endif
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @endif

                    @if (Session::has('success_admin'))
                        <div class="alert alert-success">
                            {{ Session::get('success_admin') }}
                        </div>
                    @endif
                    @if (Session::has('cancel'))
                        <div class="alert alert-danger">
                            {{ Session::get('cancel') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ম্যানেজার সংখ্যা</th>
                                    <th scope="col">নাম</th>
                                    <th scope="col">ই-মেইল</th>
                                    <th scope="col">পারমিশন ইউজার</th>
                                    <th scope="col">ইউজার</th>
                                    <th scope="col">ইডিট/ডিলিট</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($users->count() > 0)
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if ($user->role == 0)
                                                    <a href="{{ route('admin.account.manager.permission', $user->id) }}"
                                                        class="badge bg-warning text-light">পারমিশন</a>
                                                @else
                                                    <a href="{{ route('admin.account.manager.permission', $user->id) }}"
                                                        class="badge bg-danger text-light">পারমিশন বাতিল</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($user->user_status == 'এডমিন')
                                                    <span class="badge bg-success">{{ $user->user_status }}</span>
                                                @else
                                                    <span class="badge bg-info">{{ $user->user_status }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{-- <a href="" class="btn btn-info btn-sm">View Info</a> --}}
                                                <a href="{{ route('admin.account.manager.destroy', $user->id) }}"
                                                    class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center">আপনার সাইটের অ্যাকাউন্ট ম্যানেজার নিয়োগ দেন
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div><!-- End Left side columns -->

            </div>
        </section>

    </main><!-- End #main -->



    {{-- MAIN CONTENT end --}}
@endsection
