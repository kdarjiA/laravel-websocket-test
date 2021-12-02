<?php

namespace App\Http\Controllers;

use App\Events\TaskCreated;
use App\Interfaces\TaskRepositoryInterface;
use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $task_repository;

    public function __construct(TaskRepositoryInterface  $task_repository)
    {

        $this->task_repository = $task_repository;
    }


    public function index()
    {
        $tasks = Task::all()->sortByDesc('id');
        return view('task.index',['tasks'=>$tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
        $task = $this->task_repository->save();
        TaskCreated::dispatch($task);
        return redirect('tasks')->with('success', 'Your task has been successfully created!');
    }

}
