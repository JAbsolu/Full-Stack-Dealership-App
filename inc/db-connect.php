<?php // Use this connection script to access your student MySQL database

// Set needed variables to run this script
$myHost   = 'csc269-01.hcc-computerscience.com';    // You will need to set this to your ##
$thisHost = $_SERVER['HTTP_HOST'];                  // Gets the current HOST name

$testOn   = false;               // Set to true to show variables, Keep it "false" most of the time .. VERY IMPORTANT!!!!
$isError  = false;              // Used for error handling

// Set the database access information as constants based on SERVER:
switch ($thisHost){
	case 'localhost':
		define('DB_USER',     'student01');                // You will need to set this to YOUR ##
		define('DB_PASSWORD', 'LearnDataBase3000');        // Verify password is correct
		define('DB_HOST',     'localhost');                // Use 'localhost' as the DB_HOST
		define('DB_NAME',     'student01');                // You will need to set this to YOUR ##
		break;
	case $myHost:       
		define('DB_USER',     'hcccomps_stu01');           // You will need to set this to YOUR ## 
		define('DB_PASSWORD', 'LearnDataBase3000');        // Verify password is correct
		define('DB_HOST',     'localhost');                // Use 'localhost' as the DB_HOST
		define('DB_NAME',     'hcccomps_studentDB-01');    // You will need to set this to YOUR ##
		break;
	default:
		$isError      = true;                              // This means YOU HAVE AN ERROR
		$errorMessage = "<h4 class='error'>ERROR: $thisHost not in configuration setup. Check \$myHost variable.</h4>\n";
}

if ($isError) {	print $errorMessage; }    // Prints $errorMessage to let you know there is an issue.

if ($testOn) {
	print "<p>Hostname: $thisHost</p>\n";
	print '<p><b>User:</b> '.DB_USER.' <br><b>Password:</b> '.DB_PASSWORD.
		  '<br><b>Host:</b> '.DB_HOST.'<br><b>Database:</b>'.DB_NAME.'</p>';
}

	// Create database connection 
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);

	if (mysqli_connect_errno()) {
		$connectFlag = false;
		print "<h4 class='error'>Could not connect to MySQL: </h4>\n";
		print "<h4>Error Message: " . mysqli_connect_error() . "</h4>\n";
	} else { 
		$connectFlag = true; 
	    mysqli_set_charset($dbc, 'utf8');  // Set the encoding:
	}



?>