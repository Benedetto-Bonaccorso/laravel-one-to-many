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

            <label for="category_id" class="form-label">Categories</label>
            <select class="form-select form-select-lg w-25 @error('category_id') 'is-invalid' @enderror my-2" name="category_id" id="category_id">
                <option value="">Uncategorize</option>

                @forelse ($categories as $category )
                <!-- Check if the post has a category assigned or not                                    👇 -->
                <option value="{{$category->id}}" {{ $category->id == old('category_id',  $project->category ? $project->category->id : '') ? 'selected' : '' }}>
                    {{$category->name}}
                </option>
                @empty
                <option value="">Sorry, no categories in the system.</option>
                @endforelse

            </select>

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

