<div class="modal fade" id="user_card_added_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">এখান থেকে গ্রাহক এড করুন</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.user.card.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mt-2">
                                <label for="">আইডি নং</label>
                                <input type="text" name="id_no" class="form-control">
                                @if ($errors->has('id_no'))
                                    <span class="alert text-danger">
                                        {{ $errors->first('id_no') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mt-2">
                                <label for="">কর্মি মোবাইল নং</label>
                                <input type="number" name="number" class="form-control">
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
                            <div class="form-group mt-2">
                                <label for="">গ্রাহকের নাম</label>
                                <input type="text" name="name" class="form-control">
                                @if ($errors->has('name'))
                                    <span class="alert text-danger">
                                        {{ $errors->first('name') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mt-2">
                                <label for="">বাসা/প্রতিষ্ঠান</label>
                                <input type="text" name="home_institution" class="form-control">
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
                        <input type="text" name="address" class="form-control">
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
                                <input type="text" name="route_no" class="form-control">
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
                                    <option value="">(Select)</option>
                                    <option value="হ্যাঁ">হ্যাঁ</option>
                                    <option value="না">না</option>
                                </select>
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
                            <option value="">(Select)</option>
                            <option value="হ্যাঁ">হ্যাঁ</option>
                            <option value="না">না</option>
                        </select>
                        @if ($errors->has('own_dispenser'))
                            <span class="alert text-danger">
                                {{ $errors->first('own_dispenser') }}
                            </span>
                        @endif
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">বাতিল করুন</button>
                    <button type="submit" class="btn btn-primary">এড করুন</button>
                </div>
            </form>
        </div>
    </div>
</div>
