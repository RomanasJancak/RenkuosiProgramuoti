-- 1 lentele 
select distinct
	users.name,
    users.surname,
    roles.name as role_name
from users
inner join users_roles_permissions
	on users.id=users_roles_permissions.user_id
INNER JOIN roles
	ON users_roles_permissions.role_id=roles.id;
ORDER BY users.id;
-- 2 lentele 
SELECT 
	permissions.name AS permissions_name,
    roles.name AS roles_name
FROM
	permissions
INNER JOIN users_roles_permissions
    ON permissions.id=users_roles_permissions.permission_id
INNER JOIN roles
	ON users_roles_permissions.role_id=roles.id;
-- 3 lentele
SELECT 
	users.name,
    users.surname,
    permissions.name AS permissions_name
FROM
	users
INNER JOIN users_roles_permissions
	ON users.id=users_roles_permissions.user_id
INNER JOIN permissions
	ON users_roles_permissions.permission_id=permissions.id
    ORDER BY users.id;
-- 4 lentele 
SELECT 
	users.name,
    users.surname,
    permissions.name AS permissions_name,
    roles.name AS role_name
FROM
	users
INNER JOIN users_roles_permissions
	ON users.id=users_roles_permissions.user_id
INNER JOIN permissions
	ON users_roles_permissions.permission_id=permissions.id
INNER JOIN roles
	ON users_roles_permissions.role_id=roles.id
    ORDER BY users.id;
-- 5 lentele 
SELECT 
users.id,
users.name,
users.surname,
roles.id,
roles.name,
roles.description,
permissions.id,
permissions.name,
permissions.description
FROM permissions,users,roles
WHERE permissions.id < 4
ORDER BY permissions.id ASC,users.id ASC,roles.id ASC;
-- 6 lentele
SELECT 
	users.name,
    users.surname,
	permissions.name AS permissions_name,
    roles.name AS roles_name
FROM
	users
INNER JOIN
	users_roles_permissions
    ON users.id=users_roles_permissions.user_id
INNER JOIN
	permissions
    ON users_roles_permissions.permission_id=permissions.id
INNER JOIN
	roles
    ON users_roles_permissions.role_id=roles.id
WHERE users.name='moderatorius';
-- 7 lentele
SELECT 
	users.name,
    users.surname,
    permissions.name AS permissions_name
FROM 
	users
LEFT JOIN
	users_roles_permissions
    ON users.id=users_roles_permissions.user_id
LEFT JOIN
	permissions
    ON users_roles_permissions.permission_id=permissions.id;
-- 8 lentele
SELECT
	l1.name AS _1lygis,
    l2.name AS _2lygis,
    l3.name AS _3lygis,
    l4.name AS _4lygis,
	l5.name AS _5lygis,
	l6.name AS _6lygis,
	l7.name AS _7lygis,
	l8.name AS _8lygis
FROM categories AS l1
LEFT JOIN
	categories  AS l2
    ON l1.id=l2.parent_id
    AND l1.parent_id=0
LEFT JOIN
	categories  AS l3
    ON l2.id=l3.parent_id
LEFT JOIN
	categories  AS l4
    ON l3.id=l4.parent_id
LEFT JOIN
	categories  AS l5
    ON l4.id=l5.parent_id
LEFT JOIN
	categories  AS l6
    ON l5.id=l6.parent_id
LEFT JOIN
	categories  AS l7
    ON l6.id=l7.parent_id
LEFT JOIN
	categories  AS l8
    ON l7.id=l8.parent_id
WHERE l1.parent_id=0;
-- 9 lentele
SELECT
	l1.name AS _1lygis,
    l2.name AS _2lygis,
    l3.name AS _3lygis
FROM categories AS l1
LEFT JOIN
	categories  AS l2
    ON l1.id=l2.parent_id
    AND l1.parent_id=0
LEFT JOIN
	categories  AS l3
    ON l2.id=l3.parent_id
WHERE l1.parent_id=0;
