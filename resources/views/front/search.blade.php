@extends('front.layouts.app')

@section('content')

<div id="page-contents">
  <div class="container">
    <div class="row">
      
        <div class="col-md-6">
          
              <div class="destination-list">
                
                <h2>Lists of Destination</h2>

              @if($destinations->count() == 0)
                  <p style="color:red;">Not Found</p>
              @endif
                <ul>
                @foreach($destinations as $destination)
                  <li><a href="{{route('destination.show',$destination->slug)}}">{{$destination->name}}</a></li>
                @endforeach
                </ul>


              </div>

              <div class="user-list">
                  <h2>Lists of People</h2>

              @if($users->count() == 0)
                  <p style="color:red;">Not Found</p>
              @endif
                <ul>
                
                @foreach($users as $user)
                  <li><a href="{{route('findUserProfile', $user->username)}}">{{$user->name}}</a></li>
                @endforeach
                </ul>
                

              </div>

               </div>
            </div>
          </div>
@endsection


