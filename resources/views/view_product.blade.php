@extends('layouts.app')

@section('content')
<div class="content-page">
<div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Welcome !</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">R&S</a></li>
                                    <li class="active">Technology</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                        <div class="row">
                          <!-- Basic example -->
                          <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">View Product</h3></div>
                                        <div class="panel-body">
                                        <form role="form">
                                            <img src="{{ URL::to($view->product_image)}}">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Product Name</label>
                                                <p>{{ $view->product_name}}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Code</label>
                                                <p>{{ $view->product_code}}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Category</label>
                                               <p>{{ $view->cat_name}}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Suppliers</label>
                                               <p>{{ $view->name}}</p>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Barcode</label>
                                                <p>{!! $view->product_garage !!}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Route</label>
                                                <p>{{ $view->product_route}}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Buy Date</label>
                                                <p>{{ $view->buy_date}}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Expire Date</label>
                                                <p>{{ $view->expire_date}}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Buying Price</label>
                                                <p>{{ $view->buying_price}}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Selling Price</label>
                                                <p>{{ $view->selling_price}}</p>
                                            </div>
                                           
                                        </form>
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->

                        </div>

                    </div> <!-- container -->
                               
                </div> <!-- content -->

@endsection
