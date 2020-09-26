<x-dashboard>
    <div class="level">
        <div class="level-left">
            <h1 class="text-2xl">সকল দোকান সমূহ ({{ $shops->total() }})</h1>
        </div>
        <div class="level-right">
            <a class="button is-danger" href="{{ route('shops.create') }}">নতুন</a>
        </div>
    </div>


    <div class="mt-3">
        <div class="columns is-multiline">
            @foreach($shops as $shop)
                <form id="shops-delete-id-{{ $shop->id }}"
                      action="{{ route('shops.destroy' ,$shop) }}"
                      method="post">
                    @csrf
                    @method('delete')
                </form>
                <div class="column is-4">
                    <div class="card">
                        <div class="card-content">
                            <h3 class="text-xl">{{ $shop->name }}</h3>
                            <p>জোন: {{ $shop->zone->name }}</p>
                            <p>এরিয়া: {{ $shop->area->name }}</p>
                            <p>{{ $shop->pickup_address }}</p>
                            <p>{{ $shop->shop_phone }}</p>
                        </div>
                        <div class="card-footer">
                            <div class="card-footer-item">
                                <a href="{{ route('shops.edit' , $shop) }}"
                                   class="has-text-success">সংস্কার</a>
                            </div>
                            <div class="card-footer-item">
                                <a onclick="confirm('আসলেই মুছে ফেলছে চান?') && document.getElementById('shops-delete-id-{{ $shop->id }}').submit()"
                                   href="javascript:void(0)" class="has-text-danger">মুছুন</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

</x-dashboard>
