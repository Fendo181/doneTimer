@extends('default')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@section('content')

    <form class="form-inline" action="/update/{{$todoList->id}}" method="post">
        @method('PUT')
        @csrf
        <div class="mx-auto">
            <select class="form-control" name="category" id="category" value="{{$todoList->category}}">
                <option value="research">調査</option>
                <option value="system_design">システム設計</option>
                <option value="coding">コーディング</option>
                <option value="coordination">調整業</option>
                <option value="writing">文章作成業</option>
                <option value="others">そのほか</option>
            </select>
            <label class="sr-only" for="description">todo</label>
            <input type="text" class="form-control" id="description" name="description" size="60" placeholder="今やる事" value="{{$todoList->description}}">
            <button type="submit" class="btn btn-primary">更新する
            </button>
        </div>

    </form>
@endsection
