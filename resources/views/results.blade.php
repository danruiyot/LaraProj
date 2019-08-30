@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Results</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
            </div>
            
        </div>
    </div>
    <div id="card">
    <div>
    <p>Laravel provides a simple way to authorise user actions on specific resources. With Authorization,
you can selectively allow users access to certain resources while denying access to others.</p>
    </div>
    </div>
</div>
@endsection
