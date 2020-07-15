<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>EHealth4Everyone</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
    <meta name="msapplication-tap-highlight" content="no">

    <link rel="icon" type="image/png" href="{{asset('images/logo/logo.jpeg')}}" />
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <style>
        .body {
            height: 100vh;
            /*ensures that at every point, the height of this element should be 95% of the viewport height*/
            background-image: linear-gradient(to right bottom, rgba(126, 213, 111, 0.8), rgba(40, 180, 133, 0.8)), url("../img/hero.jpg") !important;
            background-size: cover;
            /*ensures that the image width resizes automatically */
            background-position: top;
            /*ensures that the top of the image is not cropped out when resizing */
            position: relative;
            -webkit-clip-path: polygon(0 0, 100% 0, 100% 75vh, 0 100%);
            clip-path: polygon(0 0, 100% 0, 100% 75vh, 0 100%); }
        }

    </style>
</head>
<body class="hold-transition register-page" style="background: #c8e6c9">

    @yield('content')

    <script type="text/javascript">
        // $(function () {
        //     $('#datetimepicker9').datetimepicker({
        //         viewMode: 'years'
        //     });
        // });

    $(function () {
        $("#datetimepicker9").datepicker({ 
                autoclose: true, 
                todayHighlight: true
        }).datepicker('update', new Date());
    });
</script>
</body>
</html>
