@extends('layouts.app')

@section('content')
<div class="content-page">
<div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Welcome Admin !</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">R&S</a></li>
                                    <li class="active">Technology</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                        <div class="row">
                            <div class="{{-- col-md-6 --}} col-sm-6 col-lg-4">
                                <div class="mini-stat clearfix bx-shadow">
                                    <span class="mini-stat-icon bg-info"><i {{-- class="ion-social-usd" --}}class="ion-android-contacts"></i></span>
                                    <div class="mini-stat-info text-right text-muted">
                                        <span class="counter">{{$employee}}</span>
                                       
                                        <a href="{{ route('all.employee')}}"> Employees</a>
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">Employees <span class="pull-right"></span></h5>
                                            <div {{-- class="progress progress-sm m-0" --}}>
{{--                                                 <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                                    <span class="sr-only">10% Complete</span>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="{{-- col-md-6 --}} col-sm-6 col-lg-4">
                                <div class="mini-stat clearfix bx-shadow">
                                    <span class="mini-stat-icon bg-purple"><i class="ion-ios7-cart"></i></span>
                                    <div class="mini-stat-info text-right text-muted">
                                        <span class="counter">{{  $order  }}</span>
                                        <a href="{{ route('success.orders')}}">Orders</a>
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">Orders <span class="pull-right"></span></h5>
                                            <div {{-- class="progress progress-sm m-0" --}}>
                                               {{--  <div class="progress-bar progress-bar-purple" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                                                    <span class="sr-only">90% Complete</span>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                          

                            

                             <div class="{{-- col-md-6 --}} col-sm-6 col-lg-4">
                                <div class="mini-stat clearfix bx-shadow">
                                    <span class="mini-stat-icon bg-primary"><i class="ion-android-contacts"></i></span>
                                    <div class="mini-stat-info text-right text-muted">
                                        <span class="counter">{{  $customer  }}</span>
                                       <a href="{{ route('all.customer')}}">Customers</a>

                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">Customers <span class="pull-right"></span></h5>
                                            <div >
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                             <div class="{{-- col-md-6 --}} col-sm-6 col-lg-4">
                                <div class="mini-stat clearfix bx-shadow">
                                    <span class="mini-stat-icon bg-primary"><i class="ion-android-contacts"></i></span>
                                    <div class="mini-stat-info text-right text-muted">
                                        <span class="counter">{{  $product  }}</span>
                                        <a href="{{ route('all.product')}}">Products</a>
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">Products <span class="pull-right"></span></h5>
                                            <div >
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                             <div class="{{-- col-md-6 --}} col-sm-6 col-lg-4">
                                <div class="mini-stat clearfix bx-shadow">
                                    <span class="mini-stat-icon bg-primary"><i class="ion-android-contacts"></i></span>
                                    <div class="mini-stat-info text-right text-muted">
                                        <span class="counter">{{  $category }}</span>
                                        <a href="{{ route('all.category')}}">Categories</a>
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">Category <span class="pull-right"></span></h5>
                                            <div >
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                             <div class="{{-- col-md-6 --}} col-sm-6 col-lg-4">
                                <div class="mini-stat clearfix bx-shadow">
                                    <span class="mini-stat-icon bg-primary"><i class="ion-android-contacts"></i></span>
                                    <div class="mini-stat-info text-right text-muted">
                                        <span class="counter">{{  $supplier  }}</span>
                                       <a href="{{ route('all.supplier')}}">Suppliers</a>
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">Suplier <span class="pull-right"></span></h5>
                                            <div >
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="{{-- col-md-6 --}} col-sm-6 col-lg-4">
                                <div class="mini-stat clearfix bx-shadow">
                                    <span class="mini-stat-icon bg-primary"><i class="ion-android-contacts"></i></span>
                                    <div class="mini-stat-info text-right text-muted">
                                        <span class="counter">{{ $user }}</span>
                                         Users
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">Users <span class="pull-right"></span></h5>
                                            <div {{-- class="progress progress-sm m-0" --}}>
                                                {{-- <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: 57%;">
                                                    <span class="sr-only">57% Complete</span>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>




                        </div> 
                        

                    </div> <!-- container -->
                               
                </div> <!-- content -->
@endsection
