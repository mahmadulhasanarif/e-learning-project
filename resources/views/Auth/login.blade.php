@extends('Auth.layout')


@section('content')
<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div  class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="{{url('/login')}}" method="POST">
                                        @csrf
                                        
                                        @error('email')
                                            <small style="float: right" class="text-danger">{{$message}}</small>
                                         @enderror
                                         
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user @error ('email') is-invalid @enderror"
                                               name="email"
                                                placeholder="Enter Email ">
                                        </div>
                                        
                                        @error('password')
                                            <small style="float: right" class="text-danger">{{$message}}</small>
                                        @enderror
                                       
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user @error ('email') is-invalid @enderror"
                                                name="password" placeholder="Password">
                                        </div>
                                        
                                        <button class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                        
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
    