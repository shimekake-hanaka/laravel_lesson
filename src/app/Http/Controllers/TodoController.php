<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Todo;
// use Illuminate\Http\Request;

class TodoController extends Controller
{
    private $todo;
    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    // Todo一覧表示
    public function index()
    {
        $todos = $this->todo->all();
        // dd($todos); //配列が入っている
        return view('todo.index', ['todos' => $todos]);
    }

    
    public function create()
    {
        return view('todo.create');
    }

    // データ登録
    public function store(TodoRequest $request)
    {

        $inputs = $request->all();
        $this->todo->fill($inputs);
        $this->todo->save();
        return redirect()->route('todo.index');
    }

    public function show($id)
    {
        $todo = $this->todo->find($id);
        return view('todo.show', ['todo' => $todo]);
    }

    public function edit($id)
    {
        $todo = $this->todo->find($id);
        return view('todo.edit', ['todo' => $todo]);
    }

    public function update(TodoRequest $request, $id)
    {
        $inputs = $request->all();
        $todo = $this->todo->find($id);
        $todo->fill($inputs);
        $todo->save();
        return redirect()->route('todo.show', $todo->id);
    }
}