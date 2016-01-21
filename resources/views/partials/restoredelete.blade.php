<script>
    function ConfirmDelete()
    {
        var x = confirm("Are you sure you want to delete?");
        if (x)
            return true;
        else
            return false;
    }
</script>

<!-- Delete Button-->
{!! Form::open(['action' => ['RestoreController@destroy', $item->id], 'method' => 'DELETE', 'onsubmit' => 'return ConfirmDelete()']) !!}
<div class="delete" style="float: right; display: inline-block; margin-left: 10px">
    {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-mini']) !!}
</div>
{!! Form::close() !!}


<!-- Restore Button-->
{!! Form::open(['action' => ['RestoreController@show', $item->id], 'method' => 'GET']) !!}
<div class="form-group" style="float: right; display: inline-block;">
    {!! Form::submit('Restore', ['class'=>'btn btn-success btn-mini']) !!}
</div>
{!! Form::close() !!}







