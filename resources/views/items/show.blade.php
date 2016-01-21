<!-- Page when you click on the link to a specific item  -->
@extends('app')

@section('content')

    <h1 class="page-heading">{{ $item->title }}</h1>
  
    <item>
        <h3 style="float: left; display: inline-block;">{{ $item->body }}</h3>
    </item>
    
    @include('partials.editdelete')
    
    <br>
    <br>
    <br>

    @unless($item->tags->isEmpty())
        <h5>Tags:</h5>
        <ul>
            @foreach($item->tags as $tag)
                <li>{{ $tag->name }}</li>
            @endforeach
        </ul>
    @endunless

   
@stop