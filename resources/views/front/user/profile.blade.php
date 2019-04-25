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
                  <img src="/assets/front/images/img.png" alt="" class="img-responsive profile-photo" />
                  <h3>Manoz Acharya</h3>
                  <p class="text-muted">Online Entrepreneur<br>#DigitalNomad #FitnessTravel </p>
                </div>
              </div>
              <div class="col-md-9">
                <ul class="list-inline profile-menu">
                  <li><a href="timeline.html" class="active">Timeline</a></li>
                  <li><a href="photos.html">Photos</a></li>
                  <li><a href="videos.html">Videos</a></li>
                  <li><a href="followers.html">Followers</a></li>
                  <li><a href="editprofile.html">Edit Profile</a></li>
                </ul>
                <ul class="follow-me list-inline">
                  <li>1,299 people following her</li>
                  <li><button class="btn-primary">Follow</button></li>
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
                  <form class="" method="post" action="{{route('savePost')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                 <div class="form-group">
                    <img src="/assets/front/images/img.png" alt="" class="profile-photo-md" />

                    Share Your Experience To The World!<br>
                    Be a Influencer..
                    <!-- <textarea name="texts" id="exampleTextarea" cols="30" rows="1" class="form-control" placeholder="Write what you wish"></textarea> -->
                  </div>
                  <textarea fixed name="description" rows="5" cols="80"></textarea>

                  <h2>Tags</h2>
                  <input type="" name="tags" value="">

                <h2>Select Destination</h2>
                  <select class="" name="destination_id">
                      <option value="1">Changragiri</option>
                      <option value="2">Sukuta</option>
                      <option value="3">Demo Place</option>
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

          @if(count($thatPost) > 0)
            <div class="post-content">
              <img src="{{asset('./uploads/mainimage/'. $thatPost->image)}}" alt="post-image" class="img-responsive post-image" />
              <div class="post-container">
                <img src="http://placehold.it/300x300" alt="user" class="profile-photo-md pull-left" />
                <div class="post-detail" id="posts-{{$thatPost->id}}" data-postid={{$thatPost->id}}>
                  <div class="user-info">
                    <h5><a href="timeline.html" class="profile-link">{{$thatPost->userprofile->user->name}}</a> <span class="following">following</span></h5>
                    <p class="text-muted">{{\Carbon\Carbon::parse($thatPost->created_at)->diffForHumans()}}</p>
                  </div>
                  <div class="reaction">
                    <a id="like-button" href="#" class="btn text-green"><i class="icon ion-thumbsup">{{\App\Models\Reaction::likesCount($thatPost->id)}}</i></a>
                    <!-- <a class="btn text-red"><i class="fa fa-thumbs-down"></i> 0</a> -->
                  </div>
                  <div class="post-text">
                    <p>{{$thatPost->description}}</p>
                  </div>
                  <!-- <div class="post-comment">
                    <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm" />
                    <p><a href="timeline.html" class="profile-link">Diana </a><i class="em em-laughing"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
                  </div> -->
                  <!-- <div class="post-comment">
                    <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm" />
                    <p><a href="timeline.html" class="profile-link">John</a> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
                  </div> -->
                  <!-- <div class="post-comment">
                    <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm" />
                    <input type="text" class="form-control" placeholder="Post a comment">
                  </div> -->
                </div>
              </div>
            </div>

            @endif


              <!-- Post Content
              ================================================= -->
              <div class="post-content">
                <img src="http://placehold.it/1920x1280" alt="post-image" class="img-responsive post-image" />
                <div class="post-container">
                  <img src="http://placehold.it/300x300" alt="user" class="profile-photo-md pull-left" />
                  <div class="post-detail">
                    <div class="user-info">
                      <h5><a href="timeline.html" class="profile-link">Sarah Cruiz</a> <span class="following">following</span></h5>
                      <p class="text-muted">Published a photo about 15 mins ago</p>
                    </div>
                    <div class="reaction">
                      <a class="btn text-green"><i class="icon ion-thumbsup"></i> 13</a>
                      <!-- <a class="btn text-red"><i class="fa fa-thumbs-down"></i> 0</a> -->
                    </div>
                    <div class="post-text">
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <i class="em em-anguished"></i> <i class="em em-anguished"></i> <i class="em em-anguished"></i></p>
                    </div>
                    <div class="post-comment">
                      <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm" />
                      <p><a href="timeline.html" class="profile-link">Diana </a><i class="em em-laughing"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
                    </div>
                    <div class="post-comment">
                      <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm" />
                      <p><a href="timeline.html" class="profile-link">John</a> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
                    </div>
                    <div class="post-comment">
                      <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm" />
                      <input type="text" class="form-control" placeholder="Post a comment">
                    </div>
                  </div>
                </div>
              </div>

              <!-- Post Content
              ================================================= -->
              <div class="post-content">
                <img src="http://placehold.it/1920x1280" alt="post-image" class="img-responsive post-image" />
                <div class="post-container">
                  <img src="http://placehold.it/300x300" alt="user" class="profile-photo-md pull-left" />
                  <div class="post-detail">
                    <div class="user-info">
                      <h5><a href="timeline.html" class="profile-link">Sarah Cruiz</a> <span class="following">following</span></h5>
                      <p class="text-muted">Yesterday</p>
                    </div>
                    <div class="reaction">
                      <a class="btn text-green"><i class="icon ion-thumbsup"></i> 49</a>
                      <a class="btn text-red"><i class="fa fa-thumbs-down"></i> 0</a>
                    </div>                    <div class="post-text">
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <i class="em em-anguished"></i> <i class="em em-anguished"></i> <i class="em em-anguished"></i></p>
                    </div>
                    <div class="post-comment">
                      <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm" />
                      <p><a href="timeline.html" class="profile-link">Diana </a><i class="em em-laughing"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
                    </div>
                    <div class="post-comment">
                      <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm" />
                      <p><a href="timeline.html" class="profile-link">John</a> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
                    </div>
                    <div class="post-comment">
                      <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm" />
                      <input type="text" class="form-control" placeholder="Post a comment">
                    </div>
                  </div>
                </div>
              </div>

              <!-- Post Content
              ================================================= -->
              <div class="post-content">
                <div class="post-container">
                  <img src="http://placehold.it/300x300" alt="user" class="profile-photo-md pull-left" />
                  <div class="post-detail">
                    <div class="user-info">
                      <h5><a href="timeline.html" class="profile-link">Sarah Cruiz</a> <span class="following">following</span></h5>
                      <p class="text-muted">2 days ago</p>
                    </div>
                    <div class="reaction">
                      <a class="btn text-green"><i class="icon ion-thumbsup"></i> 49</a>
                      <a class="btn text-red"><i class="fa fa-thumbs-down"></i> 0</a>
                    </div>
                    <div class="post-text">
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <i class="em em-anguished"></i> <i class="em em-anguished"></i> <i class="em em-anguished"></i></p>
                    </div>                    <div class="post-comment">
                      <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm" />
                      <p><a href="timeline.html" class="profile-link">Diana </a><i class="em em-laughing"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
                    </div>
                    <div class="post-comment">
                      <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm" />
                      <p><a href="timeline.html" class="profile-link">John</a> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
                    </div>
                    <div class="post-comment">
                      <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm" />
                      <input type="text" class="form-control" placeholder="Post a comment">
                    </div>
                  </div>
                </div>
              </div>

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
           $('#like-button').click(function(e){
               e.preventDefault();
             // var postid = $("#like-button").
             var postid = $(this).closest('.post-detail').attr('data-postid');

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
                        console.log(data1);
                        console.log(postid);
                        $("#posts-"+postid).children(".reaction").find("a").text(data1.like);
                      },
                      // error:function(error){
                      //   console.log()
                      // }

                    });
                  }
              });

           });

         });

</script>

@endpush
