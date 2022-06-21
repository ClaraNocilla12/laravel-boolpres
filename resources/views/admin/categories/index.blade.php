@extends('layouts.app')

@section('content')

<div class="container">

  @if (session('message'))
    <div class="alert alert-danger">
      {{session('message')}}
    </div>

  @endif
<div>
  <a href="{{route('admin.categories.create')}}" class="btn btn-primary my-3">Create new category</a>
</div>

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">label</th>
      <th scope="col">color</th>
     
      <th scope="col">actions</th>
    </tr>
  </thead>
  <tbody>

    @forelse ($categories as $category)
        <tr>
         <th>{{$category->label}}</th>
         
         <td>{{$category->color}}</td>
         
         <td class="d-flex flex-nowrap">
             <a href="{{route('admin.categories.show', $category->id)}}" class="btn btn-light">View</a>
             <a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-warning">Edit</a>
             <form action="{{route('admin.categories.destroy', $category->id)}}" method="POST" class="delete-form">
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



</div>
@endsection

@section('scripts')
<script src="{{ asset('js/delete-form.js')}}"></script>

@endsection

