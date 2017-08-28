<?php 
     require 'backend/connect.php';

?>
<!DOCTYPE html>
<html>
<head>
        <title>Stock Table</title>
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
                             

            /*below class is for table*/ 
            .tbl-content{
                width:102%;
            }
            .tbl-header{
                width: 102%;
            }
            table{
                counter-reset: cnt;
            }
            .cell{
              counter-increment: cnt;  
            }
            .cell:hover{
                background-color: #3e4a60;
                cursor: default;                              
            }
            td:nth-child(17n+1)::before{
                content: counter(cnt);
            }
                th:nth-child(1){width:30px;}
                th:nth-child(2){width:80px;}
                th:nth-child(3){width:80px;}
                th:nth-child(4){width:100px;}
                th:nth-child(5){width:50px;}
                th:nth-child(6){width:45px;}
                th:nth-child(7){width:61px;}
                th:nth-child(8){width:70px;}
                th:nth-child(9){width:88px;}
                th:nth-child(10){width:85px;}
                th:nth-child(11){width: 65px;}
                th:nth-child(12){width: 69px;}
                th:nth-child(13){width: 70px;}
                th:nth-child(14){width: 100px;}
                th:nth-child(15){width:70px;}
                th:nth-child(16){width:80px;}
                /*row*/
                
                td:nth-child(17n+1){width:30px;}
                td:nth-child(17n+2){width:80px;}
                td:nth-child(17n+3){width:85px;}
                td:nth-child(17n+4){width:100px;}
                td:nth-child(17n+5){width:50px;}
                td:nth-child(17n+6){width:45px;}
                td:nth-child(17n+7){width:61px;}
                td:nth-child(17n+8){width:70px;}
                td:nth-child(17n+9){width:88px;}
                td:nth-child(17n+10){width:85px;}
                td:nth-child(17n+11){width:65px;}
                td:nth-child(17n+12){width:69px;}
                td:nth-child(17n+13){width:70px;}
                td:nth-child(17n+14){width:100px;}
                td:nth-child(17n+15){width:70px;}
                td:nth-child(17n+16){width:80px;}
          /* styling for coa list  */
         .styled-select {           
            height: 34px;
            overflow: hidden;
            width: 60px;
            background-color: #111111;
            
             }
           .styled-select select {
            background: transparent;
            border: none;
            font-size: 14px;
            height: 34px;
            padding: 8px; /* If you add too much padding here, the options won't show in IE */
            width: 100px;
            }  
            .semi-square {
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px; 
             } 
             /* vendor*/
             .dropdown-menu>li:hover{
                 background-color: white;
                
             }
             .date{
                 width:65px;
                 background-color: #111111;
                 color: white; 
                 border: 1px solid rgba(255, 255, 255, 0.5);
                 border-radius: 10%;                               
             }
             .vendor{
                 color:white;
                 padding:0px;
                 text-decoration: none;
                 background-color: #111111;
                 border: 1px solid rgba(255, 255, 255, 0.5);
                 border-radius: 10%;
                 height: 35px; 
             }
             .vendor:hover{
               text-decoration: none;
               color: green;
             }
             .vendor:active{
               text-decoration: none;
               color: green;
             }
             
             .vendor:focus{
                 text-decoration: none;
                 color: green;
             }
             .vendor:checked{
                 text-decoration: none;
                 color: green;
             }
             
             .btn-filter{               
                width: 100px;
                
             }
             .btn-filter:hover{
                 background-color: rgba(99, 33, 165, 0.4);
             }
             .filter{
               float:right;  
             }
              /* search bar */
             .search{
              width: 350px;
              padding: 0px;
          }
             /*style for input in modal*/
          #item-id{
            
             cursor: not-allowed;
          }
          .field-length{
              width: 150px;
          }
          .label-style{
              color:whitesmoke;
          }
          .modal-head-style{
              background-color: #121730;
              color:white;
          }
          .modal-content{
              background-color: #111111;
          }
          .close{
              color: #fff;
              
          }
          .btn-issue{
              width: 200px;
              background-color: #309160;
          }
             
        </style>
        
        <script type="text/javascript">
        
        </script>
      
</head>
<body>
    
    <?php  
    require 'backend/navbar.php';
    
    ?>      
    
        <div id="main">
        <section><h1>STOCK INVENTORY</h1>
            <div><form method='get' action='table_stock.php' id='col'>
                    <div class="filter"><input type="submit" class="btn btn-success btn-filter" value="filter"></div>
          <table cellpadding='0' cellspacing='0' class='tbl-header'>
          <thead>
            
          <tr>
          <th>No:</th>
          <th>Name</th>
          <th>Category</th> 
          <th>Description</th>
          <th>qty</th>
          <th>Unit</th>
          <th>Store</th>
          <th>SrcRef</th>
          <th>
              <input type="text" name="startdate" placeholder="Start Date" class='date form-group' onfocus="(this.type='date')"/>
              <br>
              <input type="text" name="enddate" placeholder="End Date" class='date form-group' onfocus="(this.type='date')"/>
          </th>
          <th>     
              <select form='col' name="coa" class="styled-select semi-square">
                   <option selected disabled>COA</option>
                   <?php
                   $sql ='SELECT * FROM `conditions`';
                   $result = mysqli_query($link2,$sql);
                   if ($result->num_rows > 0) {
                   while($row = $result->fetch_assoc()) { ?>
                   <option value="<?php echo $row["condition"]; ?>">
                   <?php echo $row["condition"]; ?> </option>
                   <?php }} ?>
              </select>
          </th>
          <th>COP</th>
          <th>COS</th>
          <th>cost</th>
          <th>Document Ref</th>
          <th>
                <div class="btn-group">    
                    <a href="#" data-toggle="dropdown" class="dropdown dropdown-toggle vendor">Vendor
                <span class="caret"></span></a>               
                <ul class="dropdown-menu" role="menu">                       
                <?php
                $sql ='SELECT * FROM `vendor`';
                $result = mysqli_query($link2,$sql);
                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) { ?>
                <li><input type="checkbox" form='col' name='vendor[]' value='<?php echo $row["vendor_name"]; ?>' id='<?php echo $row["id"];?>'>
                <label for='<?php echo $row["id"]; ?>' style="color:green;">
                <?php echo $row["vendor_name"]; ?> </label></li>
                <?php }} ?>                                              
                </ul>              
                </div>  
         </th> 
          <th>Locdetails</th>
          </tr></thead>
      </table>
      </form>
      </div><div class='tbl-content'><table>
      <tbody>
    
    
      <?php require 'backend/table_stock_script.php'; ?>
      </tbody>     
      </table>                     
      </div>     
      </section>
            
        <div class='container' style="margin-left: 12%;">
            <div class="row">
                <div class="col-lg-offset-3 col-lg-5">
                    <form method="get" action="table_stock.php" id='search'>
                        <div class="form-group">
                            <h6 style="color:white;margin-left:15%;">*blank search to see the complete table*</h6>                            
                            <input type="text" form='search' name="search" class='search'>
                            <input type="submit" form='search' value="search" class="btn btn-info" style="width: 100px; color:black;">
                        </div>
                    </form>
                </div>
            </div>
        </div>  
        </div>

    </body>
</html>
