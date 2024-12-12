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
    <img src="{{asset('/img/DoneTimer.png')}}" class="img-fluid rounded mx-auto d-block" alt="Responsive image"
         width="300" height="300">
    <form class="form-inline" action="/create" method="post">
        @csrf
        <div class="col-md-auto mx-auto">
            <select class="form-control" name="category" id="category">
                <option value="research">調査</option>
                <option value="system_design">システム設計</option>
                <option value="coding">コーディング</option>
                <option value="coordination">調整業</option>
                <option value="writing">文章作成業</option>
                <option value="others">そのほか</option>
            </select>
            <label class="sr-only" for="description">todo</label>
            <input type="text" class="form-control" id="description" name="description" size="60"
                   placeholder="今やる事">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-plus-circle"></i>
            </button>
        </div>
    </form>

    <div class="row">
        <h3>Todoリスト</h3>
    </div>
    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Done</th>
                <th scope="col">カテゴリー名</th>
                <th scope="col">タスク</th>
                <th scope="col">開始時刻</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>

            @foreach ($todoLists as $todoList)
                <tr>
                    <form id="update_done_form" method="post" action="/update_done/{{ $todoList->id }}">
                        @csrf
                        @method('PUT')
                        <td><input id="js-update_done" type="checkbox" onchange="updateDone()"></td>
                    </form>

                    <td><span style="background-color:{{ $todoList->color }}">{{ $todoList->category }}</span></td>
                    <td>{{ $todoList->description }}</td>
                    <td>
                        @if (is_null($todoList->started_at))
                            {{ $todoList->started_at }}
                            <form id="started_at_form" method="post" action="/started/{{ $todoList->id }}">
                                @csrf
                                @method('PUT')
                                <button type="button" class="btn btn-primary" id="js-started_at">開始する</button>
                            </form>
                        @else
                            {{ $todoList->started_at }}
                        @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-pencil-square-o"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                <form method="post" action="/edit/{{ $todoList->id }}" id="edit_todo_form">
                                    @csrf
                                    <a class="dropdown-item" id='js-edit_todo' href="#">編集</a>
                                    @method('PUT')
                                </form>


                                <form method="post" action="/delete/{{ $todoList->id }}" id="delete_todo_form">
                                    @csrf
                                    <a class="dropdown-item" id='js-delete_todo' href="#">削除</a>
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="row">
        <h3>Doneリスト</h3>
    </div>

    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Done</th>
                <th scope="col">カテゴリー名</th>
                <th scope="col">今やる事</th>
                <th scope="col">開始時刻</th>
                <th scope="col">Doneした時刻</th>
                <th scope="col">Doneまでにかかった時間(分)</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($doneLists as $doneList)
                <tr>
                    <td><input id="js-update_done" type="checkbox" checked="{{ $doneList->done }}"></td>
                    <td><span style="background-color:{{ $doneList->color }}">{{ $doneList->category }}</span></td>
                    <td>{{ $doneList->description }}</td>
                    <td>{{ $doneList->started_at }}</td>
                    <td>{{ $doneList->finished_at }}</td>
                    <td>{{ $doneList->elapsed_time }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-pencil-square-o"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                <form method="post" action="/edit/{{ $doneList->id }}" id="edit_todo_form">
                                    @csrf
                                    <a class="dropdown-item" id='js-edit_todo' href="#">編集</a>
                                    @method('PUT')
                                </form>


                                <form method="post" action="/delete/{{ $doneList->id }}" id="delete_todo_form">
                                    @csrf
                                    <a class="dropdown-item" id='js-delete_todo' href="#">削除</a>
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
