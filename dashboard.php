 <div class="container-fluid">          
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Digital Evangelist Dashboard</h1>            
          </div>        
          <div class="row">			
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body" style="cursor:pointer;"  onclick="GOTOALL()">
				
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">					
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
						Total Students
					  </div>					  
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
							echo $_SESSION['AllStudentsCount'];
							?></div>						
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body" style="cursor:pointer;" onclick="GOTOSUBS()">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">					  
						Subscribed Students					  
					  </div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
						  <?php
							echo $_SESSION['SubStudentsCount'];
							?></div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $_SESSION['SubStudentsPerc']?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
							</div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body" style="cursor:pointer;" onclick="GOTOUNSUBS()">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">					   
						Unsubscribed Students					 
					  </div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
						  <?php							
							echo $_SESSION['UnSubStudentsCount'];
							?></div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $_SESSION['UnSubStudentsPerc']?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-minus-circle fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Unsubscribe Ratio</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php							
							echo $_SESSION['Ratio'];
							?>%</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-arrow-alt-circle-down fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Sign-up Overview</h6>                  
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>            
          </div>  
</div>
<textarea style="display:none;" id="hdnSessionLabel" /><?php echo $_SESSION['chartlabel']?></textarea> 
<textarea style="display:none;" id="hdnSessionDate" /><?php echo $_SESSION['chartdata']?></textarea> 
 <SCRIPT language="JavaScript"> 
 function GOTOALL() 
 { 
 location.href = "?page=allstudents&show=0";
 }  
 function GOTOSUBS() 
 { 
 location.href = "?page=allstudents&show=1";
 }  
 function GOTOUNSUBS() 
 { 
 location.href = "?page=allstudents&show=2";
 }  
 </SCRIPT>  
       