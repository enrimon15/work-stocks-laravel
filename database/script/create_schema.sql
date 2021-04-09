CREATE USER IF NOT EXISTS 'workstocks_user'@'localhost' IDENTIFIED BY 'workstocks_password';
GRANT ALL PRIVILEGES ON * . * TO 'workstocks_user'@'localhost';

DROP DATABASE IF EXISTS workstocks;
CREATE DATABASE workstocks;
