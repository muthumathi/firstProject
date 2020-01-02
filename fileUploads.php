<!DOCTYPE html>
<html lang="en">

<head>
  <title>
    File Uploads.!
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
  <?php include 'header.php'; ?>
  <!-- If PostBack, Validate the Uploaded File Here -->
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $uploadMessage = "";

    //Check if Image is Actual or Fake Image
    if (isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    }
    if ($check !== false) {
      $uploadMessage = $uploadMessage . "File is an Image -" . $check["mime"] . "<br />";
      $uploadOk = 1;
    } else {
      $uploadMessage = $uploadMessage . "File is not an Image; <br />";
      $uploadOk = 0;
    }
  }
  //Check if file already Exist
  if (file_exists($target_file)) {
    $uploadMessage = $uploadMessage . "Sorry file already Exist.<br />";
    $uploadOk = 0;
  }
  //Check File Size and Limit it by 5 MB;
  if ($_FILES["fileToUpload"]["size"] > 5000000) {
    $uploadMessage = $uploadMessage . "Sorry file is Too Large (Max.Limit.Is 5MB);<br />";
    $uploadOk = 0;
  }
  // Allow Certain File Formats Only
  if (
    $imageFileType != "png" && $imageFileType != "jpg"
    && $imageFileType != "jpeg" && $imageFileType != "gif"
  ) {
    $uploadMessage = $uploadMessage . "Sorry Only PNG,JPG,JPEG and GIF files Only Allowed;<br />";
    $uploadOk = 0;
  }
  // Check $uploadOk is Set to "0" by any Error
  if ($uploadOk == 0) {
    $uploadmessage = $uploadmessage . "Sorry, your file was not uploaded.<br />";
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      $uploadMessage = $uploadMessage . "The File" . basename($_FILES["fileToUpload"]["name"]) . "has been Uploaded.<br />";
    } else {
      $uploadmessage = $uploadmessage . "Sorry, there was an error uploading your file.";
    }
  }




  ?>



  <div class="jumbotron text-center">
    <h1>File Uploads.!</h1>
    <h2>Muthu is the Best FullStack Developer you have ever Know!</h2>
  </div>

  <div class="container">
    <h1 align="center">Upload Your Image</h1>
    <form action="fileUploads.php" method="POST" enctype="multipart/form-data" style="margin-bottom: 10px">
      Select an Image to Upload
      <input type="file" name="fileToUpload" id="fileToUpload" style="margin: 5px 5px 5px 0;" />
      <input type="submit" Value="Upload Image" name="submit" />
    </form>
    
    <?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			echo "<p style='margin-top: 50px;'>";
			if ($uploadOk == 1)
				echo "<span class='text-success'>$uploadmessage</span>";
			else
				echo "<span class='text-danger'>$uploadmessage</span>";
			echo "</p>";
		}
		?>


  </div>

  <?php include 'footer.php'; ?>
</body>