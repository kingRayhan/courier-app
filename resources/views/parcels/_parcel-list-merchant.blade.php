<table class="table w-full">
    <thead>
    <tr>
        <th>ট্র্যাকিং আইডি</th>
        <th>দোকান</th>
        <th>গ্রাহক</th>
        <th>ওজন</th>
        <th>COD এর পরিমাণ</th>
        <th>আপনি পাবেন</th>
        <th>টাকা গ্রহণ</th>
        <th>অবস্থা</th>
        <th>অর্ডার এর সময়</th>
        <th>একশন</th>
    </tr>
    </thead>
    <tbody>
    @foreach($parcels as $parcel)
        <tr>
            <td><a href="{{route('tracker' , ['tracking_code' => $parcel->tracking_id])}}">{{$parcel->tracking_id}}</a>
            </td>
            <td>
                {{$parcel->shop->name}} <br>
                <div class="text-gray-500 text-sm">
                    {{$parcel->shop->pickup_address}} <br>
                    {{$parcel->shop->shop_phone}}
                </div>
            </td>
            <td>
                {{$parcel->customer_name}}
                <div class="text-gray-500 text-sm">
                    {{$parcel->customer_address}} <br>
                    {{$parcel->customer_phone}}
                </div>
            </td>
            <td>{{$parcel->weight}} কেজি</td>
            <td>{{$parcel->parcel_price}}</td>
            <td>{{$parcel->merchant_payback_amount}}</td>
            <td>
                @if($parcel->cod_collected)
                    <span class="tag is-success">হ্যাঁ</span>
                @else
                    <span class="tag is-danger">না</span>
                @endif
            </td>
            <td>{{$parcel->status}}</td>
            <td>
                {{$parcel->created_at->format('d m Y')}}
                <div>
                    {{$parcel->created_at->format('g:i a')}}
                </div>
            </td>
            <td>
                <a href="{{ route('parcels.show', $parcel) }}"
                   class="text-green-500 mr-2">বিস্তারিত</a>
                <a href="{{ route('parcels.edit', $parcel) }}"
                   class="text-green-500 mr-2">সংস্কার</a>

                <a href="javascript:void(0)"
                   onclick="confirm('Sure to delete?') && document.getElementById('parcel-id-{{ $parcel->id }}').submit()"
                   class="text-red-600">মুছুন</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
