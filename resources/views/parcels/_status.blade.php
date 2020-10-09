<div class="card mt-4">
    <div class="card-header">
        <div class="card-header-title">Status</div>
    </div>
    <div class="card-content">
        <div class="level">
            <div class="level-left">
                গ্রাহক টাকা পে করেছে
            </div>
            <div class="level-right">{{ $parcel->customer_name ? "হ্যাঁ": "না"  }}</div>
        </div>
        <div class="level">
            <div class="level-left">
                পার্সেল এর status
            </div>
            <div class="level-right">{{ $parcel->status  }}</div>
        </div>
    </div>
</div>
