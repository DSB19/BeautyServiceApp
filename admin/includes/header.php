<div class="sticky-header header-section ">
      <div class="header-left">
        <button id="showLeftPush"><i class="fa fa-bars"></i></button>
        <div class="logo">
          <a href="index.html">
            <h1>Pretty Please</h1>
            <span>AdminPanel</span>
          </a>
        </div>
        <div class="clearfix"> </div>
      </div>
      <div class="header-right">
        <div class="profile_details_left">
          <ul class="nofitications-dropdown">
            <?php
$ret1=mysqli_query($con,"select customer.FName,customer.LName,appoitment.ID as bid,appoitment.Apt_Number from appoitment join customer on customer.ID=appoitment.Cust_ID where appoitment.Status is null");
$num=mysqli_num_rows($ret1);

?>  
            <li class="dropdown head-dpdn">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue"><?php echo $num;?></span></a>
              
              <ul class="dropdown-menu">
                <li>
                  <div class="notification_header">
                    <h3>You have <?php echo $num;?> new notification</h3>
                  </div>
                </li>
                <li>
            
                   <div class="notification_desc">
                     <?php if($num>0){
while($result=mysqli_fetch_array($ret1))
{
            ?>
                 <a class="dropdown-item" href="view-appointment.php?viewid=<?php echo $result['bid'];?>">New appointment received from <?php echo $result['FName'];?> <?php echo $result['LName'];?> (<?php echo $result['Apt_Number'];?>)</a>
                 <hr />
<?php }} else {?>
    <a class="dropdown-item" href="all-appointment.php">No New Appointment Received</a>
        <?php } ?>
                           
                  </div>
                  <div class="clearfix"></div>  
                 </a></li>
                 
                
                 <li>
                  <div class="notification_bottom">
                    <a href="new-appointment.php">See all notifications</a>
                  </div> 
                </li>
              </ul>
            </li> 
          
          </ul>
          <div class="clearfix"> </div>
        </div>
        <div class="profile_details">  
        <?php
$adid=$_SESSION['bpmsaid'];
$ret=mysqli_query($con,"select Ad_Name from admin where ID='$adid'");
$row=mysqli_fetch_array($ret);
$name=$row['Ad_Name'];

?> 
          <ul>
            <li class="dropdown profile_details_drop">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <div class="profile_img"> 
                  <span class="prfil-img"><img src="images/admin.png" alt="" width="50" height="50"> </span> 
                  <div class="user-name">
                    <p><?php echo $name; ?></p>
                    <span>Administrator</span>
                  </div>
                  <i class="fa fa-angle-down lnr"></i>
                  <i class="fa fa-angle-up lnr"></i>
                  <div class="clearfix"></div>  
                </div>  
              </a>
              <ul class="dropdown-menu drp-mnu">
                <li> <a href="change-password.php"><i class="fa fa-cog"></i> Settings</a> </li> 
                <li> <a href="admin-profile.php"><i class="fa fa-user"></i> Profile</a> </li> 
                <li> <a href="index.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
              </ul>
            </li>
          </ul>
        </div>  
        <div class="clearfix"> </div> 
      </div>
      <div class="clearfix"> </div> 
    </div>