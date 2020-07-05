<!DOCTYPE html> 
        <div class="container-fluid">  
<h1>My Details</h1>		
         <div class="row">
					 <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">	
 <div class="row no-gutters align-items-center">
                    <div class="col mr-2">					
                      <div class="text-s font-weight-bold text-primary text-uppercase mb-1">
						Chat ID
					  </div>					  
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
							echo $_SESSION['DE_chatid'];
							?></div>						
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-id-card fa-2x text-gray-300"></i>
                    </div>
                  </div>
				  <hr>
 <div class="row no-gutters align-items-center">
                    <div class="col mr-2">					
                      <div class="text-s font-weight-bold text-primary text-uppercase mb-1">
						ID
					  </div>					  
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
							echo $_SESSION['DE_id'];
							?></div>						
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-address-book fa-2x text-gray-300"></i>
                    </div>
                  </div>
				  <hr>
 <div class="row no-gutters align-items-center">
                    <div class="col mr-2">					
                      <div class="text-s font-weight-bold text-primary text-uppercase mb-1">
						Capacity
					  </div>					  
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
							echo $_SESSION['DE_capacity'];
							?></div>						
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-bars fa-2x text-gray-300"></i>
                    </div>
                  </div>
				  <hr>
				  
				  

				   <div class="row no-gutters align-items-center">
                    <div class="col mr-2">					
                      <div class="text-s font-weight-bold text-primary text-uppercase mb-1">
						Last Report
					  </div>					  
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
							echo $_SESSION['DE_lastreport'];
							?></div>						
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-bell fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>	
 <div class="col-xl-6 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
  <div class="card-body">	
   <div class="row no-gutters align-items-center">
                    <div class="col mr-2">					
                      <div class="text-s font-weight-bold text-primary text-uppercase mb-1">
						Email
					  </div>					  
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
							echo $_SESSION['DE_email'];
							?></div>						
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-at fa-2x text-gray-300"></i>
                    </div>
                  </div>
				  <hr>
 <div class="row no-gutters align-items-center">
                    <div class="col mr-2">					
                      <div class="text-s font-weight-bold text-primary text-uppercase mb-1">
						Phone Number
					  </div>					  
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
							echo $_SESSION['DE_phone'];
							?></div>						
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-mobile-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
				  <hr>				  
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">					
                      <div class="text-s font-weight-bold text-primary text-uppercase mb-1">
						Number Of Students
					  </div>					  
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
							echo $_SESSION['DE_numstudents'];
							?></div>						
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-award fa-2x text-gray-300"></i>
                    </div>
                  </div>
				  <hr>
				   <div class="row no-gutters align-items-center">
                    <div class="col mr-2">					
                      <div class="text-s font-weight-bold text-primary text-uppercase mb-1">
						Country Code
					  </div>					  
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
							echo $_SESSION['DE_countrycode'];
							?></div>						
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-border-all fa-2x text-gray-300"></i>
                    </div>
                  </div>
  </div>	
   </div>	
		 </div>			
				</div>
        </div> 

