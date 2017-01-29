<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Session.php');
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
	//Admin class
	class User{
		public $db;
		public $fm;
		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();

		}
		public function userRegistration($name,$username,$password,$email,$image){
			$name     = $this->fm->validation($name);
			$username = $this->fm->validation($username);
			$password = $this->fm->validation($password);
			$email    = $this->fm->validation($email);

			$permited  = array('jpg','jpeg','png','gif');
        	$file_name = $_FILES['image']['name'];
        	$file_size = $_FILES['image']['size'];
        	$file_temp = $_FILES['image']['tmp_name'];

        	$div = explode('.', $file_name);
       	 	$file_ext = strtolower(end($div));
        	$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        	$upload_image = "upload/slider/".$unique_image;

			$name     = mysqli_real_escape_string($this->db->link, $name);
			$username = mysqli_real_escape_string($this->db->link,$username);
			//$password = mysqli_real_escape_string($this->db->link, md5($password));
			$email    = mysqli_real_escape_string($this->db->link,($email));

			if($name == "" || $username == "" || $password == "" || $email == "" || $file_name == ""){
				echo "<span class='error'>Field must not be empty !</span>";
				exit();
			}
			else if(filter_var($email,FILTER_VALIDATE_EMAIL) === false){
				echo "<span class='error'>Invalid email address !</span>";
				exit();
			}
			else{
				$chkquery = "SELECT * FROM tbl_user WHERE email = '$email'";
				$chkresult = $this->db->select($chkquery);
				if($chkresult != false){
					echo "<span class='error'>Email address already exist !</span>";
					exit();
				}
				else{
					$password = mysqli_real_escape_string($this->db->link, md5($password));
					$query = "INSERT INTO tbl_user(name,username,password,email,image) VALUES('$name','$username','$password','$email','$upload_image')";
					$inserted_row = $this->db->insert($query);
					if($inserted_row){
						echo "<span class='success'>Registration Successfully...</span>";
						exit();
					}
					else{
						echo "<span class='error'>Error.. Not Registered !</span>";
						exit();
					}
				}
			}


		}

		public function userLogin($email,$password){
			$email    = $this->fm->validation($email);
			$password = $this->fm->validation($password);

			$email    = mysqli_real_escape_string($this->db->link, $email);
			//$password = mysqli_real_escape_string($this->db->link, $password);

			if($email == "" || $password == ""){
				echo "empty";
				exit();
			}
			else{
				$password = mysqli_real_escape_string($this->db->link, md5($password));
				$query = "SELECT * FROM tbl_user WHERE email='$email' AND password='$password'";
				$result = $this->db->select($query);
				if($result != false){
					$value = $result->fetch_assoc();
					if($value['status'] == '1'){
						echo "disable";
						exit();
					}
					else{
						Session::init();
						Session::set("login", true);
						Session::set("userid", $value['userid']);
						Session::set("username", $value['username']);
						Session::set("name", $value['name']);
						
					}
					
				}
				else{
					echo "error";
					exit();
				}
			}

		}

		public function getUserdata($userid){
			$query = "select * from tbl_user where userid='$userid'";
			$result = $this->db->select($query);
			return $result;
		}


		//ORDER BY userid "
		public function getAllUser(){
			$query = "SELECT * FROM tbl_user";
			$result = $this->db->select($query);
			return $result; 
		}

		public function updateUserData($userid, $data){
			$name     = $this->fm->validation($data['name']);
			$username = $this->fm->validation($data['username']);
			$email    = $this->fm->validation($data['email']);
			$mobile    = $this->fm->validation($data['mobile']);
			$image    = $this->fm->validation($data['image']);
			//$upload_image = "upload/slider/".$image;


			//$userid   = $this->fm->validation($data['userid']);

			$name     = mysqli_real_escape_string($this->db->link, $name);
			$username = mysqli_real_escape_string($this->db->link, $username);
			$email    = mysqli_real_escape_string($this->db->link, $email);
			$mobile   = mysqli_real_escape_string($this->db->link, $mobile);
			//$image   = mysqli_real_escape_string($this->db->link, $image);
			//$userid   = mysqli_real_escape_string($this->db->link, $userid);


			$query = "UPDATE tbl_user
						SET
						name     = '$name',
						username = '$username',
						email    = '$email',
						mobile   = '$mobile'
						
						WHERE userid = '$userid'";
				$updated_raw = $this->db->update($query);
				if($updated_raw){
					$msg = "<span class='success'>User Data Updated.</span>";
					return $msg;
				}
				else{
					$msg = "<span class='error'>User Data Not Updated !</span>";
					return $msg;
				}
			}



			/*
			$permited  = array('jpg','jpeg','png','gif');
      		$file_name = $_FILES['image']['name'];
        	$file_size = $_FILES['image']['size'];
        	$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
        	$file_ext = strtolower(end($div));
        	$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        	$upload_image = "upload/slider/".$unique_image;

        	if($file_size > 104867){
            	echo "<span class='error'>Image size should be less then 1MB !</span>";
        	}
       		elseif (in_array($file_ext, $permited) == false) {
           		echo "<span class='error'>You can upload only:-".implode(',', $permited)."</span>";
       		}
       		else{
	            move_uploaded_file($file_temp, $upload_image);
				$query = "UPDATE tbl_user
						SET
						name     = '$name',
						username = '$username',
						email    = '$email',
						mobile   = '$mobile',
						image    = '$upload_image'
						WHERE userid = '$userid'";
				$updated_raw = $this->db->update($query);
				if($updated_raw){
					$msg = "<span class='success'>User Data Updated.</span>";
					return $msg;
				}
				else{
					$msg = "<span class='error'>User Data Not Updated !</span>";
					return $msg;
				}
		 }

		 /*else{
            //move_uploaded_file($file_temp, $upload_image);
			$query = "UPDATE tbl_user
					SET
					name     = '$name',
					username = '$username',
					email    = '$email',
					mobile   = '$mobile'
					WHERE userid = '$userid'";
			$updated_raw = $this->db->update($query);
			if($updated_raw){
				$msg = "<span class='success'>User Data Updated.</span>";
				return $msg;
			}
			else{
				$msg = "<span class='error'>User Data Not Updated !</span>";
				return $msg;
			}
		 }*/

		//}

		public function disableUser($userid){
			$query = "UPDATE tbl_user
						SET 
						status = '1'  
						WHERE userid = $userid";
			$updated_raw = $this->db->update($query);
			if($updated_raw){
				$msg = "<span class = 'success'>User Disabled !</span>";
				return $msg;
			}
			else{
				$msg = "<span class = 'error'>User Not Disabled !</span>";
				return $msg;
			}
		}

		public function enableUser($userid){
			$query = "UPDATE tbl_user
						SET 
						status = '0'  
						WHERE userid = $userid";
			$updated_raw = $this->db->update($query);
			if($updated_raw){
				$msg = "<span class = 'success'>User Enabled !</span>";
				return $msg;
			}
			else{
				$msg = "<span class = 'error'>User Not Enabled !</span>";
				return $msg;
			}
		}
		public function deleteUser($userid){
			$query = "DELETE  FROM tbl_user WHERE userid = '$userid'";
			$deldata = $this->db->delete($query);
			if($deldata){
				$msg = "<span class = 'success'>User Deleted !</span>";
				return $msg;
			}
			else{
				$msg = "<span class = 'error'>Error... User Not Deleted !</span>";
				return $msg;
		}
	}
}
 

?>