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
                            <th>Message</th>
                            <th>Response</th>
                            <th>Status</th>
                            <th>Answer</th>
                        </tr>
                        @foreach($contact as $contacts)
                        <tr>
                            <td>{{$contacts->name}}</td>
                            <td>{{$contacts->email}}</td>
                            <td>{{$contacts->message}}</td>
                            <td>{{$contacts->response}}</td>
                            <td>{{$contacts->status}}</td>
                            <td> <a class="btn btn-success" href="{{url('update_contact',$contacts->id)}}">Answer</a></td>
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