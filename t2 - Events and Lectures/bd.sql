drop database if exists web20182events;
create database if not exists web20182events;

use web20182events;

-- DOWN
drop table if exists lectures;
drop table if exists events;
drop table if exists users;
-- ENDDOWN

-- UP
create table users(
    id          int primary key auto_increment,
    username    varchar(255),
    password    varchar(255)
);
create table events(
    id          int primary key auto_increment,
    user_id     int,
    event_title varchar(255),
    foreign key (user_id) references users(id) ON DELETE CASCADE
);
create table lectures(
    id            int primary key auto_increment,
    event_id      int,
    lecture_title varchar(255),
    lecture_desc  text,
    foreign key (event_id) references events(id) ON DELETE CASCADE
);
-- ENDUP

-- drop user if exists web20182;
create user if not exists web20182 identified with mysql_native_password by 'web20182';
grant all privileges on web20182events.* to web20182;