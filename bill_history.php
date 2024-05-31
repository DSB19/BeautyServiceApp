<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsuid']==0)) {
  header('location:logout.php');
  } else{
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Pretty Please|Bill History</title>
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <?php include_once('includes/header.php');?>
  <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg-2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5">
            <h2 class="mb-0 bread">Bill History</h2>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Bill History<i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
    
    <section class="w3l-contact-info-main" id="contact">
    <div class="contact-sec	">
        <div class="container">

            <div>
                <div class="cont-details">
                   <div class="table-content table-responsive cart-table-content">
                    <h4 style="padding-bottom: 20px;text-align: center;color: blue;">Bill History</h4>
                        <table class="table" border="1">
                            <thead >
                                <tr> 
                                <th>#</th> 
                                <th>Bill Id</th> 
                                <th>Customer Name</th>
                                <th>Customer Mobile Number</th>
                                <th>Bill Date</th> 
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                               
                                <tr>
                                    <?php
                                   $userid= $_SESSION['bpmsuid'];
 $query=mysqli_query($con,"select distinct customer.ID as uid, customer.FName,customer.LName,customer.Email,customer.Mb_Number,bill.Billing_ID,date(bill.Posting_Date) as Posting_Date  from  customer   
    join bill on customer.ID=bill.Cust_ID where customer
    .ID='$userid'order by bill.id desc");
$cnt=1;
              while($row=mysqli_fetch_array($query))
              { ?>
               <tr> 
                            <th scope="row"><?php echo $cnt;?></th> 
                            <td><?php  echo $row['Billing_ID'];?></td>
                            <td><?php  echo $row['FName'];?> <?php  echo $row['LName'];?></td>
                            <td><?php  echo $row['Mb_Number'];?></td>
                            <td><?php  echo $row['Posting_Date'];?></td> 
                                <td><a href="view_bill.php?invoiceid=<?php  echo $row['Billing_ID'];?>" class="btn btn-info">View</a></td> 

                          </tr><?php $cnt=$cnt+1; } ?>
                             
                            </tbody>
                        </table>
                    </div> </div>
                
    </div>
   
    </div></div>
</section>

<?php include_once('includes/footer.php');?>
 
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
  
  
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>
</body>
</html><?php } ?>
