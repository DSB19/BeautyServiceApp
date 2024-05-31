<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
  } else{

if($_GET['delid']){
$sid=$_GET['delid'];
mysqli_query($con,"delete from appoitment where ID ='$sid'");
echo "<script>alert('Data Deleted');</script>";
echo "<script>window.location.href='all-appointment.php'</script>";
          }
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Pretty Please|All Appointment</title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		 <?php include_once('includes/sidebar.php');?>
		 <?php include_once('includes/header.php');?>
		<div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
					<h3 class="title1">All Appointment</h3>
					<div class="table-responsive bs-example widget-shadow">
						<h4>All Appointment:</h4>
						<table class="table table-bordered"> <thead> <tr> <th>#</th> 
							<th> Appointment Number</th> 
							<th>Name</th><th>Mobile Number</th> 
							<th>Appointment Date</th>
							<th>Appointment Time</th>
							<th>Status</th>
							<th>Action</th> </tr> </thead> <tbody>
<?php
$ret=mysqli_query($con,"select customer.FName,customer.LName,customer.Email,customer.Mb_Number,appoitment.ID as bid,appoitment.Apt_Number,appoitment.Apt_Date,appoitment.Apt_Time,appoitment.Message,appoitment.BookingDate,appoitment.Status from appoitment join customer on customer.ID=appoitment.Cust_ID");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

						 <tr> <th scope="row"><?php echo $cnt;?></th> 
						 	<td><?php  echo $row['Apt_Number'];?></td> 
						 	<td><?php  echo $row['FName'];?> <?php  echo $row['LName'];?></td>
						 	<td><?php  echo $row['Mb_Number'];?></td>
						 	<td><?php  echo $row['Apt_Date'];?></td> 
						 	<td><?php  echo $row['Apt_Time'];?></td>
						 	<?php if($row['Status']==""){ ?>

                     <td class="font-w600"><?php echo "Not Updated Yet"; ?></td>
                     <?php } else { ?>
                      <td><?php  echo $row['Status'];?></td><?php } ?> 
                                       <td><a href="view-appointment.php?viewid=<?php echo $row['bid'];?>" class="btn btn-primary">View</a>
<a href="all-appointment.php?delid=<?php echo $row['bid'];?>" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
                                       	</td> </tr>   <?php 
$cnt=$cnt+1;
}?></tbody> </table> 
					</div>
				</div>
			</div>
		</div>
		 <?php include_once('includes/footer.php');?>
	</div>
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<script src="js/bootstrap.js"> </script>
</body>
</html>
<?php }  ?>