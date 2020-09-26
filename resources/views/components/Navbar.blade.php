<div class="navbar shadow">

    <div class="navbar-brand brand-logo">
        <a href="/">
            <img src="{{ asset('logo.png') }}" alt="{{env('APP_NAME')}}">
        </a>
    </div>

    <div class="navbar-menu">
        <div class="navbar-end">
            @auth()

                <form action="{{route('logout')}}" id="logout" method="POSt"> @csrf </form>

                <div class="navbar-item has-dropdown is-hoverable">
                    <div class="navbar-link">
                        <img class="mr-2 rounded-full" src="{{auth()->user()->profile_photo_url}}"
                             alt="{{ auth()->user()->name }}">
                        {{ auth()->user()->name }}
                    </div>
                    <div class="navbar-dropdown">
                        <a class="navbar-item" href="{{ route('dashboard') }}">ড্যাসবোর্ড</a>
                        <a class="navbar-item" href="{{ route('profile.show') }}">সেটিংস</a>
                        <a class="navbar-item" href="javascript:void(0)"
                           onclick="confirm('Sure to logout') && document.getElementById('logout').submit()">লগআউট
                            করুন</a>
                    </div>
                </div>
            @endauth

            @guest()
                <div class="navbar-item">
                    <a href="{{ route('login') }}" class="button">লগইন</a>
                </div>
                <div class="navbar-item">
                    <a href="{{ route('register') }}" class="button is-danger"> নিবন্ধন </a>
                </div>
            @endguest
        </div>
    </div>
</div>
