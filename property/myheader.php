 <?php include 'vone.php'; ?>
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css">
 <nav class="navbar navbar-expand-md " >
     <div class="container-fluid">
       <a href="http://localhost/mytravaly/v1/mytravalyAdmin/mt.php" class="navbar-brand text-uppercase"></a>
       <!-- <h1 class="hh">Admin Dashboard</h1> -->
       <img src="images/logo1.png" alt="" >
       
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
            <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse justify-content-end" id="myNavbar">

         <ul class="navbar-nav links d-md-none">
             <li class="nav-item">
                 <a href="http://localhost/mytravaly/v1/mytravalyAdmin/mt.php" class="nav-link">
                       

                      <i class="fa fa-home " style="color:#150578"></i>   
                    &nbsp;Dashboard         
                </a>
             </li>

             <li class="nav-item">
                    <a href="../mail-using-server.php" class="nav-link">
                       <i class="fa fa-list " style="color:#FFBA08"></i>   
                       &nbsp;ResMail          
                      </a>
            </li>

                <li class="nav-item">
                         <a href="../mytravalycrm/CRM/leadtablepage.php" class="nav-link">
                            <i class="fa fa-envelope text-muted mr-3"></i>   
                            CRM        
                         </a>
                 </li>
                 <li class="nav-item">
                          <a href="../property1/index.php" class="nav-link">
                               <i class="fa fa-building " style="color:rgba(194, 36, 133, 0.747)"></i>   
                               &nbsp;&nbsp;Property      
                              </a>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                       <i class="fa fa-envelope text-muted mr-3"></i>   
                                    PMS        
                     </a>
                 </li>
                                           
                
         

            

               
            </li>
            <li class="nav-items">
                <a href="profitmaker.html" class="nav-link">
                    <fa class="fa fa-home " style="color:red"></fa>   
                    &nbsp;Profit Maker          
                   </a>
            </li>

            <li class="nav-items">
                   <a href="#" class="nav-link">
                       <i class="fa fa-address-card " style="color:#06D6A0"></i>   
                       &nbsp;&nbsp;Accounts        
                      </a>
               </li>

               <li class="nav-item">
                       <a href="#" class="nav-link">
                           <i class="fa fa-envelope " style="color:#F7CB15"></i>   
                           &nbsp;&nbsp;Social Media   
                          </a>
                   </li>
                   <li class="nav-item">
                           <a href="#" class="nav-link">
                               <i class="fa fa-desktop " style="color:#740d06"></i>   
                               &nbsp;&nbsp;Report      
                              </a>
                       </li>
                       <!-- <li class="nav-item">
                               <a href="#" class="nav-link">
                                   <i class="fa fa-shopping-bag " style="color:#07775f"></i>   
                                   &nbsp;&nbsp;MarketPlace         
                                  </a>
                           </li>



                           <li class="nav-item">
                               <a href="#" class="nav-link">
                                   <i class="fa fa-shopping-bag " style="color:#07775f"></i>   
                                   &nbsp;&nbsp;Pay Plans       
                                  </a>
                           </li>



                           <li class="nav-item">
                               <a href="#" class="nav-link">
                                   <i class="fa fa-shopping-bag " style="color:#07775f"></i>   
                                   &nbsp;&nbsp;Payment        
                                  </a>
                           </li>



                           <li class="nav-item">
                               <a href="#" class="nav-link">
                                   <i class="fa fa-shopping-bag " style="color:#07775f"></i>   
                                   &nbsp;&nbsp;Log Viewer        
                                  </a>
                           </li>



                           <li class="nav-item">
                               <a href="#" class="nav-link">
                                   <i class="fa fa-shopping-bag " style="color:#07775f"></i>   
                                   &nbsp;&nbsp;Setting       
                                  </a>
                           </li>



                           <li class="nav-item">
                               <a href="#" class="nav-link">
                                   <i class="fa fa-shopping-bag " style="color:#07775f"></i>   
                                   &nbsp;&nbsp;Contact       
                                  </a>
                           </li>


                           <li class="nav-item">
                               <a href="#" class="nav-link">
                                   <i class="fa fa-shopping-bag " style="color:#07775f"></i>   
                                   &nbsp;&nbsp;Support       
                                  </a>
                           </li>

                           <li class="nav-item">
                               <a href="#" class="nav-link">
                                   <i class="fa fa-shopping-bag " style="color:#07775f"></i>   
                                   &nbsp;&nbsp;Organizations       
                                  </a>
                           </li>


                           <li class="nav-item">
                                <a href="../usermgt/user_main1.php" class="nav-link">
                                    <i class="fa fa-users " style="color:#a610e5"></i>   
                                    &nbsp;&nbsp;User Management        
                                   </a>
                            </li>
                                           -->
               
             </ul>


          <!---------- nav icons ----------->


         <ul class="navbar-nav icons">

            <li class="nav-item mr-4">

                <a href="#" class="nav-link">

                 <i class="fa fa-search"></i>
                </a>
            </li>


            <li class="nav-item mr-4">

                    <a href="#" class="nav-link">
                
    
                        <i class="fa fa-bell icon"></i>
                        
                    </a>
             </li>

                <li class="nav-item mr-4">

                     <a href="#" class="nav-link">
        
                            <i class="fa fa-comment icon"></i>
                        </a>
                    </li>


                    <li class="nav-item mr-5">

                        <a href="#" class="nav-link">
                          <img src='<?php echo $image_src; ?>' style='width:50px;height:50px' alt=person class='img-fluid rounded-circle img-thumbnail mr-3'/>
<!-- 
                            <img src="images/team.jpg" width="40" alt="image" class="img-fluid rounded-circle img-thumbnail"> -->
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link" data-toggle="modal" data-target="#sign-out">

                            <i class="fa fa-sign-out-alt"></i>
                            Sign Out
                        </a>
                    </li>
         </ul>

       </div>
       
     </div>

 </nav>


<div class="modal fade" id="sign-out">
    <div class="modal-dialog">
        <div class="modal-content">

            <!------------------------- modal header ------------------------>

            <div class="modal-header">

                <h4 class="modal-title">Already want to leave?</h4>

                <button type="button" class="close" data-dismiss="modal"
                >&times;</button>
            </div>

            <!--------------------------------- modal body --------------------->

            <div class="modal-body">
                It is sad to see you go . Please press logout to leave
            </div>

            <!-------------------------- modal footer ------------------------>
             <div class="modal-footer">

                <button class="btn btn-primary" type="button" data-dismiss="modal">Stay Here</button>
                <!-- <button class="btn btn-danger" formaction="../index.php" type="button"  data-dismiss="modal">Log out</button> -->

                <a href="../logout.php" class="btn btn-danger">
                     log out</a>
             </div>


        </div>
    </div>


 </div>

 
 <!-----------  the modal --------------->
 <link rel="stylesheet" type="text/css" href="main.css">

    

    <!------------- toggler button --------------------------->
    <script>
      $(".navbar-toggler").html(
        '<i class="fa fa-arrow-down fa-3x text-red"></i>'
      );
    </script>