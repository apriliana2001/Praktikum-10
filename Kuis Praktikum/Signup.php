<!DOCTYPE HTML>  
<html>
<head>
<title>FORM SIGN UP USER BARU</title>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$Message = $ErrorName = $ErrorAddr = $ErrorEmail = $ErrorHp = $ErrorUser = $ErrorPass = "";
$Name = $Address = $Email = $Homepage = $Username = $Password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["Name"])) {
    $ErrorName = "Harus di isi";
  } else {
    $Name = check_input($_POST["Name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$Name)) {
      $ErrorName = "Masukkan nama dengan benar"; 
    }
  else{
    $fName=$Name;
  }
  }

  if (empty($_POST["Address"])) {
    $ErrorAddr = "Harus di isi";
  } else {
    $Address = check_input($_POST["Address"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9 ]*$/",$Address)) {
      $ErrorAddr = "Masukkan alamat dengan benar"; 
    }
  else{
    $fAddress=$Address;
  }
  }

  if (empty($_POST["Email"])) {
    $ErrorEmail = "Email is required";
  } else {
    $Email = check_input($_POST["Email"]);
    // check if e-mail address is well-formed
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
      $ErrorEmail = "Invalid email format"; 
    }
  else{
    $femail=$Email;
  }
  }

  if (empty($_POST["Homepage"])) {
    $ErrorHp = "Harus di isi";
  } else {
    $Homepage = check_input($_POST["Homepage"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9 ]*$/",$Homepage)) {
      $ErrorHp = "Masukkan Homepage dengan benar"; 
    }
  else{
    $fHomepage=$Homepage;
  }
  }


  if (empty($_POST["Username"])) {
    $ErrorUser = "Userame is required";
  } else {
    $Username = check_input($_POST["Username"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9_]*$/",$Username)) {
      $ErrorUser = "Spasi dan karakter khusus tidak diperbolehkan, namun dapat diganti dengan underscore(_)"; 
    }
	else{
		$fusername=$Username;
	}
  }
  
  if (empty($_POST["Password"])) {
    $ErrorPass = "Password is required";
  } else {
    $fpassword = check_input($_POST["Password"]);
  }
  
  
  if ($ErrorName!="" OR $ErrorAddr!="" OR $ErrorEmail!="" OR $ErrorHp!="" OR $ErrorUser!="" OR $ErrorPass!=""){
	$Message = "Registration failed! Errors found";
  }
  else{
  include('koneksi.php');
  mysqli_query($kon,"insert into `user` (Name,Address,Email,Homepage,Username,Password) values ('$fName','$fAddress','$femail','$fHomepage','$fusername','$fpassword')");
  $Message = "Registration Successful!";
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
<legend><h2>Sign Up Form</h2></legend> 
<p><span class="error">Tanda (*) wajib untuk diisi.</span></p> 
  Name: <input type="text" name="Name">
  <span class="error">* <?php echo $ErrorName;?></span>
  <br><br>
  Addres: <input type="text" name="Address">
  <span class="error">* <?php echo $ErrorAddr;?></span>
  <br><br>
  Email: <input type="text" name="Email">
  <span class="error">* <?php echo $ErrorEmail;?></span>
  <br><br>
  Homepage: <input type="text" name="Homepage">
  <span class="error">* <?php echo $ErrorHp;?></span>
  <br><br>
  Username: <input type="text" name="Username">
  <span class="error">* <?php echo $ErrorUser;?></span>
  <br><br>
  Password: <input type="password" name="Password">
  <span class="error">* <?php echo $ErrorPass;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">
  <br><br>
  <span class="error"><?php echo $Message;?></span>
   </fieldset>
</form>

</body>
</html>