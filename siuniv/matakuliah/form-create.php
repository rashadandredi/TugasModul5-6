<?php
	include '../connect.php';
	
	$query= "SELECT id_dosen, nama_dosen FROM dosen";
	$result= mysqli_query($connect, $query);
?>
<html>
	<body>
		<form method="POST" action="create.php">
			<table>
				<tr>
					<td>Kode</td>
					<td> : <input type="text" name="kode"></td>
				</tr>
				<tr>
					<td>Matakuliah</td>
					<td> : <input type="text" name="nama_matkul"></td>
				</tr>
				<tr>
					<td>SKS</td>
					<td> : <input type="number" name="sks"></td>
				</tr>
				<tr>
					<td>Semester</td>
					<td> : <input type="number" name="semester"></td>
				</tr>
				<tr>
					<td>Dosen Pengajar : </td>
					<td>
						<select name="id_dosen" id="nama_dosen">
							<option value="-">--Pilih Salah Satu--</option>
							<?php
								while($data = mysqli_fetch_assoc($result)){
							?>
									<option value="<?php echo $data['id_dosen']; ?>">
										<?php echo $data['nama_dosen']; ?>
									</option>
							<?php
								}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td><input type="submit" value="Simpan"></td>
				</tr>
			</table>
		</form>
	</body>
</html>