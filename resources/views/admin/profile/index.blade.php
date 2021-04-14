@extends('admin.layouts.layout')

@push('style')
    <link href="{{ asset('assets/admin/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">

    <style>
        .normal-actions>li {
            display: inline;
            list-style: none;
        }

    </style>
@endpush

@section('title', 'Profile')
    {{-- {{ $users }} --}}
@section('content')
    @include('admin.common.breadcrumbs', [
    'title'=> 'List',
    'panel'=> 'profile',
    ])
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-6">
                <div class="ibox ">
                    <div class="ibox-title ibox-title-border">
                        <h5 class="float-left">Profile</h5>
                        <a class="btn btn-primary btn-xs float-right" href="profile/{{ $data['0']->id }}/edit"><i class="fa fa-edit"></i> Edit  Profile</a>
                    </div>

                    <div class="ibox-content ibox-content-custom">
                        <?php
                        if($data['0']->shop_name =='2' || $data['0']->shop_name =='3'){
                        ?>
                        <h3><span class="profile-label">Shop Name :</span> <i>{{ $data['0']->shop_name }}</i></h3>
                        <div class="hr-line-dashed"></div>
                        <h3><span class="profile-label">Address :</span> <i>{{ $data['0']->address }}</i></h3>
                        <div class="hr-line-dashed"></div>
                        <h3><span class="profile-label">Pan No. :</span> <i>{{ $data['0']->pan_no }}</i></h3>
                        <div class="hr-line-dashed"></div>
                        <h3><span class="profile-label">Banijya Bibhag Register No. :</span>
                            <i>{{ $data['0']->doc_no }}</i></h3>
                        <div class="hr-line-dashed"></div>
                        <?php } ?>
                        <h3><span class="profile-label">Phone No. :</span> <i>{{ $data['0']->phone }}</i></h3>
                        <div class="hr-line-dashed"></div>
                        <h3><span class="profile-label">Full Name :</span> <i>{{ $data['0']->name }}</i></h3>
                        <div class="hr-line-dashed"></div>
                        <h3><span class="profile-label">Email :</span> <i>{{ $data['0']->email }}</i></h3>
                        <div class="hr-line-dashed"></div>
                        <h3><span class="profile-label">Role :</span> <span
                                class="badge badge-primary">{{ $data['0']->desc }}</span></h3>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('assets/admin/js/plugins/dataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugins/sweetalert/sweetalert.min.js') }}"></script>

@endpush
