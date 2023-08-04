<div class="modal fade" id="user_card_calculation_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">এখান থেকে গ্রাহকের হিসাব এড করুন</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.customer.calculation.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="user_card_id" value="{{ $user_card->id }}">


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mt-2">
                                <label for="">পানি সহ জার গ্রহণ</label>
                                <input type="number" name="water_jar" id="water_jar" onkeyup="sum()"
                                    class="form-control">
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
                                <input type="number" name="empty_jar" id="empty_jar" onkeyup="sum()"
                                    class="form-control">
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
                                <input type="number" name="full_jar_left" id="full_jar_left" class="form-control">
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
                                    <input type="number" name="payment_money" id="payment_money"
                                        data-price="{{ $jar_price }}" class="form-control">
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
                                <label for="">বকেয়া</label>
                                <input type="number" name="total_due" id="total_due" onkeyup="due_calculate()"
                                    class="form-control">
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
                            value="{{ $user_card->name }}">
                        @if ($errors->has('customer_signature'))
                            <span class="alert text-danger">
                                {{ $errors->first('customer_signature') }}
                            </span>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">বাতিল করুন</button>
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">ফর্মটি রিসেট করুন</button>
                    <button type="submit" class="btn btn-primary">এড করুন</button>
                </div>
            </form>
        </div>
    </div>
</div>
