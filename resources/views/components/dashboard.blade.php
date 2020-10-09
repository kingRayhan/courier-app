@props(['headerHook' => '' , 'footerHook' => '', 'pageTitle' => ''])
<x-app-layout>
    <x-slot name="headerHook">
        {{$headerHook}}
    </x-slot>

    <x-slot name="footerHook">
        {{$footerHook}}
    </x-slot>

    <x-slot name="pageTitle">
        {{$pageTitle}}
    </x-slot>

    <div class="container is-fluid my-5">
        <div class="columns">
            <div class="column is-2 bg-white">
                @if(auth()->user()->is_admin)
                    <x-admin-menu/>
                @else
                    <x-merchant-menu/>
                @endif
            </div>
            <div class="column py-0">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-app-layout>
