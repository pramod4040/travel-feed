@extends('front.layouts.app')

    @push('styles')
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

textarea{
  resize: none;
}
</style>

@section('content')

    <!-- Header
    ================================================= -->

    <div class="container">

      <!-- Timeline
      ================================================= -->
      <div class="timeline">
        <div class="timeline-cover" style="background-image: url('/assets/front/images/profile.PNG');">

          <!--Timeline Menu for Large Screens-->
          <div class="timeline-nav-bar hidden-sm hidden-xs">
            <div class="row">
              <div class="col-md-3">
                <div class="profile-info">
                  <img src="{{asset('/uploads/userimage/profile/thumbnail/'.$user->userprofile->profile_image)}}" alt="" class="img-responsive profile-photo" />
                  <h3>{{$user->name}}</h3>
                  <p class="text-muted">Online Entrepreneur<br>#DigitalNomad #FitnessTravel </p>
                </div>
              </div>
              <div class="col-md-9">
                <ul class="list-inline profile-menu">
                  <li><a href="{{route('userprofile')}}" class="active">Timeline</a></li>

                  <!-- <li><a href="videos.html">Videos</a></li> -->
                  @if($user->id == \Auth::user()->id)
                  <li><a href="{{route('photos')}}">Photos</a></li>

                    <!-- <li><a href="#">Followers</a></li>
                    <li><a href="#">Edit Profile</a></li> -->
                  @endif
                    <li><a href="{{route('newsfeed')}}">Newsfeed</a></li>

                </ul>

                <ul class="follow-me list-inline">
                  <li>{{$user->countFollowers()}} people following</li>

                @if($showuserfollow)
                  @if($user->isUserFollower(\Auth::user()->id))
                    <form class="" action="{{route('unfollowUser', $user->id)}}" method="post">
                      @csrf
                      @method('delete')
                      <button onclick="return confirm('Are you sure you want to Unfollow?')" type="submit" class="btn-danger">Unfollow</button>
                      <!-- <li><button class="btn-danger">UnFollow</button> </a></li> -->
                    </form>
                  @else
                  <li><a href="{{route('storeFollowers', [$user->id])}}"> <button class="btn-primary">Follow</button> </a></li>
                  @endif
              @endif

                </ul>
              </div>
            </div>
          </div><!--Timeline Menu for Large Screens End-->

          <!--Timeline Menu for Small Screens-->
          <div class="navbar-mobile hidden-lg hidden-md">
            <div class="profile-info">
              <img src="http://placehold.it/300x300" alt="" class="img-responsive profile-photo" />
              <h4>Sarah Cruiz</h4>
              <p class="text-muted">Creative Director</p>
            </div>
            <div class="mobile-menu">
              <ul class="list-inline">
                <li><a href="profile.html" class="active">Timeline</a></li>
                <li><a href="photos.html">Photos</a></li>
                <li><a href="videos.html">Videos</a></li>
              </ul>
              <button class="btn-primary">Follow</button>
            </div>
          </div><!--Timeline Menu for Small Screens End-->

        </div>


        <div id="page-contents">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-7">

              <!-- Post Create Box
            ================================================= -->
            <div class="create-post" style="border: 1px solid #CDCBCA;">
              <div class="row">
                <div class="col-md-7 col-sm-7">
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

                @if($user->id == \Auth::user()->id)
                  <form class="" method="post" action="{{route('savePost')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                 <div class="form-group">
                    <img src="{{asset('/uploads/userimage/profile/thumbnail/'.$user->userprofile->profile_image)}}" alt="" class="profile-photo-md" />

                    Share Your Experience To The World!<br>
                    Be a Influencer..
                    <!-- <textarea name="texts" id="exampleTextarea" cols="30" rows="1" class="form-control" placeholder="Write what you wish"></textarea> -->
                  </div>
                  <textarea fixed name="description" rows="5" cols="80"></textarea>

                  <h2>Tags</h2>
                  <input type="" name="tags" value="">

                <h2>Select Destination</h2>
                  <select class="form-control" name="destination_id">
                    @foreach($destinations as $destination)
                      <option value="{{$destination->id}}">{{$destination->name}}</option>
                    @endforeach

                  </select>

                  <h2>Select Post Type</h2>
                  <select class="form-control" name="category_type">
                    <option value="pilgrims">Pilgrims</option>
                    <option value="foodie">Foodie</option>
                    <option value="adventure">Adventure</option>
                    <option value="waterbody">Water Body</option>
                    <option value="natureseeing">Nature Seeing</option>
                    <option value="ancient">Ancient</option>
                  </select>

                </div>
                <div class="col-md-5 col-sm-5">
                  <div class="tools">
                    <ul class="publishing-tools list-inline">
                    <input type="file" name="image" value="">
                      <!-- <li><a id="myBtn"><i class="ion-images"></i></a></li> -->
                      <!-- <li><a href="#"><i class="ion-ios-videocam"></i></a></li>
                      <li><a href="#"><i class="ion-map"></i></a></li> -->
                    </ul>
                    <input type="submit" name="" class="btn btn-primary pull-right" value="Published">
                  </div>
                </div>
            </form>
          @endif
                <!-- The Modal -->
                  <div id="myModal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                      <span class="close">&times;</span>
                      <h3> Upload Picture...</h3><br>
                      <input type="file" name="file" id="file-input" accept="image/gif, image/jpeg, image/png" multiple><br>
                      <div id="preview"></div>
                      <input type="button" class="button" value="DONE">
                    </div>
                  </div>
              </div>
            </div><!-- Post Create Box End-->
<!-- <a href="{{route('storeFollowers',1)}}">CLicke Here</a> -->

            @foreach($allPosts as $post)
              <div class="post-content">
                <img src="{{asset('./uploads/mainimage/'. $post->image)}}" alt="post-image" class="img-responsive post-image" />
                <div class="post-container">
                  <img src="{{asset('/uploads/userimage/profile/thumbnail/'.$post->userprofile->profile_image)}}" alt="user" class="profile-photo-md pull-left" />
                  <div class="post-detail" id="posts-{{$post->id}}" data-postid={{$post->id}}>
                    <div class="user-info">
                      <h5><a href="{{route('userprofile')}}" class="profile-link">{{@$post->userprofile->user->name}}</a> <span class="following">following</span></h5>
                      <p class="text-muted">{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</p>

                      <a href="{{route('destination.show',$post->destination->slug)}}"><h4>{{$post->destination->name}}</h4> </a>
                    </div>
                    <div class="reaction">
                      <a href="#" class="like-button-click btn text-green" data-postId="{{$post->id}}"><i class="icon ion-thumbsup"></i>{{$post->reaction()->where('like','1')->count()}}</a>
                      <!-- <a class="btn text-red"><i class="fa fa-thumbs-down"></i> 0</a> -->
                    </div>
                    <div class="post-text">
                      <p>{{@$post->description}}</p>
                    </div>

                    <!-- <h2>Tags</h2> -->
                    <ul class="list-inline">
                        @php
                           $alltags = explode(',', $post->tags);
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
            <div class="col-md-2 static">
            </div>
          </div>
        </div>
      </div>
    </div>


    <footer id="footer">
      <div class="copyright">
        <p>Ambition Academy © 2019. All rights reserved</p>
      </div>
    </footer>

@endsection

@push('scripts')

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
                  // console.log(data);
                  // $("#posts-"+postid).children("#like-button").name()
                    $.ajax({
                      method: 'get',
                      url: "/count-like/" + postid,
                      success:function(data1){
                        // console.log(data1);
                        // console.log(postid);
                        $("#posts-"+postid).children(".reaction").find("a").text(data1.like);
                      }

                    });
                  }
              });

           });

         });

</script>

@endpush
