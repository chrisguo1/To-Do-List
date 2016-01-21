@extends('app')

@section('content')
    <h1 class="page-heading">Edit: {{ $item->title }} </h1>

    {!! Form::model($item, ['method' => 'PATCH', 'url' => 'items/' . $item->id]) !!}
        @include('items.form', ['submitButtonText' => 'Update Item']) 
    {!! Form::close() !!}
    
    <a href="{{ URL::previous() }}">Cancel</a>

@include('errors.list')

@endsection