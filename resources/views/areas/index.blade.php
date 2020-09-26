<x-dashboard>
    <div class="level">
        <div class="level-left">
            <h1 class="text-2xl">সকল এরিয়া সমূহ ({{ $areas->total() }})</h1>
        </div>
        <div class="level-right">
            @can('create', \App\Models\Area::class)
                <a class="button is-danger" href="{{ route('areas.create') }}">নতুন</a>
            @endcan
        </div>
    </div>

    <div class="mt-3">
        <div class="columns is-multiline">
            @foreach($areas as $area)
                <div class="column is-4">
                    <form action="{{route('areas.destroy', $area)}}" method="POST"
                          id="area-delete-id-{{ $area->id }}">
                        @csrf
                        @method('DELETE')
                    </form>
                    <div class="card">
                        <div class="card-content">
                            <h3 class="text-3xl">{{ $area->name }}</h3>
                        </div>

                        @can('create', \App\Models\Area::class)
                            <div class="card-footer">
                                <div class="card-footer-item">
                                    <a
                                        href="{{ route('areas.edit', $area) }}"
                                        class="has-text-success">সংস্কার</a>
                                </div>
                                <div class="card-footer-item">
                                    <a
                                        onclick="confirm('আসলেই মুছে ফেলছে চান?') && document.getElementById('area-delete-id-{{ $area->id }}').submit()"
                                        href="javascript:void(0)"
                                        class="has-text-danger">মুছুন</a>
                                </div>
                            </div>
                        @endcan

                    </div>
                </div>
            @endforeach

            {{ $areas->links() }}

        </div>
    </div>

</x-dashboard>
