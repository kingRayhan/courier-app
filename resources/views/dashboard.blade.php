<x-dashboard>
    <div class="">
        <div class="columns">

            <div class="column">
                <a href="{{ route('parcels.index') }}?status=placed">
                    <div class="box">
                        <h3 class="text-red-500 font-bold">Placed</h3>
                        <h1 class="text-4xl">{{$placed}}</h1>
                    </div>
                </a>
            </div>

            <div class="column">
                <a href="{{ route('parcels.index') }}?status=picked">
                    <div class="box">
                        <h3 class="text-red-500 font-bold">Picked</h3>
                        <h1 class="text-4xl">{{$picked}}</h1>
                    </div>
                </a>
            </div>
            <div class="column">
                <a href="{{ route('parcels.index') }}?status=shipping">
                    <div class="box">
                        <h3 class="text-red-500 font-bold">Shipping</h3>
                        <h1 class="text-4xl">{{$shipping}}</h1>
                    </div>
                </a>
            </div>

            <div class="column">
                <a href="{{ route('parcels.index') }}?status=delivered">
                    <div class="box">
                        <h3 class="text-red-500 font-bold">Delivered</h3>
                        <h1 class="text-4xl">{{$delivered}}</h1>
                    </div>
                </a>
            </div>

            <div class="column">
                <a href="{{ route('parcels.index') }}?status=cancelled">
                    <div class="box">
                        <h3 class="text-red-500 font-bold">Cancelled</h3>
                        <h1 class="text-4xl">{{$cancelled}}</h1>
                    </div>
                </a>
            </div>

            <div class="column">
                <a href="{{ route('parcels.index') }}?status=returned">
                    <div class="box">
                        <h3 class="text-red-500 font-bold">Returned</h3>
                        <h1 class="text-4xl">{{$returned}}</h1>
                    </div>
                </a>
            </div>

        </div>
    </div>
</x-dashboard>
