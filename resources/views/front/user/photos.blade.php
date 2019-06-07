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
                        <!-- Photo Album
              ================================================= -->
                        <ul class="album-photos">

                      @foreach($photos as $photo)
                            <li>
                                <div class="img-wrapper" data-toggle="modal" data-target=".photo-1">
                                    <img src="{{asset('uploads/thumbnail/'.$photo->image)}}" alt="photo" />
                                </div>
                                <div class="modal fade photo-1" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <img src="{{asset('uploads/mainimage/'.$photo->image)}}" alt="photo" />
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach

                        </ul>
                    </div>
                </div>
                <div class="col-md-2 static">
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
