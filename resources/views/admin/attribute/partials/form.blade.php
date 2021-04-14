
<div class="hr-line-dashed"></div>
<div class="form-group  row">
    <label class="col-sm-2 col-form-label is_required">Type</label>
    <div class="col-sm-6 {{ $errors->has('attr_type') ? 'has-error' : '' }}">
        {{-- {!! Form::text('title', null, [ 'class' => 'form-control','required' => 'required' ]) !!} --}}
        <select name="attr_type" id="" class="form-control" >
            <?php
               if(isset($data['row'])){ ?>
                <option value="color" <?php echo $data['row']->type=="color" ? 'selected="selected"': ''; ?> >Color</option>
            <option value="size" <?php echo $data['row']->type=="size" ? 'selected="selected"': ''; ?> >Size</option>
              <?php }else{ ?>
 <option value="color" selected="selected" >Color</option>
 <option value="size">Size</option>
              <?php }
            ?>

        </select>
        @if ($errors->has('attr_type'))
            <label class="has-error" for="attr_type">{{ $errors->first('attr_type') }}</label>
        @endif
    </div>
</div>

<div class="hr-line-dashed"></div>
<div class="form-group  row">
    <label class="col-sm-2 col-form-label is_required">Name</label>
    <div class="col-sm-6 {{ $errors->has('name') ? 'has-error' : '' }}">
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
        @if ($errors->has('name'))
            <label class="has-error" for="name">{{ $errors->first('name') }}</label>
        @endif
    </div>
</div>
<div class="hr-line-dashed"></div>
<div class="form-group  row">
    <label class="col-sm-2 col-form-label is_required">Description</label>
    <div class="col-sm-6 {{ $errors->has('description') ? 'has-error' : '' }}">
        {!! Form::textarea('desc', null, ['class' => 'form-control']) !!}
        @if ($errors->has('desc'))
            <label class="has-error" for="description">{{ $errors->first('desc') }}</label>
        @endif
    </div>
</div>

<div class="hr-line-dashed"></div>
<div class="form-group row">
    <label class="col-sm-1 col-form-label is_required">Status</label>
    <div class="col-sm-8">
        <div class="i-checks mt-2">
            <label for="active"> {!! Form::radio('status', 1, true, ['id' => 'active']) !!} <i></i> Active </label>
            <label for="inactive"> {!! Form::radio('status', 2, false, ['id' => 'inactive']) !!} <i></i> Inactive </label>
        </div>
    </div>
</div>
