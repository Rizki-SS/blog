<header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
            <div class="container">
                <a class="navbar-brand" href="#"><strong>Navbar</strong></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('welcome') }}">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('allpost') }}">Blog</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="view intro-2" @yield('cover')>
            <div class="full-bg-img">
                <div class="mask flex-center rgba-black-strong">
                    <div class="container text-center white-text wow fadeInUp">
                        <h1>@yield('title')</h1>
                        @yield('header_text')
                    </div>
                </div>
            </div>
        </div>

    </header>