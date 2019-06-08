@extends('admin.layouts.app')


@section('content')

<div class="page-heading">
         <h1 class="page-title">Destinations List</h1>
         <ol class="breadcrumb">
             <li class="breadcrumb-item">
                 <a href="index.html"><i class="la la-home font-20"></i></a>
             </li>
             <!-- <li class="breadcrumb-item">Basic Tables</li> -->
         </ol>
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
