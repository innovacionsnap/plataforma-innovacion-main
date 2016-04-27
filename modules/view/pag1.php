<?php

$wp_path_innovacion = '../../';

require_once $wp_path_innovacion . 'config.php';

?>

<div class="innovacion_form_class_1">

</div>

<script type="text/javascript">

$("#btn_submit").click(function(e) {
	
    var postData = $("#innovacion_form").serialize();
    
    $.ajax({
        url : '../modules/controller/commons.php',
        type: 'POST',
        data : postData + '&innovacion_accion=ingreso',
        success:function(data) {
            alert(data);
            window.location.href = "pag1.php";
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {
            //if fails      
        }
    });
    
});
	
</script>
