@extends('layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-6">
            <h1 class="text-center" style="margin-top: 250px;">
                <a class="btn btn-danger btn-lg" href="{{ url('todos') }}">Visit my ToDos</a>
            </h1>
        </div>
    </div>
    @endsection