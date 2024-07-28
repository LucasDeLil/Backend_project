<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    <style>

        .div_design {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;
        }

        .table_design {
            border: 2px solid black;
            text-align: center;
            width: 800px;
        }

        th {
            background-color: black;
            padding: 15px;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            color: white;
        }

        td {
            padding: 10px;          
            border: 1px solid gray;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
        <!-- slider section -->



        <!-- end slider section -->
    </div>
    <!-- end hero area -->
    <div class="div_design">

        <table class="table_design">
            <tr>
                <th>Product title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Remove</th>
            </tr>
            @foreach($cart as $cart)
            <tr>
                <td>{{$cart->product->title}}</td>
                <td>{{$cart->product->price}}</td>
                <td> <img height="120" width="120" src="products/{{$cart->product->image}}" alt=""></td>
                <td> <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('remove_cart',$cart->id)}}">Remove</a></td>
            </tr>
            @endforeach
        </table>

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