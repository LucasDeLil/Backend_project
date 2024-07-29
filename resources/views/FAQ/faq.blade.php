<!DOCTYPE html>
<html>

<head>
    @include('home.css')
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->

    </div>
    <!-- end hero area -->

    <div class="container">
        <div class="mb-3">

            <h1>FAQ</h1>

        </div>
    </div>

    <div class="container">
        @foreach($categories as $category)
        <h2>{{ $category->name }}</h2>
        <div class="row">
            @foreach($category->faqItems as $faqItem)
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><strong>Q:</strong> {{ $faqItem->question }}</h5>
                        <p class="card-text"><strong>A:</strong> {{ $faqItem->answer }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <hr>
        @endforeach
    </div>


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