@extends('default')

@section('content')
    <img src="{{asset('/img/DoneTimer.png')}}" class="img-fluid rounded mx-auto d-block" alt="Responsive image" width="300" height="300">
    <form class="form-inline" action="/create" method="post">
        <div class="mx-auto">
            <select name="category" id="category">
                <option value="research">調査</option>
                <option value="system_design">システム設計</option>
                <option value="coding">コーディング</option>
                <option value="coordination">調整業</option>
                <option value="writing">文章作成業</option>
                <option value="others">そのほか</option>
            </select>
            <label class="sr-only" for="description">todo</label>
            <input type="text" class="form-control mb-2 mr-sm-2" id="description" placeholder="今やる事">
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </div>
    </form>
@endsection
