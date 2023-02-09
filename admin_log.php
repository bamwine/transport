<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TRAS|login </title>
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

  
</head>
<?php  include('connect.php');?>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href=""><b>TRAS</b>EXPO</a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name">Administrator (KOTSA)</div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="dist/img/user1-128x128.jpg" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" method="post">
	<input type="hidden" class="form-control" placeholder="Username" value="Admin" name="usern">
      <div class="input-group">
        <input type="password" class="form-control" placeholder="password" name="paswd">

        <div class="input-group-btn">
          <button type="submit" name="login" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Enter your password to retrieve your session
  </div>
  <div class="text-center">
    <a href="index.php">Or sign in as a different user</a>
  </div>
  
</div>

<?php if(isset($_POST['login'])){

		
 $a = mysql_query("SELECT * FROM admin WHERE user_nad = '" .addslashes($_POST['usern']) . "' and adm_pass = '".$_POST['paswd']."'");
 $r=mysql_fetch_array($a); 
		
 if($r){
	session_start();
 $_SESSION['admin'] = $r['adm_id'];
  $_SESSION['useradmin'] = $r; 
 
header ("location: admin.php");
	}
	else {
		header ("location: index.php");
		}
} ?>
<!-- /.center -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
