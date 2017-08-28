<?php
require 'backend/connect.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Stock Form</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- 
        Style Sheet and query file reference link below
        -->
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/sidebar.css">
        
        <script src="bootstrap/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
       
     
        <!-- 
        Custom styles below
        -->
        <style>          
                           
 
          /* Below style is for form */
          .field-bg{
              margin-top:2%;
              background-color: #001832;
              
          }
          .field-label{
              color:#fff;
              font-weight: bold;
              margin-left: 25%;
          }
          .form-group{
              padding-bottom: 10px;
          }
          .field-length{
              width: 300px;
              height: 30px;
          }
          
          
          /*alert msg */
         #alert{margin-top:3%;
           width: 50%;
           margin-left: 24.5%;
           text-align: center;
          }
          
       
        </style>  
        
        <?php require 'backend/navbar.php'; 
              
        ?> 
    
    
        
    </head>
<body>
    <div id="main">
    <div id="alert">
    <?php    
    if(!empty($_GET['entry'])){
    if($_GET['entry']=='true'){
    ?>
    
    <div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong>!! Data Entered .
   </div>
    
    <?php }
    elseif($_GET['entry']=='false'){ ?>
    
    <div class="alert alert-danger alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Failed!</strong> Failed Entry,Try again.
    </div>
    
    <?php }} ?>
    </div>
    <!--  Form Field labels -->
    
    <div class="container"><div class="panel panel-primary field-bg">
            <div class="panel-heading">
                <h2>Purchase Form</h2>
            </div>
            
            <div class="panel-body">
                <form action="backend/form_stock_script.php" method="post" id="list">
            <div class="row">               
            <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-4 col-md-4 col-sm-4 col-xs-4">
    
        
        <!-- Next field  -->

        <div class="form-group" style='padding-top: 10px;'>                     
        <label>Item Name:</label>
        <input type="text" name="i_name" required="true" class="form-control field-length" >
        </div>
 
        <!-- Next field  -->
 
 <div class='form-group'>
 <label>Category:</label>    
 <select name="i_cat" form="list" class="form-control field-length">
   <option selected disabled>Choose a category</option>  
    <?php
$sql ='SELECT * FROM `category`';
$result = mysqli_query($link2,$sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { ?>
       <option value="<?php echo $row["categories"]; ?>">
    <?php echo $row["categories"]; ?></option> 
<?php }} ?> 
 </select></div>
        
           <!-- Next field  -->
           
 <div class='form-group'>
 <label>Item description:</label>    
 <textarea name="i_desc"  class="form-control" rows="5" required="true" style="width:300px;">
</textarea></div> 
 
        <!-- Next field  -->
        <div class="form-group">
            <label>Item Quantity:</label>
            <input type="number" name="i_qty" required="true" step="0.01" class="form-control field-length">
        </div>
      
        <!-- Next field  -->

 <div class="form-group">
     <label>Unit/measurement:</label>
   <select name="i_mes" form="list" class="form-control field-length">
       <option selected disabled>select unit</option>
       <?php
$sql ='SELECT * FROM `measures`';
$result = mysqli_query($link2,$sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { ?>
       <option value="<?php echo $row["Unit"]; ?>">
<?php echo $row["Unit"]; ?> </option>
<?php }} ?> 
   </select></div>
  
   <!-- Next field  -->
   
   <div class="form-group">
    <label>Location:</label>
   <select name="i_store" form="list" class="form-control field-length">
       <option selected disabled>select the store</option>
     <?php
$sql ='SELECT * FROM `store`';
$result = mysqli_query($link2,$sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { ?>
<option value="<?php echo $row["location"]; ?>">
    <?php echo $row["location"]; ?> </option>
<?php }} ?> 
   </select></div>
   
    <!-- Next field  -->
       
       <div class="form-group">
           <label>Ref.No:</label>
           <input type="text" name="i_refno" required="true" class="form-control field-length">
       </div>
            </div>
            
            
            
   <!-- Next field labels  -->
  
   
   
     <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-4 col-md-4 col-sm-4 col-xs-4" style="margin-left: 13%;">
   <!-- Next field  -->
   
   <div class="form-group" style='padding-top: 10px;'>
       <label>Ref.Date:</label>
       <input type="date" name="i_refdate" required="true" class="form-control field-length">
   </div>
   
   <!-- Next field  -->
   
   <div class="form-group">
       <label>Condition:</label>
   <select name="i_coa" form="list" class="form-control field-length">
       <option selected disabled>choose</option>
      <?php
$sql ='SELECT * FROM `conditions`';
$result = mysqli_query($link2,$sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { ?>
<option value="<?php echo $row["condition"]; ?>">
<?php echo $row["condition"]; ?> </option>
<?php }} ?> 
   </select></div> 
       
   <div class="form-group">
       <label>Item Cost:</label>
       <input type="number" name="i_cop" required="true" step="0.01" class="form-control field-length">
       <span style="color:#bd0e0e;"><?php if(!empty($_GET["cop_error"])){ echo $_GET['cop_error'];}?></span></div> 

  <!-- Next field  -->

  <div class="form-group">
      <label>Cost of Shipping:</label>
      <input type="number" name="i_cos" required="true" step="0.01" class="form-control field-length">
      <span style="color:#bd0e0e;"><?php if(!empty($_GET["cos_error"])){echo $_GET['cos_error'];}?></span></div> 

    <!-- Next field  -->
    
  <div class="form-group">
      <label>Document Reference:</label>
      <input type="text" name="i_costref" class="form-control field-length"></div>

<!-- Next field  -->

<div class="form-group">
    <label>Source:</label>
   <select name="i_ven" form="list" class="form-control field-length">
       <option selected disabled>choose the vendor</option>
     <?php
$sql ='SELECT * FROM `vendor`';
$result = mysqli_query($link2,$sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { ?>
<option>
    <?php echo $row["vendor_name"]; ?></option> 
<?php }} ?> 
   </select></div>
 
   <!-- Next field  -->
   
 <div class="form-group">
     <label>Location Details:</label>
     <textarea name="i_locdet" rows="3" cols="45" class="form-control">
</textarea></div>    
</div></div>
            <div class="row">
                <div style="margin-bottom: 10px; margin-left: 45%;">
                    <input class="btn btn-danger" type="submit" value='Save' style="width: 100px;">
                </div>
            </div>
        </form></div></div></div>
    </div>
     
</body>
</html> 
