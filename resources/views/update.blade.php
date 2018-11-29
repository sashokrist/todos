@extends('layout')

@section('content')

    <div class="row justify-content-md-center">
        <div class="col-4">
            <form class="form-group" action="{{ route('todo.save', ['id' => $todo->id]) }}" method="post">
                <div>
                    <input type="text" class="form-control form-group" name="todo" value="{{ $todo->todo }}" placeholder="Create new todo">
                </div>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>
    </div>

@endsection




