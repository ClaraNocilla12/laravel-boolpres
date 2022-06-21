@extends('layouts.app')

@section('content')

<div class="container">

  @if (session('message'))
    <div class="alert alert-danger">
      {{session('message')}}
    </div>

  @endif
<div>
  <a href="{{route('admin.posts.create')}}" class="btn btn-primary my-3">Create new post</a>
</div>

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">title</th>
      <th scope="col">category</th>
      <th scope="col">content</th>
      <th scope="col">image</th>
      <th scope="col">slug</th>
      <th scope="col">actions</th>
    </tr>
  </thead>
  <tbody>

    @forelse ($posts as $post)
        <tr>
         <th>{{$post->title}}</th>
         <td>
         @if($post->category)
          <span class="badge badge-pill badge-{{$post->category->color}}">{{$post->category->label}}</span>
          @else
          -
          @endif
          </td>
         <td>{{$post->content}}</td>
         
         <td>
             <img src="{{ $post->image}}" alt="{{$post->title}}" class="" style="width:100px">
         </td>
         <td>{{$post->slug}}</td>
         <td class="d-flex flex-nowrap">
             <a href="{{route('admin.posts.show', $post->id)}}" class="btn btn-light">View</a>
             <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-warning">Edit</a>
             <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST" class="delete-form">
                  @csrf
                  @method("DELETE")
               <button type="submit" class="btn btn-danger">Delete</button>
             </form>
         </td>
        </tr>
    @empty
        Non ci sono post

    @endforelse


    
    
  </tbody>
</table>

@if($posts->hasPages())
  {{$posts->links()}}

 @endif 

</div>
@endsection

@section('scripts')
<script src="{{ asset('js/delete-form.js')}}"></script>

@endsection

