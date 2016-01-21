@extends('app')


@section('content')
    
    <h1 class="page-heading">To Do List</h1>

    @if(count($items) === 0)
        <h3> No Items. </h3>
        <a href="{{ url('items/create') }}">Click here to create an item!</a>
    @endif

    <ul id="sortable-1">

        @foreach($items as $item)
            <h2>
                @include('partials.checkbox')
                <a href="{{ url('/items', $item->id) }}" style="display: inline-block; float:left; padding-left:1em" id="{{ $item->id }}">{{ $item->title }}</a>
                @include('partials.editdelete')  
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
