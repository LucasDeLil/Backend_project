<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Some Other Users
            </h2>
        </div>
        <div class="row">

            @foreach($users as $users)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="box">

                    <div class="img-box">
                        <img src="users/{{$users->profile_pic}}" alt="">
                    </div>
                    <div class="detail-box">
                        <h6>
                            {{$users->name}}
                        </h6>
                    </div>
                    <a class="btn btn-danger" href="{{url('user_detail',$users->id)}}">Details</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="btn-box">
        <a href="{{url('all_users')}}">
            View All Users
        </a>
    </div>
    </div>
</section>