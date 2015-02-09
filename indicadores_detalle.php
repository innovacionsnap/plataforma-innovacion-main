<?php 
include_once('config.php');

//Principal
$title = '';
$metaDescription = '';
$wp_path_innovacion = '';
 
?>

<?php include_once('themes/header.php'); ?>

<script src="vendor/chartjs/Chart.js"></script>
<script src="vendor/flot/jquery.flot.js"></script>
<script src="vendor/flot/jquery.flot.js"></script>

<script src="vendor/codemirror-4.7/lib/codemirror.js"></script>
<link rel="stylesheet" href="vendor/codemirror-4.7/lib/codemirror.css">
<script src="vendor/codemirror-4.7/mode/javascript/javascript.js"></script>

<header id="innovacion_header_page">
	
	<div class="header_1">		
		<div class="row">
		  <br>
		  <div class="col-sm-6 col-xs-12 header_custom_padding_left_1">
		  	<div class="header_text header_text_left">
				Plataforma de Innovacion
	  		</div>
		  </div>
		  <div class="col-sm-6 col-xs-12 header_custom_padding_right_1">
		  	<div id="header_login_top_access" class="header_text header_text_right">
				Jorge Pantoja
				<span class="caret"></span>
				<img class="circular" src="img/users/jorge-pantoja.jpg" />
	  		</div>
		  </div>
		</div>
	</div>
	
	<div id="small_login_user">
		<form role="form">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Usuario:</label>
		    <input type="email" class="form-control input-sm" id="exampleInputEmail1" placeholder="Email">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Contraseña:</label>
		    <input type="password" class="form-control input-sm" id="exampleInputPassword1" placeholder="Contraseña">
		  </div>
		  <button type="submit" class="btn btn-primary btn-xs">Login</button>
		</form>
		<hr>
		<a class="text_info_login">Mi Cuenta</a><br>
		<a class="text_info_login">Olvide mi Contraseña</a>
	</div>
	
</header>

<div id="main_container">
	
	<div class="row container_indicadores">
		<div class="col-sm-12 indicador_div_container">
			
			<div class="indicador_div_detalle">
				<span class="top_title_indicador_div">Titulo</span>
				<div class="indicador_div_grafica_detalle">
					<center>
						<canvas id="canvas3" class="indicador_dibujo_grafica_detalle"></canvas>
					</center>	
				</div>
				<div class="indicador_div_descripcion_detalle">
					<span class="indicador_div_descripcion_titulo">Descripción:</span>
					<p class="indicador_div_descripcion_texto">
						Lorem Ipsum is simply dummy text of the printing and typesetting industry.
						Lorem Ipsum has been the industry's standard dummy text ever since the 1500.
						Lorem Ipsum has been the industry's standard dummy text ever since the 1500.
						Lorem Ipsum is simply dummy text of the printing and typesetting industry.
						Lorem Ipsum has been the industry's standard dummy text ever since the 1500.
						Lorem Ipsum has been the industry's standard dummy text ever since the 1500.
						Lorem Ipsum is simply dummy text of the printing and typesetting industry.
						Lorem Ipsum has been the industry's standard dummy text ever since the 1500.
						Lorem Ipsum has been the industry's standard dummy text ever since the 1500.
					</p>
					<hr class="indicador_div_hr">
					<span class="indicador_div_descripcion_titulo">Fuentes de Datos:</span>
					<p class="indicador_div_descripcion_texto">
						<span class="indicador_format_label" property="dc:format" data-format="xlsx">xlsx</span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. <br>
						<span class="indicador_format_label" property="dc:format" data-format="csv">CSV</span>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
					</p>
					<hr class="indicador_div_hr">
					<span class="indicador_div_descripcion_titulo">Metadatos:</span>
					<div class="panel panel-default indicador_div_tabla">
						<table class="table table-bordered indicador_tabla">
						    <thead>
						        <tr>
						            <th>Row</th>
						            <th>First Name</th>
						            <th>Last Name</th>
						            <th>Email</th>
						        </tr>
						    </thead>
						    <tbody>
						        <tr>
						            <td>1</td>
						            <td>John</td>
						            <td>Carter</td>
						            <td>johncarter@mail.com</td>
						        </tr>
						        <tr>
						            <td>2</td>
						            <td>Peter</td>
						            <td>Parker</td>
						            <td>peterparker@mail.com</td>
						        </tr>
						        <tr>
						            <td>3</td>
						            <td>John</td>
						            <td>Rambo</td>
						            <td>johnrambo@mail.com</td>
						        </tr>
						    </tbody>
						</table>
					</div>
					<hr class="indicador_div_hr">
					<span class="indicador_div_descripcion_titulo">Datos Relacionados:</span>
					<p class="indicador_div_descripcion_texto">
						<ul>
							<li>Dataset 1</li>
							<li>Dataset 2</li>
						</ul>
					</p>
					<hr class="indicador_div_hr">
					<span class="indicador_div_descripcion_titulo">Links Relacionados:</span>
					<p class="indicador_div_descripcion_texto">
						<ul>
							<li>Dataset 1</li>
							<li>Dataset 2</li>
						</ul>
					</p>
					<hr class="indicador_div_hr">
					<span class="indicador_div_descripcion_titulo">Link Permanente Grafica (Para Incrustar en Web):</span>
					<textarea id="code1" class="form-control indicador_code_area">
<iframe width="560" height="315" src="//www.youtube.com/embed/C09VZpIMCgQ" frameborder="0" allowfullscreen></iframe></textarea>
					<hr>
					<button type="button" class="btn btn-primary btn-sm"><i class="fa fa-wrench fa-fw"></i>&nbsp;Para Desarrolladores&nbsp;<i class="fa fa-angle-double-down"></i></button>
					<hr class="indicador_div_hr">
					<span class="indicador_div_descripcion_titulo">Datos en formato JSON a través del API de la instancia de CKAN implementada:</span>
					<textarea id="code2" class="form-control indicador_code_area">
{
    "help": "Creates a package",
    "success": false,
    "error": {
        "message": "Access denied",
        "__type": "Authorization Error"
        }
}
					</textarea>
				</div>
				
<!-- Script Comentarios Disqus -->

<div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'plataformainnovacion'; // required: replace example with your forum shortname
		var disqus_identifier = 'innovacion_graf_1';
		//var disqus_title = 'grafico1';
		//var disqus_url = 'http://localhost/snapinnovacion/main/indicadores_detalle.php';

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
			</div>
		</div>
	</div>
</div>

<!-- Footer -->

<?php include_once('themes/footer.php'); ?>

<script>

var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

var lineChartData = {
	labels : ["January","February","March","April","May","June","July"],
	datasets : [
		{
			label: "My First dataset",
			fillColor : "rgba(220,220,220,0.2)",
			strokeColor : "rgba(220,220,220,1)",
			pointColor : "rgba(220,220,220,1)",
			pointStrokeColor : "#fff",
			pointHighlightFill : "#fff",
			pointHighlightStroke : "rgba(220,220,220,1)",
			data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
		},
		{
			label: "My Second dataset",
			fillColor : "rgba(151,187,205,0.2)",
			strokeColor : "rgba(151,187,205,1)",
			pointColor : "rgba(151,187,205,1)",
			pointStrokeColor : "#fff",
			pointHighlightFill : "#fff",
			pointHighlightStroke : "rgba(151,187,205,1)",
			data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
		}
	]

}

window.onload = function() {
	
	var ctx = document.getElementById("canvas3").getContext("2d");
	window.myLine = new Chart(ctx).Line(lineChartData, {
		responsive: true
	});
	
}

window.onresize = function(event) {

	var ctx = document.getElementById("canvas3").getContext("2d");
	window.myLine = new Chart(ctx).Line(lineChartData, {
		responsive: true
	});

}

var editor1 = CodeMirror.fromTextArea(document.getElementById("code1"), {
	lineNumbers: true,
	readOnly: true,
	autoClearEmptyLines: true,
	gutter: true,
    lineWrapping: true
});

editor1.setSize("auto", "auto");

var editor2 = CodeMirror.fromTextArea(document.getElementById("code2"), {
	lineNumbers: true,
	readOnly: true,
	autoClearEmptyLines: true,
	gutter: true,
    lineWrapping: true
});

editor2.setSize("auto", "auto");

</script>