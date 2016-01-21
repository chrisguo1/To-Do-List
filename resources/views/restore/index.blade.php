@extends('app')

@section('content')

    <h1 class="page-heading">Restore Deleted Items</h1>

    @if(count($items) === 0)
        <h3> No Items Deleted. </h3>
    @endif

    @foreach($items as $item)
        <h2>
            <a style="display: inline-block; float:left; padding-left:1em" id="{{ $item->id }}">{{ $item->title }}</a>
            @include('partials.restoredelete')
            <br>
        </h2>
    @endforeach

    <br>
    <br>
@endsection

@section('footer')
    @if(count($items) > 0)

        <!-- Delete All Button-->
        {!! Form::open(['action' => ['RestoreController@destroyAll'], 'method' => 'DELETE', 'onsubmit' => 'return ConfirmDelete()']) !!}
        <div class="delete" style="float: bottom; display: inline-block;">
            {!! Form::submit('Delete All', ['class'=>'btn btn-warning btn']) !!}
        </div>
        {!! Form::close() !!}
    @endif

@endsection





@stop