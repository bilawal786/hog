<!doctype html>
<html lang="en">

<head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Specific Meta
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Texicab is a modern presentation HTML5 Car Rent template.">
    <meta name="keywords" content="HTML5, Template, Design, Development, Car Rent"/>
    <meta name="author" content="">

    <!-- Titles
    ================================================== -->
    <title>Heart of Gold | </title>

    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" sizes="16x16" href="{{ asset('assets/images/favicon-16x16.ico') }}">
    <link rel="shortcut icon" sizes="32x32" href="{{ asset('assets/images/favicon-32x32.ico') }}">
    <link rel="shortcut icon" sizes="96x96" href="{{ asset('assets/images/favicon-96x96.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/apple-touch-icon-114x114.png') }}">
    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet"/>

    <!-- Custom Font
    ================================================== -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Exo:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i%7cRoboto:400,400i,500,500i,700,700i,900,900i" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Exo:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i%7cRoboto+Slab:400,700" rel="stylesheet">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/color-schemer.css') }}">

    <!-- RS5.4 Main Stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/revolution/css/settings.css') }}">
    <!-- RS5.4 Layers and Navigation Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/revolution/css/layers.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/revolution/css/navigation.css') }}">
    <style>
        .header-nav-area {
            background-color: black;
        }

        .header-nav-area .site-logo {
            padding: 0px 0;
        }

        .top-navigation .menu-list > li > a {
            color: #959586;
        }

        .bg-nero {
            background-color: #000000;
            border-top: 2px solid #cd9700;
        }

        .header-top-area .header-top-menu li a {
            color: #cd9700;
        }

        .top-navigation .menu-list > li > a {
            padding: 27px 36px;
            font-size: 18px;
        }

        .header-content-right .header-top-menu li a {
            text-transform: lowercase;
        }
        .yellow-theme .widget .widget-title {
            color: #cd9700;
            border-color: #cd9700;
        }
        .yellow-theme .widget.widget_menu ul li:before {
            background: #cd9700;
        }
        .yellow-theme .widget.widget_hot_contact ul li i {
            color: #cd9700;
        }
        .yellow-theme .widget .button {
            background: #cd9700;
        }
        .page-header{
            margin: 0px 0px 20px !important;
        }
        @media only screen and (max-width: 600px) {
           .mdn{
               display: none;
           }
            .mlogo{
                margin-top: 0px !important;
            }
            .animated-arrow span, .animated-arrow span:before, .animated-arrow span:after {
                background: #cd9700;
            }
            .menuexpandermain .menuopen {
                left: 21em !important;
                top: 1em !important;
            }
        }
    </style>
</head>

<body>

<div id="app"></div>

<script src="{{ mix('js/app.js') }}" type="text/javascript"></script>

<!-- All The JS Files
================================================== -->
<script src="{{ asset('assets/js/plugins.min.js') }}"></script>
<!--<script src="{{ asset('assets/js/carrent.min.js') }}"></script> --><!-- main-js -->

<!-- RS5.4 Core JS Files -->
<script src="{{ asset('assets/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('assets/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>

<script>

</script>

<!-- SLIDER REVOLUTION 5.4 EXTENSIONS  (Load Extensions only on Local File Systems! The following part can be removed on Server for On Demand Loading) -->
<script src="{{ asset('assets/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
<script src="{{ asset('assets/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ asset('assets/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script src="{{ asset('assets/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ asset('assets/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script src="{{ asset('assets/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ asset('assets/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
<script src="{{ asset('assets/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
</body>
</html>
