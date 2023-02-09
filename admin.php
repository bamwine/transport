<?php
session_start();

if(!isset($_SESSION['useradmin']))
	{
		header("location:index.php");
	}

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
 
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

  
</head>
<?php  include('connect.php');?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

        <!-- Logo -->
    <a href="admin.php" class="logo">
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
              <span class="hidden-xs"><?php echo"  ".strtolower($_SESSION['useradmin']['adm_name']);?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo"  ".strtoupper($_SESSION['useradmin']['adm_name']);?>- Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
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
          <p><?php echo"  ".strtoupper($_SESSION['useradmin']['adm_name']);?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
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
        <li class="header">DASHBORD</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="admin.php?page=aemp"><i class="fa fa-link"></i> <span>Add members</span></a></li>
        <li><a href="admin.php?page=vemp"><i class="fa fa-link"></i> <span>View Complaints</span></a></li>
		<li><a href="admin.php?page=add_comp"><i class="fa fa-link"></i> <span>Add Complaints</span></a></li>
		<li><a href="admin.php?page=add_resp"><i class="fa fa-link"></i> <span>Response</span></a></li>
        
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
        ADMIN DASHBOARD
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin.php?page=ds"><i class="fa fa-dashboard"></i> Dash</a></li>
        <li class="active">home</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

	  
	  				 <?php 

	$page=$_GET['page'];


 switch ($page){
 
 
			
			case "dash":
			dash_b();
			break;
			
			case "aemp":
			add_client();
			break;
			
			case "vemp":
			viewep();
			break;
			
			case "add_comp":
			addep();
			break;
			
			
			case "add_resp":
			addresp();
			break;
			
			
			case "repot":
			reports();
			break;
			
		default:
		dash_b();
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


  <?php  function dash_b(){ ?>
  
  <?php 

$result_coun = mysql_query("SELECT Count( * ) AS toto FROM clients");
if($nopple = mysql_fetch_array($result_coun)){
	$Members = $nopple['toto'];
}


$result_coun = mysql_query("Select  Count(com_id) As toto From  complaints");
if($nopple = mysql_fetch_array($result_coun)){
	$complaints = $nopple['toto'];
}

  ?>
  
  <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $Members; ?></h3>

              <p>Registed Members</p>
            </div>
            <div class="icon">
			<img height="80" width="80" src="img/rented.png"></a>
             
            </div>
            <a href="admin.php?page=aemp" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
       
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $complaints; ?></h3>

              <p>List Of Complaits</p>
            </div>
            <div class="icon">
             <img height="80" width="80" src="img/room.png"></a>
            </div>
            <a href="admin.php?page=vemp" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
		
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>&nbsp;</h3>

              <p>Reports</p>
            </div>
            <div class="icon">
             <img height="80" width="80" src="img/report.png"></a>
            </div>
            <a href="admin.php?page=repot" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
       
      </div>
      <!-- /.row -->
  <div class="row">
   <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Manage Levels</h3>
            </div>
            <!-- /.box-header -->
			
			<table class="table">
			<?php          
$result = mysql_query("SELECT * FROM user_levels ORDER BY usr_id ASC");
while($row = mysql_fetch_array($result))
  {
?>       		<tr>
                  <td><?php echo $row['usr_leve']; ?></td>                  
                  <td><span class="badge bg-red"><a href="admin.php?page=ds&levid=<?php echo $row['usr_id']; ?>" class="small-box-footer">Edit </a></span></td>
				  
                </tr>
				<?php  }
					?>
			</table>
<?php


$hval = 0;
$level="";
$button_text = "SAVE";
if(isset($_POST['addlevel'])){
$values=strtoupper($_POST["leveln"]);
if($_POST['hdnSpid'] == '0'){

$sql="INSERT INTO user_levels (usr_leve) VALUES ('$values')";	

mysql_query($sql);
mysql_close();

header("Location: admin.php?page=ds");
}
else{

$sql_update="UPDATE user_levels set usr_leve = '$values' where usr_id= '" . (int)$_POST['hdnSpid'] . "'";	
mysql_query($sql_update);
mysql_close();

header("Location: admin.php?page=ds");

}


}


if(isset($_GET['levid']) && $_GET['levid'] != ''){
$ids =$_GET['levid'];
$result_location = mysql_query("SELECT * FROM user_levels where usr_id= $ids");
if($row = mysql_fetch_array($result_location)){
$level = $row['usr_leve'];
$button_text = "UPDATE";
$hval = $row['usr_id'];
}

}	
?>
            <!-- form start -->
            <form role="form" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Level Name</label>
                  <input type="text" class="form-control" value="<?php echo $level;?>" id="leveln"  name="leveln" required placeholder="Level">
                </div>
                                
              </div>
              <!-- /.box-body -->
				 <input type="hidden" name="hdnSpid" value="<?php echo $hval; ?>"/>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="addlevel"><?php echo $button_text; ?></button>
              </div>
            </form>
			
          </div>
		  
		   <!-- /////////////////////////////////////////////////////////////////// -->
		  
		   <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Complaint Types</h3>
            </div>
            <!-- /.box-header -->
			
			<table class="table">
			<?php          
$result = mysql_query("SELECT * FROM complain_types ORDER BY cop_id ASC");
while($row = mysql_fetch_array($result))
  {
?>       		<tr>
                  <td><?php echo $row['cop_type']; ?></td>                  
                  <td><span class="badge bg-red"><a href="admin.php?page=ds&copid=<?php echo $row['cop_id']; ?>" class="small-box-footer">Edit </a></span></td>
				  
                </tr>
				<?php  }
					?>
			</table>
<?php


$hval = 0;
$coptyp="";
$button_text = "SAVE";
if(isset($_POST['addcop'])){
$values=strtoupper($_POST["complain"]);
if($_POST['hdnSpid'] == '0'){

$sql="INSERT INTO complain_types (cop_type) VALUES ('$values')";	

mysql_query($sql);
mysql_close();

header("Location: admin.php?page=ds");
}
else{

$sql_update="UPDATE complain_types set cop_type = '$values' where cop_id= '" . (int)$_POST['hdnSpid'] . "'";	
mysql_query($sql_update);
mysql_close();

header("Location: admin.php?page=ds");

}


}


if(isset($_GET['copid']) && $_GET['copid'] != ''){
$ids =$_GET['copid'];
$result_location = mysql_query("SELECT * FROM complain_types where cop_id= $ids");
if($row = mysql_fetch_array($result_location)){
$coptyp = $row['cop_type'];
$button_text = "UPDATE";
$hval = $row['cop_id'];
}

}	
?>
            <!-- form start -->
            <form role="form" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Complaint Type</label>
                  <input type="text" class="form-control" value="<?php echo $coptyp;?>" id="complain"  name="complain" required placeholder="Level">
                </div>
                                
              </div>
              <!-- /.box-body -->
				 <input type="hidden" name="hdnSpid" value="<?php echo $hval; ?>"/>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="addcop"><?php echo $button_text; ?></button>
              </div>
            </form>
			
          </div>
		  
		  </div>
          <!-- /.box -->
          <!-- right column -->
        <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Manage Stages</h3>
            </div>
            <!-- /.box-header -->
			<table class="table">
										<?php          
				$result = mysql_query("SELECT * FROM stages");
				while($row = mysql_fetch_array($result))
				  {
				?>  
                <tr>
                  <td><?php echo $row['st_name']; ?></td>                  
                  <td><span class="badge bg-red"><a href="admin.php?page=ds&stgid=<?php echo $row['st_id']; ?>" class="small-box-footer">Edit </a></span></td>
				  
                </tr>
				<?php   } ?>
			</table>
			
<?php


$hval = 0;
$stlevel="";
$button_text = "SAVE";
if(isset($_POST['addstg'])){
$values=strtoupper($_POST["stgname"]);
if($_POST['hdnSpid'] == '0'){

$sql="INSERT INTO stages (st_name) VALUES ('$values')";	

mysql_query($sql);
mysql_close();

header("Location: admin.php?page=ds");
}
else{

$sql_update="UPDATE stages set st_name = '$values' where st_id= '" . (int)$_POST['hdnSpid'] . "'";	
mysql_query($sql_update);
mysql_close();

header("Location: admin.php?page=ds");

}


}


if(isset($_GET['stgid']) && $_GET['stgid'] != ''){
$ids =$_GET['stgid'];
$result_location = mysql_query("SELECT * FROM stages where st_id= $ids");
if($row = mysql_fetch_array($result_location)){
$stlevel = $row['st_name'];
$button_text = "UPDATE";
$hval = $row['st_id'];
}

}	
?>

            <!-- form start -->
            <form class="form-horizontal" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Stage </label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="stgname" name="stgname"  value="<?php echo $stlevel;?>" placeholder="Stage Name">
                  </div>
                </div>
                
                 <input type="hidden" name="hdnSpid" value="<?php echo $hval; ?>"/>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <!--button type="submit" class="btn btn-default">Cancel</button-->
                <button type="submit" class="btn btn-info pull-right" name="addstg"><?php echo $button_text; ?></button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
		  
		   </div>
   </div>
  
    <?php  } ?>
	
	
	
	
	
	
	  <?php  function viewep(){ ?>
	  
	  
	     <div class="box">
            <div class="box-header">
              <h3 class="box-title">List Of Complaints</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Complaint </th>
				   <th>Complaint Type</th>
				   <th>By </th>                 
				   <th>Stage</th>
                  <th>Date</th>
				   <th>Response Status</th>
                  <!--th>Action</th-->
                </tr>
                </thead>
                <tbody>
<?php   $query = "Select   complaints.*,  complain_types.*,  clients.*,   stages.* From   complaints Inner Join   complain_types     On complaints.com_type = complain_types.cop_id Inner Join
  clients    On complaints.com_user = clients.cl_id Inner Join   stages    On clients.cl_stag = stages.st_id ";

$result = mysql_query($query) or die (mysql_error());
while ($row = mysql_fetch_array($result)) {?>
				
                <tr>
                  <td><?php  echo $row['com_quest'];?></td>
                  <td><?php  echo $row['cop_type'];?></td>
                  <td><?php  echo $row['cl_nam'];?></td>
                 
                  <td><?php  echo $row['st_name'];?></td>
                  <td><?php  echo $row['com_date'];?></td>
				  <td><?php  echo $row['com_status'];?></td>
				  <!--td><a href="" class="small-box-footer"  title="add Response" > <i class="ion-ios-plus"></i></a><a href="?<?php  echo $row['com_id'];?>" class="small-box-footer"> <i class="ion-edit"></i></a></td-->
                </tr>
               			
			<?php	} ?>
                </tbody>
              
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
	  
	     <div class="box">
            <div class="box-header">
              <h3 class="box-title">Suggestions</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Suggestion </th>				  
				   <th>By </th>                 
				   <th>Date</th>                 
                  <!--th>Action</th-->
                </tr>
                </thead>
                <tbody>
<?php   $query = "Select   suggestion.*,   clients.* From   suggestion Inner Join  clients    On suggestion.sgg_user = clients.cl_id";

$result = mysql_query($query) or die (mysql_error());
while ($row = mysql_fetch_array($result)) {?>
				
                <tr>
                  <td><?php  echo $row['sgg_quest'];?></td>
                  <td><?php  echo $row['cl_nam'];?></td>
                  <td><?php  echo $row['sgg_date'];?></td>
				  
				  <!--td><a href="" class="small-box-footer"> <i class="ion-ios-plus"></i></a><a href="?<?php  echo $row['sgg_id'];?>" class="small-box-footer"> <i class="ion-edit"></i></a></td-->
                </tr>
               			
			<?php	}?>
                </tbody>
              
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
	  
	    <?php  } ?>
		
		
<?php  
function getlast_clt(){

$sql ="SELECT * FROM clients ORDER BY cl_id DESC LIMIT 1";

$runs = mysql_query($sql);    
 while($rowss = mysql_fetch_array($runs)){
 $usr_id =$rowss['cl_id'] ;
 }
return $usr_id ;
}

?>		
		

		
<?php  function addep(){ ?>



<?php

$user_id = getlast_clt();
$hval = 0;
$stlevel="";
$button_text = "SAVE";
if(isset($_POST['save_compl'])){
$comp_typ=strtoupper($_POST["comp_typ"]);
$com_quest=strtoupper($_POST["comp_na"]);
//$user_id=strtoupper($_POST["user_id"]);
if($_POST['hdnSpid'] == '0'){

$sql="INSERT INTO complaints (com_user,com_type,com_quest) VALUES ('$user_id','$comp_typ','$com_quest')";	

mysql_query($sql);
mysql_close();

header("Location: admin.php?page=vemp");
}
else{

$sql_update="UPDATE complaints set st_name = '$com_quest' where com_id= '" . (int)$_POST['hdnSpid'] . "'";	
mysql_query($sql_update);
mysql_close();

header("Location: admin.php?page=ds");

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


<?php

$user_id =getlast_clt();
$hval = 0;
$stlevel="";
$button_text = "SAVE";
if(isset($_POST['save_sgg'])){
$clt_sgg=strtoupper($_POST["clt_sgg"]);
//$user_id=strtoupper($_POST["user_id"]);
if($_POST['hdnSpid'] == '0'){

$sql="INSERT INTO suggestion (sgg_user,	sgg_quest) VALUES ('$user_id','$clt_sgg')";	

mysql_query($sql);
mysql_close();

header("Location: admin.php?page=vemp");
}
else{

$sql_update="UPDATE suggestion set st_name = '$values' where st_id= '" . (int)$_POST['hdnSpid'] . "'";	
mysql_query($sql_update);
mysql_close();

header("Location: admin.php?page=ds");

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
	  </div>
	  
	  
	  
 <?php  } ?>
		
		
		
		
		



  <?php  function add_client(){ ?>
  
  

      <!-- /.row -->
  <div class="row">
   <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Clients</h3>
            </div>
            <!-- /.box-header -->
			

<?php

$hval=0;
$cl_nam ="";
$cl_tep ="";
$cl_paswd ="";
$cl_usna ="";
$cl_stag ="";
$cl_leve ="";
$car_no="";
if(isset($_POST['save_clt'])){

$cname=strtoupper($_POST["cname"]);
$phone=strtoupper($_POST["phone"]);
$stage=strtoupper($_POST["stage"]);
$passwd=$_POST["passwd"];
$usern=$_POST["usern"];
$clevel=strtoupper($_POST["clevel"]);
$or_clevel=strtoupper($_POST["or_clevel"]);
$car_no=strtoupper($_POST["car_no"]);
$hval_id=$_POST['hdnSpid'];

if($_POST['hdnSpid'] == '0'){

$chectstg = "Select  * From   stages Where  st_name ='$stage' ";
 $run_check_stg = mysql_query($chectstg);    
 $count_row1 = mysql_num_rows($run_check_stg);
 
 $checklve = "Select  * From   user_levels Where  usr_leve ='$clevel' ";
 $run_check_lev = mysql_query($checklve);    
 while($rowss = mysql_fetch_array($run_check_lev)){
 $leve_id =$rowss['usr_id'] ;
 }
 
 /*
  if($count_row1==0){
$sql="INSERT INTO stages (st_name) VALUES ('$other_stg')";	
mysql_query($sql);
$stg_id = mysql_insert_id();

    }else {
	
	while($rowss = mysql_fetch_array($run_check_stg)){
 $stg_id =$rowss['st_id'] ;
 }
	
	} 
	
	
if($count_row2==0){
	$sql="INSERT INTO user_levels (usr_leve) VALUES ('$clevel')";	
mysql_query($sql);
$leve_id = mysql_insert_id();
	
	} else {while($rowss = mysql_fetch_array($run_check_lev)){
 $leve_id =$rowss['usr_id'] ;
 }}
*/

if (empty($_POST['stage'])&& empty($_POST['other_stg'])) {
$sql="SELECT * FROM stages ORDER BY st_id DESC LIMIT 1"; 
$run= mysql_query($sql);
while($rowss = mysql_fetch_array($run)){
 $stg_id =$rowss['st_id'] ;
 }


}


if (!empty($_POST['stage'])&& empty($_POST['other_stg'])) {
$hold=$_POST['stage'];
$stg_id =$hold;
}


if (!empty($_POST['other_stg'])&& empty($_POST['stage'])) {
$hold=strtoupper($_POST['other_stg']);
$sql="INSERT INTO stages (st_name) VALUES ('$hold')";	
mysql_query($sql);
$stg_id = mysql_insert_id();}


if (!empty($_POST['stage'])&& !empty($_POST['other_stg'])) {
$hold=strtoupper($_POST['other_stg']);
$sql="INSERT INTO stages (st_name) VALUES ('$hold')";	
mysql_query($sql);
$stg_id = mysql_insert_id();}



$sql="INSERT INTO clients (cl_nam,cl_tep,cl_stag,cl_leve,cl_paswd,cl_usna,cl_date,cl_car_no)
                   VALUES ('$cname','$phone','$stg_id','$leve_id','$passwd','$usern',now(),'$car_no')";	

mysql_query($sql);
mysql_close();
//}
header("Location: admin.php?page=aemp");
}
else{


$checklve = "Select  * From   user_levels Where  usr_leve ='$clevel' ";
 $run_check_lev = mysql_query($checklve);    
 while($rowss = mysql_fetch_array($run_check_lev)){
 $leve_id =$rowss['usr_id'] ;
 }

$sql_update2="UPDATE  clients SET cl_nam = '$cname', cl_tep = '$phone',cl_paswd = '$passwd',cl_usna = '$usern',cl_stag = '$stage',cl_leve = '$or_clevel' WHERE cl_id = $hval_id";	
	
mysql_query($sql_update2);
mysql_close();

header("Location: admin.php?page=aemp");

}

}	


if(isset($_GET['editc']) && $_GET['editc'] != ''){
$ids =$_GET['editc'];
$result_location = mysql_query("SELECT * FROM clients where cl_id= $ids");
if($row = mysql_fetch_array($result_location)){
$cl_nam = $row['cl_nam'];
$cl_tep = $row['cl_tep'];
$cl_paswd = $row['cl_paswd'];
$cl_usna = $row['cl_usna'];
$cl_stag = $row['cl_stag'];
$cl_leve = $row['cl_leve'];
$button_text = "UPDATE";
$hval = $row['cl_id'];
$car_no= $row['cl_car_no'];
}

}


?>
            <!-- form start -->
            <form role="form" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="cname">Client Name</label>
                  <input type="text" class="form-control"  id="cname"  name="cname" value="<?php echo $cl_nam;?>" required placeholder="Name">
                </div>
				
				 <div class="form-group">
                  <label for="phone">Telephone</label>
                  <input type="text" class="form-control"  id="phone"  name="phone" value="<?php echo $cl_tep;?>" required placeholder="0789">
                </div>
				
				 <div class="form-group">
                  <label for="stage">Work Stage</label>
				  <select id="ddlViewBy"  id="stage"  name="stage" class="form-control">
				    <option value="">--select--</option>
				  <?php          
						$result = mysql_query("SELECT * FROM stages ");
						while($row = mysql_fetch_array($result))
						{
				?>
					  <option value="<?php echo $row['st_id'] ;?>"><?php echo $row['st_name'] ;?></option>
					 
					    <?php  }?>
					</select>
				</div>
				
			
				<div class="form-group">
                  <label for="other_stg">Other stages specify</label>
                  <input type="text" class="form-control"  id="other_stg"  name="other_stg"   placeholder="">
                </div>
				
				
				
				<div class="form-group">
                  <label for="car_no">Car Number</label>
                  <input type="text" class="form-control"  id="car_no"  name="car_no" value=" <?php echo $car_no; ?>"  placeholder="UGA 222">
                </div>
				
				
				 <div class="form-group">
                  <label for="passwd">Password</label>
                  <input type="password" class="form-control"  id="passwd"  name="passwd" value="<?php echo $cl_paswd;?>" required placeholder="">
                </div>
				
				 <div class="form-group">
                  <label for="usern">UserName</label>
                  <input type="text" class="form-control"  id="usern"  name="usern" value="<?php echo $cl_usna;?>" required placeholder="">
                </div>
				
				 <div class="form-group">
                  <label for="stage">Level</label>
				  <select id="ddlViewBy"  id="or_clevel"  name="or_clevel" class="form-control">
				    <option value="">--select--</option>
				  <?php          
						$result = mysql_query("SELECT * FROM user_levels ");
						while($row = mysql_fetch_array($result))
						{
				?>
					  <option value="<?php echo $row['usr_id'] ;?>"><?php echo $row['usr_leve'] ;?></option>
					 
					    <?php  }?>
					</select>
				</div>
				
				
                  <input type="hidden" class="form-control"  id="clevel"  name="clevel" value="LOWER" readonly required placeholder="">
               
                                
              </div>
			  
			   <input type="hidden" name="hdnSpid" value="<?php echo $hval; ?>"/>
              <!-- /.box-body 
				 <input type="hidden" name="hdnSpid" value="<?php //echo $hval; ?>"/>-->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="save_clt">SAVE DATA</button>
              </div>
            </form>
			
          </div>
		  
		   <!-- /////////////////////////////////////////////////////////////////// -->
		  
		  
		  </div>
          <!-- /.box -->
          <!-- right column -->
        <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Client List</h3>
            </div>
            <!-- /.box-header -->
		
			



<?php          
$result = mysql_query("Select  clients.*,   user_levels.*,   stages.* From   clients Inner Join   user_levels   On clients.cl_leve = user_levels.usr_id Inner Join
stages  On clients.cl_stag = stages.st_id");?>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Telephone</th>
				  <th>Car No</th>
                  <th>Level</th>
                  <th>Stage</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				
<?php while($row = mysql_fetch_array($result))
  {?>
                <tr>
                  <td><?php  echo $row['cl_nam'] ;?></td>
                  <td><?php  echo $row['cl_tep'] ;?></td>
				   <td><?php  echo $row['cl_car_no'] ;?></td>
                  <td><?php  echo $row['usr_leve'] ;?></td>
                  <td><?php  echo $row['st_name'] ;?></td>
                  <td><a href="admin.php?page=aemp&editc=<?php  echo $row['cl_id'];?>" class="small-box-footer"> <i class="ion-edit"></i></a><a href="?<?php  echo $row['cl_id'];?>" class="small-box-footer"> <i class="ion-ios-plus"></i></a></td>
                </tr>
              <?php  }?>
				
			
				
                </tbody>
              
              </table>
            </div>
          </div>
		  
		   </div>
   </div>
  
    <?php  } ?>
			
			





			
		
<?php  function addresp(){ ?>



<?php


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

header("Location: admin.php?page=add_resp");
}
else{

$sql_update="UPDATE com_response set com_rans = '$com_rans' where com_rid= '" . (int)$_POST['hdnSpid'] . "'";	
mysql_query($sql_update);
mysql_close();

header("Location: admin.php?page=add_resp");

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
						$result = mysql_query("SELECT * FROM complaints Where  complaints.com_status = 'no' ORDER BY com_status ASC");
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
           
<?php          
$result = mysql_query("Select Distinct  com_response.*,  complaints.*,  clients.* ,stages.* From  com_response Inner Join   complaints
On com_response.com_cop_id = complaints.com_id Inner Join  clients   On complaints.com_user = clients.cl_id Inner Join  stages   On clients.cl_stag = stages.st_id");?>
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
				  <td><?php  echo $row['com_rdate'] ;?></td>
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
		
		
					




		
<?php  function reports(){ ?>



   <div class="row">
   
   <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3  class="box-title" style="text-decoration:underline;font-weight:bold;color:orange"> Complaint Status</h3>
            </div>
           

            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <!--th>Person</th>
                  <th>Stage</th-->
                  <th>Complaint Type</th>
                  <th>Total Cases</th>
				  
                  <!--th>Action</th-->
                </tr>
                </thead>
                <tbody>
				
<?php 

$result = mysql_query("Select   Count(*) As num_tt , complain_types.cop_type From  complaints Inner Join
  complain_types   On complaints.com_type = complain_types.cop_id Group By  complaints.com_type, complain_types.cop_type");
while($row = mysql_fetch_array($result))
  {?>
                <tr>
                  
                  <td><?php  echo $row['cop_type'] ;?></td>
				  <td><?php  echo $row['num_tt'] ;?></td>
                  <!--td><a href="admin.php?page=aemp&editc=<?php  echo $row['cl_id'];?>" class="small-box-footer"> <i class="ion-edit"></i></a><a href="?<?php  echo $row['cl_id'];?>" class="small-box-footer"> <i class="ion-ios-plus"></i></a></td-->
                </tr>
              <?php  }?>
				
			
				
                </tbody>
              
              </table>
            </div>
          </div>
		  
		   </div>
        <!--/.col (right) -->


		
		<div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title" style="text-decoration:underline;font-weight:bold;color:orange">Complaint Status Graph</h3>
            </div>
            <!-- /.box-header -->
		<div class="box-body">
		<table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <!--th>Person</th>
                  <th>Stage</th-->
                  <th>Complaint Type</th>
                  <th>Total Cases</th>
				  
                  <!--th>Action</th-->
                </tr>
                </thead>
                <tbody>
				
<?php 

$result = mysql_query("Select   Count(*) As num_tt , complain_types.cop_type From  complaints Inner Join
  complain_types   On complaints.com_type = complain_types.cop_id Group By  complaints.com_type, complain_types.cop_type");
while($row = mysql_fetch_array($result))
  {?>
                <tr>
                  
                  <td><?php  echo $row['cop_type'] ;?></td>
				  <td><?php  echo $row['num_tt'] ;?></td>
                  <!--td><a href="admin.php?page=aemp&editc=<?php  echo $row['cl_id'];?>" class="small-box-footer"> <i class="ion-edit"></i></a><a href="?<?php  echo $row['cl_id'];?>" class="small-box-footer"> <i class="ion-ios-plus"></i></a></td-->
                </tr>
              <?php  }?>
				
                </tbody>
              
              </table>
		</div>
		
			
			</div>		  
		   </div>
		   
	  </div>
	  
<!-- row 2   .....................................                      -->
	  
	  
   <div class="row">
   
   <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3  class="box-title" style="text-decoration:underline;font-weight:bold;color:orange"> Stage  Status Report</h3>
            </div>
           

            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <!--th>Person</th>
                  <th>Stage</th-->
                  <th>Stage Name</th>
                  <th>Total Cases</th>
				  
                  <!--th>Action</th-->
                </tr>
                </thead>
                <tbody>
				
<?php 

$result = mysql_query("Select  Count(complaints.com_id) As num_tt, stages.st_name From  complaints Inner Join  clients
    On complaints.com_user = clients.cl_id Inner Join  stages    On clients.cl_stag = stages.st_id
Group By   stages.st_name");
while($row = mysql_fetch_array($result))
  {?>
                <tr>
                  
                  <td><?php  echo $row['st_name'] ;?></td>
				  <td><?php  echo $row['num_tt'] ;?></td>
                  <!--td><a href="admin.php?page=aemp&editc=<?php  echo $row['cl_id'];?>" class="small-box-footer"> <i class="ion-edit"></i></a><a href="?<?php  echo $row['cl_id'];?>" class="small-box-footer"> <i class="ion-ios-plus"></i></a></td-->
                </tr>
              <?php  }?>
				
			
				
                </tbody>
              
              </table>
            </div>
          </div>
		  
		   </div>
        <!--/.col (right) -->


		
		<div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title" style="text-decoration:underline;font-weight:bold;color:orange">Stage  Status Graph</h3>
            </div>
            <!-- /.box-header -->
		<div class="box-body">
		<table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <!--th>Person</th>
                  <th>Stage</th-->
                  <th>Stage Number</th>
                  <th>Total Cases</th>
				  
                  <!--th>Action</th-->
                </tr>
                </thead>
                <tbody>
				
<?php 

$result = mysql_query("Select  Count(complaints.com_id) As num_tt, stages.st_name From  complaints Inner Join  clients
    On complaints.com_user = clients.cl_id Inner Join  stages    On clients.cl_stag = stages.st_id
Group By   stages.st_name");
while($row = mysql_fetch_array($result))
  {?>
                <tr>
                  
                  <td><?php  echo $row['st_name'] ;?></td>
				  <td><?php  echo $row['num_tt'] ;?></td>
                  <!--td><a href="admin.php?page=aemp&editc=<?php  echo $row['cl_id'];?>" class="small-box-footer"> <i class="ion-edit"></i></a><a href="?<?php  echo $row['cl_id'];?>" class="small-box-footer"> <i class="ion-ios-plus"></i></a></td-->
                </tr>
              <?php  }?>
				
                </tbody>
              
              </table>
		</div>
		
			
			</div>		  
		   </div>
		   
	  </div>
	  
	  
	  
	  
<!-- row 3   .....................................                      -->	  
	 




 <div class="row">
   
   <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3  class="box-title" style="text-decoration:underline;font-weight:bold;color:orange"> Respose  Status</h3>
            </div>
           

            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <!--th>Person</th>
                  <th>Stage</th-->
                  <th>Status</th>
                  <th>Total Cases</th>
				  
                  <!--th>Action</th-->
                </tr>
                </thead>
                <tbody>
				
<?php 
//include('connect.php');
$resultd = mysql_query("Select  Count(*) As num_tt,   complaints.com_status  From  complaints Group By  complaints.com_status");
while($row = mysql_fetch_array($resultd))
  {?>
                <tr>
                  
                  <td><?php  echo $row['com_status'] ;?></td>
				  <td><?php  echo $row['num_tt'] ;?></td>
                  <!--td><a href="admin.php?page=aemp&editc=<?php  echo $row['cl_id'];?>" class="small-box-footer"> <i class="ion-edit"></i></a><a href="?<?php  echo $row['cl_id'];?>" class="small-box-footer"> <i class="ion-ios-plus"></i></a></td-->
                </tr>
              <?php  }?>
				
			
				
                </tbody>
              
              </table>
            </div>
          </div>
		  
		   </div>
        <!--/.col (right) -->


		
		<div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title" style="text-decoration:underline;font-weight:bold;color:orange">Response Status Graph</h3>
            </div>
            <!-- /.box-header -->
		<div class="box-body">
		<table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <!--th>Person</th>
                  <th>Stage</th-->
                  <th>Status</th>
                  <th>Total Cases</th>
				  
                  <!--th>Action</th-->
                </tr>
                </thead>
                <tbody>
				
<?php 
//include('connect.php');
$resultd = mysql_query("Select  Count(*) As num_tt,   complaints.com_status  From  complaints Group By  complaints.com_status");
while($row = mysql_fetch_array($resultd))
  {?>
                <tr>
                  
                  <td><?php  echo $row['com_status'] ;?></td>
				  <td><?php  echo $row['num_tt'] ;?></td>
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
		
		
		
		

					
			
			
			
			
<div class="modal fade" role="dialog" id="user_profile" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="gridSystemModalLabel">Add Response</h4>
        </div>
        <div class="modal-body">
          
          <div class="form-group">
            <label class="control-label">Response:&nbsp;&nbsp;</label>
            <textarea type="text" class="form-control" id="respose" name="respose" ></textarea>
          </div>
          <!--div class="form-group">
            <label class="control-label">Email:&nbsp;&nbsp;</label>
            <input type="text" class="form-control" id="txtProfileEmail" name="txtProfileEmail" value="<?php echo $_SESSION['objLogin']['email']; ?>">
          </div-->
         
          
		</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" >Save</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
 			
		
		
		