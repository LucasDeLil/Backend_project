<!DOCTYPE html>
<html>

<head>
  @include('home.css')

  <style>
h2{
  text-align: center;
  font-weight: bold;
  text-transform: uppercase;
}
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

  </div>
  <!-- end hero area -->
  <!-- contact section -->

  @include('Contact.contact')

  <!-- end contact section -->
  <h2 class="">
          Old Messages
        </h2>
  <div class="div_design">

<table class="table_design">
    <tr>
        <th>name</th>
        <th>email</th>
        <th>message</th>
        <th>response</th>
        <th>Creation Date</th>
        <th>Update Date</th>
    </tr>
    @foreach($contact as $contact)
    <tr>
        <td>{{$contact->name}}</td>
        <td>{{$contact->email}}</td>
        <td>{{$contact->message}}</td>
        <td>{{$contact->response}}</td>
        <td>{{$contact->created_at}}</td>
        <td>{{$contact->updated_at}}</td>

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