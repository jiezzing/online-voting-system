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
		public function vote($poll_no, $pos_id, $user_id){
			$query = "UPDATE poll_detail_file SET total_votes=(total_votes + 1) WHERE poll_no='".$poll_no."' AND user_id='".$user_id."' AND pos_id='".$pos_id."'";
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

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

		public function updateUserDetails($name, $age, $address, $motto, $achievements, $department){
			$query = "UPDATE users_profile SET user_fullname='".$name."', user_age='".$age."', user_address='".$address."', user_motto='".$motto."', user_achievements='".$achievements."', user_department='".$department."' WHERE voters_id=?";
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

		public function updatePosition($position){
			$query = "UPDATE positions_file SET pos_name='".$position."' WHERE pos_id=?";
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->bindParam(1, $this->pos_id);

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

		public function publishPosition($status){
			$query = "UPDATE positions_file SET status_id=".$status." WHERE pos_id=?";
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->bindParam(1, $this->pos_id);

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