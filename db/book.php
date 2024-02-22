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
//***********************อ่านข้อมูล การตั้งค่า
public function Readsetup()
	{
	$query = $this->db->prepare("SELECT * FROM(setupdata) WHERE sdid=1");
	$query->execute();
	$data = array();
	while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	$data[] = $row;
	}
	return $data;
	}

//********************** อ่านข้อมูลห้อง
public function Readcal(){
	$query = $this->db->prepare("SELECT * FROM(cal) WHERE chk=0 ORDER BY dateupdate DESC");
	$query->execute();
	$data = array();
	while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	$data[] = $row;
	}
	return $data;
	}

//**********************
	public function Readcalid($categoryid)
	{
	$query = $this->db->prepare("SELECT * FROM(cal) WHERE categoryid=:categoryid AND chk=0");
	$query->bindParam("categoryid", $categoryid, PDO::PARAM_INT);
	$query->execute();
	$data = array();
	while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	$data[] = $row;
	}
	return $data;
	}

//********************** อ่านข้อมูลห้อง
public function Readcategory(){
	$query = $this->db->prepare("SELECT * FROM(category) WHERE categoryck=1 ORDER BY categoryid ASC");
	$query->execute();
	$data = array();
	while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	$data[] = $row;
	}
	return $data;
	}
	
//****************แสดงข้อมูลประวัติการจองของสมาชิก
public function Readhistory($mid)
	{
	$query = $this->db->prepare(
	"SELECT *
	FROM booking
	INNER JOIN member
	ON member.mid=booking.mid
	INNER JOIN cal
	ON booking.calid=cal.calid
	WHERE booking.mid='$mid' AND member.mid='$mid' AND member.mid=booking.mid AND booking.chk=0 ORDER BY up_date DESC
	"
	)
	;
	$query->execute();
	$data = array();
	while ($row = $query->fetch(PDO::FETCH_ASSOC)){
	$data[] = $row;
	}
	return $data;
	}
	
//****************แสดงข้อมูลประวัติการจองของสมาชิก
public function Readprofile($mid)
	{
	$query = $this->db->prepare("SELECT * FROM member WHERE mid=:mid");
	$query->bindParam("mid", $mid, PDO::PARAM_INT);
	$query->execute();
	$data = array();
	while ($row = $query->fetch(PDO::FETCH_ASSOC)){
	$data[] = $row;
	}
	return $data;
	}
	
//************************อัปเดทรายละเอียดข้อมูลบุคลากร
	public function Updatemember($mid,$pname,$fname,$lname,$email,$password)
	{
	$query = $this->db->prepare("UPDATE member SET pname=:pname,fname=:fname,lname=:lname,email=:email,password=:password WHERE mid=:mid");
	$query->bindParam("mid", $mid, PDO::PARAM_INT);
	$query->bindParam("pname", $pname, PDO::PARAM_STR);
	$query->bindParam("fname", $fname, PDO::PARAM_STR);
	$query->bindParam("lname", $lname, PDO::PARAM_STR);
	$query->bindParam("email", $email, PDO::PARAM_STR);
	$query->bindParam("password", $password, PDO::PARAM_STR);
	$query->execute();
	}
	
//********************************** Booking cal **********************************
//แสดงห้องเฉพาะที่เลือก
public function Bookcal($calid)
	{
	$query = $this->db->prepare("SELECT * FROM cal	WHERE calid=:calid");
	$query->bindParam("calid", $calid, PDO::PARAM_INT);
	$query->execute();
	$data = array();
	while ($row = $query->fetch(PDO::FETCH_ASSOC)){
	$data[] = $row;
	}
	return $data;
	}

//แสดงวันที่จอง
	public function Booking($dateselect)
	{
	$query = $this->db->prepare("SELECT * FROM booking WHERE bookdate=:dateselect AND chk=0");
	$query->bindParam("dateselect", $dateselect, PDO::PARAM_STR);
	$query->execute();
	$data = array();
	while ($row = $query->fetch(PDO::FETCH_ASSOC)){
	$data[] = $row;
	}
	return $data;
	}

//อ่านข้อมูลเวลา
public function Bkbook($sid)
	{
	$query = $this->db->prepare("SELECT * FROM endtime WHERE sid=:sid");
	$query->bindParam("sid", $sid, PDO::PARAM_INT);
	$query->execute();
	$data = array();
	while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	$data[] = $row;
	}
	return $data;
	}

//ตรวจสอบช่วงเวลาการจอง
public function Cktime($bookdate,$calid,$sid,$eid)
	{
	$query = $this->db->prepare("SELECT * FROM booking WHERE bookdate=:bookdate	AND calid=:calid AND end_time>:sid AND start_time<:eid AND chk=0");
	$query->bindParam("bookdate", $bookdate, PDO::PARAM_STR);
	$query->bindParam("calid", $calid, PDO::PARAM_INT);
	$query->bindParam("sid", $sid, PDO::PARAM_INT);
	$query->bindParam("eid", $eid, PDO::PARAM_INT);
	$query->execute();
	$data = array();
	while ($row = $query->fetch(PDO::FETCH_ASSOC)){
	$data[] = $row;
	}
	return $data;
	}

//เช็คสิทธิการจอง 1 วัน มีสิทธิจองได้ 1 ครั้ง
public function Ckbookdate($bookdate,$mid)
	{
	$query = $this->db->prepare("SELECT COUNT(bookdate) as total FROM booking WHERE bookdate=:bookdate AND mid=:mid AND chk=0");
	$query->bindParam("bookdate", $bookdate, PDO::PARAM_STR);
	$query->bindParam("mid", $mid, PDO::PARAM_INT);
	$query->execute();
	$data = array();
	while ($row = $query->fetch(PDO::FETCH_ASSOC)){
	$data[] = $row;
	}
	return $data;
	}

//บันทึกข้อมูลการจอง
public function Addbooking($mid,$calid,$sid,$eid,$topic,$bookdate,$ip)
	{
	$query = $this->db->prepare(
	"
	INSERT INTO booking(mid,calid,start_time,end_time,topic,bookdate,ip)VALUES(:mid,:calid,:sid,:eid,:topic,:bookdate,:ip)");
	$query->bindParam("mid", $mid, PDO::PARAM_INT);
	$query->bindParam("calid", $calid, PDO::PARAM_INT);
	$query->bindParam("sid", $sid, PDO::PARAM_INT);
	$query->bindParam("eid", $eid, PDO::PARAM_INT);
	$query->bindParam("topic", $topic, PDO::PARAM_STR);
	$query->bindParam("bookdate", $bookdate, PDO::PARAM_STR);
	$query->bindParam("ip", $ip, PDO::PARAM_STR);
	$query->execute();
	return $this->db->lastInsertId();
	}

//ตรวจสอบการบันทึกข้อมูลการจอง
public function Ckid($mid,$calid,$bookdate,$sid,$eid)
	{
	$query = $this->db->prepare("SELECT * FROM booking WHERE mid=:mid AND calid=:calid AND bookdate=:bookdate AND start_time=:sid AND end_time=:eid AND chk=0");
	$query->bindParam("mid", $mid, PDO::PARAM_INT);
	$query->bindParam("calid", $calid, PDO::PARAM_INT);
	$query->bindParam("bookdate", $bookdate, PDO::PARAM_STR);
	$query->bindParam("sid", $sid, PDO::PARAM_INT);
	$query->bindParam("eid", $eid, PDO::PARAM_INT);
	$query->execute();
	$data = array();
	while ($row = $query->fetch(PDO::FETCH_ASSOC)){
	$data[] = $row;
	}
	return $data;
	}
	
//**************************************แก้ไขหัวข้อ
public function Updatetopic($bookid,$topic)
	{
	$query = $this->db->prepare("UPDATE booking SET	topic=:topic WHERE bookid=:bookid");
	$query->bindParam("bookid", $bookid, PDO::PARAM_INT);
	$query->bindParam("topic", $topic, PDO::PARAM_STR);
	$query->execute();
	}
	
//***************************************ยกเลิกการจอง
public function Deletebook($bookid)
	{
	$query = $this->db->prepare("UPDATE booking SET	chk=1 WHERE bookid=:bookid");
	$query->bindParam("bookid", $bookid, PDO::PARAM_INT);
	$query->execute();
	}
}
?>