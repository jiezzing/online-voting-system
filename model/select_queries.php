<?php
	class Select
	{
        private $conn;
        
        // Connect database
		public function __construct($db){
			$this->conn = $db;
		}
		
		// Login
		public function login(){
			$query = " SELECT * FROM voters_account, voters_profile WHERE voters_username=? AND voters_password=? AND voters_account.voters_id=voters_profile.voters_id";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->bindParam(1, $this->voters_username);
			$sel->bindParam(2, $this->voters_password);

			$sel->execute();
			return $sel;
        }

        // Check user type
		public function checkType(){
			$query = " SELECT * FROM voters_account, voters_profile WHERE voters_username=? AND voters_password=? AND voters_account.voters_id=voters_profile.voters_id";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->bindParam(1, $this->voters_username);
			$sel->bindParam(2, $this->voters_password);

			$sel->execute();
			return $sel;
        }
    }
?>