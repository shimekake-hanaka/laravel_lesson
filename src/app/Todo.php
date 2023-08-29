<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Model クラスを継承している。Eloquentの機能を持つモデル
class Todo extends Model
{
    // 削除処理でupdateでdeleted_atに日付が入る/取得処理でdeleted_at is nullが追加される
    use SoftDeletes;

    // protectedは自身のクラスと継承されたクラスで使用可能
    protected $table = 'todos';

    protected $fillable = [
        'content'
    ];
}
