<!DOCTYPE html>
<!-- error handling -->
<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
?>
<html lang="en">
  <?php  include("inc/project-functions.php"); ?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" type="image/favicon.png" href="img/favicon.png">
  <script src="js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/project-style.css">
  <title><?php echo "$websiteName - $myName"; ?></title>
</head>
<body>
<main class="container m-0">
  <?php include("inc/800-nav.php"); ?>
  <h2>Tables View</h2><hr>
  <div class='row'>
    <div class='col-md-12'>     
    
    <?php // --------------------------------------------------- START of PHP CODE
    include("inc/db-connect.php"); // Connect to database ($dbc)
    // ---------------------------------------------------- Set 4 Table name variables
    $carsTable      = "cars";
    $carColorTable  = "carColor";
    $carStyleTable   = "style";

    // ----------------------------------------------------- (1) SELECT & LIST "$carsTable" - START
    $sqlStatement = "SELECT * FROM $carsTable";
    $results      = @mysqli_query($dbc, $sqlStatement);   // Run the $sqlStatement query.
    if ($results){ 
      listCars($carsTable,$results);
    } else {
      echo "Error SELECTING ($carsTable): " . mysqli_error($dbc);
    }  

    // ----------------------------------------------------- (2) SELECT "$carColorTable" 
    $sqlStatement = "SELECT * FROM $carColorTable";
    $results      = @mysqli_query($dbc, $sqlStatement);   // Run the $sqlStatement query.
    if ($results){ 
      listColor($carColorTable,$results);
    } else {
      echo "Error SELECTING ($carColorTable): " . mysqli_error($dbc);
    }  

    // ----------------------------------------------------- (3) SELECT & LIST "$carStyleTable" 
    $sqlStatement = "SELECT * FROM $carStyleTable";
    $results      = @mysqli_query($dbc, $sqlStatement);   // Run the $sqlStatement query.
    if ($results){ 
      listStyle($carStyleTable,$results);   
    } else {
      echo "Error SELECTING ($carStyleTable): " . mysqli_error($dbc);
    }  
    
    // ---------------------------------------------------- CLOSE mySQL database connection
    $closeResult = mysqli_close($dbc);  // Close DB connection when done with database work
    if($closeResult) { // echo "<p >Database closed - Process completed.</p>"; 
    } else { 
      echo "<p class='text-danger'>Error closing database.</p>"; 
    }
?> <!-- ------------------------------------------------ END of PHP CODE -->

    </div> <!-- End Column Div -->
</div> <!-- End Row Div -->
<?php include("inc/footer.php"); ?>
</main>
</body>
</html>