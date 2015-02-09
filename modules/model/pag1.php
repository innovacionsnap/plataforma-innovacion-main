<?php

$wp_path_innovacion = '../../';

if (file_exists('../../modules/model/db.php')) {
    require_once '../../modules/model/db.php';
} else if (file_exists('../modules/model/db.php')) {
    require_once '../modules/model/db.php';
} else {
    require_once 'modules/model/db.php';
}

class pag1_model {
	
	var $db;
	var $db_conn;
    
    function __construct() {

        $this->db = new Database();
		$this->db_conn = $this->db->connectToDatabase();

    }
			
}

?>