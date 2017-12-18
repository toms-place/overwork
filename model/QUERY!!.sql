SELECT 
	(SELECT name
	 FROM customers
	 WHERE customer_id = all ( SELECT selectedcustomer FROM users WHERE userid = 1)),
	(SELECT surname
	 FROM customers
	 WHERE customer_id = all ( SELECT selectedcustomer FROM users WHERE userid = 1)),
	COALESCE((sum(worked.price)), CAST(0 as money))
	-
	COALESCE((SELECT sum(payment.amount)
	 FROM payment
	 NATURAL JOIN customers
	 WHERE customer_id = all ( SELECT selectedcustomer FROM users WHERE userid = 1)), CAST(0 as money))
	 AS openAccount
FROM worked
NATURAL JOIN customers
WHERE customer_id = all ( SELECT selectedcustomer FROM users WHERE userid = 1);




select name, coalesce(sum(W.price), CAST(0 as money)) as W, coalesce(sum(P.amount), CAST(0 as money)) as P from customers as C
left outer join worked as W on C.customer_id = W.customer_id

left outer join payment as P on C.customer_id = P.customer_id

group by name;




select U.username, C.name, sum(P.amount) as payed, sum(W.price) as worked
from worked as W
inner join users as U
on U.userid = W.userid
inner join customers as C
on U.userid = C.customer_id
inner join pament as P
on U.userid = C.customer_id
where C.customer_id = selectedcustomer and C.userid = U.customer_id
group by U.username, C.name;







//latestnight
create table customers (
	customer_id serial primary key,
    name varchar(30) NOT NULL,
    registered_since date default now() NOT NULL,
    CONSTRAINT UC_Customer UNIQUE (customer_id, name)
);

create table users (
    user_id serial primary key,
    name varchar(30) NOT NULL,
    registered_since date default now() NOT NULL,
    CONSTRAINT UC_User UNIQUE (user_id, name)
);

create table payment (
    payment_id serial primary key,
    customer_id integer,
	user_id integer,
    amount money default '20.00' NOT NULL,
	dateofpayment date default now() NOT NULL,
    FOREIGN KEY (customer_id) REFERENCES customers(customer_id),
	FOREIGN KEY (user_id) REFERENCES users(user_id)
);

create table worked (
    worked_id serial primary key,
    user_id integer,
	customer_id integer,
    price money default '15.00' NOT NULL,
	dateofworked date default now() NOT NULL,
	FOREIGN KEY (customer_id) REFERENCES customers(customer_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

create table Account (
    account_id serial primary key,
    user_id integer,
    customer_id integer,
    payment_id integer,
    worked_id integer,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (customer_id) REFERENCES customers(customer_id),
    FOREIGN KEY (payment_id) REFERENCES payment(payment_id),
    FOREIGN KEY (worked_id) REFERENCES worked(worked_id)
);

insert into users (name) values('User4');
insert into customers (name) values('Customer3');
insert into worked (user_id, customer_id, price) values(3,3, 50.00);
insert into payment (customer_id, user_id, amount) values(3,3, 60.00);



select C.name, U.name, sum(P.amount) from payment as P
join customers as C
	on C.customer_id = P.customer_id
join users as U
	on U.user_id = P.user_id
where U.user_id = 1
and C.customer_id = 2
group by U.name, C.name;

select U.name, C.name, sum(W.price) from worked as W
join users as U
	on U.user_id = W.user_id
join customers as C
	on C.customer_id = W.customer_id
where U.user_id = 1
and C.customer_id = 2
group by U.name, C.name;



select COALESCE((select sum(W.price) from worked as W
join users as U
	on U.user_id = W.user_id
join customers as C
	on C.customer_id = W.customer_id
where U.user_id = 1
and C.customer_id = 3), CAST(0 as money)) -
COALESCE((select sum(P.amount) from payment as P
join customers as C
	on C.customer_id = P.customer_id
join users as U
	on U.user_id = P.user_id
where U.user_id = 1
and C.customer_id = 3), CAST(0 as money))
as openAccount
;



select U.name, C.name, sum(W.price) from worked as W
join users as U
	on U.user_id = W.user_id
join customers as C
	on C.customer_id = W.customer_id
where U.user_id = 1
and C.customer_id = 2
group by U.name, C.name;


insert into worked (user_id, customer_id, price) values(1,(SELECT selectedcustomer FROM users as U WHERE U.user_id = 1), 50.00);




select sum(price)
from customers as C
join worked as W
on C.customer_id = W.customer_id
where W.customer_id = (SELECT selectedcustomer FROM users as U WHERE U.userid = 1);



select sum(amount)
from customers as C
join payment as P
on C.customer_id = P.customer_id
where P.customer_id = (SELECT selectedcustomer FROM users as U WHERE U.userid = 1);

///////


SELECT sum(P.amount), sum(W.price) from customers as C
join payment as P
on C.customer_id = P.customer_id
join worked as W
on C.customer_id = W.customer_id
where C.customer_id = (SELECT selectedcustomer FROM users as U WHERE U.userid = 1)
and not P.customer_id = W.customer_id;


SELECT * from customers as C
left join payment as P
on C.customer_id = P.customer_id
left join worked as W
on C.customer_id = W.customer_id
where C.customer_id = (SELECT selectedcustomer FROM users as U WHERE U.userid = 1)
;

select name, surname,
(SELECT sum(amount) from customers as C
left join payment as P
on C.customer_id = P.customer_id
where C.customer_id = (SELECT selectedcustomer FROM users as U WHERE U.userid = 1))
-
(SELECT sum(price) from customers as C
left join worked as W
on C.customer_id = W.customer_id
where C.customer_id = (SELECT selectedcustomer FROM users as U WHERE U.userid = 1))
as openaccount
from customers
where customer_id = (SELECT selectedcustomer FROM users as U WHERE U.userid = 1);



                                         
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
		FROM users as U WHERE U.userid = 1);