<?php
$fruits = array("Avocado", "Blueberry", "Cherry");

// 1.1 Menambahkan 5 data baru
array_push($fruits, "Durian", "Elderberry", "Fig", "Grape", "Honeydew");

echo 'fruits = (';
foreach ($fruits as $index => $fruit) {
    echo '"' . $fruit . '"';
    if ($index < count($fruits) - 1) {
        echo ', ';
    }
}
echo ')<br>';

$indeks_tertinggi = count($fruits) - 1;
echo "Nilai dengan indeks tertinggi: " . $fruits[$indeks_tertinggi] . "<br><br>";

// 1.2 Menghapus data Blueberry
unset($fruits[1]);

echo "Data Blueberry dihapus.<br>";

echo 'fruits = (';
$i = 0;
foreach ($fruits as $fruit) {
    echo '"' . $fruit . '"';
    if ($i < count($fruits) - 1) {
        echo ', ';
    }
    $i++;
}
echo ')<br>';

foreach ($fruits as $fruit) {
    $terakhir = $fruit;
}
echo "Nilai dengan indeks tertinggi: " . $terakhir;
?>