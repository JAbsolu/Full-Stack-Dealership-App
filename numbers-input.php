<?php include("inc/db-connect.php"); ?>
<?php include("inc/project-functions.php"); ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Payment Calculator </title>
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <script src="js/bootstrap.bundle.min.js"></script>
      <!-- This is YOUR custom css file -->
      <link href="css/project-style.css" rel="stylesheet">
      <link rel="icon" type="image/favicon.png" href="img/favicon.png">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
   </head>
   <body>
      <?php include("inc/800-nav.php"); ?>
      <!-- Title -->
      <div class="bg-secondary text-light p-5">
         <h3 class="text-light">Calculate a lease payment</h3>
         <p class='fw-light'>This is an estimate, your final lease payment 
            is based on many different factors, such as credit score, down 
            payment, etc.
         </p>
      </div>
      <div class="row pe-0 mw-100">
         <?php 
             //set default value of variables for initial page load
            if (!isset($price)) { $price = 20655; } 
            if (!isset($trade)) { $years = 0; } 
            ini_set('display_error',1);    // Makes sures error display is on  1=on 0=off

            $interest_rate = 5.07;
            $interest_rate_formatted = $interest_rate . "%";
         ?>
         <!-- This section is for the DATA INPUT FORM -->  
         <div class="col-md-6 px-0">
            <form action="numbers-output.php" method="post" class="py-4 ps-5 pe-4 rounded" autocomplete="on">
               <p class="danger"><?php echo $message; ?></p>
               <label for="firstName"> First name </label> <br>
               <input type="text" name="firstName" placeholder="First name" required class='w-100 py-2 px-1 my-1 fs-6'> <br>
               <label for="firstName"> Last name </label> <br>
               <input type="lastName" name="lastName" placeholder="Last name" required class='w-100 py-2 px-1 my-1 fs-6'> <br>
               <label for="income"> Income</label> <br>
               <input type="text" name="income" placeholder="Yearly income" required class='w-100 py-2 px-1 my-1 fs-6'><br>
               <label for="downPayment"> Down payment</label> <br>
               <input type="text" name="downPayment" placeholder="Down payment" required class='w-100 py-2 px-1 my-1 fs-6'><br>
               <label for="trade"> Trade value</label> <br>
               <input type="text" name="trade" placeholder="Trade value" required class='w-100 py-2 px-1 my-1 fs-6'><br>
               <?php 
                        $cars = "cars";
                        $sqlStatement = "SELECT * FROM $cars";
                        $result = mysqli_query($dbc, $sqlStatement);
                        $options = "";
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            $year = $row['carYear'];
                            $make = $row['make'];
                            $model = $row['model'];
                            $trim = $row['carTrim'];
                            $price = $row['price'];
                            $formatted_price = number_format($price, 2); //format the price

                            $vehicle = "$year $make $model $trim - MSRP $$formatted_price"; // formatted the vehicle to show the full year make model trim and price
                            $select_vehicle .= "<option value='$vehicle'>$vehicle</option>";
                        }

                        echo ("
                        <label for='vehicle'>Vehicle</label> <br>
                        <select class='w-100 py-2 px-1 fs-6 my-1' for='vehicle' name='vehicle'> $select_vehicle </select>
                        ");
               ?>
               
               <div class="form-group mx-0 px-0">
                  <label for="" class='my-1 fs-6'>Interest Rate </label><br>
                  <input class="w-100 py-2 px-1 fs-6" type="text" value="" name="interest" placeholder="Enter interest rate"/><br>
                  <!-- loan terms -->
                  <label for="" class='my-1'>Loan terms</label> <br>
                  <select class="w-100 fs-2" name="term" style="padding: 5px;">
                     <option name="36" value="36 Months" class='my-2' required>36 Months</option>
                     <option name="48" value="38 Months" class='my-2' required> 48 Months</option>
                     <option name="60" value="60 Months" class='my-2' required>60 Months</option>
                     <option name="72" value="72 Months" class='my-2' required>72 Months</option>
                  </select>
               </div>
                  
               <input type="submit" name="calculate" value="Calculate" class="my-3 px-4 py-1 rounded border border-secondary bg-light text-dark text-primary">
               <input type="reset"  name="reset"  value="Clear Form" class="my-3 px-4 py-1 rounded border border-secondary bg-light text-dark text-primary">
            </form>
         </div>
         <div class="col-md-6 d-flex flex-column justify-content-center align-items-center text-start">
            <span>
               <h1 class="text-blue px-4">Lease your Brand New Volkswagen Today.</h1>
               <p class="text-start px-4">Ask about our new graduate program </p>
            </span>
            <img src="img/jetta.png" class="img-fluid" >
         </div>
        <!-- Dont' delete this line -->
         <!--  Okay to put HTML BELOW THIS LINE --> 
      </div>
      <?php include("inc/footer.php"); ?>
   </body>
</html>