
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `role` varchar(30) UNIQUE NOT NULL,
  `datecreated` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(30) UNIQUE NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `role_id` int(11) NOT NULL,
  `datecreated` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (role_id) REFERENCES role(id)
);


Host ec2-54-216-155-253.eu-west-1.compute.amazonaws.com
Database d1l8hcsnv1q2ol
User jtdmhrhesrgotj
Port 5432
Password c2151a0bc70f754f58934f0dabd7ce48e3594107c91301ebe01a2b871561f5fc
URI postgres://jtdmhrhesrgotj:c2151a0bc70f754f58934f0dabd7ce48e3594107c91301ebe01a2b871561f5fc@ec2-54-216-155-253.eu-west-1.compute.amazonaws.com:5432/d1l8hcsnv1q2ol
Heroku CLI
heroku pg:psql postgresql-tetrahedral-18711 --app my-auto-shop