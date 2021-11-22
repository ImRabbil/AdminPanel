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
                             <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Today Sales </h3>
                                        
                                    </div>
                                    
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Customer Name</th>
                                                            <th>Product Name</th>
                                                            <th> Quantity</th>
                                                            <th>Total Amount</th>
                                                           
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                        @foreach($sales as $row)
                                                        <tr>
                                                            <td>
                                                               
                                                                {{$row->name}}

                                                            </td>
                                                            <td>{{ $row->product_name}}</td>
                                                            {{-- <td>{{ $row->order_date}}</td> --}}
                                                            <td>{{ $row->total_products}}</td>
                                                            <td>{{ $row->total}}</td>
                                                           {{--  <td>{{ $row->payment_status}}</td>
                                                            <td><span class="badge badge-danger">{{ $row->order_status}}</span></td> --}}


                                                            {{-- <td>
                                                                
                                                             <img src="{{ URL::to($row->product_image)}}" width="60px" height="60px">  

                                                            </td> --}}
                                                            
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
