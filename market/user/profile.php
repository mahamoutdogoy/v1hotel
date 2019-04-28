<?php
include 'connect.php';
if(!isset($_SESSION['user_id'])){
        header("location: login.php");
    }
$id = $_SESSION['user_id'];
$result3 = mysqli_query($con, "SELECT * FROM customer WHERE id='$id'");
while($row3 = mysqli_fetch_assoc($result3))
{ 
$fname=$row3['first_name'];
$lname=$row3['last_name'];
// $Picture=$row3['profile_pic'];
$email=$row3['email'];
$gender=$row3['gender'];
$Mobile=$row3['phone'];


}
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<title>Profile info</title>

<style>
  #prof{
        box-shadow: 10px 10px 15px #e6e6e6;
        border-radius: 10px;
        padding: 3%;
    } 

</style>

<div class="container bg-light h-100" id="prof">
 <form action="" method="post">
  <table class="table table-bordered mt-3">
  <tr class="text-white" style="background: #ff6f56;">
    <th class="text-center" height="30"><a href="index.php" class="btn text-white"><i class="fa fa-backward"></i> Back </a></th>
    <th class="text-center" height="30" colspan="2">Your Profile Information </th>
	 <th class="w-25"><a href="logout.php" class="float-right text-white">logout</a></th>
  </tr>
  <tr>
    <td width="129" rowspan="5"><center><img src="images/admin.jpg" width="129" height="129" alt="no image found" class="user-avatar rounded-circle"></center></td>
    <td width="82" valign="top"><div >FirstName:</div></td>
    <td width="165" valign="top"><input type="text" name="gfname" value="<?php echo $fname ?>" class="form-control w-75"></td>
    <td width="129" rowspan="5"><input type="submit" name="gedit" class="btn btn-success btn-lg" value="Update"></td>
  </tr>
  <tr>
    <td valign="top"><div align="left">LastName:</div></td>
    <td valign="top"><input type="text" name="glname" value="<?php echo $lname ?>" class="form-control w-75"></td>
  </tr>
  <tr>
    <td valign="top"><div align="left">Email:</div></td>
    <td valign="top"><?php echo $email ?></td>
  </tr>
  <tr>
    <td valign="top"><div align="left">Gender:</div></td>
    <td valign="top"><?php echo $gender ?></td>
  </tr>
  <tr>
    <td valign="top"><div align="left"> Mobile: </div></td>
    <td valign="top"><input type="text" name="gmobile" value="<?php echo $Mobile ?>" class="form-control w-75"></td>
  </tr>

</table>
</form>
</div>

<?php
if (isset($_POST['gedit'])) {
  echo "string";
   $gfname = mysqli_real_escape_string($con, $_POST['gfname']);
   $glname = mysqli_real_escape_string($con, $_POST['glname']);
   $gmobile = mysqli_real_escape_string($con, $_POST['gmobile']);
   $gedit = "UPDATE customer SET first_name = '$gfname', last_name = '$glname', phone = '$gmobile' WHERE id = '$id'";
   if (mysqli_query($con, $gedit)) {?>
      <script>window.location = "profile.php";</script>
      <?php
   }
}
?>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
