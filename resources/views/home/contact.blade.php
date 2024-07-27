<section class="contact_section ">
    <div class="container px-0">
      <div class="heading_container ">
        <h2 class="">
          Contact Us
        </h2>
      </div>
    </div>
    <div class="container container-bg">
      <div class="row">
        <div class="col-lg-7 col-md-6 px-0">
          <div class="map_container">
            <div class="map-responsive">
              <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Erasmushogeschool+Brussel" width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%" allowfullscreen></iframe>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-5 px-0">
          <form action="{{url('add_contact_message')}}" method="post">
            @csrf
            <div>
              <label>Name:</label>
              <input type="text" name="name"  required/>
            </div>
            <div>
            <label>Email:</label>
              <input type="email" name="email" required/>
            </div>
            <div>
            <label>Message:</label>
              <input type="text" class="message-box" name="message"  required/>
            </div>
            <div class="">
              <input class="btn btn-success" type="submit" value="Send">
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <br><br><br>