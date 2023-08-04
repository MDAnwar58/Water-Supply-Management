@extends('layouts.backend')

@section('title', 'গ্রাহক কার্ড')

@section('content')
    {{-- MAIN CONTENT start  --}}

    <main id="main" class="main">
        @include('backend.partials.pagetitle')
        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                        </div>
                    @endif
                </div>
                <div class="col-md-12 mb-3 text-end">
                    <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#user_card_added_modal">গ্রাহক এড করুন</button>
                </div>


                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">গ্রাহকের লিস্ট <span>| আজকের</span></h5>
                            <div class="table-responsive">
                                <table class="table table-borderless table-striped table-hover datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">আইডি নং</th>
                                            <th scope="col">কর্মির মোবাইল নং</th>
                                            <th scope="col">গ্রাহকের নাম</th>
                                            <th scope="col">ঠিকানা</th>
                                            <th scope="col">গ্রাহক হওয়ার তারিখ</th>
                                            <th scope="col">নিজস্ব জার</th>
                                            <th scope="col">তথ্য দেখুন/ইডিট/ডিলিট</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user_cards as $user_card)
                                            <tr>
                                                <th scope="row"><a href="#">#{{ $user_card->id_no }}</a></th>
                                                <td>{{ $user_card->number }}</td>
                                                <td>{{ $user_card->name }}</td>
                                                <td>{{ $user_card->address }}</td>
                                                <th scope="row">
                                                    {{ date('d-m-Y h:i A', strtotime($user_card->created_at)) }}</th>
                                                <td>{{ $user_card->own_jar }}</td>
                                                <td>
                                                    <a href="{{ route('admin.user.card.show', $user_card->id) }}"
                                                        class="btn btn-info btn-sm">তথ্য দেখুন</a>
                                                    <a href="{{ route('admin.user.card.destroy', $user_card->id) }}"
                                                        class="btn btn-danger btn-sm">ডিলিট করুন</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- End Left side columns -->

            </div>
        </section>

    </main><!-- End #main -->

    {{-- <span class="badge bg-success">Approved</span> --}}
    <!-- Modal -->
    @include('backend.partials.user_added_card_modal')
    {{-- MAIN CONTENT end --}}
@endsection
