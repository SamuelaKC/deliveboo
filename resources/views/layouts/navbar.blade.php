{{-- <nav class="jumbotron navbar navbar-expand-md navbar-light bg-navbar shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img style="width: 200px" src="/image/logo/deliveboo.svg" alt="">
        </a>
        <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="{{ __('Toggle navigation') }}"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto"></ul>

            <div class="input-group col-8">
                <input style="padding: 20px" type="search" class="form-control rounded" placeholder="Cerca qui i tuoi ristoranti preferiti 🍕 🍔 🍣 " aria-label="Search"
                aria-describedby="search-addon" />
                <span style="padding-left: 20px;">
                    <button type="button" class="btn btn-bluegreen">CERCA</button>
                </span>
            </div> 

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link"  href="{{ route('login') }}">
                    <button class="btn btn-nav">
                    {{
                        __("Login")
                    }}
                    </button></a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">
                    <button class="btn btn-nav">
                    {{__("Registra Ristorante")}}
                    </button></a>
                </li>
                @endif @else
                <li class="nav-item dropdown">
                <button class="btn btn-nav ">
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
    </div>
</nav> --}}
