-- users
create table users
(
    id        int auto_increment
        primary key,
    username  varchar(255) null,
    firstname varchar(255) null,
    lastname  varchar(255) null,
    password  varchar(255) null
);

-- notes
create table notes
(
    id      int auto_increment
        primary key,
    user_id varchar(255) null,
    date    datetime     null,
    text    varchar(255) null,
    deleted bool default false null
);