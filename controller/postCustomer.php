<?php

require ("config.php");

$c_1 = test_input($_POST[c_1]);
$c_2 = test_input($_POST[c_2]);
$c_3 = test_input($_POST[c_3]);

//tests input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  };

  if(!empty($c_1) && !empty($c_2) && !empty($c_3)) {
        $insertquery="insert into customers values('$c_1', '$c_2', '$c_3')";
        
        $result = pg_query($insertquery); 

        if ($result){
            echo "customers";
        }
    } else {
        echo "e100";
  }


?>