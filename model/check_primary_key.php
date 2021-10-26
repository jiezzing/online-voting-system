<?php
	class CheckKey
	{
        private $conn;

        public $table;
        
        // Connect database
		public function __construct($db){
			$this->conn = $db;
        }
        
		public function checkPrimaryKey($table, $key, $key2){
			$query = " SELECT * FROM $table WHERE (voters_username='".$key."' AND voters_password='".$key2."')";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->execute();
			return $sel;
		}
    }
?>