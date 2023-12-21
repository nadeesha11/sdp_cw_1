@extends('web.layout')
@section('content')


<div class="card w-50 mx-auto text-dark m-5 p-5">
    @if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif
    <form action="{{ route('web.loginCheck') }}" method="POST" class="text-center">
        @csrf
          <h3 >LOGIN</h3>
  <div class="form-group m-2 p-2">
    <input type="email" class="form-control" name="email"  placeholder="Enter email">
  </div>
  <div class="form-group m-2 p-2">
    <input type="password" class="form-control" name="password"  placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  <a href="{{ route('web.register') }}">Register here</a>
</div>


@endsection