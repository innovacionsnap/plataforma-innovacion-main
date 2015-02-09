<?php

class Database
{
    var $host="localhost";
    var $username="root";
    Var $password="";
    var $database="quickrf";
    var $myconn;

    function connectToDatabase() 
    {
        $conn= mysql_connect($this->host,$this->username,$this->password);

        if(!$conn) {
            die ("Cannot connect to the database");
        } else {
            $this->myconn = $conn;
            //echo "Connection established";
        }
		
		$this->selectDatabase();

        return $this->myconn;
		
    }

    function selectDatabase() {
    	
        mysql_select_db($this->database);

        if(mysql_error()) {
            echo "Cannot find the database ".$this->database;
        }
        
        //echo "Database selected..";       
    }
	
	function exec_query($sql) {
		
		$result = mysql_query($sql,$this->myconn);
		return $result;
		
	}
	
	function count_rows_query($res) {
		
		$result = mysql_num_rows($res);
		return $result;
		
	}

    function closeConnection() {
    	
        mysql_close($this->myconn);
        //echo "Connection closed";
		
    }

}

?>