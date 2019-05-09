@extends('home')
@section('title', 'Task Manager')
@section('content')
    <div class="col-12">
        <div class="">
            <h1>Task Management</h1>
            <a href="{{route('tasks.create')}}" class="btn btn-warning btn-sm">Create</a>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Due Date</th>
                    <th>Image</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($tasks as $key => $task)
                    <tr>
                        <th scope="row">{{+$key}}</th>
                        <td>{{$task['title']}}</td>
                        <td>{{$task['content']}}</td>
                        <td>{{$task['due_date']}}</td>
                        <td>
                            @if($task->image)
                                <img src="{{asset('storage/'. $task->image)}}" style="width: 90px; height: 100px">
                            @else
                                {{'No Image'}}
                            @endif
                        </td>
                        <td>
                            <a href="{{route('tasks.edit', ['id' => $task->id])}}">
                                <button type="submit" class="btn btn-outline-primary btn-sm">Update</button>
                            </a>
                        </td>
                        <td>
                            <a href="{{route('tasks.delete', ['id' => $task->id])}}">
                                <button type="submit" class="btn btn-outline-danger btn-sm"
                                        onclick="return confirm('You sure want to delete? {{$task->title}}')">Delete
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection