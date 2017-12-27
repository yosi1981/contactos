@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="login-box widget-box no-border visible" id="login-box">
                <div class="widget-body">
                    <div class="widget-main">
                        <h4 class="header blue lighter bigger">
                            <i class="ace-icon fa fa-coffee green">
                            </i>
                            Logueate...
                        </h4>
                        <div class="space-6">
                        </div>
                        <form action="{{ route('login') }}" class="form-horizontal" method="POST" role="form">
                            {{ csrf_field() }}
                            <fieldset>
                                <label class="block clearfix">
                                    <span class="block input-icon input-icon-right">
                                        <input class="form-control" id="email" name="email" placeholder="Username" type="text">
                                            <i class="ace-icon fa fa-user">
                                            </i>
                                        </input>
                                    </span>
                                </label>
                                <label class="block clearfix">
                                    <span class="block input-icon input-icon-right">
                                        <input class="form-control" id="password" name="password" placeholder="Password" type="password">
                                            <i class="ace-icon fa fa-lock">
                                            </i>
                                        </input>
                                    </span>
                                </label>
                                <div class="space">
                                </div>
                                <div class="clearfix">
                                    <button class="width-35 pull-right btn btn-sm btn-primary" type="submit">
                                        <i class="ace-icon fa fa-key">
                                        </i>
                                        <span class="bigger-110">
                                            Login
                                        </span>
                                    </button>
                                </div>
                                <div class="space-4">
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <!-- /.widget-main -->
                </div>
                <!-- /.widget-body -->
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Login
                </div>
                <div class="panel-body">
                    <!-- /.col -->
                    <form action="{{ route('login') }}" class="form-horizontal" method="POST" role="form">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label" for="email">
                                E-Mail Address
                            </label>
                            <div class="col-md-6">
                                <input autofocus="" class="form-control" id="email" name="email" required="" type="email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('email') }}
                                        </strong>
                                    </span>
                                    @endif
                                </input>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label" for="password">
                                Password
                            </label>
                            <div class="col-md-6">
                                <input class="form-control" id="password" name="password" required="" type="password">
                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('password') }}
                                        </strong>
                                    </span>
                                    @endif
                                </input>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button class="btn btn-primary" type="submit">
                                    Login
                                </button>
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        <script src="{{asset('/js/jquery-2.1.4.min.js')}}">
        </script>

</div>
@endsection
