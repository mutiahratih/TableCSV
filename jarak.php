<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Mengubah Data CSV to Table</title>
</head>
<body>
    <h1>Table Location</h1>
    <a href="tambahdata.php"><button>Add Location</button></a>
    <?php

// $handle = fopen("locations.csv", "a+");
// $data = "\n".$_POST['location'].',"'.$_POST['latitude'].','.$_POST['longitude'].'"';
// if(isset($data)) {
//     fwrite($handle, $data); # $line is an array of strings (array|string[])
// }
// fclose($handle);


    function hitungJarak($x1, $y1, $x2, $y2) {
        $r = sqrt(pow($x2-$x1, 2)+pow($y2-$y1, 2));
        return $r;
    }


    $myFile = fopen("locations.csv", 'r') or die ("Unable to open file!") ;

    echo "<table border='1'>";
    echo "<tr>";

    $i = 0;
    while(! feof($myFile)) {

        $line = fgets($myFile);

        // Pecah data
        $pecah = explode(",", str_replace(array("/"), ",", $line));




        $float_value_of_var1 = floatval($pecah[1]);
        $float_value_of_var2 = floatval($pecah[2]);

       echo "<td>";
       echo $pecah[0];
       echo "</td>";
       echo "<td>";
       $lat= str_replace('"', "", $pecah[1]);
       echo $lat;
       echo "</td>";
       echo "<td>";
       $long= str_replace('"', "", $pecah[2]);
       echo $long;
       echo "</td>";
       echo "<td>";
       echo hitungJarak($float_value_of_var1, -7.5652649, $float_value_of_var2, 110.8147185);
       echo "</td>";
       echo "</tr>";

       $i++;
    }
    echo "</table>";
    fclose($myFile);
    ?>
</body>
</html>