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
                                        <h3 class="panel-title">All Roles</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
															<th>Serial</th>
															<th>DB ID</th>
															<th>Name</th>
															<th>Created_at</th>
															<th>Option</th>
														</tr>
                                                    </thead>

                                             
                                                   <tbody>
														@foreach($roles as $key => $role)
														<tr>
															<td>{{$key+1}}</td>
															<td>{{$role->id}}</td>
															<td>{{$role->name}}</td>
															<td>{{$role->created_at->diffForHumans()}}</td>
															<td>
																<a href="/Inventory/role/{{$role->id}}/user" class="btn btn-primary">
																	<i class="fa fa-eye"></i>
																</a>
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
