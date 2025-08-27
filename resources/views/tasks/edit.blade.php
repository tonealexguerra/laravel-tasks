@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2>{{ isset($task) ? 'Editar Tarefa' : 'Nova Tarefa' }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ isset($task) ? route('tasks.update', $task) : route('tasks.store') }}" method="POST">
        @csrf
        @if(isset($task)) @method('PUT') @endif

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" name="descricao" class="form-control" value="{{ $task->descricao ?? old('descricao') }}">
        </div>

        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="date" name="data" class="form-control" value="{{ $task->data ?? old('data') }}">
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="finalizada" class="form-check-input" id="finalizada" {{ (isset($task) && $task->finalizada) ? 'checked' : '' }}>
            <label class="form-check-label" for="finalizada">Finalizada</label>
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($task) ? 'Atualizar' : 'Cadastrar' }}</button>
    </form>
</div>
@endsection
