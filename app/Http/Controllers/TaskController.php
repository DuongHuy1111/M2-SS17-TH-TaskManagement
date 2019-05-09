<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $task = new Task();
        $task->title = $request->input('title');
        $task->content = $request->input('content');
        $task->due_date = $request->input('due_date');

        //Up file image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $task->image = $path;
        }

        $task->save();
        return redirect()->route('tasks.index');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->title = $request->input('title');
        $task->content = $request->input('content');
        $task->due_date = $request->input('due_date');
        if ($request->hasFile('image')) {
            //Xóa ảnh cũ nếu có
            $currentImg = $task->image;
            if ($currentImg) {
                Storage::delete('/public/' . $currentImg);
            }

            //Cập nhập ảnh mới
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $task->image = $path;
        }
        $task->save();
        return redirect()->route('tasks.index');
    }

    public function delete($id)
    {
        $task = Task::findOrFail($id);
        $image = $task->image;

        if ($image){
            Storage::delete('/public/'. $image);
        }

        $task->delete();
        return redirect()->route('tasks.index');
    }
}
