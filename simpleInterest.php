<!DOCTYPE html>
<html lang="en">
<head>
<title>
Simple Interest Calculator (Server Side);
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
$principle = $interest =$years = 0;
$principleErr = $interestErr= $yearsErr="";
$ErrorFound = false;

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $principle = $_POST["principle"];
    if(empty($principle)){
        $principleErr = "Principle amount is Mandatory.";
        $ErrorFound= true;
    }
    elseif($principle > 500000){
        
        $principleErr = "Principle amount Should not Exceed 5,00,000";
        $ErrorFound= true;

    }
    $interest = $_POST["interest"];
    if(empty($interest)){
        $interestErr = "Interest  is Mandatory.";
        $ErrorFound = true;
    }
    elseif ($interest < 8 || $interest > 24) {
        $interestErr = "Interest Percentage Limit Between 8% and 24%";
        $ErrorFound = true;
    }

    $years = $_POST["years"];
    if(empty($years)){
        $yearsErr = "Years  is Mandatory.";
        $ErrorFound = true;
    }
    elseif ($years < 2 || $interest > 10) {
        $yearsErr = "Year Limit Between 2 and 10";
        $ErrorFound = true;
    }
}
$thisPage = htmlspecialchars($_SERVER["PHP_SELF"]);

?>
<div class="jumbotron text-center">
  <h1>Simple Interest Calculator (Server Side);</h1>
  <h2>Muthu is the Best FullStack Developer you have ever Know!</h2> 
</div>

<div class="container-fluid">
<form action=<?= $thisPage?> method="POST">
  <div class="form-group">
    <label for="principle">Principle Amount [< 5,00,000] <span class="text-danger" >*</span></label>
    <input type="text" class="form-control col-4" id="principle" name="principle" value="<?= $ErrorFound?$principle:"" ?>">
    <span id="principleErr" name="principleErr" class="text-danger"><?php echo $principleErr; ?></span>
  </div>

  <div class="form-group">
    <label for="interest">Interest Percentage - [8-24%]<span class="text-danger" >*</span></label>
    <input type="text" class="form-control col-4" id="interest" name="interest" value="<?= $ErrorFound?$interest:"" ?>">
    <span id="interestErr" name="interestErr" class="text-danger"><?php echo $interestErr; ?></span>
  </div>

  <div class="form-group">
    <label for="years">No of Years [2-10] <span class="text-danger" >*</span></label>
    <input type="text" class="form-control col-4" id="years" name="years" value="<?= $ErrorFound?$years:"" ?>">
    <span id="yearsErr" name="yearsErr" class="text-danger"><?php echo $yearsErr; ?></span>
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
if($_SERVER["REQUEST_METHOD"]=="POST" and !$ErrorFound){
    $result = $principle*$interest*$years/100.0; 
   // echo "<p>Hi<b>  </b>How Are you</p>";
    echo "<p>This is your Calculation Result is <span class='text-success'>$result</span></p>";
}

?>
</div>
<?php include 'footer.php';?>
</body>

</head>
</html>