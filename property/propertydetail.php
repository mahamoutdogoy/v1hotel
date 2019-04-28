<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://cdn.jsdelivr.net/jquery.cookie/1.4.0/jquery.cookie.min.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<?php
session_start();
 //include 'propertymenu.php'; 
 include 'property_DB.php';
   
    $sql="SELECT MAX(property_id)  FROM propertydetails" ;
    $result=mysqli_query($con,$sql);
    $row = mysqli_fetch_row( $result);
    $largestNumber=$row[0]+1;
    $_SESSION['largestNumber']=$largestNumber;

    $sqll="SELECT MAX(ownerid) FROM owner";
    $res=mysqli_query($con,$sqll);
    $row = mysqli_fetch_row( $res);
    $largestNum=$row[0]+1;
    $_SESSION['ownerid']=$largestNum;

    
    
    
   


?>
 <!DOCTYPE html>
<html>
<head>
  <title>Create Property</title>


<script type="text/javascript">
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;


function enable_disable()
{
  document.getElementById('intime').value="";
  document.getElementById('outtime').value="";
 if( document.getElementById('intime').readOnly == true && document.getElementById('outtime').readOnly == true)
 {

  document.getElementById('intime').readOnly = false;
  document.getElementById('outtime').readOnly = false;
 }
 else
 {

  document.getElementById('intime').readOnly = true;
  document.getElementById('outtime').readOnly = true;

 }
  




}

    function next1()
    {
    if (document.myForm.pname.value == "")
    {
      alert("Please enter the property name");
      document.myForm.pname.focus();
      return false;
    }
    else if (document.myForm.ptype.value == "")
    {
      alert("Please enter the field");
      document.myForm.star.focus();
      return false;
    }
    else if (document.myForm.ptype.value == "")
    {
      alert("Please enter the property type");
      document.myForm.ptype.focus();
      return false;
    }
    
    else if (document.myForm.establishment.value == "")
    {
      alert("Please enter the establishment date");
      document.myForm.establishment.focus();
      return false;
    }
    else if (document.myForm.currency.value == "")
    {
      alert("Please enter the currency type");
      document.myForm.currency.focus();
      return false;
    }
    else if (document.myForm.intime.value == "")
    {
      alert("Please enter the intime");
      document.myForm.intime.focus();
      return false;
    }
    else if (document.myForm.outtime.value == "")
    {
      alert("Please enter the out-time");
      document.myForm.outtime.focus();
      return false;
    }
     else if (document.myForm.description.value == "")
    {
      alert("Please enter the description");
      document.myForm.description.focus();
      return false;
    }


    document.getElementById("div1").style.display='none';
    document.getElementById("div2").style.display="block";
    document.getElementById("div3").style.display="none";
    document.getElementById("div4").style.display="none";
    document.getElementById("div5").style.display="none";
    document.getElementById("div6").style.display="none";

    }
    function next2()
    {
        if (document.myForm.street.value == "")
    {
      alert("Please enter the information");
      document.myForm.street.focus();
      return false;
    }
    else if (document.myForm.city.value == "")
    {
      alert("Please enter the information");
      document.myForm.city.focus();
      return false;
    }
    else if (document.myForm.state.value == "")
    {
      alert("Please enter the information");
      document.myForm.state.focus();
      return false;
    }
    else if (document.myForm.country.value == "")
    {
      alert("Please enter the information");
      document.myForm.country.focus();
      return false;
    }
    else if (document.myForm.zpcode.value == "")
    {
      alert("Please enter the information");
      document.myForm.zpcode.focus();
      return false;
    }

    document.getElementById("div1").style.display='none';
    document.getElementById("div2").style.display="none";
    document.getElementById("div3").style.display="block";
    document.getElementById("div4").style.display="none";
    document.getElementById("div5").style.display="none";
    document.getElementById("div6").style.display="none";

    }
    function next3()
    {
        if (document.myForm.ownerid.value == "")
    {
      alert("Please enter the owner id");
      document.myForm.ownerid.focus();
      return false;
    }
    else if (document.myForm.ownername.value == "")
    {
      alert("Please enter the owner name");
      document.myForm.ownername.focus();
      return false;
    }
    else if (document.myForm.owneremail.value == "" || reg.test(document.myForm.owneremail.value) == false)
    {
      alert("Please enter the valid owner email");
      document.myForm.owneremail.focus();
      return false;
    }
    else if (document.myForm.ownerphone.value == "")
    {
      alert("Please enter the owner contact number");
      document.myForm.ownerphone.focus();
      return false;
    }

    document.getElementById("div1").style.display='none';
    document.getElementById("div2").style.display="none";
    document.getElementById("div3").style.display="none";
    document.getElementById("div4").style.display="block";
    document.getElementById("div5").style.display="none";
    document.getElementById("div6").style.display="none";

    }
    function next4()
    {
         if (document.myForm.manname.value == "")
    {
      alert("Please enter the manager name");
      document.myForm.manname.focus();
      return false;
    }
    else if (document.myForm.manemail.value == "" || reg.test(document.myForm.manemail.value) == false)
    {
      alert("Please enter the manager email");
      document.myForm.manemail.focus();
      return false;
    }
    else if (document.myForm.manphone.value == "")
    {
      alert("Please enter the manager phone");
      document.myForm.manphone.focus();
      return false;
    }
    document.getElementById("div1").style.display='none';
    document.getElementById("div2").style.display="none";
    document.getElementById("div3").style.display="none";
    document.getElementById("div4").style.display="none";
    document.getElementById("div5").style.display="block";
    document.getElementById("div6").style.display="block";

    }
    function prev1()
    {
    document.getElementById("div1").style.display='block';
    document.getElementById("div2").style.display="none";
    document.getElementById("div3").style.display="none";
    document.getElementById("div4").style.display="none";
    document.getElementById("div5").style.display="none";
    document.getElementById("div6").style.display="none";

    }
    function prev2()
    {
    document.getElementById("div1").style.display='none';
    document.getElementById("div2").style.display="block";
    document.getElementById("div3").style.display="none";
    document.getElementById("div4").style.display="none";
    document.getElementById("div5").style.display="none";
    document.getElementById("div6").style.display="none";

    }
    function prev3()
    {
    document.getElementById("div1").style.display='none';
    document.getElementById("div2").style.display="none";
    document.getElementById("div3").style.display="block";
    document.getElementById("div4").style.display="none";
    document.getElementById("div5").style.display="none";
    document.getElementById("div6").style.display="none";

    }
    function prev4()
    {
    document.getElementById("div1").style.display='none';
    document.getElementById("div2").style.display="none";
    document.getElementById("div3").style.display="none";
    document.getElementById("div4").style.display="block";
    document.getElementById("div5").style.display="none";
    document.getElementById("div6").style.display="none";
    

    }

</script>


<?php include '../mytravalyAdmin/myheader.php' ?>
</head>
<body>
<div>
  

     
        <?php include'../mytravalyAdmin/mtsidebar.php'?>
      
      <div class="col-md-9">

        <?php include_once 'propertymenus.php';?>
        <br>
    <form action="propertydetails_be.php" method="POST"  name="myForm"  enctype="multipart/form-data" >

      
          
       
        
            <div id="div1"  >
                        <table  cellpadding="10"  id="t1">
                                <tr style='background-color:#ff6f61;width: 10px;height: 10px;font-size: 22px;'>
                        <td align="center" colspan="4">
                        <b >Property Details</b>
                        </td>
                        </tr >
                                <tr >
                                        <td>
                                                <label  >Property Id</label>
                                        </td>
                                        <td>
                                                <input type="number"  value="<?php echo $largestNumber ?>" name="pid" class="form-control" disabled="" />
                                        </td>
                                </tr>
                <tr >
                        <td>
                                <label  >Property Name </label>
                        </td>
                        <td>
                                <input type="text" list="pname" id="pname" name="pname" class=" form-control" required >
                        </td>
                </tr>
                <tr>
                  <td>
                    <label>Star</label>
                  </td>
                  <td>
                    <select name="star" required="" class=" form-control">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                      <option>6</option>
                      <option>7</option>

                    </select>
                  </td>
                </tr>

                <tr >
                        <td>
                                <label  >Property Image </label>
                        </td>
                        <td>
                                <input type="file" accept=".jpg,.png,.jpeg" list="pimage" id="pimage" name="pimage" class=" form-control" required >
                        </td>
                </tr>




                <tr>
                        <td>
                                <label  >Property Type </label>
                        </td>
                        <td>
                                <select name="ptype" id="property"  class=" form-control" required>
                                        <option value="" style="display: none;">Choose Property</option>
                                        <option value="hotel">Hotel</option>
                                        <option value="resort">Resort</option>
                                        <option value="holidayHome">Holiday Home</option>
                                        <option value="apartment">Apartment</option>
                                        <option value="guestHouse">Guest House</option>
                                        <option value="bedAndBreakfast">Bed & Breakfast</option>
                                        <option value="cottage">Cottage</option>
                                        <option value="hostel">Hostel</option>
                                        <option value="co_living">Co Living</option>

                       </select>
                        </td>
                </tr>
                <tr>
                        <td>
                                <label  >Chain Name </label>
                        </td>
                        <td>
                                <input type="text"  name="chain" class=" form-control"/>
                        </td>
                </tr>
                <tr>
                        <td>
                                <label  >Establishment </label>
                        </td>
                        <td>
                                <input type="date"  name="establishment"  class="  form-control" required />
                        </td>
                </tr>
                <tr>
                        <td>
                                <label  >Currency </label>
                        </td>
                        <td>
                                <select name="currency" id="currency"  class="form-control" required>
                                        <option value="" selected="true" disabled="true">Choose Currency</option>
                                        <option value="USD" >United States Dollars</option>
                                          <option value="EUR">Euro</option>
                                          <option value="GBP">United Kingdom Pounds</option>
                                          <option value="DZD">Algeria Dinars</option>
                                          <option value="ARP">Argentina Pesos</option>
                                          <option value="AUD">Australia Dollars</option>
                                          <option value="ATS">Austria Schillings</option>
                                          <option value="BSD">Bahamas Dollars</option>
                                          <option value="BBD">Barbados Dollars</option>
                                          <option value="BEF">Belgium Francs</option>
                                          <option value="BMD">Bermuda Dollars</option>
                                          <option value="BRR">Brazil Real</option>
                                          <option value="BGL">Bulgaria Lev</option>
                                          <option value="CAD">Canada Dollars</option>
                                          <option value="CLP">Chile Pesos</option>
                                          <option value="CNY">China Yuan Renmimbi</option>
                                          <option value="CYP">Cyprus Pounds</option>
                                          <option value="CSK">Czech Republic Koruna</option>
                                          <option value="DKK">Denmark Kroner</option>
                                          <option value="NLG">Dutch Guilders</option>
                                          <option value="XCD">Eastern Caribbean Dollars</option>
                                          <option value="EGP">Egypt Pounds</option>
                                          <option value="FJD">Fiji Dollars</option>
                                          <option value="FIM">Finland Markka</option>
                                          <option value="FRF">France Francs</option>
                                          <option value="DEM">Germany Deutsche Marks</option>
                                          <option value="XAU">Gold Ounces</option>
                                          <option value="GRD">Greece Drachmas</option>
                                          <option value="HKD">Hong Kong Dollars</option>
                                          <option value="HUF">Hungary Forint</option>
                                          <option value="ISK">Iceland Krona</option>
                                          <option value="INR">India Rupees</option>
                                          <option value="IDR">Indonesia Rupiah</option>
                                          <option value="IEP">Ireland Punt</option>
                                          <option value="ILS">Israel New Shekels</option>
                                          <option value="ITL">Italy Lira</option>
                                          <option value="JMD">Jamaica Dollars</option>
                                          <option value="JPY">Japan Yen</option>
                                          <option value="JOD">Jordan Dinar</option>
                                          <option value="KRW">Korea (South) Won</option>
                                          <option value="LBP">Lebanon Pounds</option>
                                          <option value="LUF">Luxembourg Francs</option>
                                          <option value="MYR">Malaysia Ringgit</option>
                                          <option value="MXP">Mexico Pesos</option>
                                          <option value="NLG">Netherlands Guilders</option>
                                          <option value="NZD">New Zealand Dollars</option>
                                          <option value="NOK">Norway Kroner</option>
                                          <option value="PKR">Pakistan Rupees</option>
                                          <option value="XPD">Palladium Ounces</option>
                                          <option value="PHP">Philippines Pesos</option>
                                          <option value="XPT">Platinum Ounces</option>
                                          <option value="PLZ">Poland Zloty</option>
                                          <option value="PTE">Portugal Escudo</option>
                                          <option value="ROL">Romania Leu</option>
                                          <option value="RUR">Russia Rubles</option>
                                          <option value="SAR">Saudi Arabia Riyal</option>
                                          <option value="XAG">Silver Ounces</option>
                                          <option value="SGD">Singapore Dollars</option>
                                          <option value="SKK">Slovakia Koruna</option>
                                          <option value="ZAR">South Africa Rand</option>
                                          <option value="KRW">South Korea Won</option>
                                          <option value="ESP">Spain Pesetas</option>
                                          <option value="XDR">Special Drawing Right (IMF)</option>
                                          <option value="SDD">Sudan Dinar</option>
                                          <option value="SEK">Sweden Krona</option>
                                          <option value="CHF">Switzerland Francs</option>
                                          <option value="TWD">Taiwan Dollars</option>
                                          <option value="THB">Thailand Baht</option>
                                          <option value="TTD">Trinidad and Tobago Dollars</option>
                                          <option value="TRL">Turkey Lira</option>
                                          <option value="VEB">Venezuela Bolivar</option>
                                          <option value="ZMK">Zambia Kwacha</option>
                                          <option value="EUR">Euro</option>
                                          <option value="XCD">Eastern Caribbean Dollars</option>
                                          <option value="XDR">Special Drawing Right (IMF)</option>
                                          <option value="XAG">Silver Ounces</option>
                                          <option value="XAU">Gold Ounces</option>
                                          <option value="XPD">Palladium Ounces</option>
                                        <option value="XPT">Platinum Ounces</option>
                                </select>
                        </td>
                </tr>
                <tr>
                        <td>
                                <label  >Check In time </label>
                        </td>
                        <td>
                                <input type="time"  name="intime" id="intime" class=" form-control" required />
                        </td>
                </tr>
                <tr>
                        <td>
                                <label  >Check Out Time </label>
                        </td>
                        <td>
                                <input type="time"  name="outtime" id="outtime"  placeholder="10:00:AM" class="form-control" required />
                        </td>
                </tr>
                <tr>
                        <td>

                                <input type="checkbox" onclick="return enable_disable();" name="change" id="change" style="width: 60px;height: 30px;" class=" form-control">


                                
                        </td>
                        <td>
                            <label >24 hour check in and check out</label>
                        </td>
                </tr>
                <tr>
                        <td>
                                <label class="" >Property Description</label>
                        </td>
                        <td>
                                <textarea name="description" rows="6" cols="55" maxlength="500"  placeholder="Max 500 words"></textarea>
                          
                           <!--  <input type="text" name="description" style="width: 400px;height: 200px; " required> -->
                        </td>
                       <tr>
                           <td>
                               
                           </td>
                           <td>
                               <input type="button"  name="nxt1" id="nxt1" value="next" onclick="next1()"  style='width:150px;border-radius:20px;' 
                               class="btn btn-success form-control "/>
                               

                           </td>
                       </tr>
                           
         </table>

    </div>
       
        <div id="div2" style="display: none;">
         <table   cellpadding="10" id="t2" >
                 <tr style='font-family: Britannic Bold;font-size:20;background-color:#ff6f61;width: 20px;height: 20px;font-size: 22px;'>
                <td align="center" colspan="4">
                        <b >Address</b>
                </td>
         </tr>
                <tr>
                        <td>
                                <label  >Street </label>
                        </td>
                        <td>
                                <input type="text"  name="street" class="form-control"  required  style="width:450px;" />
                        </td>
                </tr>
                <tr>
                        <td>
                                <label  >City </label>
                        </td>
                        <td>
                                <input type="text"  name="city" class="  form-control" required style="width:450px;" />
                        </td>
                </tr>
                <tr>
                        <td>
                                <label  >State </label>
                        </td>
                        <td>
                                <input type="text"  name="state" class="  form-control" required  style="width:450px;" />
                        </td>
                </tr>
                <tr>
                        <td>
                                <label  >Country </label>
                        </td>
                        <td>
                                <!-- <input type="text"  name="country" class="  form-control" required style="width:450px;" /> -->
                                <select name="country"  class="form-control" required style="width:450px;" >
                                <option value="" selected="true" disabled="true">---Select---</option>

                <option value="Afghanistan">Afghanistan</option>

                <option value="Aland Islands">Aland Islands</option>

                <option value="Albania">Albania</option>

                <option value="Algeria">Algeria</option>

                <option value="American Samoa">American Samoa</option>

                <option value="Andorra">Andorra</option>

                <option value="Angola">Angola</option>

                <option value="Anguilla">Anguilla</option>

                <option value="Antarctica">Antarctica</option>

                <option value="Antigua and Barbuda">Antigua and Barbuda</option>

                <option value="Argentina">Argentina</option>

                <option value="Armenia">Armenia</option>

                <option value="Aruba">Aruba</option>

                <option value="Australia">Australia</option>

                <option value="Austria">Austria</option>

                <option value="Azerbaijan">Azerbaijan</option>

                <option value="Bahamas">Bahamas</option>

                <option value="Bahrain">Bahrain</option>

                <option value="Bangladesh">Bangladesh</option>

                <option value="Barbados">Barbados</option>

                <option value="Belarus">Belarus</option>

                <option value="Belgium">Belgium</option>

                <option value="Belize">Belize</option>

                <option value="Benin">Benin</option>

                <option value="Bermuda">Bermuda</option>

                <option value="Bhutan">Bhutan</option>

                <option value="Bolivia">Bolivia</option>

                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>

                <option value="Botswana">Botswana</option>

                <option value="Bouvet Island">Bouvet Island</option>

                <option value="Brazil">Brazil</option>

                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>

                <option value="Brunei Darussalam">Brunei Darussalam</option>

                <option value="Bulgaria">Bulgaria</option>

                <option value="Burkina Faso">Burkina Faso</option>

                <option value="Burundi">Burundi</option>

                <option value="Cambodia">Cambodia</option>

                <option value="Cameroon">Cameroon</option>

                <option value="Canada">Canada</option>

                <option value="Cape Verde">Cape Verde</option>

                <option value="Cayman Islands">Cayman Islands</option>

                <option value="Central African Republic">Central African Republic</option>

                <option value="Chad">Chad</option>

                <option value="Chile">Chile</option>

                <option value="China">China</option>

                <option value="Christmas Island">Christmas Island</option>

                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>

                <option value="Colombia">Colombia</option>

                <option value="Comoros">Comoros</option>

                <option value="Congo">Congo</option>

                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>

                <option value="Cook Islands">Cook Islands</option>

                <option value="Costa Rica">Costa Rica</option>

                <option value="Cote D'ivoire">Cote D'ivoire</option>

                <option value="Croatia">Croatia</option>

                <option value="Cuba">Cuba</option>

                <option value="Cyprus">Cyprus</option>

                <option value="Czech Republic">Czech Republic</option>

                <option value="Denmark">Denmark</option>

                <option value="Djibouti">Djibouti</option>

                <option value="Dominica">Dominica</option>

                <option value="Dominican Republic">Dominican Republic</option>

                <option value="Ecuador">Ecuador</option>

                <option value="Egypt">Egypt</option>

                <option value="El Salvador">El Salvador</option>

                <option value="Equatorial Guinea">Equatorial Guinea</option>

                <option value="Eritrea">Eritrea</option>

                <option value="Estonia">Estonia</option>

                <option value="Ethiopia">Ethiopia</option>

                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>

                <option value="Faroe Islands">Faroe Islands</option>

                <option value="Fiji">Fiji</option>

                <option value="Finland">Finland</option>

                <option value="France">France</option>

                <option value="French Guiana">French Guiana</option>

                <option value="French Polynesia">French Polynesia</option>

                <option value="French Southern Territories">French Southern Territories</option>

                <option value="Gabon">Gabon</option>

                <option value="Gambia">Gambia</option>

                <option value="Georgia">Georgia</option>

                <option value="Germany">Germany</option>

                <option value="Ghana">Ghana</option>

                <option value="Gibraltar">Gibraltar</option>

                <option value="Greece">Greece</option>

                <option value="Greenland">Greenland</option>

                <option value="Grenada">Grenada</option>

                <option value="Guadeloupe">Guadeloupe</option>

                <option value="Guam">Guam</option>

                <option value="Guatemala">Guatemala</option>

                <option value="Guernsey">Guernsey</option>

                <option value="Guinea">Guinea</option>

                <option value="Guinea-bissau">Guinea-bissau</option>

                <option value="Guyana">Guyana</option>

                <option value="Haiti">Haiti</option>

                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>

                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>

                <option value="Honduras">Honduras</option>

                <option value="Hong Kong">Hong Kong</option>

                <option value="Hungary">Hungary</option>

                <option value="Iceland">Iceland</option>

                <option value="India"  >India</option>

                <option value="Indonesia">Indonesia</option>

                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>

                <option value="Iraq">Iraq</option>

                <option value="Ireland">Ireland</option>

                <option value="Isle of Man">Isle of Man</option>

                <option value="Israel">Israel</option>

                <option value="Italy">Italy</option>

                <option value="Jamaica">Jamaica</option>

                <option value="Japan">Japan</option>

                <option value="Jersey">Jersey</option>

                <option value="Jordan">Jordan</option>

                <option value="Kazakhstan">Kazakhstan</option>

                <option value="Kenya">Kenya</option>

                <option value="Kiribati">Kiribati</option>

                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>

                <option value="Korea, Republic of">Korea, Republic of</option>

                <option value="Kuwait">Kuwait</option>

                <option value="Kyrgyzstan">Kyrgyzstan</option>

                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>

                <option value="Latvia">Latvia</option>

                <option value="Lebanon">Lebanon</option>

                <option value="Lesotho">Lesotho</option>

                <option value="Liberia">Liberia</option>

                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>

                <option value="Liechtenstein">Liechtenstein</option>

                <option value="Lithuania">Lithuania</option>

                <option value="Luxembourg">Luxembourg</option>

                <option value="Macao">Macao</option>

                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>

                <option value="Madagascar">Madagascar</option>

                <option value="Malawi">Malawi</option>

                <option value="Malaysia">Malaysia</option>

                <option value="Maldives">Maldives</option>

                <option value="Mali">Mali</option>

                <option value="Malta">Malta</option>

                <option value="Marshall Islands">Marshall Islands</option>

                <option value="Martinique">Martinique</option>

                <option value="Mauritania">Mauritania</option>

                <option value="Mauritius">Mauritius</option>

                <option value="Mayotte">Mayotte</option>

                <option value="Mexico">Mexico</option>

                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>

                <option value="Moldova, Republic of">Moldova, Republic of</option>

</select>
                        </td>
                </tr>
                <tr>
                        <td>
                                <label  >Zip/Postal Code </label>
                        </td>
                        <td>
                                <input type="number"  name="zpcode" class="  form-control" required style="width:450px;" />
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label>Map Navigation</label>
                        </td>
                        <td>
                          <input type="text"  name="map_address" class="  form-control" placeholder="Property name/locality name" required style="width:450px;" />
                        </td>
                      </tr>
                        <tr>
                           <td>
                            <input type="button"  name="pre1" value="previous" onclick="prev1()" style='width:150px;border-radius:20px;' class="btn btn-warning form-control"/>
                               
                           </td>
                           <td>
                               <input type="button"  name="nxt2" value="next" onclick="next2()" style='width:150px;border-radius:20px;' 
                               class="btn btn-success  form-control"/>

                           </td>
                       </tr>
                
        </table>
    </div>
        
        <div id="div3" style="display:none ;">
        <table  cellpadding="10" id="t3" >
         <tr style='font-family: Britannic Bold;font-size:20;background-color:#ff6f61;font-size: 22px;'>
                <td align="center" colspan="4">
                        <b>Owner</b>
                </td>
         </tr>
         <tr>
            <td>
                <label  >Owner Id</label>
            </td>
            <td>
                <input type="number" value="<?php echo $largestNum ?>"  name="ownerid" class="  form-control" required style="width:450px;" disabled="" />
            </td>
        </tr>
        <tr>
            <td>
                <label  >Name</label>
            </td>
            <td>
                <input type="text"  name="ownername" class="  form-control" required style="width:450px;" />
            </td>
        </tr>
        <tr>
            <td>
                <label >Email</label>
            </td>
            <td>
                <input type="email"  name="owneremail" class="  form-control" required style="width:450px;" />
            </td>
        </tr>
        <tr>
            <td>
                <label> Phone</label>
            </td>
            <td>
                <input type="number"  name="ownerphone" class="  form-control" required style="width:450px;" />
            </td>
        </tr>
                    <tr>
                           <td>
                            <input type="button"  name="pre2" value="previous" onclick="prev2()" style='width:150px;border-radius:20px;' class="btn btn-warning form-control"/>
                               
                           </td>
                           <td>
                               <input type="button"  name="nxt3" value="next" onclick="next3()" style='width:150px;border-radius:20px;' 
                               class="btn btn-success form-control"/>

                           </td>
                       </tr>
    </table>
</div>
    <div id="div4" style="display: none">
    <table   cellpadding="10" id="t4" >
         <tr style='font-family: Britannic Bold;font-size:20;background-color:#ff6f61;font-size: 22px;'>
                <td align="center" colspan="4">
                        <b style="color: black;">Manager</b>
                </td>
         </tr>
         <tr>
            <td>
                <label  >Name</label>
            </td>
            <td>
                <input type="text"  name="manname" class="  form-control" required style="width:450px;"/>
            </td>
        </tr>
        <tr>
            <td>
                <label  >Email</label>
            </td>
            <td>
                <input type="email"  name="manemail" class="  form-control" required style="width:450px;"/>
            </td>
        </tr>
        <tr>
            <td>
                <label  >Phone</label>
            </td>
            <td>
                <input type="number"  name="manphone" class="  form-control" required style="width:450px;"/>
            </td>
        </tr>
        <tr>
                           <td>
                            <input type="button"  name="pre3" value="previous" onclick="prev3()" style='width:150px;border-radius:20px;' class="btn btn-warning form-control"/>
                               
                           </td>
                           <td>
                               <input type="button"  name="nxt4" value="next" onclick="next4()" style='width:150px;border-radius:20px;' 
                               class="btn btn-success form-control"/>

                           </td>
                       </tr>
    </table>
    </div>
    
    <div id="div5" style="display: none">
    <table  cellpadding="8" id="t5" >
         <tr style='font-family: Britannic Bold;font-size:20;background-color:#ff6f61;font-size: 22px;'>
                <td align="center" colspan="4">
                        <b style="color: black;">Front Desk/Reservation Manager</b>
                </td>
         </tr>
         <tr>
            <td>
                <label  >Name</label>
            </td>
            <td>
                <input type="text"  name="resmanname" class="  form-control" required style="width:450px;" />
            </td>
        </tr>

         <tr>
            <td>
                <label>Email</label>
            </td>
            <td>
                <input type="email"  name="resmanemail" class="  form-control" required style="width:450px;" />
            </td>
        </tr>
        <tr>
            <td>
                <label  >Phone</label>
            </td>
            <td>
                <input type="number"  name="resmanphone" class="  form-control" required style="width:450px;" />
            </td>
        </tr>
        <tr style='font-family: Britannic Bold;font-size:20;background-color:#ff6f61;font-size: 22px;'>
                <td align="center" colspan="4">
                        <b style="color: black;">Keywords</b>
                </td>
         </tr>



 <!-- <tr style='font-family: Britannic Bold;font-size:20;background-color:#ff6f61;'>
                <td align="center" colspan="4">
                        <b style="color: black;">Front Desk/Reservation Manager</b>
                </td>
         </tr> -->        

        <tr>
            <td>
                <label  >City Life</label>
            </td>
            <td>
                <input type="checkbox" style="margin-left:150px;width: 20px;height: 20px;"style="border-radius: 10px;" name="citylife" value="citylife" class=" btn btn-success form-control"   style="width:450px;">
            </td>
        </tr>
        <tr>
            <td>
                <label  >Night Life</label>
            </td>
            <td>
                <input type="checkbox" style="margin-left:150px;width: 20px;height: 20px;" name="nightlife" value="nightlife" class="  form-control"  style="width:450px;" />
            </td>
        </tr>
        <tr>
            <td>
                <label  >Destination Wedding</label>
            </td>
            <td>
                <input type="checkbox" style="margin-left:150px;margin-left:150px;width: 20px;height: 20px;" name="destination" value="destinationwedding" class="  form-control" style="width:450px;" />
            </td>
        </tr>
        <tr>
            <td>
                <label  >Food</label>
            </td>
            <td>
                <input type="checkbox" style="margin-left:150px;width: 20px;height: 20px;" name="food" value="food" class="  form-control"   style="width:450px;"/>
            </td>
        </tr>
        <tr>
            <td>
                <label  >Heritage and Culture</label>
            </td>
            <td>
                <input type="checkbox" style="margin-left:150px;width: 20px;height: 20px;" name="heritage" value="heritageandculture" class="  form-control"  style="width:450px;" />
            </td>
        </tr>
     
     </table>
     </div>
    
     <div id="div6" style="display: none">
     <table  id="t6" style="margin-bottom: 50px;">
         <tr>
             <td>
                <input type="button"  name="pre4" value="previous" onclick="prev4()" style='width:150px;border-radius:20px;' class="btn btn-warning form-control"/>
                </td>  

                <td>         
                <input type="submit"  name="submit" value="submit" style='margin-left:110px;width:150px;border-radius:20px;background-color:#ff6f61;'
                class="btn btn-success form-control"/>
            </td>

              <!-- <form action="<?php// echo $_SERVER['PHP_SELF']; ?>">   -->


                <!--<input type="button" onclick="prev1();" name="addnew" value="add new"   
                    style='width:150px;border-radius:20px;' class="btn btn-success form-control"/>
                -->
               
            
             
         </tr>
     </table>



 </div>
     
   

   </form>
 </div>
  
</div>

</body>
</html>
             
                