<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
  	$bpmsaid=$_SESSION['bpmsaid'];
     $pagetitle=$_POST['pagetitle'];
$pagedes=$_POST['pagedes'];
$email=$_POST['email'];
$mobnumber=$_POST['mobnumber'];
$timing=$_POST['timing'];
     
    $query=mysqli_query($con,"update pages set Page_Title='$pagetitle',Email='$email',Mb_Number='$mobnumber',Timing='$timing',Page_Description='$pagedes' where  Page_Type='contactus'");
    if ($query) {
    $msg="Contact Us has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }  
}
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Pretty Please|Contact Us</title>

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
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		 <?php include_once('includes/sidebar.php');?>
	 <?php include_once('includes/header.php');?>
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h3 class="title1">Update Contact Us</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Update Contact Us:</h4>
						</div>
						<div class="form-body">
							<form method="post">
								<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
  <?php
 
$ret=mysqli_query($con,"select * from  pages where Page_Type='contactus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

  
							 <div class="form-group"> <label for="exampleInputEmail1">Page Title</label> <input type="text" class="form-control" name="pagetitle" id="pagetitle" value="<?php  echo $row['Page_Title'];?>" required="true"> </div><div class="form-group"> <label for="exampleInputEmail1">Email</label> <input type="text" class="form-control" name="email" id="email" value="<?php  echo $row['Email'];?>" required="true"> </div><div class="form-group"> <label for="exampleInputEmail1">Mobile Number</label> <input type="text" class="form-control" name="mobnumber" id="mobnumber" value="<?php  echo $row['Mb_Number'];?>" required="true"> </div><div class="form-group"> <label for="exampleInputEmail1">Timing</label> <input type="text" class="form-control" name="timing" id="timing" value="<?php  echo $row['Timing'];?>" required="true"> </div> <div class="form-group"> <label for="exampleInputPassword1">Page Description</label> <textarea name="pagedes" id="pagedes" rows="5" class="form-control">
        <?php  echo $row['Page_Description'];?></textarea> </div>
							 <?php } ?>
							  <button type="submit" name="submit" class="btn btn-default">Update</button> </form> 
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
<?php } ?>