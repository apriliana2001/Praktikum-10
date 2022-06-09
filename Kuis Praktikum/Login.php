<!DOCTYPE html>
<html>
<head>
<title>FORM LOGIN</title>
<style>
.message {color: #FF0000;}
</style>
</head>
<body>

<?php
// define variables and set to empty values
$Message = $ErrorUser = $ErrorPass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $Username = check_input($_POST["Username"]);
	
    if (!preg_match("/^[a-zA-Z0-9_]*$/",$Username)) {
      $ErrorUser = "Spasi dan karakter khusus tidak diperbolehkan, namun dapat diganti dengan underscore(_)"; 
    }
	else{
		$fusername=$Username;
	}
 
	$fpassword = check_input($_POST["Password"]);

  if ($ErrorUser!=""){
	$Message = "Periksa Username Kamu dengan Benar";
  }
  else{
  include('koneksi.php');
  
  $query=mysqli_query($kon,"select * from `user` where Username='$fusername' && Password='$fpassword'");
  $num_rows=mysqli_num_rows($query);
  $row=mysqli_fetch_array($query);
  
  if ($num_rows>0){
	  $Message = "Login Successful!";
  }
  else{
	$Message = "Login Gagal ! Periksa Username dan Password sekali lagi !";
  }
  
  }
}

function check_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  <fieldset>
<legend><h2>Login Form</h2></legend>
<p><span class="message">Tanda (*) wajib untuk diisi.</span></p> 
  Username: <input type="text" name="Username" required>
  <span class="message">* <?php echo $ErrorUser;?></span>
  <br><br>
  Password: <input type="password" name="Password" required>
  <span class="message">* <?php echo $ErrorPass;?></span>
  <br><br>
  <input type="submit" name="submit">
  <br><br>
</form>

<span class="message">
<?php
	if ($Message=="Login Successful!"){
		echo $Message;
		echo ' Selamat datang, '.$row['Name'];
    date_default_timezone_set('Asia/Jakarta');
    echo ' pada hari '.date('l, d-M-Y / H:i:s a');
	}
	else{
		echo $Message;
	}

?>
</span>
	
</body>
</html>