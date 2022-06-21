@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" placeholder="post title" name="title">
    </div>

    <div class="form-group">
      <label for="category">Category</label>
      <select name="category_id" id="category">
        <option value="">Nessuna categoria</option>
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->label}}</option>
        @endforeach
      </select>
    </div>
      <div class="form-group">  
        <label for="title">Content</label>
        <textarea type="text" class="form-control" id="content" name="content" cols=30 rows=10></textarea>
    </div>

      <!-- <div class="form-group">  
        <label for="image">Image</label>
        <input type="url" class="form-control" id="image" placeholder="url image" name="image">
        
    </div>   -->

    <div class="form-group">  
        <label for="image">Image</label>
        <input type="file" class="form-control-file" id="image" placeholder="url image" name="image">
        
    </div> 

  <hr>

     @foreach( $tags as $tag )
      <div class="form-check form-check-inline mb-3">
        <input class="form-check-input" type="checkbox" id="tag-{{$tag->id}}" value="{{$tag->id}}" name="tags[]" @if( in_array($tag->id, old('tags', [])) ) checked @endif>
         <label class="form-check-label" for="tag-{{$tag->id}}" >{{$tag->label}}</label>
      </div>
      
    @endforeach

  <br>
        <button type="submit" class="btn btn-success">Create</button>
     
</div>
</form>

@endsection

@section('content')

@endsection