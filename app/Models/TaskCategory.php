<?php

namespace App\Models;
use Core\Model;

class TaskCategory extends Model
{

    public $table = "task_categories";
    public static $field = [
        'id',
        'name',
        'created_at',
        'updated_at',
    ];

}