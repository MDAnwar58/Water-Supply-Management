@extends('layouts.backend')

@section('title', 'গ্রাহকের হিসাবের তথ্য')

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
                {{-- <div class="col-md-12 mb-3 text-end">
                    <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#user_card_added_modal">গ্রাহক এড করুন</button>
                </div> --}}


                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">গ্রাহকের হিসাবের তথ্য <span>| আপডেট করুন</span></h5>
                            <form action="{{ route('admin.customer.calculation.update', $calculation->id) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="user_card_id" value="{{ $calculation->user_card_id }}">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group mt-2">
                                            <label for="">পানি সহ জার গ্রহণ</label>
                                            <input type="number" name="water_jar" id="water_jar_update"
                                                class="form-control" value="{{ $calculation->water_jar }}"
                                                onkeyup="sum_update()">
                                            @if ($errors->has('water_jar'))
                                                <span class="alert text-danger">
                                                    {{ $errors->first('water_jar') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mt-2">
                                            <label for="">খালি জার ফেরত</label>
                                            <input type="number" name="empty_jar" id="empty_jar_update"
                                                class="form-control" value="{{ $calculation->empty_jar }}"
                                                onkeyup="sum_update()">
                                            @if ($errors->has('empty_jar'))
                                                <span class="alert text-danger">
                                                    {{ $errors->first('empty_jar') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mt-2">
                                            <label for="">ভরা জার অবশিষ্ট</label>
                                            <input type="number" name="full_jar_left" id="full_jar_left_update"
                                                class="form-control" value="{{ $calculation->full_jar_left }}">
                                            @if ($errors->has('full_jar_left'))
                                                <span class="alert text-danger">
                                                    {{ $errors->first('full_jar_left') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mt-2">
                                            @php
                                                if ($jars->count() > 0) {
                                                    foreach ($jars as $jar) {
                                                        $jar_price = $jar->price;
                                                    }
                                                }
                                            @endphp
                                            <label for="">টাকা প্রদান</label>
                                            @if ($jars->count() > 0)
                                                <input type="number" name="payment_money" id="payment_money_update"
                                                    data-price="{{ $jar_price }}" class="form-control" value="{{ $calculation->payment_money }}">
                                            @else
                                            <p><a href="{{ route('admin.jar.price') }}">দয়াকরে জারের দাম এবং করুন।</a></p>
                                            @endif
                                            @if ($errors->has('payment_money'))
                                                <span class="alert text-danger">
                                                    {{ $errors->first('payment_money') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mt-2">
                                            <label for="">মোট বকেয়া</label>
                                            <input type="number" name="total_due" id="total_due_update"
                                                onkeyup="due_calculate_update()" class="form-control"
                                                value="{{ $calculation->total_due }}">
                                            @if ($errors->has('total_due'))
                                                <span class="alert text-danger">
                                                    {{ $errors->first('total_due') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-2">
                                    <label for="">গ্রাহকের স্বাক্ষর</label>
                                    <input type="text" name="customer_signature" class="form-control"
                                        value="{{ $calculation->customer_signature }}">
                                    @if ($errors->has('customer_signature'))
                                        <span class="alert text-danger">
                                            {{ $errors->first('customer_signature') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group mt-2 text-end">
                                    <button type="submit" class="btn btn-primary">আপডেট করুন</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- End Left side columns -->

            </div>
        </section>

    </main><!-- End #main -->

    {{-- <span class="badge bg-success">Approved</span> --}}
    {{-- MAIN CONTENT end --}}
@endsection


@section('script')

    <script>
        // user info calculattion
        function sum_update() {
            var water_jar = document.getElementById('water_jar_update').value;
            var empty_jar = document.getElementById('empty_jar_update').value;

            var result = parseInt(water_jar) - parseInt(empty_jar);
            if (!isNaN(result)) {
                document.getElementById('full_jar_left_update').value = result;
            }

            var money = document.getElementById('payment_money_update').getAttribute('data-price');
            var totalMoney = water_jar * money;
            var total_due = document.getElementById('total_due_update').value;
            if (total_due == "") {
                document.getElementById('payment_money_update').value = totalMoney;
            } else {
                var t_Money = totalMoney - total_due;
                document.getElementById('payment_money_update').value = t_Money;
            }
        }

        function due_calculate_update() {
            sum_update();
        }
    </script>

@endsection
