<!DOCTYPE html>
<html lang="en">
<head>
<title>
Weight On Other Planet (Server Side);
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
$weightFrom = $weightTo =$increment = 0;
$weightFromErr = $weightToErr= $incrementErr="";
$ErrorFound = false;

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $weightFrom = $_POST["weightFrom"];
    if(empty($weightFrom)){
        $weightFromErr = "Weight From is Mandatory.";
        $ErrorFound= true;
    }
    elseif($weightFrom < 1 || $weightFrom > 1000){
        
        $weightFromErr = "Weight Range Between [1 - 1000]";
        $ErrorFound= true;

    }
    $weightTo = $_POST["weightTo"];
    if(empty($weightTo)){
        $weightToErr = "Weight To  is Mandatory.";
        $ErrorFound = true;
    }
    elseif ($weightTo < 2 || $weightTo > 1001) {
        $weightToErr = "Weight Range Between [2 - 1001]";
        $ErrorFound = true;
    }

    $increment = $_POST["increment"];
    if(empty($increment)){
        $incrementErr = "Increment  is Mandatory.";
        $ErrorFound = true;
    }
    elseif ($increment < 0.5 || $increment > 10) {
        $incrementErr = "Increment Limit Between 2 and 10";
        $ErrorFound = true;
    }
}
$thisPage = htmlspecialchars($_SERVER["PHP_SELF"]);

?>
<div class="jumbotron text-center">
  <h1>Weight On Other Planet  (Server Side);</h1>
  <h2>Muthu is the Best FullStack Developer you have ever Know!</h2> 
</div>

<div class="container-fluid">
<form action=<?= $thisPage?> method="POST">
  <div class="form-group">
    <label for="weightFrom">Weight From [1-1000] <span class="text-danger" >*</span></label>
    <input type="text" class="form-control col-4" id="weightFrom" name="weightFrom" value="<?= $ErrorFound?$weightFrom:"" ?>">
    <span id="weightFrom" name="weightFrom" class="text-danger"><?php echo $weightFromErr; ?></span>
  </div>

  <div class="form-group">
    <label for="weightTo">Weight To [2-1001]<span class="text-danger" >*</span></label>
    <input type="text" class="form-control col-4" id="weightTo" name="weightTo" value="<?= $ErrorFound?$weightTo:"" ?>">
    <span id="weightTo" name="weightTo" class="text-danger"><?php echo $weightToErr; ?></span>
  </div>

  <div class="form-group">
    <label for="increment">Increment [0.5-10] <span class="text-danger" >*</span></label>
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
  <th>Weight On Earth in kgs</th>
  <th>Weight On Moon in kgs</th>
  <th>Weight On Mars in kgs</th>
  <th>Weight On Jupiter in kgs</th>
  <th>Weight On Saturn in kgs</th>
  </tr>
  </thead>
  <?php
  for($w=$weightFrom;$w<=$weightTo;$w+=$increment){
   $moon = $w*16.5*0.01;
   $mars = $w*38*0.01;
   //delay(1);
   $jupiter = $w*234*0.01;
   $saturn = $w*106*0.01;
    
?>
  <tr >
  <td><?= $w?></td>
  <td><?= $moon?></td>
  <td><?= $mars?></td>
  <td><?= $jupiter?></td>
  <td><?= $saturn?></td>
  
  
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