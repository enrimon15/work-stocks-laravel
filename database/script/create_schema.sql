DROP DATABASE IF EXISTS workstocks;
CREATE DATABASE workstocks;

CREATE USER IF NOT EXISTS 'workstocks_user'@'localhost' IDENTIFIED BY 'workstocks_password';
GRANT ALL PRIVILEGES ON workstocks.* TO 'workstocks_user'@'localhost';
