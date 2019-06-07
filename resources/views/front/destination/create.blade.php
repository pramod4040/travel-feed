@extends('front.layouts.app')

@section('content')

<div id="page-contents">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
          @if(session('message'))
             <div class="alret alert-success">
                <p>{{session('message')}}</p>
             </div>
          @endif

          @if(session('error'))
             <div class="alret alert-danger">
                <p>{{session('error')}}</p>
             </div>
          @endif
          <form name="destination_form" method="post" action="{{route('destination.store')}}" id='registration_form' class="form-inline" enctype="multipart/form-data">
                    <!-- <div class="row"> -->
                    @csrf
                      <div class="form-group col-xs-12">
                        <label for="firstname" class="sr-only">Destination Name</label>
                        <input id="firstname" class="form-control input-group-lg" type="text" name="name" title="Enter Destnation Name" placeholder="Destination Name..."/>
                        {!!$errors->first('name', '<span class="text-danger has-error">:message</span>')!!}
                      </div>

                      <div class="row">
                        <div class="form-group col-xs-12">
                          <label for="image" class="sr-only">Destination main Image</label>
                          <input id="fileUpload" type="file" class="form-control input-group-lg" name="image"/>
                        </div>
                          {!!$errors->first('image', '<span class="text-danger has-error">:message</span>')!!}
                      </div>

                        <div id="wrapper">
                               <div id="image-holder"></div>
                          </div>

                      <div class="form-group col-xs-12">
                        <label for="firstname" class="sr-only">Description</label>
                        <textarea class="form-control input-group-lg" row="5" cols="180" placeholder="Enter Description" name="description"></textarea>
                      </div>
                      {!! $errors->first('description', '<span class="text-danger has-error">:message</span>') !!}

                      <div class="form-group">
                          <input type="text" name="tags" id="hashtag" data-role="tagsinput" class="form-control input-group-lg" placeholder="#hashtags"/>
                    </div>
                      <br>
                    {!! $errors->first('tags', '<span class="text-danger has-error">:message</span>') !!}

                    <div class="form-group col-xs-12">
                      <label for="firstname" class="sr-only">Destination Type</label>
                        <select class="form-control" name="destination_type">
                          <option value="pilgrims">Pilgrims</option>
                          <option value="foodie">Foodie</option>
                          <option value="adventure">Adventure</option>
                          <option value="waterbody">Water Body</option>
                          <option value="natureseeing">Nature Seeing</option>
                          <option value="ancient">Ancient</option>
                      </select>
                    </div>
                    {!! $errors->first('destination_type', '<span class="text-danger has-error">:message</span>') !!}

                    <div class="col-md-12 row">
                    <input class="btn btn-primary" type="submit" name="" value="Save">
                  </div>

                  </form><!--Register Now Form Ends-->


                </div>
              </div>
            </div>
          </div>
@endsection


@push('scripts')


<script>

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
