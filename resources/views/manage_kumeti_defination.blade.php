@extends('layout')
@section('main')
@section('kumeti_defination', 'active')
<div class="pcoded-content">
    <div class="page-header card" style="padding-top: 15px;">
        <div class="row align-items-end">
            <div class="col-sm-9">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="#"><i class="feather icon-home"></i></a>
                        </li>

                        <li class="breadcrumb-item"><a href="#">Add New Kumeti Definition</a> </li>
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
                            <h4>Add New Kumeti Definition</h4>
                        </div>
                        <form action="{{ route('manage_kumeti_defination_process') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-4 padd_right">
                                    <div class="input_label_box">
                                        <label>Title</label>
                                        <input type="text" placeholder="" name="title" value="{{ $title }}">
                                        @error('title')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4 padd_right">
                                    <div class="input_label_box">
                                        <label>Monthly Installment </label>
                                        <input type="text" placeholder="" name="monthly_installments"
                                            value="{{ $monthly_installments }}">
                                        @error('monthly_installments')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input_label_box">
                                        <label>Total Kumeti</label>
                                        <input type="text" name="total_kumeti" value="{{ $total_kumeti }}">
                                        @error('total_kumeti')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 padd_right">
                                    <div class="input_label_box">
                                        <label>Period</label>
                                        <input type="text" name="period" value="{{ $period }}">
                                            @error('period')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror



                                    </div>
                                </div>
                                <div class="col-sm-4 padd_right">
                                    <div class="input_label_box">
                                        <label>Period Type</label>
                                        <select id="type" name="type" value={{ $type }}>
                                            @if ($type=="months")
                                            <option value="days">Days</option>
                                            <option value="months" selected>Months</option>
                                            @else
                                            <option value="days"selected>Days</option>
                                            <option value="months" >Months</option>
                                            @endif


                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-4 ">
                                    <div class="input_label_box">
                                        <label>Members</label>
                                        <input type="text" name="members" value="{{ $members }}">
                                        @error('members')
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
                            <input type="hidden" name="id" value="{{ $id }}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
