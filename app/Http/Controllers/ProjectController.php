<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query('filter');
        $search = $request->query('search');
        $query = Project::with('users');
        if ($filter === 'active') {
            $query->where('completed', 1);
        } elseif ($filter === 'inactive') {
            $query->where('completed', 0);
        }
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        }
        $projects = $query->get();
        return view('projects.index', compact('projects'));
    }
    public function create()
    {
        $users = User::all();
        return view('projects.create', compact('users'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'completed' => 'boolean',
            'users' => 'array',
            'users.*' => 'exists:users,id',
        ]);
        $project = Project::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'] ?? null,
            'completed' => $validatedData['completed'] ?? false,
        ]);
        if (!empty($validatedData['users'])) {
            $project->users()->attach($validatedData['users']);
        }
        return redirect()->route('projects.index');
    }
    public function edit($id)
    {
        $project=Project::findOrFail($id);
        $users = User::all();
        return view('projects.edit', compact('project', 'users'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'completed' => 'boolean',
            'users' => 'array',
            'users.*' => 'exists:users,id',
        ]);
        $project = Project::update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'] ?? null,
            'completed' => $validatedData['completed'] ?? false,
        ]);
        if (!empty($validatedData['users'])) {
            $project->users()->attach($validatedData['users']);
        }

        return redirect()->route('projects.index');
    }



    public function destroy($id)
    {
        $project=Project::findOrFail($id);
        $project->delete();
        return redirect()->route('projects.index');
    }

}
