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
    <section class="s-content s-content--top-padding s-content--narrow">

        <article class="row entry format-standard">

            <div class="entry__media col-full">
                <div class="entry__post-thumb">
                    <img src="/images/{{ $post->image }}" sizes="(max-width: 2000px) 100vw, 2000px" alt="">
                </div>
            </div>

            <div class="entry__header col-full">
                <h1 class="entry__header-title display-1">
                    {{ $post->title }}
                </h1>
                <ul class="entry__header-meta">
                    <li class="date">{{ $post->created_at->diffForHumans() }}</li>
                    <li class="byline">
                        {{ __('lang.By') }}
                        <a href="#0">{{ $post->user->name }}</a>
                    </li>
                </ul>
            </div>

            <div class="col-full entry__main">

                <p class="lead drop-cap summernote">
                    {!! $post->body !!}
                </p>




               

                <div class="entry__author">


                    <div class="entry__author-about">
                        <h5 class="entry__author-name">
                            <span> {{ __('lang.Postedby') }}</span>
                            {{ $post->user->name }}
                        </h5>
                        <h5 class="entry__author-name"><span>{{ __('lang.PostedIn') }} </span>
                        
                            <a href="{{ url('category', $post->category->id) }}">{{ $post->category->name }}</a>
                        </h5>
                        <h5 class="entry__author-name">
                            <span>{{ __('lang.Posted') }}</span>
                            {{ $post->created_at->diffForHumans() }}
                        </h5>
                    </div>
                </div>

            </div> <!-- s-entry__main -->

        </article> <!-- end entry/article -->
        <div class="container">
            <h1 style="text-align: center;"> {{ __('lang.Comments') }}</h1>
        </div>

        @include('FEpartials.comments', ['comments' => $post->comments, 'post_id' => $post->id])
        <div class="row comment-respond">
            <div id="respond" class="col-full">
                <h3 class="h2">{{ __('lang.AddComment') }} <span>{{ __('lang.Youremail') }}</span></h3>
                <form name="contactForm" id="contactForm" method="post" action="{{ url('/admin/comments') }}"
                    autocomplete="off">
                    <fieldset>

                        @csrf
                        <div class="message form-field">
                            <textarea name="body" id="cMessage" class="full-width"
                                placeholder="Your Message*"></textarea>
                            <input type="hidden" name="post_id" value="{{ $post->id }}" />
                        </div>
                        <input name="submit" id="submit" class="btn btn--primary btn-wide btn--large full-width"
                            value="Add Comment" type="submit">
                    </fieldset>
                </form>
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
