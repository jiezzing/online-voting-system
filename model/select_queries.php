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
			$query = " SELECT * FROM users_profile, users_account_file WHERE voters_username=? AND voters_password=? AND users_account_file.voters_id=users_profile.voters_id";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->bindParam(1, $this->voters_username);
			$sel->bindParam(2, $this->voters_password);

			$sel->execute();
			return $sel;
        }

        // Check user type
		public function checkType(){
			$query = " SELECT * FROM users_account_file, users_profile WHERE voters_username=? AND voters_password=? AND users_account_file.voters_id=users_profile.voters_id";
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
			$query = " SELECT LPAD(poll_id, 5, '0') as poll_no, poll_id, poll_status, status_name, created_at FROM poll_file, status_file WHERE poll_status=status_id ORDER BY poll_id DESC";
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

        // Get all president
		public function getPresident($status){
			$query = " SELECT * FROM poll_file, poll_detail_file, users_profile WHERE poll_detail_file.poll_status='".$status."' AND poll_detail_file.pos_id=1 AND user_id=voters_id AND poll_file.poll_id=poll_no AND poll_file.poll_id=?";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->bindParam(1, $this->poll_id);
			$sel->execute();
			return $sel;
        }

        // Get all president
		public function getVicePresident($status){
			$query = " SELECT * FROM poll_file, poll_detail_file, users_profile WHERE poll_detail_file.poll_status='".$status."' AND poll_detail_file.pos_id=2 AND user_id=voters_id AND poll_file.poll_id=poll_no AND poll_file.poll_id=?";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->bindParam(1, $this->poll_id);
			$sel->execute();
			return $sel;
        }

        // Get all secratary
		public function getSecretary($status){
			$query = " SELECT * FROM poll_file, poll_detail_file, users_profile WHERE poll_detail_file.poll_status='".$status."' AND poll_detail_file.pos_id=3 AND user_id=voters_id AND poll_file.poll_id=poll_no AND poll_file.poll_id=?";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->bindParam(1, $this->poll_id);
			$sel->execute();
			return $sel;
        }

        // Get all secratary
		public function getTreasurer($status){
			$query = " SELECT * FROM poll_file, poll_detail_file, users_profile WHERE poll_detail_file.poll_status='".$status."' AND poll_detail_file.pos_id=4 AND user_id=voters_id AND poll_file.poll_id=poll_no AND poll_file.poll_id=?";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->bindParam(1, $this->poll_id);
			$sel->execute();
			return $sel;
        }

        // Get all secratary
		public function getPIO($status){
			$query = " SELECT * FROM poll_file, poll_detail_file, users_profile WHERE poll_detail_file.poll_status='".$status."' AND poll_detail_file.pos_id=5 AND user_id=voters_id AND poll_file.poll_id=poll_no AND poll_file.poll_id=?";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->bindParam(1, $this->poll_id);
			$sel->execute();
			return $sel;
        }

        // Get all secratary
		public function getAuditor($status){
			$query = " SELECT * FROM poll_file, poll_detail_file, users_profile WHERE poll_detail_file.poll_status='".$status."' AND poll_detail_file.pos_id=6 AND user_id=voters_id AND poll_file.poll_id=poll_no AND poll_file.poll_id=?";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->bindParam(1, $this->poll_id);
			$sel->execute();
			return $sel;
        }

        // Get all secratary
		public function getSergeantAtArms($status){
			$query = " SELECT * FROM poll_file, poll_detail_file, users_profile WHERE poll_detail_file.poll_status='".$status."' AND poll_detail_file.pos_id=7 AND user_id=voters_id AND poll_file.poll_id=poll_no AND poll_file.poll_id=?";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->bindParam(1, $this->poll_id);
			$sel->execute();
			return $sel;
        }

        // Get all secratary
		public function getRepresentatives($status){
			$query = " SELECT * FROM poll_file, poll_detail_file, users_profile WHERE poll_detail_file.poll_status='".$status."' AND poll_detail_file.pos_id=8 AND user_id=voters_id AND poll_file.poll_id=poll_no AND poll_file.poll_id=?";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->bindParam(1, $this->poll_id);
			$sel->execute();
			return $sel;
        }

        // Get all secratary
		public function getUsers(){
			$query = "SELECT * FROM users_profile prof, users_account_file acc WHERE prof.voters_id=acc.voters_id";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->execute();
			return $sel;
		}
		
        // Get all president
		public function getResult($pos){
			$query = " SELECT * FROM poll_detail_file, users_profile WHERE poll_status=4 AND poll_detail_file.pos_id='".$pos."' AND user_id=voters_id AND poll_no=? ORDER BY total_votes DESC";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->bindParam(1, $this->poll_no);
			$sel->execute();
			return $sel;
        }
    }
?>