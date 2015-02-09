<?php 
include_once('../config.php');

//Principal
$title = '';
$metaDescription = '';
$wp_path_innovacion = '../';

?>

<?php include_once('../themes/header.php'); ?>
<?php include_once('../themes/menu.php'); ?>
<?php include_once('../themes/top.php');?>

<?php
include_once '../modules/controller/pag1.php';
$controller = new pag1_controller();
?>

<script type="text/javascript" src="../vendor/bootstrap-filestyle-master/src/bootstrap-filestyle.js"></script>

<div class="innovacion_custom_container container_print">
	
<script>

	$("#btn").click(function(){
		  $.ajax({
		  	url:"../modules/view/pag1.php",
		  	success:function(result){
		    	$("#contenido_general").html(result);
		  	}
		  });
	});
	
</script>

<br><br><br><br>

<?php include_once('../themes/footer.php'); ?>