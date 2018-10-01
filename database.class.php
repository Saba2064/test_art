<?php
class Database {
 
       private $host = 'localhost'; //ชื่อ Host 
	   private $user = 'root'; //ชื่อผู้ใช้งาน ฐานข้อมูล
	   private $password = '12345678'; // password สำหรับเข้าจัดการฐานข้อมูล
	   private $database = 'webapp'; //ชื่อ ฐานข้อมูล

	//function เชื่อมต่อฐานข้อมูล
	protected function connect(){
		
		$mysqli = new mysqli($this->host,$this->user,$this->password,$this->database);
			
			$mysqli->set_charset("utf8");

			if ($mysqli->connect_error) {

			    die('Connect Error: ' . $mysqli->connect_error);
			}

		return $mysqli;
	}
	
	//function เรื่ยกดูข้อมูล all user
	public function get_all_user(){
		
		$db = $this->connect();
		$get_user = $db->query("SELECT * FROM user");
		
		while($user = $get_user->fetch_assoc()){
			$result[] = $user;
		}
		
		if(!empty($result)){
			
			return $result;
		}
	}
	
	public function search_user($post = null){
		
		$db = $this->connect();
		$get_user = $db->query("SELECT * FROM user WHERE name LIKE '%".$post."%' ");
		
		while($user = $get_user->fetch_assoc()){
			$result[] = $user;
		}
		
		if(!empty($result)){
			
			return $result;
		}
		
	}
	
	public function get_user($user_id){
		
		$db = $this->connect();
		$get_user = $db->prepare("SELECT id,name,tel FROM user WHERE id = ?");
		$get_user->bind_param('i',$user_id);
		$get_user->execute();
		$get_user->bind_result($id,$name,$tel);
		$get_user->fetch();
		
		$result = array(
			'id'=>$id,
			'name'=>$name,
			'tel'=>$tel
		);
		
		return $result;
	}
	
	//function เพื่ม user
	public function add_user($data){
		
		$db = $this->connect();
		
		$add_user = $db->prepare("INSERT INTO user (id,name,tel) VALUES(NULL,?,?) ");
		
		$add_user->bind_param("ss",$data['send_name'],$data['send_tel']);
		
		if(!$add_user->execute()){
			
			echo $db->error;
			
		}else{
			
			echo "บันทึกข้อมูลเรียบร้อย";
		}
	}
	
	//function edit user
	public function edit_user($data){
		
		$db = $this->connect();
		
		$add_user = $db->prepare("UPDATE user SET name = ? , tel = ? WHERE id = ?");
		
		$add_user->bind_param("ssi",$data['edit_name'],$data['edit_tel'],$data['edit_user_id']);
		
		if(!$add_user->execute()){
			
			echo $db->error;
			
		}else{
			
			echo "บันทึกข้อมูลเรียบร้อย";
		}
	}
	
	//function delete user
	public function delete_user($id){
		
		$db = $this->connect();
		
		$del_user = $db->prepare("DELETE FROM user WHERE id = ?");
		
		$del_user->bind_param("i",$id);
		
		if(!$del_user->execute()){
			
			echo $db->error;
			
		}else{
			
			echo "ลบข้อมูลเรียบร้อย";
		}
	}
	
	
	
	
}
?>