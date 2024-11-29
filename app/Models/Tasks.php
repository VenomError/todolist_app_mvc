<?php

namespace App\Models;
use Core\Model;
use App\Models\TaskCategory;

class Tasks extends Model
{

    public $table = "tasks";
    public static $field = [
        'id',
        'name',
        'description',
        'due_date',
        'priority',
        'status',
        'created_at',
        'updated_at',
        'user_id',
        'task_category_id',
    ];

    public function category($task_id)
    {
        $category = $this
            ->select('task_categories.*')
            ->where('tasks.id', '=', $task_id)
            ->join('task_categories', 'tasks.task_category_id = task_categories.id', '')
            ->toObject();

        return $category[ 0 ];
    }

    public function user($task_id)
    {
        $user = $this
            ->select('users.*')
            ->where('tasks.id', '=', $task_id)
            ->join('users', 'tasks.user_id = users.id')
            ->toObject();
        return $user[ 0 ];
    }

    public function byAuth()
    {
        if (auth()->isLoggedIn()) {
            $id = auth()->user()->id;
            $this->where('user_id', '=', $id);
            return $this;
        } else {
            return null;
        }
    }

    public function new()
    {
        return $this->where('status', '=', 'new');

    }
    public function pending()
    {
        return $this->where('status', '=', 'pending');

    }

    public function complete()
    {
        return $this->where('status', '=', 'completed');


    }

    public function inprogress()
    {
        return $this->where('status', '=', 'inprogress');

    }

}