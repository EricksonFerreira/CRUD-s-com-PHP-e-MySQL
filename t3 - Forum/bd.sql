drop database if exists web20182forum;
create database if not exists web20182forum;

use web20182forum;

-- DOWN
drop table if exists messages;
drop table if exists topics;
drop table if exists users;
-- ENDDOWN

-- UP
create table users(
    id          int primary key auto_increment,
    email       varchar(255),
    username    varchar(255),
    password    varchar(255)
);
create table topics(
    id         int primary key auto_increment,
    user_id    int,
    title      varchar(255),
    created_at timestamp default current_timestamp,
    foreign key (user_id) references users(id) ON DELETE CASCADE
);
create table messages(
    id         int primary key auto_increment,
    user_id    int,
    topic_id   int,
    message    text,
    created_at timestamp default current_timestamp,
    foreign key (user_id) references users(id) ON DELETE CASCADE,
    foreign key (topic_id) references topics(id) ON DELETE CASCADE
);
-- ENDUP

-- drop user if exists web20182;
create user if not exists web20182 identified with mysql_native_password by 'web20182';
grant all privileges on web20182forum.* to web20182;