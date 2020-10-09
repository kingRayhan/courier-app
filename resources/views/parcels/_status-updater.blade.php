<form action="{{route('parcels.update', $parcel)}}" method="POST">
    @method('put')
    @csrf
    <div class="card mt-5">
        <div class="card-content">
            <div class="field">
                <label for="status" class="label">অবস্থা</label>
                <div class="select w-full">
                    <select id="status" class="w-full" name="status">
                        <option {{ $parcel->status == "placed" ? "selected" : '' }} value="placed">Placed</option>
                        <option {{ $parcel->status == "picked" ? "selected" : '' }} value="picked">Picked</option>
                        <option {{ $parcel->status == "shipping" ? "selected" : '' }} value="shipping">Shipping</option>
                        <option {{ $parcel->status == "delivered" ? "selected" : '' }} value="delivered">Delivered
                        </option>
                        <option {{ $parcel->status == "cancelled" ? "selected" : '' }} value="cancelled">Cancelled
                        </option>
                        <option {{ $parcel->status == "returned" ? "selected" : '' }} value="returned">Returned</option>
                    </select>
                </div>
            </div>
            <div class="field">
                <label for="status" class="label">গ্রাহক এর কাছ থেকে টাকা আদায় করা হয়েছে?</label>
                <div class="select w-full">
                    <select id="status" class="w-full" name="cod_collected">
                        <option {{ $parcel->cod_collected ? "selected": '' }} value="true">হ্যাঁ</option>
                        <option {{ !$parcel->cod_collected ? "selected": '' }} value="false">না</option>
                    </select>
                </div>
            </div>
            <div class="field">
                <button class="button is-danger is-small">সংরক্ষণ করুন</button>
            </div>
        </div>
    </div>
</form>

