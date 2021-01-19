@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">

            @foreach($employees as $employee)
                <div class="col-4">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="https://picsum.photos/id/{{$employee->id}}/300/200"
                             alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $employee->name . ' ' . $employee->surname }}</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ $employee->date_of_birth }}</li>
                            <li class="list-group-item">{{ $employee->text_comment }}</li>
                        </ul>
                        <div class="card-body">
                                <a href="{{ route('employees.edit', $employee) }}" class="card-link">Edit</a>
                            <form method="post" action="{{ route('employees.destroy', $employee) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick=" return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
