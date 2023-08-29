<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Todo;

class TodoController extends Controller
{
    private $todo;

    // todosテーブルとの接続、contentカラムだけの指定
    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    // Todo一覧表示（top画面）
    public function index()
    {
        $todos = $this->todo->all();
        return view('todo.index', ['todos' => $todos]);
    }

    // create.blade.phpを表示する
    public function create()
    {
        return view('todo.create');
    }

    // データ登録（新規作成）
    public function store(TodoRequest $request)
    {
        $inputs = $request->all();
        $this->todo->fill($inputs);
        $this->todo->save();
        return redirect()->route('todo.index');
    }

    // 参照（編集前後の詳細画面用）
    public function show($id)
    {
        $todo = $this->todo->find($id);
        return view('todo.show', ['todo' => $todo]);
    }

    // 編集のための情報取得
    public function edit($id)
    {
        $todo = $this->todo->find($id);
        return view('todo.edit', ['todo' => $todo]);
    }

    // 更新
    public function update(TodoRequest $request, $id)
    {
        $inputs = $request->all();
        $todo = $this->todo->find($id);
        $todo->fill($inputs);
        $todo->save();
        return redirect()->route('todo.show', $todo->id);
    }
    // delete
    public function delete($id)
    {
        $todo = $this->todo->find($id);
        $todo->delete();
        return redirect()->route('todo.index');
    }
    // 完了
    public function complete($id)
    {
        $todo = $this->todo->find($id);
        $todo->is_completed = !$todo->is_completed;
        $todo->save();
        return response()->json(['is_completed' => $todo->is_completed]);
    }
}
