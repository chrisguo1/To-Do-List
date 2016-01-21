@extends('app')

@section('content')
    <h1 class="page-heading">Create a new tag.</h1>

        {!! Form::open(['url' => 'tags']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Submit') !!}
            </div> 
        {!! Form::close() !!}

@include('errors.list')

@endsection

