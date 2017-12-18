<?php

require ("config.php");

//Note that we put extra quotes around values
$query="                                           
select name, surname,
		COALESCE((SELECT sum(amount) from customers as C
				left join payment as P
						on C.customer_id = P.customer_id
				where C.customer_id = (SELECT selectedcustomer
						FROM users as U WHERE U.userid = 1)),
		CAST(0 as money))
		-
		COALESCE((SELECT sum(price) from customers as C
				left join worked as W
						on C.customer_id = W.customer_id
				where C.customer_id = (SELECT selectedcustomer
						FROM users as U WHERE U.userid = 1)),
		CAST(0 as money))
		as openaccount
from customers
where customer_id = (SELECT selectedcustomer
		FROM users as U WHERE U.userid = 1);";

$result = pg_query($query);

$row = pg_fetch_object($result);

echo "<div class='row header'>
<div class='cell'>
    Name
</div>
<div class='cell'>
    Surname
</div>
<div class='cell'>
    OpenAccount
</div>
</div>";

while($row) {
echo "<div class='row'>"; 
echo "<div class='cell'> $row->name </div>";
echo "<div class='cell'> $row->surname </div>";
echo "<div class='cell'> $row->openaccount </div>"; 
echo "</div>";
$row = pg_fetch_object($result);
}
pg_free_result($result);
pg_close($dbconn);
?>