@extends('admin')
@section('content')
<div>
    <h1>Create Training</h1>
    <form action="{{ route('admin.training.store') }}" method="POST">
        @csrf
        <label for="training_name">Name</label>
        <input type="text" name="training_name" id="training_name" value="{{ old('training_name') }}">
        <!-- ... Other training fields ... -->
        <button type="submit">Submit</button>
    </form>
</div>
@endsection
