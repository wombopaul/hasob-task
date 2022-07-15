{{--    
    <a href="#" data-val='{{$id}}' class='btn-show-mdl-bid-modal'>
        {!! Form::button('<i class="fa fa-eye"></i>', ['type'=>'button']) !!}
    </a>
    
    <a href="#" data-val='{{$id}}' class='btn-edit-mdl-bid-modal'>
        {!! Form::button('<i class="fa fa-edit"></i>', ['type'=>'button']) !!}
    </a>
    
    <a href="#" data-val='{{$id}}' class='btn-delete-mdl-bid-modal'>
        {!! Form::button('<i class="fa fa-trash"></i>', ['type'=>'button']) !!}
    </a>
--}}
<div class='btn-group' role="group">
    <a data-toggle="tooltip" 
        title="View" 
        data-val='{{$id}}' 
        class="btn-show-mdl-bid-modal" href="#">
        <i class="fa fa-eye text-primary" style="opacity:80%"></i>
    </a>

    <a data-toggle="tooltip" 
        title="Edit" 
        data-val='{{$id}}' 
        class="btn-edit-mdl-bid-modal" href="#">
        <i class="fa fa-pencil-square-o text-primary" style="opacity:80%"></i>
    </a>

    <a data-toggle="tooltip" 
        title="Delete" 
        data-val='{{$id}}' 
        class="btn-delete-mdl-bid-modal" href="#">
        <i class="fa fa-trash-o text-danger" style="opacity:80%"></i>
    </a>
</div>