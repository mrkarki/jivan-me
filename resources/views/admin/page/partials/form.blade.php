<?php
//dd($data);
?>
<div class="tab-content">
    <div id="tab-1" class="tab-pane active show">
        <div class="panel-body">
            <?php if (isset($data['about'])) {
                $about = $data['about'];
                $about = json_decode($about);
                } ?>
            <fieldset>
                <div class="form-group  row">
                    <label class="col-sm-2 col-form-label is_required"> Page Title </label>
                    <div class="col-sm-6 {{ $errors->has('content[about][title]') ? 'has-error' : '' }}">
                        {!! Form::text('content[about][title]', $about->title ?? '', ['class' => 'form-control']) !!}
                        @if ($errors->has('content[about][title]'))
                            <label class="has-error"
                                for="content[about][title]">{{ $errors->first('content[about][title]') }}</label>
                        @endif
                    </div>
                </div>
                <div class="form-group  row">
                    <label class="col-sm-2 col-form-label is_required">Content</label>
                    <div class="col-sm-6 {{ $errors->has('content[about][content]') ? 'has-error' : '' }}">
                        {!! Form::textarea('content[about][content]', $about->content ?? '', ['class' => 'form-control summernote']) !!}
                        @if ($errors->has('content[about][content]'))
                            <label class="has-error"
                                for="content[about][content]">{{ $errors->first('content[about][content]') }}</label>
                        @endif
                    </div>
                </div>
                <div class="form-group  row">
                    <label class="col-sm-2 col-form-label is_required">Image</label>
                    <div class="col-sm-6 {{ $errors->has('content[about][image]') ? 'has-error' : '' }}">
                        {!! Form::text('content[about][image]', $about->image ?? '', ['class' => 'form-control']) !!}
                        @if ($errors->has('content[about][image]'))
                            <label class="has-error"
                                for="content[about][image]">{{ $errors->first('content[about][image]') }}</label>
                        @endif
                    </div>
                </div>
            </fieldset>

        </div>
    </div>
    <div id="tab-2" class="tab-pane">
        <div class="panel-body">
            <?php if (isset($data['contact'])) {
            $contact = $data['contact'];
            $contact = json_decode($contact);
            } ?>
            <fieldset>
                <div class="form-group  row">
                    <label class="col-sm-2 col-form-label is_required">Page Title</label>
                    <div class="col-sm-6 {{ $errors->has('content[contact][title]') ? 'has-error' : '' }}">
                        {!! Form::text('content[contact][title]',$contact->title ?? '', ['class' => 'form-control']) !!}
                        @if ($errors->has('content[contact][title]'))
                            <label class="has-error"
                                for="content[contact][title]">{{ $errors->first('content[contact][title]') }}</label>
                        @endif
                    </div>
                </div>
                <div class="form-group  row">
                    <label class="col-sm-2 col-form-label is_required">Form Title <br> <small>use h4 and
                            h3</small></label>
                    <div class="col-sm-6 {{ $errors->has('content[contact][form_title]') ? 'has-error' : '' }}">
                        {!! Form::text('content[contact][form_title]', $contact->form_title ?? '', ['class' => 'form-control']) !!}
                        @if ($errors->has('content[contact][form_title]'))
                            <label class="has-error"
                                for="content[contact][form_title]">{{ $errors->first('content[contact][form_title]') }}</label>
                        @endif
                    </div>
                </div>
                <div class="form-group  row">
                    <label class="col-sm-2 col-form-label is_required">Call Us (Title)</label>
                    <div class="col-sm-6 {{ $errors->has('content[contact][call_title]') ? 'has-error' : '' }}">
                        {!! Form::text('content[contact][call_title]', $contact->call_title ?? '', ['class' => 'form-control']) !!}
                        @if ($errors->has('content[contact][call_title]'))
                            <label class="has-error"
                                for="content[contact][call_title]">{{ $errors->first('content[contact][call_title]') }}</label>
                        @endif
                    </div>
                </div>
                <div class="form-group  row">
                    <label class="col-sm-2 col-form-label is_required">Phone Numbers</label>
                    <div class="col-sm-6 {{ $errors->has('content[contact][phone_numbers]') ? 'has-error' : '' }}">
                        {!! Form::text('content[contact][phone_numbers]', $contact->phone_numbers ?? '', ['class' => 'form-control']) !!}
                        @if ($errors->has('content[contact][phone_numbers]'))
                            <label class="has-error"
                                for="content[contact][phone_numbers]">{{ $errors->first('content[contact][phone_numbers]') }}</label>
                        @endif
                    </div>
                </div>
                <div class="form-group  row">
                    <label class="col-sm-2 col-form-label is_required">Email (Title)</label>
                    <div class="col-sm-6 {{ $errors->has('content[contact][email]') ? 'has-error' : '' }}">
                        {!! Form::text('content[contact][email]', $contact->email ?? '', ['class' => 'form-control']) !!}
                        @if ($errors->has('content[contact][email]'))
                            <label class="has-error"
                                for="content[contact][email]">{{ $errors->first('content[contact][email]') }}</label>
                        @endif
                    </div>
                </div>
                <div class="form-group  row">
                    <label class="col-sm-2 col-form-label is_required">Emails</label>
                    <div class="col-sm-6 {{ $errors->has('content[contact][emails]') ? 'has-error' : '' }}">
                        {!! Form::text('content[contact][emails]', $contact->emails ?? '', ['class' => 'form-control']) !!}
                        @if ($errors->has('content[contact][emails]'))
                            <label class="has-error"
                                for="content[contact][emails]">{{ $errors->first('content[contact][emails]') }}</label>
                        @endif
                    </div>
                </div>
                <div class="form-group  row">
                    <label class="col-sm-2 col-form-label is_required">Our Address (Title)</label>
                    <div class="col-sm-6 {{ $errors->has('content[contact][address_title]') ? 'has-error' : '' }}">
                        {!! Form::text('content[contact][address_title]', $contact->address_title ?? '', ['class' => 'form-control']) !!}
                        @if ($errors->has('content[contact][address_title]'))
                            <label class="has-error"
                                for="content[contact][address_title]">{{ $errors->first('content[contact][address_title]') }}</label>
                        @endif
                    </div>
                </div>
                <div class="form-group  row">
                    <label class="col-sm-2 col-form-label is_required">Our Address details</label>
                    <div class="col-sm-6 {{ $errors->has('content[contact][address_details]') ? 'has-error' : '' }}">
                        {!! Form::text('content[contact][address_details]', $contact->address_details ?? '', ['class' => 'form-control']) !!}
                        @if ($errors->has('content[contact][address_details]'))
                            <label class="has-error"
                                for="content[contact][address_details]">{{ $errors->first('content[contact][address_details]') }}</label>
                        @endif
                    </div>
                </div>
                <div class="form-group  row">
                    <label class="col-sm-2 col-form-label is_required">Google map</label>
                    <div class="col-sm-6 {{ $errors->has('content[contact][google_map]') ? 'has-error' : '' }}">
                        {!! Form::text('content[contact][google_map]', $contact->google_map ?? '', ['class' => 'form-control']) !!}
                        @if ($errors->has('content[contact][google_map]'))
                            <label class="has-error"
                                for="content[contact][google_map]">{{ $errors->first('content[contact][google_map]') }}</label>
                        @endif
                    </div>
                </div>
            </fieldset>


        </div>
    </div>
    <div id="tab-3" class="tab-pane">
        <?php
            if(isset($data['privacy'])){
            $privacy = $data['privacy'];
            $privacy = json_decode($privacy);
            }
        ?>
        <div class="panel-body">
            <fieldset>
                <div class="form-group  row">
                    <label class="col-sm-2 col-form-label is_required"> Page Title </label>
                    <div class="col-sm-6 {{ $errors->has('content[privacy][title]') ? 'has-error' : '' }}">
                        {!! Form::text('content[privacy][title]', $privacy->title ?? '', ['class' => 'form-control']) !!}
                        @if ($errors->has('content[privacy][title]'))
                            <label class="has-error"
                                for="content[privacy][title]">{{ $errors->first('content[privacy][title]') }}</label>
                        @endif
                    </div>
                </div>
                <div class="form-group  row">
                    <label class="col-sm-2 col-form-label is_required">Content</label>
                    <div class="col-sm-6 {{ $errors->has('content[privacy][content]') ? 'has-error' : '' }}">
                        {!! Form::textarea('content[privacy][content]', $privacy->content ?? '', ['class' => 'form-control summernote']) !!}
                        @if ($errors->has('content[privacy][content]'))
                            <label class="has-error"
                                for="content[privacy][content]">{{ $errors->first('content[privacy][content]') }}</label>
                        @endif
                    </div>
                </div>
            </fieldset>

        </div>
    </div>
    <div id="tab-4" class="tab-pane">
        <div class="panel-body">


        </div>
    </div>
</div>
