<nav class="navbar navbar-lg">
    <div class="container-xxl">
        <div class="menu">
            <a href="#" class="nav-logo desktop-logo-view"><img src="{{asset('/img/logo.svg')}}" alt=""
                                                                        class="logo-img"></a>
            <button class="mobile-icons" id="mobile-icon">
                <i class="fa-solid fa-ellipsis-vertical"></i>
            </button>
            <div class="nav-menu-collaps" id="main-menu">
                <ul class="navbar-menu">
                    <li class="navbar-item"><a href="{{ route('vendor') }}" class="navbar-link">Home</a></li>
                    <li class="navbar-item"><a href="{{ route('vendor-mlm') }}" class="navbar-link">MLM</a></li>
                    <li class="navbar-item"><a href="{{ route('vendor-claims') }}" class="navbar-link">Claims</a></li>
                    <li class="navbar-item"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="navbar-link">Logout</a></li>
                </ul>
            </div>


            <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                @csrf
            </form>
        </div>
    </div>
</nav>
