@extends('layout')
@section('main')
@section('kumeti_member_registration','active')
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

                   <li class="breadcrumb-item"><a href="#">Kumeti Member Registration</a> </li>
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
                      <h4>Kumeti Member Registration</h4>
                   </div>
                   <div class="form_box">
                      <form action="{{route('manage_kumeti_member_registration_process')}}" id="myFormID" method="POST">
                        @csrf
                         <div class="row">
                            <div class="col-sm-2 padd_right">
                               <div class="input_label_box">
                                  <label>Kumeti Code*</label>
                                  <input type="text" placeholder="1" name="kumeti_code" value="{{ $kumeti_code }}">
                                  @error('kumeti_code')
                                  <div class="alert alert-danger">
                                      {{ $message }}
                                  </div>
                              @enderror
                               </div>
                            </div>
                            <div class="col-sm-3 padd_right">
                               <div class="input_label_box">
                                  <label>Member Code*</label>
                                  <input type="text" name="member_code" id="member_code" value="{{ $member_code }}" placeholder="Enter code and Press Enter">
                                  @error('member_code')
                                  <div class="alert alert-danger">
                                      {{ $message }}
                                  </div>
                              @enderror
                                </div>
                            </div>
                            <div class="col-sm-4 padd_8">
                               <div class="input_label_box">
                                  <label>Member Name</label>
                                  <input type="text" name="member_name" value="{{ $member_name }}" id="member_name">
                            @error('member_name')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                               </div>
                            </div>

                            <div class="col-sm-3 padd_7">
                               <div class="input_label_box">
                                  <label>Mobile/ SMS no.</label>
                                  <input type="text" name="mobile" value="{{ $mobile }}" id="mobile">

                                @error('mobile')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                            </div>
                            <div class="col-sm-3 padd_right">
                               <div class="input_label_box">

                                  <label>Kumeti Membership</label>
                                  <select name="kumeti_membership" id="kumeti_id"    class="myselect">
                                    <option value=" ">Select Kumeti MemberShip</option>
                                    @foreach ($kumeti_definations as $lists)
                                    @if ($kumeti_membership==$lists->id)
                                    <option value="{{$lists->id}}" selected>{{$lists->title}}</option>
                                   @else
                                   <option value="{{$lists->id}}">{{$lists->title}}</option>
                                    @endif

                                    @endforeach
                                  </select>
                                  @error('kumeti_membership')
                                  <div class="alert alert-danger">
                                      {{ $message }}
                                  </div>
                              @enderror
                             </div>
                            </div>
                            <div class="col-sm-3 padd_right">
                               <div class="input_label_box">
                                  <label>Monthly Installment</label>
                                  <input type="text"  name="monthly_installments" id="monthly_installments" value="{{ $monthly_installments }}">
                                  @error('monthy_installments')
                                  <div class="alert alert-danger">
                                      {{ $message }}
                                  </div>
                              @enderror
                                </div>
                            </div>
                            <div class="col-sm-3 padd_right">
                               <div class="input_label_box">
                                  <label>Total Kumeti</label>
                                  <input type="text" name="total_kumeti" id="total_kumeti" value="{{ $total_kumeti }}">
                                  @error('total_kumeti')
                                  <div class="alert alert-danger">
                                      {{ $message }}
                                  </div>
                              @enderror
                                </div>
                            </div>
                            <div class="col-sm-3 ">
                               <div class="input_label_box">
                                  <label>Period</label>
                                  <input type="text" name="period" id="period" value="{{ $period }}">
                                  @error('period')
                                  <div class="alert alert-danger">
                                      {{ $message }}
                                  </div>
                              @enderror
                                </div>
                            </div>
                            <div class="col-sm-3 padd_right">
                               <div class="input_label_box">
                                  <label>Members</label>
                                  <input type="text" name="members" id="members" value="{{ $members }}">
                                  @error('members')
                                  <div class="alert alert-danger">
                                      {{ $message }}
                                  </div>
                              @enderror
                                </div>
                            </div>


                            <div class="col-sm-3 padd_right">
                               <div class="input_label_box">
                                  <label>Start Date</label>
                                  <input type="date" name="start_date" value="{{ date('Y-m-d',strtotime($start_date)) }}">
                                  @error('start_date')
                                  <div class="alert alert-danger">
                                      {{ $message }}
                                  </div>
                              @enderror
                                </div>
                            </div>
                            <div class="col-sm-3 padd_right">
                               <div class="input_label_box">
                                  {{-- <label>End Date</label> --}}
                                  <input type="hidden" name="end_date">
                                  @error('end_date')
                                  <div class="alert alert-danger">
                                      {{ $message }}
                                  </div>
                              @enderror
                                </div>
                            </div>
                         </div>
                         <input type="hidden" name="id" value="{{ $id }}">
                         <input type="hidden" name="member_id" value="{{ $member_id }}" id="member_id">

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
    jQuery('#kumeti_id').change(function(){
        //alert('yes');
        let id=jQuery(this).val();
       jQuery.ajax({
           url:"{{url('/getkumeti')  }}",
           type:'post',
           data:{
                _token:"{{ csrf_token() }}",
                id : id,
                },
                success:function(result){
                    jQuery('#total_kumeti').val(result.total_kumeti);
                    jQuery('#monthly_installments').val(result.monthly_installments);
                    jQuery('#period').val(result.period);
                    jQuery('#members').val(result.members);
                }
       })
    });
});







jQuery(document).ready(function(){
jQuery('#member_code').on('keypress',function(e){
    if(e.which == 13) {
       // alert('User pressed Enter!');
       let id=jQuery(this).val();
      let member_code=jQuery('#member_code').val();
       jQuery.ajax({
           url:"{{url('/member_detail')  }}",
           type:'post',
           data:{
                _token:"{{ csrf_token() }}",
                id : id,
                member_code:member_code,
                },
                success:function(result){
                    jQuery('#member_name').val(result[0].name);
                    jQuery('#mobile').val(result[0].mobile);
                    jQuery('#member_id').val(result[0].id);
                }
       })

       e.preventDefault();
        return false;
}
});
});
 </script>

@endsection
