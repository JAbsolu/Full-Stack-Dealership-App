<!DOCTYPE html>
<html lang="en">
    <?php  include("inc/project-functions.php"); ?>
<head>
    <meta charset="UTF-8">
    <title>fp99--build-project-tables.php</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/favicon.png" href="img/favicon.png">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/project-style.css">
</head>
<body>
<main class="container m-0">
    <?php include("inc/800-nav.php"); ?>
    <h2>Build SQL Tables</h2>
<hr>
<?php // ----------------------------------------- START of PHP CODE
print "<div class='row'><div class='col-md-12'>";      //  One <row> and <col> for this page
include("inc/db-connect.php");                     // Connect to database ($dbc)
echo "<h3 class='success'>Process started.</h3>";

// ---------------------------------------------------- Set 3 Table names
$carsTable      = "cars";
$carColorTable  = "carColor";
$carStyleTable  = "style";
// ----------------------------------------------------- DROP 3 tables
echo "<h3 class='success'>Dropping 3 tables.</h3>";

$sqlStatement = "DROP TABLE IF EXISTS $carsTable";
if (mysqli_query($dbc, $sqlStatement)) {print "<p>Table [ '$carsTable' ] DROPPED successfully.</p>\n";
} else {print "<p>Error DROPPING table ($carsTable): " . mysqli_error($dbc) . "</p>\n";}

$sqlStatement = "DROP TABLE IF EXISTS $carColorTable";
if (mysqli_query($dbc, $sqlStatement)) {print "<p>Table [ '$carColorTable' ] DROPPED successfully.</p>\n";
} else {print "<p>Error DROPPING table ($carColorTable): " . mysqli_error($dbc) . "</p>\n";}

$sqlStatement = "DROP TABLE IF EXISTS $carStyleTable";
if (mysqli_query($dbc, $sqlStatement)) {print "<p>Table [ '$carStyleTable' ] DROPPED successfully.</p>\n";
} else {print "<p>Error DROPPING table ($carStyleTable): " . mysqli_error($dbc) . "</p>\n";}

echo "<h4 class='success'>Dropping 3 tables complete.</h4><hr>";

// ----------------------------------------------------- CREATE 3 tables
echo "<h3 class='success'>Creating 3 tables.</h3>";

$sqlStatement = create_carsTable($carsTable);
if (mysqli_query($dbc,$sqlStatement)) {
    print "<p>Table [ '$carsTable' ] CREATED successfully.</p>\n";
} else {
    print "<p>Error CREATING table ($carsTable): " . mysqli_error($dbc) . "</p>\n";
}

$sqlStatement = create_carColorTable($carColorTable);
if (mysqli_query($dbc,$sqlStatement)) {
    print "<p>Table [ '$carColorTable' ] CREATED successfully.</p>\n";
} else {
    print "<p>Error CREATING table ($carColorTable): " . mysqli_error($dbc) . "</p>\n";
}

$sqlStatement = create_styleTable($carStyleTable);
if (mysqli_query($dbc,$sqlStatement)) {
    print "<p>Table [ '$carStyleTable' ] CREATED successfully.</p>\n";
} else {
    print "<p>Error CREATING table ($carStyleTable): " . mysqli_error($dbc) . "</p>\n";
}

echo "<h4 class='success'>Creating 3 tables complete.</h4><hr>";

// ----------------------------------------------------- INSERT $thisTable table
echo "<h3 class='success'>Inserting 3 tables.</h3>";


// ----------------------------------------------------- COMMENT TO confirm that $carsTable is  inserted
// echo "<h1 class='success'> success $carsTable is inserted successfully! </h1>";


$sqlStatement = insert_carColorTable($carColorTable);
if (mysqli_query($dbc,$sqlStatement)) {print "<p>Table [ '$carColorTable' ] INSERTED successfully.</p>\n";
} else {print "<p>Error INSERTING table ($colorTable): " . mysqli_error($dbc) . "</p>\n";}

$sqlStatement = insert_styleTable($carStyleTable);
if (mysqli_query($dbc,$sqlStatement)) {print "<p>Table [ '$carStyleTable' ] INSERTED successfully.</p>\n";
} else {print "<p>Error INSERTING table ($carStyleTable): " . mysqli_error($dbc) . "</p>\n";}


// ----------------------------------------------------- COMMENT TO SEE IF $carsTable is being inserted

$sqlStatement = insert_carsTable($carsTable);
if (mysqli_query($dbc,$sqlStatement)) {
    print "<p>Table [ '$carsTable' ] INSERTED successfully.</p>\n";
} else {
    print "<p>Error INSERTING table ($carsTable): " . mysqli_error($dbc) . "</p>\n";
    echo "<h1 class='text-danger'> Error $carsTable table has not been inserted! </h1>";
}



echo "<h4 class='success'>Inserting 3 tables complete.</h4><hr>";

// ---------------------------------------------------- CLOSE mySQL database connection
$closeResult = mysqli_close($dbc);  // Close DB connection when done with database work
if($closeResult) {echo "<p >Database closed - Process completed.</p>"; 
} else {echo "<p class='text-danger'>Error closing database.</p>";}

echo "<h3 class='success'>Process completed.</h3>";
print "</div>"; 
?> <!-- ------------------------------------------ END of PHP CODE -->
<?php include("inc/footer.php"); ?>
</main>
</body>
</html>