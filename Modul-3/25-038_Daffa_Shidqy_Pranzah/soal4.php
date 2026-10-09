<?php
// 4.1 Mengakses array asosiatif dengan perulangan foreach
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");
$height["David"] = "180";
$height["Ethan"] = "172";
$height["Frank"] = "168";
$height["George"] = "175";
$height["Harry"] = "182";

echo 'height = (';
$total = count($height);
$no = 1;
foreach ($height as $nama => $tinggi) {
    echo '"' . $nama . '"=>"' . $tinggi . '"';
    if ($no < $total) {
        echo ', ';
    }
    $no++;
}
echo ')<br>';

foreach ($height as $nama => $tinggi) {
    echo $nama . " is " . $tinggi . " cm tall.<br>";
}

echo "<br>";

// 4.2 Array $weight dengan perulangan FOR
$weight = array("Andy"=>"70", "Barry"=>"65", "Charlie"=>"75");

echo 'weight = (';
$total = count($weight);
$no = 1;
foreach ($weight as $nama => $berat) {
    echo '"' . $nama . '"=>"' . $berat . '"';
    if ($no < $total) {
        echo ', ';
    }
    $no++;
}
echo ')<br>';

$kunci = array_keys($weight);
$nilai = array_values($weight);

for ($i = 0; $i < count($weight); $i++) {
    echo $kunci[$i] . " is " . $nilai[$i] . " kg.<br>";
}
?>