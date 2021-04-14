@extends('admin.layouts.layout')

@push('style')
@endpush

@section('title', 'Change Password')

@section('content')
    @include('admin.common.breadcrumbs', [
    'title'=> 'Change',
    'panel'=> 'changePassword',
    ])
@if (\Session::has('error'))
<pre style="color: red;"> <code>{!! \Session::get('error') !!}</code></pre>
@endif
    <div class="wrapper wrapper-content">
        {!! Form::open(['route' => 'admin.changepassword.changepass', 'enctype' => 'multipart/form-data', 'method' => 'post', 'id' => 'changePasswordForm']) !!}
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Change Password</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="form-group  row">
                            <label class="col-sm-2 col-form-label is_required">Old Password</label>
                            <div class="col-sm-6 {{ $errors->has('old_pass') ? 'has-error' : '' }}">
                                {!! Form::password('old_pass', ['class' => 'form-control', 'placeholder' => 'Old Password']) !!}
                                @if ($errors->has('old_pass'))
                                    <label class="has-error" for="old_pass">{{ $errors->first('old_pass') }}</label>
                                @endif
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group  row">
                            <label class="col-sm-2 col-form-label is_required">New Password</label>
                            <div class="col-sm-6 {{ $errors->has('new_pass') ? 'has-error' : '' }}">
                                {!! Form::password('new_pass', ['class' => 'form-control', 'placeholder' => 'New Password']) !!}
                                @if ($errors->has('new_pass'))
                                    <label class="has-error" for="new_pass">{{ $errors->first('new_pass') }}</label>
                                @endif
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group  row">
                            <label class="col-sm-2 col-form-label is_required">Re-Password</label>
                            <div class="col-sm-6 {{ $errors->has('re_pass') ? 'has-error' : '' }}">
                                {!! Form::password('re_pass', ['class' => 'form-control', 'placeholder' => 'Re-Password']) !!}
                                @if ($errors->has('re_pass'))
                                    <label class="has-error" for="re_pass">{{ $errors->first('re_pass') }}</label>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @includeIf('admin.common.action')
        {!! Form::close() !!}
    </div>
@endsection

@push('js')
    <script src="{{ asset('assets/admin/js/plugins/validate/jquery.validate.min.js') }}"></script>
    @include('admin.profile.partials.script')
@endpush
