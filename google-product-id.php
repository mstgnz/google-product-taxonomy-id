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

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style type="text/css">
#products{
  width: 450px;
}
#product{
  width: 100%;
  padding: 10px;
  border: solid 1px #ccc;
  outline:none;
}
#table{
  width: 104%;
  display:none;
  max-height:100px;
  overflow: hidden;
  border: solid 1px #ccc;
  border-top : none;
}
#table tr:hover{
  cursor: pointer;
  background-color: #ccc;
}
#table tr td:first-child{
  width: 80px;
}
#table tr td:nth-child(2){
  width: 20px;
}
</style>

</head>
<body>

<h2>Google Products</h2>
<div id="products">
<!-- SEARCH INPUT-->
<input type="text" id="product" onkeyup="func()" placeholder="Search for names.." title="Type in a name" />

<!-- HTML TABLE -->
<table id="table">
    <?php foreach($products as $key => $val): ?>
    <tr onclick="select(<?=$key?>)">
        <td><?= $key?></td>
        <td>-</td>
        <td><?= $val?></td>
    </tr>
     <?php endforeach; ?>
</table>
</div>



<script>

  function func(){
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("product");
    filter = input.value.toUpperCase();
    table = document.getElementById("table");
    tr = table.getElementsByTagName("tr");
        table.style.display = "block";
        for (i = 0; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[2];
          txtValue = td.textContent || td.innerText;
          if(txtValue.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "block";
          } else {
              tr[i].style.display = "none";
          }
      }
      if(input.value==""){
          table.style.display = "none";
      }
    }


  function select(key){
    input = document.getElementById("product");
    console.log(input);
  }

</script>

</body>
</html>

