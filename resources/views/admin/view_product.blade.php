<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

    <style>
        h1{
            color: white;
        }
        .div_design {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }

        .table_design {
            border: 2px solid #4EFFEF;
        }

        th {
            background-color: #4EFFEF;
            padding: 15px;
            font-size: 20px;
            font-weight: bold;
            color: #272932;
        }

        td {
            padding: 10px;
            color: white;
            border: 1px solid #4EFFEF;
            text-align: center;
        }
        input[type='search']
        {
            width: 500px;
            height: 40px;
            margin-left: 50px;
        }
    </style>
</head>

<body>
    @include('admin.header')
    <!-- Sidebar Navigation-->
    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h1>View Products</h1>

                <form action="{{url('product_search')}}" method="get">
                    <input type="search" name="search">
                    <input type="submit" class="btn btn-secondary" value="Search">
                </form>
                <div class="div_design">

                    <table class="table_design">
                        <tr>
                            <th>Product title</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        @foreach($product as $products)
                        <tr>
                            <td>{{$products->title}}</td>
                            <td>{!!Str::limit($products->description, 50)!!}</td>
                            <td>{{$products->category}}</td>
                            <td>{{$products->price}}</td>
                            <td>{{$products->quantity}}</td>
                            <td> <img height="120" width="120" src="products/{{$products->image}}" alt=""></td>
                            <td> <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_product',$products->id)}}">Delete</a></td>
                            <td> <a class="btn btn-success" href="{{url('update_product',$products->id)}}">Edit</a></td>
                        </tr>
                        @endforeach
                    </table>

                </div>
                <div class="div_design">
                    {{$product->onEachSide(1)->links()}}
                </div>
            </div>
        </div>
    </div>
<!-- JavaScript files-->
@include('admin.js')

</body>
</html>