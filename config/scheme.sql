CREATE DATABASE IF NOT EXISTS camel;

use camel;

CREATE TABLE IF NOT EXISTS users(
  id integer primary key auto_increment,
  email varchar(128) unique not null,
  password varchar(255) not null,
  name varchar(128) not null,
  role varchar(32) not null default 'user',
  last_access datetime
);
