<!DOCTYPE>
<html>
<head>
    <title>
        @yield('title')
    </title>
        @yield('head')
        <link href='http://fonts.googleapis.com/css?family=Rock+Salt|Source+Sans+Pro:300,400,600|Slabo+27px' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="script.js"></script>
</head>
    <body>
        <header>
        <div id="headLeft"></div>
        <!--<div id='titles'>-->
        <div  id="title">MX</div>
        <!--<div  id="subtitleBox"><div id="top"></div><div id="subtitle"></div><div id="bottom"></div></div>-->
        <div id="subtitleSpace"></div>
       <!-- </div>-->
        @yield('header')
        <div id="headRight"></div>
        </header>
        @yield('content')
        <div id="footer">Est. 2015 Kelly Finke, Walker Griggs, Keki Takahara,  et al.</div>
    </body>
</html>