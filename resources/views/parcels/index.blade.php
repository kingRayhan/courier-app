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
            @if(!auth()->user()->is_admin)
                <a class="button is-danger is-small" href="{{route('parcels.create')}}">নতুন পার্সেল</a>
            @endif
        </div>
    </div>

    @foreach($parcels as $parcel)
        <form action="{{route('parcels.destroy' , $parcel)}}" id="parcel-id-{{$parcel->id}}" method="POST">
            @csrf
            @method('delete')
        </form>
    @endforeach

    <div class="table-container">
        @if(auth()->user()->is_admin)
            @include('parcels._parcel-list-admin')
        @else
            @include('parcels._parcel-list-merchant')
        @endif
        {{$parcels->appends(request()->query())->links()}}
    </div>
</x-dashboard>
