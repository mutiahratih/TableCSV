<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Tambah Data Lokasi</h1>
	<form action="addlocation.php" method="post">
		nama <input type="text" name="nama">
		lat <input type="text" name="lat">
		long <input type="text" name="long">
		<input type="submit" name="submit" value="tambah data">
	</form>

	<?php
	if (isset($_POST['submit'])) {

	// baca data dari form
	$nama = $_POST['nama'];
	$lat = $_POST['lat'];
	$long = $_POST['long'];

	// construct format data
	$format = PHP_EOL.$nama.',"'.$lat.",".$long.'"';
	fwrite($myFile, $format);
	}

	?>
	<table border="1">
		<tr><th>Lokasi</th><th>Latitude</th><th>Longitude</th></tr>

	<h1>Data Tempat Wisata Dunia</h1>
	<?php
		// buka file locations.csv
		$myFile = fopen("locations.csv", "r");

			// init index
			$i = 0;

			//baca data tiap baris
			while (!feof($myFile)) {
				$myData = fgets($myFile);

				// data pertama csv diabaikan
				if ($i == 0) {
					$i++;
					continue;
				}

				// proses data nama lokasi, lat, long
				$res = explode(",", $myData);
				$nama = $res[0];
				// menghilangkan " di lat, long
				$lat = str_replace('"', "", $res[1]);
				$long = str_replace('"', "", $res[2]);
				// menampilkan data
				echo "<tr><td>".$nama."</td><td>".$lat."</td><td>".$long."</td><tr>"; 
				$i++;

			}

			// close file
			fclose($myFile);
	?>
		</table>

</body>
</html>