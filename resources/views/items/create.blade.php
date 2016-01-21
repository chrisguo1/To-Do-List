@extends('app')

@section('content')
    <h1 class="page-heading">Create a new item. </h1>

    {!! Form::open(['url' => 'items']) !!}
        @include('items.form', ['submitButtonText' => 'Add Item']) 
    {!! Form::close() !!}

@include('errors.list')

@endsection

