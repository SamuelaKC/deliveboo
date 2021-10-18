<div style="background-color: black;display: inline-block" class="container-fluid">
    <!-- Right Side Of Navbar -->
    <ul style="color: white;" class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
        <li>
            <a class="nav-link"  href="{{ route('login') }}">
            {{
                __("Login")
            }}
            </a>
        </li>
        @if (Route::has('register'))
        <li>
            <a class="nav-link" href="{{ route('register') }}">
            {{__("Registra Ristorante")}}
            </a>
        </li>
        @endif @else
        <li class="nav-item dropdown">
        <button class="btn btn-nav">
            <a
                id="navbarDropdown"
                class="btn link-bluegreen dropdown-toggle"
                href="#"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
                v-pre
            >
                {{ Auth::user()->name }}
            </a>

            <div
                class="dropdown-menu dropdown-menu-right"
                aria-labelledby="navbarDropdown"
            >
                <a
                    class="dropdown-item"
                    href="{{ route('dashboard') }}"
                >
                    Dashboard
                </a>


                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                    <a class="dropdown-item" href="{{ route('dashboard') }}">
                        Dashboard
                    </a>

                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                <form
                    id="logout-form"
                    action="{{ route('logout') }}"
                    method="POST"
                    class="d-none"
                >
                    @csrf
                </form>
            </div>
        </button>
        </li>
        @endguest
    </ul>
</div>