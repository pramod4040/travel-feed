@extends('admin.layouts.app')

@push('styles')

<style>
#successMessage {
    opacity: 1.7;
}
</style>


@endpush


@section('content')

<div class="page-heading">
         <h1 class="page-title">Destinations List</h1>
         <ol class="breadcrumb">
             <li class="breadcrumb-item">
                 <a href="index.html"><i class="la la-home font-20"></i></a>
             </li>
             <!-- <li class="breadcrumb-item">Basic Tables</li> -->
         </ol>
         @include('admin.layouts._partials.messages.info')


     </div>

              <div class="col-xl-12">
                       <div class="ibox">
                           <!-- <div class="ibox-head">
                               <div class="ibox-title">Gray head</div>
                           </div> -->
                           <div class="ibox-body">
                               <table class="table table-bordered">
                                   <thead class="thead-default">
                                       <tr>
                                           <th>SN</th>
                                           <th>Destination Name</th>
                                      
                                           <th>Tags</th>
                                            <th>Description</th>
                                            <th>Published</th>
                                            <th>Verified</th>
                                           <th>Destination Type</th>
                                           <th>Options</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                              @foreach($destinations as $key=> $destination)
                                       <tr>
                                           <td>{{++$key}}</td>
                                           <td>{{$destination->name}}</td>
                                           <td>{{$destination->tags}}</td>
                                           <td>{{str_limit($destination->description, 200)}}</td>
                                           

                                            <td class="project-status" id="change-status">
                                              <a data-toggle="tooltip" data-placement="top"
                  title="{{$destination->published ? 'Unpublish Item' : 'Publish Item'}}"
                  href="{{route('togglePublish', $destination->id)}}"
                  class="label label-{!! $destination->published == 1 ? 'primary' : 'danger' !!}" data-id="{{$destination->id}}">
                  {!! $destination->published ? 'Publish' : 'Unpublish' !!}
                  </a>
                </td>


                                           <td class="project-status" id="change-status">
                  <a data-toggle="tooltip" data-placement="top"
                  title="{{$destination->verified ? 'Unverified Item' : 'Verified Item'}}"
                  href="{{route('toggleVerify', $destination->id)}}"
                  class="label label-{!! $destination->verified == 1 ? 'primary' : 'danger' !!}" data-id="{{$destination->id}}">
                  {!! $destination->verified ? 'Verified' : 'Unverified' !!}
                  </a>
                </td>
                                           <td>{{$destination->destination_type}}</td>
                                           <td>
                                             <a href=""><button class="btn btn-primary">Edit</button></a>

                                           </td>
                                       </tr>

                              @endforeach
                                       
                                       
                                   </tbody>
                               </table>
                           </div>
                       </div>
                   </div>

@endsection
