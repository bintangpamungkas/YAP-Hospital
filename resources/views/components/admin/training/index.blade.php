@extends('admin')
@section('content')
<div>
    <h1 class="text-2xl font-semibold mb-4">Training List</h1>
    <a href="{{ route('admin.training.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        Create New Training
    </a>
    <div class="mt-6 overflow-x-auto">
        <table class="min-w-full bg-white rounded-lg shadow overflow-hidden">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-3 px-6 text-left">ID</th>
                    <th class="py-3 px-6 text-left">Name</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trainings as $training)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="py-4 px-6">{{ $training->training_id }}</td>
                        <td class="py-4 px-6">{{ $training->training_name }}</td>
                        <td class="py-4 px-6 text-center">
                            <a href="{{ route('admin.training.show', $training) }}" class="text-blue-500 hover:text-blue-700 mr-2">Show</a>
                            <a href="{{ route('admin.training.edit', $training) }}" class="text-green-500 hover:text-green-700 mr-2">Edit</a>
                            <form action="{{ route('admin.training.destroy', $training) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
