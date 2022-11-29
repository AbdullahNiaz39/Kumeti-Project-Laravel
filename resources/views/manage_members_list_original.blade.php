@extends('layout')
@section('main')
@section('members_list', 'active')

<div class="pcoded-content">
    <div class="page-header card" style="padding-top: 15px;">
        <div class="row align-items-end">
            <div class="col-sm-9">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="#"><i class="feather icon-home"></i></a>
                        </li>

                        <li class="breadcrumb-item"><a href="#">Add New Member List</a> </li>
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
                            <h4>Add New Member List</h4>
                        </div>
                        <form action="{{ route('manage_members_list_process') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-sm-3 padd_right">
                                    <div class="input_label_box">
                                        <label>Name*</label>
                                        <input type="text" placeholder="" name="name" value="{{ $name }}">
                                        @error('name')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-3 padd_right">
                                    <div class="input_label_box">
                                        <label>Father Name</label>
                                        <input type="text" placeholder="" name="father_name"
                                            value="{{ $father_name }}">
                                        @error('father_name')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-3">
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
                                <div class="col-sm-3 ">
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
                            </div>
                            <div class="row">

                                <div class="col-sm-3 padd_right">
                                    <div class="input_label_box">
                                        <label>Email Address*</label>
                                        <input type="text" name="email" value="{{ $email }}">
                                        @error('email')
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
                                <div class="col-sm-3 padd_right">
                                    <div class="input_label_box">
                                        <label>City</label>
                                        <select name="city" class="myselect" value="{{ $city }}">
                                            <option value=" ">Select City</option>
                                            @foreach ($city_list as $lists)
                                                @if ($city == $lists->name)
                                                    <option value="{{ $lists->name }}" selected>{{ $lists->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $lists->name }}">{{ $lists->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('city')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-3 ">
                                    <div class="input_label_box">
                                        <label>Area</label>
                                        <input type="text" name="area" value="{{ $area }}">
                                        @error('area')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>


                            {{-- <div class="submit_btn">
                       <button type="submit">Save</button>
                     </div> --}}


                    </div>
                </div>
            </div>

        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-12 right_contents content_right">
                <div class="inner_contents table-responsive customers_setup">
                    <div class="main_head">
                        <h4>Gauranters</h4>
                    </div>

                        @php
                            $loop_count_num = 1;
                            $loop_count_prev = $loop_count_num;
                        @endphp
                        @foreach ($member_gruntee as $key)
                            @php
                                $loop_count_prev = $loop_count_num;
                            @endphp
                            <div class="member_gruantee">
                            <input type="hidden" id="mmd" name="mmd[]" value="{{ $key['id'] }}">
                            <div class="form-group">
                                <div id="member_attr_{{ $loop_count_num++ }}">

                                <div class="row">

                                    <div class="col-sm-2 padd_right">
                                        <div class="input_label_box">
                                            <label>Name*</label>
                                            <input type="text" placeholder="" id="gname" name="gname[]"
                                                value="{{ $key['gname'] }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-2 padd_right">
                                        <div class="input_label_box">
                                            <label>Phone</label>
                                            <input type="text" id="gphone" placeholder="" name="gphone[]"
                                                value="{{ $key['gphone'] }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-2 padd_right">
                                        <div class="input_label_box">
                                            <label>CNIC</label>
                                            <input type="text" id="gcnic" name="gcnic[]" value="{{ $key['gcnic'] }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="input_label_box">
                                            <label>Address</label>
                                            <input type="text" id="gaddress" name="gaddress[]" value="{{ $key['gaddress'] }}">
                                        </div>
                                    </div>
                                    @if ($loop_count_num == 2)
                                        <div class="col-sm-1">
                                            <div class="plus_btn">
                                                <a type="submit" onclick="add_more()" id="Add"><i
                                                        class="fa fa-plus"></i></a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-sm-1">
                                            <div class="minus_btn">
                                                <a href="{{ url('graunter_list_delete') }}/{{ $key['id'] }}/{{ $id }}"
                                                    onclick="remove_more('{{ $loop_count_prev }}')" id="Remove"><i
                                                        class="fa fa-minus"></i></a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                        @endforeach
                    </div>
                </div>




            </div>
            </div>
            {{-- <div class="inner_contents table-responsive customers_setup" style="padding:13px 0 0;margin:10px 0 0;">
                  <div id="member_gruantee">
                        @php
                            $loop_count_num = 1;
                            $loop_count_prev = $loop_count_num;
                        @endphp
                        @foreach ($member_gruntee as $key)
                            @php
                                $loop_count_prev = $loop_count_num;
                            @endphp
                            <input type="hidden" id="mmd" name="mmd[]">
                            <div class="form-group">
                            <div class="row" id="member_attr_{{ $loop_count_num++ }}">

                                <div class="col-sm-2 padd_right">
                                    <div class="input_label_box">
                                        <label>Name*</label>
                                        <input type="text" placeholder="" name="gname[]">
                                    </div>
                                </div>
                                <div class="col-sm-2 padd_right">
                                    <div class="input_label_box">
                                        <label>Phone</label>
                                        <input type="text" placeholder="" name="gphone[]"
                                            >
                                    </div>
                                </div>
                                <div class="col-sm-2 padd_right">
                                    <div class="input_label_box">
                                        <label>CNIC</label>
                                        <input type="text" name="gcnic[]">
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="input_label_box">
                                        <label>Address</label>
                                        <input type="text" name="gaddress[]" >
                                    </div>
                                </div>
                                @if ($loop_count_num == 2)
                                    <div class="col-sm-1">
                                        <div class="plus_btn">
                                            <a type="submit" onclick="add_more()" id="Add"><i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-sm-1">
                                        <div class="minus_btn">
                                            <a href="{{url('graunter_list_delete')}}/{{$key['id']}}/{{$id}}" onclick="remove_more('{{ $loop_count_prev }}')" id="Remove"><i class="fa fa-minus"></i></a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div> --}}
        </div>
        </div>
        <div class="submit_btn save_btn">
            <button type="submit">Save</button>
        </div>
        <input type="hidden" value="{{ $id }}" name="id">
        </form>


</div>
</div>



@endsection
<script>
    var loop_count = 1;

    function add_more() {
        loop_count++;
        var html =
            '<input type="hidden" id="mmd" name="mmd[]"><div class="form-group"><div id="member_attr_'+loop_count +'"><div class="row">';
        html +=
            '<div class="col-sm-2 padd_right"><div class="input_label_box"><label>Name*</label><input type="text" name="gname[]" id="gname" placeholder="" ></div></div>';
        html +=
            '<div class="col-sm-2 padd_right"><div class="input_label_box"><label>Phone</label><input type="text" name="gphone[]" id="gphone" placeholder=""></div></div>';
        html +=
            '<div class="col-sm-2 padd_right"><div class="input_label_box"><label>CNIC</label><input type="text" name="gcnic[]" id="gcnic"></div></div>';
        html +=
            '<div class="col-sm-5"><div class="input_label_box"><label>Address</label><input type="text" id="gcnic" name="gaddress[]"></div></div>';
        html += '<div class="col-sm-1"><div class="minus_btn"><a onclick=remove_more("' + loop_count +
            '") id="Remove"><i class="fa fa-minus"></i></a></div></div></div></div></div>';
             $('.member_gruantee').append(html);
    }


    function remove_more(loop_count) {
        jQuery('#member_attr_' + loop_count).remove();
    }
</script>
