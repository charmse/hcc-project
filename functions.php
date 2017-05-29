<?php
class functions {
	private $db;
	public function __construct(database $db)
	{
		$this->db = $db;
	}
	public function get_blocks_json($ip)
	{
		$query = sprintf("SELECT locId FROM Blocks WHERE %s >= startIpNum AND %s <= endIpNum;", $ip, $ip);
		//$query = "SELECT locId FROM Blocks WHERE %s >= startIpNum AND %s<= endIpNum";
		$param = $ip;
		$result = $this->db->dataQuery($query, $param);
		return $result;
	}
	public function get_location_json($locId)
	{
		$query = "SELECT * FROM Location WHERE locId = ?;";
		$param = $locId;
		$result = $this->db->dataQuery($query, $param);
		return $result->fetchAll();
	}
}
?>
