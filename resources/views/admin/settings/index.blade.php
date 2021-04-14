@extends('admin.layouts.layout')

@push('style')
@endpush

@section('title', 'Create a setting')

@section('content')
    @include('admin.common.breadcrumbs', [
        'title'=> 'index',
        'panel'=> 'settings',
    ])

    <div class="wrapper wrapper-content">
        {!! Form::open(['route' => 'admin.settings.update', 'enctype' => 'multipart/form-data', 'method' => 'post', 'id' => 'settingsForm']) !!}
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>General Info</h5>
                    </div>
                    <div class="ibox-content">
                        @include('admin.settings.partials.form')
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
    @include('admin.settings.partials.script')
@endpush
