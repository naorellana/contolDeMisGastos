<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>@yield('title')</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:900" rel="stylesheet">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/error-page.css') }}" />
    <link href="{{ asset('vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body>

    <div id="notfound">
        <div class="notfound">
            <div class="notfound-404">
                <h3></h3>
                <h1><span>@yield('code')</span></h1> 
            </div>
            <h2>@yield('message')</h2>
            <a href="{{url('/login')}}" class="btn btn-outline-dark">Home</a>
        </div>
    </div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
