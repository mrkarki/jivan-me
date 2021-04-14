<div class="hr-line-dashed"></div>
<div class="form-group  row">
    <label class="col-sm-2 col-form-label is_required">Role</label>
    <div class="col-sm-6 {{ $errors->has('user_role') ? 'has-error' : '' }}">

        {!! Form::select('user_role', $roles, null, ['class' => 'form-control', 'required' => '', 'id' => 'user-role']) !!}
        @if ($errors->has('user_role'))
            <label class="has-error" for="parent">{{ $errors->first('user_role') }}</label>
        @endif
    </div>
</div>

<div id="non-normal" style="display: none;">

    <div class="hr-line-dashed"></div>

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
<div class="hr-line-dashed"></div>
<div class="form-group  row">
    <label class="col-sm-2 col-form-label is_required">Email</label>
    <div class="col-sm-6 {{ $errors->has('email') ? 'has-error' : '' }}">
        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
        @if ($errors->has('email'))
            <label class="has-error" for="email">{{ $errors->first('email') }}</label>
        @endif
    </div>
</div>
<div class="hr-line-dashed"></div>
<div class="form-group  row">
    <label class="col-sm-2 col-form-label is_required">Password</label>
    <div class="col-sm-6 {{ $errors->has('pass') ? 'has-error' : '' }}">
        {!! Form::password('pass', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
        @if ($errors->has('pass'))
            <label class="has-error" for="pass">{{ $errors->first('pass') }}</label>
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
