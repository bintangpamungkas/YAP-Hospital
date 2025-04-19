<?php

namespace App\Http\Controllers;

use App\Models\MstTraining;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function index()
    {
        $trainings = MstTraining::all();
        return view('components.admin.training.index', compact('trainings'));
    }

    public function create()
    {
        return view('components.admin.training.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'training_id'   => 'required|string|unique:mst_training,training_id',
            'training_name' => 'required|string',
            // ...other validation rules...
        ]);
        MstTraining::create($data);
        return redirect()->route('admin.training.index');
    }

    public function show(MstTraining $mstTraining)
    {
        return view('components.admin.training.show', compact('mstTraining'));
    }

    public function edit(MstTraining $mstTraining)
    {
        return view('components.admin.training.edit', compact('mstTraining'));
    }

    public function update(Request $request, MstTraining $mstTraining)
    {
        $data = $request->validate([
            'training_name' => 'required|string',
            // ...other validation rules...
        ]);
        $mstTraining->update($data);
        return redirect()->route('admin.training.index');
    }

    public function destroy(MstTraining $mstTraining)
    {
        $mstTraining->delete();
        return redirect()->route('admin.training.index');
    }
}
