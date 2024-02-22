<?php
require __DIR__ . '/connection.php';
class CRUD
{
	//เชื่อมต่อฐานข้อมูล
	protected $db;
	function __construct()
	{
	$this->db = DB();
	}
	//ยกเลิกการเชื่อมต่อฐานข้อมูล
	function __destruct()
	{
	$this->db = null;
	}
//********************************** Read Data **********************************
//***********************อ่านข้อมูล
public function Readsetup()
	{
	$query = $this->db->prepare("SELECT * FROM setupdata WHERE sdid=1");
	$query->execute();
	$data = array();
	while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	$data[] = $row;
	}
	return $data;
	}
	
//***********************อ่านข้อมูล
public function Readbooking($ckdate)
	{
	$query = $this->db->prepare(
	"SELECT * FROM booking
	INNER JOIN member
	ON booking.mid=member.mid
	INNER JOIN room
	ON booking.roomid=room.roomid
	WHERE booking.bookdate=:ckdate");
	$query->bindParam("ckdate", $ckdate, PDO::PARAM_STR);
	$query->execute();
	$data = array();
	while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	$data[] = $row;
	}
	return $data;
	}
}
?>