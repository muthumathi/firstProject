<!DOCTYPE html>
<html lang="en">
<head>
<title>
MultiDimensional Array;;
</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="jumbotron text-center">
  <h1>MultiDimensional Array;;</h1>
  <h2>Muthu is the Best FullStack Developer you have ever Know!</h2> 
</div>
<?php
$bikes = array(
    array("TVS",25,25),
    array("RoyalEnfield",250,250),
    array("Yamaha",150,150));
    array_push($bikes,array("Himalayan",500,15));
    ?>
<div class="container-fluid" style="margin:50px;">
<table class="table table-striped table-hover table-bordered">
  <thead>
  <tr>
  <th>Name</th>
  <th>Stock</th>
  <th>Sold</th>
  
  </tr>
  </thead>

    <?php
    foreach($bikes as $bike){

    $name = $bike[0];
    $sold = $bike[1];
    $inStock = $bike[2];
       
    ?>
    <tr>
    <td><?= $name?></td>
    <td><?= $inStock?></td>
    <td><?= $sold?></td>
    </tr>
    <?php }?>
    </table>
    </div>
    <div style="width:1000px;margin:50px;">
    <h2>Particular Details</h2>
    <?php $bike = $bikes[3]; ?>
    <div class="row">
    <div class="col-sm-3">Model</div>
    <div class="col-sm-7"><?= $bike[0] ?></div>

    </div>
    <div class="row">
    <div class="col-sm-3">Instock</div>
    <div class="col-sm-7"><?= $bike[2] ?></div>

    </div>
    <div class="row">
    <div class="col-sm-3">Sold</div>
    <div class="col-sm-7"><?= $bike[1] ?></div>

    </div>
    </div>


</body>


</html>