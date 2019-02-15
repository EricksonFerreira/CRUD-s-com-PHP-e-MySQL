drop database if exists web20182tasklist;
create database if not exists web20182tasklist;

use web20182tasklist;

-- DOWN
drop table if exists tasks;
drop table if exists users;
-- ENDDOWN

-- UP
create table users(
    id          int primary key auto_increment,
    username    varchar(255),
    password    varchar(255)
);
create table tasks(
    id      int primary key auto_increment,
    user_id int,
    task    varchar(255),
    done    boolean,
    foreign key (user_id) references users(id) ON DELETE CASCADE
);
-- ENDUP

drop user if exists web20182;
create user web20182 identified with mysql_native_password by 'web20182';
grant all privileges on web20182tasklist.* to web20182;