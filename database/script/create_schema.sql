create database workstocks;

CREATE USER 'workstocks_user'@'localhost' IDENTIFIED BY 'workstocks_password';
GRANT ALL PRIVILEGES ON * . * TO 'workstocks_user'@'localhost';