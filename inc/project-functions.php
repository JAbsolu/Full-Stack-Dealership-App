<?php 
// ------------------------------------------- Set up configuration variables
$websiteName = "Application Project";
// ----------------------------------------------------- CREATE TABLE FUNCTIONS
function create_carsTable($tableName) {
    $sqlStatement = "CREATE TABLE $tableName (
        id            INTEGER     UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,   
        carYear       INT(6)      NOT NULL,
        make          VARCHAR(20) NOT NULL,
        model         VARCHAR(20) NOT NULL, 
        carTrim       VARCHAR(20),
        price         DECIMAL(12) NOT NULL,
        colorid       VARCHAR(10) NOT NULL,
        styleid       VARCHAR(10) NOT NULL,
        units         INT(6),
        isAvailable   BOOLEAN
    )";
return $sqlStatement;
}

function create_carColorTable($tableName) {
    $sqlStatement = "CREATE TABLE $tableName (
        id    VARCHAR(2)   NOT NULL PRIMARY KEY,              
        color VARCHAR(30)  NOT NULL
    )";
return $sqlStatement;
}

function create_styleTable($tableName) {
    $sqlStatement = "CREATE TABLE $tableName (
        id       VARCHAR(2)  NOT NULL PRIMARY KEY,              
        style    VARCHAR(30) NOT NULL
    )";
return $sqlStatement;
}

// ------------------------------------------------ INSERT TABLE FUNCTIONS
function insert_carsTable($tableName) {
    $sqlStatement = "INSERT INTO $tableName (carYear, make, model, carTrim, price, colorid, styleid, units, isAvailable) 
    VALUES 
    (2023, 'Volkswagen', 'Jetta', 'SE', 25000.00, 'rd', 'SE',10, true),
    (2023, 'Volkswagen', 'Jetta', 'SEL', 30000.00, 'bl','SE', 8, true),
    (2023, 'Volkswagen', 'Jetta', 'SE', 25000.00, 'rd', 'SE',10, true),
    (2023, 'Volkswagen', 'Jetta', 'SEL', 30000.00, 'bl','SE', 8, true),
    (2023, 'Volkswagen', 'Passat', 'SE', 28000.00, 'bk','SE', 6, true),
    (2023, 'Volkswagen', 'Passat', 'SE', 28000.00, 'bk','SE', 6, true),
    (2023, 'Volkswagen', 'Passat', 'SEL', 32000.00, 'wh', 'SE', 4, true),
    (2023, 'Volkswagen', 'Passat', 'SEL', 32000.00, 'wh', 'SE', 4, true),
    (2023, 'Volkswagen', 'Tiguan', 'SE', 35000.00, 'gy', 'SUV', 12, true),
    (2023, 'Volkswagen', 'Tiguan', 'SE', 35000.00, 'gy', 'SUV', 12, true),
    (2023, 'Volkswagen', 'Tiguan', 'SEL', 40000.00, 'sv','SUV', 7, true),
    (2023, 'Volkswagen', 'Tiguan', 'SEL', 40000.00, 'sv','SUV', 7, true),
    (2023, 'Volkswagen', 'Atlas', 'SE', 45000.00, 'rd','SUV', 9, true),
    (2023, 'Volkswagen', 'Atlas', 'SE', 45000.00, 'rd','SUV', 9, true),
    (2023, 'Volkswagen', 'Atlas', 'SEL', 50000.00, 'bk','SUV', 5, true),
    (2023, 'Volkswagen', 'Atlas', 'SEL', 50000.00, 'bk','SUV', 5, true),
    (2023, 'Volkswagen', 'ID4', 'Electric', 42000.00, 'gr','EL', 3, true),
    (2023, 'Volkswagen', 'ID4', 'Electric', 42000.00, 'gr','EL', 3, true),
    (2023, 'Volkswagen', 'ID4', 'Electric', 42000.00, 'gr','EL', 3, true),
    (2023, 'Volkswagen', 'ID4', 'Electric', 42000.00, 'gr','EL', 3, true),
    (2023, 'Volkswagen', 'Golf-GTI', '', 28000.00, 'bl','HA', 2, true),
    (2023, 'Volkswagen', 'Golf-GTI', '', 28000.00, 'bl','HA', 2, true),
    (2023, 'Volkswagen', 'Golf-GTI', '', 28000.00, 'bl','HA', 2, true),
    (2023, 'Volkswagen', 'Golf-GTI', '', 28000.00, 'bl','HA', 2, true),
    (2023, 'Volkswagen', 'Jetta', 'S', 22000.00, 'gy','SE', 14, true),
    (2023, 'Volkswagen', 'Jetta', 'S', 22000.00, 'gy','SE', 14, true),
    (2023, 'Volkswagen', 'Jetta', 'S', 22000.00, 'gy','SE', 14, true),
    (2023, 'Volkswagen', 'Jetta', 'R-Line', 28000.00, 'bk','SE', 5, true),
    (2023, 'Volkswagen', 'Passat', 'R-Line', 35000.00, 'rd','SE', 8, true),
    (2023, 'Volkswagen', 'Passat', 'R-Line', 35000.00, 'rd','SE', 8, true),
    (2023, 'Volkswagen', 'Passat', 'SE R-Line', 38000.00, 'wh','SE', 6, true),
    (2023, 'Volkswagen', 'Passat', 'SE R-Line', 38000.00, 'wh','SE', 6, true),
    (2023, 'Volkswagen', 'Tiguan', 'S', 29000.00, 'bl','SUV', 12, true),
    (2023, 'Volkswagen', 'Tiguan', 'S', 29000.00, 'bl','SUV', 12, true),
    (2023, 'Volkswagen', 'Tiguan', 'S', 29000.00, 'bl','SUV', 12, true),
    (2023, 'Volkswagen', 'Tiguan', 'SEL Premium R-Line', 45000.00, 'sv', 'SUV', 4, true),
    (2023, 'Volkswagen', 'Atlas', 'V6 SE', 42000.00, 'bk','SUV', 9, true),
    (2023, 'Volkswagen', 'Atlas', 'V6 SE', 42000.00, 'bk','SUV', 9, true),
    (2023, 'Volkswagen', 'Atlas', 'V6 SEL Premium', 55000.00, 'wh', 'SUV', 3, true),
    (2023, 'Volkswagen', 'Atlas', 'V6 SEL Premium', 55000.00, 'wh', 'SUV', 3, true),
    (2023, 'Volkswagen', 'ID4', 'Electric Pro', 42000.00, 'bl','EL', 5, true),
    (2023, 'Volkswagen', 'ID4', 'Electric Pro', 42000.00, 'bl','EL', 5, true),
    (2023, 'Volkswagen', 'ID4', 'Electric Pro', 42000.00, 'bl','EL', 5, true),
    (2023, 'Volkswagen', 'ID4', 'Electric Pro S', 49000.00, 'gy', 'EL', 4, true),
    (2023, 'Volkswagen', 'Jetta', 'S', 20000.00, 'rd', 'SE', 8, true),
    (2023, 'Volkswagen', 'Jetta', 'SEL Premium', 32000.00, 'wh', 'SE', 3, true),
    (2023, 'Volkswagen', 'Jetta', 'SEL Premium', 32000.00, 'wh', 'SE', 3, true),
    (2023, 'Volkswagen', 'Jetta', 'SEL Premium', 32000.00, 'wh', 'SE', 3, true),
    (2023, 'Volkswagen', 'Passat', 'R-Line', 34000.00, 'bk','SE', 6, true),
    (2023, 'Volkswagen', 'Passat', 'SE', 28000.00, 'rd', 'SE', 13, true),
    (2023, 'Volkswagen', 'Passat', 'SE', 28000.00, 'rd', 'SE', 13, true),
    (2023, 'Volkswagen', 'Passat', 'SE', 28000.00, 'rd', 'SE', 13, true),
    (2023, 'Volkswagen', 'Jetta', 'SE', 25000.00, 'rd', 'SE', 10, true),
    (2023, 'Volkswagen', 'Jetta', 'SEL', 30000.00, 'bl','SE', 8, true),
    (2023, 'Volkswagen', 'Jetta', 'SEL', 30000.00, 'bl','SE', 8, true),
    (2023, 'Volkswagen', 'Jetta', 'SEL', 30000.00, 'bl','SE', 8, true),
    (2023, 'Volkswagen', 'Passat', 'SE', 28000.00, 'bk','SE', 6, true),
    (2023, 'Volkswagen', 'Passat', 'SE', 28000.00, 'bk','SE', 6, true),
    (2023, 'Volkswagen', 'Passat', 'SE', 28000.00, 'bk','SE', 6, true),
    (2023, 'Volkswagen', 'Passat', 'SEL', 32000.00, 'wh', 'SE', 4, true),
    (2023, 'Volkswagen', 'Tiguan', 'SE', 35000.00, 'gy', 'SUV', 12, true),
    (2023, 'Volkswagen', 'Tiguan', 'SE', 35000.00, 'gy', 'SUV', 12, true),
    (2023, 'Volkswagen', 'Tiguan', 'SE', 35000.00, 'gy', 'SUV', 12, true),
    (2023, 'Volkswagen', 'Tiguan', 'SEL', 40000.00, 'sv', 'SUV', 7, true),
    (2023, 'Volkswagen', 'Atlas', 'SE', 45000.00, 'rd', 'SUV', 9, true),
    (2023, 'Volkswagen', 'Atlas', 'SEL', 50000.00, 'bk','SUV', 5, true),
    (2023, 'Volkswagen', 'Atlas', 'SEL', 50000.00, 'bk','SUV', 5, true),
    (2023, 'Volkswagen', 'Atlas', 'SEL', 50000.00, 'bk','SUV', 5, true),
    (2023, 'Volkswagen', 'ID4', 'Electric Pro', 42000.00, 'gr', 'EL', 3, true),
    (2023, 'Volkswagen', 'ID4', 'Electric Pro', 42000.00, 'gr', 'EL', 3, true),
    (2023, 'Volkswagen', 'ID4', 'Electric Pro', 42000.00, 'gr', 'EL', 3, true),
    (2023, 'Volkswagen', 'ID4', 'Electric Pro', 42000.00, 'gr', 'EL', 3, true),
    (2023, 'Volkswagen', 'Golf-GTI', '', 28000.00, 'bl','HA', 2, true),
    (2023, 'Volkswagen', 'Golf-GTI', '', 28000.00, 'bl','HA', 2, true),
    (2023, 'Volkswagen', 'Golf-GTI', '', 28000.00, 'bl','HA', 2, true),
    (2023, 'Volkswagen', 'Golf-GTI', '', 28000.00, 'bl','HA', 2, true),
    (2023, 'Volkswagen', 'Jetta', 'S', 22000.00, 'gy', 'SE', 14, true),
    (2023, 'Volkswagen', 'Jetta', 'R-Line', 28000.00, 'bk','SE', 5, true),
    (2023, 'Volkswagen', 'Passat', 'R-Line', 35000.00, 'rd', 'SE', 8, true),
    (2023, 'Volkswagen', 'Passat', 'SE R-Line', 38000.00, 'wh', 'SE', 6, true),
    (2023, 'Volkswagen', 'Tiguan', 'S', 29000.00, 'bl','SUV', 12, true),
    (2023, 'Volkswagen', 'Tiguan', 'SEL Premium R-Line', 45000.00, 'sv', 'SUV', 4, true),
    (2023, 'Volkswagen', 'Atlas', 'V6 SE', 42000.00, 'bk','SUV', 9, true),
    (2023, 'Volkswagen', 'Atlas', 'V6 SEL Premium', 55000.00, 'wh', 'SUV', 3, true),
    (2023, 'Volkswagen', 'ID4', 'Electric Pro', 42000.00, 'bl','EL' , 5, true),
    (2023, 'Volkswagen', 'ID4', 'Electric Pro S', 49000.00, 'gy', 'EL', 4, true),
    (2023, 'Volkswagen', 'Jetta', 'S', 20000.00, 'rd', 'SE', 8, true),
    (2023, 'Volkswagen', 'Jetta', 'SEL Premium', 32000.00, 'wh', 'SE', 3, true),
    (2023, 'Volkswagen', 'Passat', 'R-Line', 34000.00, 'bk','SE', 6, true),
    (2023, 'Volkswagen', 'Jetta', 'S', 19990.00, 'bk','SE', 10, true),
    (2023, 'Volkswagen', 'Jetta', 'R-Line', 24690.00, 'bl','SE' , 5, true),
    (2023, 'Volkswagen', 'Jetta', 'SEL', 27690.00, 'wh', 'SE', 3, true),
    (2023, 'Volkswagen', 'Passat', 'SE', 28990.00, 'rd', 'SE', 4, true),
    (2023, 'Volkswagen', 'Passat', 'SEL', 33990.00, 'sv', 'SE', 2, true),
    (2023, 'Volkswagen', 'Tiguan', 'SE', 26790.00, 'bk','SUV', 5, true),
    (2023, 'Volkswagen', 'Tiguan', 'SEL', 33090.00, 'gy', 'SUV', 3, true),
    (2023, 'Volkswagen', 'Atlas', 'SE', 34190.00, 'bl', 'SUV', 4, true),
    (2023, 'Volkswagen', 'Atlas', 'SEL', 41890.00, 'wh', 'SUV', 2, true),
    (2023, 'Volkswagen', 'ID4', 'Pro', 41295.00, 'gy', 'EL', 3, true),
    (2023, 'Volkswagen', 'ID4', 'Pro S', 44395.00, 'bl','EL', 2, true),
    (2023, 'Volkswagen', 'Golf-GTI', 'S', 29295.00, 'rd', 'HA', 4, true),
    (2023, 'Volkswagen', 'Golf-GTI', 'SE', 32295.00, 'bk','HA', 2, true),
    (2023, 'Volkswagen', 'Golf-GTI', 'Autobahn', 35295.00, 'gy', 'HA', 1, true),
    (2023, 'Volkswagen', 'Arteon', 'SE', 37990.00, 'wh', 'SE', 3, true),
    (2023, 'Volkswagen', 'Arteon', 'SEL', 41990.00, 'bk','SE', 2, true),
    (2023, 'Volkswagen', 'Jetta', 'S', 19990.00, 'wh', 'SE', 10, true),
    (2023, 'Volkswagen', 'Jetta', 'R-Line', 24690.00, 'gy', 'SE', 5, true),
    (2023, 'Volkswagen', 'Jetta', 'SEL', 27690.00, 'bl', 'SE', 3, true),
    (2023, 'Volkswagen', 'Passat', 'SE', 28990.00, 'bk','SE', 4, true),
    (2023, 'Volkswagen', 'Passat', 'SEL', 33990.00, 'rd', 'SE', 2, true),
    (2023, 'Volkswagen', 'Tiguan', 'SE', 26790.00, 'sv', 'SUV', 5, true),
    (2023, 'Volkswagen', 'Tiguan', 'SEL', 33090.00, 'wh', 'SUV', 3, true),
    (2023, 'Volkswagen', 'Atlas', 'SE', 34190.00, 'bk','SUV', 4, true),
    (2023, 'Volkswagen', 'Atlas', 'SEL', 41890.00, 'bl', 'SUV', 2, true),
    (2023, 'Volkswagen', 'ID4', 'Electric Pro', 41295.00, 'sv', 'EL', 3, true),
    (2023, 'Volkswagen', 'ID4', 'Electric Pro S', 44395.00, 'wh', 'EL', 2, true),
    (2023, 'Volkswagen', 'Golf-GTI', 'S', 29295.00, 'gy', 'HA', 4, true),
    (2023, 'Volkswagen', 'Golf-GTI', 'S', 29295.00, 'gy', 'HA', 4, true),
    (2023, 'Volkswagen', 'Golf-GTI', 'SE', 32295.00, 'rd', 'HA', 2, true),
    (2023, 'Volkswagen', 'Golf-GTI', 'Autobahn', 35295.00, 'bk','HA', 1, true),
    (2023, 'Volkswagen', 'Arteon', 'SE', 37990.00, 'bl', 'SE', 3, true),
    (2023, 'Volkswagen', 'Arteon', 'SE', 37990.00, 'bl', 'SE', 3, true),
    (2023, 'Volkswagen', 'Arteon', 'SEL', 41990.00, 'sv', 'SE', 2, true),
    (2023, 'Volkswagen', 'Arteon', 'SEL', 41990.00, 'sv', 'SE', 2, true),
    (2023, 'Volkswagen', 'Taos', 'S', 23990.00, 'wh', 'SV', 5, true),
    (2023, 'Volkswagen', 'Taos', 'SE', 27195.00, 'bk','SV', 3, true),
    (2023, 'Volkswagen', 'Taos', 'S', 23990.00, 'wh', 'SV', 5, true),
    (2023, 'Volkswagen', 'Taos', 'SEL', 31295.00, 'gy', 'SV', 2, true),
    (2023, 'Volkswagen', 'Atlas', 'SEL', 50000.00, 'bk','SUV', 5, true),
    (2023, 'Volkswagen', 'Atlas', 'SE', 34190.00, 'bk','SUV', 4, true),
    (2023, 'Volkswagen', 'Atlas', 'SEL', 50000.00, 'bk','SUV', 5, true),
    (2023, 'Volkswagen', 'Atlas', 'SE', 34190.00, 'bk','SUV', 4, true)
    ";
return $sqlStatement;
}


function insert_carColorTable($tableName) {
    $sqlStatement = "INSERT INTO $tableName (id,color) VALUES
    ('rd','Red'),
    ('wh','White'),
    ('bl','Blue'),
    ('bk','Black'),
    ('sv','Silver'),
    ('gy','Gray'),
    ('gr', 'Green')
    ";
return $sqlStatement;
}

function insert_styleTable($tableName) {
    $sqlStatement = "INSERT INTO $tableName (id,style) VALUES
      ('SE','Sedan'),
      ('SV','SUV'),
      ('HA','Hatchback'),
      ('EL','Electric'),
      ('CP', 'Coupe')
    ";
return $sqlStatement;
}

// ----------------------------------------------------- LIST TABLE FUNCTIONS

function displayTableName($thisTable) {
    print "<h2 class='text-primary'>$thisTable</h2>\n";
    return;
}

function displayRowCounter($thisTable, $results,$cols) {
    print "<tr><td colspan='$cols' class='text-center'>
    <a href='add-record.php?dataType=$thisTable'>Add a NEW $thisTable record</a></td></tr>\n";
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

function listCars($thisTable, $results) {
    displayTableName($thisTable);
    if ($results) {
        print "<table class='table table-striped table-bordered'>\n";
        print "<tr>
            <th class='text-start'>CarId</th>
            <th class='text-start'>CarYear</th>
            <th class='text-start'>Make</th>
            <th class='text-start'>Model</th>
            <th class='text-center'>Trim</th>
            <th class='text-center'>Price</th>  
            <th class='text-center'>Color</th> 
            <th class='text-center'>Style</th> 
            <th class='text-center'>Units</th> 
            <th class='text-center'>isAvailable?</th> 
            <th class='text-center'>Delete</th> 
            </tr>\n";
        while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
            $isAvailable = $row['isAvailable'] ? 'true' : 'false';
            echo '<tr>
            <td class="text-center">
                <a href="view-car.php?model=' .$row['model']  . '?trim='.$row['carTrim'] .'?price='.$row['price'] . ' ">' . $row['id']  . '</a>
            </td> 
            <td class="text-start">' . $row['carYear'] . '</a></td>
            <td class="text-start">' . $row['make'] . '</td>
            <td class="center">
                <a href="view-car.php?model=' .$row['model']  . '?trim='.$row['carTrim'] .'?price='.$row['price'] . ' ">' . $row['model']  . '</a>
            </td>
            <td class="text-start">' . $row['carTrim'] . '</td>
            <td class="text-start">' . $row['price'] . '</td>
            <td class="text-start">' . $row['colorid'] . '</td>
            <td class="text-start">' . $row['styleid'] . '</td>
            <td class="text-start">' . $row['units'] . '</td>
            <td class="text-center">' . $isAvailable . '</td>
            <td class="text-center">
                <a href="fp-deleteRecord.php?id='.$row['id'] . '">Delete</a>
            </td> 
            </tr>';
        }
        displayRowCounter($thisTable, $results,8);
    }
    return;
}

function listColor($thisTable, $results) {
    displayTableName($thisTable);
    if ($results) {
        print "<table class='table table-striped table-bordered'>\n";
        print "<tr><th class='center'>ID</th><th >Color</th>
        <th class='text-center'>Delete</th></tr>";
        while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
            print '<tr>
            <td>' . $row['id'] . '</td>
            <td>' . $row['color'] . '</td>
            <td class="text-center">
                <a href="fp-deleteRecord.php?id='.$row['id'] .'">Delete</a>
            </td> 
        </tr>';
        }
        displayRowCounter($thisTable, $results,4);
    }
    return;
}

function listStyle($thisTable, $results) {
    displayTableName($thisTable);
    if ($results) {
        print "<table class='table table-striped table-bordered'>\n";
        print "<tr><th class='center'>ID</th><th >Category</th>
        <th class='text-center'>Delete</th></tr>";
        while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
            print '<tr>
            <td>' . $row['id'] . '</td>
            <td>' . $row['style'] . '</td>
            <td class="text-center">
                <a href="fp-deleteRecord.php?id='.$row['id'] .'">Delete</a>
            </td> 
        </tr>';  
        }
        displayRowCounter($thisTable, $results,4);
    }
    return;
}

//--------------------------------------------------------- INSERT DATA FUNCTIONS
function buildCodeSelect($dbc,$tableName) {
    print "<div class='form-outline mb-4'>\n";
    print "<label for='$tableName'>Choose a $tableName</label>";
    print "<select name='$tableName'>\n";
    $sqlStatement = "SELECT * FROM $tableName";
    $results = mysqli_query($dbc, $sqlStatement) or die ('Cannot show Connect to table');
    while ($thisRow = mysqli_fetch_row($results)) {
        print "<option value='" . $thisRow[0] . "'>" . $thisRow[1] ."</option>\n";
    }

    print "</select></div>\n\n";
    return;

}

function buildFormElement($formType,$varName) {
    switch ($formType) {
        case "textarea":
            print "<div class='form-group'>\n";
            print "<label for='$varName'>$varName</label>\n";
            print "<textarea class='form-control' rows='6' id ='$varName' name='$varName'></textarea>\n";
            print "</div>\n";
            break;
        case "T/F":
            
            break;
        case "number":
            print "<div class='form-outline' mt-4 mb-4>\n";
           // print "<label class='form-label' for='$varName'>$varName </label>\n";
            print "<input type='number' id='$varName' name='$varName' class='form-control' />\n";
            print "</div>\n";
            break;
        default:
            print "<div class='form-outline mb-4'>\n";
            print "<label class='form-label' for='$varName'>$varName</label>\n";
            print "<input type='$formType' id='$varName' name='$varName' class='form-control' />\n";
            print "</div>\n";
            print "<div class='form-outline mb-4'>\n";
            print "<label for='color'>$varName<select name='$varName' id='$varName'>\n";
            print "<option value='false' selected>False</option>\n";
            print "<option value='true'>True</option>\n";
            print "</select></div>\n";

    };
    return;
}
    













?>
