<?php
require 'connect.php';

if ($_POST['job_cost']==0) {
  if($_POST['exp_cost']==0) {
      if($_POST['profit']==0){
          header('location: ../form_job.php?j=cannot be zero&e=cannot be zero&p=cannot be zero');
      }
      else{
           header('location: ../form_job.php?j=cannot be zero&e=cannot be zero');
      }
  }
  else{
       header('location: ../form_job.php?j=cannot be zero');
  }
}
elseif ($_POST['exp_cost']==0) {
  if($_POST['profit']==0){
     header('location: ../form_job.php?e=cannot be zero&p=cannot be zero'); 
  }
 else {
      header('location: ../form_job.php?e=cannot be zero');
  }
}

elseif($_POST['profit']==0) {
  header('location: ../form_job.php?p=cannot be zero');
}

else{
    $input1= mysqli_real_escape_string($link,$_POST['reg_date']);
    $input2=  mysqli_real_escape_string($link,$_POST['job_desc']); 
    $input3=  mysqli_real_escape_string($link,$_POST['job_type']);
    $input4= mysqli_real_escape_string($link,$_POST['job_cost']);
    $input5= mysqli_real_escape_string($link,$_POST['start_date']);
    $input6= mysqli_real_escape_string($link,$_POST['end_date']);
    $input7= mysqli_real_escape_string($link,$_POST['cust_name']);
    $input8=mysqli_real_escape_string($link,$_POST['doc_ref']);
    $input9= mysqli_real_escape_string($link,$_POST['exp_cost']);
    $input10= mysqli_real_escape_string($link,$_POST['profit']);
    
    
    $sql="INSERT INTO `job`(`date`, `job_desc`, `type`, `value`, `start_date`, `end_date`, `customer`, `doc_ref`, `cost_exp`, `profit_prj`) VALUES ('$input1', '$input2', '$input3', '$input4', '$input5', '$input6', '$input7', '$input8', '$input9', '$input10')";
    $result= mysqli_query($link, $sql);
    if($result){
        header("location: ../form_job.php?entry=true");
    }
    else{
        echo mysqli_error($link);
    }
}
?>