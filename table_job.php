<?php require 'backend/connect.php';
?>
<!DOCTYPE html>
<html>
<head>
        <title>Job Table</title>
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
            .tbl-header{
                width: 102%;
            }
            .tbl-content{
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
            td:nth-child(12n+1)::before{
                content: counter(cnt);
            }
            th:nth-child(1){width:45px;}
            th:nth-child(2){width:42px;}
            th:nth-child(3){width:112px;}
            th:nth-child(4){width:130px;}
            th:nth-child(5){width:135px;}
            th:nth-child(6){width:102px;}
            th:nth-child(7){width:102px;}
            th:nth-child(8){width:102px;}
            th:nth-child(9){width:110px;}
            th:nth-child(10){width:110px;}
            th:nth-child(11){width:110px;}
            
            /*row*/
             td:nth-child(12n+1){width:45px;}
            td:nth-child(12n+2){width:42px;}
            td:nth-child(12n+3){width:112px;}
            td:nth-child(12n+4){width:130px;}
            td:nth-child(12n+5){width:135px;}
            td:nth-child(12n+6){width:102px;}
            td:nth-child(12n+7){width:102px;}
            td:nth-child(12n+8){width:102px;}
             td:nth-child(12n+9){width:110px;}
              td:nth-child(12n+10){width:110px;}
               td:nth-child(12n+11){width:110px;}
            /* filter button */           
             .btn-filter{               
                width: 100px;
             }
             .btn-filter:hover{
                 background-color: rgba(99, 33, 165, 0.4);
             }
             
              /* search bar */
             .search{
              width: 350px;
              padding: 0px;
          }
          /* modal*/
           .modal-head-style{
              background-color: #121730;
              color:white;
          }
          .modal-content{
              background-color: #111111;
              color: whitesmoke;
          }
          .close{
              color: #fff;
              
          }
        </style>
        
        <script type="text/javascript">
        
        </script>
      
</head>
<body>

    <?php  require 'backend/navbar.php';
       
           ?>
    
    
    <div id="main">
    <form method='get' action='table_job.php' id='col'>
        <section><h1>PROJECT INVENTORY</h1>
     <div>
          <table cellpadding='0' cellspacing='0' class='tbl-header'>
          <thead>                       
          <tr>
          <th>No:</th>
          <th>Job ID</th>
          <th>Customer</th>
          <th>Job Type</th> 
          <th>Description</th>         
          <th>Reg-Date</th>
          <th>Start date</th>
          <th>End date</th>
          <th>Job value</th>
          <th>Expected Cost</th>
          <th>Profit</th>
          <th>Doc Ref</th>
          </tr></thead>
      </table>
      </div><div class='tbl-content'><table>
      <tbody>

          <?php require 'backend/table_job_script.php' ?>
          
      </tbody>     
      </table>                     
      </div>               
    <!--  <div style="float:right;">
          <input type="submit" value='filter' form='col' class="btn btn-success btn-filter">
      </div> -->
      </section>
        </form>     
        <div class='container' style="margin-left: 12%;">
            <div class="row">
                <div class="col-lg-offset-3 col-lg-5">
                    <form method="get" action="table_job.php" id='search'>
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
