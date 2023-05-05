<!DOCTYPE html>
<html lang="en">
    <?php
include("inc/project-functions.php"); //MAKE SURE THIS IS RIGHT!!! 
?>
<head>
    <meta charset="UTF-8">
    <title><?php
echo "$websiteName - $myName";
?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/favicon.png" href="img/favicon.png">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/800-style.css">
<body>
<main class="container mt-5">
    <?php
include("inc/800-nav.php");
?>
   <h2>Update Record</h2>
<hr>
<?php // ----------------------------------------- START of PHP CODE
print "<div class='row'><div class='col-md-12'>"; //  One <row> and <col> for this page
include("inc/db-connect.php"); // Connect to database ($dbc)
echo "<h3 class='success'>Process started.</h3>";

$thisTable = $_GET['thisTable'];
$thisId    = $_GET['thisId'];
echo "<h2>$thisTable</h2>\n";
echo "<h2>$thisId</h2>\n";

// ---------------------------------------------------- CLOSE mySQL database connection
$closeResult = mysqli_close($dbc); // Close DB connection when done with database work
if ($closeResult) {
    echo "<p >Database closed - Process completed.</p>";
} else {
    echo "<p class='text-danger'>Error closing database.</p>";
}

echo "<h3 class='success'>Process completed.</h3>";
print "</div>";
?> <!-- ------------------------------------------ END of PHP CODE -->
<?php
include("inc/footer.php");
?>
</main>
</body>
</html>