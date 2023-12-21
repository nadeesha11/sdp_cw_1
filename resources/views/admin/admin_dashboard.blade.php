@extends('admin.layout')
@section('content')

<div class="row">
    <h2>Admin dashboad</h2>
<div class="col-md-5">
    <div class="card">
        @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @elseif(session('success'))
           <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('admin.createAdmin') }}">
            @csrf
            <div class="card-body">
                <div class="form-group m-1">
                    <input type="text" class="form-control" required id="inputUserName" name="username" placeholder="Enter User Name">
                    <small class="form-text text-muted"></small>
                </div>
                
                <div class="form-group m-1">
                    <input type="password" class="form-control" required id="inputPassword"  name="password" placeholder="Enter Password">
                    <small class="form-text text-muted"></small>
                </div>
                
                <div class="form-group m-1">
                    <input type="email" class="form-control" required id="inputEmail" name="email" placeholder="Enter Email">
                    <small class="form-text text-muted"></small>
                </div>
                
                <div class="form-group m-1">
                    <input type="text" class="form-control" required id="inputFirstName" name="first_name" placeholder="Enter First Name">
                    <small class="form-text text-muted"></small>
                </div>
                
                <div class="form-group m-1">
                    <input type="text" class="form-control" required id="inputLastName" name="last_name"  placeholder="Enter Last Name">
                    <small class="form-text text-muted"></small>
                </div>
                
                <div class="form-group m-1">
                    <select class="form-control" required name="department" id="selectDepartment">
                        <option value="">Choose Department</option>
                        <option value="101">Department Of WildLife</option>
                        <option value="102">Ministry Of Environment</option>
                    </select>
                    <small class="form-text text-muted"></small>
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

    
  <div class="col-md-7">
     <div class="card">
       <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">user_name</th>
      <th scope="col">email </th>
      <th scope="col">first_name</th>
       <th scope="col">last_name</th>
        <th scope="col">department</th>
   
    </tr>
  </thead>
  <tbody>
      @foreach($data as $item)
    <tr>
      <th scope="row">1</th>
      <td>{{ $item->user_name }}</td>
      <td>{{ $item->email  }}</td>
      <td>{{ $item->first_name }}</td>
        <th >{{ $item->last_name }}</th>
      <td>{{ $item->dep_id }}</td>
  
    </tr>
    @endforeach

  </tbody>
</table>
       </div>
    </div>
    
</div>
<div class="mt-4">
    
    <h2>New Complains</h2>
      <div class="card">
       <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">REPORT_NAME</th>
      <th scope="col">COMPALIN_NAME </th>
      <th scope="col">CREATED_DATE</th>
       <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   @foreach($complains as $item)
    <tr>
      <th scope="row">1</th>
      <td>{{ $item->REPORT_NAME }}</td>
      <td>{{ $item->COMPALIN_NAME  }}</td>
      <td>{{ $item->CREATED_DATE }}</td>
       <td> <button onclick="edit('{{$item->COMPALIN_ID }}')" class="btn btn-info">Assign Officer </button></td>
    </tr>
    @endforeach
  </tbody>
</table>
  </div>
    
</div>

<div id="assign_officer" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Assign Officer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('admin.assign.officer')  }}" method="post"> 
      @csrf
      <div class="modal-body">
        <input type="hidden" id="hidden_id" value="" name="hidden">
        
        <select name="officer" class="form-select" required>
          <option value="">Open this select menu</option>
          @foreach($data as $item)
          <option value="{{ $item->id }}">{{ $item->first_name }}</option>
          @endforeach
        </select>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
    function edit(COMPALIN_ID) {
        $('#hidden_id').val(COMPALIN_ID);
        $('#assign_officer').modal('show')
    }
</script>

@endsection








