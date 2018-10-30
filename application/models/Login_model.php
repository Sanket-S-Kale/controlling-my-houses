<?php

	class Login_model extends Ci_Model
	{
		function test_main(){
			echo "login model";
		}

		public function validateUser($username, $password){
			$sql = "SELECT * FROM users WHERE user_name = ? AND password = ?";
			$query = $this->db->query($sql, array($username,$password));
			//user_id, usern_name, fname,lname,password,role_id,created_date
		
			return $query->result();
		}

	
	}

?>