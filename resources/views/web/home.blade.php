@extends('web.layout')
@section('content')
  @if(session('not_logged'))
    <div class="alert alert-danger" role="alert">
        {{ session('not_logged') }}
    </div>
  @endif
  @if(session('suceess'))
    <div class="alert alert-info" role="alert">
        {{ session('suceess') }}
    </div>
  @endif
  @if(session('fail'))
    <div class="alert alert-danger" role="alert">
        {{ session('fail') }}
    </div>
  @endif
<form method="POST" action="{{ route('web.complain.create') }}" enctype="multipart/form-data">
    @csrf
    <div class="m-4">       
        <div class="form-group">
            <label for="exampleFormControlInput1">Complain Name</label>
            <input type="text" class="form-control" name="complain_name" id="exampleFormControlInput1" placeholder="Enter Complain" value="{{ old('complain_name') }}">
            @error('complain_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Department</label>
            <select name="department" class="form-control" id="exampleFormControlSelect1">
                <option value="0" {{ old('department') == 0 ? 'selected' : '' }}>Please select department</option>
                <option value="101" {{ old('department') == 101 ? 'selected' : '' }}>Department Of WildLife</option>
                <option value="102" {{ old('department') == 102 ? 'selected' : '' }}>Ministry Of Environment</option>
            </select>
            @error('department')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Priority </label>
            <select name="Priority" class="form-control" id="exampleFormControlSelect1">
                <option value="" {{ old('Priority') == '' ? 'selected' : '' }}>Please select priority</option>
                <option value="601" {{ old('Priority') == 601 ? 'selected' : '' }}>LOW</option>
                <option value="602" {{ old('Priority') == 602 ? 'selected' : '' }}>MEDIUM</option>
                <option value="603" {{ old('Priority') == 603 ? 'selected' : '' }}>HIGH</option>
                <option value="604" {{ old('Priority') == 604 ? 'selected' : '' }}>CRITICAL</option>
            </select>
            @error('Priority')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Complain Description</label>
            <textarea name="desc" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Complain Description">{{ old('desc') }}</textarea>
            @error('desc')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
         <div class="form-group">
            <label for="exampleFormControlTextarea1">Images</label><br>
            <input name="image" type="file">
              @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
       
        </div>
    </div>  
    
    <button style="margin-left:30px !important;" type='submit' class="btn btn-success">CREATE</button>
</form>


@endsection