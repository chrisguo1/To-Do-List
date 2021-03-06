<script src="//code.jquery.com/jquery.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

<div class="form-group">
    {!! Form::label('title', 'Item Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class = "form group">
    {!! Form::label('title', 'Description:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('tag_list', 'Tags:') !!}
    {!! Form::select('tag_list[]', $tags, null, ['id' =>'tag_list', 'class' => 'form-control', 'multiple']) !!}
</div> 

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div> 

 
@section('footer')
	<script>
  		$("#tag_list").select2({
            placeholder: 'Choose a tag',
            tags: true,
            tokenSeparators: [",", " "]
        });
    </script>
@endsection

