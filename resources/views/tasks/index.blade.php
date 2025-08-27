@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2>Tarefas</h2>
    <a href="{{ route('tasks.create') }}" class="btn btn-success mb-3">Nova Tarefa</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Data</th>
                <th>Finalizada</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr>
                <td>{{ $task->descricao }}</td>
                <td>{{ $task->data }}</td>
                <td>{{ $task->finalizada ? 'Sim' : 'Não' }}</td>
                <td>
                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Remover</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
