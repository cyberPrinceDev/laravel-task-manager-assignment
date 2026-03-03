<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Create Task</title>
	<style>
		body { font-family: Arial, sans-serif; padding: 20px; }
		label { display:block; margin-top:10px; }
		input[type="text"], textarea { width:100%; max-width:600px; padding:8px; }
		button { margin-top:12px; padding:8px 16px; }
	</style>
</head>
<body>
	<h1>Create Task</h1>

	<form action="{{ url('/tasks') }}" method="POST">
		@csrf

		{{-- show validation errors --}}
		@if ($errors->any())
			<div style="color:red; margin-bottom:1em;">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

		<div>
			<label for="title">Title</label>
			<input type="text" name="title" id="title" value="{{ old('title') }}" required>
		</div>

		<div>
			<label for="description">Description</label>
			<textarea name="description" id="description" rows="6" required>{{ old('description') }}</textarea>
		</div>

		<button type="submit">Create Task</button>
	</form>

</body>
</html>
