@extends('layouts.app')

@section('title', 'Просмотр группы')

@section('content')
    <h1>Группа: {{ $group->title }}</h1>
    <ul class="list-group mb-3">
        <li class="list-group-item"><strong>Дата начала обучения:</strong> {{ $group->start_from }}</li>
        <li class="list-group-item"><strong>Активна:</strong> {{ $group->is_active ? 'Да' : 'Нет' }}</li>
        <li class="list-group-item"><strong>Создана:</strong> {{ $group->created_at }}</li>
        <li class="list-group-item"><strong>Обновлена:</strong> {{ $group->updated_at }}</li>
    </ul>

    <h3>Студенты группы</h3>
    <a href="{{ route('groups.students.create', $group) }}">Добавить студента</a>
    @if($group->students->isEmpty())
        <p>Студентов нет</p>
    @else
        <ul class="list-group mb-3">
            @foreach ($group->students as $student)
                <li class="list-group-item">
                    <a href="{{ route('students.show', $student) }}">
                        {{ $student->surname }} {{ $student->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif

    <a href="{{ url()->previous() }}" class="btn btn-secondary">Назад</a>
@endsection