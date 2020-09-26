<x-dashboard>
    <div class="level">
        <div class="level-left">
            <h1 class="text-2xl">সকল জোন সমূহ ({{ $zones->total() }})</h1>
        </div>
        <div class="level-right">
            @can('create', \App\Models\Zone::class)
                <a class="button is-danger" href="{{ route('zones.create') }}">নতুন</a>
            @endcan
        </div>
    </div>

    <div class="mt-3">
        <div class="columns is-multiline">
            @foreach($zones as $zone)
                <div class="column is-4">
                    <form action="{{route('zones.destroy', $zone)}}" method="POST" id="zone-delete-id-{{ $zone->id }}">
                        @csrf
                        @method('delete')
                    </form>
                    <div class="card">
                        <div class="card-content">
                            <h3 class="text-3xl">{{ $zone->name }}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="card-footer-item">
                                <a
                                    href="{{ route('zones.edit', $zone) }}"
                                    class="has-text-success">সংস্কার</a>
                            </div>
                            <div class="card-footer-item">
                                <a
                                    onclick="confirm('আসলেই মুছে ফেলছে চান?') && document.getElementById('zone-delete-id-{{ $zone->id }}').submit()"
                                    href="javascript:void(0)"
                                    class="has-text-danger">মুছুন</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            {{ $zones->links() }}

        </div>
    </div>

</x-dashboard>
