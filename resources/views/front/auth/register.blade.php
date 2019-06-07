@extends('front.layouts.app')

@push('styles')
<style media="screen">
.login-re {
  position: relative;
  top: 38px;
  left: -207px;
}
</style>
@endpush

@section('content')

    <!-- Landing Page Contents
    ================================================= -->
    	<div class="container wrapper" style="padding-top:50px;padding-bottom:50px;">
        <div class="row col-md-12">
        	<div class="col-md-6">
          </div>

          @if(session('message'))
            <div class="alert alert-info alert-dismissible fade in" id="successMessage">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  {{session('message')}}
            </div>
          @endif

          @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade in" id="errorMessage">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  {{session('error')}}
            </div>
          @endif

        	<div class="col-sm-6 col-sm-offset-1">
            <div class="reg">
                <h3>Register your account</h3>
                <p class="text-muted">Be cool and join today. Meet millions</p>
                @if (count($errors) > 0)
                  <div class="alert alert-danger message">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <ul>
                        @foreach($errors->all() as $error)
                          <li>{{$error}}</li>
                        @endforeach
                      </ul>
                  </div>
                @endif

                <!-- <form class="" action="{{route('customRegisterSave')}}" method="post">
                  {{csrf_field()}}
                  <input type="text" name="name" value="">
                  <input type="text" name="lname" value="">
                  <input type="submit" name="" value="Submit">
                </form> -->

                    <form name="registration_form" method="post" action="{{route('customRegisterSave')}}" id='registration_form' class="form-inline" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <!-- <input type="hidden" name="_token" value="{{csrf_token()}}"> -->
                    <div class="row">
                      <div class="form-group col-xs-6">
                        <label for="firstname" class="sr-only">Name</label>
                        <input id="firstname" class="form-control input-group-lg" type="text" name="name" title="Enter name" placeholder="First name"/>
                      </div>

                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="email" class="sr-only">Email</label>
                        <input id="email" class="form-control input-group-lg" type="text" name="email" title="Enter Email" placeholder="Your Email"/>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" class="form-control input-group-lg" type="password" name="password" title="Enter password" placeholder="Password"/>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="password" class="sr-only">Confirm Password</label>
                        <input id="" class="form-control input-group-lg" type="password" name="password_confirmation" title="Enter password" placeholder="Confirm Password"/>
                      </div>
                    </div>

                    <div class="form-group gender">
                      <label class="radio-inline">
                        <input type="radio" name="gender" value="male" checked>Male
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="gender" value="female"> Female
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="gender" value="others">Others
                      </label>
                    </div>
                    
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="image" class="sr-only">Profile Image</label>
                        <input id="fileUpload" type="file" class="form-control input-group-lg" name="profile_image"/>
                      </div>
                    </div>

                      <div id="wrapper">
                             <div id="image-holder"></div>
                        </div>
                    <!-- <div class="row">
                      <div class="form-group col-xs-12">
                        <p class="birth"><strong>Date of Birth</strong></p>
                        <input type="" class="form-control input-group-lg datepicker" name="dob" id="datepicker" value="">
                      </div>
                    </div> -->

                    <!-- <div class="row"> -->
                      <!-- <p class="birth"><strong>Date of Birth</strong></p>
                      <div class="form-group col-sm-3 col-xs-6">

                        <label for="month" class="sr-only"></label>
                        <select class="form-control" id="day">
                          <option value="Day" disabled selected>Day</option>
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                          <option>6</option>
                          <option>7</option>
                          <option>8</option>
                          <option>9</option>
                          <option>10</option>
                          <option>11</option>
                          <option>12</option>
                          <option>13</option>
                          <option>14</option>
                          <option>15</option>
                          <option>16</option>
                          <option>17</option>
                          <option>18</option>
                          <option>19</option>
                          <option>20</option>
                          <option>21</option>
                          <option>22</option>
                          <option>23</option>
                          <option>24</option>
                          <option>25</option>
                          <option>26</option>
                          <option>27</option>
                          <option>28</option>
                          <option>29</option>
                          <option>30</option>
                          <option>31</option>
                        </select>
                      </div>
                      <div class="form-group col-sm-3 col-xs-6">
                        <label for="month" class="sr-only"></label>
                        <select class="form-control" id="month">
                          <option value="month" disabled selected>Month</option>
                          <option>Jan</option>
                          <option>Feb</option>
                          <option>Mar</option>
                          <option>Apr</option>
                          <option>May</option>
                          <option>Jun</option>
                          <option>Jul</option>
                          <option>Aug</option>
                          <option>Sep</option>
                          <option>Oct</option>
                          <option>Nov</option>
                          <option>Dec</option>
                        </select>
                      </div>
                       -->

                      <div class="row">
                        <div class="form-group col-xs-6">
                          <label for="city" class="sr-only">City</label>
                          <input id="city" class="form-control input-group-lg reg_name" type="text" name="city" title="Enter city" placeholder="Your city"/>
                      </div>

                        <div class="form-group col-xs-6">
                          <select name="country" class="selectpicker countrypicker form-control input-group-lg reg_name"
                                data-live-search="true"
                                data-default="Nepal">
                        </select>
                        </div>
                    </div>

                      <div class="form-group col-sm-6 col-xs-12">
                        <p><strong>Destination Type</strong></p>
                          <input type="checkbox" name="pilgrims" value="pilgrims">Pilgrims<br>
                          <input type="checkbox" name="foodie" value="foodie">Foodie<br>
                          <input type="checkbox" name="adventure" value="adventure" checked>Adventure<br>
                          <input type="checkbox" name="waterbody" value="waterbody" checked>Water Body<br>
                          <input type="checkbox" name="natureseeing" value="natureseeing" checked>Nature Seeing<br>
                          <input type="checkbox" name="ancient" value="ancient" checked>Ancient<br>
                      </div>

                    </div>

                    <div class="row">

                    <div class="col-md-12">
                      <input class="btn btn-primary col-sm-6 col-xs-12" type="submit" name="" value="Register Now">
                      <div class="login-re">
                        <a href="{{route('customLogin')}}">Already have an account?</a>
                      </div>
                    </div>
                  </div>

                    <!-- <button class="btn btn-primary">Register Now</button> -->
                  </form>



             </div>
        </div>
      </div>

    <!--preloader-->
    <div id="spinner-wrapper">
      <div class="spinner"></div>
    </div>

@endsection

@push('scripts')

<script src="countrypicker.js"></script>

<script>
// $('.datepicker').datepicker();
  $(document).ready(function() {
      // $("#datepicker").datepicker();
      $('.datepicker').datepicker;

  });

  $("#fileUpload").on('change', function () {

       if (typeof (FileReader) != "undefined") {

           var image_holder = $("#image-holder");
           image_holder.empty();

           var reader = new FileReader();
           reader.onload = function (e) {
               $("<img />", {
                   "src": e.target.result,
                   "class": "rounded",
                   'style': "border-radius: 50%;",
                   "width" : '200px'
               }).appendTo(image_holder);
           }
           image_holder.show();
           reader.readAsDataURL($(this)[0].files[0]);
       } else {
           alert("This browser does not support FileReader.");
       }
   });

</script>


@endpush
