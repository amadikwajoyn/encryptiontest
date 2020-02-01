<?php
ob_start();

require_once('path/db.php');

if (isset($_POST['login'])) {
  $arr = [];

    $password = $_POST['password'];

    $sql = $conn->prepare("SELECT * FROM `profile` WHERE email = ?");
    
    $sql->bind_param("s", $_POST['email']);
    $sql->execute();
    $result = $sql->get_result();
    while ($row = $result->fetch_row()) {
            $arr[] = $row;
            if (password_verify($password, $row['pass_word'])) {
                # code...
                $id=$row['sn'];
                $email=$row['email'];
                $_SESSION['sn'] = $id;
                $_SESSION['email'] = $email;
        
                header('Location: userdashboard.php');
              }else{
              $message = "Sorry! User Does Not Exist...";
              echo "<script>alert('".$message."');</script>";
                
             }
      }
      if (!$arr) exit('No row');
      var_export($arr);
      $sql->close();
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



















<!-- <?php
ob_start();

require_once('path/db.php');

if (isset($_POST['login'])) {
	$email = $_POST['email'];
    $password = $_POST['password'];
	$sql = "SELECT * FROM `profile` WHERE `email` = '$email'";
    $query=mysqli_query($conn,$sql);
    $numrow=mysqli_num_rows($query);
    if ($numrow > 0) {
    	$result=mysqli_fetch_array($query,MYSQLI_ASSOC);
      if (password_verify($password, $result['pass_word'])) {
        $id=$result['sn'];
        $email=$result['email'];
       
        $_SESSION['sn'] = $id;
        $_SESSION['email'] = $email;

        header('Location: userdashboard.php');
      }else{
      $message = "Sorry! User Does Not Exist...";
      echo "<script>alert('".$message."');</script>";
    	
     }
      
     }
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
</html> -->
