<div class="col-lg-4">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>Category</h5>
        </div>
        <div class="ibox-content">
            <div class="col-sm-12 {{ $errors->has('category_id') ? 'has-error' : '' }}">

                @if(isset($data['parentChild']))
                @foreach ($data['parentChild'] as $key => $item)
                <div>
                <p>{!! Form::checkbox('category_id[]', $item['id'],null, ['class' => '']) !!}
                    <b>{{ $item['title'] }}</b></p>
                    @if(isset($item['child']))
                    @foreach ($item['child'] as $childKey => $child)
                        {!! Form::checkbox('category_id[]', $child['id'],null, ['class' => '']) !!}
                        {!! Form::label($child['title'], $child['title']) !!}
                    @endforeach
                    @endif
                </div>
                @endforeach
                @endif
                @if ($errors->has('category_id'))
                    <label class="has-error" for="category_id">{{ $errors->first('category_id') }}</label>
                @endif
            </div>
        </div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="form-group row">
        <label class="col-sm-12 col-form-label is_required">Tag <span class="required">*</span></label>
        <div class="col-sm-12 {{ $errors->has('tag') ? 'has-error' : '' }}">
            {!! Form::select('tags[]', $data['tags'], null, [ 'class' => 'form-control text-capitalize tag-select-multiple', 'multiple' =>'multiple', ]) !!}
            @if($errors->has('tags'))
                <label class="has-error" for="tags">{{ $errors->first('tags') }}</label>
            @endif
        </div>
    </div>
    <div class="ibox ">
        <div class="ibox-title">
            <h5>Type</h5>
        </div>
        <div class="ibox-content">
            <div class="col-sm-12 ">
                <div class="form-group ">
                    {!! Form::select('product_type', $data['product_type'], null, [ 'class' => 'form-control text-capitalize product-type-select-multiple', 'placeholder' => 'Select Post Type', ]) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="ibox ">
        <h5>Attributes</h5>
        @if(isset($data['product_attributes']['color']) && count($data['product_attributes']['color']))
            <div class="ibox-title">
                <h5>Color</h5>
            </div>
            <div class="ibox-content">
                <div class="col-sm-12 ">

                    @foreach ($data['product_attributes']['color'] as $i => $item)
                    <div>
                        {!! Form::checkbox('color_id[]',$item['id'], null, ['class' => '']) !!}
                        {!! Form::label($item['name'], $item['name']) !!}
                    </div>
                    @endforeach

                </div>
            </div>
        @endif

        @if(isset($data['product_attributes']['size']) && count($data['product_attributes']['size']))
        <div class="ibox-title">
            <h5>Size</h5>
        </div>
        <div class="ibox-content">
            <div class="col-sm-12 ">
                @foreach ($data['product_attributes']['size'] as $i => $item)
                <div>
                    {!! Form::checkbox('size_id[]', $item['id'], null, ['class' => '']) !!}
                    {!! Form::label($item['name'], $item['name']) !!}
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
