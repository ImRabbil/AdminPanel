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
                                    <div class="panel-heading"><h3 class="panel-title">Add Product</h3></div>
                                    <div class="panel-body">
                                        <form role="form" action="{{ url('/insert-product') }}" method="post" enctype="multipart/form-data">
                                           {{ csrf_field() }} 
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Product Name</label>
                                                <input type="text" class="form-control" name="product_name" placeholder="Product Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Code</label>
                                                <input type="text" class="form-control" name="product_code" placeholder="Product Code">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Category</label>
                                                @php
                                                $cat = DB::table('categories')->get();
                                                @endphp
                                                <select name="cat_id" class="form-control">
                                                     <option disabled="" selected=""></option>
                                                    @foreach($cat as $row)

                                                    <option value="{{$row->id}}">{{$row->cat_name}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Suppliers</label>
                                                @php
                                                $sup = DB::table('suppliers')->get();
                                                @endphp
                                                <select name="sup_id" class="form-control">
                                                     <option disabled="" selected=""></option>
                                                    @foreach($sup as $row)

                                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Stock House</label>
                                                <input type="text" class="form-control" name="product_garage" placeholder="Stock House">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Route</label>
                                                <input type="text" class="form-control" name="product_route" placeholder="Product Route">
                                            </div>


                                             <div class="form-group">
                                                <label for="exampleInputPassword1">Product Quantity</label>
                                                <input type="text" class="form-control" name="product_quantity" placeholder="Product Quantity">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Buy Date</label>
                                                <input type="date" class="form-control" name="buy_date" placeholder="Buy Date">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Expire Date</label>
                                                <input type="date" class="form-control" name="expire_date" placeholder="Expire Date">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Buying Price</label>
                                                <input type="text" class="form-control" name="buying_price" placeholder="Buying Price">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Selling Price</label>
                                                <input type="text" class="form-control" name="selling_price" placeholder="Selling Price">
                                            </div>
                                            {{-- <div class="form-group">
                                                <img src="" id="image" >
                                                <label for="exampleInputPassword1">Photo</label>
                                                <input type="file" name="product_image"accept="image/*" class="upload" required onchange="readURL(this);" >
                                            </div> --}}

                                            <div class="form-group">
                                                <img src="#" id="image" >
                                                <label for="exampleInputPassword1">Photo</label>
                                                <input type="file" name="product_image"accept="image/*" class="upload" required onchange="readURL(this);" >
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
