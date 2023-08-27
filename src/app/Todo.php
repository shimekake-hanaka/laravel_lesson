<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    // protectedは自身のクラスと継承されたクラスで使用可能
    protected $table = 'todos';

    protected $fillable = [
        'content'
    ];
}
