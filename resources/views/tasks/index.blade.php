@extends('layouts.app')

@section('content')
    @foreach ($tasks as $task)
        <div
            style="border:1px solid {{ $task->is_completed ? '#ccc' : '#ddd' }}; padding:12px; margin-bottom:8px; background-color: {{ $task->is_completed ? '#f9f9f9' : '#fff' }};">
            <h2 style="{{ $task->is_completed ? 'text-decoration: line-through; color: #999;' : '' }}">{{ $task->title }}</h2>
            <p style="{{ $task->is_completed ? 'text-decoration: line-through; color: #999;' : '' }}">{{ $task->description }}
            </p>
            <p>Status: <span
                    style="{{ $task->is_completed ? 'color: #28a745; font-weight: bold;' : 'color: #ffc107; font-weight: bold;' }}">{{ $task->is_completed ? 'Complete' : 'Incomplete' }}</span>
            </p>

            <p>Scheduled date: {{ $task->scheduled_date ?? '—' }}</p>
            <p>Start time: {{ $task->start_time ?? '—' }}</p>
            <p>Reminder time: {{ $task->reminder_time ?? '—' }}</p>

            @unless($task->is_completed)
                <form action="{{ route('tasks.complete', $task->id) }}" method="POST">
                    @csrf

                    <button type="submit">Mark Complete</button>
                </form>
            @endunless
        </div>

    @endforeach
@endsection