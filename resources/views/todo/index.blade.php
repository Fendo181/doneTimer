@extends('default')

@section('content')
    <h1>DoneTimer</h1>
    <p>Doneリストを取得する</p>
    @foreach ($todoList as $todo)
        <li>{{ $todo->description }}</li>
    @endforeach
@endsection
