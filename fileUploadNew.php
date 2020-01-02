<!DOCTYPE html> 
<html lang="en"> 
<head> 
	<meta charset="UTF-8"> 
	<title>File Upload Form</title> 
</head> 
<body> 

<?php 
// Check if the form was submitted 
if($_SERVER["REQUEST_METHOD"] == "POST") 
{ 
	// Check if file was uploaded without errors 
	if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) 
	{ 
		$allowed_ext = array("jpg" => "image/jpg", 
							"jpeg" => "image/jpeg", 
							"gif" => "image/gif", 
							"png" => "image/png"); 
		$file_name = $_FILES["photo"]["name"]; 
		$file_type = $_FILES["photo"]["type"]; 
		$file_size = $_FILES["photo"]["size"]; 
	
		// Verify file extension 
		$ext = pathinfo($filename, PATHINFO_EXTENSION); 

		if (!array_key_exists($ext, $allowed_ext))		 
			die("Error: Please select a valid file format."); 
		
		// Verify file size - 2MB max 
		$maxsize = 2 * 1024 * 1024; 

		if ($file_size > $maxsize)		 
			die("Error: File size is larger than the allowed limit.");		 
	
		// Verify MYME type of the file 
		if (in_array($file_type, $allowed_ext)) 
		{ 
			// Check whether file exists before uploading it 
			if (file_exists("upload/".$_FILES["photo"]["name"]))			 
				echo $_FILES["photo"]["name"]." is already exists."; 
			
			else
			{ 
				move_uploaded_file($_FILES["photo"]["tmp_name"], 
						"uploads/".$_FILES["photo"]["name"]); 
				echo "Your file was uploaded successfully."; 
			} 
		} 
		else
		{ 
			echo "Error: Please try again."; 
		} 
	} 
	else
	{ 
		echo "Error: ". $_FILES["photo"]["error"]; 
	} 
} 
?> 

	<form action="fileUploadNew.php" method="post" enctype="multipart/form-data"> 
	<!--multipart/form-data ensures that form data is going to be encoded as MIME data-->
		<h2>Upload File</h2> 
		<label for="fileSelect">Filename:</label> 
		<input type="file" name="photo" id="fileSelect"> 
		<input type="submit" name="submit" value="Upload"> 
		<!-- name of the input fields are going to be used in our php script-->
		<p><strong>Note:</strong>Only .jpg, .jpeg, .png formats allowed to a max size of 2MB.</p> 
	</form> 
</body> 
</html> 
