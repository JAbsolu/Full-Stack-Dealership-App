<?php include "config.php"; ?>
<?php include "inc/db-connect.php"; ?>
<?php include "inc/project-functions.php"; ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <script src="js/bootstrap.bundle.min.js"></script>
      <link href="css/project-style.css" rel="stylesheet">
      <link rel="icon" type="image/favicon.png" href="img/favicon.png">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

      <title>Contact</title>
   </head>
   <body>
        <!-- include links below -->
        <main>
        <?php include("inc/800-nav.php"); ?>
            <?php
               if (isset($_POST['submit'])) {            // 'Submit' button is pressed
               //  PHP variable    = the FORM "name=" variable
                   $first_name           = $_POST['firstName'];
                   $last_name            = $_POST['lastName'];
                   $phone_number         = $_POST['phoneNumber'];
                   $email                = $_POST['email'];
                   $formMessage          = $_POST['message'];
                   $vehicle              = $_POST['vehicle"'];

                   $connection = new mysqli($DBHOST, $DBUSER, $DBPASS, $DBNAME);

                   $cars = "cars";
                   $sqlStatement = "SELECT * FROM $cars";
                   $result = $connection->query($sqlStatement);
                   $options = "";
                   while ($row = $result->fetch_assoc()) {
                       $year = $row['carYear'];
                       $make = $row['make'];
                       $model = $row['model'];
                       $trim = $row['carTrim'];
                       $price = $row['price'];
                       $formatted_price = number_format($price, 2); //format the price
                       $vehicle = "$year $make $model $trim - $$formatted_price"; // formatted the vehicle to show the full year make model trim and price
                       $selected_vehicle .= "<option value='$vehicle'>$vehicle</option>";
                   }
               
                 $to1 = "Johnson.absolu@outlook.com";   // PUT YOUR EMAIL ADDRESS HERE AND UNCOMMENT
                 $to2 = $_POST['email'];                // This is the sender's Email address
                               
               // --------------------------------------------- Assign variables for eMail #1
                  $subject1 = "My Website form submission #63";
                  $message1 = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $formMessage 
                  . "\n\n" . $first_name . "'s" . " selected vehicle is" . $vehicle;
                  $message1 = $message1 . "\n\n ";
                  $headers1 = "From:" . $to2;
               
               // ----------------------------------------------- Assign variables for eMail #2
                  $subject2 = "Thank you for contacting us.";
                  $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $formMessage ;
                  $headers2 = "From:" . $to1;
               
               // -------------------------------------------- eMail #1: Sends an email to YOU.
                  mail($to1,$subject1,$message1,$headers1); 
               
               // -------------------------------------------- eMail #2: Sends an eamil to SENDER.
                  mail($to2,$subject2,$message2,$headers2); 
               
               // ---------------------------------------- This is output to the user
               print ("
                   <div class='bg-secondary text-light p-4'>
                    <h3 class='text-light'>Thank you for contacting us</h3>
                    <p class='fw-light'>
                       A member of our sales team will get back to you as soon as possible.
                    </p>
                  </div>
               ");
               print "<div class='row p-5 bg-light'>";
               print "<div class='col-md-6'>";
                   print ("
                     <h3 class='h3 pt-4 m-0'>Hello $first_name  $last_name,</h3>
                    <p class='fs-6 px-0 pt-2 lh-lg fw-normal'>
                      Thank you inquiring about the $year $make $model $trim. <br>
                      We look forward to assisting you regarding purchasing a $year $make $model $trim. <br>
                      A representative will get back to you as soon as possible via your email address <b>$email</b> 
                      or your privided phone number at <b>$phone_number</b>
                   </p>
                   ");
              print "</div>";
              print ("
                  <div class='col-md-6 d-flex flex-column justify-content-center align-items-center text-start'>
                    <span>
                       <h1 class='text-blue px-0 pt-4'>Lease your Brand New Volkswagen Today.</h1>
                       <p class='text-start px-0'>Ask about our new graduate program. </p>
                    </span>
                    <img src='img/jetta.png' class='img-fluid' >
                  </div>
              ");
              print "</div>";
                 // ------------------------------------------ End screen output 

               } else {                                  
               ?>
               <div class="bg-secondary text-light p-4 mb-4 ">
                 <h3 class="text-light">Contact us</h3>
                 <p class='fw-light'>
                    Submit the form below to get in contact with us.
                    A member of our sales team will get back to you as soon as possible.
                 </p>
              </div>
              <div class='row mx-2'>
               <div class="col-md-6 mb-2">
                    <form method="post" action="" class="py-4 px-4 needs-validation">
                       <!-- First Name input -->
                       <div class="form-outline mb-2">
                          <label class="form-label" for="firstName">First Name</label>
                          <input type="text" id="firstName" name="firstName" class="form-control" required>
                       </div>
                       <!-- Last Name input -->
                       <div class="form-outline mb-2">
                          <label class="form-label" for="lastName">Last Name</label>
                          <input type="text" id="lastName" name="lastName" class="form-control" required>
                       </div>
                       <!-- phone number input -->
                       <div class="form-outline mb-2">
                          <label class="form-label" for="phoneNumber">Phone number</label>
                          <input type="text" id="companyName" name="phoneNumber" class="form-control" required>
                       </div>
                       <!-- Email input -->
                       <div class="form-outline mb-3">
                          <label class="form-label" for="email">Email address</label>
                          <input type="email" id="email" name="email" class="form-control" required>
                       </div>
                       <!-- se;ect dropdown -->
                       <?php 
                        $connection = new mysqli($DBHOST, $DBUSER, $DBPASS, $DBNAME);
                        // Check connection
                        $cars = "cars";
                        $sqlStatement = "SELECT * FROM $cars";
                        $result = $connection->query($sqlStatement);
                        $options = "";
                        if ($result->num_rows > 0) {
                           while ($row = $result->fetch_assoc()) {
                               $year = $row['carYear'];
                               $make = $row['make'];
                               $model = $row['model'];
                               $trim = $row['carTrim'];
                               $price = $row['price'];
                               $formatted_price = number_format($price, 2); //format the price

                               $vehicle = "$year $make $model $trim - $$formatted_price"; // formatted the vehicle to show the full year make model trim and price
                               $selected_vehicle .= "<option value='$vehicle'>$vehicle</option>";
                           }
                        }
                        print "<label class='form-label' for='vehicle'>Vehicle</label>";
                        print ("
                             <select class='form-select form-select-md mb-4 mt-2' aria-label='.form-select-sm' for='vehicle'>
                               $selected_vehicle
                             </select>
                        ");
                        ?>
                       <!-- Message input -->
                       <div class="form-outline mb-4">
                          <label class="form-label" for="message">Message</label>
                          <textarea class="form-control" id="message" name="message" rows="4"></textarea>
                       </div>

                       <!-- Submit button -->
                       <button type="submit" name="submit" class="btn bg-light px-5 py-2 border btn-block mb-4">Send</button>
                       <!-- Reset button -->
                       <button type="reset" class="btn bg-light px-5 py-2 ms-2 border btn-block mb-4">Reset</button>
                    </form>
              </div>
              <div class="col-md-6 d-flex flex-column justify-content-center align-items-center text-start">
                 <span>
                    <h1 class="text-blue px-4">Lease your Brand New Volkswagen Today.</h1>
                    <p class="text-start px-4">Ask about our new graduate program. </p>
                 </span>
                 <img src="img/jetta.png" class="img-fluid" >
              </div>

               </div>
            <!-- End form -->
            <?php } ?>
            <!-- NORMAL HTML CAN GO BELOW THIS LINE -->
            <?php include("inc/footer.php"); ?>
      </main>
      <?php include("inc/05-footer.php"); ?>
      <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
          'use strict'
        
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.querySelectorAll('.needs-validation')
        
          // Loop over them and prevent submission
          Array.prototype.slice.call(forms)
            .forEach(function (form) {
              form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                  event.preventDefault()
                  event.stopPropagation()
                }
            
                form.classList.add('was-validated')
              }, false)
            })
        })()
      </script>
   </body>
</html>