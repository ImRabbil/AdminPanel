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
                                    <div class="panel-heading"><h3 class="panel-title">Add Customer</h3></div>
                                    <div class="panel-body">
                                        <form role="form" action="{{ url('/insert-supplier') }}" method="post" enctype="multipart/form-data">
                                           {{ csrf_field() }} 
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Supplier Name</label>
                                                <input type="text" class="form-control" name="name" placeholder="Full Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Email</label>
                                                <input type="email" class="form-control" name="email" placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Phone</label>
                                                <input type="text" class="form-control" name="phone" placeholder="Phone">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Address</label>
                                                <input type="text" class="form-control" name="address" placeholder="Address">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Shop Name</label>
                                                <input type="text" class="form-control" name="shop" placeholder="Shop Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Account Holder</label>
                                                <input type="text" class="form-control" name="accountholder" placeholder="Account Holder">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Account Number</label>
                                                <input type="text" class="form-control" name="accountnumber" placeholder="Account Number">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Bank Name</label>
                                                <input type="text" class="form-control" name="bankname" placeholder="Bank Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Branch Name</label>
                                                <input type="text" class="form-control" name="branchname" placeholder="Bank Branch">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">City</label>
                                                <input type="text" class="form-control" name="city" placeholder="City">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Supplier Type</label>
                                                
                                                <select name="type" class="form-control">
                                                    <option disabled="" selected=""></option>
                                                    <option>Distributor</option>
                                                    <option>Whole Seller</option>
                                                    <option>Broker</option>
                                                </select>
                                            </div>
                                            {{-- <div class="form-group">
                                                <img src="#" id="image" >
                                                <label for="exampleInputPassword1">Photo</label>
                                                <input type="file" name="photo"accept="image/*" class="upload" required onchange="readURL(this);" >
                                            </div> --}}
                                          <div class="form-group">
                                                <img src="#" id="image" >
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
                                .attr('src',e.target.result)
                                .width(80)
                                .height(80);
                            };
                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                </script>
@endsection
