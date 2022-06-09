<?php
$host="localhost";
$user="root";
$password="";
$db="myweb";

$kon = mysqli_connect($host,$user,$password,$db);

//cek koneksi
if (!$kon){
	  die("Koneksi gagal:".mysqli_connect_error());
}
?>