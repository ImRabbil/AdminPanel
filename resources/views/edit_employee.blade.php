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
                                    <div class="panel-heading"><h3 class="panel-title">Update Customer Information</h3></div>
                                    <div class="panel-body">
                                        <form role="form" action="{{ url('/update-employee/.$edit->id') }}" method="post" enctype="multipart/form-data">
                                           {{ csrf_field() }} 
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name</label>
                                                <input type="text" class="form-control" name="name" value="{{$edit->name}}" required >
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Email</label>
                                                <input type="email" class="form-control" name="email" value="{{$edit->email}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Phone</label>
                                                <input type="text" class="form-control" name="phone" value="{{$edit->phone}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Address</label>
                                                <input type="text" class="form-control" name="address" value="{{$edit->address}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Experience</label>
                                                <input type="text" class="form-control" name="experience" value="{{$edit->experience}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">NID NO.</label>
                                                <input type="text" class="form-control" name="nid_no" value="{{$edit->nid_no}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Salary</label>
                                                <input type="text" class="form-control" name="salary" value="{{$edit->salary}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Vacation</label>
                                                <input type="text" class="form-control" name="vacation" value="{{$edit->vacation}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">City</label>
                                                <input type="text" class="form-control" name="city" value="{{$edit->city}}" required>
                                            </div>
                                            <div class="form-group">
                                                <img src="" id="image" >
                                                <label for="exampleInputPassword1">Photo</label>
                                                <input type="file" name="photo"accept="image/*" class="upload" required onchange="readURL(this);" >
                                            </div>
                                            
                                            <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                                        </form>
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->

                        </div>

                    </div> <!-- container -->
                               
                </div> <!-- content -->


                <script type="text/javascript">
                    function readURL(input){
                        if (input.files && input.files[0]){
                            var reader = new FileReader();
                            reader.onload= function(e){
                                $('#image')
                                .attr('src'e.target.result)
                                .width(80)
                                .height(80);
                            };
                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                </script>
@endsection
