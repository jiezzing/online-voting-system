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

        // Get user type
		public function getUserType(){
			$query = " SELECT * FROM user_type_file";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->execute();
			return $sel;
        }

        // Get all positions
		public function getPositions(){
			$query = " SELECT * FROM positions_file";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->execute();
			return $sel;
        }

        // Get all poll
		public function getPoll(){
			$query = " SELECT LPAD(poll_id, 5, '0') as poll_no, poll_id, poll_status, status_name FROM poll_file, status_file WHERE poll_status=status_id ORDER BY poll_id DESC";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->execute();
			return $sel;
        }

        // Count all users
		public function countUsers(){
			$query = " SELECT COUNT(voters_id) AS user_id FROM users_profile";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->execute();
			return $sel;
        }

        // Count all users
		public function getAllPresident(){
			$query = " SELECT * FROM poll_detail_file, users_profile WHERE poll_status=3 AND pos_id=1 AND user_id=voters_id";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->execute();
			return $sel;
        }
    }
?>