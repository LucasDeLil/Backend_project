<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
    <style>
        .inventory-container {
            margin: 20px;
        }

        .inventory-table {
            width: 100%;
            border-collapse: collapse;
        }

        .inventory-table th, .inventory-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .inventory-table th {
            background-color: #f2f2f2;
            text-align: left;
        }

        .product-image {
            width: 100px;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        @include('home.header')
    </div>

    <div class="inventory-container">
        <h2>My Inventory</h2>
        <table class="inventory-table">
            <tr>
                <th>Product Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
            </tr>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->title }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }} gold</td>
                <td><img class="product-image" src="/products/{{ $product->image }}" alt="{{ $product->title }}"></td>
            </tr>
            @endforeach
        </table>
    </div>

    @include('home.footer')

    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
