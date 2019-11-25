CREATE DATABASE IF NOT EXISTS zxcinemaxz DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE zxcinemaxz
SET foreign_key_checks = 0;
DROP TABLE IF EXISTS Schedule_seat;
DROP TABLE IF EXISTS Ticketing_info;
DROP TABLE IF EXISTS Purchase_list;
DROP TABLE IF EXISTS Seat;
DROP TABLE IF EXISTS Movie_schedule;
DROP TABLE IF EXISTS Food_salelist;
DROP TABLE IF EXISTS Schedule;
DROP TABLE IF EXISTS Equipment;
DROP TABLE IF EXISTS Accounts_management;
DROP TABLE IF EXISTS Stock;
DROP TABLE IF EXISTS Store_menu;
DROP TABLE IF EXISTS Theater;
DROP TABLE IF EXISTS Equipment;
DROP TABLE IF EXISTS Accounts_management;
DROP TABLE IF EXISTS Stock;
DROP TABLE IF EXISTS Store_menu;
DROP TABLE IF EXISTS Theater;
DROP TABLE IF EXISTS Customer_info;
DROP TABLE IF EXISTS Movie_review;
DROP TABLE IF EXISTS Movie_genre;
DROP TABLE IF EXISTS Movie_director;
DROP TABLE IF EXISTS Movie_studio;
DROP TABLE IF EXISTS Movie_actor;
DROP TABLE IF EXISTS Coupon_box;
DROP TABLE IF EXISTS Employee;
DROP TABLE IF EXISTS Cinema;
DROP TABLE IF EXISTS Movie;
DROP TABLE IF EXISTS Genre;
DROP TABLE IF EXISTS Employee;
DROP TABLE IF EXISTS Director;
DROP TABLE IF EXISTS Studio;
DROP TABLE IF EXISTS Actor;
DROP TABLE IF EXISTS Customer_rank;
DROP TABLE IF EXISTS Coupon;
DROP TABLE IF EXISTS Department;
DROP TABLE IF EXISTS Notice;
SET foreign_key_checks = 1;

CREATE TABLE Cinema (
    cinema_id int unsigned not null,
    hp varchar(12) null,
    name varchar(50) not null,
    assets bigint unsigned not null default 0,
    area char(10) not null,
    road_address varchar(50) not null,
    detail_address varchar(50) null,
    CONSTRAINT PK_Cinema PRIMARY KEY(cinema_id)
);

CREATE TABLE Movie (
    movie_id int unsigned not null,
    movie_name char(50) not null,
    rating char(10) not null default '전체관람가',
    running_time smallint not null default 0,
    release_date date null,
    distributor varchar(50) null,
    total_audience int unsigned not null default 0,
    CONSTRAINT PK_Movie PRIMARY KEY(movie_id)
);

CREATE TABLE Genre (
    genre char(10) not null,
    CONSTRAINT PK_Genre PRIMARY KEY(genre)
);

CREATE TABLE Director (
    crew_id int unsigned not null,
    name char(10) not null,
    english_name char(50) null,
    nationality varchar(30) null,
    site varchar(1000) null,
    about_me text(255) null,
    CONSTRAINT PK_Director PRIMARY KEY(crew_id)
);

CREATE TABLE Studio(
    studio_name varchar(50) not null,
    CONSTRAINT PK_Studio PRIMARY KEY(studio_name)
);

CREATE TABLE Actor (
    actor_number int unsigned not null,
    name char(10) not null,
    english_name char(50) null,
    nationality varchar(30) null,
    site varchar(1000) null,
    about_me text(255) null,
    CONSTRAINT PK_Actor PRIMARY KEY(actor_number)
);

CREATE TABLE Customer_rank(
    rank_name  VARCHAR(10) NOT NULL,
    upgrade_standard  TEXT(1000)  NULL,
    CONSTRAINT PK_Customer_rank PRIMARY KEY(rank_name)
);

CREATE TABLE Coupon(
    coupon_name varchar(50) not null,
    type varchar(10) not null,
    discount_rate float not null,
    CONSTRAINT PK_Coupon PRIMARY KEY(coupon_name)
);

CREATE TABLE Department(
    division  CHAR(20)  NOT NULL,
    task  TEXT(255) NULL,
    CONSTRAINT PK_Department PRIMARY KEY(division)
);

CREATE TABLE Customer_info (
    customer_id char(20) not null,
    join_day timestamp not null default current_timestamp,
    password varchar(255) not null,
    customer_name char(20) not null,
    gender int not null,
    road_address varchar(60) null,
    detail_address varchar(180) null,
    customer_hp char(11) not null,
    email_address char(30) null,
    rank_name varchar(10) not null,
    birth_date date not null,
    CONSTRAINT PK_Customer_info PRIMARY KEY(customer_id),
    CONSTRAINT FK_Customer_info FOREIGN KEY(rank_name)
    REFERENCES Customer_rank(rank_name) ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE Movie_review(
    movie_id  INT UNSIGNED  NOT NULL,
    customer_id CHAR(20)  NOT NULL,
    written_time  TIMESTAMP NOT NULL  DEFAULT CURRENT_TIMESTAMP,
    score TINYINT NOT NULL,
    CONSTRAINT PK_Customer_info PRIMARY KEY(movie_id, customer_id),
    CONSTRAINT FK_Customer_info_1 FOREIGN KEY(movie_id)
    REFERENCES Movie(movie_id) ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT FK_Customer_info_2 FOREIGN KEY(customer_id)
    REFERENCES Customer_info(customer_id) ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE Movie_genre (
    genre char(10) not null,
    movie_id int unsigned not null,
    CONSTRAINT PK_Movie_genre PRIMARY KEY(genre, movie_id),
    CONSTRAINT FK_Movie_genre_1 FOREIGN KEY(genre)
    REFERENCES Genre(genre) ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT FK_Movie_genre_2 FOREIGN KEY(movie_id)
    REFERENCES Movie(movie_id) ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE Movie_director (
    crew_id int unsigned not null,
    movie_id int unsigned not null,
    role varchar(50) not null,
    CONSTRAINT PK_Movie_director PRIMARY KEY(movie_id, crew_id),
    CONSTRAINT FK_Movie_director_1 FOREIGN KEY(crew_id)
    REFERENCES Director(crew_id) ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT FK_Movie_director_2 FOREIGN KEY(movie_id)
    REFERENCES Movie(movie_id) ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE Movie_studio (
    studio_name varchar(50) not null,
    movie_id int unsigned not null,
    CONSTRAINT PK_Movie_studio PRIMARY KEY(studio_name, movie_id),
    CONSTRAINT FK_Movie_studio_1 FOREIGN KEY(studio_name)
    REFERENCES Studio(studio_name) ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT FK_Movie_studio_2 FOREIGN KEY(movie_id)
    REFERENCES Movie(movie_id) ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE Movie_actor (
    actor_number int unsigned not null,
    movie_id int unsigned not null,
    role varchar(50) not null,
    CONSTRAINT PK_Movie_actor PRIMARY KEY(actor_number, movie_id),
    CONSTRAINT FK_Movie_actor_1 FOREIGN KEY(actor_number)
    REFERENCES Actor(actor_number) ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT FK_Movie_actor_2 FOREIGN KEY(movie_id)
    REFERENCES Movie(movie_id) ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE Coupon_box (
    coupon_number int unsigned not null,
    customer_id char(20) not null,
    coupon_name varchar(50) not null,
    issue_date timestamp not null default current_timestamp,
    expirate_date datetime not null,
    usage_status tinyint not null default 0,
    CONSTRAINT PK_Coupon_box PRIMARY KEY(coupon_number, customer_id, coupon_name),
    CONSTRAINT FK_Coupon_box_1 FOREIGN KEY(customer_id)
    REFERENCES Customer_info(customer_id) ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT FK_Coupon_box_2 FOREIGN KEY(coupon_name)
    REFERENCES Coupon(coupon_name) ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE Employee(
    employee_id INT UNSIGNED  NOT NULL,
    emplyee_name  CHAR(10)  NOT NULL,
    ssn CHAR(13)  NOT NULL,
    hp  CHAR(11)  NULL,
    hout_wage INT UNSIGNED  NOT NULL  DEFAULT 8350,
    rest_holidays TINYINT NOT NULL  DEFAULT 0,
    account_num CHAR(19)  NOT NULL,
    cinema_id INT UNSIGNED  NOT NULL,
    division  VARCHAR(60) NOT NULL,
    CONSTRAINT PK_Employee PRIMARY KEY(employee_id),
    CONSTRAINT FK_Employee_1 FOREIGN KEY(cinema_id)
    REFERENCES Cinema(cinema_id) ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT FK_Employee_2 FOREIGN KEY(division)
    REFERENCES Department(division) ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE Equipment (
    equip_name char(20) not null,
    cinema_id int unsigned not null,
    amount int unsigned not null,
    CONSTRAINT PK_Equipment PRIMARY KEY(equip_name,cinema_id),
    CONSTRAINT FK_Equipment FOREIGN KEY(cinema_id)
    REFERENCES Cinema(cinema_id) ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE Accounts_management (
    year_quarter char(5) not null,
    cinema_id int unsigned not null,
    expend_salary bigint not null default 0,
    expend_supply bigint not null default 0,
    revenue_store bigint not null default 0,
    revenue_ticket bigint not null default 0,
    expend_admin bigint not null default 0,
    CONSTRAINT PK_Accounts_management PRIMARY KEY(year_quarter,cinema_id),
    CONSTRAINT FK_Accounts_management FOREIGN KEY(cinema_id)
    REFERENCES Cinema(cinema_id) ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE Stock (
    stock_name char(20) not null,
    cinema_id int unsigned not null,
    amount int unsigned not null default 0,
    CONSTRAINT PK_Stock PRIMARY KEY(stock_name,cinema_id),
    CONSTRAINT FK_Stock FOREIGN KEY(cinema_id)
    REFERENCES Cinema(cinema_id) ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE Store_menu (
    menu_id char(10) not null,
    cinema_id int unsigned not null,
    price int unsigned not null,
    salescount int unsigned not null default 0,
    CONSTRAINT PK_Store_menu PRIMARY KEY(menu_id,cinema_id),
    CONSTRAINT FK_Store_menu FOREIGN KEY(cinema_id)
    REFERENCES Cinema(cinema_id) ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE Theater (
    theater_name char(10) not null,
    cinema_id int unsigned not null,
    type_dimension char(10) not null default '일반',
    location varchar(20) null,
    CONSTRAINT PK_Theater PRIMARY KEY(theater_name,cinema_id),
    CONSTRAINT FK_Theater FOREIGN KEY(cinema_id)
    REFERENCES Cinema(cinema_id) ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE Seat (
    seat_number char(3) not null,
    theater_name char(10) not null,
    cinema_id int unsigned not null,
    type_seat char(5) not null default '일반',
    CONSTRAINT PK_Seat PRIMARY KEY(seat_number,theater_name,cinema_id),
    CONSTRAINT FK_Seat_1 FOREIGN KEY(theater_name)
    REFERENCES Theater(theater_name) ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT FK_Seat_2 FOREIGN KEY(cinema_id)
    REFERENCES Theater(cinema_id) ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE Movie_schedule(
    movie_time  DATETIME  NOT NULL,
    theater_name  CHAR(10)  NOT NULL,
    cinema_id INT UNSIGNED  NOT NULL,
    movie_id  INT UNSIGNED  NOT NULL,
    CONSTRAINT PK_Seat PRIMARY KEY(movie_time,theater_name,cinema_id,movie_id),
    CONSTRAINT FK_Movie_schedule_1 FOREIGN KEY(theater_name)
    REFERENCES Theater(theater_name) ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT FK_Movie_schedule_2 FOREIGN KEY(cinema_id)
    REFERENCES Theater(cinema_id) ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT FK_Movie_schedule_3 FOREIGN KEY(movie_id)
    REFERENCES Movie(movie_id) ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE Food_salelist (
    sales_id int unsigned not null auto_increment,
    time timestamp not null default current_timestamp,
    payment int unsigned not null,
    coupon_number int unsigned null,
    coupon_name varchar(50) null,
    customer_id char(20) null,
    CONSTRAINT PK_Food_salelist PRIMARY KEY(sales_id),
    CONSTRAINT FK_Food_salelist_1 FOREIGN KEY(coupon_number)
    REFERENCES Coupon_box(coupon_number) ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT FK_Food_salelist_2 FOREIGN KEY(coupon_name)
    REFERENCES Coupon_box(coupon_name) ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT FK_Food_salelist_3 FOREIGN KEY(customer_id)
    REFERENCES Coupon_box(customer_id) ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE Schedule (
    schedule_date datetime not null,
    employee_id int unsigned not null,
    on_office tinyint not null default 0,
    on_holiday tinyint not null default 0,
    on_halfholiday tinyint not null default 0,
    attending_time datetime null,
    closing_time datetime null,
    part_time char(5) not null,
    reason text(255) null,
    CONSTRAINT PK_Schedule PRIMARY KEY(schedule_date, employee_id),
    CONSTRAINT FK_Schedule FOREIGN KEY(employee_id)
    REFERENCES Employee(employee_id) ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE Ticketing_info (
    ticket_id int not null auto_increment,
    time timestamp not null default current_timestamp,
    pay_amount int not null,
    pay_way varchar(50) not null,
    send_contact char(11) null,
    coupon_number int unsigned null,
    coupon_name varchar(50) null,
    customer_id char(20) null,
    movie_time datetime not null,
    theater_name char(10) not null,
    cinema_id int unsigned not null,
    movie_id int unsigned not null,
    CONSTRAINT PK_Ticketing_info PRIMARY KEY(ticket_id),
    CONSTRAINT FK_Ticketing_info_1 FOREIGN KEY(coupon_number)
    REFERENCES Coupon_box(coupon_number) ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT FK_Ticketing_info_2 FOREIGN KEY(coupon_name)
    REFERENCES Coupon_box(coupon_name) ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT FK_Ticketing_info_3 FOREIGN KEY(customer_id)
    REFERENCES Customer_info(customer_id) ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT FK_Ticketing_info_4 FOREIGN KEY(movie_time)
    REFERENCES Movie_schedule(movie_time) ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT FK_Ticketing_info_5 FOREIGN KEY(theater_name)
    REFERENCES Movie_schedule(theater_name) ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT FK_Ticketing_info_6 FOREIGN KEY(cinema_id)
    REFERENCES Movie_schedule(cinema_id) ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT FK_Ticketing_info_7 FOREIGN KEY(movie_id)
    REFERENCES Movie_schedule(movie_id) ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE Purchase_list (
    purchase_ordernum tinyint not null auto_increment,
    sales_id int unsigned not null,
    menu_id char(10) not null,
    cinema_id int unsigned not null,
    CONSTRAINT PK_Purchase_list PRIMARY KEY(purchase_ordernum, sales_id),
    CONSTRAINT FK_Purchase_list_1 FOREIGN KEY(sales_id)
    REFERENCES Food_salelist(sales_id) ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT FK_Purchase_list_2 FOREIGN KEY(menu_id)
    REFERENCES Store_menu(menu_id) ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT FK_Purchase_list_3 FOREIGN KEY(cinema_id)
    REFERENCES Store_menu(cinema_id) ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE Schedule_seat (
    movie_time datetime not null,
    theater_name char(10) not null,
    cinema_id int unsigned not null,
    movie_id int unsigned not null,
    seat_number char(3) not null,
    ticket_id int not null,
    CONSTRAINT PK_Schedule_seat PRIMARY KEY(movie_time, theater_name, cinema_id, movie_id, seat_number, ticket_id),
    CONSTRAINT FK_Schedule_seat_1 FOREIGN KEY(movie_time)
    REFERENCES Movie_schedule(movie_time) ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT FK_Schedule_seat_2 FOREIGN KEY(theater_name)
    REFERENCES Movie_schedule(theater_name) ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT FK_Schedule_seat_3 FOREIGN KEY(cinema_id)
    REFERENCES Movie_schedule(cinema_id) ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT FK_Schedule_seat_4 FOREIGN KEY(movie_id)
    REFERENCES Movie_schedule(movie_id) ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT FK_Schedule_seat_5 FOREIGN KEY(seat_number)
    REFERENCES Seat(seat_number) ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT FK_Schedule_seat_6 FOREIGN KEY(ticket_id)
    REFERENCES Ticketing_info(ticket_id) ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE NOTICE(
  notice_id INT unsigned  auto_increment not NULL,
  cinema_id INT unsigned not null,
  content text(255) not null,
  notice_date timestamp not NULL default current_timestamp,
  CONSTRAINT PK_NOTICE PRIMARY KEY(notice_id),
  CONSTRAINT FK_NOTICE FOREIGN KEY(cinema_id)
  REFERENCES Cinema(cinema_id) ON UPDATE CASCADE ON DELETE RESTRICT
);