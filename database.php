<?php
class database {
	private $conn = null;
    private $error = "Yep!";
	public function __construct()
	{
		try {
			$username = "charms";
			$password = "qIX39r";
			$servername = "cse.unl.edu";
			$this->conn = new PDO("mysql:host=$servername;dbname=charms", $username, $password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			$this->error = $e->getMessage();
			trigger_error("Error: " . $e->getMessage());
		}
	}
	public function dataQuery($query, $param)
	{
		try {
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			return $stmt->fetch();
		} catch (PDOException $e) {
			$this->error = $e->getMessage();
			trigger_error("Error: " . $e->getMessage());
			//return $e->getMessage();
		};
	}
	public function isConnected()
	{
		$ret = $this->error;
		$this->error = "Yep!";
		return $ret;
	}
}
?>
