<?php
// Soal 2.1
$fruits = array("Avocado", "Blueberry", "Cherry");
$buah_baru = array("Durian", "Elderberry", "Fig", "Grape", "Honeydew");

for ($i = 0; $i < count($buah_baru); $i++) {
    $fruits[] = $buah_baru[$i];
}

$arrlength = count($fruits);
echo "Panjang array saat ini: " . $arrlength . "<br>";

for ($x = 0; $x < $arrlength; $x++) {
    echo $fruits[$x];
    echo "<br>";
}

echo "<hr>";

// 2.2
$vegies = array("Carrot", "Broccoli", "Spinach");

$vegies_length = count($vegies);
for ($x = 0; $x < $vegies_length; $x++) {
    echo $vegies[$x];
    echo "<br>";
}
?>