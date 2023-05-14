<!DOCTYPE html>
<html lang="en">
   <?php include("inc/project-functions.php") ?>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <script src="js/bootstrap.bundle.min.js"></script>
      <link href="css/project-style.css" rel="stylesheet">
      <link rel="icon" type="image/favicon.png" href="img/favicon.png">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
      <title>Home</title>
   </head>
   <body class="bg-light p-0 m-0">
      <div class="p-0 m-0">
         <?php include("inc/800-nav.php"); ?>
         <div class="px-2 m-0 banner">
            <img src="img/ID4banner.png" alt="banner" class="w-100">
         </div>
         <div class="row mw-100 mt-0 pt-0 px-2 mx-0">
            <div class="col-md-6 bg-primary py-5 px-3 flex-column justify-content-center align-items-center">
               <h2 class="text-light">Welcome to JVW </h2>
               <p class="text-light pb-4">View our collections of VW vehicles </p>
               <a href="inventory.php" class="pt-3 pb-3 px-4 mb-2 bg-light rounded-pill text-decoration-none fs-6">View Vehicles</a>
            </div>
            <div class="col-md-6 p-4 px-2">
               <h2 class="px-2 pt-4">About JVW </h2>
               <p class="lh-2 px-2">
                  Welcome to JVW, Welcome to JWV, your premier online destination for 
                  Volkswagen cars. As a brand new dealership, we are 
                  committed to providing you with exceptional service and quality 
                  cars to make your car-buying experience smooth and hassle-free.    
               </p>
            </div>
         </div>
         <div class="row mw-100 px-2 mx-0 my-3 pt-0 bg-light">
            <div class="col-md-7 mt-1 px-0 shadow">
               <img src='img/Cross-Sport.png' alt='Atlas cross sport' width='99%'>
            </div>
            <div class="col-md-5 pt-4 px-2 bg-light ">
               <?php include("inc/texts/aboutAtlas.php");?>
            </div>
         </div>

         <div class="row mw-100 px-2 mx-0 py-3 mb-4 d-flex justify-content-center align-items-center">
            <span class='d-flex justify-content-center mt-3 mb-1 align-items-end'>
            <hr class='w-25'>
               <h2 class="text-center fw-bolder pb-0 pt-2 h2 mx-2">New Vehicles </h2>
               <hr class='w-25'>
            </span>
            <div class="col-md-5 px-0">
               <div class="text-center">
                  <a href="inventory.php"> <img src="https://tinyurl.com/yfzycd2n" alt="2023 Volkswagen Tiguan" width="100%" class="img-hover"></a>
               </div>
            </div>
            <div class="col-md-7 flex-column ps-1 mt-1">
               <div class='m-3 mx-0 mt-1'>
                  <a href="inventory.php" class="d-flex text-decoration-none text-black">
                     <img src="https://tinyurl.com/t7tumvwx" alt="2023 Volkswagen atlas" width="30.5%" class="img-hover">
                     <div class="ps-4">
                        <h5 class='h5 fw-bold m-0'>The 2023 Atlas</h5>
                        <p class='fs-5 fw-light'>The Family SUV</p>
                     </div>
                  </a>
               </div>
               <div class='m-3 mx-0 mt-0'>
                  <a href="inventory.php" class="d-flex text-decoration-none text-black">
                     <img src="https://tinyurl.com/ww2m646v" alt="2023 Volkswagen atlas" width="30.5%" class="img-hover">
                     <div class="ps-4">
                        <h5 class='h5 fw-bold m-0'>The 2023 Atlas Cross Sport</h5>
                        <p class='fs-5 fw-light'>The Sport SUV</p>
                     </div>
                  </a>
               </div>
               <div class='m-3 mx-0 mt-0'>
                  <a href="inventory.php" class="d-flex text-decoration-none text-black">
                     <img src="https://tinyurl.com/swnj72th" alt="2023 Volkswagen atlas" width="30.5%" class="img-hover">
                     <div class="ps-4">
                        <h5 class='h5 fw-bold m-0'>All Vehicles</h5>
                        <p class='fs-5 fw-light'>Explore all VW Models</p>
                     </div>
                  </a>
               </div>
            </div>
         </div>

      </div>
      <?php include("inc/footer.php"); ?>
   </body>
</html>