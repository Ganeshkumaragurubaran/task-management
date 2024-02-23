<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
    
        $sortBy = $request->input('sort_by', 'due_date');
        $filterBy = $request->input('filter_by', 'all'); 

        $tasksQuery = $user->tasks();
    
        // Apply sorting
        if ($sortBy === 'due_date_asc') {
            $tasksQuery->orderBy('due_date', 'asc');
        } elseif ($sortBy === 'due_date_desc') {
            $tasksQuery->orderBy('due_date', 'desc');
        } else {
            $tasksQuery->orderBy($sortBy, 'asc');
        }
    
        // Apply filtering
        if ($filterBy !== 'all') {
            $tasksQuery->where('status', $filterBy);
        }
    

        $tasks = $tasksQuery->paginate(5); 
    
        return view('dashboard', compact('tasks', 'sortBy', 'filterBy'));
    }

    public function create()
    {
        return view('tasks.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'status' => 'required|in:pending,completed',
            'due_date' => 'required|date',
        ]);

        $task = new Task();
        $task->title = $request->input("title");
        $task->description = $request->input("description");
        $task->status = $request->input("status");
        $task->due_date = $request->input("due_date");
        $task->user_id = Auth::id();
        $task->save();
        return redirect()->route('dashboard')->with('success', 'Task created successfully!');
    }


    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit',compact('task'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'status' => 'required|in:pending,completed',
            'due_date' => 'required|date',
        ]);
        $task=Task::findOrFail($id);
        $task->title = $request->input("title");
        $task->description = $request->input("description");
        $task->status = $request->input("status");
        $task->due_date = $request->input("due_date");
        $task->user_id = Auth::id();
        $task->save();

        return redirect()->route('dashboard')->with('success', 'Task updated successfully!');
    }


    public function markCompleted($id)
    {
        $task=Task::findOrFail($id);
        $task->status='completed';
        $task->save();

        return redirect()->route('dashboard')->with('success', 'Task marked as completed!');
    }
    public function revokeCompleted($id)
    {
        $task=Task::findOrFail($id);
        $task->status='pending';
        $task->save();

        return redirect()->route('dashboard')->with('success', 'Task Revoked!');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('dashboard')->with('success', 'Task deleted successfully!');
    }
}
