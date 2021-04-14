<div>
    <?php
    $role = $data['row']->user_role;
    if ($role == '2' || $role == '3') { ?>
    <div class="form-group  row">
        <label class="col-sm-2 col-form-label is_required">Shop / Manufacturer Full Name</label>
        <div class="col-sm-6 {{ $errors->has('shop_name') ? 'has-error' : '' }}">
            {!! Form::text('shop_name', null, ['class' => 'form-control', 'placeholder' => 'Manufacturer Full Name']) !!}
            @if ($errors->has('shop_name'))
                <label class="has-error" for="shop_name">{{ $errors->first('shop_name') }}</label>
            @endif
        </div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="form-group  row">
        <label class="col-sm-2 col-form-label is_required">Address</label>
        <div class="col-sm-6 {{ $errors->has('address') ? 'has-error' : '' }}">
            {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Address']) !!}
            @if ($errors->has('address'))
                <label class="has-error" for="address">{{ $errors->first('address') }}</label>
            @endif
        </div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="form-group  row">
        <label class="col-sm-2 col-form-label is_required">Pan No.</label>
        <div class="col-sm-6 {{ $errors->has('pan_no') ? 'has-error' : '' }}">
            {!! Form::text('pan_no', null, ['class' => 'form-control', 'placeholder' => 'Pan No']) !!}
            @if ($errors->has('pan_no'))
                <label class="has-error" for="pan_no">{{ $errors->first('pan_no') }}</label>
            @endif
        </div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="form-group  row">
        <label class="col-sm-2 col-form-label is_required">Banijya Bibhag Register No.</label>
        <div class="col-sm-6 {{ $errors->has('doc_no') ? 'has-error' : '' }}">
            {!! Form::text('doc_no', null, ['class' => 'form-control', 'placeholder' => 'Banijya Bibhag Register No.']) !!}
            @if ($errors->has('doc_no'))
                <label class="has-error" for="doc_no">{{ $errors->first('doc_no') }}</label>
            @endif
        </div>
    </div>
</div>
<div class="hr-line-dashed"></div>
    <?php }
    ?>

<div class="form-group  row">
    <label class="col-sm-2 col-form-label is_required">Phone No.</label>
    <div class="col-sm-6 {{ $errors->has('phone') ? 'has-error' : '' }}">
        {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Phone No.', 'pattern' => '[1-9]{1}[0-9]{9}', 'oninvalid' => "this.setCustomValidity('Phone No. must 10 digits')"]) !!}
        @if ($errors->has('phone'))
            <label class="has-error" for="phone">{{ $errors->first('phone') }}</label>
        @endif
    </div>
</div>
<div class="hr-line-dashed"></div>
<div class="form-group  row">
    <label class="col-sm-2 col-form-label is_required">Full Name</label>
    <div class="col-sm-6 {{ $errors->has('name') ? 'has-error' : '' }}">
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Full Name']) !!}
        @if ($errors->has('name'))
            <label class="has-error" for="name">{{ $errors->first('name') }}</label>
        @endif
    </div>
</div>
