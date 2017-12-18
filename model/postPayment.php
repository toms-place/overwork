<?php

require ("config.php");

$c_1 = test_input($_POST[c_1]);
$c_2 = test_input($_POST[c_2]);

//tests input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  };

  if(!empty($c_1) && !empty($c_2)) {
        $insertquery="insert into payment (customer_id, date, amount) 
        select (select customer_id from customers 
            where customer_id = all (
                select selectedcustomer from users
                where userid = 1)),
                '$c_1', $c_2; ";
        
        $result = pg_query($insertquery); 

        if ($result){
            echo "payment";
        }
    } else {
        echo "e100";
  }


?>