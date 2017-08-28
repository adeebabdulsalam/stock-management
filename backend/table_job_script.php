<?php 
    require 'connect.php';
    if(!isset($_SESSION['id'])){
        header("location: ../login.php");
    }
    if( !empty($_GET['search']) ){
            $search='%'.mysqli_real_escape_string($link,$_GET['search']).'%';  
            $sql="SELECT * FROM `job` WHERE customer LIKE '$search' OR job_desc LIKE '$search' OR doc_ref LIKE '$search'";
            $result= mysqli_query($link, $sql);
    }
    else{
    $sql ='SELECT * FROM `job`';
    $result= mysqli_query($link, $sql);
    }
 /* After creating sql command */
 
 if($sql){
     if($result){
        if(mysqli_num_rows($result)>0){
         while($row= mysqli_fetch_array($result)){
            echo "<tr class='cell' data-toggle='modal' data-target='#i_".$row["id"]."'>
            <td></td>          
            <td>".$row["id"]."</td> 
            <td>".$row["customer"]."</td>
            <td>".$row["type"]."</td>
            <td>".$row["job_desc"]."</td>
            <td>".$row["date"]."</td>
            <td>".$row["start_date"]."</td>
            <td>".$row["end_date"]."</td>
            <td>".$row["value"]."</td>
            <td>".$row["cost_exp"]."</td>
            <td>".$row["profit_prj"]."</td>
            <td>".$row["doc_ref"]."</td>   
            </tr>";
             $j_id=$row['id'];
             $sql2="SELECT * FROM issue i INNER JOIN job j ON i.job_id=j.id WHERE i.job_id='$j_id'";
             $result2= mysqli_query($link, $sql2);
             $total=0;
            echo "
            <div id='i_".$row["id"]."' class='modal fade' role='dialog'>
            <div class='modal-dialog'>
            <div class='modal-content'>

            <div class='modal-header modal-head-style'>
            <button type='button' class='close' data-dismiss='modal'>&times;</button>
            <h4 class='modal-title'><center><strong>ITEMS ISSUED</strong></center></h4>
            </div>
                        
            <div class='modal-body'>
            <div class='row'>
            <div class='col-lg-offset-1 col-lg-2'>Item Name
            </div>
            <div class='col-lg-offset-1 col-lg-2'>Quantity
            </div>
            <div class='col-lg-offset-1 col-lg-2'>Date issued
            </div>
            <div class='col-lg-offset-1 col-lg-2'>Cost
            </div>
            </div><hr width='500px'>";
            
            while($row2=mysqli_fetch_array($result2)){              
                $itemid=$row2[2];              
                $sql3= "SELECT * FROM issue i INNER JOIN stock s ON i.item_id=s.item_no WHERE s.item_no='$itemid'";              
                $result3= mysqli_query($link, $sql3);
                $row3= mysqli_fetch_array($result3);
                $total =($row3[17] * $row3[4]) + $total;
            echo "<div class='row'>               
            
            <div class='col-lg-offset-1 col-lg-2'>
            ".$row3[6]; 
            
            echo "</div><div class='col-lg-offset-1 col-lg-2'>
            ".$row3[4];
            
            echo"</div><div class='col-lg-offset-1 col-lg-3'>".$row3[1];
            
            echo"</div><div class='col-lg-2'>".($row3[17] * $row3[4]);
            
            echo "</div></div>";}
            
            echo" <hr width='500px'>
            <div class='row'><div class='col-lg-offset-1 col-lg-2'><strong>Total</strong></div>
            <div class='col-lg-offset-7 col-lg-2'>".$total."</div>
            </div>
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
 ?>