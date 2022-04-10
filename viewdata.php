<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h1>Data Tempat Wisata Dunia</h1>
	<?php
		// buka file locations.csv
		$myFile = fopen("locations.csv", "r");

		function hitungJarak($x1, $y1, $x2, $y2) {
        $r = sqrt(pow($x2-$x1, 2)+pow($y2-$y1, 2));
        return $r;
   		}
   		$dataLokasi = array();
   		$data = array();

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
				$jarak = hitungJarak((float)$lat, -7.5652649, (float)$long, 110.8147185)


				$data = array("nama" => $nama, "lat" => $lat, "long" => $long, "jarak" => $jarak);

				array_push($dataLokasi, $data);


				// menampilkan data
				//echo "<tr><td>".$nama."</td><td>".$lat."</td><td>".$long."</td><td>".hitungJarak((float)$lat, -7.5652649, (float)$long, 110.8147185)."</td><tr>";
				$i++;

			}

			$colJarak = array_column($dataLokasi, "jarak");

			array_multisort($colJarak, SORT_ASC, $dataLokasi);

			// close file
			fclose($myFile);
	?>
<table border="1">
	<tr><th>Lokasi</th><th>Latitude</th><th>Longitude</th><th>Jarak</th></tr>
	
	<?php
	// menampilkan data
	for ($i=0; $i<count($dataLokasi); $i++) { 
		echo "<tr><td>".$dataLokasi[$i]['nama']."
			</td><td>".$dataLokasi[$i]['lat']."
			</td><td>".$dataLokasi[$i]['long']."
			</td><td>".$dataLokasi[$i]['jarak']."
			</td></tr>";
	}
	?>
</table>

</body>
</html>