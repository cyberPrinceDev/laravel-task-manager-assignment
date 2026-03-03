@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1>{{ $task->title }}</h1>

                <div class="card mt-4">
                    <div class="card-body">
                        <p><strong>Description:</strong></p>
                        <p>{{ $task->description }}</p>

                        <p><strong>Status:</strong></p>
                        @if($task->is_completed)
                            <span class="badge badge-success">Completed</span>
                        @else
                            <span class="badge badge-warning">Pending</span>
                        @endif
                    </div>
                </div>

                @if(!$task->is_completed)
                    <form action="{{ route('tasks.complete', $task->id) }}" method="PATCH" class="mt-3">
                        @method('PUT')
                        @csrf
                        <button type="submit" class="btn btn-success">Mark Complete</button>
                    </form>
                @endif

                <a href="{{ route('tasks.index') }}" class="btn btn-primary mt-3">Back to Tasks</a>
            </div>
        </div>
    </div>
@endsection