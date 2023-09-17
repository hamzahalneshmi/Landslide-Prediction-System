
    <header class="s-header header">

        <div class="header__logo">
            <a class="logo" href="/">
                <img src="{{ asset('img/logo.svg') }}" alt="Homepage">
            </a>
        </div> <!-- end header__logo -->

        
        

        <a class="header__toggle-menu" href="#0" title="Menu"><span>{{ __('lang.Menu') }}</span></a>
        <nav class="header__nav-wrap">

            <h2 class="header__nav-heading h6">{{ __('lang.Navigateto') }}</h2>

            <ul class="header__nav">
                <li class="current"><a href="/" title="">{{ __('lang.Home') }}</a></li>
                <li class="has-children">
                    <a href="#0" title="">{{ __('lang.Categories') }}</a>
                    <ul class="sub-menu">
                        @foreach ($categories as $category)
                        <li><a href="{{url('category',$category->id)}}">{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
                
                <li><a href="/about-us" title="">{{ __('lang.About') }}</a></li>
                <li><a href="/contact-us" title="">{{ __('lang.Contact') }}</a></li>
                <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('login') }}">{{ __('lang.Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('register') }}">{{ __('lang.Register') }}</a>
                        </li>
                    @endif
                @else
                
                <li><a href="/admin/home" role="button">
                    {{ Auth::user()->name }}
                </a></li>
                
                        

                            <li><a href="{{ url('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('lang.Logout') }}
                            </a></li>

                            <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                @endguest

                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('locale/en') }}" class="nav-link" >
                     EN
                    </a>
                  </li>
            
                <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ url('locale/cn') }}" class="nav-link" >
                    CN
                </a>
                </li>
            </ul> <!-- end header__nav -->


        </nav> <!-- end header__nav-wrap -->

    </header> <!-- s-header -->