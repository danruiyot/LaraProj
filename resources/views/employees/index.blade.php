@extends('layouts.app')

@section('content')
    <div class="col-sm-8">
        <a class="btn btn-success" href="{{route('employees.create')}}">Add new Company</a>
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
                        <th>Company</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                            @foreach ($employees as $employee)
                            <tr>
                            {{-- <td>
                            <img class="img-thumbnail" src="{{ asset('storage/'.$companies->image) }}" alt="" title="" >
                            </td> --}}
                          <td><b>{{++$i}}.</b></td>
                            <td>{{$employee->name}}</td>
                            <td>{{$employee->email}}</td>
                            <td>{{$employee->location}}</td>
                            <td>
                            <form action="{{route('employees.destroy', $employee->id)}}" method="post">
                            <a class="btn btn-success" href="{{route('employees.show', $employee->id)}}">Show</a>
                            <a class="btn btn-warning" href="{{route('employees.edit', $employee->id)}}">edit</a>
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                            </td>
                            </tr>
                            @endforeach
                    </tbody>
                  </table>
                  {{ $employees->links() }}
    </div>
  </div>
</div>

@endsection
