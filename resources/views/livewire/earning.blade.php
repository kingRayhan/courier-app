<div>
    <div class="level">
        <div class="level-left">
            <h2 class="text-2xl">ডেলিভারকৃত পার্সেল সমূহ ({{ $parcels->count() }}) | সর্বমোট
                আদায়: {{ $parcels->sum('merchant_payback_amount') }} টাকা</h2>
        </div>
        <div class="level-right">
            <a class="button is-danger" href="{{ route('parcels.create') }}">নতুন পার্সেল</a>
        </div>
    </div>


    <div class="table-container">
        <table class="table" style="width:100%">
            <thead>
            <tr>
                <th>ট্র্যাকিং আইডি</th>
                <th>গ্রাহক</th>
                <th>পার্সেল এর মূল্য</th>
                <th>গৃহিত টাকা</th>
                <th>অর্ডার এর সময়</th>
                <th>একশন</th>
            </tr>
            </thead>
            <tbody>

            @foreach($parcels as $parcel)
                <tr>
                    <td><a class="text-red-500" target="_blank"
                           href="##?tracking_id={{ $parcel->tracking_id }}">
                            {{$parcel->tracking_id}}
                        </a>
                    </td>
                    <td>
                        {{$parcel->customer_name}}
                        <div class="text-gray-500 text-sm">
                            {{$parcel->customer_address}} <br>
                            {{$parcel->customer_phone}}
                        </div>
                    </td>
                    <td>{{ $parcel->parcel_price }}</td>
                    <td>{{ $parcel->merchant_payback_amount }}</td>
                    <td>
                        {{$parcel->created_at->format('d m Y')}}
                        <div>
                            {{$parcel->created_at->format('g:i a')}}
                        </div>
                    </td>
                    <td>
                        <a href="{{ route('parcels.show', $parcel) }}"
                           class=" text-green-500 mr-2">
                            বিস্তারিত
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>
