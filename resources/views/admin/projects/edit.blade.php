@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div class="py-2 bg-warning my-2">
            @foreach ($errors->all() as $error)
                <p class="mx-5 mt-4">{{ $error }}</p>
            @endforeach
    </div>
@endif

<form action="{{route('projects.update', $project->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("put")

        <div class="form-group">
            <label for="cover">Cover Image</label>
            <input type="file" class="form-control-file" name="cover" id="cover" placeholder="Add a cover image" aria-describedby="coverImgHelper">

            <label for="title">title</label>
            <input type="text" name="title" id="title" value="{{$project->title}}">
            <label for="author">author</label>
            <input type="text" name="author" id="author" value="{{$project->author}}">
            <label for="deadline">deadline</label>
            <input type="text" name="deadline" id="deadline" value="{{$project->deadline}}">

            <button type="submit">send</button>
        </div>

    </form>
@endsection

