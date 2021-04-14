<div class="hr-line-dashed"></div>
<div class="form-group row">
    <label class="col-sm-1 col-form-label is_required">Status</label>
    <div class="col-sm-8">
        <div class="i-checks mt-2">
            <label for="active"> {!! Form::radio('status', 1, true, ['id' => 'active']) !!} <i></i> Active </label>
            <label for="inactive"> {!! Form::radio('status', 0, false, ['id' => 'inactive']) !!} <i></i> Inactive </label>
        </div>
    </div>
    @if($errors->has('status'))
        <label class="has-error" for="status">{{ $errors->first('status') }}</label>
    @endif
</div>
