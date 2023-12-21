@extends('web.layout')
@section('content')

<div class="m-3"> 
<h3>My Complains</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">COMPALIN_NAME</th>
      <th scope="col">STATUS_ID</th>
      <th scope="col">Assign</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $item)  
    <tr>
      <th>{{ $item->COMPALIN_ID   }}</th>
      <td>{{ $item->COMPALIN_NAME  }}</td>
      <td>{{  $item->Name  }}</td>
      <td>{{  $item->ASSIGN_NAME  }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection