@extends('layouts.app')

@section('content')
<div class="wrapper-page">
	
         <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading bg-img"> 
                    <div class="bg-overlay"></div>
                   <h3 class="text-center m-t-10 text-white"> Create a new Account for User </h3>
                </div>  


	 <div class="panel-body">
	<form class="form-horizontal m-t-20" action="{{ route('admin.user_store') }}" method="POST">
		@csrf
		<div class="form-group">
		 <div class="col-xs-12">
              <input id="name" type="text" name="name" placeholder="Enter User name" class="form-control">
         </div>
         </div>

         <div class="form-group">
         <div class="col-xs-12">
              <input id="email" type="email" name="email" placeholder="Enter User email" class="form-control">
         </div>
         </div>


         <div class="form-group">
         <div class="col-xs-12">
              <input id="password" type="password" name="password" placeholder="Enter User password" class="form-control">
         </div>
          </div>

         <div class="form-group">
         <div class="col-xs-12">
              <input id="password" type="password" name="password" placeholder="Enter Re-password" class="form-control">
         </div>
          </div>

		
		<div class="form-group">	
		<div class="col-xs-12">
            

            <select class="form-control" name="role_id">
                                    
                <option disabled="" selected="">Choose User Role</option>
                @foreach( $roles as $role)
                <option value="{{ $role->id}}">{{ $role->name}}</option>
                @endforeach

              </select>


        </div>
         </div>


        <div class="form-group text-center m-t-40">
	        <div class="col-xs-12">
	            <button class="btn btn-primary waves-effect waves-light btn-lg w-lg" type="submit">Register</button>
	        </div>
	    </div>


		
	</form>
</div>



	
</div>

@endsection














