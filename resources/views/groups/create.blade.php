@extends('layouts.app')

@section('content')
<h1>Создание новой группы</h1>

<form method="POST" action="{{ route('groups.store') }}">
    @csrf
    <label>Название:</label>
    <input type="text" name="title" value="{{ old('title') }}" required>
    <br/>

    <label>Дата начала:</label>
    <input type="date" name="start_from" value="{{ old('start_from') }}" required>
    <br/>

    <label>Активна:</label>
    <input type="checkbox" name="is_active" {{ old('is_active') ? 'checked' : '' }}>
    <br/>

    <button type="submit">Создать</button>
</form>

<a href="{{ route('groups.index') }}">Назад к списку групп</a>
@endsection