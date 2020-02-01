<?php

include_once('path/db.php');
	if (isset($_POST['register'])) {
	    // $name = mysqli_real_escape_string($conn, $_POST['fullname']);
	    // $email = mysqli_real_escape_string($conn, $_POST['email']);
	    // $phone = mysqli_real_escape_string($conn, $_POST['phone']);
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

	// if (!mysqli_stmt_prepare($stmt, $sql)) {
	// 	echo "Sql error";
	// } else {
	// 	mysqli_stmt_bind_param($stmt, "ssss", $password_hash, $name, $phone, $email);
	// 	mysqli_stmt_execute($stmt);
 //    	$_SESSION['fullname'] = $name;
 //    	$_SESSION['email'] = $email;
	// 	echo "<script>window.location='index.php'</script>";
	// }
}
	}










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
			<input type="text" class="ggg" name="fullname" placeholder="NAME" required="">
			<input type="email" class="ggg" name="email" placeholder="E-MAIL" required="">
			<input type="text" class="ggg" name="phone" placeholder="PHONE" required="">
			<input type="password" class="ggg" name="password" placeholder="PASSWORD" required="">
			<h4><input type="checkbox" required />I agree to the Terms of Agreement</h4>
			
				<div class="clearfix"></div>
				<input type="submit" value="submit" name="register">
		</form>
		<p>Already Registered.<a href="index.php" style="color: red;">Login</a></p>
</div>
</div>

</body>
</html>
