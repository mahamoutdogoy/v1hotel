<!--Confirmation function-->
<?php
  //geting admin id
  function getAdminId($conn, $uId){
    $getAdmin = "SELECT hotelid FROM users WHERE userid = '$uId'";
    $getAdmin_run = mysqli_query($conn, $getAdmin);
    $getAdmin_row = mysqli_fetch_assoc($getAdmin_run);
    return $getAdmin_row['hotelid'];
  }
  if (isset($_SESSION['user']['userid'])) {
    $loginid = $_SESSION['user']['userid'];
}

?>

<script>
  function del_conf(){
  return confirm("Are you sure you want to delete this record?");
}
</script>

<!--top menu-->
<style>
  #navbarid{
    background: #ff6f56;
  }
 #navbarid li a{
    color: #ffffff;
  }
  #header-row{
    background: #ff6f56;
  }
  
</style>

<div class="mb-3 col-md-12">
    <div id="header-row" class="row">

      <ul class="nav" id="navbarid">
        <li class="nav-item"><a href="attendance.php" class="nav-link">Attendance</a></li>
        <li class="nav-item"><a href="apply_for_leave.php" class="nav-link">Apply For Leave</a></li>
        <li class="nav-item"><a href="leave_list.php" class="nav-link">All My Leaves</a></li>
        <li class="nav-item"><a href= "user_pwd_change.php" class="nav-link" >Change Password</a></li>
        <li class="nav-item"><a href="all_hol_user.php" class="nav-link">All Holidays</a></li>
        <li class="nav-item"><a href="user_notice.php" class="nav-link">Notices</a></li>
       </ul>
  </div>
</div>
<!--top menu-->