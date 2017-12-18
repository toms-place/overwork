<?php

require ("config.php");

$selectCustomer = test_input($_POST[getCustomerNamesAsOptions]);

//tests input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  };

  if(!empty($selectCustomer))
  {
      //defines query
        $insertquery="update users set selectedCustomer = $selectCustomer where UserID = 1";

        $result = pg_query($insertquery); 

        if ($result){
            echo "getSelectedCustomer";
        }
  } else {
        echo "e100";    
  }


?>