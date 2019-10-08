<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

        <!-- Styles -->
  		<link href="{{asset('css/style_datelimit.css')}}" rel="stylesheet">
  		<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
		
    </head>
    <body oncontextmenu="return false" >
			
		<section class="container">
			<div class="row">
			   	<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 mt-sl col-xs-12">
		   			<h3 class="d-flex justify-content-center bg-size">Fecha Facturación electrónica</h3>
		   			<br>
		    		<p>
		    			El código CIIU hace referencia a tu actividad económica principal, y es necesario para saber cuál es tu fecha límite para emprezar con tu facturación electrónica según la DIAN.
		    		</p>
					<p>
						Acutalmente hay diferenetes medios de consulta: Consultando el 
						<a href="https://www.dian.gov.co/ciiu/Paginas/default.aspx">descargable gratuito</a> 
						de la DIAN o en el certificado de existencia y representación de la cámara de comercio que tiene costo hasta la fecha de $5.800 al ser consultado en la página web.
					</p>
			    	<p>
			    		<strong>
			    			¡Te invitamos a consultarte totalmente gratis con NILO y no dejar pasar esta fecha para actualizar la gestión de tu negocio!
			    		</strong>
			    	</p>
				</div>					
				<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xs-12 mt-sl">
					<form route="limits" method="GET" class="form">
				    	
					    <div class="img-background">
					    	<img src="{{'img/icono_codigo_ciiu.png'}}" class="imgtamane">
					    </div>
						<h1 class="d-flex justify-content-center bg-size">Código CIIU</h1>
			 			
				    		<div class="container">
				    			<div class="text-center">
								  	<div class="form-group">
								  		<input type="text" name="activity_id" class="form-control" id="actividadeconomica" aria-describedby="emailHelp" placeholder="Ingresa tu código CIIU" pattern="[0-9]{4}">
									</div>
									<div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}" id="captcha">
				                        @if($errors->has('g-recaptcha-response'))
				                            <span class="invalid-feedback" style="display: block;">
				                                <strong>{{$errors->first('g-recaptcha-response')}}</strong>
				                            </span>
				                        @endif
				                    </div>
								</div>
							</div>
							<div class="text-center btn-yellow-dark" id="identity">
								<button  class="btn search" >Consultar</button>
								</div> 
								<div class="mt-2"></div>
									</form>
					    		</div>
						</div>
						<div class="row">
							<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xs-12 mt-s">
								<div id="info">
									<table class="table table-bordered table-hover table-shadow">
										<thead class="thead bg-violet">
											<tr>
												<th scope="col">Código CIIU</th>
												<th scope="col">Actividad Económica Principal</th>
												<th scope="col">Fecha para iniciar registro*</th>
										      	<th scope="col">Fecha máxima para iniciar a expedir factura**</th>
												<th scope="col">Días restantes</th>
										    </tr>
										</thead>
										<tbody>
										  	@foreach($limits as $limit)
											    <tr>
													<th scope="row">{{ $limit->activity_id}}</th>
													<td>{{$limit->activity_name}}</td>
												    <td>{{$limit->start_date}}</td>
												  	<td>{{$limit->end_date}}</td>
										    	  	<td>{{$limit->days}}</td>
											    </tr>
										    @endforeach
										</tbody>
									</table>	
									<div class="text-center mt-3">
										<p>
											* Resolución 000020 de 2019  ** Resolución 000030 de 2019 
										</p>
										{{ $limits->links()}}
									</div>					
									<div class="mt-3">
									</div>
								</div>
							</div>
					</div>
		</section>

		<script src="{{asset('js/jquery.min.map.js')}}"></script>
		<script src="{{asset('js/app.js')}}"></script>
		<script src="{{asset('js/cancel.js')}}"></script>
    </body>
</html>



