<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mules3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--==============GOOGLE FONT - OPEN SANS=================-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!--============== ICON FONT FONT-AWESOME=================-->

    <link href="css/font-awesome.css" rel="stylesheet">

    <!--==============MAIN CSS FOR HOSTING PAGE=================-->
    <link href="css/map.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet" media="all">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

    <!--==============Mordernizr =================-->

    <script src="js/modernizr.js"></script>

    <!--===================FLEX SLIDER=======================-->

    <link rel="stylesheet" href="css/flexslider.css" />
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.flexslider.js"></script>
    <script type="text/javascript">
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                useCSS: Modernizr.touch
            });
        });
    </script>
</head>
<body id="home" data-spy="scroll" data-target=".navbar-collapse" data-offset="100">
@include('includes.navigation')
<div class="container">
    @yield('content')
</div>
@include('includes/footer')

</body>
</html>