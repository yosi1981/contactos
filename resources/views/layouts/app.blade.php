<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
            <meta content="IE=edge" http-equiv="X-UA-Compatible">
                <meta content="width=device-width, initial-scale=1" name="viewport">
                    <!-- CSRF Token -->
                    <meta content="{{ csrf_token() }}" name="csrf-token">
                        <title>
                            {{ config('app.name', 'Laravel') }}
                        </title>
                        <!-- Styles -->
                        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
                            <link href="{{asset('/css/ace-rtl.min.css')}}" rel="stylesheet"/>
                            <link class="ace-main-stylesheet" href="{{asset('/css/ace.min.css')}}" id="main-ace-style" rel="stylesheet"/>
                            <link class="ace-main-stylesheet" href="{{asset('/css/ace-part2.min.css')}}" rel="stylesheet"/>
                            <!-- Scripts -->
                            <script>
                                window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
                            </script>
                        </link>
                    </meta>
                </meta>
            </meta>
        </meta>
    </head>
    <body>
        <div id="app">
            <div class="navbar navbar-default ace-save-state" id="navbar">
                <div class="navbar-container ace-save-state" id="navbar-container">
                    <div class="navbar-header pull-left">
                        <a class="navbar-brand" href="index.html">
                            <small>
                                <i class="fa fa-leaf">
                                </i>
                                RutaSex
                            </small>
                        </a>
                    </div>
                    <div class="navbar-buttons navbar-header pull-right" role="navigation">
                    </div>
                </div>
                <!-- /.navbar-container -->
            </div>
            @yield('content')
        </div>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}">
        </script>
    </body>
</html>
