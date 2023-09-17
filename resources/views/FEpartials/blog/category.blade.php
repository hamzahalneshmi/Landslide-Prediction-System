
@include('FEpartials.header')

<body id="top">
<!-- preloader================================================== -->
    <div id="preloader">
        <div id="loader" class="dots-fade">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>>

   

    @include('FEpartials.nav')



<!-- s-content
    ================================================== -->
    <section class="s-content s-content--top-padding">

        <div class="row narrow">
            <div class="col-full s-content__header" data-aos="fade-up">
                <h1 class="display-1 display-1--with-line-sep">{{ __('lang.Category') }} {{$categoryy->name}}</h1>
            </div>
        </div>
        
        <div class="row entries-wrap add-top-padding wide">
            <div class="entries">
                @foreach ($posts as $post)
                <article class="col-block">
                    <div class="item-entry" data-aos="zoom-in">
                        <div class="item-entry__thumb">
                            <a href="{{url('blog',$post->id)}}" class="item-entry__thumb-link">
                                <img src="/images/{{$post->image}}" alt="" style="width: 350px; height: 250px;">
                            </a>
                        </div>
        
                        <div class="item-entry__text">
                            <div class="item-entry__cat">
                                <a href="{{url('category',$post->category->id)}}">{{$post->category->name}}</a> 
                            </div>
    
                            <h1 class="item-entry__title"><a href="{{url('blog',$post->id)}}">{{$post->title}}</a></h1>
                                
                            <div class="item-entry__date">
                                <a href="{{url('blog',$post->id)}}">{{$post->created_at->diffForHumans()}}</a>
                            </div>
                        </div>
                    </div> <!-- item-entry -->

                </article> <!-- end article -->
                @endforeach
                
            </div> <!-- end entries -->
        </div> <!-- end entries-wrap -->

        <div class="row pagination-wrap">
            <div class="col-full">
                <nav class="pgn" data-aos="fade-up">
                    <ul>
                        <li>{{ $posts->links() }}</li>
            
                    </ul>
                </nav>
            </div>
        </div>

    </section> <!-- end s-content -->
@include('FEpartials.footer')
<!-- Java Script
    ================================================== -->
    <script src="{{ asset('js/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/js/plugins.js') }}"></script>
    <script src="{{ asset('js/js/main.js') }}"></script>







    </body>
</html>
    