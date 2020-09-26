<x-app-layout>
    <div class="container is-fluid my-5">
        <div class="columns">
            <div class="column is-2 bg-white">
                @if(auth()->user()->is_admin)
                    <x-admin-menu/>
                @else
                    <h1>Merchant Sidebar</h1>
                @endif
            </div>
            <div class="column py-0">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-app-layout>
