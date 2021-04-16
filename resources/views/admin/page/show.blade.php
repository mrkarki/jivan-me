@extends('admin.layouts.layout')

@push('style')

@endpush

@section('title', 'category')

@section('content')

@include('admin.common.breadcrumbs', [
'title' => 'Show',
'panel' => 'category',
'id'    => $data['row']->id,
])

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">

                <div class="ibox-content">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th width="150px">Label</th>
                            <th>Information</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
    <td style="width:35%;">Category Name</td>
    <td style="width:65%">{{ $data['row']->title }}</td>
</tr>
<tr>
    <td style="width:35%;">Slug</td>
    <td style="width:65%">{{ $data['row']->slug }}</td>
</tr>

<tr>
    <td style="width:35%;">Description</td>
    <td style="width:65%">{{ $data['row']->description }}</td>
</tr>
<tr>
    <td style="width:35%;">Parent</td>
    <td style="width:65%">{{ $data['row']->parent_id }}</td>
</tr>
<tr>
    <td style="width:35%;">Status</td>
    <td style="width:65%">{{ $data['row']->status }}</td>
</tr>
<tr>
    <td style="width:35%;">Created By</td>
    <td style="width:65%">{{ $data['row']->created_by }}</td>
</tr>
<tr>
    <td style="width:35%;">Updated By</td>
    <td style="width:65%">{{ $data['row']->updated_by }}</td>
</tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')

@endpush
