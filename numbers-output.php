<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
      <script src="js/bootstrap.bundle.min.js"></script>
      <!-- This is YOUR custom css file -->
      <link href="css/project-style.css" rel="stylesheet">
      <link rel="icon" type="image/favicon.png" href="img/favicon.png">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <title>Your custom lease payment</title>
    <style>
        .row p {font-size: 1.2rem; font-weight: 300; line-height: 2;}
        .bold { font-weight: 500; }
    </style>
</head>
<?php include("inc/800-nav.php"); ?>
<body class="p-0">
    <div class="bg-secondary text-light p-5">
      <h3 class="text-light">Your customized lease payment</h3>
         <p class='fw-light'>This is an estimate, your final lease payment 
            is based on many different factors, such as credit score, down 
            payment, etc.
         </p>
    </div>
    <?php
        $firstName = $_POST['firstName']; //get first name
        $lastName = $_POST['lastName']; //get last name
        $income = $_POST['income']; //get income
        $downPayment = $_POST['downPayment']; //get down payment
        $vehicle = $_POST['vehicle']; //get car
        $term = $_POST['term']; //get the term
        $trade = $_POST['trade']; //get the trade value
        $interest = $_POST['interest']; // get interest
    
        // extract decimal numbers with optional thousands separator and decimal point
        preg_match_all('/\d{1,3}(?:,\d{3})*\.\d+/', $vehicle, $matches);
        // loop through the matches and convert them to numbers
        foreach ($matches[0] as $match) {
            $price = floatval(str_replace(',', '', $match));
        }
    
        //format full me
        $fullName = trim($firstName) . " " . trim($lastName);
    
        //format interest
        $interest_formatted = $interest . "%";
    
        //format 5 figure income 10,000
        if (strlen($income) == 4) $formatted_income = "$" . number_format($income, 0);
        //format 6 figure income 100,000
        if (strlen($income) == 5) $formatted_income = "$" . number_format($income, 2);
        //format 7 figure income 1,000,000
        if (strlen($income) == 6) $formatted_income = "$" . number_format($income, 2, '.', ',');
        
    
    
        //format downpayment
        $formatted_DPayment = "$" . $downPayment;
        //format down payment for numbers over 999
        if (strlen($downPayment) == 4) $formatted_DPayment = "$" . number_format($downPayment, 0);
        //format down payment for numbers over 9999
        if (strlen($downPayment) == 5) $formatted_DPayment = "$" . number_format($downPayment, 2);
    
        //format trade value
        $formatted_trade = "$" .$trade;
        //four figure formatting
        if (strlen($trade) == 4) $formatted_trade = "$" . substr($trade, 0,1) . "," . substr($trade, 1);
        //five figure formating
        if (strlen($trade) == 5) $formatted_trade = "$" . substr($trade, 0,2) . "," . substr($trade, 2);
    
        //format price
        $formatted_price = "$" . $price;
        //format 5 figure prices
        if (strlen($price) == 5) $formatted_price = "$" . substr($price, 0,2) . "," . substr($price, 2);
        //format 6 figure prices
        if (strlen($price) == 6) $formatted_price = "$" . substr($price, 0,3) . "," . substr($price, 3);
    
    
        //calculate monthly payment 
        $formatInterest = $interest / 100; // format the intetrest
        $totalDeduction = $downPayment + $trade; // get the total amount to be deducted
        $totalPreInterest = $price - $totalDeduction; //total before adding interest
        $yearlyInterest = $totalPreInterest * $formatInterest; //the total interest in dollars
        $lifeTimeInterest = ($yearlyInterest / 12) * $term; // lifetime itnerest
    
        $totalPrice = $totalPreInterest + $lifeTimeInterest; // the total including lifetime interest
        $totalPriceRounded = round($totalPrice, 2); // round total price to 2 decimals
        $formatTotalPrice = "$" . substr($totalPriceRounded, 0,2) . "," . substr($totalPriceRounded, 2); //formatted total price with interest
        $monthlyPayment = $totalPrice / $term; //total Monthly payment
    
        //get customer monthly income
        $monthly_income = $income / 13; //13 being 52 weeks in a year which ads up to 13 months
        $monthly_income = round($monthly_income);
        $monthly_leftOver = $monthly_income - $monthlyPayment;
        $monthly_leftOver = round($monthly_leftOver);
    
        //format monthly payment
        $monthly_income_formatted = "$" . $monthly_income;
        //4 figure format
        if (strlen($monthly_income) == 4) $monthly_income_formatted = "$" . substr($monthly_income, 0,1) . "," . substr($monthly_income, 1);
        //5 figure format
        if (strlen($monthly_income) == 5) $monthly_income_formatted = "$" . substr($monthly_income, 0,2) . "," . substr($monthly_income, 2);
        //format monthly income left over
        $monthly_leftOver_formatted = "$" . $monthly_leftOver;
        //4 figure format
        if (strlen($monthly_leftOver) == 4) $monthly_leftOver_formatted = "$" . substr($monthly_leftOver, 0,1) . "," . substr($monthly_leftOver, 1);
        //5 figure format
        if (strlen($monthly_leftOver) == 5) $monthly_leftOver_formatted = "$" . substr($monthly_leftOver, 0,2) . "," . substr($monthly_leftOver, 2);
    ?>

    <div class="container-fluid py-5 px-4 bg-light rounded w-100">
        <div class="row">
            <div class="col-md-6">
            <h3 class="output-h2 pt-2 pb-3"><?php echo "Hi $fullName, here is your submision"; ?></h3>
                <p>
                    <span class="bold">Your selected car:</span> <?php echo $vehicle; ?>
                    <br>
                    <span class="bold">Your selected car price:</span>  <?php echo $formatted_price; ?>
                    <br>
                    <span class="bold">Your income is:</span> <?php echo "$formatted_income a year"; ?>
                    <br>
                    <span class="bold">Your Down Payment:</span> <?php echo $formatted_DPayment; ?>
                    <br>
                    <span class="bold">Trade in value:</span> <?php echo $formatted_trade; ?>
                    <br>
                    <span class="bold">Term:</span> <?php echo $term; ?>
                    <br>
                    <span class="bold">Interest rate:</span> <?php echo $interest_formatted; ?>
                </p>
            </div>
            <div class="col-md-6">
                <h3 class="output-h2 pt-4 pb-2">Your customized rate and budget</h3>
                <p>
                    <span class="bold">Your monthly payment is:</span> <?php echo "$" . round($monthlyPayment, 2) . " a month."; ?>
                    <br>
                    <?php echo "You will pay a total of $formatTotalPrice during your $term term."; ?>
                    <br>
                    <br>
                    <?php echo "<b>Your budget:</b> You currently earn $monthly_income_formatted per month, after paying your car note, you will be left will $monthly_leftOver_formatted." ?>
                </p>
            </div>
            
        </div>
    </div>
<?php include("inc/footer.php"); ?>
</body>
</html>