CREATE DATABASE plancy;

USE plancy;

create table users
(
    id       int,
    login    varchar(255) not null,
    password varchar(255) not null
);

create unique index users_id_uindex
    on users (id);

create unique index users_login_uindex
    on users (login);

alter table users
    add constraint users_pk
        primary key (id);

alter table users
    modify id int auto_increment;

INSERT INTO users
VALUES (1, 'root', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785');

create table textareas
(
    id      int,
    text    varchar(255) not null
);

create unique index textareas_id_uindex
    on textareas (id);

alter table textareas
    add constraint textareas_pk
        primary key (id);

alter table textareas
    modify id int auto_increment;

INSERT INTO textareas
VALUES
(1, 'We have a powerful iPhone calendar app on our hands here – meetings, locations, notes, tasks…everything under one roof.'),
(2, 'When it comes to combining both tasks lists and calendar events into one, the Plancy app currently does it best.'),
(3, 'Plancy gets close to being my ideal iPhone calendar app for the current state of calendar and reminders clients.');
