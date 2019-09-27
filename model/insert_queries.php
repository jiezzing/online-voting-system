<?php
	class Insert
	{
        private $conn;
        
        // Connect database
		public function __construct($db){
			$this->conn = $db;
		}
		
		// Voter Profile Registration
		public function votersProfileRegistration(){
			$query = " INSERT INTO voters_profile(voters_name, voters_status) VALUES (?, 1)";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->bindParam(1, $this->voters_name);

			$sel->execute();
			return $sel;
        }
        
        // Voter Account Registration
		public function votersAccountRegistration(){
			$query = " INSERT INTO voters_account(voters_username, voters_password, voters_status) VALUES (?, ?, 1)";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->bindParam(1, $this->voters_username);
			$sel->bindParam(2, $this->voters_password);

			$sel->execute();
			return $sel;
		}
    }
?>