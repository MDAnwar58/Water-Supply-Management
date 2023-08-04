@extends('layouts.backend')

@section('title', 'ড্যাশবোর্ড')

@section('content')
    {{-- MAIN CONTENT start  --}}

    <main id="main" class="main">
        @include('backend.partials.pagetitle')
        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-12">
                            @if (Session::has('error'))
                                <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                </div>
                            @endif
                        </div>

                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">মোট লেনদেন</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cart"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>
                                                @if ($calculations->count() > 0)
                                                    {{ $calculations->count() }} টা
                                                @else
                                                    0
                                                @endif
                                            </h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->

                        <!-- total payment Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">
                                <div class="card-body">
                                    <h5 class="card-title">মোট টাকা</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-currency-dollar"></i>
                                        </div>
                                        <div class="ps-3">
                                            @php
                                                $payment_moneys = 0;
                                            @endphp
                                            @foreach ($calculations as $calculation)
                                                @php
                                                    $payment_moneys += $calculation->payment_money;
                                                @endphp
                                            @endforeach
                                            <h6>{{ $payment_moneys }} টাকা</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->

                        <!-- total payment Card -->
                        <div class="col-md-6">
                            <div class="card info-card revenue-card">
                                <div class="card-body">
                                    <h5 class="card-title">মোট বকেয়া</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-currency-dollar"></i>
                                        </div>
                                        <div class="ps-3">
                                            @php
                                                $total_dues = 0;
                                            @endphp
                                            @foreach ($calculations as $calculation)
                                                @php
                                                    $total_dues += $calculation->total_due;
                                                @endphp
                                            @endforeach
                                            <h6>{{ $total_dues }} টাকা</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->

                        <!-- Customers Card -->
                        <div class="col-md-6">

                            <div class="card info-card customers-card">
                                <div class="card-body">
                                    <h5 class="card-title">গ্রাহক</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>
                                                @if ($user_cards->count() > 0)
                                                    {{ $user_cards->count() }} জন
                                                @else
                                                    0
                                                @endif
                                            </h6>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Customers Card -->



                    </div>
                </div><!-- End Left side columns -->

                <!-- Right side columns -->
                <div class="col-lg-4">

                    <!-- News & Updates Traffic -->
                    <div class="card">
                        <div class="card-body pb-0">
                            <h5 class="card-title">গ্রাহকের নতুন অর্ডার</h5>

                            <div class="news pb-3">
                                @if ($calculate_user->count() > 0)
                                    @foreach ($calculate_user as $calculate)
                                        <div class="post-item clearfix">
                                            <img src="{{ asset('backend/assets/img/card_user.png') }}"
                                                style="width: 80px; height: 80px;" class="rounded-circle" alt="">
                                            <h4><a href="#">{{ $calculate->user_card->name }}</a></h4>
                                            @if ($calculate->payment_money)
                                                <span class="ps-3" style="font-size: 13px;">
                                                    {{ $calculate->payment_money }} টাকা দিছে
                                                </span><br>
                                            @endif
                                            <span class="ps-3" style="font-size: 13px;">
                                                @if ($calculate->total_due > 0)
                                                    {{ $calculate->total_due }} বাকি টাকা
                                                @else
                                                    টাকা বাকি নেই
                                                @endif
                                            </span>
                                        </div>
                                    @endforeach
                                @else
                                @endif

                            </div><!-- End sidebar recent posts-->

                        </div>
                    </div><!-- End News & Updates -->

                </div><!-- End Right side columns -->

            </div>
            <div class="row">
                <!-- weekly reports -->
                <div class="col-md-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                            <h5 class="card-title">সপ্তাহিক রিপোর্ট</h5>
                            <span class="table_button"></span>
                            <table class="table table-borderless myTable" id="myTable">
                                <thead>
                                    <tr>
                                        <th scope="col">গ্রাহকের আইডি নং</th>
                                        <th scope="col">গ্রাহকের নাম</th>
                                        <th scope="col">পানি সহ জার গ্রহণ</th>
                                        <th scope="col">খালি জার ফেরত</th>
                                        <th scope="col">ভরা জার অবশিষ্ট</th>
                                        <th scope="col">টাকা প্রদান</th>
                                        <th scope="col">বকেয়া</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($calculation_weekly as $weely_customer)
                                        <tr>
                                            <th scope="row"><a
                                                    href="#">#{{ $weely_customer->user_card->id_no }}</a></th>
                                            <td>{{ $weely_customer->user_card->name }}</td>
                                            <td>
                                                @if ($weely_customer->water_jar)
                                                    {{ $weely_customer->water_jar }} টা
                                                @endif
                                            </td>
                                            <td>
                                                @if ($weely_customer->empty_jar)
                                                    {{ $weely_customer->empty_jar }} টা
                                                @endif
                                            </td>
                                            <td>
                                                @if ($weely_customer->full_jar_left)
                                                    {{ $weely_customer->full_jar_left }} টা
                                                @endif
                                            </td>
                                            <td>
                                                @if ($weely_customer->payment_money)
                                                    {{ $weely_customer->payment_money }} টাকা
                                                @endif
                                            </td>
                                            <td>
                                                @if ($weely_customer->total_due)
                                                    {{ $weely_customer->total_due }} টাকা
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div><!-- End weekly reports -->
            </div>

            <div class="row">
                <!-- monthly reports start -->
                <div class="col-md-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                            <h5 class="card-title">প্রতি মাসের রিপোর্ট</h5>
                            <span class="table_month_button"></span>
                            <table class="table table-borderless myMonthTable" id="myMonthTable">
                                <thead>
                                    {{-- <tr>
                                        <th colspan="5" class="heading text-center"></th>
                                    </tr> --}}
                                    <tr>
                                        <th scope="col">গ্রাহকের আইডি নং</th>
                                        <th scope="col">গ্রাহকের নাম</th>
                                        <th scope="col">পানি সহ জার গ্রহণ</th>
                                        <th scope="col">খালি জার ফেরত</th>
                                        <th scope="col">ভরা জার অবশিষ্ট</th>
                                        <th scope="col">টাকা প্রদান</th>
                                        <th scope="col">বকেয়া</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($calculation_monthly as $monthly_customer)
                                        <tr>
                                            <th scope="row"><a
                                                    href="#">#{{ $monthly_customer->user_card->id_no }}</a></th>
                                            <td>{{ $monthly_customer->user_card->name }}</td>
                                            <td>
                                                @if ($monthly_customer->water_jar)
                                                    {{ $monthly_customer->water_jar }} টা
                                                @endif
                                            </td>
                                            <td>
                                                @if ($monthly_customer->empty_jar)
                                                    {{ $monthly_customer->empty_jar }} টা
                                                @endif
                                            </td>
                                            <td>
                                                @if ($monthly_customer->full_jar_left)
                                                    {{ $monthly_customer->full_jar_left }} টা
                                                @endif
                                            </td>
                                            <td>
                                                @if ($monthly_customer->payment_money)
                                                    {{ $monthly_customer->payment_money }} টাকা
                                                @endif
                                            </td>
                                            <td>
                                                @if ($monthly_customer->total_due)
                                                    {{ $monthly_customer->total_due }} টাকা
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div><!-- monthly reports end -->
            </div>


        </section>

    </main><!-- End #main -->



    {{-- MAIN CONTENT end --}}
@endsection

@section('script')

    <script>
        var table = $('.myTable').DataTable();

        new $.fn.dataTable.Buttons(table, {
            buttons: [
                'excel', 'print'
            ]
        });

        table.buttons().container()
            .appendTo($('.table_button'));


        var table = $('.myMonthTable').DataTable();

        new $.fn.dataTable.Buttons(table, {
            buttons: [
                'excel', 'print'
            ]
        });

        table.buttons().container()
            .appendTo($('.table_month_button'));
    </script>

@endsection
