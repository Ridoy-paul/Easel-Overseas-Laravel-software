@php
$user = Auth::user();
$setting = DB::table('business_settings')->find(1);
@endphp
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Admin | Overseas</title>
        <meta name="description" content="Ridoy Paul">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Open Graph Meta -->
        
        
        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="">
        <link rel="icon" type="image/png" sizes="192x192" href="{{asset('backend/assets/media/favicons/favicon-192x192.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('backend/assets/media/favicons/apple-touch-icon-180x180.png') }}">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Fonts and OneUI framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
        <link rel="stylesheet" id="css-main" href="{{asset('backend/assets/css/oneui.min.css') }}">

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <link rel="stylesheet" id="css-theme" href="{{asset('backend/assets/css/themes/amethyst.min.css') }}">
        <!-- END Stylesheets -->

        <link rel="stylesheet" type="text/css" href="{{ asset('css/toastify.min.css') }}">
        <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" />
        
        <style>
            @media only screen and (min-width: 1000px) {
                #page-container.main-content-narrow>#main-container .content, #page-container.main-content-narrow>#page-footer .content, #page-container.main-content-narrow>#page-header .content, #page-container.main-content-narrow>#page-header .content-header {
                    width: 100%;
                }
            }
            div.dataTables_processing { z-index: 1; }
            .remaining {
                font-size: 18px;
                border: 1px dashed #e02b5e;
                padding: 1px 10px;
                border-radius: 4px;
                position: relative;
            }
            #re_days{
                color: #DB004D;
            }
            .tox-tinymce {
                min-height: 500px !important;
            }
        </style>


    </head>
    <body>

        <audio id="error" src="{{asset('backend/audio/error.mp3')}}" preload="auto"></audio>
        <audio id="success1" src="{{asset('backend/audio/warning.mp3')}}" preload="auto"></audio>
        <audio id="success" src="{{asset('backend/audio/success.mp3')}}" preload="auto"></audio>

        <!-- Page Container -->
        <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
            <!-- Side Overlay-->
            
            @include('cms.left_sidebar')
            <!-- END Sidebar -->

            <!-- Header -->
            @include('cms.header')
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">

                <!--Body end-->
                    @yield('body_content')
                <!--Body end-->

            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <footer id="page-footer" class="bg-body-light">
                <div class="content py-3">
                    <div class="row font-size-sm">
                        <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-right">
                        <i class="fa fa-heart text-danger"></i> Powered by <a class="font-w600" href="http://faraitfusion.com/" target="_blank">FARA IT LTD.</a>
                        </div>
                        <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-left">
                        </div>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->
        @include('cms.footer')




