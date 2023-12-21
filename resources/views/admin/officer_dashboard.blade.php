@extends('admin.layout')
@section('content')

<div class="m-3"> 
<h3>My Complains</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">COMPALIN_NAME</th>
      <th scope="col">STATUS_ID</th>
      <th scope="col">REPORT_NAME</th>
      <th scope="col">PRIORITY</th>
      <th scope="col">DESC</th>
       <th scope="col">image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($myComplains as $item)  
    <tr>
      <th>#</th>
      <th>{{ $item->COMPALIN_NAME   }}</th>
      <td>{{ $item->WF_Name  }}</td>
      <td>{{  $item->REPORT_NAME  }}</td>
       <td>{{  $item->PRO_NAME  }}</td>
        <th scope="col">{{  $item->COMPALIN_DESCRIP  }}</th>
          <th scope="col">  @if ($item->image)
                <img style="height:100px !important;" src="{{ asset('images/' . $item->image) }}" alt="Image">
            @else
                No Image
            @endif</th>
      <td><button onclick="edit('{{$item->COMPALIN_ID }}')" class="btn btn-info">More</button></td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>

<div id="change_status" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Assign Officer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('admin.chnageStatusOficer')  }}" method="post"> 
      @csrf
      <div class="modal-body">
        <input type="hidden" id="hidden_id" value="" name="hidden">
        
        <select name="WF_Name" class="form-select" required>
          <option value="">Open this select menu</option>
          @foreach($workflow as $item)
          <option value="{{ $item->WF_ID  }}">{{ $item->WF_Name }}</option>
          @endforeach
        </select>
        
        <textarea class="mt-3" style="width:100% !important;" id="desc" name="desc">
            
        </textarea>

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
        $('#change_status').modal('show')
  }  
</script>


@endsection