<?php
require 'connect.php';

if ($_POST['i_cop']==0) {
        header('location: ../form_stock.php?cop_error=cop should not be zero');
  
}

else{
$input2=$_POST["i_name"];
$input3=$_POST["i_cat"];
$input4=$_POST["i_desc"];
$input5=$_POST["i_qty"];
$input6=$_POST["i_mes"];
$input7=$_POST["i_store"];
$input8=$_POST["i_refno"];
$input9=$_POST["i_refdate"];
$input10=$_POST["i_coa"];
$input11=$_POST["i_cop"];
$input12=$_POST["i_cos"];
$input13=$_POST["i_cop"] + $_POST["i_cos"];
$input14=$_POST["i_costref"];
$input15=$_POST["i_ven"];
$input16=$_POST["i_locdet"];

$sql = "INSERT INTO stock (`item_name`, `item_cat`, `item_desc`, `item_qty`, `Unit`, `item_src_name`, `item_src_ref_no`, `item_src_ref_date`, `item_coa`, `item_cop`, `item_cos`, `item_src`, `item_costref`, `item_curloc`, `item_locdet`) 
 VALUES ('$input2', '$input3', '$input4', '$input5', '$input6', '$input7', '$input8', '$input9', '$input10', '$input11', '$input12', '$input13', '$input14', '$input15', '$input16')";
 
 if (mysqli_query($link, $sql)){
    echo "New record created successfully";
    header('location: ../form_stock.php?entry=true');
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
    header('location: ../form_stock.php?entry=false');
}
}
 mysqli_close($link);

?>