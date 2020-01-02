<!DOCTYPE html>
<html lang="en">
<head>
<title>
Circle Chart (Server Side);
</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="mystyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
<?php include 'header.php';?>
<?php
//Read Values if POST Back;
// Define VAR and Set it to Empty;

$radiusFrom = $radiusTo =$increment = 0;
$radiusFromErr = $radiusToErr= $incrementErr="";
$ErrorFound = false;

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $radiusFrom = $_POST["radiusFrom"];
    if(empty($radiusFrom)){
        $radiusFromErr = "Radius From is Mandatory.";
        $ErrorFound= true;
    }
    elseif($radiusFrom < 1 || $radiusFrom > 1000){
        
        $radiusFromErr = "Radius Range Between [1 - 1000]";
        $ErrorFound= true;

    }
    $radiusTo = $_POST["radiusTo"];
    if(empty($radiusTo)){
        $radiusToErr = "radiusTo  is Mandatory.";
        $ErrorFound = true;
    }
    elseif ($radiusTo < 2 || $radiusTo > 1001) {
        $radiusTo = "Radius Range Between [2 - 1001]";
        $ErrorFound = true;
    }

    $increment = $_POST["increment"];
    if(empty($increment)){
        $incrementErr = "increment  is Mandatory.";
        $ErrorFound = true;
    }
    elseif ($increment < 0.5 || $increment > 10) {
        $incrementErr = "increment Limit Between 2 and 10";
        $ErrorFound = true;
    }
}
$thisPage = htmlspecialchars($_SERVER["PHP_SELF"]);

?>
<div class="jumbotron text-center">
  <h1>Circle Chart (Server Side);</h1>
  <h2>Muthu is the Best FullStack Developer you have ever Know!</h2> 
</div>

<div class="container-fluid">
<form action=<?= $thisPage?> method="POST">
  <div class="form-group">
    <label for="radiusFrom">Radius From [1-1000] <span class="text-danger" >*</span></label>
    <input type="text" class="form-control col-4" id="radiusFrom" name="radiusFrom" value="<?= $ErrorFound?$radiusFrom:"" ?>">
    <span id="radiusFromErr" name="radiusFromErr" class="text-danger"><?php echo $radiusFromErr; ?></span>
  </div>

  <div class="form-group">
    <label for="radiusTo">radiusTo [2-1001]<span class="text-danger" >*</span></label>
    <input type="text" class="form-control col-4" id="radiusTo" name="radiusTo" value="<?= $ErrorFound?$radiusTo:"" ?>">
    <span id="radiusToErr" name="radiusToErr" class="text-danger"><?php echo $radiusToErr; ?></span>
  </div>

  <div class="form-group">
    <label for="increment">increment [0.5-10] <span class="text-danger" >*</span></label>
    <input type="text" class="form-control col-4" id="increment" name="increment" value="<?= $ErrorFound?$increment:"" ?>">
    <span id="incrementErr" name="incrementErr" class="text-danger"><?php echo $incrementErr; ?></span>
  </div>
  <!--
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>   -->
  <button type="submit" class="btn btn-success">Submit</button>
</form>
</div>
<div class="container-fluid">

<?php
if($_SERVER["REQUEST_METHOD"]=="POST" and !$ErrorFound){ ?>
 <div class="col-4">
 <h2>Result</h2>
 <table class="table table-striped table-hover table-bordered">
  <thead>
  <tr>
  <th>Radius</th>
  <th>Diameter</th>
  <th>Circumference</th>
  <th>Area</th>
  </tr>
  </thead>
  <?php
  for($r=$radiusFrom;$r<=$radiusTo;$r+=$increment){
    $dia = $r * 2;
    #sleep($radiusFrom);
   //sleep(1);
		$circumference = 2 * 22.0/7 * $r;
    $area = 22.0/7 * $r * $r;
    
?>
  <tr>
  <td><?= $r?></td>
  <td><?= $dia?></td>
  <td><?= $circumference?></td>
  <td><?= $area?></td>
  
  
  </tr>
<?php } ?>
 
 </table>
 
 
 </div>
   


<?php }?> 

</div>
<?php include 'footer.php';?>
</body>

</head>
</html>