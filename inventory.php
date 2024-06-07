<?php 
error_reporting(E_ALL);
// ini_set('display_errors', 1);
?>
<?php include "config.php"; ?>
<?php include "inc/project-functions.php"; ?>
<?php include "inc/db-connect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
      <script src="js/bootstrap.bundle.min.js"></script>
      <link href="css/project-style.css" rel="stylesheet">
      <link rel="icon" type="image/favicon.png" href="img/favicon.png">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <title>Inventory view</title>
</head>
<body>
    <div class="container-fluid m-0 p-0">
    <?php include("inc/800-nav.php") ?>

    <?php
        //connect to db
        $connection = new mysqli($DBHOST, $DBUSER, $DBPASS, $DBNAME);
        $thisTable = 'cars';
        $carsSqlStatement = "SELECT * FROM $thisTable"; // query
        $carResult = $connection->query($carsSqlStatement); // return result

        print ("
            <div class='mb-3 px-2'>
                <img src='img/inventory-banner.png' width='100%'>
                <div class='pt-4'>
                <h4 class='h4 text-start m-0 pt-3'>Shop all models </h4> 
                <span>
                    <span class='fw-bold fs-5'>Filter </span>
                    <label for='car-select'>Model</label>
                    <select id='car-select'>
                        <option value='model' name='Arteon'>Arteon</option>
                        <option value='model' name='Atlas'>Atlas</option>
                        <option value='model' name='Tiguan'>Tiguan</option>
                        <option value='model' name='Taos'>Taos</option>
                        <option value='model' name='ID'>ID.4</option>
                        <option value='model' name='Passat'>Passat</option>
                        <option value='model' name='Jetta'>Jetta</option>
                        <option value='model' name='Golf'>Golf Gti</option>
                    </select>
                    <label for='trim-select'>Trim</label>
                    <select id='trim-select'>
                        <option value='model' name='S'>S</option>
                        <option value='model' name='SE'>SE</option>
                        <option value='model' name='SEL'>SEL</option>
                        <option value='model' name='SEL'>SEL R-line</option>
                        <option value='model' name='Electric'>Electric</option>
                        <option value='model' name='Autobahn'>Autobahn</option>
                    </select>
                </span>
                </div>
            </div>
        ");
        // create the container for the inventory cards
        echo "<div class='px-2 pb-5 mb-5 d-flex flex-wrap gap-2 justify-content-start'>";
        while ($row = mysqli_fetch_array($carResult, MYSQLI_ASSOC)) {
            $carYear  = $row['carYear'];
            $carMake  = $row['make'];
            $carModel = $row['model'];
            $carTrim  = $row['carTrim'];
            $price    = $row['price'];
            $formatted_price = number_format($price, 2, '.', ',');
            $carTitle = "$carYear $carMake $carModel $carTrim";
            echo "  <div class='card shadow' style='width: 21.7rem;'>";
            echo "  <a href='view-car.php?model=$carModel?trim=$carTrim?price=$price' class='text-decoration-none m-0 p-0'>";             
            echo "      <img src='img/" . $row['model'] . ".png' class='card-img-top' alt='...'>";
            echo "      <div class='card-body'>";
            echo "        <h5 class='card-title'>$carTitle</h5>";
            echo "        <p class='card-text text-secondary'>MSRP at $" . "$formatted_price</p>";
            echo "      </div>";
            echo "      <div class='card-body d-flex justify-content-start align-items-center'>";
            echo ("        <a href='view-car.php?model=$carModel?trim=$carTrim?price=$price' class='card-link text-decoration-none px-2 py-2 fs-6 border rounded bg-primary text-light'>
                                Learn more
                            </a>        
                ");
            echo "      </div>";
            echo "  </a>";
            echo "  </div>";
        }
        echo "</div>";
        $connection->close();
     ?>

    <?php include("inc/footer.php") ?>
    </div>
</body>
</html>

