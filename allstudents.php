   	   <form method="post" action="">
	 <div class="container-fluid">
          <h1 class="h3 mb-2 text-gray-800">My Students</h1>         
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-secondary">
				<div class="row">
				<div class="col-sm-12 col-md-8">	
				<div class="row">
				<div class="col-sm-12 col-md-4">
				<label class="radio-inline"><input type="radio" value="All" name="Unsubscribed" 
				<?php if ($_GET["show"] == 0) echo "checked='checked'"; ?>	
				onclick="myFunctionSel('All');">  Show All Students  </label>
				</div>			
					<div class="col-sm-12 col-md-4">
					<label class="radio-inline"><input type="radio" value="Sub" name="Unsubscribed" 
					<?php if ($_GET["show"] == 1) echo "checked='checked'"; ?>	
					onclick="myFunctionSel('Sub');"> Subscribed  </label>
					</div>
					<div class="col-sm-12 col-md-4">					
					<label class="radio-inline"><input type="radio" value="UnSub" name="Unsubscribed" 
					<?php if ($_GET["show"] == 2) echo "checked='checked'"; ?>	
					onclick="myFunctionSel('UnSub');"> Un-Subscribed  </label>
					</div>
					</div>	
				</div>
				<div class="col-sm-12 col-md-4">
				<div id="dataTable_filter"><input type="search" class="form-control form-control-sm" id="myInput1" onkeyup="SearchAllx()" placeholder="Search Name or Chat ID">
				</div>
				</div>
				</div>
			  </h6> 
            </div>
            <div class="card-body">
              <div class="table-responsive">			
				<?php					
									$data = $_SESSION['allStudents'];				
//echo json_encode($data);									
									$temp = "<table class='table table-bordered table-hover' id='dataTable' width='100%' cellspacing='0'";
									$temp .= "<thead><tr><th onclick='sortTable(0)'>Name</th>";
									$temp .= "<th onclick='sortTable(1)'>Chat ID</th>";
									$temp .= "<th onclick='sortTable(2)'>Language</th>";													
									$temp .= "<th onclick='sortTable(3)'>LastContact</th>";
									$temp .= "<th onclick='sortTable(4)'>Status</th>";
									$temp .= "<th>Action</th></tr></thead>";	
									for($i = 0; $i < sizeof($data); $i++)
									{
										if (isset($data[$i]))
										{											
										if(isset($data[$i]["lastcontact"]))
											{
												$dateLastContact =  $data[$i]["lastcontact"];
												$dateLastContact = new DateTime($dateLastContact);												
												$now = time(); // or your date as well
												$your_date = strtotime($dateLastContact->format('Y/m/d'));
												$difference = $now - $your_date;
												$diff = round($difference / (60 * 60 * 24));
												if($diff <= 1)
												{
													$data[$i]["lastcontact"] = $dateLastContact->format('Y/m/d').' (Today)';
												}
												else if($diff <= 2)
												{
													$data[$i]["lastcontact"] = $dateLastContact->format('Y/m/d').' ('.($diff - 1).' day ago)';
												}												
												else
												{
													$data[$i]["lastcontact"] = $dateLastContact->format('Y/m/d').' ('.($diff - 1).' days ago)';
												}
												
											}												
											
										if($data[$i]["status"] != 'unsubscribed')
										{
											
											if($diff >= 14)
											{												
												$temp .= "<tr style='cursor: help;' class='border-left-warning material-tooltip-warn' data-toggle='tooltip' data-placement='top' title='Student has not lisened to any studies for more that 2 weeks'>";
												if(isset($data[$i]["firstname"]))
											{
												$temp .= "<td>" . $data[$i]["firstname"] . "</td>";
											}
											else
											{
												$temp .= "<td>Unknown</td>";
											}
											if(isset($data[$i]["chatid"]))
											{
												$temp .= "<td>" . $data[$i]["chatid"] . "</td>";
											}
											else
											{
												$temp .= "<td>Unknown</td>";
											}
											if(isset($data[$i]["language"]))
											{
												$temp .= "<td>" . $data[$i]["language"] . "</td>";
											}
											else
											{
												$temp .= "<td>Unknown</td>";
											}
											if(isset($data[$i]["lastcontact"]))
											{
												$temp .= "<td>" . $data[$i]["lastcontact"] . "</td>";
											}
											else
											{
												$temp .= "<td>Unknown</td>";
											}		
												$temp .= "<td class='text-center btn-warning'><span class='fas fa-exclamation-circle'></span></td>";
											}
											else
											{
											$temp .= "<tr style='cursor: help;' class='border-left-success material-tooltip-warn' data-toggle='tooltip' data-placement='top' title='Student is doing great'>";
											if(isset($data[$i]["firstname"]))
											{
												$temp .= "<td>" . $data[$i]["firstname"] . "</td>";
											}
											else
											{
												$temp .= "<td>Unknown</td>";
											}
											if(isset($data[$i]["chatid"]))
											{
												$temp .= "<td>" . $data[$i]["chatid"] . "</td>";
											}
											else
											{
												$temp .= "<td>Unknown</td>";
											}
											if(isset($data[$i]["language"]))
											{
												$temp .= "<td>" . $data[$i]["language"] . "</td>";
											}
											else
											{
												$temp .= "<td>Unknown</td>";
											}	
											if(isset($data[$i]["lastcontact"]))
											{
												$temp .= "<td>" . $data[$i]["lastcontact"] . "</td>";
											}
											else
											{
												$temp .= "<td>Unknown</td>";
											}		
											$temp .= "<td class='text-center btn-success'><span class='fas fa-user-check'></span></td>";
											}											
										}
										else
										{
											$temp .= "<tr style='cursor: help;' class='border-left-danger material-tooltip-warn' data-toggle='tooltip' data-placement='top' title='Student has un-subscribed'>";
											if(isset($data[$i]["firstname"]))
											{
												$temp .= "<td>" . $data[$i]["firstname"] . "</td>";
											}
											else
											{
												$temp .= "<td>Unknown</td>";
											}
											if(isset($data[$i]["chatid"]))
											{
												$temp .= "<td>" . $data[$i]["chatid"] . "</td>";
											}
											else
											{
												$temp .= "<td>Unknown</td>";
											}
											if(isset($data[$i]["language"]))
											{
												$temp .= "<td>" . $data[$i]["language"] . "</td>";
											}
											else
											{
												$temp .= "<td>Unknown</td>";
											}
											if(isset($data[$i]["lastcontact"]))
											{
												$temp .= "<td>" . $data[$i]["lastcontact"] . "</td>";
											}
											else
											{
												$temp .= "<td>Unknown</td>";
											}		
											$temp .= "<td class='btn-danger'>Unsubscribed</td>";											
										}			
									if(isset($data[$i]['chatid']))
									{
										$ChatIDx = $data[$i]['chatid'];
										if(!isset($data[$i]['firstname']))
										{											
											$firstnamex = "Unknown";
										}
										else
										{
											$firstnamex = $data[$i]['firstname'];
										}
										if(!isset($data[$i]['series']))
										{											
											$seriesx = "Unknown";
										}
										else
										{
											$seriesx = $data[$i]['series'];
										}
										if(!isset($data[$i]['lastcontact']))
										{											
											$lastcontactx = "Unknown";
										}
										else
										{
											$lastcontactx = $data[$i]['lastcontact'];
										}
										if(!isset($data[$i]['language']))
										{											
											$languagex = "Unknown";
										}
										else
										{
											$languagex = $data[$i]['language'];
										}
										$temp .= "<td><a href='?page=studentdetails&TSname=".$firstnamex."&TSseries=".$seriesx."&TSlastcontact=".$lastcontactx."&TSchatid=".($data[$i]['chatid'])."&TSlanguage=".$languagex."' class='btn btn-primary'>View</a></td>";
									}										
										}
									
									$temp .= "</tr>";
									}		
									$temp .= "</table>";					 
									echo $temp;										
								?>	                	
              </div>
            </div>
          </div>
        </div>  
		</form>  
<script>
function myFunctionSel(Value) {	
  var filter, table, tr, td, i, txtValue;
   filter = Value;
  table = document.getElementById("dataTable");
  tr = table.getElementsByTagName("tr");
  for (i = 1; i < tr.length; i++) 
  {
    td = tr[i].getElementsByTagName("td")[4];
	
    if (td) 
	{
      txtValue = td.textContent || td.innerText;
	  if(filter == "All")
		{
		  tr[i].style.display = "";
		}
	  else if (filter == "Sub")
		{			
		  if (txtValue != "Unsubscribed") 
		  {
			tr[i].style.display = "";
		  } 
		  else 
		  {
			tr[i].style.display = "none";
		  }
		}
		else if (filter == "UnSub")
		{
		 if (txtValue == "Unsubscribed") 
		  {
			tr[i].style.display = "";
		  } 
		  else 
		  {
			tr[i].style.display = "none";
		  }
		}
    }       
  }
}
</script>	
					<?php
					if (isset($_GET["show"]))
					{
						if ($_GET["show"] == 0)
						{
							echo '<script type="text/javascript">',
															 'myFunctionSel("All");',
															 '</script>';
						}
						else if ($_GET["show"] == 1)
						{
							echo '<script type="text/javascript">',
															 'myFunctionSel("Sub");',
															 '</script>';
						}
						else if ($_GET["show"] == 2)
						{
							echo '<script type="text/javascript">',
															 'myFunctionSel("UnSub");',
															 '</script>';
						}
						
						
					};
						
					?>										 