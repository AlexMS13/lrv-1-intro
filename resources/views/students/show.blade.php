@extends('layouts.app')

@section('title', 'Просмотр студента')

@section('content')
    <h1>Студент: {{ $student->surname }} {{ $student->name }}</h1>
    <ul class="list-group mb-3">
        <li class="list-group-item"><strong>Группа:</strong> 
            @if($student->group)
                <a href="{{ route('groups.show', $student->group) }}">
                    {{ $student->group->title }}
                </a>
            @else
                Не назначена
            @endif
        </li>
        <li class="list-group-item"><strong>Создан:</strong> {{ $student->created_at }}</li>
        <li class="list-group-item"><strong>Обновлен:</strong> {{ $student->updated_at }}</li>
    </ul>

    <a href="{{ url()->previous() }}" class="btn btn-secondary">Назад</a>
@endsection