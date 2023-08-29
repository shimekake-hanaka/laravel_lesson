<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    // traitを使うためにclassに組み込み
    // softdaletトレイトは、論理削除するためのトレイト。
    use SoftDeletes;

    protected $table = 'todos';

    protected $fillable = [
        'content'
    ];
}
