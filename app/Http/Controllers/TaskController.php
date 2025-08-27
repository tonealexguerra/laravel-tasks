<?php
namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('data')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required|string|max:255',
            'data' => 'required|date',
        ]);

        Task::create([
            'descricao' => $request->descricao,
            'data' => $request->data,
            'finalizada' => $request->has('finalizada'),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tarefa criada com sucesso!');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'descricao' => 'required|string|max:255',
            'data' => 'required|date',
        ]);

        $task->update([
            'descricao' => $request->descricao,
            'data' => $request->data,
            'finalizada' => $request->has('finalizada'),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tarefa atualizada com sucesso!');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tarefa removida com sucesso!');
    }
}

