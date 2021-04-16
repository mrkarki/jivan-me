@extends('admin.layouts.layout')

@push('style')
@endpush

@section('title', 'Create a Page')

@section('content')
    @include('admin.common.breadcrumbs', [
        'title'=> 'index',
        'panel'=> 'page',
    ])

    <div class="wrapper wrapper-content">
        {!! Form::open(['route' => 'admin.page.update', 'enctype' => 'multipart/form-data', 'method' => 'post', 'id' => 'pageForm']) !!}
        <div class="row">
            <div class="col-lg-12">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li><a class="nav-link active show" data-toggle="tab" href="#tab-1">About Us</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#tab-2">Contact Us</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#tab-3"> Privacy Policy</a></li>
                    </ul>
                    @include('admin.page.partials.form')
            </div>
                {{-- <div class="ibox ">
                    <div class="ibox-title">
                        <h5>General Info</h5>
                    </div>
                    <div class="ibox-content">

                    </div>
                </div> --}}
            </div>
        </div>
        @includeIf('admin.common.action')
        {!! Form::close() !!}
    </div>
@endsection

@push('js')
<link href="{{ asset('assets/admin/css/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/admin/js/plugins/validate/jquery.validate.min.js') }}"></script>
    <!-- SUMMERNOTE -->
    <script src="{{ asset('assets/admin/js/plugins/summernote/summernote-bs4.js') }}"></script>

    @include('admin.page.partials.script')
@endpush
