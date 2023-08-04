@extends('layouts.backend')

@section('title', 'গ্রাহকের তথ্য')

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
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
                {{-- <div class="col-md-12 mb-3 text-end">
                    <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#user_card_added_modal">গ্রাহক এড করুন</button>
                </div> --}}


                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">গ্রাহকের তথ্য <span>| আপডেট করুন</span></h5>
                            <form action="{{ route('admin.user.card.update', $user_card->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">আইডি নং</label>
                                            <input type="text" name="id_no" class="form-control"
                                                value="{{ $user_card->id_no }}">
                                            @if ($errors->has('id_no'))
                                                <span class="alert text-danger">
                                                    {{ $errors->first('id_no') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">কর্মি মোবাইল নং</label>
                                            <input type="number" name="number" class="form-control"
                                                value="{{ $user_card->number }}">
                                            @if ($errors->has('number'))
                                                <span class="alert text-danger">
                                                    {{ $errors->first('number') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">গ্রাহকের নাম</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $user_card->name }}">
                                            @if ($errors->has('name'))
                                                <span class="alert text-danger">
                                                    {{ $errors->first('name') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">বাসা/প্রতিষ্ঠান</label>
                                            <input type="text" name="home_institution" class="form-control"
                                                value="{{ $user_card->home_institution }}">
                                            @if ($errors->has('home_institution'))
                                                <span class="alert text-danger">
                                                    {{ $errors->first('home_institution') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-2">
                                    <label for="">ঠিকানা</label>
                                    <input type="text" name="address" class="form-control"
                                        value="{{ $user_card->address }}">
                                    @if ($errors->has('address'))
                                        <span class="alert text-danger">
                                            {{ $errors->first('address') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mt-2">
                                            <label for="">রুট নং</label>
                                            <input type="text" name="route_no" class="form-control"
                                                value="{{ $user_card->route_no }}">
                                            @if ($errors->has('route_no'))
                                                <span class="alert text-danger">
                                                    {{ $errors->first('route_no') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mt-2">
                                            <label for="">নিজস্ব জার</label>
                                            <select name="own_jar" id="own_jar" class="form-control">
                                                {{-- <option value="">(Select)</option> --}}
                                                <option {{ $user_card->own_jar == 'হ্যাঁ' ? 'selected' : '' }}
                                                    value="হ্যাঁ">হ্যাঁ</option>
                                                <option {{ $user_card->own_jar == 'না' ? 'selected' : '' }} value="না">
                                                    না</option>
                                            </select>
                                            {{-- <input type="text" name="own_jar" class="form-control"
                                                value="{{ $user_card->own_jar }}"> --}}
                                            @if ($errors->has('own_jar'))
                                                <span class="alert text-danger">
                                                    {{ $errors->first('own_jar') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-2">
                                    <label for="">নিজস্ব ডিসপেন্সার</label>
                                    <select name="own_dispenser" id="own_dispenser" class="form-control">
                                        {{-- <option value="">(Select)</option> --}}
                                        <option {{ $user_card->own_dispenser == 'হ্যাঁ' ? 'selected' : '' }}
                                            value="হ্যাঁ">হ্যাঁ</option>
                                        <option {{ $user_card->own_dispenser == 'না' ? 'selected' : '' }} value="না">
                                            না</option>
                                    </select>
                                    @if ($errors->has('own_dispenser'))
                                        <span class="alert text-danger">
                                            {{ $errors->first('own_dispenser') }}
                                        </span>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-success mt-3">আপডেট করুন</button>
                            </form>
                        </div>
                    </div>
                </div><!-- End Left side columns -->

            </div>

            <div class="row mt-5">
                <div class="col-md-12">
                    {{-- @if (Session::has('calculation_success'))
                        <div class="alert alert-success">
                            {{ Session::get('calculation_success') }}
                        </div>
                    @endif --}}
                </div>
                <!-- Left user card information list columns -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">গ্রাহকের হিসাব <span>| লিস্ট</span></h5>
                            <div class="row">
                                <div class="col-md-12 text-end">
                                    <button type="button" class="btn btn-primary userCalculationAddedBtn" data-bs-toggle="modal"
                                        data-bs-target="#user_card_calculation_modal">গ্রাহকের হিসাব এড করুন</button>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-2">
                                        <span class="user_info_table_button"></span>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover user_info_table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">তারিখ</th>
                                                    <th scope="col">পানি সহ জার গ্রহণ</th>
                                                    <th scope="col">খালি জার ফেরত</th>
                                                    <th scope="col">ভরা জার অবশিষ্ট</th>
                                                    <th scope="col">টাকা প্রদান</th>
                                                    <th scope="col">বকেয়া</th>
                                                    <th scope="col">গ্রাহকের স্বাক্ষর</th>
                                                    <th scope="col">ইডিট/ডিলিট</th>
                                                </tr>
                                            </thead>
                                            @php
                                                $water_jars = 0;
                                                $empty_jars = 0;
                                                $full_jar_lefts = 0;
                                                $payment_moneys = 0;
                                                $total_dues = 0;
                                            @endphp
                                            <tbody>
                                                @foreach ($calculations as $calculation)
                                                    <tr>
                                                        <td>
                                                            {{ date('d-m-Y h:i A', strtotime($calculation->created_at)) }}
                                                        </td>
                                                        <td>
                                                            @if ($calculation->water_jar)
                                                                {{ $calculation->water_jar }} টা
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($calculation->empty_jar)
                                                                {{ $calculation->empty_jar }} টা
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($calculation->full_jar_left)
                                                                {{ $calculation->full_jar_left }} টা
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($calculation->payment_money)
                                                                {{ $calculation->payment_money }} টাকা
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($calculation->total_due)
                                                                {{ $calculation->total_due }} টাকা
                                                            @endif
                                                        </td>
                                                        <td>{{ $calculation->customer_signature }}</td>
                                                        <td>
                                                            <a href="{{ route('admin.customer.calculation.edit', $calculation->id) }}"
                                                                class="btn btn-success">ইডিট</a>
                                                            <a href="{{ route('admin.customer.calculation.destroy', $calculation->id) }}"
                                                                class="btn btn-danger">ডিলিট</a>
                                                        </td>
                                                    </tr>
                                                    @php
                                                        $water_jars += $calculation->water_jar;
                                                        $empty_jars += $calculation->empty_jar;
                                                        $full_jar_lefts += $calculation->full_jar_left;
                                                        $payment_moneys += $calculation->payment_money;
                                                        $total_dues += $calculation->total_due;
                                                    @endphp
                                                @endforeach
                                            </tbody>
                                            @if ($calculations->count() > 0)
                                                <tfooter>
                                                    <tr>
                                                        <th></th>
                                                        <th>মোট জার গ্রহণ = {{ $water_jars }} টা</th>
                                                        <th>মোট খালি জার = {{ $empty_jars }} টা</th>
                                                        <th>মোট ভরা জার = {{ $full_jar_lefts }} টা</th>
                                                        <th>মোট টাকা প্রদান = {{ $payment_moneys }} টাকা</th>
                                                        <th>মোট বকেয়া = {{ $total_dues }} টাকা</th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                </tfooter>
                                            @endif
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Left side columns -->

            </div>
        </section>

    </main><!-- End #main -->

    {{-- <span class="badge bg-success">Approved</span> --}}
    <!-- Modal -->
    @include('backend.partials.user_card_calculation_modal')
    {{-- MAIN CONTENT end --}}
@endsection

@section('script')

    <script>
        // user info calculattion
        function sum() {
            var water_jar = document.getElementById('water_jar').value;
            var empty_jar = document.getElementById('empty_jar').value;

            var result = parseInt(water_jar) - parseInt(empty_jar);
            if (!isNaN(result)) {
                document.getElementById('full_jar_left').value = result;
            }

            var money = document.getElementById('payment_money').getAttribute('data-price');
            var totalMoney = water_jar * money;
            var total_due = document.getElementById('total_due').value;
            if(total_due == "")
            {
                document.getElementById('payment_money').value = totalMoney;
            }else
            {
                var t_Money = totalMoney - total_due;
                document.getElementById('payment_money').value = t_Money;
            }
        }

        function due_calculate()
        {
            sum();
        }

        // user info table datatable
        var table = $('.user_info_table').DataTable();

        new $.fn.dataTable.Buttons(table, {
            buttons: [
                'excel', 'print'
            ]
        });

        table.buttons().container()
            .appendTo($('.user_info_table_button'));
    </script>

@endsection
