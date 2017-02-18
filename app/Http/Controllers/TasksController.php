<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{

    public function __construct() {
      $this->middleware('auth');
    }

  public function index() {
      $tasks = Task::all();
      return view('tasks.index', compact('tasks'));
    }

    public function show(Task $task) {
      return view('tasks.show', compact('task'));
    }

    public function create() {
      return view('tasks.create');
    }

    public function store() {
      // $task = new Task;
      /*$task->body = request('body');
      $task->completed = request('completed') == 'on' ? 1 : 0;
      $task->save();*/

      Task::create([
        'body' => request('body'),
        'completed' => request('completed') == 'on' ? 1 : 0,

      ]);
      return(redirect('/'));
    }
}
