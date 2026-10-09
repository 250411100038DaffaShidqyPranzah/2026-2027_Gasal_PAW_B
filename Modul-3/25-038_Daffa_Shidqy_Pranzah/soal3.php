<?php
// 3.1 Deklarasi dan penambahan 5 data baru ke array $height
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
echo "Nilai dengan indeks terakhir: " . end($height) . "<br><br>";

unset($height["Barry"]);

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
echo "Nilai dengan indeks terakhir setelah dihapus: " . end($height) . "<br><br>";

// 3.2 Array $weight
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

$nilai_weight = array_values($weight);
echo "Data kedua: " . $nilai_weight[1];
?>