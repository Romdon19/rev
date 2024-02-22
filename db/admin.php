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
	
//********************** อ่านข้อมูลการจอง
public function Readdatenow($ckdate)
	{
	$query = $this->db->prepare("
	SELECT *
	FROM(booking)
	INNER JOIN(cal)
	ON booking.calid=cal.calid
	INNER JOIN(member)
	ON booking.mid=member.mid
	WHERE booking.chk=0 AND booking.bookdate=:ckdate ORDER BY booking.up_date ASC");
	$query->bindParam("ckdate", $ckdate, PDO::PARAM_STR);
	$query->execute();
	$data = array();
	while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	$data[] = $row;
	}
	return $data;
	}
	
//********************** อ่านข้อมูลการจอง
public function Readforward($ckdate)
	{
	$query = $this->db->prepare("
	SELECT *
	FROM(booking)
	INNER JOIN(cal)
	ON booking.calid=cal.calid
	INNER JOIN(member)
	ON booking.mid=member.mid
	WHERE booking.chk=0 AND :ckdate<booking.bookdate ORDER BY booking.bookdate ASC");
	$query->bindParam("ckdate", $ckdate, PDO::PARAM_STR);
	$query->execute();
	$data = array();
	while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	$data[] = $row;
	}
	return $data;
	}

//********************** อ่านข้อมูลสมาชิก
public function Readmember(){
	$query = $this->db->prepare("SELECT * FROM(member) WHERE chk=0 ORDER BY dateupdate DESC");
	$query->execute();
	$data = array();
	while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	$data[] = $row;
	}
	return $data;
	}
	
//********************** อ่านข้อมูลสมาชิก
public function Readassit(){
	$query = $this->db->prepare("SELECT * FROM(admin) WHERE chk=1 ORDER BY aid ASC");
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
	
//********************** อ่านข้อมูลขนาด
public function Readsize(){
	$query = $this->db->prepare("SELECT * FROM(size) WHERE sizeck=1 ORDER BY sizeid ASC");
	$query->execute();
	$data = array();
	while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	$data[] = $row;
	}
	return $data;
	}

//********************** อ่านข้อมูลห้อง
public function Readcal(){
	$query = $this->db->prepare("SELECT *
	FROM(cal)
	INNER JOIN(category)
	ON cal.categoryid=category.categoryid
	WHERE cal.chk=0 ORDER BY cal.dateupdate DESC");
	$query->execute();
	$data = array();
	while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	$data[] = $row;
	}
	return $data;
	}
	
//********************** อ่านข้อมูลเวลาเริ่ม
public function Readstarttime(){
	$query = $this->db->prepare("SELECT * FROM(start) ORDER BY sid ASC");
	$query->execute();
	$data = array();
	while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	$data[] = $row;
	}
	return $data;
	}
	
//********************** อ่านข้อมูลเวลาสิ้นสุด
public function Readendtime(){
	$query = $this->db->prepare("SELECT * FROM(endtime) ORDER BY eid ASC");
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
	
//ตรวจสอบ Admin Username ซ้ำ
	public function Checkuname($uname)
	{
	$query = $this->db->prepare(" SELECT * FROM admin WHERE uname=:uname AND chk=0");
	$query->bindParam("uname", $uname, PDO::PARAM_STR);
	$query->execute();
	$data = array();
	while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	$data[] = $row;
	}
	return $data;
	}

//ตรวจสอบรหัสห้องซ้ำ
public function Checkcalcode($calcode)
	{
	$query = $this->db->prepare(" SELECT * FROM cal WHERE calcode=:calcode AND chk=0");
	$query->bindParam("calcode", $calcode, PDO::PARAM_STR);
	$query->execute();
	$data = array();
	while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	$data[] = $row;
	}
	return $data;
	}
	
//****************************ตรวจสอบข้อมูล
public function Ckcategoryname($categoryname)
	{
	$query = $this->db->prepare("SELECT * FROM category WHERE categoryname=:categoryname AND categoryck=1");
	$query->bindParam("categoryname", $categoryname, PDO::PARAM_STR);
	$query->execute();
	$data = array();
	while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	$data[] = $row;
	}
	return $data;
	}
	
//****************************ตรวจสอบข้อมูลขนาด
public function Cksizename($sizename)
	{
	$query = $this->db->prepare("SELECT * FROM size WHERE sizename=:sizename AND sizeck=1");
	$query->bindParam("sizename", $sizename, PDO::PARAM_STR);
	$query->execute();
	$data = array();
	while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	$data[] = $row;
	}
	return $data;
	}
	
//***********************อ่านข้อมูล
public function Searchbooking()
	{
	$query = $this->db->prepare(
	"SELECT * FROM booking
	INNER JOIN member
	ON booking.mid=member.mid
	INNER JOIN cal
	ON booking.calid=cal.calid
	");
	$query->execute();
	$data = array();
	while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	$data[] = $row;
	}
	return $data;
	}
	
//***********************
	public function Numcheck($dates,$datef){
		$query = $this->db->prepare("SELECT * FROM booking WHERE (bookdate BETWEEN :dates AND :datef)");
		$query->bindParam("dates", $dates, PDO::PARAM_STR);
		$query->bindParam("datef", $datef, PDO::PARAM_STR);
		$query->execute();
		$data = array();
		while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}

//***********************
	public function Listcheck($dates,$datef){
		$query = $this->db->prepare(
		"SELECT * FROM booking
		INNER JOIN member
		ON booking.mid=member.mid
		INNER JOIN cal
		ON booking.calid=cal.calid
		WHERE (bookdate BETWEEN :dates AND :datef) AND booking.chk=0
		ORDER BY bookdate ASC");
		$query->bindParam("dates", $dates, PDO::PARAM_STR);
		$query->bindParam("datef", $datef, PDO::PARAM_STR);
		$query->execute();
		$data = array();
		while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}

//********************************** Create Data **********************************
//*****************Create Member
public function Registermember($pname,$fname,$lname,$email,$tel,$chk,$password,$ip,$daterecord){
	$query = $this->db->prepare("INSERT INTO member(pname,fname,lname,email,tel,chk,password,ip,daterecord)VALUES(:pname,:fname,:lname,:email,:tel,:chk,:password,:ip,:daterecord)");
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
	
//*****************Create admin
public function Createassit($apname,$afname,$alname,$uname,$upass,$cls,$chk,$ip,$createdate){
	$query = $this->db->prepare("INSERT INTO admin(apname,afname,alname,uname,upass,cls,chk,ip,createdate)VALUES(:apname,:afname,:alname,:uname,:upass,:cls,:chk,:ip,:createdate)");
	$query->bindParam("apname", $apname, PDO::PARAM_STR);
	$query->bindParam("afname", $afname, PDO::PARAM_STR);
	$query->bindParam("alname", $alname, PDO::PARAM_STR);
	$query->bindParam("uname", $uname, PDO::PARAM_STR);
	$query->bindParam("upass", $upass, PDO::PARAM_STR);
	$query->bindParam("cls", $cls, PDO::PARAM_INT);
	$query->bindParam("chk", $chk, PDO::PARAM_STR);
	$query->bindParam("ip", $ip, PDO::PARAM_STR);
	$query->bindParam("createdate", $createdate, PDO::PARAM_STR);
	$query->execute();
	return $this->db->lastInsertId();
	}

//*****************Create cal
public function Registercal($categoryid,$calcode,$calname,$size,$chk,$daterecord){
	$query = $this->db->prepare("INSERT INTO cal(categoryid,calcode,calname,size,chk,daterecord)VALUES(:categoryid,:calcode,:calname,:size,:chk,:daterecord)");
	$query->bindParam("categoryid", $categoryid, PDO::PARAM_INT);
	$query->bindParam("calcode", $calcode, PDO::PARAM_STR);
	$query->bindParam("calname", $calname, PDO::PARAM_STR);
	$query->bindParam("size", $size, PDO::PARAM_INT);
	$query->bindParam("chk", $chk, PDO::PARAM_INT);
	$query->bindParam("daterecord", $daterecord, PDO::PARAM_STR);
	$query->execute();
	return $this->db->lastInsertId();
	}
	
//*****************Create category
public function Regiscategory($categoryname,$categoryck){
	$query = $this->db->prepare("INSERT INTO category(categoryname,categoryck)VALUES(:categoryname,:categoryck)");
	$query->bindParam("categoryname", $categoryname, PDO::PARAM_STR);
	$query->bindParam("categoryck", $categoryck, PDO::PARAM_INT);
	$query->execute();
	return $this->db->lastInsertId();
	}
	
//*****************Create size
public function Regissize($sizename,$sizeck){
	$query = $this->db->prepare("INSERT INTO size(sizename,sizeck)VALUES(:sizename,:sizeck)");
	$query->bindParam("sizename", $sizename, PDO::PARAM_STR);
	$query->bindParam("sizeck", $sizeck, PDO::PARAM_INT);
	$query->execute();
	return $this->db->lastInsertId();
	}

//********************************** Update Data **********************************
//**********************อัปเดทUpimg
public function Upimg($sdid,$newname)
	{
	$query = $this->db->prepare("UPDATE setupdata SET img=:newname WHERE sdid=:sdid");
	$query->bindParam("sdid", $sdid, PDO::PARAM_INT);
	$query->bindParam("newname", $newname, PDO::PARAM_STR);
	$query->execute();
	}

//************************อัปเดทตั้งค่าข้อมูล
public function Updatesetupdata($sdid,$office,$title,$admin,$rootmail,$rootpass,$hostmail,$durl,$footer1,$footer2,$num){
	$query = $this->db->prepare("UPDATE setupdata SET office=:office,title=:title,admin=:admin,rootmail=:rootmail,rootpass=:rootpass,hostmail=:hostmail,durl=:durl,footer1=:footer1,footer2=:footer2,num=:num WHERE sdid=:sdid");
	$query->bindParam("sdid", $sdid, PDO::PARAM_INT);
	$query->bindParam("office", $office, PDO::PARAM_STR);
	$query->bindParam("title", $title, PDO::PARAM_STR);
	$query->bindParam("admin", $admin, PDO::PARAM_STR);
	$query->bindParam("rootmail", $rootmail, PDO::PARAM_STR);
	$query->bindParam("rootpass", $rootpass, PDO::PARAM_STR);
	$query->bindParam("hostmail", $hostmail, PDO::PARAM_STR);
	$query->bindParam("durl", $durl, PDO::PARAM_STR);
	$query->bindParam("footer1", $footer1, PDO::PARAM_STR);
	$query->bindParam("footer2", $footer2, PDO::PARAM_STR);
	$query->bindParam("num", $num, PDO::PARAM_INT);
	$query->execute();
	}

//************************
public function Updatemember($mid,$pname,$fname,$lname,$password)
	{
	$query = $this->db->prepare("UPDATE member SET pname=:pname,fname=:fname,lname=:lname,password=:password WHERE mid=:mid");
	$query->bindParam("mid", $mid, PDO::PARAM_INT);
	$query->bindParam("pname", $pname, PDO::PARAM_STR);
	$query->bindParam("fname", $fname, PDO::PARAM_STR);
	$query->bindParam("lname", $lname, PDO::PARAM_STR);
	$query->bindParam("password", $password, PDO::PARAM_STR);
	$query->execute();
	}
	
//************************
public function Updateadmin($aid,$apname,$afname,$alname,$upass,$cls)
	{
	$query = $this->db->prepare("UPDATE admin SET apname=:apname,afname=:afname,alname=:alname,upass=:upass,cls=:cls WHERE aid=:aid AND aid!=1");
	$query->bindParam("aid", $aid, PDO::PARAM_INT);
	$query->bindParam("apname", $apname, PDO::PARAM_STR);
	$query->bindParam("afname", $afname, PDO::PARAM_STR);
	$query->bindParam("alname", $alname, PDO::PARAM_STR);
	$query->bindParam("upass", $upass, PDO::PARAM_STR);
	$query->bindParam("cls", $cls, PDO::PARAM_STR);
	$query->execute();
	}
	
	//************************
public function Resetadmin($aid,$upass)
	{
	$query = $this->db->prepare("UPDATE admin SET upass=:upass WHERE aid=:aid AND aid!=1");
	$query->bindParam("aid", $aid, PDO::PARAM_INT);
	$query->bindParam("upass", $upass, PDO::PARAM_STR);
	$query->execute();
	}

//************************
public function Updatecal($calid,$calcode,$calname,$size)
	{
	$query = $this->db->prepare("UPDATE cal SET calcode=:calcode,calname=:calname,size=:size WHERE calid=:calid");
	$query->bindParam("calid", $calid, PDO::PARAM_INT);
	$query->bindParam("calcode", $calcode, PDO::PARAM_STR);
	$query->bindParam("calname", $calname, PDO::PARAM_STR);
	$query->bindParam("size", $size, PDO::PARAM_INT);
	$query->execute();
	}
	
//************************
public function Updatecategory($categoryid,$categoryname)
	{
	$query = $this->db->prepare("UPDATE category SET categoryname=:categoryname WHERE categoryid=:categoryid");
	$query->bindParam("categoryid", $categoryid, PDO::PARAM_INT);
	$query->bindParam("categoryname", $categoryname, PDO::PARAM_STR);
	$query->execute();
	}
	
//************************
public function Updatesize($sizeid,$sizename)
	{
	$query = $this->db->prepare("UPDATE size SET sizename=:sizename WHERE sizeid=:sizeid");
	$query->bindParam("sizeid", $sizeid, PDO::PARAM_INT);
	$query->bindParam("sizename", $sizename, PDO::PARAM_STR);
	$query->execute();
	}

//********************************** Delete Data **********************************
//************************
	public function Deletemember($mid){
	$query = $this->db->prepare("UPDATE member SET chk=1 WHERE mid=:mid");
	$query->bindParam("mid", $mid, PDO::PARAM_INT);
	$query->execute();
	}
	
//************************
	public function Deleteadmin($aid){
	$query = $this->db->prepare("UPDATE admin SET chk=0 WHERE aid=:aid AND aid!=1");
	$query->bindParam("aid", $aid, PDO::PARAM_INT);
	$query->execute();
	}
	
//************************
	public function Deletecategory($categoryid){
	$query = $this->db->prepare("UPDATE category SET categoryck=0 WHERE categoryid=:categoryid");
	$query->bindParam("categoryid", $categoryid, PDO::PARAM_INT);
	$query->execute();
	}
	
//************************
	public function Deletesize($sizeid){
	$query = $this->db->prepare("UPDATE size SET sizeck=0 WHERE sizeid=:sizeid");
	$query->bindParam("sizeid", $sizeid, PDO::PARAM_INT);
	$query->execute();
	}

//************************
	public function Deletecal($calid){
	$query = $this->db->prepare("UPDATE cal SET chk=1 WHERE calid=:calid");
	$query->bindParam("calid", $calid, PDO::PARAM_INT);
	$query->execute();
	}
	
//********************************** Booking cal **********************************
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