@extends('admin.layouts.layout')

@push('style')
@endpush

@section('title', 'Create a category')

@section('content')
    @include('admin.common.breadcrumbs', [
        'title'=> 'Create',
        'panel'=> 'user',
    ])

    <div class="wrapper wrapper-content">
        {!! Form::open(['route' => 'admin.user.store', 'enctype' => 'multipart/form-data', 'method' => 'post', 'id' => 'userForm']) !!}
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>General Info</h5>
                    </div>
                    <div class="ibox-content">
                        @include('admin.user.partials.form')
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
    @include('admin.user.partials.script')
@endpush
