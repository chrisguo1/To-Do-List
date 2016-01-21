@extends('app')


@section('content')
    
    <h1 class="page-heading">Tags</h1>
        @foreach($tags as $tag)
            <h2>
                <p style="display: inline-block; float:left;">{{ $tag->name }}</p>
                <br>
            </h2>
        @endforeach
    </ul> 
    <br>
    <br>
@endsection 

@section('footer')
@endsection



 

@stop
