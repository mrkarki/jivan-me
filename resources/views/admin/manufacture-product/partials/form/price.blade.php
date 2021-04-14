<div id="tab-2" class="tab-pane">
    <div class="panel-body">

        <fieldset>
            {{-- {{ $role }} --}}
            <?php if($role=='3' || $role=='1'){?>
            <div class="form-group row"><label class="col-sm-3 col-form-label">Regular Price:</label>
                <div class="col-sm-9 {{ $errors->has('regular_price') ? 'has-error' : '' }}">
                    {!! Form::number('regular_price', null, ['class' => 'form-control', 'placeholder' => '99.99', 'min' => '1']) !!}
                    @if ($errors->has('regular_price'))
                        <label class="has-error" for="regular_price">{{ $errors->first('regular_price') }}</label>
                    @endif
                </div>
            </div>
            <div class="form-group row"><label class="col-sm-3 col-form-label">Discount Type: </label>
                <div class="col-sm-9 {{ $errors->has('discount_type') ? 'has-error' : '' }}">
                    <select name="discount_type" class="form-control" id="discount_type">
                        <option value="">Select Discount Type</option>
                        <option value="percentage">%</option>
                        <option value="rs">Rs</option>
                    </select>
                    @if ($errors->has('discount_type'))
                        <label class="has-error" for="discount_type">{{ $errors->first('discount_type') }}</label>
                    @endif
                </div>
            </div>
            <div class="form-group row"><label class="col-sm-3 col-form-label">Discount: </label>
                <div class="col-sm-9 {{ $errors->has('discount') ? 'has-error' : '' }}">
                    {!! Form::number('discount', null, ['class' => 'form-control', 'placeholder' => '99.99', 'min' => '1']) !!}
                    @if ($errors->has('discount'))
                        <label class="has-error" for="discount">{{ $errors->first('discount') }}</label>
                    @endif
                </div>
            </div>
            <?php } ?>
            <?php if($role=='2' || $role=='1'){?>
            <div class="form-group row">
                <div class="col-md-7 row">
                    <label class="col-sm-5 col-form-label">Group Price One:</label>
                    <div class="col-sm-7 {{ $errors->has('group_price_one') ? 'has-error' : '' }}">
                        {!! Form::number('group_price_one', null, ['class' => 'form-control', 'placeholder' => '99.99', 'min' => '1']) !!}
                        @if ($errors->has('group_price_one'))
                            <label class="has-error"
                                   for="group_price_one">{{ $errors->first('group_price_one') }}</label>
                        @endif
                    </div>
                </div>
                <div class="col-md-5 row">
                    <label class="col-sm-3 col-form-label">Qty:</label>
                    <div class="col-sm-9 {{ $errors->has('group_price_one_qty') ? 'has-error' : '' }}">
                        {!! Form::number('group_price_one_qty', null, ['class' => 'form-control', 'placeholder' => '99.99', 'min' => '1']) !!}
                        @if ($errors->has('group_price_one_qty'))
                            <label class="has-error"
                                   for="group_price_one">{{ $errors->first('group_price_one_qty') }}</label>
                        @endif
                    </div>
                </div>

            </div>

            <div class="form-group row">
                <div class="col-md-7 row">
                    <label class="col-sm-5 col-form-label">Group Price Two:</label>
                    <div class="col-sm-7 {{ $errors->has('group_price_two') ? 'has-error' : '' }}">
                        {!! Form::number('group_price_two', null, ['class' => 'form-control', 'placeholder' => '99.99', 'min' => '1']) !!}
                        @if ($errors->has('group_price_two'))
                            <label class="has-error"
                                   for="group_price_one">{{ $errors->first('group_price_two') }}</label>
                        @endif
                    </div>
                </div>
                <div class="col-md-5 row">
                    <label class="col-sm-3 col-form-label">Qty:</label>
                    <div class="col-sm-9 {{ $errors->has('group_price_two_qty') ? 'has-error' : '' }}">
                        {!! Form::number('group_price_two_qty', null, ['class' => 'form-control', 'placeholder' => '99.99', 'min' => '1',]) !!}
                        @if ($errors->has('group_price_two_qty'))
                            <label class="has-error"
                                   for="group_price_one">{{ $errors->first('group_price_two_qty') }}</label>
                        @endif
                    </div>
                </div>

            </div>
            <?php } ?>
        </fieldset>

    </div>
</div>
