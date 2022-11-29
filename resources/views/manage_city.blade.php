@extends('layout')
@section('main')
@section('city','active')
<div class="pcoded-content">
    <div class="page-header card" style="padding-top: 15px;">
       <div class="row align-items-end">
          <div class="col-sm-9">
             <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                   <li class="breadcrumb-item">
                      <a href="#"><i class="feather icon-home"></i></a>
                   </li>

                   <li class="breadcrumb-item"><a href="#">Manage City</a> </li>
                </ul>
             </div>
          </div>


       </div>
    </div>
    <div class="pcoded-inner-content">
       <div class="main-body">
         <div class="row">

             <div class="col-sm-7 right_contents content_right">
                <div class="inner_contents table-responsive customers_setup">
                   <div class="main_head">
                      <h4>Add New City</h4>
                   </div>
                   <form action="{{route('manage_city_process')}}" method="POST">
                    @csrf
                   <div class="row">
                     <div class="col-sm-11 padd_right">
                         <div class="input_label_box">
                           <label>Name</label>
                           <input type="text" placeholder="" name="name" value="{{$name}}" >
                           @error('name')
                           <div class="alert alert-danger">
                               {{ $message }}
                           </div>
                       @enderror
                        </div>
                     </div>
                    </div>



                   <div class="submit_btn">
                     <button type="submit">Save</button>
                   </div>
                   <input type="hidden" name="id" value="{{$id}}">
                 </form>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
@endsection
