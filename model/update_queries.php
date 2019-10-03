<?php
	class Update
	{        
        // Connect database
		public function __construct($db){
			$this->conn = $db;
		}

		// Update rcp file
		public function openForVoting($start){

			$query = "UPDATE poll_file SET poll_status='5', started_at='".$start."' WHERE poll_id=?";
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->bindParam(1, $this->poll_id);

			if($sel->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
			return $sel;
        }

		public function openForVotingDetail(){

			$query = "UPDATE poll_detail_file SET poll_status='5' WHERE poll_no=?";
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->bindParam(1, $this->poll_no);

			if($sel->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
			return $sel;
        }

		// Update rcp file
		public function closeVoting($end){

			$query = "UPDATE poll_file SET poll_status='4', end_at='".$end."' WHERE poll_id=?";
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->bindParam(1, $this->poll_id);

			if($sel->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
			return $sel;
        }

		// Update rcp file
		public function closeVotingDetail(){

			$query = "UPDATE poll_detail_file SET poll_status='4' WHERE poll_no=?";
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->bindParam(1, $this->poll_no);

			if($sel->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
			return $sel;
        }

		// Update rcp file
		public function vote($pos){
			$query = "UPDATE poll_detail_file SET total_votes=(total_votes + 1) WHERE poll_no=? AND user_id=? AND pos_id='".$pos."'";
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->bindParam(1, $this->poll_no);
			$sel->bindParam(2, $this->user_id);

			if($sel->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
			return $sel;
		}

		// Update rcp file
		public function updateUserDetails($name, $pos, $age, $address, $motto, $achievements){
			$query = "UPDATE users_profile SET pos_id='".$pos."', user_fullname='".$name."', user_age='".$age."', user_address='".$address."', user_motto='".$motto."', user_achievements='".$achievements."', user_image=NULL WHERE voters_id=?";
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->bindParam(1, $this->voters_id);

			if($sel->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
			return $sel;
        }
    }
?>