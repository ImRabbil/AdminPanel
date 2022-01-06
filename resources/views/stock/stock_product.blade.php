@extends('layouts.stockapp')

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
                             <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">All Stock Products</h3>
                                        
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Product Name</th>
                                                            <th>Code</th>
                                                            <th>Product Quantity</th>
                                                            <th>Selling Price</th>
                                                            <th>Status</th>
                                                            {{-- <th>Route</th> --}}
                                                            <th>Image</th>
                                                            
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                        @foreach($product as $row)
                                                        <tr>
                                                            <td>{{ $row->product_name}}</td>
                                                            <td>{{ $row->product_code}}</td>
                                                            <td>{{ $row->product_quantity}}</td>

                                                            <td>{{ $row->selling_price}}</td>


                                                            <td>
                                                            @if($row->product_quantity >= 1 )
                                                            <span class="badge badge-success">Available</span>
                                                            @else
                                                             <span class="badge badge-danger">Stock Out</span>
                                                            @endif
                                                            </td>


                                                           {{--  <td>{{ $row->product_route}}</td> --}}





                                                            <td>
                                                                
                                                             <img src="{{ URL::to($row->product_image)}}" width="60px" height="60px">  

                                                            </td>
                                                            <td>
                                                                <a href="{{route('edit-stock', $row->id)}}" class="btn btn-sm btn-info">Edit</a>
                                                                {{-- <a href="{{URL::to('delete-product/'.$row->id)}}" id="delete" class="btn btn-sm btn-danger">Delete</a>
                                                                <a href="{{URL::to('view-product/'.$row->id)}}"class="btn btn-sm btn-success">View</a> --}}
                                                            </td>
                                                        </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                          

                        </div>

                    </div> <!-- container -->
                               
                </div> <!-- content -->


                
@endsection
