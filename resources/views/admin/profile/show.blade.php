@extends('admin.layouts.layout')

@push('style')

@endpush

@section('title', 'user')

@section('content')

    @include('admin.common.breadcrumbs', [
    'title' => 'Show',
    'panel' => 'user',
    'id' => $data['0']->id,
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
                                    <td style="width:35%;">Full Name</td>
                                    <td style="width:65%">{{ $data['0']->name }}</td>
                                </tr>

                                <tr>
                                    <td style="width:35%;">Email</td>
                                    <td style="width:65%">{{ $data['0']->email }}</td>
                                </tr>
                                <?php
                                $role = $data['0']->user_role;
                                if ($role == 2 || $role == 3) { ?>

                                <tr>
                                    <td style="width:35%;">Shop Name</td>
                                    <td style="width:65%">{{ $data['0']->shop_name }}</td>
                                </tr>
                                <tr>
                                    <td style="width:35%;">Address</td>
                                    <td style="width:65%">{{ $data['0']->address }}</td>
                                </tr>
                                <tr>
                                    <td style="width:35%;">Pan No.</td>
                                    <td style="width:65%">{{ $data['0']->pan_no }}</td>
                                </tr>

                                <?php }
                                ?>
                                <tr>
                                    <td style="width:35%;">Role</td>
                                    <td style="width:65%">{{ $data['0']->desc }}</td>
                                </tr>
                                <tr>
                                    <td style="width:35%;">Status</td>
                                    <td style="width:65%">{{ $data['0']->status }}</td>
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
