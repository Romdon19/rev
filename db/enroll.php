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
	$query = $this->db->prepare("SELECT * FROM setupdata WHERE sdid=1");
	$query->execute();
	$data = array();
	while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	$data[] = $row;
	}
	return $data;
	}

//ตรวจสอบเบอร์โทรซ้ำ
	public function Checktel($tel)
	{
	$query = $this->db->prepare(" SELECT * FROM member WHERE tel=:tel AND chk=0");
	$query->bindParam("tel", $tel, PDO::PARAM_STR);
	$query->execute();
	$data = array();
	while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	$data[] = $row;
	}
	return $data;
	}

//ตรวจสอบอีเมล์ซ้ำ
	public function Checkemail($email)
	{
	$query = $this->db->prepare(" SELECT * FROM member WHERE email=:email AND chk=0");
	$query->bindParam("email", $email, PDO::PARAM_STR);
	$query->execute();
	$data = array();
	while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	$data[] = $row;
	}
	return $data;
	}

//ตรวจสอบเบอร์โทรและรหัสผ่าน
	public function Checkuser($tel,$pass)
	{
	$query = $this->db->prepare("SELECT * FROM member WHERE tel=:tel AND pass=:pass AND chk=0");
	$query->bindParam("tel", $tel, PDO::PARAM_STR);
	$query->bindParam("pass", $pass, PDO::PARAM_STR);
	$query->execute();
	$data = array();
	while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	$data[] = $row;
	}
	return $data;
	}

//ตรวจสอบ ID สมาชิก
	public function Ckmid($mid)
	{
	$query = $this->db->prepare("SELECT * FROM member WHERE mid=:mid AND chk=0");
	$query->bindParam("mid", $mid, PDO::PARAM_INT);
	$query->execute();
	$data = array();
	while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	$data[] = $row;
	}
	return $data;
	}

//ตรวจสอบอีเมล์และพาสเวิด
	public function Ckpassword($email,$password)
	{
	$query = $this->db->prepare("SELECT * FROM member WHERE email=:email AND password=:password");
	$query->bindParam("email", $email, PDO::PARAM_STR);
	$query->bindParam("password", $password, PDO::PARAM_STR);
	$query->execute();
	$data = array();
	while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	$data[] = $row;
	}
	return $data;
	}

//**********************อ่านข้อมูลสมาชิกลงทะเบียน
	public function Readrandomid($randomid)
	{
	$query = $this->db->prepare("SELECT * FROM(member) WHERE member.randomid=:randomid");
	$query->bindParam("randomid",$randomid, PDO::PARAM_STR);
	$query->execute();
	$data = array();
	while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	$data[] = $row;
	}
	return $data;
	}
	
//**********************ตำแหน่ง
public function Readcls()
	{
	$query = $this->db->prepare("SELECT * FROM(cls)");
	$query->execute();
	$data = array();
	while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	$data[] = $row;
	}
	return $data;
	}

//********************************** Create Data **********************************

//member Register
	public function Register($randomid,$pname,$fname,$lname,$email,$tel,$chk,$password,$ip,$daterecord){
	$query = $this->db->prepare("INSERT INTO member(randomid,pname,fname,lname,email,tel,chk,password,ip,daterecord)VALUES(:randomid,:pname,:fname,:lname,:email,:tel,:chk,:password,:ip,:daterecord)");
	$query->bindParam("randomid", $randomid, PDO::PARAM_STR);
	$query->bindParam("pname", $pname, PDO::PARAM_STR);
	$query->bindParam("fname", $fname, PDO::PARAM_STR);
	$query->bindParam("lname", $lname, PDO::PARAM_STR);
	$query->bindParam("email", $email, PDO::PARAM_STR);
	$query->bindParam("tel", $tel, PDO::PARAM_STR);
	$query->bindParam("chk", $chk, PDO::PARAM_INT);
	$query->bindParam("password", $password, PDO::PARAM_STR);
	$query->bindParam("ip", $ip, PDO::PARAM_STR);
	$query->bindParam("daterecord", $daterecord, PDO::PARAM_STR);
	$query->execute();
	return $this->db->lastInsertId();
	}


//********************************** Update Data **********************************

//************************อัปเดทยกเลิกข้อมูลลงทะเบียน
	public function Delete($mid){
	$query = $this->db->prepare("UPDATE member SET chk=1 WHERE mid=:mid");
	$query->bindParam("mid", $mid, PDO::PARAM_INT);
	$query->execute();
	}

//************************อัปเดทยืนยันข้อมูลลงทะเบียน
	public function Verify($mid){
	$query = $this->db->prepare("UPDATE member SET chk=0 WHERE mid=:mid");
	$query->bindParam("mid", $mid, PDO::PARAM_INT);
	$query->execute();
	}

//************************อัปเดทรายละเอียดข้อมูลบุคลากร
	public function Updatemember($mid,$pname,$fname,$lname,$email)
	{
	$query = $this->db->prepare("UPDATE member SET pname=:pname,fname=:fname,lname=:lname,email=:email WHERE mid=:mid");
	$query->bindParam("mid", $mid, PDO::PARAM_INT);
	$query->bindParam("pname", $pname, PDO::PARAM_STR);
	$query->bindParam("fname", $fname, PDO::PARAM_STR);
	$query->bindParam("lname", $lname, PDO::PARAM_STR);
	$query->bindParam("email", $email, PDO::PARAM_STR);
	$query->execute();
	}

//เปลี่ยนรหัสผ่าน
	public function Upnewpassword($mid,$newpassword){
	$query = $this->db->prepare("UPDATE member SET password=:newpassword WHERE mid=:mid");
	$query->bindParam("mid", $mid, PDO::PARAM_INT);
	$query->bindParam("newpassword", $newpassword, PDO::PARAM_STR);
	$query->execute();
	}

//********************************** Send Line **********************************
//ลงทะเบียนสำเร็จ ส่งไลน์
	public function Readline($mid){
		$query = $this->db->prepare("SELECT * FROM(member) WHERE member.mid=:mid");
		$query->bindParam("mid", $mid, PDO::PARAM_INT);
		$query->execute();
		$data = array();
		while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}

}
?>