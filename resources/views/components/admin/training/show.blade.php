@extends('admin')
@section('content')
<div>
    <h1>Training Detail</h1>
    <p>ID: {{ $mstTraining->training_id }}</p>
    <p>Name: {{ $mstTraining->training_name }}</p>
    <!-- ... Other training details ... -->
    <a href="{{ route('admin.training.index') }}">Back to List</a>
</div>
@endsection
