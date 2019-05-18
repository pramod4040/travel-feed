@extends('front.layouts.app')

@section('content')
    <style>

      .desttitle {
        position: absolute;
        bottom: 12px;
        left: 60px;
      }

      .destprofile {
        position: relative;
      }

      .destfollowers {
        position: absolute;
        bottom: 12px;
        right: 50px;
      }

      .dest-content {
        padding: 20px 160px 40px 140px;
      }

      .btn-special{
        background: #6DE5A2;
        padding: 5px 10px;
        border: 1px solid blue;
        font-size: 14px;
        border-radius: 4px;
        color: black;
        position: relative;
        font-weight: 600;
        outline: none;
        border-radius: 20px;
      }

      .btn-special:hover{
        background: #149AC9;
        transition: all 1s;
      }

      .MultiCarousel {
        float: left;
        overflow: hidden;
        padding: 15px;
        width: 100%;
        position:relative;
      }
      .MultiCarousel .MultiCarousel-inner {
        transition: 1s ease all;
        float: left;
      }
      .MultiCarousel .MultiCarousel-inner .item {
        float: left;
      }
      .MultiCarousel .MultiCarousel-inner .item > div {
        text-align: center;
        padding:10px;
        margin:10px;
        background:#f1f1f1;
        color:#666;}
      .MultiCarousel .leftLst, .MultiCarousel .rightLst {
        position:absolute;
        border-radius:50%;
        top:calc(50% - 20px);
      }
      .MultiCarousel .leftLst {
        left:0;
      }
      .MultiCarousel .rightLst {
        right:0;
      }
      .MultiCarousel .leftLst.over, .MultiCarousel .rightLst.over {
        pointer-events: none; background:#ccc;
      }

    </style>
  </head>
  <body>

    <!-- Header
    ================================================= -->
    <header id="header">
      <nav class="navbar navbar-default navbar-fixed-top menu">
        <div class="container">

          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index-register.html"><img src="/assets/front/images/loogo.png" alt="logo" /></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right main-menu">
              <li class="dropdown"><a href="profile.html">My Profile</a></li>
              <li class="dropdown"><a href="#">Message</a></li>
              <li class="dropdown"><a href="#">Create</a></li>
              <li class="dropdown"><a href="#">My Bucket List</a></li>
              <li class="dropdown"><a href="#">Signout</a></li>
            </ul>
            <form class="navbar-form navbar-right hidden-sm">
              <div class="form-group">
                <i class="icon ion-android-search"></i>
                <input type="text" class="form-control" placeholder="Search places,  #hashtags">
              </div>
            </form>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
      </nav>
    </header>
    <!--Header End-->

    <div class="destprofile">

      <div class="profileimage">
        <img src="/assets/front/images/profile.png" style="height: 500px;">
        <div class="col-lg-12">
          <div class="col-lg-5">
            <div class="desttitle">
              <h2>{{$destination->name}}</h2>
              <p style="color:white;">3.9K experiences</p>
            </div>
          </div>
          <div class="col-lg-7 destfollowers" align="right">
            <!-- <ul class="follow-me list-inline">
              <li style="color:white;">1,299 people following her</li>
              <li><button class="btn-primary">Follow</button></li>
            </ul> -->
            <ul class="follow-me list-inline">
              <li>{{$destination->countFollowers( )}}</li>

              @if($destination->isUserFollower($userprofile->id))
                <form class="" action="{{route('unfollowDestination', $destination->id)}}" method="post">
                  @csrf
                  @method('delete')
                  <button onclick="return confirm('Are you sure you want to Unfollow?')" type="submit" class="btn-danger">Unfollow</button>
                  <!-- <li><button class="btn-danger">UnFollow</button> </a></li> -->
                </form>
              @else
              <li><a href="{{route('destinationfollowStore', [$destination->id])}}"> <button class="btn-primary">Follow</button> </a></li>
              @endif

            </ul>
          </div>
        </div>
      </div>

      <div class="dest-content">
        <h2>Description</h2>
        <p>
        {{$destination->description}}
        </p><br>
        <div class="dest-glarry">
          <center><h2> Image Gallery </h2></center>
            <ul class="album-photos">
                <li>
                  <div class="img-wrapper" data-toggle="modal" data-target=".photo-1">
                    <img src="http://placehold.it/1000x1000" alt="photo" />
                  </div>
                  <div class="modal fade photo-1" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <img src="http://placehold.it/1000x1000" alt="photo" />
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="img-wrapper" data-toggle="modal" data-target=".photo-2">
                    <img src="http://placehold.it/1000x1000" alt="photo" />
                  </div>
                  <div class="modal fade photo-2" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <img src="http://placehold.it/1000x1000" alt="photo" />
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="img-wrapper" data-toggle="modal" data-target=".photo-3">
                    <img src="http://placehold.it/1000x1000" alt="photo" />
                  </div>
                  <div class="modal fade photo-3" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <img src="http://placehold.it/1000x1000" alt="photo" />
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="img-wrapper" data-toggle="modal" data-target=".photo-4">
                    <img src="http://placehold.it/1000x1000" alt="photo" />
                  </div>
                  <div class="modal fade photo-4" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <img src="http://placehold.it/1000x1000" alt="photo" />
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="img-wrapper" data-toggle="modal" data-target=".photo-5">
                    <img src="http://placehold.it/1000x1000" alt="photo" />
                  </div>
                  <div class="modal fade photo-5" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <img src="http://placehold.it/1000x1000" alt="" />
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
              <center><a href="profilegallery.html"><button class="btn-primary">View All</button></a></center>
        </div>
        <h2>Specialities</h2>
        <ul class="list-inline">
              <li><button class="btn-special">Night Stay</button></li>
              <li><button class="btn-special">Bunjee</button></li>
              <li><button class="btn-special">Cycling</button></li>
              <li><button class="btn-special">Boating</button></li>
            </ul>
          <br>
          <h2>Expenses Range</h2>
		      <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
            <div class="MultiCarousel-inner">
                <div class="item">
                    <div class="pad15">
                        <p class="lead">jkkkdmd jkdkjd</p>
                        <p>₹ 1</p>
                        <p>₹ 6000</p>
                        <p>50% off</p>
                    </div>
                </div>
                <div class="item">
                    <div class="pad15">
                        <p class="lead">Multi Item Carousel</p>
                        <p>₹ 1</p>
                        <p>₹ 6000</p>
                        <p>50% off</p>
                    </div>
                </div>
                <div class="item">
                    <div class="pad15">
                        <p class="lead">Multi Item Carousel</p>
                        <p>₹ 1</p>
                        <p>₹ 6000</p>
                        <p>50% off</p>
                    </div>
                </div>
                <div class="item">
                    <div class="pad15">
                        <p class="lead">Multi Item Carousel</p>
                        <p>₹ 1</p>
                        <p>₹ 6000</p>
                        <p>50% off</p>
                    </div>
                </div>
                <div class="item">
                    <div class="pad15">
                        <p class="lead">Multi Item Carousel</p>
                        <p>₹ 1</p>
                        <p>₹ 6000</p>
                        <p>50% off</p>
                    </div>
                </div>
                <div class="item">
                    <div class="pad15">
                        <p class="lead">Multi Item Carousel</p>
                        <p>₹ 1</p>
                        <p>₹ 6000</p>
                        <p>50% off</p>
                    </div>
                </div>
                <div class="item">
                    <div class="pad15">
                        <p class="lead">Multi Item Carousel</p>
                        <p>₹ 1</p>
                        <p>₹ 6000</p>
                        <p>50% off</p>
                    </div>
                </div>
                <div class="item">
                    <div class="pad15">
                        <p class="lead">Multi Item Carousel</p>
                        <p>₹ 1</p>
                        <p>₹ 6000</p>
                        <p>50% off</p>
                    </div>
                </div>
                <div class="item">
                    <div class="pad15">
                        <p class="lead">Multi Item Carousel</p>
                        <p>₹ 1</p>
                        <p>₹ 6000</p>
                        <p>50% off</p>
                    </div>
                </div>
                <div class="item">
                    <div class="pad15">
                        <p class="lead">Multi Item Carousel</p>
                        <p>₹ 1</p>
                        <p>₹ 6000</p>
                        <p>50% off</p>
                    </div>
                </div>
                <div class="item">
                    <div class="pad15">
                        <p class="lead">Multi Item Carousel</p>
                        <p>₹ 1</p>
                        <p>₹ 6000</p>
                        <p>50% off</p>
                    </div>
                </div>
                <div class="item">
                    <div class="pad15">
                        <p class="lead">Multi Item Carousel</p>
                        <p>₹ 1</p>
                        <p>₹ 6000</p>
                        <p>50% off</p>
                    </div>
                </div>
                <div class="item">
                    <div class="pad15">
                        <p class="lead">Multi Item Carousel</p>
                        <p>₹ 1</p>
                        <p>₹ 6000</p>
                        <p>50% off</p>
                    </div>
                </div>
                <div class="item">
                    <div class="pad15">
                        <p class="lead">Multi Item Carousel</p>
                        <p>₹ 1</p>
                        <p>₹ 6000</p>
                        <p>50% off</p>
                    </div>
                </div>
                <div class="item">
                    <div class="pad15">
                        <p class="lead">Multi Item Carousel</p>
                        <p>₹ 1</p>
                        <p>₹ 6000</p>
                        <p>50% off</p>
                    </div>
                </div>
                <div class="item">
                    <div class="pad15">
                        <p class="lead">Multi Item Carousel</p>
                        <p>₹ 1</p>
                        <p>₹ 6000</p>
                        <p>50% off</p>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary leftLst"><</button>
            <button class="btn btn-primary rightLst">></button>
        </div>
        <br><br><br><br>
            <h2>View on Google Map</h2><br>
            <div class="container-fluid">
              <div class="row">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14128.88419520523!2d85.3487083!3d27.7104605!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x739090deff2ba4a6!2sShree+Pashupatinath+Temple!5e0!3m2!1sen!2snp!4v1553855947755!5m2!1sen!2snp" width="100%" height="320" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
              </div>

          <h2> What other people are doing here?</h2><br>
          <div class="col-lg-12">
          <div class="col-lg-3">
          </div>
          <div class="col-lg-6">

          <!-- Post Content
            ================================================= -->

            @foreach($destination->post as $post)
              <div class="post-content">
                <img src="{{asset('./uploads/mainimage/'. $post->image)}}" alt="post-image" class="img-responsive post-image" />
                <div class="post-container">
                  <img src="{{asset('/uploads/userimage/profile/thumbnail/'.$post->userprofile->profile_image)}}" alt="user" class="profile-photo-md pull-left" />
                  <div class="post-detail" id="posts-{{$post->id}}" data-postid={{$post->id}}>
                    <div class="user-info">
                      <h5><a href="{{route('findUserProfile',[@$post->userprofile->user->username])}}" class="profile-link">{{@$post->userprofile->user->name}}</a> <span class="following">following</span></h5>
                      <p class="text-muted">{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</p>
                    </div>
                    <div class="reaction">
                      <a href="#" class="like-button-click btn text-green" data-postId="{{$post->id}}"><i class="icon ion-thumbsup"></i>{{$post->reaction()->where('like','1')->count()}}</a>
                      <!-- <a class="btn text-red"><i class="fa fa-thumbs-down"></i> 0</a> -->
                    </div>
                    <div class="post-text">
                      <p>{{@$post->description}}</p>
                    </div>

                  </div>
                </div>
              </div>
            @endforeach



        </div>
        <div class="col-lg-3">
          </div>
        </div>

      </div>
    </div>


@push('scripts')
    <!-- Scripts
    ================================================= -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky-kit.min.js"></script>
    <script src="/assets/front/js/jquery.scrollbar.min.js"></script>
    <script src="js/script.js"></script>

    <script src="{{asset('assets/front/js/reaction_ajax.js')}}"></script>
    <script>
      $(document).ready(function () {
    var itemsMainDiv = ('.MultiCarousel');
    var itemsDiv = ('.MultiCarousel-inner');
    var itemWidth = "";

    $('.leftLst, .rightLst').click(function () {
        var condition = $(this).hasClass("leftLst");
        if (condition)
            click(0, this);
        else
            click(1, this)
    });

    ResCarouselSize();




    $(window).resize(function () {
        ResCarouselSize();
    });

    //this function define the size of the items
    function ResCarouselSize() {
        var incno = 0;
        var dataItems = ("data-items");
        var itemClass = ('.item');
        var id = 0;
        var btnParentSb = '';
        var itemsSplit = '';
        var sampwidth = $(itemsMainDiv).width();
        var bodyWidth = $('body').width();
        $(itemsDiv).each(function () {
            id = id + 1;
            var itemNumbers = $(this).find(itemClass).length;
            btnParentSb = $(this).parent().attr(dataItems);
            itemsSplit = btnParentSb.split(',');
            $(this).parent().attr("id", "MultiCarousel" + id);


            if (bodyWidth >= 1200) {
                incno = itemsSplit[3];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 992) {
                incno = itemsSplit[2];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 768) {
                incno = itemsSplit[1];
                itemWidth = sampwidth / incno;
            }
            else {
                incno = itemsSplit[0];
                itemWidth = sampwidth / incno;
            }
            $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
            $(this).find(itemClass).each(function () {
                $(this).outerWidth(itemWidth);
            });

            $(".leftLst").addClass("over");
            $(".rightLst").removeClass("over");

        });
    }


    //this function used to move the items
    function ResCarousel(e, el, s) {
        var leftBtn = ('.leftLst');
        var rightBtn = ('.rightLst');
        var translateXval = '';
        var divStyle = $(el + ' ' + itemsDiv).css('transform');
        var values = divStyle.match(/-?[\d\.]+/g);
        var xds = Math.abs(values[4]);
        if (e == 0) {
            translateXval = parseInt(xds) - parseInt(itemWidth * s);
            $(el + ' ' + rightBtn).removeClass("over");

            if (translateXval <= itemWidth / 2) {
                translateXval = 0;
                $(el + ' ' + leftBtn).addClass("over");
            }
        }
        else if (e == 1) {
            var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
            translateXval = parseInt(xds) + parseInt(itemWidth * s);
            $(el + ' ' + leftBtn).removeClass("over");

            if (translateXval >= itemsCondition - itemWidth / 2) {
                translateXval = itemsCondition;
                $(el + ' ' + rightBtn).addClass("over");
            }
        }
        $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
    }

    //It is used to get some elements from btn
    function click(ell, ee) {
        var Parent = "#" + $(ee).parent().attr("id");
        var slide = $(Parent).attr("data-slide");
        ResCarousel(ell, Parent, slide);
    }

});
    </script>
@endpush


@endsection
