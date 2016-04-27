<script>

$('#item_usuario_icon').click(function (e) {
   $('#small_login_parent_layer').addClass("dim_layer");
   $("#small_login_user").css({
        
        'position': 'absolute',
        'left': '50%',
        'top': '40%',
        'margin-top': -($("#small_login_user").height()/2),
   		'margin-left': (-($("#small_login_user").width()/2))-50
        
   }).toggle();
});

$('#small_login_parent_layer').click(function() {
	$('#small_login_parent_layer').removeClass("dim_layer");
	$("#small_login_user").toggle();
});

$('#small_login_user').click(function(event){
	event.stopPropagation();
});

/*
$('#header_login_top_access').mouseover(function() {      
   $("#small_login_user").css({
        'position': 'absolute',
        'left': $(this).offset().left - 25,
        'top': $(this).offset().top + $(this).height() + 15
   }).show("slow");
});
*/

</script>