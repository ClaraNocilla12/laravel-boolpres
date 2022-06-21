@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{route('admin.posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" placeholder="post title" name="title" value="{{ old('title', $post->title)}}">
    </div>
    <div class="form-group">
      <label for="category">Category</label>
      <select name="category_id" id="category">
        <option value="">Nessuna categoria</option>
        @foreach($categories as $category)
        <option 
        @if(old('category_id', $post->category_id) == $category->id) selected @endif
        value="{{$category->id}}">{{$category->label}}</option>
        @endforeach
      </select>
    </div>
      <div class="form-group">  
        <label for="title">Content</label>
        <textarea type="text" class="form-control" id="content" name="content" cols=30 rows=10>{{ old('content', $post->content)}}</textarea>
    </div>

     <div class="form-group">  
        <label for="image">Image</label>
        <input type="file" class="form-control-file" id="image" placeholder="url image" name="image">
        
    </div> 

    <hr>

      @foreach($tags as $tag)
      <div class="form-check form-check-inline mb-3">
        <input class="form-check-input" @if( in_array($tag->id, old('tags', $post_tags_id)) ) checked @endif type="checkbox" id="tag-{{$tag->id}}" value="{{$tag->id}}" name="tags[]">
         <label class="form-check-label" for="tag-{{$tag->id}}">{{$tag->label}}</label>
      </div>
      
    @endforeach

        <button type="submit" class="btn btn-success">Edit</button>
     
</div>
</form>

@endsection

@section('content')

@endsection