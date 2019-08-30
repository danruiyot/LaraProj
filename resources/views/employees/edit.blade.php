@extends('layouts.app')

@section('content')
    <div class="col-sm-8">
        <br>
        <br>
        @if ($errors->any())
       <div class="alert alert-danger">
         <strong>Whoops</strong> An error Occured.<br>
         <ul>
           @foreach ($errors as $error)
           <li>{{ $error }}</li>               
           @endforeach
         </ul>
         </div> 
         @endif
    <form method="post" action="{{ route('employees.update', $employees->id)  }}" enctype="multipart/form-data">
      @csrf      
      @method('PUT')
      <div class="form-group">
          <strong>Employee Name :</strong>
                <input type="text" class="form-control" required value="{{ $employees->name }}" name="name">
            </div>
            <div class="form-group">
                <strong>Email :</strong>
                <input type="email" class="form-control" required value="{{ $employees->email }}" name="email">
            </div>
            <div class="form-group">
                <label for="company_id" class="">Company Name:</label>
                 <div >
                 <select name="company_id" class="form-control">
                 <option value="{{$employees->companies->id}}">{{$employees->companies->name}}</option>
                  @foreach ($companies as $companies)
                  @if ($employees->companies->id === $companies->id)  
                  @else
                    <option value="{{$companies->id}}">{{$companies->name}}</option>
                  @endif
                 @endforeach
                  </select>
                  </div>
                 </div>
              
             

            <button type="submit" class="btn btn-warning">Edit</button>
        </form>
    </div>
  </div>
</div>

@endsection
