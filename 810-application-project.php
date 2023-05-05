<?php 
// ------------------------------------------- Set up configuration variables
$websiteName = "< <b>Application Project</b> >";
// ----------------------------------------------------- CREATE TABLE FUNCTIONS
function create_carsTable($tableName) {
    $sqlStatement = "CREATE TABLE $tableName (
        carId         INTEGER     UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,              
        carYear       INTEGER     NOT NULL,
        make       VARCHAR(20) NOT NULL,
        model      VARCHAR(20) NOT NULL, 
        carTrim       VARCHAR(10) NOT NULL, 
        price      DECIMAL(8)  NOT NULL,
        color    VARCHAR(10) NOT NULL,
        units    INT(4),
        isAvailable BOOLEAN,
        INDEX
         (carMake)
    )";
return $sqlStatement;
}



function create_inventoryTable($tableName) {
    $sqlStatement = "CREATE TABLE $tableName (
        inventoryId INTEGER UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
        totalCars INT(7),
        FOREIGN KEY (model),
        FOREIGN KEY (carTrim),

    )";
return $sqlStatement;
}



function create_carTypeTable($tableName) {
    $sqlStatement = "CREATE TABLE $tableName (
        id       VARCHAR(2)  NOT NULL PRIMARY KEY,              
        carType VARCHAR(30) NOT NULL
    )";
return $sqlStatement;
}


function create_colorTable($tableName) {
    $sqlStatement = "CREATE TABLE $tableName (
        id       VARCHAR(2)  NOT NULL PRIMARY KEY,              
        color VARCHAR(30) NOT NULL
    )";
return $sqlStatement;
}


function create_mainTable($tableName) {
    $sqlStatement = "CREATE TABLE $tableName (
        id           INTEGER     UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,              
        color_id     VARCHAR(2)  NOT NULL,
        category_id  VARCHAR(2) NOT NULL,
        this_name    VARCHAR(30) NOT NULL,
        some_date    DATE       NOT NULL, 
        comments     TEXT,
        price        FLOAT,
        cost         FLOAT,
        active       BOOLEAN     
    )";
    return $sqlStatement;
} 


// ------------------------------------------------ INSERT TABLE FUNCTIONS
function insert_cars($tableName) {
    $sqlStatement = "INSERT INTO $tableName (carYear, make, model, carTrim, price, color, units, isAvailable) 
    VALUES 
    (2023, 'Volkswagen', 'Jetta', 'SE', 25000.00, 'Red', 10, true),
    (2023, 'Volkswagen', 'Jetta', 'SEL', 30000.00, 'Blue', 8, true),
    (2023, 'Volkswagen', 'Passat', 'SE', 28000.00, 'Black', 6, true),
    (2023, 'Volkswagen', 'Passat', 'SEL', 32000.00, 'White', 4, true),
    (2023, 'Volkswagen', 'Tiguan', 'SE', 35000.00, 'Gray', 12, true),
    (2023, 'Volkswagen', 'Tiguan', 'SEL', 40000.00, 'Silver', 7, true),
    (2023, 'Volkswagen', 'Atlas', 'SE', 45000.00, 'Red', 9, true),
    (2023, 'Volkswagen', 'Atlas', 'SEL', 50000.00, 'Black', 5, true),
    (2023, 'Volkswagen', 'ID.4 Electric', '', 42000.00, 'Green', 3, true),
    (2023, 'Volkswagen', 'Golf Gti', '', 28000.00, 'Blue', 2, true),
    (2023, 'Volkswagen', 'Jetta', 'S', 22000.00, 'Gray', 14, true),
    (2023, 'Volkswagen', 'Jetta', 'R-Line', 28000.00, 'Black', 5, true),
    (2023, 'Volkswagen', 'Passat', 'R-Line', 35000.00, 'Red', 8, true),
    (2023, 'Volkswagen', 'Passat', 'SE R-Line', 38000.00, 'White', 6, true),
    (2023, 'Volkswagen', 'Tiguan', 'S', 29000.00, 'Blue', 12, true),
    (2023, 'Volkswagen', 'Tiguan', 'SEL Premium R-Line', 45000.00, 'Silver', 4, true),
    (2023, 'Volkswagen', 'Atlas', 'V6 SE', 42000.00, 'Black', 9, true),
    (2023, 'Volkswagen', 'Atlas', 'V6 SEL Premium', 55000.00, 'White', 3, true),
    (2023, 'Volkswagen', 'ID.4 Electric', 'Pro', 42000.00, 'Blue', 5, true),
    (2023, 'Volkswagen', 'ID.4 Electric', 'Pro S', 49000.00, 'Gray', 4, true),
    (2023, 'Volkswagen', 'Jetta', 'S', 20000.00, 'Red', 8, true),
    (2023, 'Volkswagen', 'Jetta', 'SEL Premium', 32000.00, 'White', 3, true),
    (2023, 'Volkswagen', 'Passat', 'R-Line', 34000.00, 'Black', 6, true),
    (2023, 'Volkswagen', 'Passat', 'SE', 28000.00, 'Grey', 13, true),
    (2023, 'Volkswagen', 'Jetta', 'SE', 25000.00, 'Red', 10, true),
    (2023, 'Volkswagen', 'Jetta', 'SEL', 30000.00, 'Blue', 8, true),
    (2023, 'Volkswagen', 'Passat', 'SE', 28000.00, 'Black', 6, true),
    (2023, 'Volkswagen', 'Passat', 'SEL', 32000.00, 'White', 4, true),
    (2023, 'Volkswagen', 'Tiguan', 'SE', 35000.00, 'Gray', 12, true),
    (2023, 'Volkswagen', 'Tiguan', 'SEL', 40000.00, 'Silver', 7, true),
    (2023, 'Volkswagen', 'Atlas', 'SE', 45000.00, 'Red', 9, true),
    (2023, 'Volkswagen', 'Atlas', 'SEL', 50000.00, 'Black', 5, true),
    (2023, 'Volkswagen', 'ID.4 Electric', '', 42000.00, 'Green', 3, true),
    (2023, 'Volkswagen', 'Golf Gti', '', 28000.00, 'Blue', 2, true),
    (2023, 'Volkswagen', 'Jetta', 'S', 22000.00, 'Gray', 14, true),
    (2023, 'Volkswagen', 'Jetta', 'R-Line', 28000.00, 'Black', 5, true),
    (2023, 'Volkswagen', 'Passat', 'R-Line', 35000.00, 'Red', 8, true),
    (2023, 'Volkswagen', 'Passat', 'SE R-Line', 38000.00, 'White', 6, true),
    (2023, 'Volkswagen', 'Tiguan', 'S', 29000.00, 'Blue', 12, true),
    (2023, 'Volkswagen', 'Tiguan', 'SEL Premium R-Line', 45000.00, 'Silver', 4, true),
    (2023, 'Volkswagen', 'Atlas', 'V6 SE', 42000.00, 'Black', 9, true),
    (2023, 'Volkswagen', 'Atlas', 'V6 SEL Premium', 55000.00, 'White', 3, true),
    (2023, 'Volkswagen', 'ID.4 Electric', 'Pro', 42000.00, 'Blue', 5, true),
    (2023, 'Volkswagen', 'ID.4 Electric', 'Pro S', 49000.00, 'Gray', 4, true),
    (2023, 'Volkswagen', 'Jetta', 'S', 20000.00, 'Red', 8, true),
    (2023, 'Volkswagen', 'Jetta', 'SEL Premium', 32000.00, 'White', 3, true),
    (2023, 'Volkswagen', 'Passat', 'R-Line', 34000.00, 'Black', 6, true),
    (2023, 'Volkswagen', 'Jetta', 'S', 19990.00, 'Black', 10, true),
    (2023, 'Volkswagen', 'Jetta', 'R-Line', 24690.00, 'Blue', 5, true),
    (2023, 'Volkswagen', 'Jetta', 'SEL', 27690.00, 'White', 3, true),
    (2023, 'Volkswagen', 'Passat', 'SE', 28990.00, 'Red', 4, true),
    (2023, 'Volkswagen', 'Passat', 'SEL', 33990.00, 'Silver', 2, true),
    (2023, 'Volkswagen', 'Tiguan', 'SE', 26790.00, 'Black', 5, true),
    (2023, 'Volkswagen', 'Tiguan', 'SEL', 33090.00, 'Gray', 3, true),
    (2023, 'Volkswagen', 'Atlas', 'SE', 34190.00, 'Blue', 4, true),
    (2023, 'Volkswagen', 'Atlas', 'SEL', 41890.00, 'White', 2, true),
    (2023, 'Volkswagen', 'ID.4', 'Pro', 41295.00, 'Gray', 3, true),
    (2023, 'Volkswagen', 'ID.4', 'Pro S', 44395.00, 'Blue', 2, true),
    (2023, 'Volkswagen', 'Golf GTI', 'S', 29295.00, 'Red', 4, true),
    (2023, 'Volkswagen', 'Golf GTI', 'SE', 32295.00, 'Black', 2, true),
    (2023, 'Volkswagen', 'Golf GTI', 'Autobahn', 35295.00, 'Gray', 1, true),
    (2023, 'Volkswagen', 'Arteon', 'SE', 37990.00, 'White', 3, true),
    (2023, 'Volkswagen', 'Arteon', 'SEL', 41990.00, 'Black', 2, true);
    (2023, 'Volkswagen', 'Jetta', 'S', 19990.00, 'White', 10, true),
    (2023, 'Volkswagen', 'Jetta', 'R-Line', 24690.00, 'Gray', 5, true),
    (2023, 'Volkswagen', 'Jetta', 'SEL', 27690.00, 'Blue', 3, true),
    (2023, 'Volkswagen', 'Passat', 'SE', 28990.00, 'Black', 4, true),
    (2023, 'Volkswagen', 'Passat', 'SEL', 33990.00, 'Red', 2, true),
    (2023, 'Volkswagen', 'Tiguan', 'SE', 26790.00, 'Silver', 5, true),
    (2023, 'Volkswagen', 'Tiguan', 'SEL', 33090.00, 'White', 3, true),
    (2023, 'Volkswagen', 'Atlas', 'SE', 34190.00, 'Black', 4, true),
    (2023, 'Volkswagen', 'Atlas', 'SEL', 41890.00, 'Blue', 2, true),
    (2023, 'Volkswagen', 'ID.4', 'Pro', 41295.00, 'Silver', 3, true),
    (2023, 'Volkswagen', 'ID.4', 'Pro S', 44395.00, 'White', 2, true),
    (2023, 'Volkswagen', 'Golf GTI', 'S', 29295.00, 'Gray', 4, true),
    (2023, 'Volkswagen', 'Golf GTI', 'SE', 32295.00, 'Red', 2, true),
    (2023, 'Volkswagen', 'Golf GTI', 'Autobahn', 35295.00, 'Black', 1, true),
    (2023, 'Volkswagen', 'Arteon', 'SE', 37990.00, 'Blue', 3, true),
    (2023, 'Volkswagen', 'Arteon', 'SEL', 41990.00, 'Silver', 2, true),
    (2023, 'Volkswagen', 'Taos', 'S', 23990.00, 'White', 5, true),
    (2023, 'Volkswagen', 'Taos', 'SE', 27195.00, 'Black', 3, true),
    (2023, 'Volkswagen', 'Taos', 'SEL', 31295.00, 'Gray', 2, true),
    (2023, 'Volkswagen', 'Touareg', 'V6 Sport', 48350.00, 'Red', 1, true),
    (2023, 'Volkswagen', 'Touareg', 'V8 TDI', 80000.00, 'Black', 1, true);";
return $sqlStatement;
}


function insert_colorTable($tableName) {
    $sqlStatement = "INSERT INTO $tableName (id,color) VALUES
    ('rd','Red'),
    ('wh','White'),
    ('bl','Blue'),
    ('rk','Black'),
    ('sv','Silver'),
    ('gr','Gray'),
    ";
return $sqlStatement;
}


function insert_carType($tableName) {
    $sqlStatement = "INSERT INTO $tableName (id,category) VALUES
      ('Sedan'),
      ('SUV'),
      ('Hatchback'),
      ('Electric'),
    ";
return $sqlStatement;
}

function insert_mainTable($tableName) {
    $sqlStatement = "INSERT INTO $tableName 
        (color_id,category_id,this_name,some_date,comments,price,cost,active) 
    VALUES
    ('wh','cl','Cool Widget','2023-1-13','Some comments',20.00,12.00,true),
    ('rd','se','Car Washing','1974-3-17','More comments',16.95,8.97,false),
    ('gr','to','Big Hammer','2022-11-27','Other comments',125.75,75.00,true)  
    ";
return $sqlStatement;
}
----------------------------------------------------- LIST TABLE FUNCTIONS

function displayTableName($thisTable) {
    print "<h2 class='text-primary'>$thisTable</h2>\n";
    return;
}

function displayRowCounter($thisTable, $results,$cols) {
    print "<tr><td colspan='$cols' class='text-center'>
        <a href='811-$thisTable-add.php?dataType=$thisTable'>Add a NEW $thisTable record</a>
    </td></tr>\n";
    print "</table>\n";
    $numberOfRows = mysqli_num_rows($results); // Number of rows from the query
    echo "<p>[ $numberOfRows ] records SELECTED from [ 
        <span class='text-primary'> \"$thisTable\" </span>] database table.</p>\n";
    echo "<hr>\n";
    return;
}

function listSample1($thisTable, $results) {
    displayTableName($thisTable);
    if ($results) {
        print "<table class='table table-striped table-bordered'>\n";
        // need header table row
        while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
            // Need Row output display
            
        }
        displayRowCounter($thisTable, $results,2);
    }
    return;
}
//  -------------------------------------------- 4/13 NEW FUNCTION
function getUpdateColumns($thisTable,$thisId) {
    $updateLink ='<a href="813-updateRecord.php?thisTable='.$thisTable.'&thisId='.$thisId.'">Update</a>';
    //$deleteLink ='<a href="812-deleteRecord.php?thisTable='.$thisTable.'&thisId='.$thisId.'">Delete</a>';
    $deleteLink ='<a onClick="javascript: return confirm(\'Please confirm deletion\');" href="812-deleteRecord.php?thisTable='.$thisTable.'&thisId='.$thisId.'">Delete</a>';  
  
    $updateColumns = '<td class="text-center" >' . $updateLink . '</td>
                      <td class="text-center" >' . $deleteLink . '</td>';
    return $updateColumns;
}


function listCars($thisTable, $results) {
    displayTableName($thisTable);
    if ($results) {
        print "<table class='table table-striped table-bordered'>\n";
        print "<tr>
        <th class='text-left'>carId</th>
        <th class='text-left'>carYear</th>
        <th class='text-left'>make</th>
        <th class='text-left'>model</th>
        <th class='text-center'>carTrim</th>
        <th class='text-center'>price</th>  
        <th class='text-center'>color</th> 
        <th class='text-center'>units</th> 
        <th class='text-center'>isAvailable</th> 
        </tr>\n";
        while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
            $isAvailable    = $row['isValid'] ? 'true' : 'false';
            $thisId     = $row['carId'];
            $thisIdLink = "<a href='814-viewThisRecord.php?thisTable=". $thisTable . "&thisId=" . $thisId . "' title='Click me to view this record.'>" . $thisId . "</a>";    
            $updateColumns = getUpdateColumns($thisTable,$thisId);
            echo "<tr>
            <td class='text-start'>"  . $thisIdLink       . "</td>
            <td class='text-start'>"  . $row['carYear']       . "</td>
            <td class='text-start'>"  . $row['make']  . "</td>
            <td class='text-start'>"  . $row['model'] . "</td>
            <td class='text-start'>"  . $row['carTrim'] . "</td>
            <td class='text-start'>"  . $row['price'] . "</td>
            <td class='text-start'>"  . $row['color'] . "</td>
            <td class='text-start'>"  . $row['units'] . "</td>
            <td class='text-center'>" . $isAvailable          . "</td>
            $updateColumns</tr>\n";
        }
        displayRowCounter($thisTable, $results,9);
    }
    return;
}

function listColor($thisTable, $results) {
    displayTableName($thisTable);
    if ($results) {
        print "<table class='table table-striped table-bordered'>\n";
        print "<tr><th class='center'>ID</th><th >Color</th>
        <th class='text-center'>Update</th><th class='text-center'>Delete</th></tr>";
        while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
            $thisId = $row['id'] ;
            $thisIdLink    = "<a href='814-viewThisRecord.php?thisTable=". $thisTable . "&thisId=" . $thisId . "' title='Click me to view this record.'>" . $thisId . "</a>";    
            $updateColumns = getUpdateColumns($thisTable,$thisId);
            print "<tr>
                    <td>" . $thisIdLink . "</td>
                    <td>" . $row['color'] . "</td>
                    $updateColumns</tr>\n";
        }
        displayRowCounter($thisTable, $results,4);
    }
    return;
} // End listColor()

function listType($thisTable, $results) {
    displayTableName($thisTable);
    if ($results) {
        print "<table class='table table-striped table-bordered'>\n";
        print "<tr><th class='center'>ID</th><th >Category</th>
    <th class='text-center'>Update</th><th class='text-center'>Delete</th></tr>";
        while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
            $thisId = $row['id'] ;  
     
            $thisIdLink    = "<a href='814-viewThisRecord.php?thisTable=". $thisTable . "&thisId=" . $thisId . "' title='Click me to view this record.'>" . $thisId . "</a>";    
   
     
       //     $thisIdLink = '<a href=\'814-viewThisRecord.php?thisTable=$thisTable&thisId=$thisId\' title=\'Click me to view this record.\'>' . $thisId . '</a>'; 
            $updateColumns = getUpdateColumns($thisTable,$thisId);
            print "<tr>
                <td>" . $thisIdLink . "</td>
                <td>" . $row['carType'] . "</td>
                $updateColumns</tr>\n";
        }
        displayRowCounter($thisTable, $results,4);
    }
    return;
} // End listCategory()


function listMainTable($thisTable, $results) {
    displayTableName($thisTable);
    if ($results) {
        print "<table class='table table-striped table-bordered'>\n";
        print ("
            <tr>
                <th class='text-left'>RecId</th>
                <th class='text-left'>Color</th>
                <th class='text-left'>Category</th>
                <th class='text-left'>ThisName</th>
                <th class='text-left'>SomeDate</th>
                <th class='text-left'>Comments</th>
                <th class='text-end'>Price</th>  
                <th class='text-end'>Cost</th> 
                <th class='text-center'>Active</th> 
                <th class='text-center'>Update</th> 
                <th class='text-center'>Delete</th> 
            </tr>
        \n");
       
    while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
        $thisId = $row['id'];
        $thisIdLink = '<a href=\'814-viewThisRecord.php?thisTable=$thisTable&thisId=$thisId\' title=\'Click me to view this record.\'>' . $thisId . '</a>';
        $updateColumns = getUpdateColumns($thisTable,$thisId);
        $active = $row['active'] ? 'true' : 'false';
        print ("
            <tr>
                <td>"                     . $thisIdLink                        . "</td>
                <td>"                     . $row['color_id']               . "</td>
                <td>"                     . $row['category_id']            . "</td>
                <td>"                     . $row['this_name']              . "</td>
                <td>"                     . $row['some_date']              . "</td>
                <td>"                     . $row['comments']               . "</td>
                <td class='text-end'>"    . number_format($row['price'],2) . "</td>
                <td class='text-end'>  "  . number_format($row['cost'],2)  . "</td>
                <td class='text-center'>" . $active                        . "</td>
                $updateColumns
           </tr>
        \n");
    }
        displayRowCounter($thisTable, $results,11);
    }
    return;
} // END listMainTable()


function listMainTable2($thisTable, $results) {
    displayTableName($thisTable);
    if ($results) {
        print "<table class='table table-striped table-bordered'>\n";
        print ("
            <tr>
                <th class='text-center'>RecId</th>
                <th class='text-start'>Color</th>
                <th class='text-start'>Category</th>
                <th class='text-start'>ThisName</th>
                <th class='text-start'>SomeDate</th>
                <th class='text-start'>Comments</th>
                <th class='text-end'>Price</th>  
                <th class='text-end'>Cost</th> 
                <th class='text-center'>Active</th> 
                <th class='text-center'>Update</th> 
                <th class='text-center'>Delete</th> 
            </tr>
        \n");  
    while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
        $thisId        = $row['RecordId'];
        $thisIdLink    = "<a href='814-viewThisRecord.php?thisTable=". $thisTable . "&thisId=" . $thisId . "' title='Click me to view this record.'>" . $thisId . "</a>";    
        $updateColumns = getUpdateColumns($thisTable,$thisId);
        $active        = $row['active'] ? 'true' : 'false';
        print ("
            <tr>
                <td class='text-center'>" . $thisIdLink                        . "</td>
                <td>"                     . $row['colorName']               . "</td>
                <td>"                     . $row['categoryName']            . "</td>
                <td>"                     . $row['this_name']              . "</td>
                <td>"                     . $row['some_date']              . "</td>
                <td>"                     . $row['comments']               . "</td>
                <td class='text-end'>"    . number_format($row['price'],2) . "</td>
                <td class='text-end'>  "  . number_format($row['cost'],2)  . "</td>
                <td class='text-center'>" . $active                        . "</td>
                $updateColumns
            </tr>
        
        \n");
    } // END while() loop
    displayRowCounter($thisTable, $results,11);
    } // END if($results)
    return;
} // END listMainTable2()
// ------------------------------------------- INSERT DATA FUNCTIONS

function buildCodeSelect($dbc,$tableName,$colValue) {
    print "<div class='form-outline mb-4'>\n";
    print "<label for='$tableName'>Choose a $tableName</label>";
    print "<select name='$tableName'>\n";
    $sqlStatement = "SELECT * FROM $tableName";
    $results = mysqli_query($dbc, $sqlStatement) or die ('Cannot show Connect to table');
    while ($thisRow = mysqli_fetch_row($results)) {
        print "<option value='" . $thisRow[0] . "'>" . $thisRow[1] ."</option>\n";
    } // END while() loop
    print "</select></div>\n\n";
    return;
}  // END buildCodeSelect()

function buildFormElement($formType,$varName,$colValue) {
    switch ($formType) {
        case "textarea":
            print "<div class='form-group'>\n";
            print "<label for='$varName'>$varName</label>\n";
            print "<textarea class='form-control' rows='6' id ='$varName' name='$varName'></textarea>\n";
            print "</div>\n";
            break;
        case "T/F":
            print "<div class='form-outline mb-4 mt-4'>\n";
            print "<label for='color'>$varName <select name='$varName' id='$varName'>\n";
            print "<option value='false' selected>False</option>\n";
            print "<option value='true'>True</option>\n";
            print "</select></div>\n";  
            break;
        case "number":
            print "<div class='form-outline' mt-4 mb-4>\n";
            print "<label class='form-label' for='$varName'>$varName </label>\n";
            print "<input type='number' step='any' id='$varName' name='$varName' class='form-control' />\n";
            print "</div>\n";
            break;
        default:
            print "<div class='form-outline mb-4'>\n";
            print "<label class='form-label' for='$varName'>$varName</label>\n";
            print "<input type='$formType' id='$varName' name='$varName' class='form-control' />\n";
            print "</div>\n";   
    } // END switch()
    return;
} // END buildFormElement()

?>
