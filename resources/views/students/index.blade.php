@extends('layouts.app')

@section('title', 'Список студентов')

@section('content')
    <h1>Список студентов</h1>

    @if($students->isEmpty())
        <p>Студентов нет.</p>
    @else
        <ul class="list-group">
            @foreach($students as $student)
                <li class="list-group-item">
                    <a href="{{ route('students.show', $student) }}">
                        {{ $student->surname }} {{ $student->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif

    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Назад</a>
@endsection