@extends('layout')
@section('main')
@section('users','active')

    <!-- popup service setup -->
    <div class="pcoded-content">
        <div class="page-header card">
            @if (session()->has('msg'))
<div style="margin-top:20px;" class="sufee-alert alert with-close alert-success alert-dismissible fade show">
    {{session('msg')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">x</span>
    </button>
</div>
@endif
@if (session()->has('del'))
<div style="margin-top:20px;" class="sufee-alert alert with-close alert-danger alert-dismissible fade-show">
    {{session('del')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">x</span>
    </button>
</div>
@endif
           <div class="row align-items-end">
              <div class="col-lg-9">
                 <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                       <li class="breadcrumb-item">
                          <a href="#"><i class="feather icon-home"></i></a>
                       </li>

                       <li class="breadcrumb-item"><a href="#">Users</a> </li>
                    </ul>
                 </div>
              </div>
              <div class="col-lg-3">
                <div class="add_new">
                 <a href="{{url('manage_users')}}" class="btn-inner-menu">
                   <button type="button">Add New</button></a>
                 </div>
              </div>

           </div>
        </div>

        <div class="pcoded-inner-content">
           <div class="main-body">
             <div class="row">

                <div class="col-lg-12 right_contents">
                   <div class="inner_contents table-responsive">
                       <table class="table_box" id="myTable">

                           <thead>
                           <th>S.No.</th>

                           <th>Name</th>
                           <th>Email </th>
                           <th>Mobile/ SMS No.</th>
                           <th>Phone</th>

                           <th>Action</th>
                           </thead>
                            <tbody>
                              @php
                              $count=1;
                              @endphp
                              @foreach ($data as $list)
                         <tr>
                           <td>{{$count++}}</td>
                           <td>{{$list->name}}</td>
                           <td>{{$list->email}}</td>
                           <td>{{$list->mobile}}</td>
                           <td>{{$list->phone}}</td>
                           <td>
                               <a class="create_btn" href="{{url('manage_users')}}/{{$list->id}}" title="Edit"><i class="feather icon-edit"></i></a>
                               <a href="{{url('delete_user')}}/{{$list->id}}" title="Trash"><i class="feather icon-trash"></i></a>
                           </td>
                         </tr>
                         @endforeach


                       </tbody>
                    </table>
                   </div>
                </div>
             </div>
           </div>
        </div>
     </div>
     @push('scripts')
     <script>
        $(document).ready( function () {
        $('#myTable').DataTable();
          } );
    </script>
     @endpush
    @endsection

