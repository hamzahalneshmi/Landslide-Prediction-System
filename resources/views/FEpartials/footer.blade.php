@include('sweetalert::alert')

<!-- s-extra
    ================================================== -->
    <section class="s-extra">

        <div class="row">
            
            <div class="col-seven md-six tab-full popular">
                <h3>{{ __('lang.PopularPosts') }}</h3>

                <div class="block-1-2 block-m-full popular__posts">
                    @foreach ($popular_posts as $post)
                        <article class="col-block popular__post">
                            <a href="{{url('post',$post->id)}}" class="popular__thumb">
                                <img src="/images/{{$post->image}}" alt="">
                            </a>
                            <h5>{{$post->title}}</h5>
                            <section class="popular__meta">
                                <span class="popular__author"><span>{{ __('lang.By') }}</span> <a href="#0">{{$post->user->name}}</a></span>
                                <span class="popular__date">{{$post->created_at->diffForHumans()}}</time></span>
                            </section>
                        </article>
                    @endforeach
                    
                    
                </div> <!-- end popular_posts -->
            </div> <!-- end popular -->

            <div class="col-four md-six tab-full end">
                <div class="row">
                    <div class="col-six md-six mob-full categories">
                        <h3>{{ __('lang.Categories') }}</h3>
        
                        <ul class="linklist">
                            @foreach ($categories as $category)
                            <li><a href="{{url('category/show',$category->id)}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div> <!-- end categories -->
        
                    <div class="col-six md-six mob-full sitelinks">
                        <h3>{{ __('lang.SiteLinks') }}</h3>
        
                        <ul class="linklist">
                            <li><a href="/">{{ __('lang.Home') }}</a></li>
                            <li><a href="#">{{ __('lang.About') }}</a></li>
                            <li><a href="#">{{ __('lang.Contact') }}</a></li>
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
                        </ul>
                    </div> <!-- end sitelinks -->
                </div>
            </div>
        </div> <!-- end row -->

    </section> <!-- end s-extra -->


    <!-- s-footer
    ================================================== -->
    <footer class="s-footer">

        <div class="s-footer__main">
            <div class="row">
                
                <div class="col-six tab-full s-footer__about">
                        
                    <h4>{{ __('lang.aboutthehigh') }}</h4>

                    <p>{{ __('lang.thehighpre') }}</p>

                </div> <!-- end s-footer__about -->

                <div class="col-six tab-full s-footer__subscribe">
                        
                    <h4>{{ __('lang.OurNewsletter') }}</h4>

                    <p>{{ __('lang.joinnewsletter') }} </p>

                    <div class="subscribe-form">
                        <form class="group" method="POST" action="{{ url('newsletter') }}">
                            
                            @csrf
                            <input type="email"  name="Email" class="email" placeholder="{{ __('lang.EmailAddress') }}" style="background-color: lightgray">
                
                            <div class="form-group">
                                <input type="submit" class="btn btn-warning" value="{{ __('lang.Subscribe') }}" />
                            </div>

                            @include('partials.alerts')

                        </form>
                       
                                
                              
                    </div>
                    <div class="col-12">
                        <ul class="footer-social">
                            <li>
                                <a href="#0"><i class="fab fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#0"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#0"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#0"><i class="fab fa-youtube"></i></a>
                            </li>
                            <li>
                                <a href="#0"><i class="fab fa-pinterest"></i></a>
                            </li>
                        </ul>
                    </div>

                </div> <!-- end s-footer__subscribe -->

            </div>
        </div> <!-- end s-footer__main -->

        <div class="s-footer__bottom">
            <div class="row">

                

                <div class="col-six">
                    <div class="s-footer__copyright">
                        <span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            {{ __('lang.Copyright') }} &copy;<script>document.write(new Date().getFullYear());</script> {{ __('lang.Allrightsreserved') }}
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</span>
                    </div>
                </div>
                
            </div>
        </div> <!-- end s-footer__bottom -->

        <div class="go-top">
            <a class="smoothscroll" title="Back to Top" href="#top"></a>
        </div>

    </footer> <!-- end s-footer -->
