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
			$query = " SELECT * FROM users_account_file, users_profile WHERE (voters_username=? AND voters_password=?) AND users_account_file.voters_id=users_profile.voters_id";
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

		public function getPositionByStatus($status_id){
			$query = " SELECT * FROM positions_file WHERE status_id=".$status_id."";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->execute();
			return $sel;
        }

        // Get all poll
		public function getPoll(){
			$query = " SELECT LPAD(poll_id, 5, '0') as poll_no, poll_id, poll_status, status_name, created_at, (SELECT poll_id FROM poll_file ORDER BY poll_id DESC LIMIT 1) as latest_poll FROM poll_file, status_file WHERE poll_status=status_id ORDER BY poll_id DESC";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->execute();
			return $sel;
        }

		public function getLastId(){
			$query = "SELECT voters_id FROM users_profile ORDER BY voters_id DESC LIMIT 1";
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

		public function getAuditor($status){
			$query = " SELECT * FROM poll_file, poll_detail_file, users_profile WHERE poll_detail_file.poll_status='".$status."' AND poll_detail_file.pos_id=6 AND user_id=voters_id AND poll_file.poll_id=poll_no AND poll_file.poll_id=?";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->bindParam(1, $this->poll_id);
			$sel->execute();
			return $sel;
        }

		public function getSergeantAtArms($status){
			$query = " SELECT * FROM poll_file, poll_detail_file, users_profile WHERE poll_detail_file.poll_status='".$status."' AND poll_detail_file.pos_id=7 AND user_id=voters_id AND poll_file.poll_id=poll_no AND poll_file.poll_id=?";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->bindParam(1, $this->poll_id);
			$sel->execute();
			return $sel;
        }

		public function getRepresentatives($poll_no, $user_id){
			$query = "SELECT rep_id FROM votes_file WHERE voters_id='".$user_id."' AND poll_no='".$poll_no."'";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);
			
			$sel->execute();
			return $sel;
        }

		public function getUsers(){
			$query = "SELECT * FROM users_profile prof, users_account_file acc WHERE prof.voters_id=acc.voters_id";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->execute();
			return $sel;
		}
		
		public function getResult($pos){
			$query = " SELECT * FROM poll_detail_file, users_profile WHERE poll_status=4 AND poll_detail_file.pos_id='".$pos."' AND user_id=voters_id AND poll_no=? ORDER BY total_votes DESC";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->bindParam(1, $this->poll_no);
			$sel->execute();
			return $sel;
        }
		
		public function getPersonalDetails($id){
			$query = " SELECT * FROM users_profile, positions_file WHERE voters_id='".$id."' AND users_profile.pos_id=positions_file.pos_id";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->execute();
			return $sel;
        }

		public function countRepresentatives($poll_no, $pos_id){
			$query = " SELECT COUNT(poll_no) as total FROM poll_detail_file WHERE poll_no='".$poll_no."' AND pos_id='".$pos_id."'";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->execute();
			return $sel;
        }

		public function votedFor($pos_id, $voters_id, $poll_no, $rep_id){
			$query = "SELECT rep_id, EXISTS(SELECT * FROM votes_file WHERE pos_id='".$pos_id."' AND voters_id='".$voters_id."' AND poll_no='".$poll_no."' AND rep_id='".$rep_id."') AS voted FROM votes_file WHERE pos_id='".$pos_id."' AND voters_id='".$voters_id."' AND poll_no='".$poll_no."' AND rep_id='".$rep_id."'";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->execute();
			return $sel;
        }

		public function hasOpenVotes(){
			$query = "SELECT COUNT(poll_id) as active_poll FROM poll_file WHERE poll_status=5 OR poll_status=3";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->execute();
			return $sel;
        }

		public function doneVote($pos_id, $voters_id, $poll_no){
			$query = " SELECT COUNT(pos_id) as done_vote FROM votes_file WHERE pos_id='".$pos_id."' AND voters_id='".$voters_id."' AND poll_no='".$poll_no."'";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->execute();
			return $sel;
        }

		public function getStatistics(){
			$query = "SELECT user_id, user_fullname, total_votes FROM poll_detail_file, users_profile WHERE poll_no=? AND poll_detail_file.pos_id=? AND users_profile.voters_id=poll_detail_file.user_id ORDER BY total_votes DESC";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->bindParam(1, $this->poll_no);
			$sel->bindParam(2, $this->pos_id);

			$sel->execute();
			return $sel;
        }

		public function getPositionDetails($id){
			$query = "SELECT * FROM positions_file WHERE pos_id='".$id."'";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->execute();
			return $sel;
        }

		public function getPositionsInPoll($poll_no){
			$query = "SELECT DISTINCT positions_file.pos_id, positions_file.pos_name FROM poll_detail_file, positions_file WHERE poll_no=".$poll_no." AND positions_file.pos_id=poll_detail_file.pos_id;";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->execute();
			return $sel;
        }

		public function getRepresentativesInPoll($poll_no, $pos_id){
			$query = "SELECT user_id, user_firstname, user_lastname, user_mi, user_address, user_age, user_department, total_votes, poll_status, pos_name, voters_id FROM poll_detail_file, users_profile, positions_file WHERE positions_file.pos_id=users_profile.pos_id AND poll_no=".$poll_no." AND poll_detail_file.user_id=voters_id AND poll_detail_file.pos_id=".$pos_id." ORDER BY user_department, total_votes DESC";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->execute();
			return $sel;
        }

		public function alreadyVoted($poll_no, $voters_id){
			$query = "SELECT COUNT(voters_id) as voted FROM votes_file WHERE poll_no='".$poll_no."' AND voters_id='".$voters_id."'";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->execute();
			return $sel;
        }
    }
?>