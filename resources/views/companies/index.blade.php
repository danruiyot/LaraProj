@extends('layouts.app')

@section('content')
    <div class="col-sm-8">
        <a class="btn btn-success" href="{{route('companies.create')}}">Add new Company</a>
        <br>
        <br>
        @if ($message = Session::get('success'))
        <div class="aler alert-success">
        <p>{{ $message }}</p>
        </div>
        @endif
            <table class="table table-hover sm">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Company Name</th>
                        <th>Email</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                            @foreach ($companies as $company)
                            <tr>
                            {{-- <td>
                            <img class="img-thumbnail" src="{{ asset('storage/'.$companies->image) }}" alt="" title="" >
                            </td> --}}
                          <td><b>{{++$i}}.</b></td>
                            <td>{{$company->name}}</td>
                            <td>{{$company->email}}</td>
                            <td>
                            <form action="{{route('companies.destroy', $company->id)}}" method="post">
                            <a class="btn btn-success" href="{{route('companies.show', $company->id)}}">Show</a>
                            <a class="btn btn-warning" href="{{route('companies.edit', $company->id)}}">edit</a>
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                            </td>
                            </tr>
                            @endforeach
                    </tbody>
                  </table>
                  {{ $companies->links() }}
    </div>
  </div>
</div>

@endsection
