<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskCategory extends Model
{

    public function tasks()
    {
        return $this->hasMany(Task::class, 'catid', 'id');
    }

    public function completedTasks()
    {
        return $this->tasks()->whereNotNull('signedoff')->count();
    }

    public function totalTasks()
    {
        return $this->tasks()->count();
    }
}
