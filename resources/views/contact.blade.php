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

        <div class="row narrow">
            <div class="col-full s-content__header">
                <h1 class="display-1 display-1--with-line-sep">Contact Us.</h1>
                <p class="lead">
                    Our team provides these studies to the public with the support of Lanzhou Jiaotong University, </p>
            </div>
        </div>

        <div class="row">
            <div class="col-full s-content__main">
                <p>
                <img src="images/thumbs/contact/contact-1000.jpg" 
                     srcset="images/thumbs/contact/contact-2000.jpg 2000w, 
                             images/thumbs/contact/contact-1000.jpg 1000w, 
                             images/thumbs/contact/contact-500.jpg 500w" 
                     sizes="(max-width: 2000px) 100vw, 2000px" alt="">
                </p>

                <h2>Contact us</h2>

                
                
                <div class="row">
                    <div class="col-six tab-full">
                        <h4>Where to Find Us</h4>

                        <p>
                        No.88, Anning West Road<br>
                        Anning District, Lanzhou City<br>
                        730070 China
                        </p>

                    </div>

                    <div class="col-six tab-full">
                        <h4>Contact Info</h4>

                        <p>huojy@qq.com<br>
                            miyanshu@mail.lzjtu.cn <br>
                        
                        </p>

                    </div>
                </div>

                

            </div> <!-- s-content__main -->
        </div> <!-- end row -->

    </section> <!-- end s-content -->



    
    @include('FEpartials.footer')

    <!-- Java Script
    ================================================== -->
    <script src="{{ asset('js/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/js/plugins.js') }}"></script>
    <script src="{{ asset('js/js/main.js') }}"></script>







    </body>
</html>