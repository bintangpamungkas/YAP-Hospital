<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    // Tampilkan semua user
    public function index()
    {
        $users = User::all();
        // ...existing code (tampilan view)...
        return view('components.admin.users.index', compact('users'));
    }

    // Tampilkan form untuk membuat user baru
    public function create()
    {
        // ...existing code (tampilan view)...
        return view('components.admin.users.create');
    }

    // Simpan data user baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_name'     => 'required',
            'user_email'    => 'required|email|unique:users,user_email',
            'user_password' => 'required|min:6',
            // ...validasi field lain sesuai kebutuhan...
        ]);

        $data['user_password'] = bcrypt($data['user_password']);

        User::create($data);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully');
    }

    // Tampilkan detail satu user
    public function show($id)
    {
        $user = User::findOrFail($id);
        // ...existing code (tampilan view)...
        return view('components.admin.users.show', compact('user'));
    }

    // Tampilkan form edit untuk user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        // ...existing code (tampilan view)...
        return view('components.admin.users.edit', compact('user'));
    }

    // Update data user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->validate([
            'user_name'  => 'required',
            'user_email' => 'required|email|unique:users,user_email,'.$id.',user_id',
            // ...validasi field lain sesuai kebutuhan...
        ]);

        if ($request->filled('user_password')) {
            $data['user_password'] = bcrypt($request->user_password);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }

    // Hapus user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    }
}
