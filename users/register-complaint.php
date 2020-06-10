<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{
$uid=$_SESSION['id'];
$category=$_POST['category'];
$subcat=$_POST['subcategory'];
$complaintype=$_POST['complaintype'];
$state=$_POST['state'];
$noc=$_POST['noc'];
$complaintdetials=$_POST['TXN_AMOUNT'];
$compfile=$_FILES["compfile"]["name"];
$tid=$_POST['ORDER_ID'];
$status="success";
$time=now();

echo "<script>alert($complaintdetials)</script>";
$sql = "insert into transaction values(1,10,10,'2019-10-10',10)";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
move_uploaded_file($_FILES["compfile"]["tmp_name"],"complaintdocs/".$_FILES["compfile"]["name"]);
$query=mysqli_query($con,"insert into tblcomplaints(userId,category,subcategory,complaintType,state,noc,complaintDetails,complaintFile) values('$uid','$category','$subcat','$complaintype','$state','$noc','$complaintdetials','$compfile')");
// code for show complaint number
$sql=mysqli_query($con,"select complaintNumber from tblcomplaints  order by complaintNumber desc limit 1");
while($row=mysqli_fetch_array($sql))
{
 $cmpn=$row['complaintNumber'];
}
$complainno=$cmpn;
echo '<script> alert("Your complain has been successfully filled and your complaintno is  "+"'.$complainno.'")</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Donation</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    
    <!-- recCAPTCHA -->
   <script type="text/javascript">
      var verifyCallback = function(response) {
        alert("Google reCAPTCHA Successfully Verified");
      };
      var widgetId1;
      var widgetId2;
      var onloadCallback = function() {
        // Renders the HTML element with id 'example1' as a reCAPTCHA widget.
        // The id of the reCAPTCHA widget is assigned to 'widgetId1'.
       
        
        grecaptcha.render('example3', {
          'sitekey' : '6LcV48EUAAAAAKa-HX84GXCFg3h0Wf3qi1OkBwXz',
          'callback' : verifyCallback,
          'theme' : 'dark'
        });
      };
      
      // drop down select
      function admSelectCheck(nameSelect)
{
    if(nameSelect){
        foodValue = document.getElementById("admOption").value;
        moneyValue = document.getElementById("admOption").value;
        clothValue = document.getElementById("admOption").value;
        needsValue = document.getElementById("admOption").value;
        
        if(nameSelect.value == foodValue || nameSelect.value == clothValue || nameSelect.value == needsValue){
            document.getElementById("pay").style.display = "none";
        }
        else{
            document.getElementById("pay").style.display = "block";
        }
    }
    else{
        document.getElementById("pay").style.display = "none";
    }
}


// getCat

function getCat(val) {
  //alert('val');

  $.ajax({
  type: "POST",
  url: "getsubcat.php",
  data:'catid='+val,
  success: function(data){
    $("#subcategory").html(data);
    
  }
  });
  }


    </script>

  </head>

  <body>

  <section id="container" >
     <?php include("includes/header.php");?>
      <?php include("includes/sidebar.php");?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Donate </h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	

                      <?php if($successmsg)
                      {?>
                      <div class="alert alert-success alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Well done!</b> <?php echo htmlentities($successmsg);?></div>
                      <?php }?>

   <?php if($errormsg)
                      {?>
                      <div class="alert alert-danger alert-dismissable">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Oh snap!</b> </b> <?php echo htmlentities($errormsg);?></div>
                      <?php }?>

                      <form class="form-horizontal style-form" method="post" name="complaint" enctype="multipart/form-data" id="donate" action="">

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Category</label>
<div class="col-sm-4">
<select name="category" id="category" class="form-control" onChange="getCat(this.value);" required="">
<option value="">Select Category</option>
<?php $sql=mysqli_query($con,"select id,categoryName from category ");
while ($rw=mysqli_fetch_array($sql)) {
  ?>
  <option value="<?php echo htmlentities($rw['id']);?>"><?php echo htmlentities($rw['categoryName']);?></option>
<?php
}
?>
</select>
 </div>
<label class="col-sm-2 col-sm-2 control-label">Sub Category </label>
 <div class="col-sm-4">
<select name="subcategory" id="subcategory" class="form-control" >
<option value="">Select Subcategory</option>
</select>
</div>
 </div>




<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Donor Type</label>
<div class="col-sm-4">
<select name="complaintype" class="form-control" required="">
                <option value=" Complaint">Individual</option>
                  <option value="General Query">Organization</option>
                </select> 
</div>

<label class="col-sm-2 col-sm-2 control-label">State</label>
<div class="col-sm-4">
<select name="state" required="required" class="form-control">
<option value="">Select State</option>
<?php $sql=mysqli_query($con,"select stateName from state ");
while ($rw=mysqli_fetch_array($sql)) {
  ?>
  <option value="<?php echo htmlentities($rw['stateName']);?>"><?php echo htmlentities($rw['stateName']);?></option>
<?php
}
?>

</select>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Donation Type</label>
<div class="col-sm-4">
<select  id="dtype"name="complaintype" class="form-control" onchange="admSelectCheck(this);">
                <option  value="Food_and_Groceries">Food and Groceries</option>
                  <option  value="Clothing">Clothing</option>
                  <option id='money' value="Money">Money</option>
                  <option  value="Basic_Needs">Basic Needs</option>
                </select> 
</div>
</div>

<div class="form-group" id="amt" style="display:none;">
<label class="col-sm-2 col-sm-2 control-label">Amount </label>
<div class="col-sm-4">
<input  name="TXN_AMOUNT" required="required" cols="10"rows="1"
class="form-control" maxlength="2000" autocomplete="off" placeholder="Enter the Amount"></input>
</div>
</div>

<input id="ORDER_ID" tabindex="1" maxlength="20" size="20"	name="ORDER_ID" autocomplete="off" type="hidden" value="<?php echo  "ORDS" . rand(10000,99999999)?>">

<input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" type="hidden" autocomplete="off" value="<?php $uid=$_SESSION['id']?>"/>

<input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" type="hidden" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">

<input id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" type="hidden" name="CHANNEL_ID" autocomplete="off" value="WEB">



<!-- google recapthca -->
 <div  id="example3"></div>
      <br>

                          <div class="form-group" id="pay" style="display:none;">
                           <div class="col-sm-10" style="padding-left:25% ">
<button type="submit" name="pay" class="btn btn-primary" >Pay Now</button>
</div>
</div>


                          <div class="form-group">
                           <div class="col-sm-10" style="padding-left:25% ">
<button type="submit" name="submit" class="btn btn-primary">Submit</button>
</div>
</div>

                          </form>
                     
<script>
   function admSelectCheck(nameSelect)
{
    if(nameSelect){
       alert(nameSelect.value);
       
        moneyValue = document.getElementById("money").value
        
         
        if(nameSelect.value == moneyValue){
            document.getElementById("pay").style.display = "block";
            document.getElementById("amt").style.display = "block";
        }
        else{
            document.getElementById("pay").style.display = "none";
            document.getElementById("amt").style.display = "none";
        }
    }
    else{
        document.getElementById("pay").style.display = "none";
        document.getElementById("amt").style.display = "none";
    }
}

</script>
                          <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
                          </div>
                          </div>
                          </div>
                          
          	
          	
		</section>
      </section>
    <?php include("includes/footer.php");?>
  </section>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!--custom switch-->
	<script src="assets/js/bootstrap-switch.js"></script>
	
	<!--custom tagsinput-->
	<script src="assets/js/jquery.tagsinput.js"></script>
	
	<!--custom checkbox & radio-->
	
	<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	
	
	<script src="assets/js/form-component.js"></script>    
    
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
<?php } ?>

 
