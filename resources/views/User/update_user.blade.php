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

    input[type='email'] {
      width: 300px;
      height: 60px;
    }

    input[type='date'] {
      width: 300px;
      height: 60px;
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
        <h1>Edit User</h1>

        <div class="div_design">
          <form action="{{url('edit_user',$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
              <label>Name</label>
              <input type="text" name="name" value="{{$data->name}}" readonly>
            </div>
            <div>
              <label>Email</label>
              <input type="email" name="email" value="{{$data->email}}" readonly>
            </div>
            <div>
              <label>UserType</label>
              <input type="text" name="usertype" value="{{$data->usertype}}">Only one you can change

            </div>
            <div>
              <label>Phone</label>
              <input type="text" name="phone" value="{{$data->phone}}" readonly>
            </div>
            <div>
              <label>Birthday</label>
              <input type="date" name="birthday" value="{{$data->birthday}}" readonly>
            </div>
            <div>
              <input class="btn btn-success" type="submit" value="Update User">
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