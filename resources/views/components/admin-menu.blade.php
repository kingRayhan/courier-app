<aside class="menu">
    <p class="menu-label">
        General
    </p>
    <ul class="menu-list">
        <li>
            <a
                class="{{ request()->routeIs('dashboard') ? 'is-active' : '' }}"
                href="{{ route('dashboard') }}">
                ড্যাসবোর্ড
            </a>
        </li>
        <li>
            <a
                class="{{ request()->routeIs('parcels.index') ? 'is-active' : '' }}"
                href="{{ route('parcels.index') }}">
                পার্সেল অর্ডার
            </a>
        </li>
        <li>
            <a
                class="{{ request()->routeIs('zones.index') ? 'is-active' : '' }}"
                href="{{ route('zones.index') }}">জোনসমূহ</a>
        </li>
        <li>
            <a
                class="{{ request()->routeIs('areas.index') ? 'is-active' : '' }}"
                href="{{ route('areas.index') }}">এরিয়াসমূহ</a>
        </li>
    </ul>


    <div class="menu-label">Accounts</div>
    <div class="menu-list">
        <ul>
            <li><a href="{{ route('profile.show') }}">প্রোফাইল হালনাগাদ</a></li>
        </ul>
    </div>
</aside>
