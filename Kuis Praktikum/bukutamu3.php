<!DOCTYPE html>
<html>
<head>
	<title>GUEST BOOK</title>

</head>
<body>

<?php

// --- koneksi ke database
$koneksi = mysqli_connect("localhost","root","","myweb") or die(mysqli_error());

// --- Fngsi tambah data (Create)
function tambah($koneksi){
	
	if (isset($_POST['btn_simpan'])){
		$Id = time();
		$Posted = $_POST['Posted'];
		$Name = $_POST['Name'];
		$Email = $_POST['Email'];
		$Address = $_POST['Address'];
		$City = $_POST['City'];
		$Message = $_POST['Message'];
		
		if(!empty($Posted) && !empty($Name) && !empty($Email) && !empty($Address) && !empty($City) && !empty($Message)){
			$sql = "INSERT INTO guestbook (Id,Posted, Name, Email, Address, City, Message) VALUES(".$Id.",'".$Posted."','".$Name."','".$Email."','".$Address."','".$City."','".$Message."')";
			$simpan = mysqli_query($koneksi, $sql);
			if($simpan && isset($_GET['aksi'])){
				if($_GET['aksi'] == 'create'){
					header('location: bukutamu3.php');
				}
			}
		} else {
			$pesan = "Tidak dapat menyimpan, data belum lengkap!";
		}
	}

	?> 
		<form action="" method="POST">
			<fieldset>
				<legend><h2>Tambah data</h2></legend>
				<label>Posted <input type="date" name="Posted" /></label> <br><br>
				<label>Name <input type="text" name="Name" /></label> <br><br>
				<label>Email <input type="text" name="Email" /></label> <br><br>
				<label>Address <input type="text" name="Address" /></label> <br><br>
				<label>City <input type="text" name="City" /></label> <br><br>
				<label>Message <input type="file" name="Message" /></label> <br><br>
				<br>
				<label>
					<input type="submit" name="btn_simpan" value="Simpan"/>
					<input type="reset" name="reset" value="Besihkan"/>
				</label>
				<br>
				<p><?php echo isset($pesan) ? $pesan : "" ?></p>
			</fieldset>
		</form>
	<?php

}
// --- Tutup Fngsi tambah data


// --- Fungsi Baca Data (Read)
function tampil_data($koneksi){
	$sql = "SELECT * FROM guestbook";
	$query = mysqli_query($koneksi, $sql);
	
	echo "<fieldset>";
	echo "<legend><h2>Tabel Guest Book</h2></legend>";
	
	echo "<table border='1' cellpadding='2'>";
	echo "<tr>
			<th>ID</th>
			<th>Posted</th>
			<th>Name</th>
			<th>Email</th>
			<th>Address</th>
			<th>City</th>
			<th>Message</th>
		  </tr>";
	
	while($data = mysqli_fetch_array($query)){
		?>
			<tr>
				<td><?php echo $data['Id']; ?></td>
				<td><?php echo $data['Posted']; ?></td>
				<td><?php echo $data['Name']; ?></td>
				<td><?php echo $data['Email']; ?></td>
				<td><?php echo $data['Address']; ?></td>
				<td><?php echo $data['City']; ?></td>
				<td><?php echo $data['Message']; ?></td>
				<td>
					<a href="bukutamu3.php?aksi=update&Id=<?php echo $data['Id']; ?>&Posted=<?php echo $data['Posted']; ?>&Name=<?php echo $data['Name']; ?>&Email=<?php echo $data['Email']; ?>&Address=<?php echo $data['Address']; ?>&City=<?php echo $data['City']; ?>&Message=<?php echo $data['Message']; ?>">Ubah</a> |
					<a href="bukutamu3.php?aksi=delete&Id=<?php echo $data['Id']; ?>">Hapus</a>
				</td>
			</tr>
		<?php
	}
	echo "</table>";
	echo "</fieldset>";
}
// --- Tutup Fungsi Baca Data (Read)


// --- Fungsi Ubah Data (Update)
function ubah($koneksi){

	// ubah data
	if(isset($_POST['btn_ubah'])){
		$Id = $_POST['Id'];
		$Posted = $_POST['Posted'];
		$name = $_POST['Name'];
		$Email = $_POST['Email'];
		$Address = $_POST['Address'];
		$City = $_POST['City'];
		$Message = $_POST['Message'];
		
		if(!empty($Posted) && !empty($Name) && !empty($Email) && !empty($Address) && !empty($City) && !empty($Message)){
			$perubahan = "Posted='".$Posted."',Name=".$Name.",Email=".$Email.",Address='".$Address."',City=".$City.",Message=".$Message."'";
			$sql_update = "UPDATE guestbook SET ".$perubahan." WHERE Id=$Id";
			$update = mysqli_query($koneksi, $sql_update);
			if($update && isset($_GET['aksi'])){
				if($_GET['aksi'] == 'update'){
					header('location: bukutamu3.php');
				}
			}
		} else {
			$pesan = "Data tidak lengkap!";
		}
	}
	
	// tampilkan form ubah
	if(isset($_GET['Id'])){
		?>
			<a href="bukutamu3.php"> &laquo; Home</a> | 
			<a href="bukutamu3.php?aksi=create"> (+) Tambah Data</a>
			<hr>
			
			<form action="" method="POST">
			<fieldset>
				<legend><h2>Ubah data</h2></legend>
				<input type="hidden" name="Id" value="<?php echo $_GET['Id'] ?>"/>
				<label>Posted <input type="date" name="Posted" value="<?php echo $_GET['Posted'] ?>"/></label> <br>
				<label>Name <input type="text" name="Name" value="<?php echo $_GET['Name'] ?>"/></label> <br>
				<label>Email <input type="text" name="Email" value="<?php echo $_GET['Email'] ?>"/></label> <br>
				<label>Address <input type="text" name="Address" value="<?php echo $_GET['Address'] ?>"/></label> <br>
				<label>City <input type="text" name="City" value="<?php echo $_GET['City'] ?>"/></label> <br>
				<label>Message <input type="file" name="Message" value="<?php echo $_GET['Message'] ?>"/></label> <br>
				<br>
				<label>
					<input type="submit" name="btn_ubah" value="Simpan Perubahan"/> atau <a href="bukutamu3.php?aksi=delete&Id=<?php echo $_GET['Id'] ?>"> (x) Hapus data ini</a>!
				</label>
				<br>
				<p><?php echo isset($pesan) ? $pesan : "" ?></p>
				
			</fieldset>
			</form>
		<?php
	}
	
}
// --- Tutup Fungsi Update


// --- Fungsi Delete
function hapus($koneksi){

	if(isset($_GET['Id']) && isset($_GET['aksi'])){
		$Id = $_GET['Id'];
		$sql_hapus = "DELETE FROM guestbook WHERE Id=" . $Id;
		$hapus = mysqli_query($koneksi, $sql_hapus);
		
		if($hapus){
			if($_GET['aksi'] == 'delete'){
				header('location: bukutamu3.php');
			}
		}
	}
	
}
// --- Tutup Fungsi Hapus


// ===================================================================

// --- Program Utama
if (isset($_GET['aksi'])){
	switch($_GET['aksi']){
		case "create":
			echo '<a href="bukutamu3.php"> &laquo; Home</a>';
			tambah($koneksi);
			break;
		case "read":
			tampil_data($koneksi);
			break;
		case "update":
			ubah($koneksi);
			tampil_data($koneksi);
			break;
		case "delete":
			hapus($koneksi);
			break;
		default:
			echo "<h3>Aksi <i>".$_GET['aksi']."</i> tidaka ada!</h3>";
			tambah($koneksi);
			tampil_data($koneksi);
	}
} else {
	tambah($koneksi);
	tampil_data($koneksi);
}

?>
</body>
</html>