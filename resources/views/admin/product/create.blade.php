@extends('admin.layouts.layout')

@push('style')
@endpush

@section('title', 'Create a product')

@section('content')
    @include('admin.common.breadcrumbs', [
    'title'=> 'Create',
    'panel'=> 'product',
    ])


    <div class="wrapper wrapper-content animated fadeInRight ecommerce">
        {!! Form::open(['route' => 'admin.product.store', 'enctype' => 'multipart/form-data', 'method' => 'post', 'id' => 'produtForm']) !!}
        <div class="row">
            <div class="col-lg-8">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li><a class="nav-link active show" data-toggle="tab" href="#tab-1"> Product info</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#tab-2"> Price</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#tab-4"> Images</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#tab-5"> SEO</a></li>
                    </ul>
                    <div class="tab-content">
                        @include('admin.product.partials.form')
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
            </div>
            <div class="col-lg-4">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Category</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="col-sm-12 {{ $errors->has('category_id') ? 'has-error' : '' }}">
                            <?php
                            // $saved_working_days = [
                            // // 1 => 'Uncategories',
                            // // 2 => 'Test Category',
                            // // 3 => 'shose',
                            // ];
                            // print_r($saved_working_days);
                            ?>
                            {{-- {{ $categorys }} --}}
                            @foreach ($categorys as $i => $item)
                                <div>

                                    {!! Form::checkbox('category_id[]', $i, null, ['class' => '']) !!}
                                    {!! Form::label($item, $item) !!}
                                </div>
                            @endforeach
                            @if ($errors->has('category_id'))
                                <label class="has-error" for="category_id">{{ $errors->first('category_id') }}</label>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Tags</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="col-sm-12 {{ $errors->has('tag_id') ? 'has-error' : '' }}">
                            <?php
                            // $saved_working_days = [
                            // 1 => 'Uncategories',
                            // 2 => 'Test Category',
                            // 3 => 'shose',
                            // ];
                            // print_r($saved_working_days);
                            ?>
                            {{-- {{ $tags }} --}}
                            @foreach ($tags as $i => $item)
                                <div>

                                    {!! Form::checkbox('tag_id[]', $i, null, ['class' => '']) !!}
                                    {!! Form::label($item, $item) !!}
                                </div>
                            @endforeach
                            @if ($errors->has('tag_id'))
                                <label class="has-error" for="tag_id">{{ $errors->first('tag_id') }}</label>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>General</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="col-sm-12 ">
                            <div class="form-group {{ $errors->has('on_sale') ? 'has-error' : '' }}">
                                {!! Form::checkbox('on_sale', 1, null, ['class' => '']) !!}
                                @if ($errors->has('on_sale'))
                                    <label class="has-error" for="on_sale">{{ $errors->first('on_sale') }}</label>
                                @endif
                                <label class=" ">On Sale</label>
                            </div>
                            <div class="form-group {{ $errors->has('is_featured') ? 'has-error' : '' }}">
                                {!! Form::checkbox('is_featured', 1, null, ['class' => '']) !!}
                                @if ($errors->has('is_featured'))
                                    <label class="has-error" for="is_featured">{{ $errors->first('is_featured') }}</label>
                                @endif
                                <label class="">Featured</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ibox ">
                    <h5>Attributes</h5>
                    <div class="ibox-title">
                        <h5>Color</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="col-sm-12 ">
                            @foreach ($color as $i => $item)
                                <div>
                                    {!! Form::checkbox('color_id[]', $i, null, ['class' => '']) !!}
                                    {!! Form::label($item, $item) !!}
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="ibox-title">
                        <h5>Size</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="col-sm-12 ">
                            @foreach ($size as $i => $item)
                                <div>
                                    {!! Form::checkbox('size_id[]', $i, null, ['class' => '']) !!}
                                    {!! Form::label($item, $item) !!}
                                </div>
                            @endforeach

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
    <link href="{{ asset('assets/admin/css/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/admin/js/plugins/validate/jquery.validate.min.js') }}"></script>
    <!-- SUMMERNOTE -->
    <script src="{{ asset('assets/admin/js/plugins/summernote/summernote-bs4.js') }}"></script>
    @include('admin.product.partials.script')

@endpush
