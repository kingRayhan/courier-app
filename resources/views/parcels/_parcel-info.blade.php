<div class="card">
    <div class="card-header">
        <div class="card-header-title">পার্সেল এর তথ্য</div>
    </div>
    <div class="card-content">
        <div class="level mb-1">
            <div class="level-left">পার্সেল এর মূল্য</div>
            <div class="level-right">{{ $parcel->parcel_price }}&nbsp;টাকা</div>
        </div>
        <div class="level mb-1">
            <div class="level-left">পার্সেল এর ওজন</div>
            <div class="level-right">{{ $parcel->weight }}&nbsp;কেজি</div>
        </div>
        <div class="level mb-1">
            <div class="level-left">ডেলিভারি ফি</div>
            <div
                class="level-right">{{ $delivery_charge }}
                &nbsp;টাকা
            </div>
        </div>
        <hr class="mb-2 border-gray-400 border-1">
        <div class="level mt-2">
            <div class="level-left">গ্রাহক পে করবে</div>
            <div class="level-right">{{ $client_payable }}&nbsp;টাকা</div>
        </div>
        <div class="level mb-0">
            <div class="level-left">COD চার্জ ({{env('COD_PERCENTAGE')}}%)</div>
            <div class="level-right">{{ $cod_charge }}</span>&nbsp;টাকা</div>
        </div>
        <div class="level mb-1">
            <div class="level-left">ডেলিভারি ফি</div>
            <div class="level-right">{{ $delivery_charge }}&nbsp;টাকা</div>
        </div>
        <hr class="mb-2 border-gray-400 border-1">
        <div class="level">
            <div class="level-left">আপনি পাবেন</div>
            <div class="level-right">{{$merchant_payable}}&nbsp;টাকা
            </div>
        </div>
    </div>
</div>
</div>
