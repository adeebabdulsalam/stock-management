<?php
 require 'connect.php';
 
 $input1= mysqli_real_escape_string($link,$_POST['date']);
 $input2= mysqli_real_escape_string($link,$_POST['i_id']);
 $input3= mysqli_real_escape_string($link,$_POST['j_id']);
 $input4= mysqli_real_escape_string($link,$_POST['qty']);
         
 if(searchid($link,$input3)){     
    if(updateqty($link,$input2,$input4)){
        if(check_if_exist($link,$input2,$input3)){
            $newqty= check_if_exist($link, $input2, $input3) + $input4;
            $sql="UPDATE `issue` SET qty='$newqty' WHERE item_id='$input2' AND job_id='$input3'";}       
        else{$sql="INSERT INTO `issue`(`date`, `item_id`, `job_id`, `qty`) VALUES ('$input1','$input2','$input3','$input4')";}
        
        $result= mysqli_query($link, $sql);
        if($result){
         header("location: ../table_stock.php?issued");   
        }
        else{
            die(mysqli_error($link));
        }
       }
     else{
         header("location: ../table_stock.php?qty=false");
     }
 }
 else{
     header("location: ../table_stock.php?jobid=wrong");
 }
  
 function searchid($link,$id){
     $sql="SELECT `id` FROM `job` WHERE id='$id'";
     $result= mysqli_query($link, $sql);
     if($result){
     if(mysqli_num_rows($result)>0){
         return 1;
     }
     else{
         return 0;
     }}
     else{
         die(mysqli_error($link));
     }
 }
 
 function updateqty($link,$id,$qty){
     $sql="SELECT `item_qty` FROM `stock` WHERE `item_no`='$id'";
     $result= mysqli_query($link, $sql);
     $row= mysqli_fetch_assoc($result);
     $nqty=$row['item_qty']-$qty;
         if($nqty>=0){
          $sql="UPDATE `stock` SET `item_qty`='$nqty' WHERE `item_no`='$id'";
          $result= mysqli_query($link, $sql);          
             return 1;                
         }
         else{
             return 0;
         }
 }
 
 function check_if_exist($link,$iid,$jid){
     $sql="SELECT * FROM `issue` WHERE item_id='$iid' AND job_id='$jid'";
     $result= mysqli_query($link, $sql);
     if(mysqli_num_rows($result)==1){ 
         $row= mysqli_fetch_array($result);
         return $row[4];}
     else {return 0;}
 }
 ?>