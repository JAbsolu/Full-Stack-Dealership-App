<?php include("inc/project-functions.php"); ?>
    <?php include("inc/db-connect.php"); ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
          <!-- The next 3 lines are needed for Bootstrap 5 -->
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link href="css/bootstrap.min.css" rel="stylesheet">
          <script src="js/bootstrap.bundle.min.js"></script>
          <!-- This is YOUR custom css file -->
          <link href="css/project-style.css" rel="stylesheet">
          <link rel="icon" type="image/favicon.png" href="img/favicon.png">
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
        <title>View</title>
    </head>
    <body class='bg-light'>
    <div class="container-fluid p-0 m-0">
    
        <!------------------- INCLUDE NAVIGATION -->
        <?php include("inc/800-nav.php"); ?>
    
        <?php
            $thisTable = "cars";
            $sqlStatement = "SELECT * FROM $thisTable";
            $result = mysqli_query($dbc, $sqlStatement);
    
            if (!isset($_GET['linkClicked']) && $_GET['linkClicked'] == 'true') {
                
                echo "<h3 class='text-center h3 pt-4 p-5 text-light fw-light text-center m-0 bg-secondary'> View A Volkswagen Model</h3>";
                // --------- CREATE A CONTAINER
                echo "<div class='container py-4'>";
                //------ START OF ROW
                echo "<div class='row py-4'>"; 
                //------- START OF COL
                echo "<div class='col-md-8 px-0'>"; 
                echo "<div id='carouselExampleControls' class='carousel slide w-100 mh-100' data-bs-ride='carousel'>";
                echo "<div class='carousel-inner'>";
                echo "  <div class='carousel-item'>";
                echo "    <h5 class='text-center'> 2023 Volkswagen Jetta </h5>";
                echo "    <img src='img/Jetta.png' class='d-block w-100' alt='Jetta'>";
                echo "  </div>";
                echo "  <div class='carousel-item active'>";
                echo "    <h5 class='text-center'> 2023 Volkswagen Atlas Cross Sport</h5>";
                echo "    <img src='img/Cross-Sport.png' class='d-block w-100' alt='Atlas'>";
                echo "  </div>";
                echo "  <div class='carousel-item'>";
                echo "    <h5 class='text-center'> 2023 Volkswagen ID.4 </h5>";
                echo "    <img src='img/ID4.png' class='d-block w-100' alt='ID.4'>";
                echo "  </div>";
                echo "  <div class='carousel-item'>";
                echo "    <h5 class='text-center'> 2023 Volkswagen Tiguan </h5>";
                echo "    <img src='img/Tiguan.png' class='d-block w-100' alt='Tiguan'>";
                echo "  </div>";
                echo "  <div class='carousel-item'>";
                echo "    <h5 class='text-center'> 2023 Volkswagen Arteon </h5>";
                echo "    <img src='img/Arteon.png' class='d-block w-100' alt='Arteon'>";
                echo "  </div>";
                echo "  <div class='carousel-item'>";
                echo "    <h5 class='text-center'> 2023 Volkswagen Taos </h5>";
                echo "    <img src='img/Taos.png' class='d-block w-100' alt='Taos'>";
                echo "  </div>";
                echo "</div>";
                echo "<button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleControls' data-bs-slide='prev'>";
                echo "  <span class='carousel-control-prev-icon' aria-hidden='true'></span>";
                echo "  <span class='visually-hidden'>Previous</span>";
                echo "</button>";
                echo "<button class='carousel-control-next' type='button' data-bs-target='#carouselExampleControls' data-bs-slide='next'>";
                echo "  <span class='carousel-control-next-icon' aria-hidden='true'></span>";
                echo "  <span class='visually-hidden'>Next</span>";
                echo "</button>";
                echo "</div>";
                //------ END OF COL
                echo "</div>"; 
                //--------------- SECOND COLUMN
                echo "<div class='col-md-4'>";
                echo "<h5 class='pt-4'> Pick the Volkswagen Model of your choice </h5>";
                $options = "";
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    
                    $carMake = $row['make'];
                    $carModel = $row['model'];
                    $carTrim = $row['carTrim'];
    
                    $make  .= "<option value='$carMake'>$carMake</option>";
                    $model .= "<option value='$carModel'>$carModel</option>";
                    $trim  .= "<option value='$carTrim'>$carTrim</option>";
                }
                echo "<div class='d-flex gap-2'>";
                echo    "<select class='px-2 py-1' disabled>$make</select>";
                echo    "<select class='px-2 py-1'>$model</select>";
                echo    "<select class='px-2 py-1'>$trim</select>";
                echo "</div>";
                echo "</div>"; //------------------SECOND COLUMN END
                echo "</div>"; //-------------- ROW END
    
    
                echo "</div>";
    
            } else {                // If NO Create a Select box and <form>
                //GET THE MODEL FROM THE CAR TABLE---------------------------------
                $carModel = $_GET['model'];

                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

                    $carMake = $row['make'];
                    $carYear = $row['carYear'];
                    $carTrim = $row['carTrim'];

                }

                //--------------TRIM THE MODEL FROM THE FROM THE LINK----------------------------------------
                $pos = strpos($carModel, "?");

                if ($pos !== false) {
                    $model = substr($carModel, 0, $pos);
                } else {
                    $model = $carModel;
                }

                //------------------GET THE TRIM VALUE OUT OF THE LINK------------------------
                $trim_pos = strpos($carModel, "?trim=");

                if ($trim_pos !== false) {
                    $substring = substr($carModel, $trim_pos + strlen("?trim="));
                    $trim = explode("?", $substring)[0];
                } else {
                    $trim = '';
                }

                //------------------GET THE price VALUE OUT OF THE LINK------------------------
                $price_pos = strpos($carModel, "?price=");

                if ($price_pos !== false) {
                    $substring = substr($carModel, $price_pos + strlen("?price="));
                    $price = explode("?", $substring)[0];
                } else {
                    $price = '';
                }
                $formatted_price = number_format($price, 2, '.', ',');
    
                //START OF ROW
                echo "<div class='row px-1 mx-2 mb-5 mt-5 shadow'>";
                //formatting the title for the selected car
                $carTitle = $carYear . " " . $carMake . " " . $model . " " .$trim;
                echo "<h3 class='h3 text-start text-dark py-3'> The New  " . $carTitle . "</h3>"; 
    
                //start of col md 8
                echo "<div class='col-md-8'>";
                echo "<div id='carouselExampleControls' class='carousel slide mb-3' data-bs-ride='carousel'>";
                echo "<div class='carousel-inner'>";
                echo "  <div class='carousel-item active'>";
                echo "    <img src='img/$model.png' class='img-fluid'>";
                echo "  </div>";
                echo "  <div class='carousel-item'>";
                echo "    <img src='img/$model" . "2.png' class='img-fluid'>";
                echo "  </div>";
                echo "  <div class='carousel-item'>";
                echo "    <img src='img/$model" . "3.png' class='img-fluid'>";
                echo "  </div>";
                echo "</div>";
                echo "<button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleControls' data-bs-slide='prev'>";
                echo "  <span class='carousel-control-prev-icon'></span>";
                echo "  <span class='visually-hidden'>Previous</span>";
                echo "</button>";
                echo "<button class='carousel-control-next' type='button' data-bs-target='#carouselExampleControls' data-bs-slide='next'>";
                echo "  <span class='carousel-control-next-icon'></span>";
                echo "  <span class='visually-hidden'>Next</span>";
                echo "</button>";
                echo "</div>";
                echo "</div>"; //End of col md 8
                //End of Row
                //start of col2 md-4
                echo "<div class='col-md-4 bg-light pb-5'>";
                echo ("
                    <h3 class='h4 pt-4'> About The $carTitle </h3>
                    <p class='pb-4'> 
                        The $carTitle costs $$formatted_price
                        <br>
                        Contact us to for a test drive.
                    </p>
                    <div class='d-flex gap-2'>
                        <a href='contact.php' class='text-decoration-none px-3 py-3 bg-primary shadow rounded text-light'> Contact us </a>
                        <a href='numbers-input.php' class='text-decoration-none px-3 py-3 bg-primary shadow rounded text-light'> Calculate payment </a>
                    </div>
                ");
                echo "</div>";  //end of col2 md-4
                echo "</div>";
            }
         ?>
        
        <!-- ------INCLUDE THE FOOTER -->
        <?php include("inc/footer.php"); ?>
    </div>
    </body>
</html>
    