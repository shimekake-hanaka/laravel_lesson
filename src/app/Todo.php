<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Model クラスを継承している。Eloquentの機能を持つモデル
class Todo extends Model
{
    // traitを使うためにclassに組み込み
    // softdaletトレイトは、論理削除するためのトレイト。
    use SoftDeletes;

    // protectedは自身のクラスと継承されたクラスで使用可能
    protected $table = 'todos';

    protected $fillable = [
        'content'
    ];
}
