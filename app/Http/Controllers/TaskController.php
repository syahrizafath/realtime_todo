<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\TaskCreated;
use App\Task;

class TaskController extends Controller
{
    public function fetchAll()
    {
        $tasks = Task::all();
        return $tasks;
    }

    public function store(Request $request)
    {
        $task = Task::create($request->all());
        broadcast(new TaskCreated($task));
        return response()->json("added");
    }

    public function delete($id)
    {
        $task = Task::find($id);
        broadcast();
        Task::destroy($id);
        return response()->json("deleted");
    }
}
