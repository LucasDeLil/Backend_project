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
                <h1>View Users</h1>

                <div class="div_design">

                    <table class="table_design">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Usertype</th>
                            <th>Phone</th>
                            <th>Birthday</th>
                            <th>Profile Picture</th>
                            <th>Delete</th>
                        </tr>
                        @foreach($user as $users)
                        <tr>
                            <td>{{$users->name}}</td>
                            <td>{{$users->email}}</td>
                            <td>{{$users->usertype}}</td>
                            <td>{{$users->phone}}</td>
                            <td>{{$users->birthday}}</td>
                            <td> <img height="120" width="120" src="users/{{$users->profile_pic}}" alt=""></td>
                            <td> <a class="btn btn-success" href="{{url('update_user',$users->id)}}">Edit</a></td>
                        </tr>
                        @endforeach
                    </table>

                </div>

            </div>
        </div>
    </div>
<!-- JavaScript files-->
@include('admin.js')

</body>
</html>