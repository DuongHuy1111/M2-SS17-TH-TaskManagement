@extends('home')
@section('title', 'Update Task')
@section('content')
    <div class="col-12 col-md-12">
        <div class="container">
            <div class="col-12">
                <h1>Update Task</h1>
            </div>
            <div class="col-5">
                <form method="post" action="{{route('tasks.update',['id'=>$task->id])}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" value="{{$task->title}}" required>
                        @if($errors->has('title'))
                            <p>{{$errors->first('title')}}</p>
                            @endif
                    </div>

                    <div class="form-group">
                        <label>Content</label>
                        <input type="text" class="form-control" name="content" value="{{$task->content}}" required>
                        @if($errors->has('title'))
                            <p>{{$errors->first('title')}}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Due Date</label>
                        <input type="date" class="form-control" name="due_date" value="{{$task->due_date}}" required>
                        @if($errors->has('title'))
                            <p>{{$errors->first('title')}}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control-file" name="image">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Create</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancle</button>
                </form>
            </div>
        </div>
    </div>
    @endsection