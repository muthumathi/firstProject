<!DOCTYPE html>
<html lang="en">

<head>
  <title>
    Update.!
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
  include 'header.php';
  include_once 'EmployeeBO.php';
  $bo = new Employee();
  $dt = $bo->GetList();
  ?>

  <div class="jumbotron text-center">
    <h1><b>U</b>pdate.!</h1>
    <h2>Muthu is the Best FullStack Developer you have ever Know!</h2>
  </div>
  <div class="container" id="listview">
    <!-- <h2>Employee List</h2> -->
    <form class="form-inline" action="edit0_U.php" method="get">
      <input type="hidden" name="eid" value="0" />
      <button type="submit" class="btn btn-primary" style="margin-bottom: 10px;">Add New</button>
    </form>





    <table class="table table-striped table-hover table-bordered">
      <thead>
        <tr>
          <!-- primary_key -->
          <th>Action</th>
          <th>Employee ID</th>
          <th>Name</th>
          <th>BirthDay</th>
          <th>Qualification</th>
          <th>Department</th>
          <th>Sports</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // $db = new MySQL();

        // $dt = $db->GetDataTable("Select * from Employee");

        foreach ($dt as $dr) { ?>

          <tr>
            <td>

              <a href="edit0_U.php?eid=<?= $dr["primary_key"] ?>">Edit</a>


            </td>
            <td>
              <div id='primary_key' style="display:none;"><?= $dr["primary_key"] ?></div> <?= $dr["employee_id"] ?>
            </td>
            <td> <?= $dr["name"] ?> </td>
            <td> <?= date('d-M-Y l', strtotime($dr["birthday"])) ?> </td>
            <td> <?= $dr["qualification"] ?> </td>
            <td> <?= $dr["department"] ?> </td>
            <td> <?= $dr["sports"] ?> </td>
          </tr>
        <?php
          unset($db);
          unset($dt);
        } ?>
      </tbody>


    </table>
  </div>
  <script>
    $(document).ready(function() {
      $("#listview table").delegate('tr', 'click', function() {
        var eid = $("#primary_key", this).html();
        window.location.href = "views_U.php?eid=" + eid;
      });
    });
  </script>
</body>