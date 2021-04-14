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

            <div class="form-group row"><label class="col-sm-3 col-form-label">Model Number:</label>
                <div class="col-sm-9 {{ $errors->has('model_number') ? 'has-error' : '' }}">
                    {!! Form::text('model_number', null, ['class' => 'form-control', 'placeholder' => 'Product Model']) !!}
                    @if ($errors->has('model_number'))
                        <label class="has-error" for="model">{{ $errors->first('model_number') }}</label>
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

            <div class="form-group row"><label class="col-sm-3 col-form-label">Description:</label>
                <div class="col-sm-9 {{ $errors->has('description') ? 'has-error' : '' }}">
                    {!! Form::textarea('description', null, ['class' => 'form-control summernote']) !!}
                    @if ($errors->has('description'))
                        <label class="has-error" for="description">{{ $errors->first('description') }}</label>
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

            <div class="form-group {{ $errors->has('on_sale') ? 'has-error' : '' }}">
                {!! Form::checkbox('on_sale', 1, null, ['class' => '']) !!}
                @if ($errors->has('on_sale'))
                    <label class="has-error" for="on_sale">{{ $errors->first('on_sale') }}</label>
                @endif
                <label class=" ">On Sale</label>
            </div>

            <div class="form-group row"><label class="col-sm-3 col-form-label">Stock quantity:</label>
                <div class="col-sm-9 {{ $errors->has('qty') ? 'has-error' : '' }}">
                    {!! Form::number('qty', null, ['class' => 'form-control ']) !!}
                    @if ($errors->has('qty'))
                        <label class="has-error" for="stock_qty">{{ $errors->first('qty') }}</label>
                    @endif
                </div>
            </div>
        </fieldset>

    </div>
</div>
