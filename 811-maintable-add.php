<!DOCTYPE html>
<html lang="en">
    <?php  include("inc/project-functions.php"); ?>
<head>
    <meta charset="UTF-8">
    <title><?php echo "$websiteName - $myName"; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/800-style.css">
<body>
<main class="container mt-5">
    <?php include("inc/800-nav.php"); ?>
    <?php include("inc/800-header.php"); ?>
    <h2>811-maintable-add.php</h2>
<hr>
<?php // ----------------------------------------- START of PHP CODE
print "<div class='row'><div class='col-md-12'>";      //  One <row> and <col> for this page
include("inc/db-connect.php");                     // Connect to database ($dbc)
// echo "<h3 class='success'>Process started.</h3>";


if(isset($_POST['submit'])) {  
// someone pressed the submit button, do the insert

$colorId    = $_POST['color'];
$categoryId = $_POST['category'];
$thisName   = $_POST['thisName'];
$someDate   = $_POST['someDate'];
$comments   = htmlentities($_POST['comments']);  // REVISED 4/13
$price      = $_POST['price'];
$cost       = $_POST['cost'];
$active     = $_POST['active'];

//print "<h4>$colorId</h4>\n";
//print "<h4>$categoryId</h4>\n";
//print "<h4>$thisName</h4>\n";
//print "<h4>$someDate</h4>\n";
//print "<h4>$comments</h4>\n";
//print "<h4>$price</h4>\n";
//print "<h4>$cost</h4>\n";
//print "<h4>$active</h4>\n";

print "<h3>DOING THE ADD NOW!!</h3>\n";
    $tableName = 'maintable';

    $sqlStatement = "INSERT INTO $tableName 
    (color_id,category_id,this_name,some_date,comments,price,cost,active) 
        VALUES ('$colorId','$categoryId','$thisName','$someDate','$comments',$price,$cost,$active);";
    
    print "<hr>$sqlStatement<hr>\n";  // for testing only
  
     $results = mysqli_query($dbc, $sqlStatement);

     if ($results) 
     {print "<p class='success'>[ $tableName ]table '$tableName' INSERTED successfully!</p>\n";
     } else {
        print "<p class='error'>Error INSERTING data into table ($tableName): " . mysqli_error($dbc) . "</p>\n";}

    } else {
// just display the form, no submit
print "<div class='div-form'><form action='' method='post'>\n";

buildCodeSelect($dbc,'color');
buildCodeSelect($dbc,'category');

buildFormElement('text','thisName');
buildFormElement('date','someDate');
buildFormElement('textarea','comments');
buildFormElement('number','price');
buildFormElement('number','cost');
buildFormElement('T/F','active');

print "<input type='submit' name='submit' value='Submit'>\n";
print "<input type='reset' name='reset' value='Clear Form data'>\n";
print "</form></div>\n";

} // end of submit() section

// ---------------------------------------------------- CLOSE mySQL database connection
$closeResult = mysqli_close($dbc);  // Close DB connection when done with database work
if($closeResult) {echo "<p >Database closed - Process completed.</p>"; 
} else {echo "<p class='text-danger'>Error closing database.</p>";}

// echo "<h3 class='success'>Process completed.</h3>";
print "</div></div>"; 
?> <!-- -------------------------------------------- END of PHP CODE -->
<?php include("inc/footer.php"); ?>
</main></body></html>