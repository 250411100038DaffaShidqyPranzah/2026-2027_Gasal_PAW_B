<?php
$arr1 = array("A");
echo 'Array awal: ("A")<br>';
array_push($arr1, "B");
echo 'Hasil array_push: ' . $arr1[0] . ' ' . $arr1[1] . '<br><br>';

$arr_a = array("A", "B");
$arr_b = array("C");
echo 'Array awal: ("A", "B") digabung dengan ("C")<br>';
$merged = array_merge($arr_a, $arr_b);
echo 'Hasil array_merge: ' . $merged[0] . ' ' . $merged[1] . ' ' . $merged[2] . '<br><br>';

$arr_assoc = array("x" => 1, "y" => 2);
echo 'Array awal: ("x"=>1, "y"=>2)<br>';
$vals = array_values($arr_assoc);
echo 'Hasil array_values: ' . $vals[0] . ' ' . $vals[1] . '<br><br>';

$search_arr = array("A", "B", "C");
echo 'Mencari "B" pada array: ("A", "B", "C")<br>';
echo 'Hasil array_search: ' . array_search("B", $search_arr) . '<br><br>';

$filter_arr = array(0, 1, false, 2, "", 3, "array");
echo 'Array awal: (0, 1, false, 2, "", 3, "array")<br>';
$filtered = array_filter($filter_arr);
echo 'Hasil array_filter: ';
foreach ($filtered as $val) {
    echo $val . ' ';
}
echo '<br><br>';

$sort_arr = array(3, 1, 2);
echo 'Array awal: (3, 1, 2)<br>';

$temp1 = $sort_arr;
sort($temp1);
echo 'Hasil sort: ' . $temp1[0] . $temp1[1] . $temp1[2] . '<br>';

$temp2 = $sort_arr;
rsort($temp2);
echo 'Hasil rsort: ' . $temp2[0] . $temp2[1] . $temp2[2] . '<br><br>';

$age = array("Peter" => 35, "Ben" => 37, "Joe" => 43);
echo 'Array awal: ("Peter"=>35, "Ben"=>37, "Joe"=>43)<br>';

$t1 = $age; asort($t1);
echo 'Hasil asort: ';
$n = 1;
foreach ($t1 as $k => $v) {
    echo $k . '=>' . $v . ($n < count($t1) ? ', ' : '');
    $n++;
}
echo '<br>';

$t2 = $age; ksort($t2);
echo 'Hasil ksort: ';
$n = 1;
foreach ($t2 as $k => $v) {
    echo $k . '=>' . $v . ($n < count($t2) ? ', ' : '');
    $n++;
}
echo '<br>';

$t3 = $age; arsort($t3);
echo 'Hasil arsort: ';
$n = 1;
foreach ($t3 as $k => $v) {
    echo $k . '=>' . $v . ($n < count($t3) ? ', ' : '');
    $n++;
}
echo '<br>';

$t4 = $age; krsort($t4);
echo 'Hasil krsort: ';
$n = 1;
foreach ($t4 as $k => $v) {
    echo $k . '=>' . $v . ($n < count($t4) ? ', ' : '');
    $n++;
}
?>