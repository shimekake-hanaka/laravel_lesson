<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Todo;
// use Illuminate\Http\Request;

class TodoController extends Controller
{
    private $todo;

    // todosテーブルとの接続、contentカラムだけの指定
    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
        // dd($todo); //オブジェクト型が入っている
    }

    // Todo一覧表示（top画面）
    public function index()
    {
        $todos = $this->todo->all();
        // dd($todos); //配列型が入っている
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
        // dd($request); //オブジェクト型が入っている。
        $inputs = $request->all();
        // dd($inputs); //配列型が入っている。httpから受け取ったすべてのフォームデータ。トークンとコンテンツ。
        // ↓Eloquentモデルのfillメソッドでsql文セット
        $this->todo->fill($inputs);
        // insert into todos (content,  ,  ) values ('あああ',  ,  );
        $this->todo->save();
        return redirect()->route('todo.index');
    }

    // 参照（編集前後の詳細画面用）
    public function show($id)
    {
        // dd($id); //整数
        $todo = $this->todo->find($id);
        // dd($todo); // findはIDカラムで探す
        // select * from todos where id = $id
        return view('todo.show', ['todo' => $todo]);
    }

    // 編集のための情報取得
    public function edit($id)
    {
        $todo = $this->todo->find($id);
        // select * from todos where id = $id
        return view('todo.edit', ['todo' => $todo]);
    }

    // 更新
    public function update(TodoRequest $request, $id)
    {
        $inputs = $request->all();
        $todo = $this->todo->find($id);
        // select * from todos where id = $id; idを指定
        $todo->fill($inputs);
        // updateしたいカラムとレコードの指定　update todos set $input(カラム名Key = value) where id = $id;
        $todo->save();
        // dd($todo); // findはIDカラムで探す
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
