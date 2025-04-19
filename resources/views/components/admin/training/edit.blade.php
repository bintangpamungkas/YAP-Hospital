@extends('admin')
@section('content')
<div>
    <h1>Edit Training</h1>
    <form action="{{ route('admin.training.update', $mstTraining) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="training_name">Name</label>
        <input type="text" name="training_name" id="training_name" value="{{ old('training_name', $mstTraining->training_name) }}">
        <!-- ... Other training fields ... -->
        <button type="submit">Update</button>
    </form>
</div>
@endsection
