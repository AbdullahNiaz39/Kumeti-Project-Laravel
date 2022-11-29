@extends('layout')
@section('main')
@section('dashboard','active')


<div class="pcoded-content">
    <div class="page-header card" style="padding-top: 15px;">
       <div class="row align-items-end">
          <div class="col-sm-9">
             <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                   <li class="breadcrumb-item">
                      <a href="#"><i class="feather icon-home"></i></a>
                   </li>

                   <li class="breadcrumb-item"><a href="#">Dashboard</a> </li>
                </ul>
             </div>
          </div>


       </div>
    </div>
    <div class="pcoded-inner-content">
       <div class="main-body">
         <div class="row">
           <div class="col-lg-3 col-6 sidegappnone">
             <!-- small box -->
             <div class="small-box bg-info">
               <div class="inner">
                 <h3>150</h3>

                 <p>New Orders</p>
               </div>
               <div class="icon">
                 <i class="fa fa-bag"></i>
               </div>
               <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
             </div>
           </div>
           <!-- ./col -->
           <div class="col-lg-3 col-6 sidegappnone">
             <!-- small box -->
             <div class="small-box bg-success">
               <div class="inner">
                 <h3>53<sup style="font-size: 20px">%</sup></h3>

                 <p>Bounce Rate</p>
               </div>
               <div class="icon">
                 <i class="fa fa-stats-bars"></i>
               </div>
               <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
             </div>
           </div>
           <!-- ./col -->
           <div class="col-lg-3 col-6 sidegappnone">
             <!-- small box -->
             <div class="small-box bg-warning">
               <div class="inner">
                 <h3>44</h3>

                 <p>User Registrations</p>
               </div>
               <div class="icon">
                 <i class="fa fa-person-add"></i>
               </div>
               <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
             </div>
           </div>
           <!-- ./col -->
           <div class="col-lg-3 col-6 sidegappnone">
             <!-- small box -->
             <div class="small-box bg-danger">
               <div class="inner">
                 <h3>65</h3>

                 <p>Unique Visitors</p>
               </div>
               <div class="icon">
                 <i class="fa fa-pie-graph"></i>
               </div>
               <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
             </div>
           </div>
           <!-- ./col -->
         </div>
         </div>
      </div>
   </div>

@endsection
