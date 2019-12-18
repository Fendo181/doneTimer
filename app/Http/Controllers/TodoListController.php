<?php

namespace App\Http\Controllers;

use App\TodoList;
use App\Http\Requests\TodoListRequest;

class TodoListController extends Controller
{
    public function index()
    {
        $todoLists = TodoList::All();

        return view('todo.index',
            [
            'todoLists' => $todoLists->where('done',0),
            'doneLists' => $todoLists->where('done',1)
            ]);
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

    public function delete($id)
    {
        $user = TodoList::find($id);
        $user->delete();
        return redirect('/');
    }

}
