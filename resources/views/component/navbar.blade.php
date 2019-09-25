<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm sticky-top">
    <a class="navbar-brand"
       href="{{ url('/') }}">
        {{ config('app.name', 'Laravel') }}
    </a>
    <button class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse"
         id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
                <a class="nav-link"
                   href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link"
                   href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown"
                   class="nav-link dropdown-toggle"
                   href="#"
                   role="button"
                   data-toggle="dropdown"
                   aria-haspopup="true"
                   aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right"
                     aria-labelledby="navbarDropdown">
                    <a href="{{ url('/home') }}"
                       class="dropdown-item">{{ __('Dashboard') }}</a>
                    <div class="dropdown-divider"></div>
                    <button class="dropdown-item"
                            type="submit"
                            form="logout-form">{{ __('Logout') }}</button>
                    <form id="logout-form"
                          action="{{ route('logout') }}"
                          method="POST">
                        @csrf
                    </form>
                </div>
            </li>
            @endguest
        </ul>
    </div>
</nav>
