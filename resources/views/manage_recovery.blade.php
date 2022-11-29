@extends('layout')
@section('main')
@section('recovery','active')

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

                   <li class="breadcrumb-item"><a href="#">Recovery</a> </li>
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
                      <h4>Recovery</h4>
                   </div>
                   <div class="form_box">
                      <form action="{{route('manage_recovery_process')}}" method="POST">
                        @csrf
                         <div class="row">
                            <div class="col-sm-3 padd_right">
                               <div class="input_label_box">
                                  <label>Recovery No*</label>
                                  <input type="text" placeholder="1" name="recovery_no" value="{{ $recovery_no }}">
                                  @error('recovery_no')
                                  <div class="alert alert-danger">
                                      {{ $message }}
                                  </div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-sm-3 padd_right">
                               <div class="input_label_box">
                                  <label>Kumeti Code*</label>
                                  <select name="kumeti_code" id="kumeti_code" class="myselect" value={{$kumeti_code}}>
                                    <option value=" ">Select Kumeti Code</option>
                                    @foreach ($kumeti_member as $lists)
                                   @if ($lists->id==$kumeti_code)
                                   <option value="{{$lists->id}}" selected>{{$lists->kumeti_code}}</option>
                                   @else
                                   <option value="{{$lists->id}}">{{$lists->kumeti_code}}</option>
                                   @endif

                                    @endforeach
                                  </select>
                                   @error('kumeti_code')
                                  <div class="alert alert-danger">
                                      {{ $message }}
                                  </div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 ">
                               <div class="input_label_box">
                                  <label>Member Name</label>
                                  <input type="text" name="member_name" id="member_name" value="{{ $member_name }}">
                                  {{-- <select name="member_name" id="member_name" class="myselect">
                                    <option value=" ">Select Member Name</option>
                                  </select> --}}
                               </div>
                            </div>
                            <div class="col-sm-3 padd_right">
                               <div class="input_label_box">
                                  <label>Date</label>
                                  <input type="date" name="date" value="{{date('Y-m-d', time())}}">
                               </div>
                            </div>
                            <div class="col-sm-3 padd_right">
                               <div class="input_label_box">
                                  <label>Mobile / SMS No.</label>
                                  <input type="text" name="mobile" id="mobile" value="{{ $mobile }}">
                               </div>
                            </div>
                            <div class="col-sm-3 padd_right">
                               <div class="input_label_box">
                                  <label>Phone</label>
                                  <input type="text" name="phone" id="phone" value="{{ $phone }}">
                               </div>
                            </div>
                            <div class="col-sm-3 ">
                               <div class="input_label_box">
                                  <label>CNIC</label>
                                  <input type="text" name="cnic" id="cnic" value="{{ $cnic }}">
                                  @error('cnic')
                                  <div class="alert alert-danger">
                                      {{ $message }}
                                  </div>
                                @enderror
                                </div>
                            </div>
                         </div>
                        <input type="hidden" name="id" value="{{ $id }}">


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
 <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>

    <script>
jQuery(document).ready(function(){
    jQuery('#kumeti_code').change(function(){

        let id=jQuery(this).val();
    // alert(id);
       jQuery.ajax({
           url:"{{url('/getkumeti_code')}}",
           type:'post',
           data:{
                _token:"{{ csrf_token() }}",
                id : id,
                },
                success:function(result){
                    console.log(result[0][0]);

                     jQuery('#member_name').val(result[0][0].member_name);
                     jQuery('#phone').val(result[0][0].phone);
                     jQuery('#cnic').val(result[0][0].cnic);
                     jQuery('#mobile').val(result[0][0].mobile);

                }
       })
    });
});

</script>


     @endsection


