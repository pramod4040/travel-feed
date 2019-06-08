@extends('front.layouts.app')

@push('styles')
    <link href="{{asset('/assets/front/css/emoji.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('/assets/front/css/dist/bootstrap-tagsinput.css')}}" />
    <link rel="stylesheet" href="{{asset('/assets/front/css/dist/bootstrap-tagsinput.less')}}" />

    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="{{asset('/assets/front/images/')}}"/>
    <style>

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  padding-left: 300px;
  padding-right: 300px;
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.button {
  background-color: #217192;
  border: none;
  color: white;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>

@endpush

@section('content')


    <div id="page-contents">
    	<div class="container">
    		<div class="row">

          <!-- Newsfeed Common Side Bar Left
          ================================================= -->
    			<div class="col-md-3 static" style="padding-right: 30px;">
            <div class="profile-card">
            	<img src="{{asset('/uploads/userimage/profile/mainimage/'.\Auth()->user()->userprofile->profile_image)}}" alt="user" class="profile-photo" />
            	<h5><a href="{{route('userprofile')}}" class="text-white">{{\Auth()->user()->name}}</a></h5>
            	<a href="#" class="text-white"><i class="ion ion-android-person-add"></i> {{\Auth()->user()->countFollowers()}} followers</a>
            </div><!--profile card ends-->
            <ul class="nav-news-feed">
              <li><i class="icon ion-ios-paper"></i><div><a href="{{route('userprofile')}}">My Profile</a></div></li>
              <!-- <li><i class="icon ion-ios-people"></i><div><a href="nearbyplaces.html">Place Nearby</a></div></li> -->
            </ul><!--news-feed links ends-->
          </div>

    			<div class="col-md-6">

            <!-- Post Create Box
            ================================================= -->
            <div class="create-post" style="border: 1px solid #CDCBCA;">
            	<div class="row">
            		<div class="col-md-7 col-sm-7">
                  <div class="form-group">
                    <img src="{{asset('/uploads/userimage/profile/mainimage/'.\Auth()->user()->userprofile->profile_image)}}" alt="" class="profile-photo-md" />
                    Share Your Experience To The World!<br>
                    Be a Influencer..
                    <!-- <textarea name="texts" id="exampleTextarea" cols="30" rows="1" class="form-control" placeholder="Write what you wish"></textarea> -->
                  </div>
                </div>
            		<div class="col-md-5 col-sm-5">
                  <div class="tools">
                    <ul class="publishing-tools list-inline">
                      <li><a id="myBtn"><i class="ion-images"></i></a></li>
                      <li><a href="#"><i class="ion-ios-videocam"></i></a></li>
                      <li><a href="#"><i class="ion-map"></i></a></li>
                    </ul>
                    <button class="btn btn-primary pull-right">Publish</button>
                  </div>
                </div>
                <!-- The Modal -->
                  <div id="myModal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                      <span class="close">&times;</span>
                      <h3> Upload Picture...</h3><br>
                      <div class="form-group">
                    <img src="{{asset('/uploads/userimage/profile/mainimage/'.\Auth()->user()->userprofile->profile_image)}}" alt="" class="profile-photo-md" /><br>

                    <form class="" action="{{route('savePost')}}" method="post" enctype="multipart/form-data">
                      @csrf
                    <textarea name="description" id="exampleTextarea" cols="30" rows="1" class="form-control" placeholder="Write what you wish..."></textarea><br>

                  </div><br>
                  <div class="form-group">

                  <input type="text" name="tags" id="hashtag" data-role="tagsinput" class="form-control input-group-lg" placeholder="#hashtags"/>
                </div>
                  <div class="form-group">

                  <select class="form-control" name="category_type">
                    <option value="pilgrims">Pilgrims</option>
                    <option value="foodie">Foodie</option>
                    <option value="adventure">Adventure</option>
                    <option value="waterbody">Water Body</option>
                    <option value="natureseeing">Nature Seeing</option>
                    <option value="ancient">Ancient</option>
                  </select>
              </div>
              <h2>Select Destination</h2>
                <select class="form-control" name="destination_id">
                  @foreach($destinations as $destination)
                    <option value="{{$destination->id}}">{{$destination->name}}</option>
                  @endforeach

                </select>
                  <br>
                      <input type="file" name="image" id="file-input" accept="image/gif, image/jpeg, image/png" multiple><br>
                      <div id="preview"></div>
                      <input type="submit" class="button" value="Submit">
                    </div>
                  </form>
                  </div>
            	</div>
            </div><!-- Post Create Box End-->

            <!-- Post Content
            ================================================= -->


      @foreach($allfeeds as $feed)


            <div class="post-content">
              <img src="{{asset('/uploads/mainimage/'.$feed->image)}}" alt="post-image" class="img-responsive post-image" />
              <div class="post-container">
                <img src="{{asset('/uploads/userimage/profile/mainimage/'.@$feed->userprofile->profile_image)}}" alt="user" class="profile-photo-md pull-left" />
                <div class="post-detail" id="posts-{{$feed->id}}" data-postid={{$feed->id}}">
                    <div class="user-info">
                      @if(@$feed->userprofile->user->id == \Auth::user()->id)
                          <h5><a href="{{route('userprofile')}}" class="profile-link">{{@$feed->userprofile->user->name}}</a> <span class="following">Following</span></h5>
                      @else
                        <h5><a href="{{route('findUserProfile',[@$feed->userprofile->user->username])}}" class="profile-link">{{@$feed->userprofile->user->name}}</a> <span class="following">Following</span></h5>
                      @endif
                        <p class="text-muted">{{\Carbon\Carbon::parse($feed->created_at)->diffForHumans()}}</p>

                        <a href="{{route('destination.show',$feed->destination->slug)}}"><h4>{{$feed->destination->name}}</h4> </a>
                    </div>

                  <div class="reaction">
                    <a href="#" class="btn text-green like-button-click " data-postId="{{$feed->id}}"><i class="icon ion-thumbsup">{{$feed->reaction->where('like', '1')->count()}}</i></a>

                    <!-- <a class="btn text-red"><i class="fa fa-thumbs-down"></i> 0</a> -->
                  </div>

                  <!-- <h2>Tags</h2> -->
                  <ul class="list-inline">
                      @php
                         $alltags = explode(',', $feed->tags);
                      @endphp

                    @foreach($alltags as $atags)
                        <li><button class="btn-special">#{{$atags}}</button></li>
                    @endforeach

                </ul>

                </div>
              </div>
            </div>

        @endforeach

          </div>

        <!-- Newsfeed Common Side Bar Right
        ================================================= -->
        <div class="col-md-3 static" style="padding-left: 60px;">
          <div class="suggestions" id="sticky-sidebar">
            <h4 class="grey">Your Recommendations</h4>


        @foreach($Rdestination as $desti)
            <div class="follow-user">
              <img src="{{asset('uploads/thumbnail/'.$desti->image)}}" alt="" class="profile-photo-sm pull-left" />
              <div>
                <h5><a href="{{route('destination.show', $desti->slug)}}">{{$desti->name}}</a></h5>
              @if($desti->userFolloweDestination(\Auth()->user()->userprofile->id))
                <a href="#" class="text-green">Following</a>
              @else
                  <a href="{{route('destinationfollowStore', [$desti->id])}}" class="text-green">Follow</a>
              @endif

              </div>
            </div>
            @endforeach


            <!-- <div class="follow-user">
              <img src="images/img.png" alt="" class="profile-photo-sm pull-left" />
              <div>
                <h5><a href="timeline.html">Pashupatinath Temple</a></h5>
                <a href="#" class="text-green">Follow</a>
              </div>
            </div>
            <div class="follow-user">
              <img src="images/img.png" alt="" class="profile-photo-sm pull-left" />
              <div>
                <h5><a href="timeline.html">Dhulikhel</a></h5>
                <a href="#" class="text-green">Follow</a>
              </div>
            </div>
            <div class="follow-user">
              <img src="images/img.png" alt="" class="profile-photo-sm pull-left" />
              <div>
                <h5><a href="timeline.html">New Baneshwor</a></h5>
                <a href="#" class="text-green">Follow</a>
              </div>
            </div> -->
          </div>
        </div>





  @endsection


    <!-- Scripts
    ================================================= -->

@push('scripts')
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTMXfmDn0VlqWIyoOxK8997L-amWbUPiQ&callback=initMap"></script>


    <script src="{{asset('assets/front/js/jquery.sticky-kit.min.js')}}"></script>
    <script src="{{asset('assets/front/js/jquery.scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/front/css/dist/bootstrap-tagsinput.js')}}"></script>
    <script src="{{asset('assets/front/css/dist/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{asset('assets/front/css/dist/bootstrap-tagsinput-angular.js')}}"></script>
    <script src="{{asset('assets/front/css/dist/bootstrap-tagsinput-angular.min.js')}}"></script>
    <script>
      // Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<script type="text/javascript">
function previewImages() {

  var preview = document.querySelector('#preview');

  if (this.files) {
    [].forEach.call(this.files, readAndPreview);
  }

  function readAndPreview(file) {

    // Make sure `file.name` matches our extensions criteria
    if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
      return alert(file.name + " is not an image");
    } // else...

    var reader = new FileReader();

    reader.addEventListener("load", function() {
      var image = new Image();
      image.height = 100;
      image.title  = file.name;
      image.src    = this.result;
      preview.appendChild(image);
    });

    reader.readAsDataURL(file);

  }

}

document.querySelector('#file-input').addEventListener("change", previewImages);
</script>
<script>
  function onClick(e) {
        var id = e.getAttribute('data-pageref-id');
	var post = 'id='+id;
	var req = new XMLHttpRequest();
	req.open('', '', true);
	req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	req.onreadystatechange = function(){
            if (req.readyState !== 4 || req.status !== 200) return;
            document.getElementById("clicks").innerHTML = req.responseText;
	 };
	req.send(post);
 };
</script>


<!-- back end script for like -->

<script>
$.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
});
       $(document).ready(function(){
           $('.like-button-click').click(function(e){
               e.preventDefault();
             // var postid = $("#like-button").
             var postid = $(this).attr('data-postId');

             $.ajax({
                method: 'get',
                url: "/like-post/" + postid,
                success:function(data){
                  console.log(data);
                  // $("#posts-"+postid).children("#like-button").name()
                    $.ajax({
                      method: 'get',
                      url: "/count-like/" + postid,
                      success:function(data1){
                        console.log(data1);
                        console.log(postid);
                        $("#posts-"+postid).children(".reaction").find("a").text(data1.like);
                      },
                      // error:function(error){
                      //   console.log()
                      // }

                    });
                  },

                error:function(data){
                  console.log('some thing happen' + data);
                }
              });

           });

         });


</script>



@endpush
