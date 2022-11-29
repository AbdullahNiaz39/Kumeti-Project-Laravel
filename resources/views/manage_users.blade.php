@extends('layout')
{{-- @section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
@endsection --}}
@section('main')
@section('users','active')
<div class="pcoded-content">
    <div class="page-header card" style="padding-top: 15px;">
       <div class="row align-items-end">
          <div class="col-sm-9">
             <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                   <li class="breadcrumb-item">
                      <a href="#"><i class="feather icon-home"></i></a>
                   </li>

                   <li class="breadcrumb-item"><a href="#">Add New User</a> </li>
                </ul>
             </div>
          </div>


       </div>
    </div>
    <div class="pcoded-inner-content">
       <div class="main-body">
         <div class="row">

             <div class="col-sm-12 right_contents content_right">
                <div class="inner_contents table-responsive customers_setup">
                   <div class="main_head">
                      <h4>Add New User</h4>
                   </div>
                   <form action="{{route('manage_users_process')}}" method="POST">
                       @csrf
                       <div class="row">
                         <div class="col-sm-3 padd_right">
                             <div class="input_label_box">
                               <label>Name*</label>
                               <input type="text" placeholder="Enter name" name="name" value="{{$name}}">
                               @error('name')
                               <div class="alert alert-danger">
                                   {{ $message }}
                               </div>
                           @enderror
                            </div>
                         </div>
                         <div class="col-sm-3 padd_right">
                             <div class="input_label_box">
                               <label>Mobile/ SMS No.</label>
                               <input type="text" name="mobile" value="{{$mobile}}">
                               @error('mobile')
                               <div class="alert alert-danger">
                                   {{ $message }}
                               </div>
                           @enderror
                            </div>
                         </div>
                         <div class="col-sm-3 ">
                             <div class="input_label_box">
                               <label>Phone</label>
                               <input type="text" name="phone" value="{{$phone}}">
                               @error('phone')
                               <div class="alert alert-danger">
                                   {{ $message }}
                               </div>
                           @enderror
                            </div>
                         </div>
                         <div class="col-sm-3 ">
                             <div class="input_label_box">
                               <label>Username/Email* </label>
                               <input type="text" placeholder="" name="email" value="{{$email}}">
                               @error('email')
                               <div class="alert alert-danger">
                                   {{ $message }}
                               </div>
                           @enderror
                            </div>
                         </div>
                         {{-- <div class="col-sm-3 padd_right">
                             <div class="input_label_box">
                               <label>City</label>
                               <select name="city" class="myselect"  class="form-control" value="{{$city}}">
                                <option value=" ">Select City</option>
                                @foreach ($members_list as $lists)
                                @if($city ==$lists->city)
                                <option value="{{$lists->city}}" selected>{{$lists->city}}</option>
                                @else
                                <option value="{{$lists->city}}">{{$lists->city}}</option>
                                @endif
                                @endforeach --}}

                               {{-- <option value="Andhra Pradesh">Andhra Pradesh</option>
                               <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                               <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                               <option value="Assam">Assam</option>
                               <option value="Bihar">Bihar</option>
                               <option value="Chandigarh">Chandigarh</option>
                               <option value="Chhattisgarh">Chhattisgarh</option>
                               <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                               <option value="Daman and Diu">Daman and Diu</option>
                               <option value="Delhi">Delhi</option>
                               <option value="Lakshadweep">Lakshadweep</option>
                               <option value="Puducherry">Puducherry</option>
                               <option value="Goa">Goa</option>
                               <option value="Gujarat">Gujarat</option>
                               <option value="Haryana">Haryana</option>
                               <option value="Himachal Pradesh">Himachal Pradesh</option>
                               <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                               <option value="Jharkhand">Jharkhand</option>
                               <option value="Karnataka">Karnataka</option>
                               <option value="Kerala">Kerala</option>
                               <option value="Madhya Pradesh">Madhya Pradesh</option>
                               <option value="Maharashtra">Maharashtra</option>
                               <option value="Manipur">Manipur</option>
                               <option value="Meghalaya">Meghalaya</option>
                               <option value="Mizoram">Mizoram</option>
                               <option value="Nagaland">Nagaland</option>
                               <option value="Odisha">Odisha</option>
                               <option value="Punjab">Punjab</option>
                               <option value="Rajasthan">Rajasthan</option>
                               <option value="Sikkim">Sikkim</option>
                               <option value="Tamil Nadu">Tamil Nadu</option>
                               <option value="Telangana">Telangana</option>
                               <option value="Tripura">Tripura</option>
                               <option value="Uttar Pradesh">Uttar Pradesh</option>
                               <option value="Uttarakhand">Uttarakhand</option>
                               <option value="West Bengal">West Bengal</option> --}}
                               {{-- </select>
                             </div>
                         </div> --}}
                         <div class="col-sm-12 ">
                             <div class="input_label_box">
                               <label>Address</label>
                               <input type="text" name="address" value="{{$address}}">
                               @error('address')
                               <div class="alert alert-danger">
                                   {{ $message }}
                               </div>
                           @enderror
                             </div>
                         </div>
                       </div>
                       <div class="row">
{{--
                         <div class="col-sm-3 padd_right">
                             <div class="input_label_box">
                               <label>User Name</label>
                               <input type="text"  name="">
                             </div>
                         </div> --}}
                         <div class="col-sm-3 padd_right">
                             <div class="input_label_box">
                               <label>Password*</label>
                               <input  type="password" placeholder="****" name="password" value="{{$password}}">
                               @error('title')
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
