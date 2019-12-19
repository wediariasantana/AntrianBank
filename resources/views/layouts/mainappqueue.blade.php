<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="msapplication-tap-highlight" content="no">
        <title>@yield('title') | Sistem Antrian</title>
        <link rel="icon" href="{{ asset('assets/favicon.ico') }}">
        <link href="{{ asset('assets/css/materialize.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="{{ asset('assets/js/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
        @yield('css')
        <link href="{{ asset('assets/css/style.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    </head>

    <body>
        <div id="loader-wrapper">
            <div id="loader"></div>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>

        <header id="header" class="page-topbar">
            <div class="navbar-fixed">
                <nav class="navbar-color">
                    <div class="nav-wrapper">
                       <ul> 
                            <li><a href="{{ route('add_to_queue') }}" style="font-weight:400">{{ trans('messages.mainapp.issue_url') }}</a></li>
                       </ul>
                        <ul class="right hide-on-med-and-down">
                            <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"><i class="mdi-action-settings-overscan"></i></a></li>
                        </ul>
                        <ul class="right">
                            <span class="truncate" style="margin-right:20px;font-size:20px">{{ $settings->name }}</span>
                        </ul>
                        <ul>
                            <li><a href="{{ route('display') }}" style="font-weight:400;">{{ trans('messages.mainapp.display_url') }}</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>

        <div id="main" style="padding:15px;padding-bottom:0">
            <div class="wrapper">
                <section id="content">
                    @yield('content')
                </section>
            </div>
        </div>

        <footer class="page-footer" style="padding:0; text-align: center;">
            <div class="footer-copyright">
                <div class="container">
                    <span>Powered by <a href="#" style="color:#ccc">Wedi Aria Santana</a></span>
                </div>
            </div>
        </footer>
        @yield('print')
        <script type="text/javascript" src="{{ asset('assets/js/plugins/jquery-1.11.2.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/materialize.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/plugins.min.js') }}"></script>
        @yield('script')
        @include('common.messages')
    </body>
</html>
