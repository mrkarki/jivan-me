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
{{--                {!! Form::file('image', null, ['class' => 'form-control']) !!}--}}
                {{-- <input id="image" type="file" name="image"> --}}
{{--                <input type="file" id="img-1" multiple/>--}}
            </div>


            <div>
                <input type="file" id="img-1" multiple/>
                <input type="text" id="img-1-val" />
                <img id="img-1-preview" width="200" height="200" />
                <div class="_img-preview"></div>
            </div>



        </fieldset>
        <div class="table-responsive">
            <table class="table table-bordered table-stripped">
                <thead>
                <tr>
                    <th>Image preview</th>
                    <th>make main image</th>
                    <th>Sort order</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <img id="frame">
                    </td>
                    <td>
                        <label for="active">
                            {!! Form::radio('main_image[]', 1, null, ['id' => 'active']) !!} <i></i>
                        </label>

                    </td>
                    <td>
                        <input type="text" class="form-control" value="1">
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
