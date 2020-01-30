<?php
ob_start();

require_once('path/db.php');

if (isset($_POST['login'])) {
	$email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM `profile` WHERE `email` = ?";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo 'Sql Statement failed';
    } else {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['pass_word'])) {
                # code...
                $id=$row['sn'];
                $email=$rowt['email'];
                // $role=$result['role'];
                $_SESSION['sn'] = $id;
                $_SESSION['email'] = $email;
        
                header('Location: userdashboard.php');
              }else{
              $message = "Sorry! User Does Not Exist...";
              echo "<script>alert('".$message."');</script>";
                
             }
        }
    }












    // $query=mysqli_query($conn,$sql);
    // $numrow=mysqli_num_rows($query);
    // if ($numrow > 0) {
    // 	$result=mysqli_fetch_array($query,MYSQLI_ASSOC);
    //   if (password_verify($password, $result['pass_word'])) {
    //     # code...
    //     $id=$result['sn'];
    //     $email=$result['email'];
    //     // $role=$result['role'];
    //     $_SESSION['sn'] = $id;
    //     $_SESSION['email'] = $email;

    //     header('Location: userdashboard.php');
    //   }else{
    //   $message = "Sorry! User Does Not Exist...";
    //   echo "<script>alert('".$message."');</script>";
    	
    //  }
      
    //  }
}
?>
<!DOCTYPE html>
<head>
<title> Login </title>
<?php include_once('head.php'); ?>
<body>
<div class="log-w3">
<div class="OluakaInstitute-main">
	<h2 style="color: #ffffff;">Sign In Now</h2>
		<form action="" method="post">
			<input type="email" class="ggg" name="email" placeholder="E-MAIL" require>
			<input type="password" class="ggg" name="password" placeholder="PASSWORD" required>
			<span><input type="checkbox" />Remember Me</span>
			<h6><a href="#">Forgot Password?</a></h6>
				<div class="clearfix"></div>
				<input type="submit" value="Sign In" name="login">
		</form>
		<p>Don't Have an Account ?<a href="registration.php" style="color: red;">Create an account</a></p>
</div>
</div>

</body>
</html>
