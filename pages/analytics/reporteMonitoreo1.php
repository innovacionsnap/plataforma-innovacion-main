
<?php
/*
 * 
 * 
*/

if(Yii::app()->user->isGuest){
    Yii::app()->user->loginRequired();
}

ini_set('max_execution_time', 1200); // 1200 seconds = 20 minutes

?>

<!DOCTYPE html>
<html>
<head>
    <title>Google Analytics Connect</title>
</head>
<body>
    
    <br><br>
    <div style="font-size: medium; font-weight: bold;" class="text-info"><center>Reporte de Monitoreo</center></div>
    <br>
    
    <center>
        <div id="load_btn">
            <br><br>
            <button id="btnLoad" type="button" class="btn btn-primary">Generar Reporte</button>
        </div>
    </center>

    <center>
        <div id="load_image">
            <br><br>
            <img src="<?php echo Yii::app()->baseUrl; ?>/images/loading.gif" />
        </div>
    </center>

    <div id="load_info">
    </div>

</body>
</html>

<script type="text/javascript">
    
$("#load_image").hide();

$("#btnLoad").click(function(){
    
    $("#load_btn").hide();
    $("#load_image").show();
    
    $.ajax({
        type: 'POST',
        url: '<?php echo Yii::app()->baseUrl; ?>/reporteMonitoreo1_data.php',
        success: function(data){
            $("#load_image").hide();
            $("#load_info").html(data);
         }
     });
     
});
    
</script>