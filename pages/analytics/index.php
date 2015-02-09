
<?php
/*
 * https://developers.google.com/analytics/devguides/reporting/core/v3/reference
 * https://developers.google.com/analytics/devguides/reporting/core/dimsmets
 * https://github.com/google/google-api-php-client
 * https://console.developers.google.com
 * http://devstan.com/2014/01/30/google_analytics_php/
 * https://developers.google.com/analytics/solutions/articles/hello-analytics-api
 * http://www.google.com/analytics/
 * 
 * http://localhost/monitoreo/index.php?r=site/page&view=analytics
 * 
*/

ini_set('max_execution_time', 1200); // 1200 seconds = 20 minutes

?>

<?php 
include_once('../../config.php');

//Principal
$title = '';
$metaDescription = '';
$wp_path_innovacion = '../../';

?>

<?php include_once('../../themes/header.php'); ?>

$('head').append('<style>body {background: none;} footer {position:relative;}</style>');

<?php include_once('../../themes/menu.php'); ?>

<div class="container">

<br><br>

    <br><br>
    <div style="font-size: medium; font-weight: bold;" class="text-info"><center>Google Analytics - Portales Web Ecuador</center></div>
    <br>
    
    <center>
        
		<form class="form-inline" role="form">
		  <div class="form-group">
		    <label class="" for="fecha_inicio">Fecha Inicio:</label>
		    <input type="text" class="form-control" id="fecha_inicio" name="fecha_inicio" value="2014-01-01">
		  </div>
		  <div class="form-group">
		    <label class="" for="fecha_fin">Fecha Fin:</label>
		    <input type="text" class="form-control" id="fecha_fin" name="fecha_fin" value="2014-01-02">
		  </div>
		</form>
        
        <div id="load_btn">
            <br><br>
            <button id="btnLoad" type="button" class="btn btn-primary">Obtener Datos de Google Analytics</button>
        </div>
        
    </center>

    <center>
        <div id="load_image">
            <br><br>
            <img src="../../img/loaders/loading.gif" />
        </div>
    </center>

    <div id="load_info">
    	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>

</div>

<?php include_once('../../themes/footer.php'); ?>

<script type="text/javascript">
    
$("#load_image").hide();

$("#btnLoad").click(function(){
    
    //$("#load_btn").hide();
    $("#load_image").show();
    
    $.ajax({
        type: 'POST',
        data: "fecha_inicio="+$('#fecha_inicio').val()+"&fecha_fin="+$('#fecha_fin').val(),
        url: 'analytics_data.php',
        success: function(data){
            $("#load_image").hide();
            $("#load_info").html(data);
         }
     });
     
});
    
</script>