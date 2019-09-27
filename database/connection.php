<?php
	class connection
	{
		private $host = "localhost";
		private $dbname = "ovs_db";
		private $username = "root";
		private $password = "";

		private $conn;

		public function connect()
		{
			$this->conn = null;

			try
			{
				$this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" .$this->dbname, $this->username, $this->password);
			}
			catch(PDOException $exception)
			{
				echo "Connection error: ". $exception->getMessage();
			}
			return $this->conn;
		}
	}
?>