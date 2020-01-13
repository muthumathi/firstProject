<!DOCTYPE html>
<html lang="en">

<head>
  <title>
    MySQL Class.!
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
  include_once("MySQL.php");
  include 'header.php';
  ?>
  <div class="jumbotron text-center">
    <h1>MySQL Class.!</h1>
    <h2>Muthu is the Best FullStack Developer you have ever Know!</h2>
    <h3>Just Showing/Reading Data Count from Database</h3>
  </div>
  


  <div class="container">
    <?php
    $db = new MySQL();


    $dt = $db->GetDataTable("Select * From Employee");

    echo "No. of records found : " . $dt->num_rows;
    //$db->write();

    unset($dt);
    unset($db);    // Destroy object after the usage.

    ?>
  </div>
  <div class="container" style="margin-top: 50px">
    <!-- <button type="button" id="create" onclick="create()" class="btn btn-dark">Create</button> -->
    <?php
    function create()
    {
      $db = new MySQL();
      $sqll = "";

      $dt = $db->GetDataTable( $sqll);

      //echo "No. of records found : " . $dt->num_rows;

      unset($dt);
      unset($db);    // Destroy object after the usage.

    }

    // sql to create table
$sql = "CREATE TABLE MyGuest (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(30) NOT NULL,
  lastname VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";
  
  if ($this->conn->query($sql) === TRUE) {
      echo "Table MyGuests created successfully";
  } else {
      echo "Error creating table: " . $this->conn->error;
  }
  
  $this->conn->close();


    ?>

  </div>


</body>