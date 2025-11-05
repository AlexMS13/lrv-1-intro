@extends('layouts.app')

@section('content')
<h1>Добавление студента в группу: {{ $group->title }}</h1>

<form method="POST" action="{{ route('groups.students.store', $group) }}">
    @csrf
    <label>Фамилия:</label>
    <input type="text" name="surname" value="{{ old('surname') }}" required>
    <br/>
    <label>Имя:</label>
    <input type="text" name="name" value="{{ old('name') }}" required>
    <br/>
    <button type="submit">Добавить</button>
</form>

<a href="{{ route('groups.show', $group) }}">Назад к группе</a>
@endsection