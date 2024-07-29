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

  <!-- shop section -->
  
  <section class="shop_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>
        All the Items
      </h2>
    </div>
    <div class="row">

      @foreach($product as $products)
      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="box">
          
            <div class="img-box">
              <img src="products/{{$products->image}}" alt="">
            </div>
            <div class="detail-box">
              <h6>
                {{$products->title}}
              </h6>
              <h6>
                Price
                <span>
                  ${{$products->price}}
                </span>
              </h6>
            </div>
          <div style="padding: 15px;">

          <a class="btn btn-danger" href="{{url('product_details',$products->id)}}">Details</a>

          <a class="btn btn-primary" href="{{url('add_cart', $products->id)}}">Add to Cart</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  </div>
</section>
  <!-- end shop section -->



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