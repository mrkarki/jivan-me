<div class="form-group  row">
    <label class="col-sm-2 col-form-label is_required">Site Title</label>
    <div class="col-sm-6 {{ $errors->has('site_title') ? 'has-error' : '' }}">
                {!! Form::text('content[site_title]', $users['site_title'] ?? '', [ 'class' => 'form-control' ]) !!}
                {{-- {!! Form::text('content[about][title]', $users['site_title'] ?? '', [ 'class' => 'form-control' ]) !!}
                {!! Form::text('content[about][content]', $users['site_title'] ?? '', [ 'class' => 'form-control' ]) !!}
                {!! Form::text('content[about][content]', $users['site_title'] ?? '', [ 'class' => 'form-control' ]) !!} --}}

        @if($errors->has('site_title'))
            <label class="has-error" for="site_title">{{ $errors->first('site_title') }}</label>
        @endif
    </div>
</div>
<div class="hr-line-dashed"></div>
<div class="form-group  row">
    <label class="col-sm-2 col-form-label is_required">Site Email</label>
    <div class="col-sm-6 {{ $errors->has('content[site_email]') ? 'has-error' : '' }}">
        {!! Form::text('content[site_email]', $users['site_email']?? '', [ 'class' => 'form-control' ]) !!}
        @if($errors->has('content[site_email]'))
            <label class="has-error" for="content[site_email]">{{ $errors->first('content[site_email]') }}</label>
        @endif
    </div>
</div>
<h2>Header settings</h2>
<div class="hr-line-dashed">

</div>
<div class="form-group  row">
    <label class="col-sm-2 col-form-label is_required">Phone</label>
    <div class="col-sm-6 {{ $errors->has('content[header_phone]') ? 'has-error' : '' }}">
        {!! Form::text('content[header_phone]', $users['header_phone']?? '', [ 'class' => 'form-control' ]) !!}
        @if($errors->has('content[header_phone]'))
            <label class="has-error" for="content[header_phone]">{{ $errors->first('content[header_phone]') }}</label>
        @endif
    </div>
</div>
<div class="form-group  row">
    <label class="col-sm-2 col-form-label is_required">Email</label>
    <div class="col-sm-6 {{ $errors->has('content[header_email]') ? 'has-error' : '' }}">
        {!! Form::text('content[header_email]', $users['header_email']?? '', [ 'class' => 'form-control' ]) !!}
        @if($errors->has('content[header_email]'))
            <label class="has-error" for="content[header_email]">{{ $errors->first('content[header_email]') }}</label>
        @endif
    </div>
</div>
<div class="form-group  row">
    <label class="col-sm-2 col-form-label is_required">Store Link</label>
    <div class="col-sm-6 {{ $errors->has('content[header_email]') ? 'has-error' : '' }}">
        {!! Form::text('content[header_store_link]', $users['header_store_link']?? '', [ 'class' => 'form-control' ]) !!}
        @if($errors->has('content[header_store_link]'))
            <label class="has-error" for="content[header_store_link]">{{ $errors->first('content[header_store_link]') }}</label>
        @endif
    </div>
</div>
<h2>Footer settings</h2>
<div class="hr-line-dashed"></div>
<div class="form-group  row">
    <label class="col-sm-2 col-form-label is_required">Logo</label>
    <div class="col-sm-6 {{ $errors->has('content[footer_logo]') ? 'has-error' : '' }}">
        {!! Form::text('content[footer_logo]', $users['footer_logo']?? '', [ 'class' => 'form-control' ]) !!}
        @if($errors->has('content[footer_logo]'))
            <label class="has-error" for="content[footer_logo]">{{ $errors->first('content[footer_logo]') }}</label>
        @endif
    </div>
</div>
<div class="form-group  row">
    <label class="col-sm-2 col-form-label is_required">Short Info</label>
    <div class="col-sm-6 {{ $errors->has('content[footer_info]') ? 'has-error' : '' }}">
        {!! Form::textarea('content[footer_info]', $users['footer_info']?? '', [ 'class' => 'form-control' ]) !!}
        @if($errors->has('content[footer_info]'))
            <label class="has-error" for="content[footer_info]">{{ $errors->first('content[footer_info]') }}</label>
        @endif
    </div>
</div>
<div class="form-group  row">
    <label class="col-sm-2 col-form-label is_required">Get In Tuch</label>
    <div class="col-sm-6 {{ $errors->has('content[footer_in_touch]') ? 'has-error' : '' }}">
        {!! Form::textarea('content[footer_in_touch]', $users['footer_in_touch']?? '', [ 'class' => 'form-control' ]) !!}
        @if($errors->has('content[footer_in_touch]'))
            <label class="has-error" for="content[footer_in_touch]">{{ $errors->first('content[footer_in_touch]') }}</label>
        @endif
    </div>
</div>
<div class="form-group  row">
    <label class="col-sm-2 col-form-label is_required">Copy right</label>
    <div class="col-sm-6 {{ $errors->has('content[footer_copy_right]') ? 'has-error' : '' }}">
        {!! Form::text('content[footer_copy_right]', $users['footer_copy_right']?? '', [ 'class' => 'form-control' ]) !!}
        @if($errors->has('content[footer_copy_right]'))
            <label class="has-error" for="content[footer_copy_right]">{{ $errors->first('content[footer_copy_right]') }}</label>
        @endif
    </div>
</div>
<h2>Social Media</h2>
<?php
if(isset($users['social'])){
    $social=$users['social'];
    $social=json_decode($social);
//print_r($social->facebook);
}

?>
<div class="hr-line-dashed"></div>
<div class="form-group  row">
    <label class="col-sm-2 col-form-label is_required">Facebook</label>
    <div class="col-sm-6 {{ $errors->has('content[social][facebook]') ? 'has-error' : '' }}">
        {!! Form::text('content[social][facebook]', $social->facebook?? '', [ 'class' => 'form-control' ]) !!}
        @if($errors->has('content[social][facebook]'))
            <label class="has-error" for="content[social][facebook]">{{ $errors->first('content[social][facebook]') }}</label>
        @endif
    </div>
</div>

<div class="form-group  row">
    <label class="col-sm-2 col-form-label is_required">Twitter</label>
    <div class="col-sm-6 {{ $errors->has('content[social][twitter]') ? 'has-error' : '' }}">
        {!! Form::text('content[social][twitter]',$social->twitter?? '', [ 'class' => 'form-control' ]) !!}
        @if($errors->has('content[social][twitter]'))
            <label class="has-error" for="content[social][twitter]">{{ $errors->first('content[social][twitter]') }}</label>
        @endif
    </div>
</div>
<div class="form-group  row">
    <label class="col-sm-2 col-form-label is_required">Instagram</label>
    <div class="col-sm-6 {{ $errors->has('content[social][insta]') ? 'has-error' : '' }}">
        {!! Form::text('content[social][insta]',$social->insta ?? '', [ 'class' => 'form-control' ]) !!}
        @if($errors->has('content[social][insta]'))
            <label class="has-error" for="content[social][insta]">{{ $errors->first('content[social][insta]') }}</label>
        @endif
    </div>
</div>
