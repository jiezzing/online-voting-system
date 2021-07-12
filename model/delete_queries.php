<?php
	class Delete
	{
        private $conn;
        
		public function __construct($db){
			$this->conn = $db;
		}
        
		public function deletePoll($id){
			$query = "DELETE FROM poll_file WHERE poll_id='".$id."'";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->execute();
			return $sel;
		}
        
		public function deletePollDetails($id){
			$query = "DELETE FROM poll_detail_file WHERE poll_no='".$id."'";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->execute();
			return $sel;
		}
        
		public function deletePollRepresentative($id){
			$query = "DELETE FROM users_account_file WHERE voters_id='".$id."'";
			$query2 = "DELETE FROM users_profile WHERE voters_id='".$id."'";
			$query3 = "DELETE FROM poll_detail_file WHERE user_id='".$id."'";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);
			$sel2 = $this->conn->prepare($query2);
			$sel3 = $this->conn->prepare($query3);

			$sel->execute();
			$sel2->execute();
			$sel3->execute();
            
			return $sel;
		}
    }
?>