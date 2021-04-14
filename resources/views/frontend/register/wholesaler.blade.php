<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title')</title>

    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/font-awesome/css/fontawesome-all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    @stack('style')

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">IN+</h1>
            </div>
            <h3>Register to IN+</h3>
            <p>Create account for Wholesaler.</p>
            {{-- @if (app()->environment('local') && $errors->any())
                <br>
                <pre style="color: red;">{!! implode('', $errors->all('<code>:message</code> <br>')) !!}</pre>
            @endif --}}
            <form class="m-t" role="form" action="{{ route('wholesaler') }}" method="POST">
                @csrf
                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    {!! Form::text('shop_name', null, [ 'class' => 'form-control','placeholder'=>'Manufacturer Full Name' ]) !!}
                    @if($errors->has('shop_name'))
                        <label class="has-error" for="shop_name">{{ $errors->first('shop_name') }}</label>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                    {!! Form::text('address', null, [ 'class' => 'form-control','placeholder'=>'Address' ]) !!}
                    @if($errors->has('address'))
                        <label class="has-error" for="address">{{ $errors->first('address') }}</label>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('pan_no') ? 'has-error' : '' }}">
                    {!! Form::text('pan_no', null, [ 'class' => 'form-control','placeholder'=>'Pan No' ]) !!}
                    @if($errors->has('pan_no'))
                        <label class="has-error" for="pan_no">{{ $errors->first('pan_no') }}</label>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('doc_no') ? 'has-error' : '' }}">
                    {!! Form::text('doc_no', null, [ 'class' => 'form-control','placeholder'=>'Banijya Bibhag Register No.' ]) !!}
                    @if($errors->has('doc_no'))
                        <label class="has-error" for="doc_no">{{ $errors->first('doc_no') }}</label>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                    {!! Form::text('phone', null, [ 'class' => 'form-control','placeholder'=>'Phone No.' ]) !!}
                    @if($errors->has('phone'))
                        <label class="has-error" for="phone">{{ $errors->first('phone') }}</label>
                    @endif
                </div>
                <hr>
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    {!! Form::text('name', null, [ 'class' => 'form-control','placeholder'=>'Full Name' ]) !!}
                    @if($errors->has('name'))
                        <label class="has-error" for="name">{{ $errors->first('name') }}</label>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    {!! Form::email('email', null, [ 'class' => 'form-control','placeholder'=>'Email' ]) !!}
                    @if($errors->has('email'))
                        <label class="has-error" for="email">{{ $errors->first('email') }}</label>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('pass') ? 'has-error' : '' }}">
                    {!! Form::password('pass', [ 'class' => 'form-control','placeholder'=>'Password' ]) !!}
                    @if($errors->has('pass'))
                        <label class="has-error" for="pass">{{ $errors->first('pass') }}</label>
                    @endif
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="re_pass" placeholder="Re-Password" required="">
                </div>
                <div class="form-group">
                    <div class="checkbox i-checks"><label> <input type="checkbox" required=""><i></i> Agree the terms
                            and policy </label></div>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Register</button>

                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="/login">Login</a>
            </form>

        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset('assets/admin/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('assets/admin/js/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });

    </script>
</body>

</html>
