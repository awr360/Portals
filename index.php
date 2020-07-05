<?php   
  session_start(); 
// initializing variablesf
$username = "";
$email    = "";
 
 if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }   
			
  if (isset($_GET['logout'])) {	 
  	session_destroy();  		
  	header("location: login.php");
  }  

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Evangelist - Dashboard</title>  
  <link href="www/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="www/sb-admin-2.min.css" rel="stylesheet">
  <style>
        th{
            cursor: pointer;
        }	
    </style>
</head>
<body id="page-top">
<?php include('server.php') ?>  
  <div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Hi <?php echo $_SESSION['username'] ?>
		
		</div>
      </a>
      <hr class="sidebar-divider my-0">
    <div id="content-wrapper" class="d-flex flex-column">	
  </div>
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>		  
          <span>My Dashboard</span></a>	
      </li>   	 
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-book"></i>
          <span>Reports</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">      
			<a class="collapse-item" href="?page=allstudents&show=0">All Students</a>		
          </div>
        </div>
      </li>       
      <li class="nav-item">
        <a class="nav-link" href="?page=mydetails">
          <i class="fas fa-fw fa-address-card"></i>
          <span>My Details</span></a>
      </li> 
<li class="nav-item">
       <a class="nav-link" style="font-weight: 700;" href="index.php?logout='1'">Logout</a>
      </li>   	  
    </ul>
    <div id="content-wrapper" class="d-flex flex-column">
	<div id="content">
	<body id="page-top"> 			
       <br>  
	    <?php //echo $_SESSION['test'] ?>
	   <?php 	   
	   if (isset($_GET['page']))
			{      		
				if($_GET['page'] == "allstudents")
				{				
				$activePage = "allstudents.php";
				}	
				else if($_GET['page'] == "dashboard")
				{				
				$activePage = "dashboard.php";
				}
				else if($_GET['page'] == "mydetails")
				{				
				$activePage = "mydetails.php";
				}	
				else if($_GET['page'] == "studentdetails")
				{				
				$activePage = "studentdetails.php";
				}					
			}	
			else{
			$_GET['page'] = "dashboard";
			}	 ?> 
			<?php
				if (isset($activePage))
				{
					include $activePage;   
				}
				else
				{
					include "dashboard.php";
				}
				?> 
				  <!-- Bootstrap core JavaScript-->
  <script src="www/jquery.min.js"></script>
  <script src="www/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="www/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="www/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="www/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="www/chart-area-demo.js"></script>
  <script src="www/chart-pie-demo.js"></script>
   <!-- Page level plugins -->
  <script src="www/jquery.dataTables.min.js"></script>
  <script src="www/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="www/datatables-demo.js"></script>
				</body>
	   </div>     
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; AWR DE Reporting Portal 2020</span>
          </div>
        </div>
      </footer> 
    </div>  
  </div>  
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="www/jquery.min.js"></script>
  <script src="www/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="www/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="www/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="www/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="www/chart-area-demo.js"></script>
  <script src="www/chart-pie-demo.js"></script>
<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("dataTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
function SearchAllx() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput1");
  filter = input.value.toUpperCase();
  table = document.getElementById("dataTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
	td2 = tr[i].getElementsByTagName("td")[1];	
    if ((td) && (td2)){
      txtValue = td.textContent || td.innerText;
	  txtValue2 = td2.textContent || td2.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
$(function () {
  $('.material-tooltip-warn').tooltip({
    template: '<div class="tooltip md-tooltip-email"><div class="tooltip-arrow md-arrow"></div><div class="tooltip-inner md-inner-email"></div></div>'
  });
})


</script>
</body>

</html>
