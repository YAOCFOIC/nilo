<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
  		<link href="{{asset('css/style_datelimit.css')}}" rel="stylesheet">
  		<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
			
			@include("layaout.navbar")
			@yield("Cabecera")
					
			    	
			@include("layaout.plan")
			@yield("plan")

			@include("layaout.info")
			@yield("info")
					
			@include("layaout.contacto")
			@yield("contacto")

			@include("layaout.footer")
			@yield("footer")

			<script src="{{asset('js/jquery.min.map.js')}}"></script>
		   
    </body>
</html>
