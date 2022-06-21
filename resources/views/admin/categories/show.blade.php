@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row d-flex ">
            
            <div class="col-8">
                 <h1>{{$category->label}}</h1>
                 
                  <span class="badge badge-{{$category->color}}">{{$category->label}}</span>
                
                 <br>
               
            </div>
        </div>   
       
    


    <form action="{{route('admin.categories.destroy', $category->id)}}" method="POST" class="delete-form">
                  @csrf
                  @method("DELETE")
               <button type="submit" class="btn btn-danger">Delete</button>
             </form>

       </div>      
@endsection

@section('scripts')
<script src="{{ asset('js/delete-form.js')}}"></script>

@endsection