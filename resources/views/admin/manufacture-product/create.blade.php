@extends('admin.layouts.layout')

@push('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
{{--    <link type="text/css" rel="stylesheet" href="{{ asset() }}aksFileUpload.min.css">--}}

@endpush

@section('title', 'Create a product')

@section('content')
    @include('admin.common.breadcrumbs', [
    'title'=> 'Create',
    'panel'=> 'product',
    ])


    <div class="wrapper wrapper-content animated fadeInRight ecommerce">
        {!! Form::open(['route' => 'admin.manufacture-product.store', 'enctype' => 'multipart/form-data', 'method' => 'post', 'id' => 'produtForm']) !!}
        <div class="row">
            <div class="col-lg-8">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li><a class="nav-link active show" data-toggle="tab" href="#tab-1"> Product info</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#tab-2"> Price</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#tab-4"> Images</a></li>
                    </ul>
                    <div class="tab-content">
                        @include('admin.manufacture-product.partials.form')
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
            @include('admin.manufacture-product.partials.form.right')
        </div>
        @includeIf('admin.common.action')
        {!! Form::close() !!}
    </div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="{{ asset('assets/admin/css/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/admin/js/plugins/validate/jquery.validate.min.js') }}"></script>
    <!-- SUMMERNOTE -->
    <script src="{{ asset('assets/admin/js/plugins/summernote/summernote-bs4.js') }}"></script>
    @include('admin.product.partials.script')
    <script>
        $(document).ready(function() {
            $('.tag-select-multiple').select2({
                placeholder: "Select a tag",
                allowClear: true
            });

            $('.product-type-select-multiple').select2({
                placeholder: "Select a product type",
                allowClear: true
            });


            // $('#frame').attr('src',URL.createObjectURL(event.target.files[0]));


            function imgToData(input) {
                // console.log(input.files.length)
                var i;
                for (i = 0; i < input.files.length; i++) {
                    if (input.files && input.files[i]) {
                        var File = new FileReader();
                        var $this = i;
                        console.log($this);
                        File.onload = function ($this) {
                            console.log($this);
                            var Img = new Image();
                            Img.onload = function (i) {
                                // $('#' + input.id + '-val').val(Img.src);
                                // $('#' + input.id + '-preview').attr('src', Img.src).css('visibility', 'visible').fadeIn();
                                $('._img-preview').append("<p>dslaj</p>")
                            };
                            Img.src = File.result;
                        };

                        // File.readAsDataURL(input.files[0]);
                    }
                }
            }

            $("input[type='file']").each(function() {
                $(this).change(function() {
                    if (parseInt($(this).get(0).files.length) > 3) {
                        alert("You can only upload a maximum of 3 images");
                    } else {
                        imgToData(this);
                    }
                });
            });





        });
    </script>

@endpush
