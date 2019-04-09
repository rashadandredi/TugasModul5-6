<?php
	session_start();
	
	if(!(isset($_SESSION['user']))){
		header("location:../login/form-login.php");
	}
	
	include '../connect.php';
	
	$query = "SELECT * FROM dosen";
	$result = mysqli_query($connect, $query);
	$num = mysqli_num_rows($result);
?>

<html>
<body>
	<form action="search.php" method="get">
		<input type="search" name="cari" placeholder="Masukkan pencarian...">
		<input type="submit" value="cari">
	</form>
	<table border="1">
		<tr>
			<th>No.</th>
			<th>Nama Dosen</th>
			<th>Telepon</th>
			<th colspan="2">Aksi</th>
		</tr>
		<?php
			if($num > 0){
				$no = 1;
				while($data = mysqli_fetch_assoc($result)){
					echo "<tr>";
					echo 	"<td>" . $no . "</td>";
					echo 	"<td>" . $data['nama_dosen'] . "</td>";
					echo 	"<td>" . $data['telp'] . "</td>";
					echo	"<td><a href='form-update.php?id_dosen=" . $data['id_dosen'] . "'>Edit</a> | ";
					echo	"<td><a href='delete.php?id_dosen=" . $data['id_dosen'] . "' onclick = 'return confirm(\"Apakah anda yakin ingin menghapus data\")'>Hapus</a></td>";
					echo "</tr>";
					$no++;
				}
			}else{
				echo "<td colspan='3'>Tidak ada data</td>";
			}
		?>
	</table>
	<form action="../login/logout.php">
	<table>
		<tr>
			<td><input type="submit" value="Logout"></td>
		</tr>
	</table>
	</form>
</body>
</html>