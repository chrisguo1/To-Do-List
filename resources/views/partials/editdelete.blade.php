<!-- Delete Button-->
{!! Form::open(['action' => ['ItemsController@destroy', $item->id], 'method' => 'DELETE']) !!}    
    <div class="form-group" style="float: right; display: inline-block;">           
        {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-mini']) !!}
    </div> 
{!! Form::close() !!}
    

<!-- Edit Button -->
{!! Form::open(['action' => ['ItemsController@edit', $item->id], 'method' => 'GET']) !!}    
    <div class="form-group"  style="float: right; display: inline-block; margin-right: 10px">
        {!! Form::submit('Edit', ['class'=>'btn btn-primary btn-mini']) !!}
    </div> 
{!! Form::close() !!}


