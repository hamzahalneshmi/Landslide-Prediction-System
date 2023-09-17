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


        <section class="s-featured">
            <div class="row">
                <div class="col-full">
                    
                    <div class="featured-slider featured" data-aos="zoom-in">
                        @foreach ($newposts as $newpost)
                        <div class="featured__slide">
                            <div class="entry">
        
                            <div class="entry__background" style="background-image:url('/images/{{$newpost->image}}');"></div>
                                
                                <div class="entry__content">
                                    <span class="entry__category"><a href="{{url('category',$newpost->category->id)}}">{{$newpost->category->name}}</a></span>
        
                                <h1><a href="{{url('blog',$newpost->id)}}" title="">{{$newpost->title}}</a></h1>
        
                                    <div class="entry__info">
                                      
                                        <ul class="entry__meta">
                                            <li><a href="{{url('blog',$newpost->id)}}">{{$newpost->user->name}}</a></li>
                                            <li>{{$newpost->created_at->diffForHumans()}}</li>
                                        </ul>
                                    </div>
                                </div> <!-- end entry__content -->
                                
                            </div> <!-- end entry -->
                        </div> <!-- end featured__slide -->
                        @endforeach
                        
        
                        
                        
                    </div> <!-- end featured -->
        
                </div> <!-- end col-full -->
            </div>
        </section> <!-- end s-featured -->
        
     
    

    <!-- s-content
    ================================================== -->
    <section class="s-content">
        
        <div class="row entries-wrap wide">
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
