@extends('admin.layouts.layout')

@push('style')
    <link href="{{ asset('dist/css/plugin.css') }}" rel="stylesheet">
@endpush

@section('title', 'Edit a product')

@section('content')

    @include('admin.common.breadcrumbs', [
    'title'=> 'Edit',
    'panel'=> 'product',
    'id'=> $data['row']->id,
    ])

    <div class="wrapper wrapper-content">
        {!! Form::model($data['row'], ['route' => ['admin.product.update', $data['row']->id], 'enctype' => 'multipart/form-data', 'method' => 'put', 'id' => 'productForm']) !!}
        {!! Form::hidden('id', $data['row']->id) !!}
        <div class="row">
            <div class="col-lg-8">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li><a class="nav-link active show" data-toggle="tab" href="#tab-1"> Product info</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#tab-2"> Price</a></li>
                        {{-- <li><a class="nav-link" data-toggle="tab" href="#tab-3"> Category/Tags</a></li> --}}
                        <li><a class="nav-link" data-toggle="tab" href="#tab-4"> Images</a></li>
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
                            <label for="inactive"> {!! Form::radio('status', 0, false, ['id' => 'inactive']) !!} <i></i> Inactive </label>
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
                            $selected_category = $data['row']->category_id;
                            $selected_category = json_decode($selected_category);
                            ?>
                            @foreach ($categorys as $i => $item)
                                <div>
                                    <?php if (is_array($selected_category)) { ?>
                                    <input class="" <?php echo in_array($i, $selected_category)
                                        ? 'checked="checked"' : '' ; ?> name="category_id[]" type="checkbox"
                                        value="{{ $i }}">
                                    <?php } else { ?>
                                    <input class="" name="category_id[]" type="checkbox" value="{{ $i }}">
                                    <?php } ?>
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
                            $selected_tags = $data['row']->tag_id;
                            $selected_tags = json_decode($selected_tags);

                            //print_r($selected_tags);
                            ?>
                            {{-- {{ $tags }} --}}
                            @foreach ($tags as $i => $item)
                                <div>
                                    <?php if (is_array($selected_tags)) { ?>
                                    <input class="" <?php echo in_array($i, $selected_tags)
                                        ? 'checked="checked"' : '' ; ?> name="tag_id[]" type="checkbox"
                                        value="{{ $i }}">
                                    <?php } else { ?>
                                    <input class="" name="tag_id[]" type="checkbox" value="{{ $i }}">
                                    <?php } ?>
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
                                    <label class="has-error"
                                        for="is_featured">{{ $errors->first('is_featured') }}</label>
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
                            <?php
                            $selected_attributes = $data['row']->attributes;
                            $selected_attributes = json_decode($selected_attributes);

                            //print_r($selected_attributes);
                            ?>
                            @foreach ($color as $i => $item)
                                <div>
                                    <?php if (is_array($selected_attributes)) { ?>
                                    <input class="" <?php echo in_array($i, $selected_attributes)
                                        ? 'checked="checked"' : '' ; ?> name="color_id[]" type="checkbox"
                                        value="{{ $i }}">
                                    <?php } else { ?>
                                    <input class="" name="color_id[]" type="checkbox" value="{{ $i }}">
                                    <?php } ?>
                                    {{-- {!! Form::checkbox('color_id[]', $i, null, ['class' => '']) !!} --}}
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
                                    <?php if (is_array($selected_attributes)) { ?>
                                    <input class="" <?php echo in_array($i, $selected_attributes)
                                        ? 'checked="checked"' : '' ; ?> name="color_id[]" type="checkbox"
                                        value="{{ $i }}">
                                    <?php } else { ?>
                                    <input class="" name="color_id[]" type="checkbox" value="{{ $i }}">
                                    <?php } ?>
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
    <script src="{{ asset('dist/js/plugin.js') }}"></script>
    <link href="{{ asset('assets/admin/css/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/admin/js/plugins/validate/jquery.validate.min.js') }}"></script>
    <!-- SUMMERNOTE -->
    <script src="{{ asset('assets/admin/js/plugins/summernote/summernote-bs4.js') }}"></script>
    @include('admin.product.partials.script')
@endpush
