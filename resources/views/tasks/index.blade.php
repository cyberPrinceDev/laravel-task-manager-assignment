@extends('layouts.app')

@section('content')
    @foreach ($tasks as $task)
        <div>
            <h2>{{ $task->title }}</h2>
            <p>{{ $task->description }}</p>
            <p>Status: {{ $task->is_completed ? 'Complete' : 'Incomplete' }}</p>
        </div>

    @endforeach
@endsection