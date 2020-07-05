       		<?php
			$data = $_SESSION['student_profiles'];	
				for($i = 0; $i < sizeof($data); $i++)
				{		
				if (isset($data[$i]))
					{														
						if(str_replace('+',' ',$data[$i]["chatid"]) == $_GET['TSchatid'])
						{
							$SeriesFor = $data[$i]["series"];
						}
					}
				}					
				?>			
				
				<div class="container-fluid">					
				<h2>Student details for<span class="font-weight-bold text-primary text-uppercase">
									<?php echo $_GET['TSname'];?>
									</span></h2>
									  <span style="cursor:pointer;" class="btn btn-link float-righ" onclick="GOTOALL()">Back to list</span>
				<div class="row">			
					 <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">				
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">					
                      <div class="text-s font-weight-bold text-primary text-uppercase mb-1">
						Chat ID
					  </div>					  
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
							echo $_GET['TSchatid'];
							?></div>						
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-id-card fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			<div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">				
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">					
                      <div class="text-s font-weight-bold text-danger text-uppercase mb-1">
						Series
					  </div>					  
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
							echo $SeriesFor;
							?></div>						
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-music fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			<div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">				
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">					
                      <div class="text-s font-weight-bold text-success text-uppercase mb-1">
						Language
					  </div>					  
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
							echo $_GET['TSlanguage'];
							?></div>						
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-language fa-2x text-gray-300"></i>
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
                      <div class="text-s font-weight-bold text-warning text-uppercase mb-1">
						Last contact
					  </div>					  
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
							echo $_GET['TSlastcontact'];
							?></div>						
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clock fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
				</div>
				<div class="row">
				<div class="col-lg-6">  
              <!-- Basic Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h4 class="m-0 font-weight-bold text-primary float-left">High-touch tip</h4>
				  <i class="float-right fas fa-lightbulb fa-3x text-warning"></i>
                </div>
                <div class="card-body">
                  Make sure to ask your student for prayer requests and check in at least once every 3 weeks to make sure he/she stays on course. Also, ask him/her questions about the last topic that he/she have studied.
                </div>
              </div>

            </div>
			<div class="col-lg-6">  
              <!-- Basic Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h4 class="m-0 font-weight-bold text-info float-left">Remember</h4>
				  <i class="float-right fas fa-bible fa-3x text-info"></i>
                </div>
                <div class="card-body text-info font-weight-bold">
                  Matthew 9:37-38 The harvest truly is plentiful, but the laborers are few. Therefore pray the Lord of the harvest to send out laborers into His harvest.
                </div>
              </div>

            </div>
				</div>
				<div class="row">
				<div class="col-lg-12"> 
				<h4><span class="font-weight-bold text-primary text-uppercase">
									<?php echo $_GET['TSname'];?>'s progress
									</span></h4>				
				</div>
				</div>
				<div class="row">
				<div class="col-lg-12"> 
				<?php 
 //print_r($_SESSION['student_profiles']); 
 $data = $_SESSION['student_profiles'];												
//echo json_encode($data);									
									$temp = "<table class='table table-bordered table-hover' id='dataTable' width='100%' cellspacing='0'";
									$temp .= "<thead><tr>";
									$temp .= "<th>Study</th>";	
									$temp .= "<th>Date sent</th>";	
									$temp .= "<th>Study description</th>";										
									$temp .= "<th></th></tr></thead>";	
									for($i = 0; $i < sizeof($data); $i++)
									{		
									if (isset($data[$i]))
										{	
									//print_r(str_replace('+','',$data[$i]["chatid"]));
									//print_r($_GET['TSchatid']);
											if(str_replace('+',' ',$data[$i]["chatid"]) == $_GET['TSchatid'])
											{
												$temp .= "<tr>";												
											
												$temp .= "<td>" . $data[$i]["seriesindex"] . "</td>";
												$temp .= "<td>" . $data[$i]["sentdate"] . "</td>";	
												$temp .= "<td>" . $data[$i]["status"] . "</td>";
												$temp .= "<td class='text-center btn-success'><span class='fas fa-check'></span></td>";
												$temp .= "</tr>";
											}											
										
										}
									}		
									$temp .= "</table>";					 
									echo $temp;		
 ?>
  </div>
				</div>
				
 
 
 
				</div>	
<script>
 function GOTOALL() 
 { 
 location.href = "?page=allstudents&show=0";
 }  
 </SCRIPT>  
       				
         
		
				  
       

