<?php
 ob_start();
 session_start();
 include 'connect.php';
 
 // if session is not set this will redirect to login page
 if( isset($_SESSION['user']) ) {

 // select loggedin AGENT detail
 $res=mysqli_query($db,"SELECT * FROM AGENT WHERE Agent_ID=".$_SESSION['user']);
 $userRow=mysqli_fetch_array($res); 
 }

?>
<!DOCTYPE html>
<html lang="en">
<!-- start head- -->
<head>
 <title>HelpNow</title>
    <meta charset="utf-8">
        <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
 
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
   <!link href="https://www.secure-apps.smartapp1003.com/css/app.css" rel="stylesheet">
   <link rel="stylesheet" href="styletemplate.css" type="text/css" />
  
    <link rel="stylesheet" href="https://cdn.lenderhomepage.com/themes/responsivetemplate1/css/style.css" type="text/css"  media="all">
 
  
 
    <!--[if lt IE 9]>
    <script src="https://cdn.lenderhomepage.com/themes/responsivetemplate1/js/modernizr.custom.11889.js" type="text/javascript"></script>
    <script src="https://cdn.lenderhomepage.com/themes/responsivetemplate1/js/media.js" type="text/javascript"></script>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

         <link href="https://www.secure-apps.smartapp1003.com/css/landing-page-background.css" rel="stylesheet">
            
           
            
    <link rel="stylesheet" href="https://cdn.lenderhomepage.com/themes/responsivetemplate1/css/flexslider.css" type="text/css"  media="all">
    <link rel="stylesheet" href="https://cdn.lenderhomepage.com/themes/admin/css/font-awesome.min.css" type="text/css"  media="all">
    
       <link rel="stylesheet" href="https://cdn.lenderhomepage.com/css/fonts.css" type="text/css" media="all">
      
<script type="text/javascript" src="https://cdn.lenderhomepage.com/themes/responsivetemplate1/js/jquery.min.js" ></script>
   
<script type="text/javascript" src="https://cdn.lenderhomepage.com/themes/responsivetemplate1/js/nav-resp.js"></script>
 
            
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>     
        
            
</head>
<!-- end head- -->

<body class="colorskin-6">

<div id="wrap">
<header id="header">
	<div  class="container">
		<div class="eight columns logo">
	
				<img class ="topRightLogo" src="images/HelpNow Logo HD Dark Grey resized.png">
		
					</div>

		<div class="eight columns alignright">
			<div class='phone'>
				<span class='phonetxt lhp-edit' data-edit-type="global-replace" data-edit-field="tagline">Help Now Agents are standing by!</span>
				<br>
				<span class='icon-phone' style='margin-right: 13px;'></span><a href="tel:1800-helpnow">1-800-HelpNow</a>
			</div>
			<div class='lhp-edit' data-edit-type="global-replace" data-edit-field="subtagline"></div>


		</div>
			 
	</div>
<?php
 if (isset($_SESSION['user'])) { ?> <!-- If logged in ?> adding html inside php command ?php  -->	
	<nav id="nav-wrap" class="nav-wrap2">
		<div class="container">
	
			<ul id="nav" class="sixteen columns">
		
						<li class="current">
			  <a class="drp-aro" href="/index.php" >Home  </a>
			            </li>
		
						<li class="">
			  <a class="drp-aro" href="/About.php" >About  </a>
			            </li>
		
						<li class="">
			  <a class="drp-aro" href="/team.php" >The Team </a>
			            </li>
		
						<li class="">
			  <a class="drp-aro" href="/ApplyNow.php">Create Aid Request </a>
			            </li>
			<li class="">
			  <a class="drp-aro" href="/reports.php">Reports  </a>
			            </li>

                <li class="nav navbar-nav navbar-right">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
         </span>Hi <?php echo $userRow['First_Name']; ?></span class="caret"></span></a>
                  <ul class="dropdown-menu nav navbar-nav navbar-right">
                    <li><a href="/logout.php?logout"></span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
                      <li><a href="/agentprofile.php"></span class="glyphicon glyphicon"></span>&nbsp;Profile</a></li>
                  </ul>
                </li>  
                </ul>
<?php
}
else { ?>
	<nav id="nav-wrap" class="nav-wrap2">
		<div class="container">
		<ul id="nav" class="sixteen columns">
		
						<li class="current">
			  <a class="drp-aro" href="/index.php" >Home  </a>
			            </li>
		
						<li class="">
			  <a class="drp-aro" href="/About.php" >About  </a>
			            </li>
		
						<li class="">
			  <a class="drp-aro" href="/team.php" >Meet Our Agents </a>
			            </li> 
 		        <li class="nav navbar-nav navbar-right">
                  <a class="drp-aro"href="/login.php" role="button" >Login</a>
                  
                </li>
                
                <li class="">
			  <a class="drp-aro" href="/Testimonials.php" >Testimonials  </a>
			            </li>
                 <li class="">
			  <a class="drp-aro" href="/Schedule.php" >Schedule an Appointment</a>
			            </li>
			      
            </ul>
            
<?php
}

?>
		
	</nav>	 <!-- /END nav-wrap -->
		
	</nav>	 <!-- /END nav-wrap -->

</header>  <!-- end-header -->

	</nav>
	<!-- /nav-wrap -->
</header>  <!-- end-header -->
  <div class='container'>
	  <div style='margin-top:10px'></div>
		  <div class='sixteen columns'>
    		</div>


<div class="clearfix"></div>


<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.3/handlebars.min.js"></script>

<script id="infowindow-template" type="text/x-handlebars-template">
    <div style="max-width:250px;">
        <strong>{{name}}</strong> <br/><br/>
        {{address}}<br/>
        <a  href="tel:{{phone}}"> {{phone}} </a><br/><br/>
    </div>
    <hr/>
    <div style="max-width:300px;padding-top:15px; text-center;">
        <a href="{{directions}}"> Get Directions </a>
    </div>
</script>            
</div>
        </section>
</div>

<div class="">
    <div id="app-messages" class="col-xs-12 alert alert-danger animated shake hidden">
    </div>
    </div>
    
     <!-- Modal Denied-->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><strong>Aid Request Denied: Award Time Restriction Dectected</strong></h4>
        </div>
        <div class="modal-body">
       <?php   
       
 $SSN_Test = trim($_POST['Social_Security_Number']);
  $Social_Security_Number = trim($_POST['Social_Security_Number']);
  $Social_Security_Number= strip_tags($Social_Security_Number);
  $Social_Security_Number= htmlspecialchars($Social_Security_Number);

 $sql1 = "SELECT AID_REQUEST.Decision, CLIENT.Social_Security_Number, AWARD.Amount_Granted,
        AWARD.Date_Received, AWARD.Request_ID, AID_TYPE.Aid_ID, AID_TYPE.Category, AID_TYPE.Time_Restriction, CLIENT.Client_ID,
        DATEDIFF(NOW(),AWARD.Date_Received) AS DiffDate
        FROM AID_REQUEST 
        INNER JOIN CLIENT ON AID_REQUEST.Client_ID = CLIENT.Client_ID
        INNER JOIN AWARD ON AWARD.Request_ID = AID_REQUEST.Request_ID
        INNER JOIN AID_TYPE ON AID_REQUEST.Aid_ID = AID_TYPE.Aid_ID
        WHERE CLIENT.Social_Security_Number = $SSN_Test";
    $results = mysqli_query($db,$sql1);
 
   echo  '<table class="table table-condensed">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>SSN</th>';
    echo '<th>Amount</th>';
        echo '<th>Date_Received</th>';
    echo '<th>Category</th>';
      echo '<th>Days Restricted</th>';
      echo '<th>Last Award</th>';
      echo '<th>Eligibility</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
            while($row = mysqli_fetch_array($results)) {
      echo '<tr>';        
      echo '<td>',$row['Social_Security_Number'],'</td>';
      echo '<td>','$',$row['Amount_Granted'],'</td>';
        echo '<td>',$row['Date_Received'],'</td>';
      echo '<td>',$row['Category'],'</td>';
      echo '<td>',$row['Time_Restriction'],'</td>';
      if ($row['DiffDate'] < $row['Time_Restriction']){
   echo '<td style="color:red">',  $row['DiffDate'],' days ago','</td>';
   echo '<td style="color:red">',"Not Eligible",'</td>';
         $error = true;
        } else{
          echo '<td style="color:green">',  $row['DiffDate'],' days ago','</td>';
          echo '<td style="color:green">',"Eligible",'</td>';
         // $error = false;
        };
     
}
echo '</tbody></table>';

?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
 
<!--End Model--->    
 
      <!-- Modal Denied-->
  <div class="modal fade" id="myModalApproved" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><strong>Aid Request APPROVED</strong></h4>
        </div>
        <div class="modal-body">
      
       <h4 class="text">HelpNow is an organization that helps individuals. Please be patient the funds will be release shortly and you will received a check within one week.</h4>
         <h4 class="text">Thank You.</h4>  


     </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
 
<!--End Model--->    
<!--End Model---> 
 
<!-- Modal Clients-->
  <div class="modal fade" id="myModalClients" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3><strong>Clients</strong></h3>
        </div>
        <div class="modal-body">
       <?php   
             $results = mysqli_query($db,"SELECT * FROM `CLIENT` ");//WHERE Agent_ID =$userRow[Agent_ID]
 //   echo '<h4> "$results = mysqli_query($db,"SELECT * FROM `CLIENT` ");"</h4>';
    echo  '<table class="table table-condensed">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Client ID</th>';
    echo '<th>First Name</th>';
    echo '<th>Last Name</th>';
    echo '<th>Social Security Number</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
            while($row = mysqli_fetch_array($results)) {
      echo '<tr>';        
      echo '<td>',$row['Client_ID'],'</td>';
      echo '<td>',$row['First_Name'],'</td>';
      echo '<td>',$row['Last_Name'],'</td>';
      echo '<td>',$row['Social_Security_Number'],'</td>';
     echo '<tr>'; 
}
echo '</tbody></table>';

?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
 
<!--End Model---> 

   
<div class="clearfix"></div>

    <h1 class="landing_headline" style="color: #64d655;">Aid Request Form</h1>

<div class="" style="padding-bottom: 10px;">
    <div id="content" class="container guestmode">
    
        <div class="padding-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <section class="app-content">
                        <div class="col-xs-12" id="content-holder">
                                                            <input type="hidden" name="site-owner" value="203218">
<div class="row">
    
    
    
    
    
    
    <fieldset>
    
     <ul class="nav nav-tabs" id="sub-section-nav">
    
		
					<li class="">
			  <a class="drp-aro" href="/clientAppForm.php" >Add New Client  </a>
			            </li>
		
						<li class="">
			  <a class="drp-aro" href="aidRequestAppForm.php" >Eligibility </a>
			            </li>
		
						<li class="active">
			  <a class="drp-aro" href="aidRequestAppForm.1.php">Aid Request Form </a>
			            </li>
		
           
                  </ul>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-red", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-red";
}
</script>

 
 



<div class="w3-content" style="max-width:800px">
 
    <h3><strong>Create an Aid Request</strong> </h3>

<div id="login-form" id="ShowClientHistory">
    <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
               <?php
   if ( isset($errMSG) ) {
    
    ?>
    <div class="form-group">
             <div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
             </div>
                <?php
   }
    date_default_timezone_set("America/New_York");
//  $Date =date("Y/m/d"); 
//  $Date_Requested = $Date;
   ?>
   
        <!--   <div class="col-sm-6" id="info_table" style=" float:right!important;">  -->

  </div>
  
 
    
   <div class="form-group" >
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
             <input type="text" id="numbersOnly" pattern="[0-9.]+" style="font-size: 14pt" name="Social_Security_Number" class="form-control" placeholder="Social Security Number NO DASHES" maxlength="40" required="true"  value="<?php echo $Social_Security_Number?>" />
                </div>
                <span class="text-danger"><?php echo $Social_Security_NumberError; ?></span>
                <br>
                <a data-toggle="modal" data-target="#myModalClients"><strong>Client Look Up</strong></a>
            </div>


        <div class="form-group"> 
      <label for="sel2">Select Aid Type:</label>


       <select class="input-group" style="font-size: 14pt" id="sel2" name="sel2" onchange="TestFunction()"><span class="glyphicon glyphicon-pencil"></span>
         <?php
         //Only Clients for logged in Agent
            $results = mysqli_query($db,"SELECT * FROM `AID_TYPE`");
            while($row = mysqli_fetch_array($results)) {
            ?>
   
<option><value=$row['Aid_ID'];><?php echo $row['Aid_ID'], ' ', $row['Time_Restriction'], ' ', $row['Category']?> </option>
            <?php
            }
           
            ?>
             </select>
         </div> 
   
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-usd"></span></span>
             <input type="text" style="font-size: 14pt" name="Amount_Requested" class="form-control" placeholder="Enter Amount Requested" maxlength="50" required="true" value="<?php echo $Amount_Requested ?>" />
                </div>
                <span class="text-danger"><?php echo $Amount_RequestedError; ?></span>
            </div>
 
  <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
             <input type="text" style="font-size: 14pt" name="Client_Notes" class="form-control" placeholder="Enter Client Notes" maxlength="50" value="<?php echo $Client_Notes ?>" />
                </div>
                <span class="text-danger"><?php echo $Client_NotesError; ?></span>
            </div>
 
 
    <div class="form-group">
      <label for="sel3">Document Provided:</label>
       <select class="input-group" style="font-size: 14pt" id="sel3" name="sel3">
     <option value="">Select:</option>
 <option><?php echo $Documentation_Provided = "Invoice"; ?> </option>
  <option><?php echo $Documetation_Provided = "Receipt"; ?> </option>    
             </select>
          
              <!---      <div class="form-group">
              <label for="sel3">Auto Decision:</label>
                
             <div class="input-group">
                
                <span class="input-group-addon"><span class="glyphicon glyphicon-check"></span></span>
             <input type="text" style="font-size: 14pt" name="Client_Notes" class="form-control" placeholder="Decision made automatically" maxlength="50" readonly value="<?php echo $Decision ?>" />
                </div>
                <span class="text-danger"><?php echo $DecisonError; ?></span>
            </div>
          
         <!---    
                   <label for="sel3">Agent's Final Decision:</label>
       <select class="input-group" style="font-size: 14pt" id="sel3" name="sel3">
     <option value="">Agent's Final Approval:</option>
 <option><?php echo $Decision = "Approved"; ?> </option>
  <option><?php echo $Decision = "Denied"; ?> </option>    
             </select>
            -->
     
      

        <?php



if ( isset($_POST['btn-check']) ) {
   //Get Client_ID from SSN
  
 $SSN_Test = trim($_POST['Social_Security_Number']);
  $Social_Security_Number = trim($_POST['Social_Security_Number']);
  $Social_Security_Number= strip_tags($Social_Security_Number);
  $Social_Security_Number= htmlspecialchars($Social_Security_Number);

  $querySSN = mysqli_query($db,"SELECT Social_Security_Number FROM `CLIENT` WHERE Social_Security_Number=$SSN_Test");
 
   $count = mysqli_num_rows($querySSN); // if SSN Exists it return 1 row
 //FOR TESTING IF SSN EXISTS  IF Count is more then 1, SSN exists else new SSN
//  echo "<script type='text/javascript'>alert($count)</script>";
  
   if($count > 0) {
 
 // echo "<script type='text/javascript'>alert('SSN Already Exists. Enter a new SSN')</script>";

  
  
  

 $sql1 = "SELECT AID_REQUEST.Decision, CLIENT.Social_Security_Number, AWARD.Amount_Granted,
        AWARD.Date_Received, AWARD.Request_ID, AID_TYPE.Aid_ID, AID_TYPE.Category, AID_TYPE.Time_Restriction, CLIENT.Client_ID,
        DATEDIFF(NOW(),AWARD.Date_Received) AS DiffDate
        FROM AID_REQUEST 
        INNER JOIN CLIENT ON AID_REQUEST.Client_ID = CLIENT.Client_ID
        INNER JOIN AWARD ON AWARD.Request_ID = AID_REQUEST.Request_ID
        INNER JOIN AID_TYPE ON AID_REQUEST.Aid_ID = AID_TYPE.Aid_ID
        WHERE CLIENT.Social_Security_Number = $SSN_Test";
    $results = mysqli_query($db,$sql1);
 
            while($row = mysqli_fetch_array($results)) {
    if ($row['DiffDate'] < $row['Time_Restriction']){
        $error = true;
        } else{
          echo '<td style="color:green">',  $row['DiffDate'],' days ago','</td>';
          echo '<td style="color:green">',"Eligible",'</td>';
         // $error = false;
        };
     
}
 if($error){  //DENIED

   //    echo "<script type='text/javascript'>alert('WARNING: Not Eligible at this time. See history report below')</script>";
 
 //SAVED DENIED
     
   $SSN_Test = trim($_POST['Social_Security_Number']);
  // clean user inputs to prevent sql injections
  $Social_Security_Number = trim($_POST['Social_Security_Number']);
  $passSSN = $Social_Security_Number;
  $Social_Security_Number= strip_tags($Social_Security_Number);
  $Social_Security_Number= htmlspecialchars($Social_Security_Number);

 //QUERY SSN to get Client ID
 
   //Get Client_ID from SSN
   $querySSN = mysqli_query($db,"SELECT Client_ID FROM `CLIENT` WHERE Social_Security_Number=$SSN_Test");
  $count = mysqli_num_rows($querySSN); // if SSN Exists it return 1 row
  $userRow1=mysqli_fetch_array($querySSN);

 $Client_ID = $userRow1['Client_ID'];
 
 
 
 $Aid_ID = $_POST['sel2'];
 
   date_default_timezone_set("America/New_York");
 $Date =date("Y/m/d"); 
 $Date_Requested = $Date;
  
  $Amount_Requested = trim($_POST['Amount_Requested']);
  $Amount_Requested = strip_tags($Amount_Requested);
  $Amount_Requested = htmlspecialchars($Amount_Requested);
  
  $Client_Notes = trim($_POST['Client_Notes']);
 $Client_Notes = strip_tags($Client_Notes);
  $Client_Notes = htmlspecialchars($Client_Notes);
 
  $Documentation_Provided = $_POST['sell3'];
   
  $Decision = "Denied";
//  $Decision = $_POST['sel3'];  //THATS IT
echo $Decision;

 $query =  "INSERT INTO AID_REQUEST(Date_Requested,Amount_Requested,Client_ID,Client_Notes,Decision,Documentation_Provided,Aid_ID) VALUES('$Date_Requested','$Amount_Requested','$Client_ID','$Client_Notes','$Decision','$Documentation_Provided','$Aid_ID')";
   $res = mysqli_query($db,$query);
   
   if($res)  //If insert into datebase worked.
   {
    
     echo "<script type='text/javascript'>
$(document).ready(function(){
$('#myModal').modal('show');
});
</script>";   
//header("Refresh:0"); //resets form 
   }
   else
   {
    echo "<script type='text/javascript'>alert('Error saving Aid Request')</script>";
 }
 
  
 
 }  else //APPROVE
 
 {
  
//SAVED - APPROVED
  
  // clean user inputs to prevent sql injections
  $SSN_Test = trim($_POST['Social_Security_Number']);
  $Social_Security_Number = trim($_POST['Social_Security_Number']);
  $Social_Security_Number= strip_tags($Social_Security_Number);
  $Social_Security_Number= htmlspecialchars($Social_Security_Number);

 //QUERY SSN to get Client ID
 
 $Aid_ID = $_POST['sel2'];
 
   date_default_timezone_set("America/New_York");
 $Date =date("Y/m/d"); 
 $Date_Requested = $Date;
  
    //Get Client_ID from SSN
   $querySSN = mysqli_query($db,"SELECT Client_ID FROM `CLIENT` WHERE Social_Security_Number=$SSN_Test");
  $count = mysqli_num_rows($querySSN); // if SSN Exists it return 1 row
  $userRow1=mysqli_fetch_array($querySSN);

 $Client_ID = $userRow1['Client_ID'];
 
  
  
  $Amount_Requested = trim($_POST['Amount_Requested']);
  $Amount_Requested = strip_tags($Amount_Requested);
  $Amount_Requested = htmlspecialchars($Amount_Requested);
  
  $Client_Notes = trim($_POST['Client_Notes']);
 $Client_Notes = strip_tags($Client_Notes);
  $Client_Notes = htmlspecialchars($Client_Notes);
 
  $Documentation_Provided = $_POST['sel3'];
// $Decision = $_POST['sel3'];  //THATS IT
$Decision = "Approved";
echo $Decision;
 

 $query =  "INSERT INTO AID_REQUEST(Date_Requested,Amount_Requested,Client_ID,Client_Notes,Decision,Documentation_Provided,Aid_ID) VALUES('$Date_Requested','$Amount_Requested','$Client_ID','$Client_Notes','$Decision','$Documentation_Provided','$Aid_ID')";
   $res = mysqli_query($db,$query);
   
   if($res)  //If insert into datebase worked.
   {
   // pop up to say Aid Request was saved
         echo "<script type='text/javascript'>
$(document).ready(function(){
$('#myModalApproved').modal('show');
});
</script>"; 
//header("Refresh:0"); //resets form 
   }else
   {
    echo "<script type='text/javascript'>alert('Error saving Aid Request')</script>";
 }
 

 }

}
 else {  //SSN Does NOT Exist

   echo "<script type='text/javascript'>
   alert('Client SSN Does not exist. Please fill out a New Client Form'); 
   window.location.href ='/clientAppForm.php';
   </script>";
   }
  
 } 




   ?>    
            
            
    
                <div class="form-group">
                 <div class="input-group">
          <button type="submit" class="btn btn-lg btn-inf" name="btn-check" />Submit</button>
           &nbsp;
           <button type="cancel"class="btn btn-lg btn-inf"  onclick="window.location='/ApplyNow.php';return false;">Cancel</button>

            <!--<input type="sumbit" value="Save" class="btn btn-lg btn-inf" name="btn-save" <?php if ($Qualified == '0'){ ?> disabled <?php   } ?> onclick="btn-save" /> -->

            </div>
            
        </div>
        
         
    </form>
 
</div>



                                                                                </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    
    <div style="clear: both;"></div>
</div>






    </fieldset>
</div>
<style>
.navigation {
    display: none;
}
.alertNoLO{
    border-color: #ebccd1;
}
.alertNoLO .panel-heading{
    border-color: #ebccd1;
    background-color: #f2dede;
}
.alertNoLO .panel-heading h3{
    display: none;
}
.alertNoLO .panel-heading h4{
    color: #a94442;
    display: block !important;
    margin: 0;
    font-size: 1.8em;
}
.alertNoLO .pleaseSelectLO{
    display: block !important;
}

callbacks: {
       afterClose: function() {
              window.location.reload();
            }
        }
</style>

 </div>
   </section>
                </div>
            </div>
        </div>
    </div>
    
    <div style="clear: both;"></div>
</div>	
	

	
  <!-- home-portfolio -->
  	
		<center>
<p>
	<span style="font-weight: bold; font-size: 125%;">Help Now, LLC </span>
	<br />
	<img  src="images/HelpNow logo 1.png" style="width:50px;height:50px;" >
		<br />

</center>  </div>
 

  <!-- start footer- -->
    <footer id="footer">
    <div class="container footer-in">
        <div class='one columns'></div>
    
        <!-- Disclaimer /end -->
        
        <!-- end-stay connected /end -->

        <!-- flickr  /end -->
                    <div class="five columns contact-inf">
                <h4 class="subtitle">Contact Information</h4>
                <br />
                <div>
<p><strong>Address: </strong> 11 Red Barn Rd Tulsa, OK 80400</p>
<p><strong>Phone: </strong> <a href="tel:(203) 985-5807"> (203) 985-5807 </a> </p>
<p><strong>Email: </strong> <a href="robert.klouda@quinnipiac.edu"> Contact@Helpnow.com </a> </p>
<p>Copyright © 2017 HelpNow Inc. All Rights Reserved </p>

</div>                <div class="lhp-edit" data-edit-type="global-replace" data-edit-field="footer2"></div>
            </div>
                <!-- end-contact-info /end -->
        <div style="clear:both;"></div>
    <!-- end-footer-in -->

    <!-- end-footbot -->

</footer>

<span id="scroll-top"><a class="scrollup"></a></span>

<!-- end-wrap -->

<!-- End Document
================================================== -->

<script type="text/javascript" src="https://cdn.lenderhomepage.com/themes/responsivetemplate1/js/quentin-custom.js" ></script>
<script src="https://cdn.lenderhomepage.com/themes/responsivetemplate1/js/bootstrap-alert.js"></script>
<script src="https://cdn.lenderhomepage.com/themes/responsivetemplate1/js/bootstrap-dropdown.js"></script>
<script src="https://cdn.lenderhomepage.com/themes/responsivetemplate1/js/bootstrap-tab.js"></script>


  <!-- end-footer -->
</div>
</body>
</html>









