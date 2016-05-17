<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $fillable = [
        'task', 'meta', 'catid', 'parenttask', 'taskorder'
    ];

    public function parent()
    {
        return $this->belongsTo(Task::class, 'parenttask', 'id');
    }

    public function children()
    {
        return $this->hasMany(Task::class, 'parenttask', 'id');
    }

    public function isComplete()
    {
        return $this->signedoff != null;
    }

    public function signOff()
    {
        $this->signedoff = Carbon::now();
        $this->save();
    }

    public function removeSignOff()
    {
        $this->signedoff = null;
        $this->save();
    }
}
