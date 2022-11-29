@extends('layout')
@section('main')
@section('return_kumeti','active')
<div class="pcoded-content">
    <div class="page-header card" style="padding-top: 15px;">
        @if (session()->has('msg'))
        <div style="margin-top:20px;" class="sufee-alert alert with-close alert-success alert-dismissible fade show">
            {{session('msg')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">x</span>
            </button>
        </div>
        @endif
       <div class="row align-items-end">
          <div class="col-sm-9">
             <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                   <li class="breadcrumb-item">
                      <a href="#"><i class="feather icon-home"></i></a>
                   </li>

                   <li class="breadcrumb-item"><a href="#">Return Kumeti</a> </li>
                </ul>
             </div>
          </div>


       </div>
    </div>
    <div class="pcoded-inner-content">
       <div class="main-body">
         <div class="row">

             <div class="col-sm-8 right_contents content_right">
                <div class="inner_contents table-responsive customers_setup">
                   <div class="main_head">
                      <h4>Return Kumeti</h4>
                   </div>
                   <div class="form_box">
                      <form action="{{route('manage_return_kumeti_process')}}" method="POST">
                        @csrf
                         <div class="row">
                            <div class="col-sm-3 padd_right">
                               <div class="input_label_box">
                                  <label>Return Number*</label>
                                  <input type="text" placeholder="1" name="return_number" value="{{ $return_number }}">
                                  @error('return_number')
                                  <div class="alert alert-danger">
                                      {{ $message }}
                                  </div>
                                @enderror
                               </div>
                            </div>
                            <div class="col-sm-3 padd_right">
                               <div class="input_label_box">
                                  <label>Kumeti Code*</label>
                                  <input type="text" name="kumeti_code" value="{{ $kumeti_code }}">
                                  @error('kumeti_code')
                                  <div class="alert alert-danger">
                                      {{ $message }}
                                  </div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 ">
                               <div class="input_label_box">
                                  <label>Member Name*</label>
                                  <input type="text" name="member_name" value="{{ $member_name }}">
                                  @error('member_name')
                                  <div class="alert alert-danger">
                                      {{ $message }}
                                  </div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-sm-3 padd_right">
                               <div class="input_label_box">
                                  <label>Phone</label>
                                  <input type="text" name="phone" value="{{ $phone }}">
                                  @error('phone')
                                  <div class="alert alert-danger">
                                      {{ $message }}
                                  </div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-sm-3 padd_right">
                               <div class="input_label_box">
                                  <label>Mobile / SMS No.</label>
                                  <input type="text" name="mobile" value="{{ $mobile }}">
                                  @error('mobile')
                                  <div class="alert alert-danger">
                                      {{ $message }}
                                  </div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 ">
                               <div class="input_label_box">
                                  <label>Email* </label>
                                  <input type="text" name="email" value="{{ $email }}">
                                  @error('email')
                                  <div class="alert alert-danger">
                                      {{ $message }}
                                  </div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 ">
                               <div class="input_label_box">
                                  <label>Address</label>
                                  <input type="text" name="area" value="{{ $area }}">
                                  @error('area')
                                  <div class="alert alert-danger">
                                      {{ $message }}
                                  </div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-sm-3 padd_right">
                               <div class="input_label_box">
                                  <label>CNIC*</label>
                                  <input type="text" name="cnic" value="{{ $cnic }}">
                                  @error('cnic')
                                  <div class="alert alert-danger">
                                      {{ $message }}
                                  </div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-sm-4 padd_right">
                               <div class="input_label_box">
                                  <label>Total Collected Kumeties</label>
                                  <input type="text" name="total_collected_kumeties" value="{{ $total_collected_kumeties }}">
                                  @error('total_collected_kumeties')
                                  <div class="alert alert-danger">
                                      {{ $message }}
                                  </div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-sm-3 ">
                               <div class="input_label_box">
                                  <label>Total Amount</label>
                                  <input type="text" name="total_amount" value="{{ $total_amount }}">
                                  @error('total_amount')
                                  <div class="alert alert-danger">
                                      {{ $message }}
                                  </div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-sm-2 " style="padding-left: 0;">
                               <div class="input_label_box">
                                  <label>Return Amount</label>
                                  <input type="text" name="return_amount" value="{{ $return_amount }}">
                                  @error('return_amount')
                                  <div class="alert alert-danger">
                                      {{ $message }}
                                  </div>
                                @enderror
                                </div>
                            </div>
                          </div>


<input type="hidden" name="id" value={{ $id }}>
                         <div class="submit_btn">
                            <button type="submit">Save</button>
                         </div>
                      </form>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>

@endsection


