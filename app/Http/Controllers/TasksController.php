<?php

namespace App\Http\Controllers;

use App\Task;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Gate::denies('is-active')){
            $request->session()->flash('danger', 'Ваш аккаунт заблокирован');
            return redirect()->route('home');
        }
        $tasks = Task::whereIn('id', Auth::user()->tasks()->pluck('id'))->get();
        return view('tasks.index')->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task();
        $task->title = $request->title;
        $task->time = $request->time;
        $task->completed = 0;
        $task->user_id = Auth::user()->id;
        if($task->save()){
            $request->session()->flash('success', 'Событие добавлено успешно');
        }else{
            $request->session()->flash('danger', 'Событие не было добавлено');
        }
        return redirect()->route('tasks.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Task $task)
    {
        return view('tasks.edit')->with('task', $task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $task->title = $request->title;
        $task->time = $request->time;
        $task->completed = $request->completed;
        if($task->save()){
            $request->session()->flash('success', 'Событие обновлено успешно');
        }else{
            $request->session()->flash('danger', 'Событие не было обновлено');
        }
        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Task $task)
    {
        if($task->delete()){
            $request->session()->flash('success', 'Событие успешно удалено');
        }else{
            $request->session()->flash('danger', 'Событие не было удалено');
        }
        return redirect()->route('tasks.index');
    }
}
