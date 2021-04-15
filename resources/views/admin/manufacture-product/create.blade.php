@extends('admin.layouts.layout')

@push('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style type="text/css">

        input[type="file"] {
            display: block;
        }
        .imageThumb {
            max-height: 75px;
            border: 2px solid;
            padding: 1px;
            cursor: pointer;
        }
        .pip {
            display: inline-block;
            margin: 10px 10px 0 0;
        }
        .single {
            display: inline-block;
            margin: 10px 10px 0 0;
        }
        .remove {
            display: block;
            background: #444;
            border: 1px solid black;
            color: white;
            text-align: center;
            cursor: pointer;
        }
        .remove:hover {
            background: white;
            color: black;
        }
    </style>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('.tag-select-multiple').select2({
                placeholder: "Select a tag",
                allowClear: true
            });

            $('.product-type-select-multiple').select2({
                placeholder: "Select a product type",
                allowClear: true
            });



            if (window.File && window.FileList && window.FileReader) {
                $("#files").on("change", function(e) {
                    var files = e.target.files,
                        filesLength = files.length;
                    console.log(files)
                    for (var i = 0; i < filesLength; i++) {
                        var f = files[i]
                        var fileReader = new FileReader();
                        fileReader.onload = (function(e) {
                            var file = e.target;

                            $("<span class=\"pip\">" +
                                "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                                "<br/><span class=\"remove\">Remove image</span>" +
                                "</span>").insertAfter("#files");

                            $(".remove").click(function(){
                                $(this).parent(".pip").remove();
                                console.log(files)

                            });
                        });
                        fileReader.readAsDataURL(f);
                    }
                });
            } else {
                alert("Your browser doesn't support to File API")
            }

            if (window.File && window.FileList && window.FileReader) {
                $("#mainImg").on("change", function(e) {
                    var files = e.target.files,
                        filesLength = files.length;
                    for (var i = 0; i < filesLength; i++) {
                        var f = files[i]
                        var fileReader = new FileReader();
                        fileReader.onload = (function(e) {
                            var file = e.target;
                            $("<span class=\"single\">" +
                                "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                                "</span>").insertAfter("#mainImg");
                        });
                        fileReader.readAsDataURL(f);
                    }
                });
            } else {
                alert("Your browser doesn't support to File API")
            }




        });
    </script>

@endpush
