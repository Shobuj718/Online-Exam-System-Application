<?php include 'inc/header.php'; ?>
<?php
	Session::checkSession();
	$userid = Session::get('userid');
?>
<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$updateUser = $usr->updateUserData($userid, $_POST);
	}
?>


<?php  
   /* if($_SERVER['REQUEST_METHOD'] == 'POST'){    

        $name = mysqli_real_escape_string($db->link, $_POST['name']);
        $username = mysqli_real_escape_string($db->link, $_POST['username']);
        //$password = mysqli_real_escape_string($db->link, $_POST['password']);
        $mobile = mysqli_real_escape_string($db->link, $_POST['mobile']);
        $email = mysqli_real_escape_string($db->link, $_POST['email']);

        $permited  = array('jpg','jpeg','png','gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $upload_image = "upload/slider/".$unique_image;

       /* if($file_name == "" || $name == "" || $username == "" || $password == "" || $email == "" || $mobile == ""){
            echo "<span class='error'>Field must not by empty !</span>";
        }
        elseif($file_size > 104867){
            echo "<span class='error'>Image size should be less then 1MB !</span>";
        }
        elseif (in_array($file_ext, $permited) == false) {
            echo "<span class='error'>You can upload only:-".implode(',', $permited)."</span>";
        }*/

        
            //move_uploaded_file($file_temp, $upload_image);
            //$password = mysqli_real_escape_string($db->link, md5($_POST['password']));
     /*    $query = "UPDATE tbl_user
						SET
						name     = '$name',
						username = '$username',
						email    = '$email',
						mobile   = '$mobile'
						WHERE userid = '$userid'";
				$updated_raw = $db->update($query);
				if($updated_raw){
					$msg = "<span class='success'>User Data Updated.</span>";
					return $msg;
				}
				else{
					$msg = "<span class='error'>User Data Not Updated !</span>";
					return $msg;
				}
        

    }*/
?>


<style>
	.profile{width: 440px; margin: 0 auto;border: 1px solid #ddd; padding:30px 50px 50px 138px;}
</style>

<div class="main">
<h1>My Profile</h1>
   <div class="profile">
 <?php 
 	if(isset($updateUser)){
 		echo $updateUser;
 	}
 ?>
	<form action="" method="post">
<?php
	$getdata = $usr->getUserdata($userid);
	if($getdata){
		while ($result = $getdata->fetch_assoc()) {
?>
		<table class="tbl">    
			 <tr>
			   <td>Name</td>
			   <td><input name="name" type="text"  value="<?php echo $result['name']; ?>" /></td>
			 </tr>
			 <tr>
			   <td>Username</td>
			   <td><input name="username" type="text"  value="<?php echo $result['username']; ?>" /></td>
			 </tr>
			 <tr>
			 	<td>Email</td>
			 	<td><input type="text" name="email" value="<?php echo $result['email']; ?>" /></td>
			 </tr>
			 <tr>
			 	<td>Mobile</td>
			 	<td><input type="text" name="mobile" value="<?php echo $result['mobile']; ?>" /></td>
			 </tr>
			<tr>
			 	<td><label>Up-Image</label></td>
			 	<td>
                	<input type="file" name="image" />
            	</td>
			 	<td><img src="<?php echo $result['image']; ?>" height="80px" width="100px" /></td>
			 </tr>

			 
			 
			  <tr>
			  <td></td>
			   <td><input type="submit" name="submit" value="Update">
			   </td>
			 </tr>
       </table>
    <?php } } ?>
	   </form>
	</div>
</div>
<?php include 'inc/footer.php'; ?>