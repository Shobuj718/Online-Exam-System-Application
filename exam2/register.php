<?php include 'inc/header.php'; ?>
<div class="main">
<h1>Online Exam System - User Registration</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/regi.png"/>
	</div>


<?php  
    if($_SERVER['REQUEST_METHOD'] == 'POST'){    

        $name = mysqli_real_escape_string($db->link, $_POST['name']);
        $username = mysqli_real_escape_string($db->link, $_POST['username']);
        $password = mysqli_real_escape_string($db->link, $_POST['password']);
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

        if($file_name == "" || $name == "" || $username == "" || $password == "" || $email == "" || $mobile == ""){
            echo "<span class='error'>Field must not by empty !</span>";
        }
        elseif($file_size < 104867){
            echo "<span class='error'>Image size should be less then 1MB !</span>";
        }
        elseif (in_array($file_ext, $permited) == false) {
            echo "<span class='error'>You can upload only:-".implode(',', $permited)."</span>";
        }
        else{
            move_uploaded_file($file_temp, $upload_image);
            $password = mysqli_real_escape_string($db->link, md5($_POST['password']));
            $query = "INSERT INTO tbl_user( name, username, password, email, mobile, image) VALUES( '$name',  '$username', '$password', '$email', '$mobile', '$upload_image')";
            $inserted_rows = $db->insert($query);
            if($inserted_rows){
                echo "<span class='success'>Registration successful.</span>";
            }
            else{
                echo "<span class='error'>Registration failed !</span>";
            }
        }

    }
?>


	<div class="segment">
	<form action="" method="post" enctype="multipart/form-data">
		<table>
		<tr>
           <td>Name</td>
           <td><input type="text" name="name" id="name" placeholder="Please enter your name.." ></td>
         </tr>
		<tr>
           <td>Username</td>
           <td><input name="username" type="text" id="username" placeholder="Please enter your username.." ></td>
         </tr>
         <tr>
           <td>Password</td>
           <td><input type="password" name="password" id="password" placeholder="Please enter your password.." ></td>
         </tr>
         
         <tr>
           <td>E-mail</td>
           <td><input name="email" type="text"  id="email" placeholder="Please enter your email.." ></td>
         </tr>

         <tr>
             <td>Mobile No</td>
             <td><input type="text" name="mobile" id="mobile" placeholder="Enter Mobile Number..."></td>
         </tr>

         <tr>
            <td>
                <label>Up-Image</label>
            </td>
            <td>
                <input type="file" name="image" />
            </td>
        </tr>

         <tr>
           <td></td>
           <td><input type="submit" name="submit" Value="Signup">
           </td>
         </tr>
       </table>
	   </form>
	   <p>Already Registered ? <a href="index.php">Login</a> Here</p>
     <span id="state"></span>
	</div>


	
</div>
<?php include 'inc/footer.php'; ?>