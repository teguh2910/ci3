Latihan CRUD Sederhana dengan CodeIgniter3

#Windows User
-Install XAMPP
-Git Clone https://github.com/teguh2910/ci3
-cd ci3
-setting config db
-sql script 
#####
CREATE TABLE `people` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
#####
#Happy Coding
