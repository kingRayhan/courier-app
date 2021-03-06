<a href="{{ route('parcels.create') }}" class="button is-fullwidth is-danger">
    <i class="fa fa-plus mr-2"></i>
    <span>নতুন পার্সেল</span>
</a>

<div class="menu">
    <div class="menu-list">
        <ul>
            <li>
                <a
                    class="{{request()->routeIs('dashboard') ? 'is-active' : ''}}"
                    href="{{route('dashboard')}}">
                    <i class="fa fa-tachometer" aria-hidden="true"></i>
                    ড্যাসবোর্ড
                </a>
            </li>

            <li>
                <a
                    class="{{request()->routeIs('parcels.index') ? 'is-active' : ''}}"
                    href="{{route('parcels.index')}}">
                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                    পার্সেল সমূহ
                </a>
            </li>
            <li>
                <a
                    class="{{request()->routeIs('shops.index') ? 'is-active' : ''}}"
                    href="{{route('shops.index')}}"><i class="fa fa-home" aria-hidden="true"></i>
                    দোকান সমূহ
                </a>
            </li>

            <li>
                <a
                    class="{{request()->routeIs('earnings') ? 'is-active' : ''}}"
                    href="{{route('earnings')}}"><i class="fa fa-usd" aria-hidden="true"></i>
                    উপার্জন
                </a>
            </li>

            <li>
                <a
                    class="{{request()->routeIs('profile.show') ? 'is-active' : ''}}"
                    href="{{route('profile.show')}}"><i class="fa fa-cog" aria-hidden="true"></i>
                    সেটিংস
                </a>
            </li>
        </ul>
    </div>
</div>
