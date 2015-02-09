<?php

$wp_path_quickrf = '../../';

//require_once $wp_path_quickrf . 'modules/model/rtv1.php';
//require_once $wp_path_quickrf . 'snipets/commons.php';

if (file_exists('../../modules/model/pag1.php')) {
    require_once '../../modules/model/pag1.php';
} else if (file_exists('../modules/model/pag1.php')) {
    require_once '../modules/model/pag1.php';
} else {
    require_once 'modules/model/pag1.php';
}

if (file_exists('../../snipets/commons.php')) {
    require_once '../../snipets/commons.php';
} else if (file_exists('../snipets/commons.php')) {
    require_once '../snipets/commons.php';
} else {
    require_once 'snipets/commons.php';
}

class pag1_controller extends innovacion_commons {
	
	var $cm;

    function __construct() {
        $this->cm = new rtv1_model();
    }

}

?>
