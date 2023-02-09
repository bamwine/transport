<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['usremp']))
	{
		header("location:index.php");
	}
	
	$user_ids= $_SESSION['usremp']['cl_id'];
	
?>

<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TRAS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

</head>
<?php  include('connect.php');?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

     <a href="user.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>TRAS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>TRAS</b>EXPO</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
        
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo"  ".$_SESSION['usremp']['cl_nam'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo"  ".$_SESSION['usremp']['cl_nam'];?> Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
		  
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo"  ".$_SESSION['usremp']['cl_nam'];?></p>
          <!-- Status -->
          <a href=""><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">MAIN</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="?user=cop"><i class="fa fa-link"></i> <span>My Complaints</span></a></li>
		<li class="active"><a href="?user=resp"><i class="fa fa-link"></i> <span>My Responses</span></a></li>
        <li><a href="?user=sugge"><i class="fa fa-link"></i> <span>My Suggestion</span></a></li>
		 <?php		 
		 if($_SESSION['usremp']['usr_leve']=='KOTSA'||$_SESSION['usremp']['usr_leve']=='STAGE GUIDE' ){ ?>
		<li><a href="?user=add_r"><i class="fa fa-link"></i> <span>Add Responses</span></a></li>
         <?php } ?>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        USER DASHBORD
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="?empl=r"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
				
				 <?php 

	$page=$_GET['user'];


 switch ($page){
 
 
			
			case "cop":
			my_comp();
			break;
			
			case "resp":
			Vresp();
			break;
			
			case "sugge":
			sgge();
			break;
			
			case "add_r":
			addresp();
			break;
			
			
		default:
		Vresp();
		break;
}




?>
		

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>

 
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    
  });
</script>
</body>
</html>


		
<?php  function sgge(){ ?>


   <div class="row">
      <?php

$user_ids =$_SESSION['usremp']['cl_id'];
$hval = 0;
$stlevel="";
$button_text = "SAVE";
if(isset($_POST['save_sgg'])){
$clt_sgg=strtoupper($_POST["clt_sgg"]);
//$user_id=strtoupper($_POST["user_id"]);
if($_POST['hdnSpid'] == '0'){

$sql="INSERT INTO suggestion (sgg_user,	sgg_quest) VALUES ('$user_ids','$clt_sgg')";	

mysql_query($sql);
mysql_close();

header("Location: user.php?user=sugge");
}
else{

$sql_update="UPDATE suggestion set sgg_quest = '$clt_sgg' where sgg_id= '" . (int)$_POST['hdnSpid'] . "'";	
mysql_query($sql_update);
mysql_close();

header("Location: user.php?user=sugge");

}


}

?>
  
		
		<div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Suggestions</h3>
            </div>
            <!-- /.box-header -->
		
			


				<form role="form" method="post">
              <div class="box-body">
                
				
				
				<div class="form-group">
                  <label for="passwd">Your Suggestion</label>
                  <textarea type="text" class="form-control"  id="clt_sgg"  name="clt_sgg" required placeholder=""></textarea> 
                </div>
				
				
                                
              </div>
			  
			   <input type="hidden" name="hdnSpid" value="<?php echo $hval; ?>"/>
			     <input type="hidden" name="user_id" value="6"/>
              
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="save_sgg">SAVE SUGGESTION</button>
              </div>
            </form>
          </div>
		  
		   </div>


<?php



?>
  
		
		<div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> List Suggestions</h3>
            </div>
            <!-- /.box-header -->
		
			



           
			<div class="box-body">
                 <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
					<th>Suggestion </th>
					<th>Implementation</th>  
				   <th>Date</th>                 
                  <!--th>Action</th-->
                </tr>
                </thead>
                <tbody>
<?php   $query = "SELECT * FROM suggestion WHERE sgg_user =$user_ids";

$result = mysql_query($query) or die (mysql_error());
while ($row = mysql_fetch_array($result)) {?>
				
                <tr>
                  <td><?php  echo $row['sgg_quest'];?></td>                  
				  <td><?php  echo $row['sgg_status'];?></td>
                  <td><?php  echo $row['sgg_date'];?></td>
				  
				  <!--td><a href="" class="small-box-footer"> <i class="ion-ios-plus"></i></a><a href="?<?php  echo $row['sgg_id'];?>" class="small-box-footer"> <i class="ion-edit"></i></a></td-->
                </tr>
               			
			<?php	}?>
                </tbody>
              
              </table>
            </div>
          </div>
		  
		   </div>
	  </div>
	  
	  
	  
 <?php  } ?>
 
 
 
 
 
 
 
 		
<?php  function my_comp(){ ?>



<?php

$user_ids =$_SESSION['usremp']['cl_id'];

$hval = 0;
$stlevel="";
$button_text = "SAVE";
if(isset($_POST['save_compl'])){
$comp_typ=strtoupper($_POST["comp_typ"]);
$com_quest=strtoupper($_POST["comp_na"]);
//$user_id=strtoupper($_POST["user_id"]);
if($_POST['hdnSpid'] == '0'){

$sql="INSERT INTO complaints (com_user,com_type,com_quest) VALUES ('$user_ids','$comp_typ','$com_quest')";	

mysql_query($sql);
mysql_close();

header("Location: user.php?user=cop");
}
else{

$sql_update="UPDATE complaints set st_name = '$com_quest' where com_id= '" . (int)$_POST['hdnSpid'] . "'";	
mysql_query($sql_update);
mysql_close();

header("Location: user.php?user=cop");

}


}


  ?>
   <div class="row">
          <div class="col-md-6">
          <!-- Horizontal Form -->
                   <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Complaints</h3>
            </div>
            <!-- /.box-header -->

            <!-- form start -->
            <form role="form" method="post">
              <div class="box-body">
                
				 <div class="form-group">
                  <label for="stage">Complaint Type</label>
				  <select   id="comp_typ"  name="comp_typ" class="form-control">
				    <option value="">--select--</option>
				  <?php          
						$result = mysql_query("SELECT * FROM complain_types ");
						while($row = mysql_fetch_array($result))
						{
				?>
					  <option value="<?php echo $row['cop_id'] ;?>"><?php echo $row['cop_type'] ;?></option>
					 
					    <?php  }?>
					</select>
				</div>
				
				<div class="form-group">
                  <label for="passwd">Your Complain</label>
                  <textarea type="text" class="form-control"  id="comp_na"  name="comp_na" value="" required placeholder=""></textarea>
                </div>
				
				
                                
              </div>
			  
			   <input type="hidden" name="hdnSpid" value="<?php echo $hval; ?>"/>
			   <input type="hidden" name="user_id" value="6"/>
             
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="save_compl">SAVE COMPLAINT</button>
              </div>
            </form>
			
          </div>
        </div>
        <!--/.col (right) -->



  
		
			
		<div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> Your Complaint List</h3>
            </div>
            <!-- /.box-header -->
		
			



<?php          
$result = mysql_query("SELECT *FROM complaints WHERE com_user =$user_ids ORDER BY com_status DESC");?>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <!--th>Person</th>
                  <th>Stage</th-->
                  <th>Complaint</th>
                  <th>Response Status</th>
				  <th>Date Responded</th>
                  <!--th>Action</th-->
                </tr>
                </thead>
                <tbody>
				
<?php while($row = mysql_fetch_array($result))
  {?>
                <tr>
                  
                  <td><?php  echo $row['com_quest'] ;?></td>
                  <td><?php  echo $row['com_status'] ;?></td>
				  <td><?php  echo  date('M j Y g:i A', strtotime($row['com_date'])) ;?></td>
                  <!--td><a href="admin.php?page=aemp&editc=<?php  echo $row['cl_id'];?>" class="small-box-footer"> <i class="ion-edit"></i></a><a href="?<?php  echo $row['cl_id'];?>" class="small-box-footer"> <i class="ion-ios-plus"></i></a></td-->
                </tr>
              <?php  }?>
				
			
				
                </tbody>
              
              </table>
            </div>
          </div>
		  
		   </div>
	  </div>
	  
	  
	  
 <?php  } ?>
		



		
		
		
<?php  function Vresp(){ 

$user_ids =$_SESSION['usremp']['cl_id'];
?>
		
		
		
		 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Your Responses</h3>
            </div>
            <!-- /.box-header -->
            
<?php          
$result = mysql_query("Select
  com_response.*,
  complaints.*,
  complaints.com_user As com_user1
From
  com_response Inner Join
  complaints
    On com_response.com_cop_id = complaints.com_id
Where
  complaints.com_user =$user_ids");?>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <!--th>Person</th>
                  <th>Stage</th-->
                  <th>Complaint</th>
                  <th>Response</th>
				  <th>Date Responded</th>
                  <!--th>Action</th-->
                </tr>
                </thead>
                <tbody>
				
<?php while($row = mysql_fetch_array($result))
  {?>
                <tr>
                  <!--td><?php  echo $row['cl_nam'] ;?></td>
                  <td><?php  echo $row['st_name'] ;?></td-->
                  <td><?php  echo $row['com_quest'] ;?></td>
                  <td><?php  echo $row['com_rans'] ;?></td>
				  <td><?php  echo  date('M j Y g:i A', strtotime($row['com_rdate'])) ;?></td>
                  <!--td><a href="admin.php?page=aemp&editc=<?php  echo $row['cl_id'];?>" class="small-box-footer"> <i class="ion-edit"></i></a><a href="?<?php  echo $row['cl_id'];?>" class="small-box-footer"> <i class="ion-ios-plus"></i></a></td-->
                </tr>
              <?php  }?>
				
			
				
                </tbody>
              
              </table>
            </div>
            <!-- /.box-body -->
          </div>
		
		
<?php  } ?>




			
		
<?php  function addresp(){ ?>



<?php

$user_ids =$_SESSION['usremp']['cl_id'];
$hval = 0;
$stlevel="";
$button_text = "SAVE";
if(isset($_POST['save_compl_R'])){
$com_cop_id=strtoupper($_POST["comp_typ"]);
$com_rans=strtoupper($_POST["comp_na"]);
if($_POST['hdnSpid'] == '0'){

$sql="INSERT INTO com_response (com_rans,com_cop_id) VALUES ('$com_rans','$com_cop_id')";
mysql_query($sql);	
$sql_update="UPDATE complaints set com_status = 'YES' where com_id=$com_cop_id";	
mysql_query($sql_update);


mysql_close();

header("Location: user.php?user=add_r");
}
else{

$sql_update="UPDATE com_response set com_rans = '$com_rans' where com_rid= '" . (int)$_POST['hdnSpid'] . "'";	
mysql_query($sql_update);
mysql_close();

header("Location: user.php?user=add_r");

}


}


  ?>
   <div class="row">
          <div class="col-md-6">
          <!-- Horizontal Form -->
                   <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Responses</h3>
            </div>
            <!-- /.box-header -->

            <!-- form start -->
            <form role="form" method="post">
              <div class="box-body">
                
				 <div class="form-group">
                  <label for="stage">Select Complaint</label>
				  <select   id="comp_typ"  name="comp_typ" class="form-control">
				    <option value="">--select--</option>
				  <?php          
$result = mysql_query("Select   complaints.*,  clients.cl_stag, clients.cl_leve, stages.st_name, user_levels.usr_leve
From  complaints Inner Join   clients    On complaints.com_user = clients.cl_id Inner Join
  stages  On clients.cl_stag = stages.st_id Inner Join  user_levels   On clients.cl_leve = user_levels.usr_id
Where   clients.cl_stag = '".$_SESSION['usremp']['cl_stag']."' AND usr_leve = 'STAGE GUIDE' or usr_leve = 'KOSA' ORDER BY com_status ASC ");
						while($row = mysql_fetch_array($result))
						{
				?>
					  <option value="<?php echo $row['com_id'] ;?>"><?php echo $row['com_quest'] ;?></option>
					 
					    <?php  }?>
					</select>
				</div>
				
				<div class="form-group">
                  <label for="passwd">Your Response</label>
                  <textarea type="text" class="form-control"  id="comp_na"  name="comp_na" value="" required placeholder=""></textarea>
                </div>
				
				
                                
              </div>
			  
			   <input type="hidden" name="hdnSpid" value="<?php echo $hval; ?>"/>
			  
             
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="save_compl_R">SAVE RESPONSE</button>
              </div>
            </form>
			
          </div>
        </div>
        <!--/.col (right) -->


<?php



?>
  
		
		<div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> List Responses</h3>
            </div>
            <!-- /.box-header -->
		
			



<?php          
$result = mysql_query("Select
  com_response.com_rans,
  com_response.com_rdate
  
From
  com_response Inner Join
  complaints
    On com_response.com_cop_id = complaints.com_id
Where
  complaints.com_user = $user_ids");?>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <!--th>Person</th>
                  <th>Stage</th>
                  <th>Complaint</th-->
                  <th>Response</th>
				  <th>Date Responded</th>
                  <!--th>Action</th-->
                </tr>
                </thead>
                <tbody>
				
<?php while($row = mysql_fetch_array($result))
  {?>
                <tr>
                 
                  <td><?php  echo $row['com_rans'] ;?></td>
				  <td><?php  echo date('M j Y g:i A', strtotime($row['com_rdate'])) ;?></td>
                  <!--td><a href="admin.php?page=aemp&editc=<?php  echo $row['cl_id'];?>" class="small-box-footer"> <i class="ion-edit"></i></a><a href="?<?php  echo $row['cl_id'];?>" class="small-box-footer"> <i class="ion-ios-plus"></i></a></td-->
                </tr>
              <?php  }?>
				
			
				
                </tbody>
              
              </table>
            </div>
          </div>
		  
		   </div>
	  </div>
	  
	  
	  
 <?php  } ?>
		
		
					

		
		
		
		