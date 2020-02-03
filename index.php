<?php
ob_start();
require_once('path/db.php');
$email_error ="";
$password_error ="";
if (isset($_POST['login'])) {
  $arr = [];
  
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
  if (empty($_POST['password'])) 
  {
    $password_error = "<p>Please Enter Password</p>";
  }
  if($email_error == "" && $password_error == "" )  
  { 
    $password = $_POST['password'];
    $sql = $conn->prepare("SELECT * FROM `profile` WHERE email = ?");
    
    $sql->bind_param("s", $_POST['email']);
    $sql->execute();
    $result = $sql->get_result();
    while ($row = $result->fetch_array()) {
            $arr[] = $row;
            if (password_verify($password, $row['pass_word'])) {
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
      // var_export($arr);
      $sql->close();
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
			<input type="email" class="ggg" name="email" placeholder="E-MAIL">
			<span class="text-danger"><?php echo $email_error; ?></span>  
			<input type="password" class="ggg" name="password" placeholder="PASSWORD" >
			<span class="text-danger"><?php echo $password_error; ?></span>  
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
