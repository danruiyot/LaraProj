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
    <form method="post" action="{{ route('employees.store') }}" enctype="multipart/form-data">
      @csrf      
      <div class="form-group">
                <input type="text" class="form-control" required placeholder="Employee Name" name="name">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" required placeholder="Employee Email" name="email">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" required placeholder="Location" name="location">
            </div>
            <div class="form-group">
              <strong>Company :</strong>
                   <div class="">					 <select name="company_id" class="form-control">
                 @foreach ($companies as $companies)
                 <option value="{{$companies->id}}">{{$companies->name}}</option>
                 @endforeach
                </select>
               </div>

            <button type="submit" class="btn btn-success">Add</button>
        </form>
    </div>
  </div>
</div>

@endsection
