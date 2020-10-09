<div class="card">
    <div class="card-header">
        <div class="card-header-title">মার্চেন্ডাইজার এর তথ্য</div>
    </div>
    <div class="card-content">
        <div class="level">
            <div class="level-left">নাম:</div>
            <div class="level-right">{{ $parcel->user->name }}</div>
        </div>
        <div class="level">
            <div class="level-left">ইমেইল:</div>
            <div class="level-right">{{ $parcel->user->email }}</div>
        </div>

        <h3 class=" text-xl mb-1">দোকান</h3>
        <div>
            <h3>{{ $parcel->shop->name }}</h3>
            <h3>{{ $parcel->shop->pickup_address }}</h3>
            <h3>এরিয়া: {{ $parcel->shop->area->name }}</h3>
            <h3>জোন: {{ $parcel->shop->zone->name }}</h3>
        </div>
    </div>
</div>
