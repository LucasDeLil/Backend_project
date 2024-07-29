<!DOCTYPE html>
<html>

<head>
  @include('admin.css')

  <style>
    h1 {
      color: white;
    }

    .div_design {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    label {
      display: inline-block;
      width: 200px;
      padding: 15px;
      color: white;
    }

    input[type='text'] {
      width: 300px;
      height: 60px;
    }

    textarea {
      width: 450px;
      height: 100px;
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
        <h1>Edit Product</h1>

        <div class="div_design">
          <form action="{{url('edit_product',$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
              <label>Title</label>
              <input type="text" name="title" value="{{$data->title}}">
            </div>
            <div>
              <label>Description</label>
              <textarea name="description">{{$data->description}}</textarea>
            </div>
            <div>
              <label>Price</label>
              <input type="text" name="price" value="{{$data->price}}">
            </div>
            <div>
              <label>Quantity</label>
              <input type="text" name="quantity" value="{{$data->quantity}}">
            </div>
            <div>
              <label>Category</label>
              <select name="category">
                <option value="{{$data->category}}">{{$data->category}}</option>
                @foreach($category as $category)
                <option value="{{$data->category}}">{{$category->category_name}}</option>
                @endforeach
              </select>
            </div>
            <div>
              <label> Current Image</label>
              <img height="250" width="250" src="/products/{{$data->image}}">
            </div>
            <div>
              <label>New Image</label>
              <input type="file" name="image">
            </div>
            <div>
              <input class="btn btn-success" type="submit" value="Update Product">
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
  <!-- JavaScript files-->
  @include('admin.js')
</body>

</html>