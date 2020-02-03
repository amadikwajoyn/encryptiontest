<?php

include_once('path/db.php');
$name_error = '';  
 $email_error = '';  
 $phone_error = '';  
 $password_error = '';
 $output = '';
	if (isset($_POST['register'])) {

		if(empty($_POST["fullname"]))  
      {  
           $name_error = "<p>Please Enter Name</p>";  
      }  
      else  
      {  
           if(!preg_match("/^[a-zA-Z ]*$/", $_POST["fullname"]))  
           {  
                $name_error = "<p>Only Letters and whitespace allowed</p>";  
           }  
      }  
      if(empty($_POST["email"]))  
      {  
           $email_error = "<p>Please Enter Email</p>";  
      }  
      else  
      {  
           if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))  
           {  
                $email_error = "<p>Invalid Email formate</p>";  
           }  
      	}  
      	if(empty($_POST["phone"]))  
      	{  
           $phone_error = "<p>Please Enter Phone Number</p>";  
      	} 
	  	if(array_key_exists('phone', $_POST))
  		{
			if(!preg_match('/^[0-9]{11}$/', $_POST['phone']))
			{
			$phone_error = 'Invalid Number!';
			}
		}
		if (empty($_POST['password'])) {
			$password_error = "<p>Please Enter Password</p>";
		}
	  
	  if($name_error == "" && $email_error == "" && $phone_error == "")  
      {  
        

		$password = $_POST['password'];
	    $password_hash = password_hash($password, PASSWORD_DEFAULT);
	  	$sql = $conn->prepare("SELECT * FROM profile WHERE email = ? or phone = ?");
	  	$sql->bind_param("ss", $_POST['email'], $_POST['phone']);
	  	$sql->execute();
	  	$numrow = $sql->get_result()->fetch_row();
	    if($numrow>0){
	    	echo "<script>alert('User Already Exists with Provided Details, Please use a Different Email and Phone Number.');</script>";
 		}else{
			$sql = $conn->prepare("INSERT INTO profile (`pass_word`, `fullname`, `phone`, `email`, `gender`, `address`, `lga`, `state`, `nationality`,`image`, `next_of_kin_name`, `next_of_kin_phone`, `next_of_kin_address`, `next_of_kin_email`, `next_of_kin_relationship`, `spon_type`, `spon_name`, `spon_email`, `spon_address`, `spon_phone`)  VALUES (?,?, ?, ?, '', '', '', '', '','', '','','', '' ,'', '','','', '' ,'')");
			$sql->bind_param("ssss", $password_hash, $_POST['fullname'], $_POST['phone'], $_POST['email']);
			$sql->execute();
			$sql->close();

			
			$stmt = mysqli_stmt_init($conn);
			echo "<script>alert('Registration Successful');</script>";

	
		}




      } 











		
		
	}




































// 	include_once('path/db.php');
// 	if (isset($_POST['register'])) {
// 	    $name = mysqli_real_escape_string($conn, $_POST['fullname']);
// 	    $email = mysqli_real_escape_string($conn, $_POST['email']);
// 	    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
// 	    $password = mysqli_real_escape_string($conn, $_POST['password']);
// 	    $password_hash = password_hash($password, PASSWORD_DEFAULT);


// 	  $sql = "SELECT * FROM `profile` WHERE `email` = '$email' or `phone` = '$phone';";
// 	   $query=mysqli_query($conn,$sql);
// 	     $numrow=mysqli_num_rows($query);
// 	      if($numrow>0){
// 	      echo "<script>alert('User Already Exists with Provided Details, Please use a Different Email and Phone Number.');</script>";
//  }else{
//  	$sql = "INSERT INTO `profile` (`sn`, `pass_word`, `fullname`, `phone`, `email`, `gender`, `address`, `lga`, `state`, `nationality`,`image`, `next_of_kin_name`, `next_of_kin_phone`, `next_of_kin_address`, `next_of_kin_email`, `next_of_kin_relationship`, `spon_type`, `spon_name`, `spon_email`, `spon_address`, `spon_phone`) VALUES (NULL, '$password_hash','$name', '$phone', '$email', '', '', '', '', '','', '','','', '' ,'', '','','', '' ,'');";
// 	if(mysqli_query($conn,$sql)){
//             $message = "User Registration Successful!";
//     }else{
//         $error = "User Registration not Successful. Try again later!";
        
//     }
// 	if (isset($message)) {
//   		$sql = "SELECT * FROM `profile` WHERE `email` = '$email';";
//     	$query=mysqli_query($conn,$sql);
//       	$result=mysqli_fetch_array($query,MYSQLI_ASSOC);
//       	$id=$result['sn'];
    
//     	echo "<script>alert('".$message."');</script>";
//     	$_SESSION['user'] = $id;
//     	$_SESSION['fullname'] = $name;
//     	$_SESSION['email'] = $email;
//     	echo "<script>window.location='index.php'</script>";
// 	}elseif (isset($error)) {
//    		echo "<script>alert('".$error."');</script>";
// 	}

//     }
//   }
?>
<!DOCTYPE html>
<head>
<title>Registration </title>


<?php include_once('head.php'); ?>
<body>
<div class="reg-w3">
<div class="OluakaInstitute-main">
	<h2 style="color: #ffffff;">Register Now</h2>
		<form action="" method="post">
			<input type="text" class="ggg" name="fullname" placeholder="NAME" >
			<span class="text-danger"><?php echo $name_error; ?></span>  
			<input type="email" class="ggg" name="email" placeholder="E-MAIL" >
			<span class="text-danger"><?php echo $email_error; ?></span>  
			<input type="text" class="ggg" name="phone" placeholder="PHONE" >
			<span class="text-danger"><?php echo $phone_error; ?></span>  
			<input type="password" class="ggg" name="password" placeholder="PASSWORD" >
			<span class="text-danger"><?php echo $password_error; ?></span>  
			<h4><input type="checkbox" />I agree to the Terms of Agreement</h4>
			
				<div class="clearfix"></div>
				<input type="submit" value="submit" name="register">
		</form>
		<p>Already Registered.<a href="index.php" style="color: red;">Login</a></p>
</div>
</div>

</body>
</html>
