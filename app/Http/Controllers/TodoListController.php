<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\TodoList;
use App\Http\Requests\TodoListRequest;

class TodoListController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $todoLists = TodoList::All();

        return view('todo.index',
            [
                'todoLists' => $todoLists->where('done', 0),
                'doneLists' => $todoLists->where('done', 1)
            ]);
    }

    /**
     * @param TodoListRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create(TodoListRequest $request)
    {
        $todoList = new TodoList();
        $todoList->description = $request->description;
        $todoList->category = $request->category;
        $todoList->color = $todoList->toCategoryColor($request->category);
        $todoList->save();
        return redirect('/');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id)
    {
        $user = TodoList::find($id);
        $user->delete();
        return redirect('/');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $todoList = TodoList::findOrFail($id);
        return view('todo.edit')->with('todoList', $todoList);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TodoListRequest $
     * @param $id
     */
    public function update(TodoListRequest $request, $id)
    {
        $todoList = TodoList::findOrFail($id);

        $todoList->description = $request->description;
        $todoList->category = $request->category;
        $todoList->color = $todoList->toCategoryColor($request->category);
        $todoList->save();
        return redirect('/');
    }

    public function updateDone($id)
    {
        $todoList = TodoList::findOrFail($id);
        $todoList->done = 1;
        $todoList->finished_at = Carbon::now('Asia/tokyo')->format('Y-m-d H:i');
        $todoList->save();
        return redirect('/');
    }

}
