@extends('users.layouts.masterlayout')

@section('content')
 <div class="container">
   <div class="card o-hidden border-0 shadow-lg my-5">
     <div class="card-body p-0">

<!-- Nested Row within Card Body -->

     <div class="row">
      <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
        <div class="col-lg-7">
         <div class="p-5">

           <div class="text-center">
             <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
           </div>

            @if ($message = Session::get('msg'))
             <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                  <strong>{{ $message }}</strong>
             </div>
          @endif

    <form class="user" method="POST" action="{{route('user.register')}}">

    @csrf

    <div class="form-group row">

      <div class="col-sm-6 mb-3 mb-sm-0">
        <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name" name="first_name">
          @error('first_name')
           <p class="text-danger">{{$message}}</p>
          @enderror
      </div>

      <div class="col-sm-6">
        <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name" name="last_name">
           @error('last_name')
             <p class="text-danger">{{$message}}</p>
           @enderror
      </div>

    </div>

<div class="form-group">

<input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" name="email">
@error('email')
<p class="text-danger">{{$message}}</p>
@enderror

</div>

<div class="form-group row">

<div class="col-sm-6 mb-3 mb-sm-0">
<input type="password" class="form-control form-control-user"
id="exampleInputPassword" placeholder="Password" name="password">
@error('password')
<p class="text-danger">{{$message}}</p>
@enderror
</div>
<div class="col-sm-6">
<input type="password" class="form-control form-control-user"
id="exampleRepeatPassword" placeholder="Confirm Password" name="confirm_password">
@error('confirm_password')
<p class="text-danger">{{$message}}</p>
@enderror
</div>

</div>

<button type="submit" class="btn btn-primary btn-user btn-block">
Register Account
</button>

<hr>

<a href="{{route('user.login')}}" class="btn btn-google btn-user btn-block"><i class="fab fa-google fa-fw"></i> Login</a>
<a href="#" class="btn btn-facebook btn-user btn-block"><i class="fab fa-facebook-f fa-fw"></i> Register with Facebook</a>

</form>
            </div>
          </div>
        </div>
     </div>
  </div>
 </div>
@endsection