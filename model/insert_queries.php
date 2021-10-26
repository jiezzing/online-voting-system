<?php
	class Insert
	{
        private $conn;
        
        // Connect database
		public function __construct($db){
			$this->conn = $db;
		}
		
		// Admin User Profile Registration - a candidate
		public function candidateProfileRegistration(){
			$query = " INSERT INTO users_profile(pos_id, type_id, user_age, user_address, user_motto, user_achievements, user_department, user_status, user_firstname, user_lastname, user_mi, user_photo, image_path) VALUES (?, 3, ?, ?, ?, ?, ?, 1, ?, ?, ?, ?, ?)";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->bindParam(1, $this->pos_id);
			$sel->bindParam(2, $this->user_age);
			$sel->bindParam(3, $this->user_address);
			$sel->bindParam(4, $this->user_motto);
			$sel->bindParam(5, $this->user_achievements);
			$sel->bindParam(6, $this->user_department);
			$sel->bindParam(7, $this->user_firstname);
			$sel->bindParam(8, $this->user_lastname);
			$sel->bindParam(9, $this->user_mi);
			$sel->bindParam(10, $this->user_photo);
			$sel->bindParam(11, $this->image_path);

			$sel->execute();
			return $sel;
        }
		
		// Voter Registration - not a candidate
		public function usersProfileRegistration(){
			$query = " INSERT INTO users_profile(pos_id, type_id, user_fullname, user_age, user_address, user_motto, user_achievements, user_department, user_status) VALUES (?, ?, ?, NULL, NULL, NULL, NULL, NULL, 1)";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->bindParam(1, $this->pos_id);
			$sel->bindParam(2, $this->type_id);
			$sel->bindParam(3, $this->user_fullname);

			$sel->execute();
			return $sel;
        }
        
        // Voter Account Registration
		public function usersAccountRegistration(){
			$query = " INSERT INTO users_account_file(voters_username, voters_password, voters_status) VALUES (?, ?, 1)";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->bindParam(1, $this->voters_username);
			$sel->bindParam(2, $this->voters_password);

			$sel->execute();
			return $sel;
		}
        
        // Create new poll
		public function createPoll(){
			$query = " INSERT INTO poll_file(created_at, started_at, end_at, poll_status) VALUES (?, NULL, NULL, 3)";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->bindParam(1, $this->created_at);

			$sel->execute();
			return $sel;
		}
        
		public function createPollDetailFile(){
			$query = "INSERT INTO poll_detail_file(poll_no, user_id, pos_id, total_votes, poll_status) VALUES (?, ?, ?, 0, 3)";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->bindParam(1, $this->poll_no);
			$sel->bindParam(2, $this->user_id);
			$sel->bindParam(3, $this->pos_id);

			$sel->execute();
			return $sel;
		}
        
		public function saveVotes(){
			$query = "INSERT INTO votes_file(pos_id, voters_id, poll_no, rep_id, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?)";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->bindParam(1, $this->pos_id);
			$sel->bindParam(2, $this->voters_id);
			$sel->bindParam(3, $this->poll_no);
			$sel->bindParam(4, $this->rep_id);
			$sel->bindParam(5, $this->created_at);
			$sel->bindParam(6, $this->updated_at);

			$sel->execute();
			return $sel;
		}
        
		public function addPosition(){
			$query = "INSERT INTO positions_file(pos_name, status_id) VALUES (?, ?)";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->bindParam(1, $this->pos_name);
			$sel->bindParam(2, $this->status_id);

			$sel->execute();
			return $sel;
		}
    }
?>