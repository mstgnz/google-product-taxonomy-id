<?php

$txt = file('http://www.google.com/basepages/producttype/taxonomy-with-ids.tr-TR.txt');
$version = array_shift($txt);

$keys = [];
$contents = [];

foreach($txt as $key => $val){
    $keys[] = trim(explode('-', $val)[0]);
    $contents[] = explode('-', $val)[1];
}
//print_r($keys);
//print_r($contents);

$vals = [];
foreach($contents as $key => $val){
    $result = explode('>', $val);
    $vals[] = trim(end($result));
}
//print_r($last);

$products = array_combine($keys, $vals);

//print_r($products);

//print_r($txt);
?>
