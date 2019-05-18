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
          <form name="destination_form" method="post" action="{{route('destination.store')}}" id='registration_form' class="form-inline">
                    <!-- <div class="row"> -->
                    @csrf
                      <div class="form-group col-xs-6">
                        <label for="firstname" class="sr-only">Destination Name</label>
                        <input id="firstname" class="form-control input-group-lg" type="text" name="name" title="Enter Destnation Name" placeholder="First name"/>
                      </div>

                      <div class="form-group col-xs-6">
                        <label for="firstname" class="sr-only">Description</label>
                        <textarea class="form-control input-group-lg" row="5" cols="180" placeholder="Enter Description" name="description"></textarea>
                      </div>
                      <div class="form-group">
                          <input type="text" name="tags" id="hashtag" data-role="tagsinput" class="form-control input-group-lg" placeholder="#hashtags"/>
                    </div>
                    <div class="form-group col-xs-6">
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

                    <div class="col-md-12 row">
                    <input class="btn btn-primary" type="submit" name="" value="Save">
                  </div>

                  </form><!--Register Now Form Ends-->


                </div>
              </div>
            </div>
          </div>
@endsection
