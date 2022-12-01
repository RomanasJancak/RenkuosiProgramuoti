-- 1 Lentele
SELECT 
	employees.lastName,
    employees.firstName,
    offices.country AS 'country'
FROM employees,offices
WHERE employees.officeCode IN (SELECT officeCode FROM offices WHERE country='USA') AND employees.officeCode=offices.officeCode;
-- 2 Lentele
SELECT
	customers.customerNumber AS cN,
	customers.customerName    ,
	payments.checkNumber,
    payments.amount
FROM
	customers,payments
WHERE payments.amount = (
    SELECT MAX(payments.amount) FROM payments) AND customers.customerNumber = payments.customerNumber;
-- 3 Lentele
SELECT 
	customers.customerName    ,
	payments.checkNumber,
    payments.amount,
    (SELECT AVG(payments.amount) FROM payments) AS average
FROM
	customers,payments
WHERE payments.amount > (
    SELECT AVG(payments.amount) FROM payments) AND customers.customerNumber = payments.customerNumber;
-- 4 Lentele
SELECT 
	customers.customerName,
    IF((SELECT COUNT(payments.customerNumber) FROM payments WHERE payments.customerNumber=customers.customerNumber) =0,'no orders',(SELECT COUNT(payments.customerNumber) FROM payments WHERE payments.customerNumber=customers.customerNumber)) AS noOrders
FROM
	customers
WHERE 
	NOT customers.customerNumber IN (SELECT payments.customerNumber FROM payments);
-- 5 Lentele
SELECT
	'Prekių skaičius užsakymuose' AS Title,
	MAX(t1.items) AS MAX_,
    MIN(t1.items) AS MIN_,
    TRUNCATE(AVG(t1.items),0) AS AVG_
FROM (SELECT COUNT(t2.orderNumber) items 
      FROM orderdetails AS  t2 GROUP BY orderNumber) AS t1;
-- 6 Lentele
SELECT
    AVG(t2.buyPrice) AS items,
    t2.productLine
FROM products AS  t2 
GROUP BY t2.productLine ;
