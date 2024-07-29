<div class="d-flex align-items-stretch">
  <nav id="sidebar">
    <ul class="list-unstyled">
      <li class="active"><a href="{{url('admin/dashboard')}}"> <i class="icon-home"></i>Home </a></li>
      <li><a href="{{url('view_category')}}"> <i class="icon-grid"></i>Category </a></li>
      <li><a href="{{url('view_user')}}"> <i class="icon-grid"></i>All Users </a></li>
      <li><a href="{{url('view_contact')}}"> <i class="icon-grid"></i>All Contact Us</a></li>
      <li><a href="{{ route('faq.edit_faq') }}"> <i class="icon-grid"></i>All FAQ</a></li> 
      <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Products </a>
        <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
          <li><a href="{{url('add_product')}}">Add Product</a></li>
          <li><a href="{{url('view_product')}}">View Product</a></li>
        </ul>
      </li>
    </ul>
  </nav>