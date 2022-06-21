<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body{
             background-color: lightgrey;
             
        }
    </style>
</head>
<body>


<h2>Hai creato il post {{$post->title}}</h2> 
<h5> La categoria abbinata è 
    {{$post->category->label}}
</h5>
        <p>Tags:</p>
@forelse ( $post->tags as $tag )
        <li>{{$tag->label}}</li>
@empty
        no tag

@endforelse        
    
</body>
</html>