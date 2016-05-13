<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{
    protected $fillable = [
        'name'
    ];

    public function categories()
    {
        return $this->hasMany(TaskCategory::class, 'listid', 'id');
    }

    public function completedTasks()
    {
        $total = $this->categories()->get()->reduce(function($carry, TaskCategory $category) {
            return $carry + $category->completedTasks();
        }, 0);

        return $total;
    }

    public function totalTasks()
    {
        $total = $this->categories()->get()->reduce(function($carry, TaskCategory $category) {
            return $carry + $category->totalTasks();
        }, 0);

        return $total;
    }
}
