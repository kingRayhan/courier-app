<div>
    <div class="column py-0">
        <div class="columns">
            <div class="column is-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-header-title">নতুন পার্সেল রিক্যুয়েস্ট তৈরি করুন</div>
                    </div>
                    <div class="card-content">
                        <div class="columns">
                            <div class="column is-6">
                                <div class="field">
                                    <label class="label">গ্রাহক এর নাম</label>
                                    <div class="control">
                                        <input
                                            class="input false"
                                            type="text"
                                            name="customer_name"
                                            wire:model="customer_name"
                                            placeholder="গ্রাহক এর নাম">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">গ্রাহক এর ফোন নম্বর</label>
                                    <div class="control">
                                        <input
                                            class="input false"
                                            type="text"
                                            name="customer_phone"
                                            wire:model="customer_phone"
                                            placeholder="গ্রাহক এর ফোন নম্বর">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">গ্রাহক এর ঠিকানা</label>
                                    <div class="control">
                                            <textarea
                                                class="textarea false"
                                                name="customer_address"
                                                wire:model="customer_address"
                                                placeholder="গ্রাহক এর ঠিকানা">
                                            </textarea>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Invoice/SKU নম্বর</label>
                                    <div class="control">
                                        <input
                                            class="input"
                                            type="text"
                                            name="invoice_id"
                                            wire:model="invoice_id"
                                            placeholder="Invoice/SKU নম্বর">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">পার্সেল এর মূল্য</label>
                                    <div class="control">
                                        <input
                                            class="input"
                                            type="number"
                                            name="parcel_price"
                                            wire:model="parcel_price"
                                            placeholder="পার্সেল এর মূল্য"
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="column is-6">
                                <div class="field">
                                    <label class="label">দোকান</label>
                                    <div class="control has-icons-left">
                                        <select class="select2 w-full" name="shop_id" wire:model="shop_id">
                                            <option value="">...</option>
                                            @foreach($shops as $shop)
                                                <option value="{{$shop->id}}">{{$shop->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">পার্সেল এর ওজন</label>
                                    <div>
                                        <input
                                            class="w-9/12"
                                            type="range"
                                            name="weight"
                                            min="1"
                                            max="5"
                                            wire:model="weight"
                                            value="1">
                                        <span>{{$weight}} কেজি</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="column is-4">
                <div class="card">
                    <div class="card-header">
                        <div class="card-header-title">ডেলিভারি চার্জের বিস্তারিত</div>
                    </div>
                    <div class="card-content flex flex-col justify-between">
                        <div>
                            <div class="level mb-1">
                                <div class="level-left">পার্সেল এর মূল্য</div>
                                <div class="level-right">{{ $parcel_price }}&nbsp;টাকা</div>
                            </div>
                            <div class="level mb-1">
                                <div class="level-left">পার্সেল এর ওজন</div>
                                <div class="level-right">{{ $weight }} &nbsp;কেজি</div>
                            </div>
                            <div class="level mb-1">
                                <div class="level-left">ডেলিভারি ফি</div>
                                <div class="level-right">{{ $charge }}&nbsp;টাকা</div>
                            </div>
                            <hr class="mb-2 border-gray-400 border-1">
                            <div class="level mt-2">
                                <div class="level-left">গ্রাহক পে করবে</div>
                                <div class="level-right">{{ $charge + $parcel_price }} &nbsp;টাকা
                                </div>
                            </div>
                            <div class="level mb-0">
                                <div class="level-left">COD চার্জ (1%)</div>
                                <div class="level-right"><span x-text="parcel_price * .01"></span>&nbsp;টাকা</div>
                            </div>
                            <div class="level mb-1">
                                <div class="level-left">ডেলিভারি ফি</div>
                                <div class="level-right"><span x-text="delivary_charge"></span>&nbsp;টাকা</div>
                            </div>
                            <hr class="mb-2 border-gray-400 border-1">
                            <div class="level">
                                <div class="level-left">আপনি পাবেন</div>
                                <div class="level-right"><span
                                        x-text="(+delivary_charge + +parcel_price) - (delivary_charge + (parcel_price * .01))"></span>&nbsp;টাকা
                                </div>
                            </div>
                        </div>
                        <div class="field mt-4">
                            <button
                                wire:click="submit"
                                class="button is-danger is-fullwidth">অর্ডার করুন
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
