<!DOCTYPE html>
<html>

<head>
    @include('home.css')

    <style>
        .div_center {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        .detail-box {
            padding: 15px;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->

    </div>
    <!-- end hero area -->

    <!-- Product Details -->

    <section class="shop_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Latest Products
                </h2>
            </div>
            <div class="row">


                <div class="col-md-10">
                    <div class="box">

                        <div class="div_center">
                            <img width="400" src="/users/{{$data->profile_pic}}" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>{{$data->name}}</h6>
                            <h6>Birthday
                                <span>{{$data->birthday}}</span>
                            </h6>
                        </div>


                        <div class="detail-box">
                            <p style="font-weight: bold;">About Me:</p>


                        </div>
                        <div class="detail-box">


                            <p>{{$data->about_me}}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>

    <!-- End Product Details -->




    <!-- info section -->

    @include('home.footer')

    <!-- end info section -->


    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <script src="{{asset('js/custom.js')}}"></script>

</body>

</html>