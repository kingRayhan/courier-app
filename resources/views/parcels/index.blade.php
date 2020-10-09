<x-dashboard>
    <div class="level">
        <div class="level-left">
            <h1 class="text-2xl">আপনার পার্সেল সমূহ ({{ $parcels->count() }})</h1>
        </div>
        <div class="label-right field mb-0 mr-2 flex items-center">
            <div class="flex mr-2 items-center">
                <p class="mr-1">ফিল্টার করুন:</p>
                <form action="{{ route('parcels.index') }}" method="GET" id="filter">
                    <div class="select is-small">
                        <select name="status" onchange="document.getElementById('filter').submit()">
                            <option value="">All</option>
                            <option {{ $status[0] == 'placed' ? 'selected' : '' }} value="placed">placed</option>
                            <option {{ $status[0] == 'picked' ? 'selected' : '' }} value="picked">picked</option>
                            <option {{ $status[0] == 'shipping' ? 'selected' : '' }} value="shipping">shipping</option>
                            <option {{ $status[0] == 'delivered' ? 'selected' : '' }} value="delivered">delivered
                            </option>
                            <option {{ $status[0] == 'cancelled' ? 'selected' : '' }} value="cancelled">cancelled
                            </option>
                            <option {{ $status[0] == 'returned' ? 'selected' : '' }} value="returned">returned</option>
                        </select>
                    </div>
                </form>
            </div>


            <a class="button is-danger is-small" href="{{route('parcels.create')}}">নতুন পার্সেল</a>
        </div>
    </div>

    @foreach($parcels as $parcel)
        <form action="{{route('parcels.destroy' , $parcel)}}" id="parcel-id-{{$parcel->id}}" method="POST">
            @csrf
            @method('delete')
        </form>
    @endforeach

    @if(auth()->user()->is_admin)
        <div class="table-container">
            <table class="table w-full">
                <thead>
                <tr>
                    <th>ট্র্যাকিং আইডি</th>
                    <th>মার্চেন্ট</th>
                    <th>গ্রাহক</th>
                    <th>Pickup Address</th>
                    <th>ওজন</th>
                    <th>COD এর পরিমাণ</th>
                    <th>মার্চেন্ট পাবে</th>
                    <th>টাকা গ্রহণ</th>
                    <th>অবস্থা</th>
                    <th>অর্ডার এর সময়</th>
                    <th>একশন</th>
                </tr>
                </thead>
                <tbody>
                @foreach($parcels as $parcel)
                    <tr>
                        <td>{{$parcel->tracking_id}}</td>
                        <td>{{$parcel->user->name}}</td>
                        <td>
                            {{$parcel->customer_name}}
                            <div class="text-gray-500 text-sm">
                                {{$parcel->customer_address}} <br>
                                {{$parcel->customer_phone}}
                            </div>
                        </td>
                        <td>
                            {{$parcel->shop->name}} <br>
                            <div class="text-gray-500 text-sm">
                                {{$parcel->shop->pickup_address}} <br>
                                {{$parcel->shop->shop_phone}}
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
                            <a href="{{ route('parcels.show', $parcel) }}" class="text-green-500 mr-2">বিস্তারিত</a>
                            <a href="{{ route('parcels.edit', $parcel) }}" class="text-green-500 mr-2">সংস্কার</a>

                            <a href="javascript:void(0)"
                               onclick="confirm('Sure to delete?') && document.getElementById('parcel-id-{{ $parcel->id }}').submit()"
                               class="text-red-600">মুছুন</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else

                <div class="table-container">
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
                                <td>{{$parcel->tracking_id}}</td>
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
                    @endif

                    {{$parcels->appends(request()->query())->links()}}
                </div>
</x-dashboard>
