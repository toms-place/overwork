SELECT 
	(SELECT name
	 FROM customers
	 WHERE customer_id = all (
		SELECT selectedcustomer
		FROM users
		WHERE userid = 1)),
	(SELECT name
	 FROM customers
	 WHERE customer_id = all (
		SELECT selectedcustomer
		FROM users
		WHERE userid = 1)),
	sum(worked.price)-
	COALESCE((SELECT sum(payment.amount)
		FROM payment
		NATURAL JOIN customers
		WHERE customer_id = all (
			SELECT selectedcustomer FROM users
			WHERE userid = 1)), CAST(0 as money))
		AS openAccount
FROM worked
NATURAL JOIN customers
WHERE customer_id = all (
SELECT selectedcustomer FROM users
WHERE userid = 1);




select name, sum(W.price) as W, sum(P.amount) as P from customers as C
left join worked as W on C.customer_id = W.customer_id

left join payment as P on C.customer_id = P.customer_id

group by name;