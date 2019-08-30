@extends('layouts.app')

@section('content')
    <div class="col-sm-8">
        <a class="btn btn-success" href="{{route('companies.create')}}">Add new Company</a>
        <br>
        <br>
        <div class="row">
                <div class="col-sm-6">
<div class="card" style="width:95%;">
        <img class="img-thumbnail" src="{{ asset('storage/pics/'.$companies->logo) }}" alt="" >
</div>
                </div>
                <div class="col-sm-6">
                    <table class="table">
                    <tr>
                        <th>Company Name</th>
                        <td>{{$companies->name}}</td> 
                    </tr>
                       <tr><th >email</th>
                            <td>{{$companies->email}}</td>
                       </tr>
                        <tr><th>location</th>
                            <td>{{$companies->location}}</td>
                        </tr>
                        </table>
                </div>
                <div>
                            <form action="{{route('companies.destroy', $companies->id)}}" method="post"><br>
                            
                            <a class="btn btn-warning" href="{{route('companies.edit', $companies->id)}}">edit</a>
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                </div>
    </div>
                         
    </div>
  </div>
</div>

@endsection
