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

    <!--Header End-->

    <div class="destprofile">

      <div class="profileimage">
        <img src="{{asset('uploads/mainimage/'.$destination->image)}}" style="height: 500px;">
        <div class="col-lg-12">
          <div class="col-lg-5">
            <div class="desttitle">
              <h2>{{$destination->name}}</h2>
              <p style="color:white;">{{$destination->countFollowers()}}</p>
            </div>
          </div>
          <div class="col-lg-7 destfollowers" align="right">
            <!-- <ul class="follow-me list-inline">
              <li style="color:white;">1,299 people following her</li>
              <li><button class="btn-primary">Follow</button></li>
            </ul> -->
            <ul class="follow-me list-inline my-3">
              <li style="color:blue;background-color:white;"><b>{{$destination->countFollowers( )}}</b></li>

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

        <h2>Tags</h2>
        <ul class="list-inline">
            @php
               $alltags = explode(',', $destination->tags);
            @endphp

          @foreach($alltags as $atags)
              <li><button class="btn-special">{{$atags}}</button></li>
          @endforeach

      </ul>

      <h2>Destination Type</h2>
      <ul class="list-inline">

            <li><button class="btn-special">{{$destination->destination_type}}</button></li>

    </ul>




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
