<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //LISTS TASKS
    public function index(Request $request)
    {
        $query = Task::query();

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        $tasks = $query->orderByRaw("FIELD(priority, 'high', 'medium', 'low')")
            ->orderBy('due_date', 'asc')
            ->get();

        if ($tasks->isEmpty()) {
            return response()->json([
                'message' => 'No tasks found',
                'tasks' => []
            ]);
        }

        return response()->json($tasks);
    }

    //CREATE TASK
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'due_date' => 'required|date|after_or_equal:today',
            'priority' => 'required|in:low,medium,high',
        ]);

        $duplicate = Task::where('title', $request->title)
            ->where('due_date', $request->due_date)
            ->exists();

        if ($duplicate) {
            return response()->json([
                'message' => 'A task with this title already exists for that due date.'
            ], 422);
        }

        $task = Task::create([
            'title' => $request->title,
            'due_date' => $request->due_date,
            'priority' => $request->priority,
            'status' => 'pending',
        ]);

        return response()->json($task, 201);
    }
    //UPDATE TASK
    public function updateStatus(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $progression = [
            'pending' => 'in_progress',
            'in_progress' => 'done',
        ];

        if (!isset($progression[$task->status])) {
            return response()->json([
                'message' => 'This task is already done and cannot be updated further.'
            ], 422);
        }

        $task->status = $progression[$task->status];
        $task->save();

        return response()->json($task);
    }
    //DELETE TASK
    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        if ($task->status !== 'done') {
            return response()->json([
                'message' => 'Only completed tasks can be deleted.'
            ], 403);
        }

        $task->delete();

        return response()->json([
            'message' => 'Task deleted successfully.'
        ]);
    }
    //DAILY REPORT
    public function report(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
        ]);

        $tasks = Task::whereDate('due_date', $request->date)->get();

        $summary = [];
        foreach (['high', 'medium', 'low'] as $priority) {
            foreach (['pending', 'in_progress', 'done'] as $status) {
                $summary[$priority][$status] = $tasks
                    ->where('priority', $priority)
                    ->where('status', $status)
                    ->count();
            }
        }

        return response()->json([
            'date' => $request->date,
            'summary' => $summary,
        ]);
    }
}