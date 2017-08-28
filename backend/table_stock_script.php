<?php
 require 'connect.php';
 if(!isset($_SESSION['id'])){
        header("location: ../login.php");
    }
          
 if( (isset($_GET['startdate']) && isset($_GET['enddate'])) and (!empty($_GET['startdate']) and !empty($_GET['enddate'])) ){
     $startdate=$_GET['startdate'];
     $enddate=$_GET['enddate'];
     if( isset($_GET['coa']) ){
        $coa=mysqli_real_escape_string($link,$_GET['coa']);
        if( isset($_GET['vendor']) ){
          $vendor=$_GET['vendor'];
          $num= count($vendor);
          if($num==1){ $sql="SELECT * FROM `stock` WHERE item_curloc='$vendor[0]' AND item_coa='$coa' AND item_src_ref_date BETWEEN '$startdate' AND '$enddate'";}              
          elseif($num==2){ $sql="SELECT * FROM `stock` WHERE item_curloc IN ('$vendor[0]','$vendor[1]') AND item_coa='$coa' AND item_src_ref_date BETWEEN '$startdate' AND '$enddate'"; }   
          elseif($num==3) { $sql="SELECT * FROM `stock` WHERE item_curloc IN ('$vendor[0]','$vendor[1]','$vendor[2]') AND item_coa='$coa' AND item_src_ref_date BETWEEN '$startdate' AND '$enddate'"; }
          elseif($num==4) { $sql="SELECT * FROM `stock` WHERE item_curloc IN ('$vendor[0]','$vendor[1]','$vendor[2]','$vendor[3]') AND item_coa='$coa' AND item_src_ref_date BETWEEN '$startdate' AND '$enddate'"; }
          elseif($num==5) { $sql="SELECT * FROM `stock` WHERE item_curloc IN ('$vendor[0]','$vendor[1]','$vendor[2]','$vendor[3]','$vendor[4]') AND item_coa='$coa' AND item_src_ref_date BETWEEN '$startdate' AND '$enddate'"; }
          elseif($num==6) { $sql="SELECT * FROM `stock` WHERE item_curloc IN ('$vendor[0]','$vendor[1]','$vendor[2]','$vendor[3]','$vendor[4]','$vendor[5]') AND item_coa='$coa' AND item_src_ref_date BETWEEN '$startdate' AND '$enddate'"; }
          elseif($num==7) { $sql="SELECT * FROM `stock` WHERE item_curloc IN ('$vendor[0]','$vendor[1]','$vendor[2]','$vendor[3]','$vendor[4]','$vendor[5]','$vendor[6]') AND item_coa='$coa' AND item_src_ref_date BETWEEN '$startdate' AND '$enddate'"; }
          elseif($num==8) { $sql="SELECT * FROM `stock` WHERE item_curloc IN ('$vendor[0]','$vendor[1]','$vendor[2]','$vendor[3]','$vendor[4]','$vendor[5]','$vendor[6]','$vendor[7]') AND item_coa='$coa' AND item_src_ref_date BETWEEN '$startdate' AND '$enddate'"; }
              
        }
        
        else{
          $sql="SELECT * FROM `stock` WHERE item_coa='$coa' AND item_src_ref_date BETWEEN '$startdate' AND '$enddate'";  
        }
     }
     elseif( isset($_GET['vendor']) ){
         $vendor=$_GET['vendor'];
          $num= count($vendor);
          if($num==1){ $sql="SELECT * FROM `stock` WHERE item_curloc='$vendor[0]' AND item_src_ref_date BETWEEN '$startdate' AND '$enddate'";}              
          elseif($num==2){ $sql="SELECT * FROM `stock` WHERE item_curloc IN ('$vendor[0]','$vendor[1]') AND item_src_ref_date BETWEEN '$startdate' AND '$enddate'"; }   
          elseif($num==3) { $sql="SELECT * FROM `stock` WHERE item_curloc IN ('$vendor[0]','$vendor[1]','$vendor[2]') AND item_src_ref_date BETWEEN '$startdate' AND '$enddate'"; }
          elseif($num==4) { $sql="SELECT * FROM `stock` WHERE item_curloc IN ('$vendor[0]','$vendor[1]','$vendor[2]','$vendor[3]') AND item_src_ref_date BETWEEN '$startdate' AND '$enddate'"; }
          elseif($num==5) { $sql="SELECT * FROM `stock` WHERE item_curloc IN ('$vendor[0]','$vendor[1]','$vendor[2]','$vendor[3]','$vendor[4]') AND item_src_ref_date BETWEEN '$startdate' AND '$enddate'"; }
          elseif($num==6) { $sql="SELECT * FROM `stock` WHERE item_curloc IN ('$vendor[0]','$vendor[1]','$vendor[2]','$vendor[3]','$vendor[4]','$vendor[5]') AND item_src_ref_date BETWEEN '$startdate' AND '$enddate'"; }
          elseif($num==7) { $sql="SELECT * FROM `stock` WHERE item_curloc IN ('$vendor[0]','$vendor[1]','$vendor[2]','$vendor[3]','$vendor[4]','$vendor[5]','$vendor[6]') AND item_src_ref_date BETWEEN '$startdate' AND '$enddate'"; }
          elseif($num==8) { $sql="SELECT * FROM `stock` WHERE item_curloc IN ('$vendor[0]','$vendor[1]','$vendor[2]','$vendor[3]','$vendor[4]','$vendor[5]','$vendor[6]','$vendor[7]') AND item_src_ref_date BETWEEN '$startdate' AND '$enddate'"; }
              
     }     
     else{
       $sql="SELECT * FROM `stock` WHERE item_src_ref_date BETWEEN '$startdate' AND '$enddate'";  
     }
     
 }
 
 elseif( isset($_GET['coa']) ){
    $coa=mysqli_real_escape_string($link,$_GET['coa']); 
    if( isset($_GET['vendor']) ){       
      $vendor=$_GET['vendor'];
      $num= count($vendor);
          if($num==1) { $sql="SELECT * FROM `stock` WHERE item_curloc='$vendor[0]' AND item_coa='$coa'"; }             
          elseif($num==2){ $sql="SELECT * FROM `stock` WHERE item_curloc IN ('$vendor[0]','$vendor[1]') AND item_coa='$coa'"; }   
          elseif($num==3){ $sql="SELECT * FROM `stock` WHERE item_curloc IN ('$vendor[0]','$vendor[1]','$vendor[2]') AND item_coa='$coa'"; }
          elseif($num==4){ $sql="SELECT * FROM `stock` WHERE item_curloc IN ('$vendor[0]','$vendor[1]','$vendor[2]','$vendor[3]') AND item_coa='$coa'"; }
          elseif($num==5){ $sql="SELECT * FROM `stock` WHERE item_curloc IN ('$vendor[0]','$vendor[1]','$vendor[2]','$vendor[3]','$vendor[4]') AND item_coa='$coa'"; } 
          elseif($num==6){ $sql="SELECT * FROM `stock` WHERE item_curloc IN ('$vendor[0]','$vendor[1]','$vendor[2]','$vendor[3]','$vendor[4]','$vendor[5]') AND item_coa='$coa'"; }
          elseif($num==7){ $sql="SELECT * FROM `stock` WHERE item_curloc IN ('$vendor[0]','$vendor[1]','$vendor[2]','$vendor[3]','$vendor[4]','$vendor[5]','$vendor[6]') AND item_coa='$coa'"; }
          elseif($num==8){ $sql="SELECT * FROM `stock` WHERE item_curloc IN ('$vendor[0]','$vendor[1]','$vendor[2]','$vendor[3]','$vendor[4]','$vendor[5]','$vendor[6]','$vendor[7]') AND item_coa='$coa'"; }
    }
    else{
      $sql="SELECT * FROM `stock` WHERE item_coa='$coa'"; 
    }
 }
      
 elseif( isset($_GET['vendor']) ){
     $vendor=$_GET['vendor'];
     $num= count($vendor);
          if($num==1){ $sql="SELECT * FROM `stock` WHERE item_curloc='$vendor[0]'"; }              
          elseif($num==2){ $sql="SELECT * FROM `stock` WHERE item_curloc IN ('$vendor[0]','$vendor[1]')"; }   
          elseif($num==3){ $sql="SELECT * FROM `stock` WHERE item_curloc IN ('$vendor[0]','$vendor[1]','$vendor[2]')"; }
          elseif($num==4){ $sql="SELECT * FROM `stock` WHERE item_curloc IN ('$vendor[0]','$vendor[1]','$vendor[2]','$vendor[3]')"; }
          elseif($num==5){ $sql="SELECT * FROM `stock` WHERE item_curloc IN ('$vendor[0]','$vendor[1]','$vendor[2]','$vendor[3]','$vendor[4]')"; }
          elseif($num==6){ $sql="SELECT * FROM `stock` WHERE item_curloc IN ('$vendor[0]','$vendor[1]','$vendor[2]','$vendor[3]','$vendor[4]','$vendor[5]')"; }
          elseif($num==7){ $sql="SELECT * FROM `stock` WHERE item_curloc IN ('$vendor[0]','$vendor[1]','$vendor[2]','$vendor[3]','$vendor[4]','$vendor[5]','$vendor[6]')"; }
          elseif($num==8){ $sql="SELECT * FROM `stock` WHERE item_curloc IN ('$vendor[0]','$vendor[1]','$vendor[2]','$vendor[3]','$vendor[4]','$vendor[5]','$vendor[6]','$vendor[7]')"; }
 }
 
 elseif( isset($_GET['search']) ){
            $search='%'.mysqli_real_escape_string($link,$_GET['search']).'%';  
            $sql="SELECT * FROM `stock` WHERE item_name LIKE '$search' OR item_desc LIKE '$search' OR item_costref LIKE '$search'";
            $result= mysqli_query($link, $sql);
    }
 
 else{
     $sql ='SELECT * FROM `stock`';
 }
 
 /* After creating sql command */
 
 if($sql){
     $result= mysqli_query($link, $sql);
     if($result){
         if(mysqli_num_rows($result)>0){
         while($row= mysqli_fetch_array($result)){
            echo "<tr class='cell' data-toggle='modal' data-target='#i_".$row["item_no"]."'>
            <td></td>          
            <td>".$row["item_name"]."</td> 
            <td>".$row["item_cat"]."</td>
            <td>".$row["item_desc"]."</td>
            <td>".$row["item_qty"]."</td>
            <td>".$row["Unit"]."</td>
            <td>".$row["item_src_name"]."</td>
            <td>".$row["item_src_ref_no"]."</td>
            <td>".$row["item_src_ref_date"]."</td>
            <td>".$row["item_coa"]."</td>
            <td>".$row["item_cop"]."</td>
            <td>".$row["item_cos"]."</td>
            <td>".$row["item_src"]."</td>
            <td>".$row["item_costref"]."</td>
            <td>".$row["item_curloc"]."</td>
            <td>".$row["item_locdet"]."</td>    
            </tr>";
            echo "
            <div id='i_".$row["item_no"]."' class='modal fade' role='dialog'>
            <div class='modal-dialog'>
            <div class='modal-content'>

            <form method='post' action='backend/issue_script.php' id='issue'>

            <div class='modal-header modal-head-style'>
            <button type='button' class='close' data-dismiss='modal'>&times;</button>
            <h4 class='modal-title'><center><strong>".$row["item_name"]."</strong></center></h4>
            </div>
                        
            <div class='modal-body'>            
            <div class='row'>               
            <div class='col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-4 col-md-4 col-sm-4 col-xs-4'>
            <div class='form-group'>
            <label for='date' class='label-style'>Date:</label><input type='date' form='issue' id='date' required='true' name='date' class='form-control field-length'/>
            </div>
            <div class='form-group'><label for='item-id' class='label-style'>Item ID</label>
            <input type='number' form='issue' id='item-id' name='i_id' value='".$row["item_no"]."' class='form-control field-length' readonly>               
            </div>
            </div>                       
            <div class='col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2 col-lg-4 col-md-4 col-sm-4 col-xs-4'>
            <div class='form-group'>
            <label for='j_id' class='label-style'>Job ID</label>
            <input type='number' form='issue' id='j_id' name='j_id' class='form-control field-length' required='true'>
            </div>
            <div class='form-group'>
            <label for='qty' class='label-style'>Quantity Required</label> 
            <input type='number' form='issue' id='qty' name='qty' class='form-control field-length' required='true'>
            </div>           
            </div>
            </div>                     
            </div>

            <div class='modal-footer'>
            <center>
            <div class='form-group'>
            <input type='submit' class='btn btn-success btn-issue' value='ISSUE'>
            </div>
            </center>
            </div>
            
            </form>
 
            </div>
            </div>
            </div>
            ";
          }
         }
         else{
             echo"<tr> No Result </tr>";
         }
     }
     else{
         die( "<tr>".mysqli_error($link)."</tr>" );
     }
 }