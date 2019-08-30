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
    <form method="post" action="{{ route('companies.store') }}" enctype="multipart/form-data">
      @csrf      
      <div class="form-group">
                <input type="text" class="form-control" required placeholder="Company Name" name="name">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" required placeholder="Company Email" name="email">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" required placeholder="Location" name="location">
            </div>
            <div class="form-group image">
                <input type="file" accept="image/jpeg" class="form-control" placeholder="Logo" name="pwd">
            </div>

            <button type="submit" class="btn btn-success">Add</button>
        </form>
    </div>
  </div>
</div>

@endsection
