@extends('layouts.app')

@section('content')



<div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading bg-img"> 
                    <div class="bg-overlay"></div>
                   <h3 class="text-center m-t-10 text-white"> Create a new Account </h3>
                </div> 


                <div class="panel-body">
                <form class="form-horizontal m-t-20" method="POST" action="{{ route('register') }}">
                    @csrf

                     <div class="form-group">
                            

                            <div class="col-xs-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror input-lg" name="name" value="{{ old('name') }}" required placeholder="Name" autocomplete="name" autofocus>

                                
                            </div>
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>







                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control @error('email') is-invalid @enderror input-lg" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                        </div>
                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                         @enderror
                    </div>





                    <div class="form-group ">
                           

                            <div class="col-xs-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror input-lg" name="password" required placeholder="Password"autocomplete="new-password">

                               
                            </div>
                             @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>






                    <div class="form-group">
                    

                            <div class="col-xs-12">
                                <input id="password-confirm" type="password" class="form-control input-lg" name="password_confirmation" required placeholder="Confirm Password" autocomplete="new-password">
                            </div>
                        </div>

                    

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox-signup" type="checkbox" checked="">
                                <label for="checkbox-signup">
                                    I accept <a href="">Terms and Conditions</a>
                                </label>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-primary waves-effect waves-light btn-lg w-lg" type="submit">Register</button>
                        </div>
                    </div>

                    <div class="form-group m-t-30">
                        <div class="col-sm-12 text-center">
                            <a href="login.html">Already have account?</a>
                        </div>
                    </div>
                </form> 
                </div>                                 
                
            </div>
        </div>
@endsection
