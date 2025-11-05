@extends('layouts.app')

@section('title', 'Список групп')

@section('content')
    <h1>Список групп</h1>
    <a href="{{ route('groups.create') }}">Создать новую группу</a>

    @if($groups->isEmpty())
        <p>Групп нет.</p>
    @else
        <ul class="list-group">
            @foreach($groups as $group)
                <li class="list-group-item">
                    <a href="{{ route('groups.show', $group) }}">{{ $group->title }}</a>
                </li>
            @endforeach
        </ul>
    @endif

    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Назад</a>
@endsection