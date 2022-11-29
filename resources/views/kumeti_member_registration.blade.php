@extends('layout')
@section('main')
@section('kumeti_member_registration', 'active')
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
            <div class="col-sm-9">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="#"><i class="feather icon-home"></i></a>
                        </li>

                        <li class="breadcrumb-item"><a href="#">Kumeti Member</a> </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="add_new">
                    <a href="{{ url('manage_kumeti_member_registration') }}" class="btn-inner-menu">
                        <button type="button">Add New</button></a>
                </div>
            </div>

        </div>
    </div>
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="row">

                <div class="col-sm-12 right_contents">
                    <div class="inner_contents table-responsive">
                        <table id="myTable" class="table_box">
                            <thead>
                                <th>S.No.</th>
                                <th> kumeti Code</th>
                                <th> Member Code</th>
                                <th>Member Name</th>
                                <th>Mobile</th>
                                <th>Kumeti Membership</th>
                                <th>Monthly Installments</th>
                                <th>Total Kumeti</th>
                                <th>Period</th>
                                <th>Members</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Action</th>
                            </thead>
                            @php
                            $count=1;
                            @endphp
                            @foreach ($data as $list)
                            <tr>

                               <td>{{$count++}}</td>
                               <td>{{$list->kumeti_code}}</td>
                               <td>{{$list->member_code}}</td>
                               <td>{{$list->member_name}}</td>
                                <td>{{$list->mobile}}</td>
                                <td>{{$list->title}}</td>
                                <td>{{$list->monthly_installments}}</td>
                                <td>{{$list->total_kumeti}}</td>
                                <td>{{$list->period}}</td>
                                <td>{{$list->members}}</td>
                                <td>{{$list->start_date}}</td>
                                <td>{{$list->end_date}}</td>

                                <td>
                                    <a class="create_btn" href="{{url('manage_kumeti_member_registration')}}/{{$list->id}}" title="Edit"><i
                                            class="feather icon-edit"></i></a>

                                    <a href="{{url('delete_kumeti_member_registration')}}/{{$list->id}}" title="Trash"><i class="feather icon-trash"></i></a>
                                </td>

                            </tr>
                            @endforeach
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
   $('#myTable').DataTable({
    responsive: true
});
});
</script>
@endpush
@endsection
