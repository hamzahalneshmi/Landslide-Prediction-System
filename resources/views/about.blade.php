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
        <div class="row">
            <div class="col-full s-content__main">
                <p>
                <img src="{{ asset('img\1.png') }}" 
                     srcset="{{ asset('img\1.png') }} 200w, 
                     {{ asset('img\1.png') }} 1000w" 
                     sizes="(max-width: 200px) 10vw, 200px" 
                     alt="" style="display:block; margin:auto;">
                </p>
            </div> <!-- s-content__main -->
        </div> <!-- end row -->
        <div class="row narrow">
            <div class="col-full s-content__header">
                <h1 class="display-1 display-1--with-line-sep">About Us </h1>
                <p class="lead">
                We are a research team that works under the supervision of Jiuyuan Huo, a professor at Lanzhou Jiaotong University. 
                Our goal is to propose a study that is beneficial in saving lives through studying landslides and build
                machine learning and deep learning models to classify and predict such a traumatic disaster.
                This website is mainly for publishing the studies results and discussions.
            </p>
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