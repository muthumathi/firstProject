<!DOCTYPE html>
<html lang="en">
<head>
<title>
File Operations
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
<?php
	$filename = "footer.txt";
	?>
<?php include 'header.php';?>

<div class="jumbotron text-center">
  <h1>File Operations</h1>
  <h2>Muthu is the Best FullStack Developer you have ever Know!</h2> 
  <h4>You can See actual <b>.txt</b> file
  <a href="footer.txt" style="text-decoration: none;font-weight:700;color:black;" target="_blank">
   Here </a>
  
  </h4>



  
</div>
<div class="container">
		<h1>About us - Full Read</h1>
		<p>
			<?php
			// Open the file.
			$file = fopen($filename, "r") or die("Unable to open " . $filename . ".");
			$filesize = filesize($filename);

			// Do file operations.
			echo fread($file, $filesize);

			// Finally close the file.
			fclose($file);
			?>
		</p>
	</div>

	<div class="container">
		<h1>About us - Read Character by Character</h1>
		<p>
			<?php
			// Open the file.
			$file = fopen($filename, "r") or die("Unable to open " . $filename . ".");

			// Do file operations.
			while (!feof($file)) {
				$c = fgetc($file);
				echo $c;
				if ($c == "\n")
					echo "<br />";
			}

			// Finally close the file.
			fclose($file);
			?>
		</p>
	</div>

	<div class="container">
		<h1>About us - Read Line by Line</h1>
		<p>
			<?php
			// Open the file.
			$file = fopen($filename, "r") or die("Unable to open " . $filename . ".");

			// Do file operations.
			while (!feof($file)) {
				$s = fgets($file);
				echo $s . "<br />";
			}

			// Finally close the file.
			fclose($file);
			?>
		</p>
    </div>
    <?php include 'footer.php'?>
</body>