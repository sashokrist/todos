@extends('layout')

@section('content')
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
               {{ Session::get('success') }}
            </div>
            @endif
        <div class="row justify-content-md-center" style="margin-bottom: 20px; margin-top: 20px;">
            <div class="col-4" style="border-style: solid; border-color: red;">
                <form action="{{ route('create.todo') }}" method="post">
                    <div>
                        <input type="text" class="form-control" name="todo" placeholder="Write your todo and hit Enter">
                    </div>
                    <input type="hidden" value="{{ Session::token() }}" name="_token">
                </form>
            </div>
        </div>
        <hr><br>
        <div class="row justify-content-md-center" style="margin-bottom: 20px; margin-top: 20px;">
            <div class="col-2">
                    <a href="{{ route('todo.clear') }}" class="btn btn-success btn-lg" name="btn">Clear</a>
            </div>
        </div>
        <div class="row justify-content-center">
                @foreach($todos as $todo)
                    <div class="col-8">
                        {{ $todo->todo }}
                    </div>
                    <div class="col-4"><br>
                        <a href="{{ route('todo.delete', ['id' => $todo->id]) }}" class="btn btn-danger">Delete</a>
                        <a href="{{ route('todo.update', ['id' => $todo->id]) }}" class="btn btn-primary">Update</a>
                        @if(!$todo->completed)
                            <a href="{{ route('todo.completed', ['id' => $todo->id]) }}" class="btn btn-success">Mark as Completed</a>
                        @else<span class="text-success">Completed</span>
                        @endif
                    </div>
                @endforeach
        </div>
    @endsection




