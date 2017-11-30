my first database application!

functionality:
add customers and then add the time you worked for them
then you should be possible to see how much money you will get from them

db setup - sql tables:

create table customers (
    name varchar(30) NOT NULL,
    surname varchar(50) NOT NULL,
    adress varchar(200),
    registered_since date default now(),
    customer_id serial primary key,
    CONSTRAINT UC_Customer UNIQUE (name, surname, adress)
);

create table worked (
    customer_id integer,
    date date NOT NULL,
    minutesWorked interval NOT NULL,
    price money default '15.00' NOT NULL,
    worked_id serial primary key,
    FOREIGN KEY (customer_id) REFERENCES customers(customer_id)
);

create table payment (
    customer_id integer,
    date date NOT NULL,
    amount money NOT NULL,
    payed_id serial primary key,
    FOREIGN KEY (customer_id) REFERENCES customers(customer_id)
);

create table users (
    UserID serial primary key,
    selectedCustomer integer
);
