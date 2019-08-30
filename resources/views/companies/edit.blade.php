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
    <form method="post" action="{{ route('companies.update', $companies->id)  }}" enctype="multipart/form-data">
      @csrf      
      @method('PUT')
      <div class="form-group">
                <input type="text" class="form-control" required value="{{ $companies->name }}" name="name">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" required value="{{ $companies->email }}" name="email">
            </div>
            <div class="form-group">
            <input type="text" class="form-control" required value="{{ $companies->location }}" name="location">
            </div>
            <div class="form-group image">
                <input type="file" accept="image/jpeg" class="form-control" placeholder="Logo" name="logo">
            </div>

            <button type="submit" class="btn btn-warning">Edit</button>
        </form>
    </div>
  </div>
</div>

@endsection
