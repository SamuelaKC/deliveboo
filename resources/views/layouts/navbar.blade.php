<div class="container-fluid nav-access">
    <!-- Right Side Of Navbar -->
    <ul class="ul-navbar">
        <!-- Authentication Links -->
        @guest
            <li>
                <a class="" href="{{ route('home') }}">
                    {{ __('Home') }}
                </a>
            </li>
            <li>
                <a class="" href="{{ route('login') }}">
                    {{ __('Accedi come Ristorante') }}
                </a>
            </li>
            @if (Route::has('register'))
                <li>
                    <a class="" href="{{ route('register') }}">
                        {{ __('Registra Ristorante') }}
                    </a>
                </li>
        @endif @else
            <li class="nav-item dropdown">
                <button class="btn btn-sm">
                    <a id="navbarDropdown" class="btn link-bluegreen dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" href="{{ route('home') }}">
                            Home
                        </a>

                        <a class="dropdown-item" href="{{ route('dashboard') }}">
                            Dashboard
                        </a>

                        <a class="dropdown-item" href="{{ route('plates.index') }}">
                            I Tuoi Piatti
                        </a>

                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </button>
            </li>
        @endguest
    </ul>
</div>
