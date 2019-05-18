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
