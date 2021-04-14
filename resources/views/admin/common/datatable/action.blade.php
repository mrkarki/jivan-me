<ul class="normal-actions">
    <?php
        if($role==1){
    ?>
    <li>
        <a href="{{ route("admin.{$model}.edit", $data->id) }}" title="Edit"><i class="fa fa-edit btn btn-primary btn-lg"></i> </a>
    </li>
    <?php } ?>
    <li>
        <a href="{{ route("admin.{$model}.show", $data->id) }}" title="Show"> <i class="fa fa-eye btn btn-success btn-lg"></i> </a>
    </li>
    <?php
        if($role==1){
    ?>
    <li>
        <a href="javascript:void(0);" title="Delete" class="confirm-delete-row ">
            <i class="fa fa-trash btn btn-lg btn-danger "></i>
        </a>
        {!! Form::open(['url' => route("admin.{$model}.destroy", $data->id), 'method' => 'delete']) !!}
        {!! Form::close() !!}
    </li>
    <?php } ?>
</ul>

