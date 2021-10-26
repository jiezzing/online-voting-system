<?php
	class connection
	{
		private $host = "localhost";
		private $dbname = "u662611470_ssc";
		private $username = "u662611470_ssc";
		private $password = "Yf7+Wz#ZjI?!";

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