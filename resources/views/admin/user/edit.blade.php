@extends('admin.layouts.layout')

@push('style')
    <link href="{{ asset('dist/css/plugin.css') }}" rel="stylesheet">
@endpush

@section('title', 'Edit a Profile')

@section('content')

    @include('admin.common.breadcrumbs', [
        'title'=> 'Edit',
        'panel'=> 'Profile',
        'id'=> $data['row']->id,
    ])


    <div class="wrapper wrapper-content">
        {!! Form::model($data['row'],['route' => ['admin.user.update',$data['row']->id], 'enctype' => 'multipart/form-data', 'method' => 'put', 'id' => 'userForm']) !!}
        {!! Form::hidden('id', $data['row']->id) !!}
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>General Info</h5>
                    </div>
                    <div class="ibox-content user-role-{{ $data['row']->id }}">
                        @includeIf('admin.user.partials.form')
                    </div>
                </div>
            </div>

        </div>
        @includeIf('admin.common.action')
        {!! Form::close() !!}
    </div>

@endsection

@push('js')
    <script src="{{ asset('dist/js/plugin.js') }}"></script>
    @include('admin.user.partials.script')
@endpush
