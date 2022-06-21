@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row d-flex ">
            
            <img  src="{{asset("storage/$post->image")}}" alt="" class="col-4 mb-3">
           
            <div class="col-8">
                 <h1>{{$post->title}}</h1>
                 @if($post->category)
                  <span class="badge badge-{{$post->category->color}}">{{$post->category->label}}</span>
                 @else 
                     -
                 @endif
                 <br>
                <span>{{$post->content}}</span>
            </div>
        </div>   
       
       
        @forelse( $post->tags as $tag)

        <span class="badge badge-pill mb-3" style="background-color: {{$tag->color}}">{{$tag->label}}</span>

        @empty

        no tag

        @endforelse
    



    <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST" class="delete-form">
                  @csrf
                  @method("DELETE")
               <button type="submit" class="btn btn-danger">Delete</button>
             </form>

       </div>      
@endsection

@section('scripts')
<script src="{{ asset('js/delete-form.js')}}"></script>

@endsection