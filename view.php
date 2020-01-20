<!DOCTYPE html>
<html lang="en">

<head>
  <title>
    Particular Record.!
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
  include_once 'MySQL.php';
  include 'header.php';

  ?>

  <div class="jumbotron text-center">
    <h1>Particular Record.!</h1>
    <h2>Muthu is the Best FullStack Developer you have ever Know!</h2>
  </div>

  <!-- <div class="container">
    <form class="form-inline" action="particularRecord.php" method="POST">
      <div class="form-group">
        <label for="empcode">Employee ID:</label>
        <input type="text" name="empID" class="form-control" id="empID">
      </div>
      <button type="submit" class="btn btn-default">Search</button>
  </div> -->

  <div class="container">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      $primary_key = $_GET["eid"];
      $sql = "Select * from Employee where primary_key = '$primary_key'";

      $db = new MySQL();
      $dt = $db->GetDataTable($sql);

      if ($dt->num_rows == 0) {
        die("<div class='text-danger' style='margin-top: 50px;'>No. such employee code found : $empcode</div>");
      }
      $dr = $dt->fetch_assoc();
      unset($db);
      unset($dt);
    ?>
      <h1><?= $dr["name"] ?> Particulars : </h1>
      <div class="row">
        <div class="col-sm-3">
          Employee ID:
        </div>
        <div class="col-sm-9">
          <b><?= $dr["employee_id"] ?></b>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          BirthDay:
        </div>
        <div class="col-sm-9">
          <b><?= date('d-M-Y l', strtotime($dr["birthday"])) ?></b>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          Qualification:
        </div>
        <div class="col-sm-9">
          <b><?= $dr["qualification"] ?></b>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          Department:
        </div>
        <div class="col-sm-9">
          <b><?= $dr["department"] ?></b>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          Designation:
        </div>
        <div class="col-sm-9">
          <b><?= $dr["designation"] ?></b>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-3">
          Languages Known:
        </div>
        <div class="col-sm-9">
          <b><?= $dr["languages_known"] ?></b>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-3">
          Hobbies:
        </div>
        <div class="col-sm-9">
          <b><?= $dr["hobbies"] ?></b>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-3">
          Sports:
        </div>
        <div class="col-sm-9">
          <b><?= $dr["sports"] ?></b>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          Games:
        </div>
        <div class="col-sm-9">
          <b><?= $dr["games"] ?></b>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          Skills:
        </div>
        <div class="col-sm-9">
          <b><?= $dr["skills"] ?></b>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          Goal In Office for <b>2020</b> :
        </div>
        <div class="col-sm-9">
          <b><?= $dr["goal_in_office"] ?></b>
        </div>
      </div>
    <?php
    }
    ?>
  </div>
  <a href="listView.php">
    <button style="margin: 35px;" type="button" class="btn btn-primary">Back</button> </a>

</body>