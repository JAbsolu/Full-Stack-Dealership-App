<!DOCTYPE html>
<html lang="en">
    <?php  include("inc/project-functions.php"); //MAKE SURE THIS IS RIGHT!!! ?>
<head>
    <meta charset="UTF-8">
    <title><?php echo "$websiteName - $myName"; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/favicon.png" href="img/favicon.png">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/800-style.css">
</head>
<body>
<main class="container mx-0 px-0">
    <?php include("inc/800-nav.php"); ?>
    <h2>Delete a Record</h2>
<hr>
<?php // ----------------------------------------- START of PHP CODE
print "<div class='row'><div class='col-md-12'>";      //  One <row> and <col> for this page
include "inc/db-connect.php";                     // Connect to database ($dbc)
//echo "<h3 class='success'>Process started.</h3>";

$thisTable = $_GET['thisTable'];
$thisId    = $_GET['id'];

echo "<h2>The table to delete from is $thisTable </h2>\n";
echo "<h2>the selected id is $thisId</h2>\n";

switch ($thisTable) {
    case "cars":
        $sqlStatement = "DELETE FROM $thisTable WHERE $thisTable.id = '$thisId';";
        break;
    case "style":
        $sqlStatement = "DELETE FROM $thisTable WHERE $thisTable.id = '$thisId';";
        break;
    case "color":
        $sqlStatement = "DELETE FROM $thisTable WHERE $thisTable.id = '$thisId';";
        break;
    default:
        $sqlStatement = '';
    }
    // print "<h4>$sqlStatement</h4>";


    $results = @mysqli_query($dbc, $sqlStatement);   // Run the $sqlStatement
    if ($results){
        echo "<h3 class='success'>Record '$thisId' deleted from '$thisTable' table.</h3>";
        echo "<p><a href='810-view-sqltables.php'>Click to View Data</a></p>\n";
       } else {echo "Error DELETING ($thisId from $thisTable): " . mysqli_error($dbc);}     

// ---------------------------------------------------- CLOSE mySQL database connection
$closeResult = mysqli_close($dbc);  // Close DB connection when done with database work
if($closeResult) {//echo "<p >Database closed - Process completed.</p>"; 
} else {echo "<p class='text-danger'>Error closing database.</p>";}


//echo "<h3 class='success'>Process completed.</h3>";
print "</div>"; 
?> <!-- ------------------------------------------ END of PHP CODE -->
<?php include("inc/footer.php"); ?>
</main></body></html>