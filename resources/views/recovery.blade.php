@extends('layout')
@section('main')
@section('recovery', 'active')
<div class="pcoded-content">
    <div class="page-header card">
        @if (session()->has('msg'))
            <div style="margin-top:20px;" class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                {{ session('msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
        @endif
        @if (session()->has('del'))
            <div style="margin-top:20px;" class="sufee-alert alert with-close alert-danger alert-dismissible fade-show">
                {{ session('del') }}
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
            <div class="col-sm-3">
                <div class="add_new">
                    <a href="{{ url('manage_recovery') }}" class="btn-inner-menu">
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
                                <th>Recovery NO</th>
                                <th>Kumeti Code</th>
                                <th>Member Name</th>
                                <th>Mobile</th>
                                <th>phone</th>
                                <th>cnic</th>
                                <th>date</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Action</th>
                            </thead>
                            @php
                                $count = 1;
                            @endphp
                            @foreach ($data as $list)
                                <tr>

                                    <td>{{ $count++ }}</td>
                                    <td>{{ $list->recovery_no }}</td>
                                    <td>{{ $list->kcd }}</td>
                                    <td>{{ $list->member_name }}</td>
                                    <td>{{ $list->mobile }}</td>
                                    <td>{{ $list->phone }}</td>
                                    <td>{{ $list->cnic }}</td>
                                    <td>{{ $list->date }}</td>
                                    <td>{{ $list->created_at }}</td>
                                    <td>{{ $list->updated_at }}</td>

                                    <td>
                                        <a class="create_btn"
                                            href="{{ url('manage_recovery') }}/{{ $list->id }}"
                                            title="Edit"><i class="feather icon-edit"></i></a>

                                        <a href="{{ url('delete_recovery') }}/{{ $list->id }}"
                                            title="Trash"><i class="feather icon-trash"></i></a>
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
        $(document).ready(function() {
            $('#myTable').DataTable({
                responsive: true
            });
        });
    </script>
@endpush
@endsection
