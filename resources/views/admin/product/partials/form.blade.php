<div id="tab-1" class="tab-pane active show">
    <div class="panel-body">
        <fieldset>
            <div class="form-group row"><label class="col-sm-3 col-form-label">Name:</label>
                <div class="col-sm-9 {{ $errors->has('title') ? 'has-error' : '' }}">
                    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Product name', 'required' => 'required']) !!}
                    @if ($errors->has('title'))
                        <label class="has-error" for="title">{{ $errors->first('title') }}</label>
                    @endif
                </div>
            </div>
            {{-- <div class="form-group row"><label class="col-sm-3 col-form-label">SKU:</label>
                <div class="col-sm-9 {{ $errors->has('sku') ? 'has-error' : '' }}">
                    {!! Form::text('sku', null, ['class' => 'form-control', 'placeholder' => 'Unique ID']) !!}
                    @if ($errors->has('sku'))
                        <label class="has-error" for="sku">{{ $errors->first('sku') }}</label>
                    @endif
                </div>
            </div> --}}
            <div class="form-group row"><label class="col-sm-3 col-form-label">Model:</label>
                <div class="col-sm-9 {{ $errors->has('model') ? 'has-error' : '' }}">
                    {!! Form::text('model', null, ['class' => 'form-control', 'placeholder' => 'Product Model']) !!}
                    @if ($errors->has('model'))
                        <label class="has-error" for="model">{{ $errors->first('model') }}</label>
                    @endif
                </div>
            </div>

            <div class="form-group row"><label class="col-sm-3 col-form-label">Short description:</label>
                <div class="col-sm-9 {{ $errors->has('short_description') ? 'has-error' : '' }}">
                    {!! Form::textarea('short_description', null, ['class' => 'form-control summernote']) !!}
                    @if ($errors->has('short_description'))
                        <label class="has-error"
                            for="short_description">{{ $errors->first('short_description') }}</label>
                    @endif
                </div>
            </div>

            {{-- <div class="form-group row"><label class="col-sm-2 col-form-label">Price:</label>
                <div class="col-sm-10 {{ $errors->has('title') ? 'has-error' : '' }}">
                    {!! Form::number('title', null, ['class' => 'form-control', 'placeholder' => '160.00']) !!}
                    @if ($errors->has('title'))
                        <label class="has-error" for="title">{{ $errors->first('title') }}</label>
                    @endif
                </div>
            </div> --}}
            <div class="form-group row"><label class="col-sm-3 col-form-label">Description:</label>
                <div class="col-sm-9 {{ $errors->has('description') ? 'has-error' : '' }}">
                    {!! Form::textarea('description', null, ['class' => 'form-control summernote']) !!}
                    @if ($errors->has('description'))
                        <label class="has-error" for="description">{{ $errors->first('description') }}</label>
                    @endif
                </div>
            </div>
            <div class="form-group row"><label class="col-sm-3 col-form-label">Price break down:</label>
                <div class="col-sm-9 {{ $errors->has('price_break_down') ? 'has-error' : '' }}">
                    {!! Form::textarea('price_break_down', null, ['class' => 'form-control summernote']) !!}
                    @if ($errors->has('price_break_down'))
                        <label class="has-error"
                            for="price_break_down">{{ $errors->first('price_break_down') }}</label>
                    @endif
                </div>
            </div>
            <div class="form-group row"><label class="col-sm-3 col-form-label">In Stock:</label>
                <div class="col-sm-9 {{ $errors->has('in_stock') ? 'has-error' : '' }}">
                    {!! Form::checkbox('in_stock', 1, null, ['class' => '']) !!}
                    @if ($errors->has('short_description'))
                        <label class="has-error" for="in_stock">{{ $errors->first('in_stock') }}</label>
                    @endif
                </div>
            </div>
            <div class="form-group row"><label class="col-sm-3 col-form-label">Stock quantity:</label>
                <div class="col-sm-9 {{ $errors->has('stock_qty') ? 'has-error' : '' }}">
                    {!! Form::number('stock_qty', null, ['class' => 'form-control ']) !!}
                    @if ($errors->has('stock_qty'))
                        <label class="has-error" for="stock_qty">{{ $errors->first('stock_qty') }}</label>
                    @endif
                </div>
            </div>
        </fieldset>

    </div>
</div>
<div id="tab-2" class="tab-pane">
    <div class="panel-body">

        <fieldset>
    {{-- {{ $role }} --}}
            <?php if($role=='3' || $role=='1'){?>
            <div class="form-group row"><label class="col-sm-3 col-form-label">Regular Price:</label>
                <div class="col-sm-9 {{ $errors->has('regular_price') ? 'has-error' : '' }}">
                    {!! Form::text('regular_price', null, ['class' => 'form-control', 'placeholder' => '99.99', 'step' => '.01']) !!}
                    @if ($errors->has('regular_price'))
                        <label class="has-error" for="regular_price">{{ $errors->first('regular_price') }}</label>
                    @endif
                </div>
            </div>
            <div class="form-group row"><label class="col-sm-3 col-form-label">Sale Price:</label>
                <div class="col-sm-9 {{ $errors->has('sale_price') ? 'has-error' : '' }}">
                    {!! Form::text('sale_price', null, ['class' => 'form-control', 'placeholder' => '99.99', 'step' => '.01']) !!}
                    @if ($errors->has('sale_price'))
                        <label class="has-error" for="sale_price">{{ $errors->first('sale_price') }}</label>
                    @endif
                </div>
            </div>
            <?php } ?>
            <?php if($role=='2' || $role=='1'){?>
            <div class="form-group row"><label class="col-sm-3 col-form-label">Regular Wholesale Price:</label>
                <div class="col-sm-9 {{ $errors->has('regular_wholesale_price') ? 'has-error' : '' }}">
                    {!! Form::text('regular_wholesale_price', null, ['class' => 'form-control', 'placeholder' => '99.99', 'step' => '.01']) !!}
                    @if ($errors->has('regular_wholesale_price'))
                        <label class="has-error"
                            for="regular_wholesale_price">{{ $errors->first('regular_wholesale_price') }}</label>
                    @endif
                </div>
            </div>
            <div class="form-group row"><label class="col-sm-3 col-form-label">Sale Wholesale Price:</label>
                <div class="col-sm-9 {{ $errors->has('sale_wholesale_price') ? 'has-error' : '' }}">
                    {!! Form::text('sale_wholesale_price', null, ['class' => 'form-control', 'placeholder' => '99.99', 'step' => '.01']) !!}
                    @if ($errors->has('sale_wholesale_price'))
                        <label class="has-error"
                            for="sale_wholesale_price">{{ $errors->first('sale_wholesale_price') }}</label>
                    @endif
                </div>
            </div>
            <?php } ?>
        </fieldset>

    </div>
</div>

<div id="tab-4" class="tab-pane">
    <div class="panel-body">
        <fieldset>
            <label>Feature Image: </label>
            <?php if (isset($data['row']->main_image)) {
            $display = 'display:none';
            } else {
            $display = 'display:block';
            } ?>
            <div class="form-group upload-image" style="<?php echo $display; ?>">
                <label for="image">Choose Image</label>
                {!! Form::file('image', null, ['class' => 'form-control']) !!}
                {{-- <input id="image" type="file" name="image"> --}}

            </div>
            @if (isset($data['row']->main_image))
                <div>
                    <img src="{{ $data['row']->main_image }}" alt="..." class="img-fluid" style="width: 300px;">
                    <a href="#" class="remove-image">Remove Image</a>
                </div>
            @endif
            <div class="form-group mt-2">
            <label>Gallery Image: </label>
            <input type="file" name="gallery[]" multiple>
            @if (isset($data['row']->gallery_image))
                {{-- {{ $data['row']->gallery_image }} --}}
                @foreach (json_decode($data['row']->gallery_image) as $item)
                    <div class="">
                        <img src="{{ $item }}" alt="..." class="img-fluid" style="width: 300px;">
                        <a href="#" class="remove-image">Remove Image</a>
                    </div>
                @endforeach
                <div>

                </div>
            @endif
        </div>
        </fieldset>
        <div class="table-responsive">
            <table class="table table-bordered table-stripped">
                <thead>
                    <tr>
                        <th>
                            Image preview
                        </th>
                        <th>
                            Image url
                        </th>
                        <th>
                            Sort order
                        </th>
                        <th>
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <img src="img/gallery/2s.jpg">
                        </td>
                        <td>
                            <input type="text" class="form-control" disabled
                                value="http://mydomain.com/images/image1.png">
                        </td>
                        <td>
                            <input type="text" class="form-control" value="1">
                        </td>
                        <td>
                            <button class="btn btn-white"><i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="img/gallery/1s.jpg">
                        </td>
                        <td>
                            <input type="text" class="form-control" disabled
                                value="http://mydomain.com/images/image2.png">
                        </td>
                        <td>
                            <input type="text" class="form-control" value="2">
                        </td>
                        <td>
                            <button class="btn btn-white"><i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="img/gallery/3s.jpg">
                        </td>
                        <td>
                            <input type="text" class="form-control" disabled
                                value="http://mydomain.com/images/image3.png">
                        </td>
                        <td>
                            <input type="text" class="form-control" value="3">
                        </td>
                        <td>
                            <button class="btn btn-white"><i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="img/gallery/4s.jpg">
                        </td>
                        <td>
                            <input type="text" class="form-control" disabled
                                value="http://mydomain.com/images/image4.png">
                        </td>
                        <td>
                            <input type="text" class="form-control" value="4">
                        </td>
                        <td>
                            <button class="btn btn-white"><i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="img/gallery/5s.jpg">
                        </td>
                        <td>
                            <input type="text" class="form-control" disabled
                                value="http://mydomain.com/images/image5.png">
                        </td>
                        <td>
                            <input type="text" class="form-control" value="5">
                        </td>
                        <td>
                            <button class="btn btn-white"><i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="img/gallery/6s.jpg">
                        </td>
                        <td>
                            <input type="text" class="form-control" disabled
                                value="http://mydomain.com/images/image6.png">
                        </td>
                        <td>
                            <input type="text" class="form-control" value="6">
                        </td>
                        <td>
                            <button class="btn btn-white"><i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="img/gallery/7s.jpg">
                        </td>
                        <td>
                            <input type="text" class="form-control" disabled
                                value="http://mydomain.com/images/image7.png">
                        </td>
                        <td>
                            <input type="text" class="form-control" value="7">
                        </td>
                        <td>
                            <button class="btn btn-white"><i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>
<div id="tab-5" class="tab-pane">
    <div class="panel-body">

        <fieldset>
    {{-- {{ $role }} --}}
            <div class="form-group row"><label class="col-sm-3 col-form-label">SEO Title:</label>
                <div class="col-sm-9 {{ $errors->has('seo_title') ? 'has-error' : '' }}">
                    {!! Form::text('seo_title', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                    @if ($errors->has('seo_title'))
                        <label class="has-error" for="seo_title">{{ $errors->first('seo_title') }}</label>
                    @endif
                </div>
            </div>
            <div class="form-group row"><label class="col-sm-3 col-form-label">Sale Description:</label>
                <div class="col-sm-9 {{ $errors->has('seo_description') ? 'has-error' : '' }}">
                    {!! Form::text('seo_description', null, ['class' => 'form-control', 'placeholder' => ' ']) !!}
                    @if ($errors->has('seo_description'))
                        <label class="has-error" for="seo_description">{{ $errors->first('seo_description') }}</label>
                    @endif
                </div>
            </div>
            <div class="form-group row"><label class="col-sm-3 col-form-label">Sale Tags:</label>
                <div class="col-sm-9 {{ $errors->has('seo_keyword') ? 'has-error' : '' }}">
                    {!! Form::text('seo_keyword', null, ['class' => 'form-control', 'placeholder' => ' ']) !!}
                    @if ($errors->has('seo_keyword'))
                        <label class="has-error" for="seo_keyword">{{ $errors->first('seo_keyword') }}</label>
                    @endif
                </div>
            </div>

        </fieldset>

    </div>
</div>
