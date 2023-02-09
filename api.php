<?php  include('connect.php');?>

<?php 

	$page=$_GET['user'];


 switch ($page){
 
			case "login":
			login();
			break;
			
			case "register":
			register();
			break;
			
			case "sugge":
			sgge();
			break;
			
			case "cop":
			my_comp();
			break;
			
			case "comp_typ":
			comp_typ();
			break;
			
			case "stages":
			stages();
			break;			
			
			case "user_comp":
			user_comp();
			break;
			
			case "user_sggt":
			user_sggt();
			break;
			
			case "user_respon":
			user_respon();
			break;
			
			case "user_comp_id":
			user_comp_id();
			break;
			
			case "add_reponse":
			add_reponse();
			break;
			
			
			
		default:
		//Vresp();
		break;
}




?>







<?php
function add_reponse(){	
?>


<?php
$response = array();
if (isset($_POST['com_cop_id']) && isset($_POST['com_rans']) ) 
  { 
    $com_cop_id = $_POST['com_cop_id'];
    $com_rans = $_POST['com_rans'];
   
	
    $result = mysql_query("INSERT INTO com_response (com_cop_id,com_rans) VALUES ('$com_cop_id','$com_rans')");
	$sql_update="UPDATE complaints set com_status = 'YES' where com_id=$com_cop_id";	
	mysql_query($sql_update);
	
    if ($result)
	{
	
	
	
	    $response["success"] = 1;
        $response["message"] = "Added successfully.";
        echo json_encode($response);
    } 
	else 
	{
        $response["success"] = 0;
        $response["message"] = "Please Enter some fileds.";
        echo json_encode($response);
    }
 
 }
 else 
 {
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
    echo json_encode($response);
} 
?>

<?php
}	
?>






<?php  function user_comp_id(){ ?>



<?php

$response = array();

$user_ids =$_GET["cl_id"];
$sql="Select  com_response.*,  complaints.*,  complaints.com_user As com_user1 From  com_response Inner Join  complaints   On com_response.com_cop_id = complaints.com_id Where   com_response.com_cop_id =$user_ids";
$result = mysql_query($sql) or die(mysql_error());

//$result = mysql_query("Select  com_response.*,  complaints.*,  complaints.com_user As com_user1 From  com_response Inner Join  complaints   On com_response.com_cop_id = complaints.com_id ") or die(mysql_error());

if (mysql_num_rows($result) > 0) {
  
   $response["user_resp"] = array();

    while ($row = mysql_fetch_array($result)) {
            // temp user array
            $item = array();
           
				//$item["cl_nam"]	   = $row["cl_nam"];
				//$item["st_name"] 	= $row["st_name"];				
				$item["com_quest"]	= $row["com_quest"];
				$item["com_rans"] 	= $row["com_rans"];
				$item["com_rdate"]	=   date('M j Y g:i A', strtotime($row['com_rdate']));
				
            // push ordered items into response array 
            array_push($response["user_resp"], $item);
           }
      // success
     $response["success"] = 1;
}
else {
    // order is empty 
      $response["success"] = 0;
      $response["message"] = "No data Yet";
}
// echoing JSON response
echo json_encode($response);
	
}
?>








<?php  function user_respon(){ ?>



<?php

$response = array();

$user_ids =$_GET["cl_id"];
$sql="Select  com_response.*,  complaints.*,  complaints.com_user As com_user1 From  com_response Inner Join  complaints   On com_response.com_cop_id = complaints.com_id Where   complaints.com_user =$user_ids";
$result = mysql_query($sql) or die(mysql_error());

//$result = mysql_query("Select  com_response.*,  complaints.*,  complaints.com_user As com_user1 From  com_response Inner Join  complaints   On com_response.com_cop_id = complaints.com_id ") or die(mysql_error());

if (mysql_num_rows($result) > 0) {
  
   $response["user_resp"] = array();

    while ($row = mysql_fetch_array($result)) {
            // temp user array
            $item = array();
           
				//$item["cl_nam"]	   = $row["cl_nam"];
				//$item["st_name"] 	= $row["st_name"];				
				$item["com_quest"]	= $row["com_quest"];
				$item["com_rans"] 	= $row["com_rans"];
				$item["com_rdate"]	=   date('M j Y g:i A', strtotime($row['com_rdate']));
				
            // push ordered items into response array 
            array_push($response["user_resp"], $item);
           }
      // success
     $response["success"] = 1;
}
else {
    // order is empty 
      $response["success"] = 0;
      $response["message"] = "No data Yet";
}
// echoing JSON response
echo json_encode($response);
	
}
?>









<?php  function user_sggt(){ ?>



<?php

$response = array();

$user_ids =$_GET["cl_id"];
$sql="SELECT * FROM suggestion WHERE sgg_user =$user_ids";
$result = mysql_query($sql) or die(mysql_error());
//$result = mysql_query("SELECT * FROM suggestion ") or die(mysql_error());

if (mysql_num_rows($result) > 0) {
  
   $response["user_sgg"] = array();

    while ($row = mysql_fetch_array($result)) {
            // temp user array
            $item = array();
           
				$item["sgg_quest"]		    = $row["sgg_quest"];
				$item["sgg_status"] 	= $row["sgg_status"];
				$item["com_date"]		 =   date('M j Y g:i A', strtotime($row['sgg_date']));
				
            // push ordered items into response array 
            array_push($response["user_sgg"], $item);
           }
      // success
     $response["success"] = 1;
}
else {
    // order is empty 
      $response["success"] = 0;
      $response["message"] = "No data Yet";
}
// echoing JSON response
echo json_encode($response);
	
}
?>









<?php  function user_comp(){ ?>



<?php

$response = array();
//if (isset($_GET['cl_id'])){


//}
$user_ids =$_GET["cl_id"];

$sql="SELECT *FROM complaints WHERE com_user =$user_ids ORDER BY com_status DESC";
$result = mysql_query($sql) or die(mysql_error());
//$result = mysql_query("SELECT *FROM complaints  ORDER BY com_status DESC ") or die(mysql_error());

if (mysql_num_rows($result) > 0) {
  
   $response["user_id"] = array();

    while ($row = mysql_fetch_array($result)) {
            // temp user array
            $item = array();
           
				$item["com_id"]		    = $row["com_id"];
				$item["com_quest"]		    = $row["com_quest"];
				$item["com_status"] 	= $row["com_status"];
				$item["com_date"]		 =   date('M j Y g:i A', strtotime($row['com_date']));
				
            // push ordered items into response array 
            array_push($response["user_id"], $item);
           }
      // success
     $response["success"] = 1;
}
else {
    // order is empty 
      $response["success"] = 0;
      $response["message"] = "No data Yet";
}
// echoing JSON response
echo json_encode($response);
	
}
?>



		
	



		

<?php
function comp_typ(){	
?>
<?php


$response = array();


$result = mysql_query("SELECT * FROM `complain_types` ORDER BY `cop_id`  DESC ") or die(mysql_error());

if (mysql_num_rows($result) > 0) {
  
    $response["comp_ty"] = array();

    while ($row = mysql_fetch_array($result)) {
            // temp user array
            $item = array();
           
				$item["id"]		    = $row["cop_id"];
				$item["comp_na"] 	= $row["cop_type"];
				
            // push ordered items into response array 
            array_push($response["comp_ty"], $item);
           }
      // success
     $response["success"] = 1;
}
else {
    // order is empty 
      $response["success"] = 0;
      $response["message"] = "No data Yet";
}
// echoing JSON response
echo json_encode($response);
	
}
?>		
		





<?php
function stages(){	
?>
<?php


$response = array();


$result = mysql_query("SELECT * FROM `stages` ORDER BY `st_id`  DESC ") or die(mysql_error());

if (mysql_num_rows($result) > 0) {
  
    $response["stage"] = array();

    while ($row = mysql_fetch_array($result)) {
            // temp user array
            $item = array();
           
				$item["id"]		    = $row["st_id"];
				$item["st_name"] 	= $row["st_name"];
				
            // push ordered items into response array 
            array_push($response["stage"], $item);
           }
      // success
     $response["success"] = 1;
}
else {
    // order is empty 
      $response["success"] = 0;
      $response["message"] = "No data Yet";
}
// echoing JSON response
echo json_encode($response);
	
}
?>		
		

		
		
		
		
		
 		
<?php  function my_comp(){ ?>



<?php

$response = array();

if (isset($_POST['comp_typ'])&& isset($_POST['comp_na'])&& isset($_POST['cl_id']) ) 
{  
$user_ids =$_POST["cl_id"];
$hold2 =$_POST["comp_typ"];

$chectstg = "Select  * From   complain_types Where  cop_type ='$hold2'";
 $run_check_stg = mysql_query($chectstg);    
 while($rowss = mysql_fetch_array($run_check_stg)){
 $hold =$rowss['cop_id'] ;
 }

 $comp_typ = $hold;
$com_quest=strtoupper($_POST["comp_na"]);
    
	$sql="INSERT INTO complaints (com_user,com_type,com_quest) VALUES ('$user_ids','$comp_typ','$com_quest')";	

	$result = mysql_query($sql);
    
    if ($result)
	{
        $response["success"] = 1;
        $response["message"] = "Information Added successfully.";
        echo json_encode($response);
    }
	else
	{
      $response["success"] = 0;
      $response["message"] = "Oops! An error occurred.";
      echo json_encode($response);  
    }
 }
 
 else 
 {
    $response["success"] = 0;
    $response["message"] = "Message   field(s) is Empty";
    echo json_encode($response);
 } 
?>




<?php

}
 ?>		
		



<?php
function sgge(){	
?>


<?php

$response = array();

if (isset($_POST['clt_sgg'])&& isset($_POST['cl_id']) ) 
{  
    $clt_sgg=strtoupper($_POST["clt_sgg"]);
    $cl_id = $_POST['cl_id'];
    
	$sql="INSERT INTO suggestion (sgg_user,	sgg_quest) VALUES ('$cl_id','$clt_sgg')";	

	$result = mysql_query($sql);
    
    if ($result)
	{
        $response["success"] = 1;
        $response["message"] = "Information Added successfully.";
        echo json_encode($response);
    }
	else
	{
      $response["success"] = 0;
      $response["message"] = "Oops! An error occurred.";
      echo json_encode($response);  
    }
 }
 
 else 
 {
    $response["success"] = 0;
    $response["message"] = "Suggetion  field(s) is Empty";
    echo json_encode($response);
 } 
?>

<?php
}	
?>




		


<?php
function register(){	
?>


<?php

$response = array();

if (isset($_POST['cname']) && isset($_POST['phone']) && isset($_POST['usern']) && isset($_POST['passwd'])) 
{  
    
$cname=strtoupper($_POST["cname"]);
$phone=strtoupper($_POST["phone"]);
$stage=strtoupper($_POST["stage"]);
$passwd=$_POST["passwd"];
$usern= $_POST["usern"];
$clevel=strtoupper($_POST["clevel"]);
$car_no=strtoupper($_POST["car_no"]);




$chectstg = "Select  * From   stages Where  st_name ='$stage' ";
 $run_check_stg = mysql_query($chectstg);    
 while($rowss = mysql_fetch_array($run_check_stg)){
 $stg_id =$rowss['st_id'] ;
 }
 
 $checklve = "Select  * From   user_levels Where  usr_leve ='$clevel' ";
 $run_check_lev = mysql_query($checklve);    
 while($rowss = mysql_fetch_array($run_check_lev)){
 $leve_id =$rowss['usr_id'] ;
 }
 


if (empty($_POST['stage'])&& empty($_POST['other_stg'])) {
$sql="SELECT * FROM stages ORDER BY st_id DESC LIMIT 1"; 
$run= mysql_query($sql);
while($rowss = mysql_fetch_array($run)){
 $stg_id =$rowss['st_id'] ;
 }


}


if (!empty($_POST['stage'])&& empty($_POST['other_stg'])) {
$hold2=$_POST['stage'];
$chectstg = "Select  * From   stages Where  st_name ='$hold2'";
 $run_check_stg = mysql_query($chectstg);    
 while($rowss = mysql_fetch_array($run_check_stg)){
 $hold =$rowss['st_id'] ;
 }

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

$result = mysql_query($sql);

    if ($result)
	{
        $response["success"] = 1;
        $response["message"] = "Registration successfully.";
        echo json_encode($response);
    }
	else
	{
      $response["success"] = 0;
      $response["message"] = "Oops! An error occurred.";
      echo json_encode($response);  
    }
 }
 
 else 
 {
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
    echo json_encode($response);
 } 
?>

<?php
}	
?>









<?php
function login(){	
?>


<?php
$response = array();
if (isset($_POST['usern']) && isset($_POST['password']) ) 
  { 
    $usern = $_POST['usern'];
    $password = $_POST['password'];
   
	
    $result = mysql_query("Select   clients.*,  user_levels.* From  clients Inner Join  user_levels   On clients.cl_leve = user_levels.usr_id where cl_usna ='$usern' and cl_paswd='$password'");
	
    if (mysql_num_rows($result))
	{
	
		 while ($row = mysql_fetch_array($result)) {
           
           
				$response["cl_id"]	= $row["cl_id"];
				$response["level"] 	= $row["usr_leve"];

           }
	
        $response["success"] = 1;
        $response["message"] = "Login successfully.";
        echo json_encode($response);
    } 
	else 
	{
        $response["success"] = 0;
        $response["message"] = "Please Enter correct UserName and password.";
        echo json_encode($response);
    }
 
 }
 else 
 {
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
    echo json_encode($response);
} 
?>

<?php
}	
?>
