<?php

namespace App\Http\Controllers;

use App\TodoList;
use App\Http\Requests\TodoListRequest;

class TodoListController extends Controller
{
    public function index()
    {
        return view('todo.index');
    }

    public function create(TodoListRequest $request)
    {
        $todoList = new TodoList();
        $todoList->description = $request->description;
        $todoList->category =  $request->category;
        $todoList->color = $todoList->toCategoryColor($request->category);
        $todoList->save();
        return redirect('/');
    }

}
