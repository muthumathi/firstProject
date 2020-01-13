<!DOCTYPE html>
<html lang="en">
<head>
<title>
Filters and Customize Sanitizing.!
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
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $sani = $_POST["sani"];

}
?>

<div class="jumbotron text-center">
  <h1>Filters.!</h1>
  <h2>Muthu is the Best FullStack Developer you have ever Know!</h2> 
</div>

<div class="container">
			<h1>Filters Supported</h1>
			<table class="table table-striped">
			  <tr>
				<th>Filter Name</th>
				<th>Filter ID</th>
			  </tr>
			  <?php
			  foreach (filter_list() as $id =>$filter) {
				  echo '<tr><td>' . $filter . '</td><td>' . filter_id($filter) . '</td></tr>';
			  }
			  ?>
			</table>
		</div>
		<div class="container">
			<h1>Sanitizing a String (Removing HTML Tags)</h1>
			<?php
				$s = "<h1>Hello World</h1>";
				echo "Before sanitizing : $s";
				$ss = filter_var($s, FILTER_SANITIZE_STRING);
				echo "After sanitizing : $ss";
			?>
		</div>
		
		<div class="container">
			<h1>Verifying Integer</h1>
			<?php
				$intvar = 1.5;
				if(filter_var($intvar, FILTER_VALIDATE_INT))
					echo "$intvar is a valid integer.";
				else
					echo "$intvar is not a valid integer.";				
			?>
		</div>
		<div class="container">
			<h1>Sanitizing and validating email id.</h1>
			<?php
				$a = 'joe@example.org';
				$b = 'bogus - at - example dot org';
				$c = '(bogus@example.org)';

				$sanitized_a = filter_var($a, FILTER_SANITIZE_EMAIL);
				if (filter_var($sanitized_a, FILTER_VALIDATE_EMAIL)) {
					echo "This (a) sanitized email address is considered valid.\n";
				}

				$sanitized_b = filter_var($b, FILTER_SANITIZE_EMAIL);
				if (filter_var($sanitized_b, FILTER_VALIDATE_EMAIL)) {
					echo "This sanitized email address is considered valid.";
				} else {
					echo "This (b) sanitized email address is considered invalid.\n";
				}

				$sanitized_c = filter_var($c, FILTER_SANITIZE_EMAIL);
				if (filter_var($sanitized_c, FILTER_VALIDATE_EMAIL)) {
					echo nl2br("This (c) sanitized email address is considered valid.\n");
					echo nl2br("Before: $c\n");
					echo nl2br("After:  $sanitized_c\n");    
        }
        $thisPage = htmlspecialchars($_SERVER["PHP_SELF"]);
			?>		
      </div>
      
      <div class="container-fluid">
<form action=<?= $thisPage?> method="POST" style="margin: 60px;">
  <div class="form-group">
    <label for="principle">Enter String To Sanitizing. <span class="text-danger" >*</span></label>
    <input type="text" class="form-control col-4" id="sani" name="sani">
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
</form>

<div class="container">
			<h2>Sanitizing a String (Removing HTML Tags)</h2>
			<?php
				
				echo "Before sanitizing : $sani";
				$ss = filter_var($sani, FILTER_SANITIZE_STRING);
				echo "After sanitizing : $ss";
			?>
		</div>

</div>

</body>