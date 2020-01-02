
   <!-- Nav Bar Comes Here -->
   <div class="topnava" id="myTopnava">
        <a href="index.html" class="activea">Home</a>

        <!-- <a href="#news">News</a>
        <a href="#contact">Contact</a>
         -->


        <div class="dropdowna">
            <button class="dropbtna">Forms
            <i class="fa fa-caret-down"></i>
          </button>
            <div class="dropdowna-contenta">
                <a href="circleChart.php">Circle Chart</a>
                <a href="simpleInterest.php">Simple Interest</a>
                <a href="weightOtherPlanet.php">Weight On Other Planet</a>
            </div>
        </div>

        <div class="dropdowna">
            <button class="dropbtna">Advanced Concepts
            <i class="fa fa-caret-down"></i>
          </button>
            <div class="dropdowna-contenta">
                <a href="readText.php">Read Text Files</a>
                <a href="fileOperation.php">File Operations</a>
                <a href="fileUploads.php">File Uploads</a>
                <a href="filters.php">Filters</a>
            </div>
        </div>

        <div class="dropdowna">
            <button class="dropbtna">PHP + MySQL
            <i class="fa fa-caret-down"></i>
          </button>
            <div class="dropdowna-contenta">
                <a href="mysqlClass.php">MySQL Class</a>
                <a href="listingRecords.php">Listing Records</a>
                <a href="particularRecord.php">Particular Record</a>
                <a href="paySlip.php">Pay Slip</a>
            </div>
        </div>

        <div class="dropdowna">
            <button class="dropbtna"><b>CRUD</b> - MiniProject
            <i class="fa fa-caret-down"></i>
          </button>
            <div class="dropdowna-contenta">
                <a href="listView.php">List View</a>
                <a href="create.php"><b>C</b>reate</a>
                <a href="viewParticular.php"><b>R</b>ead</a>                
                <a href="edit.php"><b>U</b>pdate</a>
                <a href="delete.php"> <b>D</b>elete</a>
            </div>
        </div>

        <a href="#about">About Me ;</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
    </div>
    <!-- Nav Bar Ends Here -->

<script>
    /* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
    function myFunction() {
        var x = document.getElementById("myTopnava");
        if (x.className === "topnava") {
            x.className += " responsivea";
        } else {
            x.className = "topnava";
        }
    }
</script>