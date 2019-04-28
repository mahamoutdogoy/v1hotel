
<!DOCTYPE html>

<html>

<head>

	

    

    



<style>



/*ul {

  list-style-type: none;

  margin: 0;

  padding: 0;

  overflow: hidden;

  background-color: #333;

}*/




ul li a:hover {

text-decoration: none;

border-radius: 5px;

color: #FF6F61;

background-color:#20b2aa;



}


li {

  float: left;



}



li a,button {

  display: block;

  

  padding: 14px 16px;

  text-decoration: none;

  

  



 

}



.active,.btn-link {

	 color:#FF6F61;

}



.active,.btn-link:hover {

	text-decoration: none;

	padding-bottom: 12px;

	padding-top: 10px;

	color: black;

}

}

</style>

<script>

	/*function hide()

	{

		document.getElementById('Div2').style.display= 'none';

	}*/

	

/*function switchVisible() {

			

     			if(document.getElementById('hide').value=="switch to hotelier")

     				document.getElementById('hide').value= "switch to tour Operator";

     			else

     				document.getElementById('hide').value= "switch to hotelier";

            if (document.getElementById('Div1'))

             {

             	



                if (document.getElementById('Div1').style.display == 'none') 

                {

                	

            	

                    document.getElementById('Div1').style.display = 'block';

                    document.getElementById('Div2').style.display = 'none';

                }

                else 

                {

                	



                    document.getElementById('Div1').style.display = 'none';

                    document.getElementById('Div2').style.display = 'block';

                }

            }

           

}*/

</script>



<style type="text/css">

	.sticky {

 position: fixed;

 top: 0;

 
 z-index: 1;

}
.sticky + .content {

 padding-top: 102px;

}
</style>
	



</head>

<body onload="hide();">

<div class="row header" id="myHeader" style="background:#fff;"> 


<ul>
	
</ul>

 <ul style=" color:#FF6F61;font-size: 9px" class="nav unstyled-list ml-3 float-left" id="Div1" >

 

	    

	  	  <li class="nav-item"><a style="border:solid red 1px; border-radius:5px; padding: 5px;margin-top: 10px;" id="hide" class="btn-link mr-2 active  "  onclick="switchVisible();" href="#"><b>Hotelier</b></a></li>

	  	  <li class="nav-item"><a  class="btn-link " href="propertydetail.php"><b>Property Details</b></a></li>

		  


	  		<div class="dropdown">
	  			
		 	 <button class="dropbtn btn-link" style="border-radius: 5px;padding:13px;" ><b>Rooms, Inventory, Tarrif</b></button>
		 	 <div class="dropdown-content">
		 	   <a class="" href="rooms_dashboard_new.php">Dashboard</a>
		 	   <a class="" href="rooms.php">Create Rooms</a>
		  	  <a class="" href="tariff.php">Tariff</a>
		  	   <a class="" href="update_tariff.php">Update Tariff</a>
		 	 </div>
			</div>
		</li>
		  <li class="nav-item"><a class="btn-link" href="photo.php" ><b>Photos</b></a></li>

		  <li class="nav-item"><a class="btn-link" href="amenities.php"><b>Amenities</b></a></li>

		  <li class="nav-item"><a id="policy" class="btn-link" href="policy.php"><b>Policy</b></a></li>

		  <li class="nav-item"><a class="btn-link" href="#"><b>Channel Manager</b></a></li>

		  <li class="nav-item"><a class="btn-link" href="#"><b>OTAs Connectivity</b> </a></li>

		  <li class="nav-item"><a class="btn-link" href="bankdetails.php"><b>Bank Detail</b></a></li>

		  <li class="nav-item"><a class="btn-link" href="agreement_page.php" ><b>Agreement</b></a></li>

		  <li class="nav-item"><a class="btn-link" href="documents.php"><b>Documents</b></a></li>

	  </ul>

	 <!--  <ul class="nav float-left ml-5" id="Div2">

	  	<li class=" mr-3 nav-item"><a style="border:solid red 1px;border-radius:5px;padding:  5px; margin-top: 10px;" id="hide" onclick="switchVisible();" class=" ml-5 btn-link"  href="#">Switch to hotelier</a></li>

	  	<li class=" mr-3 nav-item"><a class="btn-link"  href="#">Tour Operator</a></li>

	  	<li class="mr-3 nav-item"><a class="btn-link"  href="#">Packages,Tarriff</a></li>

	  	<li class=" mr-3 nav-item"><a class="btn-link" href="#">Photos</a></li>

	  	<li class="mr-3 nav-item"><a class="btn-link"  href="#">Itinerary</a></li>

	  	<li class=" mr-3 nav-item"><a class="btn-link"  href="#">Policy</a></li>

	  	<li class=" mr-3 nav-item"><a class="btn-link"  href="#">Bank Detail</a></li>

	  	<li class="nav-item"><a class="btn-link"  href="#">Agreement</a></li>

	  	<li class="nav-item"><a class="btn-link"  href="#">Documents</a></li>

	  



     </ul> -->



</div>

<style>



.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 133px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  padding: 12px 16px;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {text-decoration: none;

border-radius: 5px;

color: black;

background-color:#20b2aa;


}

.dropbtn{
	background-color: Transparent;border:none;color:#FF6F61;

}

</style>


</body>



</html>
<script>

/*window.onscroll = function() {myFunction()};var header = document.getElementById("myHeader");

var sticky = header.offsetTop;function myFunction() {

 if (window.pageYOffset > sticky) {

   header.classList.add("sticky");

 } else {

   header.classList.remove("sticky");

 }

}
*/

</script>