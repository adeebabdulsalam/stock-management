<?php
require 'backend/connect.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Job Form</title>
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
          .panel-bg{
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
           
         
          .reg_date{
              float:left;
          }
          .reg_date_field{
              width: 200px;
          }
          
          #alert{margin-top:3%;
           width: 50%;
           margin-left: 24.5%;
           text-align: center;
          }
        </style>
        
        
    </head>
<body>
    <?php require 'backend/navbar.php'; 
        
    ?> 
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
    
    <div class="container"><div class="panel panel-primary panel-bg">
            <div class="panel-heading">
                <h2>Project Register Form</h2>               
            </div>
            
            <div class="panel-body">
                <form action="backend/form_job_script.php" method="post" id="list">
            <div class="row">               
            <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-4 col-md-4 col-sm-4 col-xs-4">
    
        
        <!-- Next field  -->

        <div class="form-group" style='padding-top: 10px;'>                     
        <label>Customer Name:</label>
        <input type="text" name="cust_name" required="true" class="form-control field-length" >
        </div>
 
        <!-- Next field  -->
 
 <div class='form-group'>
 <label>Type of Job:</label>    
 <select name="job_type" form="list" class="form-control field-length">
     <option selected disabled>Choose a type</option>
     <?php
$sql ='SELECT * FROM `job_type`';
$result = mysqli_query($link2,$sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { ?>
       <option value="<?php echo $row["type"]; ?>">
    <?php echo $row["type"]; ?></option> 
<?php }} ?>
 </select></div>
        
           <!-- Next field  -->
           
 <div class='form-group'>
 <label>Project description:</label>    
 <textarea name="job_desc"  class="form-control" required="true" style="width:300px;height:190px;">
</textarea></div> 
 
      
     <!-- Next field  -->
    
              
       <div class="form-group">
           <label>Start Date</label>
           <input type="text" name="start_date" required="true" class="form-control field-length" onfocus="(this.type='date')">
       </div>
            

    <!-- Next field  --> 
  </div>
      
   <!-- Next field labels  -->
  
   
   
     <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-4 col-md-4 col-sm-4 col-xs-4" style="margin-left: 13%;">
   <!-- Next field  -->
   
   <div class="form-group" style='padding-top: 10px;'>
       <label>Registration Date:</label>
       <input type="text" name="reg_date" required="true" class="form-control field-length" onfocus="(this.type='date')">
   </div>
   
   <!-- Next field  -->
    
    
  <div class="form-group">
      <label>Document Reference:</label>
      <input type="text" name="doc_ref" class="form-control field-length"></div>
      
       <!-- Next field  -->
 
       
   <div class="form-group">
       <label>Project Cost:<span style="color:#bd0e0e;"><?php if(!empty($_GET["j"])){ echo $_GET['j'];}?></span></label>
       <input type="number" name="job_cost" required="true" step="0.01" class="form-control field-length">
       </div> 

  <!-- Next field  -->
      
    
       <div class="form-group">
      <label>Cost Expected:<span style="color:#bd0e0e;"><?php if(!empty($_GET["e"])){echo $_GET['e'];}?></span></label>
      <input type="number" name="exp_cost" required="true" step="0.01" class="form-control field-length">
      </div> 
 <!-- Next field  --> 
     
  <div class="form-group">
      <label>Profit Projected:<span style="color:#bd0e0e;"><?php if(!empty($_GET["p"])){echo $_GET['p'];}?></span></label>
      <input type="number" name="profit" required="true" step="0.01" class="form-control field-length">
      </div> 

  

<!-- Next field  -->
<div class="form-group">
           <label>End Date</label>
           <input type="text" name="end_date" required="true" class="form-control field-length" onfocus="(this.type='date')">
       </div>

 
   <!-- Next field  -->

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


