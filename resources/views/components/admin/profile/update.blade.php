@extends('admin')
@section('content')
<div>
    <h1 class="text-2xl font-semibold mb-4">Update Profile</h1>
    <form action="{{ url('/user/update') }}" method="POST" class="w-full p-4 bg-white rounded shadow">
        @csrf
        @method('PATCH')
        <div class="mb-4">
            <label for="user_name" class="block text-gray-700 font-medium mb-2">Name</label>
            <input type="text" name="user_name" id="user_name" placeholder="Enter name" 
                   class="w-full border border-gray-300 rounded px-3 py-2" 
                   value="{{ old('user_name', $user->user_name) }}">
        </div>
        <div class="mb-4">
            <label for="user_email" class="block text-gray-700 font-medium mb-2">Email</label>
            <input type="email" name="user_email" id="user_email" placeholder="Enter email" 
                   class="w-full border border-gray-300 rounded px-3 py-2" 
                   value="{{ old('user_email', $user->user_email) }}">
        </div>
        <div class="mb-4">
            <label for="user_birth_date" class="block text-gray-700 font-medium mb-2">Birth Date</label>
            <input type="date" name="user_birth_date" id="user_birth_date" 
                   class="w-full border border-gray-300 rounded px-3 py-2" 
                   value="{{ old('user_birth_date', $user->user_birth_date) }}">
        </div>
        <div class="mb-4">
            <label for="user_institution" class="block text-gray-700 font-medium mb-2">Institution</label>
            <input type="text" name="user_institution" id="user_institution" placeholder="Enter institution" 
                   class="w-full border border-gray-300 rounded px-3 py-2" 
                   value="{{ old('user_institution', $user->user_institution) }}">
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">
            Update Profile
        </button>
    </form>
</div>
@endsection
