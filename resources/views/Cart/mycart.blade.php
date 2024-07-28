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

        .cart_value {
            text-align: center;
            margin-bottom: 70px;
            padding: 18px;
        }

        .purchase_button {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        @include('home.header')
    </div>
    <div class="div_design">
        <table class="table_design">
            <tr>
                <th>Product title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Remove</th>
            </tr>

            @php
            $totalValue = 0;
            @endphp

            @foreach($cart as $cartItem)
            <tr>
                <td>{{ $cartItem->product->title }}</td>
                <td>{{ $cartItem->product->price }}</td>
                <td><img height="120" width="120" src="products/{{ $cartItem->product->image }}" alt=""></td>
                <td><a class="btn btn-danger" onclick="confirmation(event)" href="{{ url('remove_cart', $cartItem->id) }}">Remove</a></td>
            </tr>

            @php
            $totalValue += $cartItem->product->price;
            @endphp
            @endforeach
        </table>
    </div>

    <div class="cart_value">
        <h3>Total Value of Cart is: {{ $totalValue }} gold</h3>
    </div>

    <div class="purchase_button">
        <form action="{{ url('purchase') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Purchase</button>
        </form>
    </div>

    @include('home.footer')

    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

    <script>
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');

            swal({
                title: "Are you sure to DELETE this?",
                text: "This delete will be permanent",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    window.location.href = urlToRedirect;
                }
            });
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
