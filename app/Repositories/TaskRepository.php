<?php


namespace App\Repositories;


use App\Interfaces\TaskRepositoryInterface;
use App\Models\Task;

class TaskRepository implements TaskRepositoryInterface
{
    public function save()
    {
        $task = new  Task();
        $task->name = request('name');
        $task->description = request('description');
        $task->save();
        return $task;
    }
}
