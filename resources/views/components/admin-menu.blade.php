<aside class="menu">
    <p class="menu-label">
        General
    </p>
    <ul class="menu-list">
        <li>
            <a
                class="{{ request()->is('areas.index') ? 'is-active' : '' }}"
                href="{{ route('parcels.index') }}">
                পার্সেল অর্ডার
            </a>
        </li>
        <li>
            <a
                class="{{ request()->is('zones.index') ? 'is-active' : '' }}"
                href="{{ route('zones.index') }}">জোনসমূহ</a>
        </li>
        <li>
            <a
                class="{{ request()->is('areas.index') ? 'is-active' : '' }}"
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
