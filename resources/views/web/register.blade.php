@extends('web.layout')
@section('content')

<div class="card w-50 mx-auto text-dark m-5 p-5">
    
@if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@elseif(session('success'))
   <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif


<form method="POST" action="{{ route('web.register_create') }}">
    @csrf
    <h3>REGISTER</h3>

    <div class="form-group m-2 p-2">
        <input type="text" class="form-control" name="username" placeholder="Enter Username" value="{{ old('username') }}">
        @error('username')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group m-2 p-2">
        <input type="text" class="form-control" name="firstname" placeholder="Enter First Name" value="{{ old('firstname') }}">
        @error('firstname')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group m-2 p-2">
        <input type="text" class="form-control" name="lastname" placeholder="Enter Last Name" value="{{ old('lastname') }}">
        @error('lastname')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group m-2 p-2">
        <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{ old('email') }}">
        @error('email')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group m-2 p-2">
        <input type="password" class="form-control" name="password" placeholder="Password">
        @error('password')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>


    <a href="{{ route('web.login') }}">Login here</a>
</div>



@endsection