@extends('admin.layouts.layout')

@push('style')
    <link href="{{ asset('dist/css/plugin.css') }}" rel="stylesheet">
@endpush

@section('title', 'Edit a category')

@section('content')

    @include('admin.common.breadcrumbs', [
        'title'=> 'Edit',
        'panel'=> 'tag',
        'id'=> $data['row']->id,
    ])

    <div class="wrapper wrapper-content">
        {!! Form::model($data['row'],['route' => ['admin.tag.update',$data['row']->id], 'enctype' => 'multipart/form-data', 'method' => 'put', 'id' => 'tagForm']) !!}
        {!! Form::hidden('id', $data['row']->id) !!}
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>General Info</h5>
                    </div>
                    <div class="ibox-content">
                        @includeIf('admin.tag.partials.form')
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
    @include('admin.tag.partials.script')
@endpush
