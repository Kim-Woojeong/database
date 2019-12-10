CREATE DATABASE IF NOT EXISTS zxcinemaxz DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE zxcinemaxz
SET foreign_key_checks = 0;
DROP TABLE IF EXISTS EVENT;
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
DROP TABLE IF EXISTS EVENT;
SET foreign_key_checks = 1;

CREATE TABLE EVENT(
  event_id INT unsigned  auto_increment not NULL,
  event_title varchar(50) not null,
  content text(255) not null,
  event_date timestamp not NULL default current_timestamp,
  CONSTRAINT PK_EVENT PRIMARY KEY(event_id)
);

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
    contents TEXT(1000)  NOT NULL,
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
    sequence INT NOT NULL,
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
    rank_name varchar(10) not null default "VIP",
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
    contents TEXT(1000)  NOT NULL,
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
    CONSTRAINT PK_Coupon_box PRIMARY KEY(coupon_number, customer_id),
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
    customer_id char(20) null,
    CONSTRAINT PK_Food_salelist PRIMARY KEY(sales_id),
    CONSTRAINT FK_Food_salelist_1 FOREIGN KEY(coupon_number)
    REFERENCES Coupon_box(coupon_number) ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT FK_Food_salelist_3 FOREIGN KEY(customer_id)
    REFERENCES Coupon_box(customer_id) ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE Schedule (
    schedule_date datetime not null,
    employee_id int unsigned not null,
    on_holiday tinyint not null default 0,
    attending_time datetime null,
    closing_time datetime null,
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
    customer_id char(20) null,
    movie_time datetime not null,
    theater_name char(10) not null,
    cinema_id int unsigned not null,
    movie_id int unsigned not null,
    CONSTRAINT PK_Ticketing_info PRIMARY KEY(ticket_id),
    CONSTRAINT FK_Ticketing_info_1 FOREIGN KEY(coupon_number)
    REFERENCES Coupon_box(coupon_number) ON UPDATE CASCADE ON DELETE RESTRICT,
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
  notice_title  varchar(50) not null,
  content text(255) not null,
  notice_date timestamp not NULL default current_timestamp,
  CONSTRAINT PK_NOTICE PRIMARY KEY(notice_id),
  CONSTRAINT FK_NOTICE FOREIGN KEY(cinema_id)
  REFERENCES Cinema(cinema_id) ON UPDATE CASCADE ON DELETE RESTRICT
);









insert into coupon values
("생일축하쿠폰", "영화", 50.0),
("등급별혜택쿠폰", "영화", 35.0),
("더쳐먹길바라쿠폰", "음식", 40.0),
("씹고뜯고맛보고즐겨쿠폰", "영화&음식", 30.0),
("서버점검보상쿠폰", "영화", 100.0),
("계열사직원쿠폰", "영화&음식", 40.0),
("쓰는사람이있을카쿠폰", "영화", 5.0);
insert into customer_rank values 
("SVIP","해당분기 20회 이상",20),
("VVIP", "해당분기 20회미만 10회이상",10),
("RVIP", "해당분기 10회미만 5회이상",5),
("VIP", "해당분기 5회미만",0);

insert into Actor values
(1000,"제니퍼 로렌스","Jennifer Lawrence","미국","https://www.facebook.com/JenniferLawrence/","미국사람이다"),
(1001,"조시 허처슨","Josh Hutcherson","미국","https://twitter.com/jhutch1992","남자사람이다"),
(1002,"한효주","Hyo Joo Han","대한민국","https://www.instagram.com/hanhyojoo222/","한효주다"),
(1003, "박서준", "Seo Jun Park", "대한민국", "https://instagram.com/bn_sj2013", "박서준이다"),
(1004, "벤 버트", "Ben Burtt", "미국", "https://www.skysound.com/people/ben-burtt/", "벤 버트이다"),
(1005, "엘리사 나이트", "Elissa Knight", "미국", "https://www.imdb.com/name/nm2264184/", "엘리사 나이트이다"),
(1006, "이선", "Sun Lee", "대한민국", "https://lordofvoice.com/leesun", "이선이다"),
(1007, "이미자", "Mi Ja Lee", "대한민국", "https://google.com", "사이트가 없다."),
(1008, "이디나 멘젤", "Idina Mentzel", "미국", "https://twitter.com/idinamenzel", "이디나 멘젤이다"),
(1009,"크리스틴 벨","Kristen Bell","미국","https://twitter.com/IMKristenBell","크리스틴 벨이다"),
(1010,"조진웅","Jin Woong Cho","대한민국","http://esaram.co.kr/ko/chojinwoong","조진웅이다"),
(1011,"이하늬","Ha Nee Lee","대한민국","http://esaram.co.kr/ko/leehanee","이하늬이다"),
(1012,"송강호","Kang Ho Song","대한민국","https://google.com","송강호이다"),
(1013,"변희봉","Hee Bong Byun","대한민국","https://google.com","변희봉이다"),
(1014,"서현진","Hyun jin Seo","대한민국","https://naver.com","서현진이다"),
(1015,"이민기","Moon Ji-in","대한민국","https://naver.com","문지인이다"),
(1016,"코자쿠라 에츠코","Kozakura etsuko","일본","https://naver.com","일본인이다"),
(1017,"토마츠 하루카","Tomatsu haruka","일본","https://naver.com","일본인이다"),
(1018, "이선균", "Seon-gyun Lee", "대한민국", "https://www.kmdb.or.kr/db/per/00014334","이선균이다"),
(1019, "조여정", "Yeo Jeong Cho", "대한민국", "https://www.highentfamily.com/cho-yeo-jeong","조여정이다"),
(1020, "브리 라슨", "Brie Larson", "미국", "https://www.instagram.com/brielarson/", "브리 라슨이다."),
(1021, "새뮤얼 L. 잭슨", "Samuel L. Jackson", "미국", "https://www.instagram.com/samuelljackson/", "새뮤얼 잭슨이다."),
(1022, "류준열", "Jun Yeol Ryu", "대한민국", "http://www.c-jes.com/ko/artist/about.asp?artist=39", "류준열이다."),
(1023, "유지태", "Ji Tae Yoo", "대한민국", "http://namooactors.com/bbs/board.php?bo_table=nm2001", "유지태이다.");

insert into cinema(cinema_id,hp,name,assets,area,road_address) values
(1000000,01164723523,'안산 중앙 1호점',12000,'서울/경기','안산시 단원구 가루개로 560'),
(1000001,01146275332,'zx여수xz',5492814500,'전라도','전라남도 여수시 어항단지로 474'),
(1000002,01047265826,'강남',12345678910,'서울/경기','서초대로77길 3'),
(1000003, 01012345678, '제주', 5720, '제주도', '제주특별자치도 제주시 이도2동 서광로 288'),
(1000004, 01098765432, '울릉도', 12500, '경상도', '경상북도 울릉군 서면 남서길 52')
;

insert into Department values
("아르바이트생","아르바이트"),
("영화관장","가맹점에 대한 운영지원, 감독하는 역할");

insert into Genre values
("어린이"),
("스릴러"),
("드라마"),
("SF"),
("범죄"),
("애니메이션"),
("어드벤처"),
("가족"),
("로맨스"),
("코미디"),
("뮤지컬"),
("판타지"),
("모험"),
("로맨틱"),
("요괴"),
("액션"),
("슈퍼히어로");

insert into movie(movie_id, movie_name, rating, running_time, release_date, distributor, total_audience, contents) values
(10010,"뽀로로 극장판 보물섬 대모험","전체관람가",79,"2019-4-25","넥스트엔터테인먼트월드",1234567, "떠나자, 보물섬으로~!<br>뽀로로와 친구들의 스펙터클 보물찾기 어드벤처!<br><br>전설 속 보물을 찾아 떠난 뽀로로와 친구들은<br>우연히 손에 넣은 지도를 따라 신비의 보물섬에 도착한다.<br><br>그곳에서 사라진 실버 선장을 만나<br>비밀을 간직한 보물섬의 수수께끼를 풀어내지만,<br>악당 블랙 선장과 보물섬의 괴물로 인해 위기에 빠지는데...<br>과연 뽀로로와 친구들은 전설의 보물을 찾을 수 있을까?"),
(10003, "괴물", "12세관람가", 119, "2006-7-27", "쇼박스", 13019991, "한강, 가족 그리고... 괴물<br>가족의 사투가 시작된다<br><br>햇살 가득한 평화로운 한강 둔치<br>아버지(변희봉)가 운영하는 한강매점,<br>늘어지게 낮잠 자던 강두(송강호)는<br>잠결에 들리는 ‘아빠’라는 소리에 벌떡 일어난다.<br>올해 중학생이 된 딸 현서(고아성)가 잔뜩 화가 나있다.<br>꺼내놓기도 창피한 오래된 핸드폰과<br>학부모 참관 수업에 술 냄새 풍기며 온 삼촌(박해일)때문이다.<br>강두는 고민 끝에 비밀리에 모아 온 동전이 가득 담긴 컵라면 그릇을 꺼내 보인다.<br>그러나 현서는 시큰둥할 뿐, 막 시작된 고모(배두나)의 전국체전 양궁경기에 몰두해 버린다."),
(10004, "블랙머니", "12세관람가", 113, "2019-11-13", "에이스메이커무비웍스",0, "고발은 의무! 수사는 직진! <br>할말은 하고 깔 건 깐다! <br><br>일명 서울지검 ‘막프로’! 검찰 내에서 거침없이 막 나가는 문제적 검사로 이름을 날리는 ‘양민혁’은 자신이 조사를 담당한 피의자가 자살하는 사건으로 인해 하루 아침에 벼랑 끝에 내몰린다. 억울한 누명을 벗기 위해 내막을 파헤치던 그는 피의자가 대한은행 헐값 매각사건의 중요 증인이었음을 알게 된다. <br><br>근거는 의문의 팩스 5장! 자산가치 70조 은행이 1조 7천억원에 넘어간 희대의 사건 앞에서 ‘양민혁’ 검사는 금융감독원, 대형 로펌, 해외펀드 회사가 뒤얽힌 거대한 금융 비리의 실체와 마주하게 되는데…"),
(10006, "헝거게임1", "15세관람가", 142, "2012-4-5", "라이언스게이트",6453234, "혁명의 불꽃이 될 거대한 생존전쟁! <br>살아남아라, 최후의 승자가 모든 것을 바꾼다! <br><br>헝거게임의 우승으로 독재국가 ‘판엠’의 절대권력을 위협하는 존재가 된 캣니스, 혁명의 불꽃이 된 그녀를 제거하기 위해 캐피톨은 75회 스페셜 헝거게임의 재출전을 강요한다. 역대 최강의 우승자들이 모인 헝거게임에 참가하게 된 캣니스는 판엠의 음모 속에서 적인지 동료인지 알 수 없는 막강한 도전자들과 맞닥뜨린다. 모두의 운명을 걸고 살아남아야 하는 캣니스, 그녀와 함께 혁명의 불꽃이 시작된다."),
(10007, "뷰티인사이드", "12세관람가", 127, "2015-8-20", "NEW",2000000, "사랑해 오늘의 당신이 어떤 모습이든 <br><br>남자, 여자, 아이, 노인.. 심지어 외국인까지! 자고 일어나면 매일 다른 모습으로 변하는 남자, ‘우진’. 그에게 처음으로 비밀을 말하고 싶은 단 한 사람이 생겼다.드디어 D-DAY! ‘우진’은 그녀에게 자신의 마음을 고백하기로 하는데… <br><br>'초밥이 좋아요? 스테이크가 좋아요? <br>사실.. 연습 엄청 많이 했어요. <br>오늘 꼭 그쪽이랑 밥 먹고 싶어서…'"),
(10008, "월E", "전체관람가", 104, "2008-8-6", "월트디즈니픽쳐스",1300000, "예측블허! <br>차세대 영웅, <br>그가 지구 구하기에 나섰다! <br><br><니모를 찾아서>로 아카데미 상을 수상한 감독 겸 각본가 앤드류 스탠튼과, <인크레더블>, <카>, <라따뚜이>를 탄생시킨 픽사 애니메이션 스튜디오의 재기 넘치는 이야기꾼, 천재적인 기술진들이 다시 한 번 손을 잡았다! 지구에서 그리 멀지 않은 은하계로 영화 팬들을 데려가 줄 그들의 어드벤처 블록버스터, 이 새로운 컴퓨터 애니메이션의 주인공은 ‘월•E’라는 이름의 뚝심 있는 로봇이다. "),
(10009,"극장판 요괴워치 탄생의 비밀이다냥!","전체관람가",97,"2015-7-22","도호",550961, "운명적인 만남! <br>마침내, 요괴워치 탄생의 비밀이 밝혀진다! <br>어느 날, 자고 있던 민호의 손목에서 빛을 내며 요괴워치가 사라져버린다. 그리고 갑자기 진달래 마을에 나타난 거대 고양이 요괴 ‘거대냥’으로부터 친구를 구해달라는 부탁을 받는데… 민호 일행은 사라진 요괴워치와 ‘거대냥’의 친구를 돕기 위한 단서를 찾던 중 사건의 열쇠를 쥔 고양이 요괴 ‘부유냥’을 만나게 되고 60년 전 과거로 타임슬립을 하게 된다.  <br><br>그들을 기다리고 있는 거대한 적의 정체는 무엇이며, 민호 일행은 무사히 요괴워치를 되찾을 수 있을 것인가?!"),
(10000,"겨울왕국2","전체관람가",103,"2019-11-21","월트 디즈니 컴퍼니 코리아",12435390, "내 마법의 힘은 어디서 왔을까? <br>나를 부르는 저 목소리는 누구지? <br><br>어느 날 부턴가 의문의 목소리가 엘사를 부르고, 평화로운 아렌델 왕국을 위협한다. 트롤은 모든 것은 과거에서 시작되었음을 알려주며 엘사의 힘의 비밀과 진실을 찾아 떠나야한다고 조언한다. <br><br>위험에 빠진 아렌델 왕국을 구해야만 하는 엘사와 안나는 숨겨진 과거의 진실을 찾아 크리스토프, 올라프 그리고 스벤과 함께 위험천만한 놀라운 모험을 떠나게 된다. 자신의 힘을 두려워했던 엘사는 이제 이 모험을 헤쳐나가기에 자신의 힘이 충분하다고 믿어야만 하는데… <br><br>11월, 두려움을 깨고 새로운 운명을 만나다!"),
(10002,"기생충","15세관람가",132,"2019-5-30","CJ엔터테인먼트",10084475, "'폐 끼치고 싶진 않았어요' <br><br>전원백수로 살 길 막막하지만 사이는 좋은 기택(송강호) 가족. <br>장남 기우(최우식)에게 명문대생 친구가 연결시켜 준 고액 과외 자리는 <br>모처럼 싹튼 고정수입의 희망이다. <br>온 가족의 도움과 기대 속에 박사장(이선균) 집으로 향하는 기우. <br>글로벌 IT기업 CEO인 박사장의 저택에 도착하자 <br>젊고 아름다운 사모님 연교(조여정)가 기우를 맞이한다. <br><br>그러나 이렇게 시작된 두 가족의 만남 뒤로, 걷잡을 수 없는 사건이 기다리고 있었으니…"),
(10001,"캡틴마블","12세관람가",123,"2019-3-6","월트 디즈니 컴퍼니 코리아",5801070, "위기에 빠진 어벤져스의 희망! <br><br>1995년, 공군 파일럿 시절의 기억을 잃고 <br>크리족 전사로 살아가던 캐럴 댄버스(브리 라슨)가 지구에 불시착한다. <br>쉴드 요원 닉 퓨리(사무엘 L. 잭슨)에게 발견되어 팀을 이룬 그들은 <br>지구로 향하는 더 큰 위협을 감지하고 <br>힘을 합쳐 전쟁을 끝내야 하는데…"),
(10005, "돈", "15세관람가", 115, "2019-3-20", "쇼박스", 3348753, "'부자가 되고 싶었다' <br><br>오직 부자가 되고 싶은 꿈을 품고 여의도 증권가에 입성한 신입 주식 브로커 조일현(류준열). <br>빽도 줄도 없는, 수수료 O원의 그는 곧 해고 직전의 처지로 몰린다. <br>위기의 순간, 베일에 싸인 신화적인 작전 설계자 번호표(유지태)를 만나게 되고, 막대한 이익을 챙길 수 있는 거래 참여를 제안 받는다. <br>위험한 제안을 받아들인 후 순식간에 큰 돈을 벌게 되는 일현. <br>승승장구하는 일현 앞에 번호표의 뒤를 쫓던 금융감독원의 사냥개 한지철(조우진)이 나타나 그를 조여 오기 시작하는데…"),
(20000, "조커", "15세관람가", 123, "2020-1-21", "워너 브라더스 코리아", 5246664, "'내 인생은 비극인줄 알았는데, 코미디였어'<br><br>고담시의 광대 아서 플렉은 코미디언을 꿈꾸는 남자. <br>하지만 모두가 미쳐가는 코미디 같은 세상에서 맨 정신으로는 그가 설 자리가 없음을 깨닫게 되는데… <br>이제껏 본 적 없는 진짜 ‘조커’를 만나라!"),
(20001, "터미네이터: 다크 페이트", "15세관람가", 128, "2020-2-3", "월트 디즈니 컴퍼니 코리아", 2310222, "심판의 날 그 후, 모든 것이 다시 시작된다! <br><br>심판의 날 그 후, 뒤바뀐 미래 <br>새로운 인류의 희망 ‘대니’(나탈리아 레이즈)를 지키기 위해 슈퍼 솔져 ‘그레이스’(맥켄지 데이비스)가 미래에서 찾아오고, ‘대니’를 제거하기 위한 터미네이터 ‘Rev-9’(가브리엘 루나)의 추격이 시작된다. <br><br>최첨단 기술력으로 무장한 최강의 적 터미네이터 ‘Rev-9’의 무차별적인 공격에 쫓기기 시작하던 ‘그레이스’와 ‘대니’ 앞에 터미네이터 헌터 ‘사라 코너’(린다 해밀턴)가 나타나 도움을 준다. <br><br>인류의 수호자이자 기계로 강화된 슈퍼 솔져 ‘그레이스’와 ‘사라 코너’는 ‘대니’를 지키기 위해 새로운 조력자를 찾아 나서고, 터미네이터 ‘Rev-9’은 그들의 뒤를 끈질기게 추격하는데... <br><br>더 이상 정해진 미래는 없다. <br>지키려는 자 VS 제거하려는 자, 새로운 운명이 격돌한다!"),
(20002, "백두산", "15세관람가", 0, "2020-11-11", "CJ 엔터테인먼트", 0, "대한민국 관측 역사상 최대 규모의 백두산 폭발 발생. <br>갑작스러운 재난에 한반도는 순식간에 아비규환이 되고, <br>남과 북 모두를 집어삼킬 추가 폭발이 예측된다. <br><br>사상 초유의 재난을 막기 위해 ‘전유경’(전혜진)은 <br>백두산 폭발을 연구해 온 지질학 교수 ‘강봉래’(마동석)의 이론에 따른 작전을 계획하고, <br>전역을 앞둔 특전사 EOD 대위 ‘조인창’(하정우)이 남과 북의 운명이 걸린 비밀 작전에 투입된다."),
(20003, "더 보트", "15세관람가", 0, "2020-1-5", "민제네 여관", 0, "표류된 보트, 배가 살아있다. <br>죽음의 항해가 시작된다! <br><br>한 발짝도 내딛을 수 없는 거대한 바다.<br>표류중인 요트를 발견하고 올라타는 남자.<br>인기척도 통신도 두절된 저절로 움직이는 배에 갇힌다.<br>배가 살아있다. 탈출구가 없다.<br>살아남기 위한 필사의 표류가 시작된다.<br><br>목숨을 건 승선을 환영합니다!")
;


insert into Studio values
("아이코닉스"),
("청어람"),
("질라라비 아우라픽처스"),
("월트 디지니 픽처스"),
("컬러 포스"),
("라이언스게이트"),
("스튜디오 바벨스베르크"),
("스튜디오앤뉴"),
("용필"),
("픽사"),
("오엘엠"),
("월트 디즈니 애니메이션 스튜디오"),
("바른손이앤에이"),
("마블 스튜디오"),
("사나이픽처스");

insert into Director values
(100, "게리 로스", "Gary Ross", "미국", "https://ko.wikipedia.org/wiki/%EA%B2%8C%EB%A6%AC_%EB%A1%9C%EC%8A%A4","연출자 소개를 작성해주세요"),
(101, "백종열", "Baek Jongyeol", "한국", "https://movie.daum.net/person/main?personId=394220","연출자 소개를 작성해주세요"),
(102, "앤드루 스탠턴", "Andrew Stanton", "미국", "https://movie.daum.net/person/main?personId=30667","연출자 소개를 작성해주세요"),
(103, "이동준", "Dongjoon", "한국", "https://naver.com","킹왕짱 동준"),
(104, "봉준호", "Joon Ho Bong", "대한민국", "https://google.com", "봉준호 감독이다."),
(105, "애나 보든", "Anna Boden", "미국", "https://google.com", "애나 보든이다."),
(106, "박누리", "", "대한민국", "https://google.com", "박누리 감독이다.");

insert into Accounts_management values
("20191", 1000000, 5000, 1200000, 570381000, 43830201000, 12000000),
("20192", 1000000, 7000, 1230000, 5381000, 43201000, 1000000),
("20191", 1000001, 1000, 2000000, 3000000, 40201000, 5000000),
("20192", 1000001, 2000, 3000000, 4500000, 60201000, 7000000),
("20191", 1000002, 7000, 8000000, 5800000, 18201000, 1000000),
("20192", 1000002, 6300, 1500000, 9300000, 27101000, 8700000);

insert into Customer_info(customer_id, password, customer_name, gender, road_address, detail_address, customer_hp, email_address, rank_name, birth_date) values
("dkssud", "12345", "가나다", 1, "경기도 안산시 상록구 한양대학로 55(사동)", "행복관(기숙사) 000호", "01000000000", "안녕하세요@안녕.com", "SVIP", "2000-01-01"),
("gktpdy", "678910", "라마바", 2, "경기도 안산시 상록구 한양대학로 55(사동)", "행복관(기숙사) 456호", "01023451234", "잘가요@잘가.com", "VIP", "1990-01-23"),
("minjaejoa", "rkskekf", "김이박", 2, "경기도 안산시 상록구 한양대학로 55(사동)", "창의관(기숙사) 123호", "01011112222", "디비@디비.com", "SVIP", "1999-01-10");

insert into Employee values
  (37001, "김우정", "9903071234567", "01081261399", 20000, 9, "756001-00-073689", 1000000, "영화관장"),
  (37002, "지창욱", "8707051234567", "01019203495", 15000, 8, "720941-00-012345", 1000001, "아르바이트생"),
  (37003, "박민영", "8603041234567", "01090342839", 10000, 7, "129955-00-392039", 1000002, "영화관장");

insert into equipment values
("3D안경", 1000000, 600),
("방석", 1000000, 300),
("빗자루", 1000000, 20),
("담요", 1000000, 300),
("유니폼", 1000000, 50),
("3D안경", 1000001, 200),
("방석", 1000001, 100),
("빗자루", 1000001, 10),
("담요", 1000001, 100),
("유니폼", 1000001, 15),
("3D안경", 1000002, 1000),
("방석", 1000002, 500),
("빗자루", 1000002, 100),
("담요", 1000002, 500),
("유니폼", 1000002, 120);

insert into Movie_actor values
(1006,10010,"뽀로로"),
(1007,10010,"크롱"),
(1012,10003,"박강두"),
(1003,10003,"박희봉"),
(1010,10004,"양민혁"),
(1011,10004,"김나리"),
(1000,10006,"캣니스 에버딘"),
(1001,10006,"피타 멜라"),
(1014,10007,"한 SE 계"),
(1015,10007,"유 우 미"),
(1004,10008,"월 E, M-O"),
(1005,10008,"이브"),
(1016,10009,"지바냥"),
(1017,10009,"나단 아담스"),
(1008,10000,"엘사"),
(1009,10000,"안나"),
(1012, 10002, "김기택"),
(1018, 10002, "박동의"),
(1019, 10002, "최연교"),
(1020, 10001, "캐럴 댄버스 / 비어스 / 캡틴 마블"),
(1021, 10001, "닉 퓨리"),
(1022, 10005, "조일현"),
(1023, 10005, "번호표");

insert into Movie_director values
(103,10010,"총괄감독"),
(103,10003,"총괄감독"),
(103,10004,"총괄감독"),
(100,10006,"총괄감독"),
(101,10007,"총괄감독"),
(102,10008,"총괄감독"),
(103,10009,"총괄감독"),
(103,10000,"총괄감독"),
(104, 10002, "총괄감독"),
(105, 10001, "총괄감독"),
(106, 10005, "총괄감독");

insert into movie_review(movie_id, customer_id, written_time, score, contents) values
(10005, "dkssud", "2019-11-21 13:33:45", 7, "a"),
(10001, "dkssud", "2019-11-21 13:35:55", 2,"b"),
(10007, "gktpdy", "2018-11-21 11:55:24", 3,"c"),
(10003, "gktpdy", "2019-11-21 18:23:22", 2,"d"),
(10001, "gktpdy", "2016-11-21 12:44:54", 4,"e"),
(10008, "minjaejoa", "2017-05-12 17:12:00", 5,"f"),
(10002, "minjaejoa", "2018-08-31 17:12:00", 10,"g"),
(10001, "minjaejoa", "2017-05-12 17:12:00", 5,"h"),
(10000, "minjaejoa", "2017-05-12 17:12:00", 10,"i");

insert into event(event_title, content) values
("동준이와 함께하는 펩시콜라 어린이집 나눔", "펩시콜라 어린이집에 100박스 후원해요."),
("귀여운 동준이가 찍어와 함께 찍는 포토티켓 이벤트", "지금 포토티켓을 출력하시면 동준이가 나와요."),
("아 몰랑 다 나눔", "영화관 망해서 전부 나눔합니다.");

insert into Movie_studio values
("아이코닉스",10010),
("청어람",10010),
("질라라비 아우라픽처스",10010),
("월트 디즈니 애니메이션 스튜디오",10000),
("바른손이앤에이", 10002),
("마블 스튜디오", 10001),
("사나이픽처스", 10005);

insert into notice(cinema_id, notice_title ,content) values
(1000000, "안산 중앙 1호점 오픈 기념 ㅇ이동준 팬싸인회","안녕하세요! 최강디비는 탈인간급 실력을 갖고있읍니다. 감사합니다 ㅎ"),
(1000001, "Cine zx 여수점 오픈 기념 울릉도 활 오징어 증정", "안녕하세요! zx여수xz점 점장 이동준입니다. 최강디비는 탈인간급 실력을 갖고있읍니다. 감사합니다 ㅎ"),
(1000002, " Cine zx 강남점 리모델링 기념 - 특명! 김규진을 찾아라!" , "안녕하세요! 강남좋아. 감사합니다.");

insert into Stock (stock_name,cinema_id,amount) values
("옥수수알",1000000,10000),
("콜라액상",1000000,100),
("사이다액상",1000000,100),
("맥주",1000000,300),
("오징어",1000000,100),
("나쵸",1000000,200),
("옥수수알",1000001,10023),
("콜라액상",1000001,104),
("사이다액상",1000001,105),
("맥주",1000001,302),
("오징어",1000001,103),
("나쵸",1000001,220),
("옥수수알",1000002,10230),
("콜라액상",1000002,140),
("사이다액상",1000002,150),
("맥주",1000002,360),
("오징어",1000002,122),
("나쵸",1000002,250);

insert into Store_menu values
  ("더블콤보", 1000000, 11900, 3828),
  ("즉석구이오징어", 1000000, 5000, 23040),
  ("크리미갈릭핫도그", 1000000, 4500, 102);

insert into theater values
('1관',1000000,'일반','9층'),
('2관',1000000,'일반','9층'),
('3관',1000000,'일반','9층'),
('4관',1000000,'일반','10층'),
('5관',1000000,'일반','10층'),
('6관',1000000,'일반','10층'),
('7관',1000000,'특별상영관','11층'),
('VIP관',1000000,'VIP전용상영관','11층'),
('1관',1000001,'일반','5층'),
('2관',1000001,'일반','6층'),
('7관',1000001,'특별상영관','4층'),
('1관',1000002,'일반','1층'),
('2관',1000002,'일반','1층'),
('특별관',1000002,'특별상영관','5층');

insert into movie_genre values
("어린이", 10010),
("애니메이션", 10010),
("어드벤처", 10010),
("가족",10010),
("어린이", 10009),
("애니메이션", 10009),
("어드벤처", 10009),
("SF",10003),
("가족",10003),
("범죄",10004),
("어드벤처", 10006),
("드라마", 10006),
("판타지", 10006),
("로맨스",10007),
("SF",10008),
("가족",10008),
("애니메이션",10000),
("가족",10000),
("뮤지컬",10000),
("판타지",10000),
("코미디", 10002),
("스릴러", 10002),
("드라마", 10002),
("액션", 10001),
("슈퍼히어로", 10001),
("판타지", 10001),
("모험", 10001),
("SF", 10001),
("범죄", 10005);

insert into coupon_box(coupon_number,customer_id,coupon_name,expirate_date) values
(4,"dkssud","쓰는사람이있을카쿠폰", now()),
(44,"dkssud","쓰는사람이있을카쿠폰", now()),
(444,"dkssud","쓰는사람이있을카쿠폰",now()),
(4444,"dkssud","쓰는사람이있을카쿠폰",now());

insert into Movie_schedule (movie_time,theater_name,cinema_id,movie_id)
values
("2019-12-12 9:00:00", "1관", 1000000,10000),
("2019-12-12 11:30:00", "1관", 1000000,10000),
("2019-12-12 14:00:00", "1관", 1000000,10000),
("2019-12-12 16:30:00", "1관", 1000000,10000),
("2019-12-12 19:00:00", "1관", 1000000,10000),
("2019-12-12 21:30:00", "1관", 1000000,10000),
("2019-12-12 23:00:00", "1관", 1000000,10000),
("2019-12-13 9:30:00", "1관", 1000000,10000),
("2019-12-13 11:50:00", "1관", 1000000,10000),
("2019-12-13 14:10:00", "1관", 1000000,10000),
("2019-12-13 16:30:00", "1관", 1000000,10000),
("2019-12-13 18:50:00", "1관", 1000000,10000),
("2019-12-13 21:10:00", "1관", 1000000,10000),
("2019-12-13 23:30:00", "1관", 1000000,10000),
("2019-12-14 9:00:00", "1관", 1000000,10000),
("2019-12-14 12:00:00", "1관", 1000000,10000),
("2019-12-14 15:00:00", "1관", 1000000,10000),
("2019-12-14 18:00:00", "1관", 1000000,10000),
("2019-12-14 21:00:00", "1관", 1000000,10000),
("2019-12-15 00:00:00", "1관", 1000000,10000),
("2019-12-15 10:00:00", "1관", 1000000,10000),
("2019-12-15 13:00:00", "1관", 1000000,10000),
("2019-12-15 16:00:00", "1관", 1000000,10000),
("2019-12-15 19:00:00", "1관", 1000000,10000),
("2019-12-15 22:00:00", "1관", 1000000,10000),
("2019-12-12 10:00:00", "2관", 1000000,10001),
("2019-12-12 14:00:00", "2관", 1000000,10001),
("2019-12-12 18:00:00", "2관", 1000000,10001),
("2019-12-12 22:00:00", "2관", 1000000,10001),
("2019-12-13 11:30:00", "2관", 1000000,10001),
("2019-12-13 15:00:00", "2관", 1000000,10001),
("2019-12-13 19:00:00", "2관", 1000000,10001),
("2019-12-14 11:00:00", "2관", 1000000,10001),
("2019-12-14 16:00:00", "2관", 1000000,10001),
("2019-12-14 21:00:00", "2관", 1000000,10001),
("2019-12-15 12:00:00", "2관", 1000000,10001),
("2019-12-15 18:00:00", "2관", 1000000,10001),
("2019-12-12 8:30:00", "3관", 1000000,10000),
("2019-12-12 10:30:00", "3관", 1000000,10000),
("2019-12-12 12:30:00", "3관", 1000000,10000),
("2019-12-12 15:00:00", "3관", 1000000,10000),
("2019-12-12 17:00:00", "3관", 1000000,10000),
("2019-12-12 19:00:00", "3관", 1000000,10000),
("2019-12-12 21:00:00", "3관", 1000000,10000),
("2019-12-12 23:00:00", "3관", 1000000,10000),
("2019-12-13 9:00:00", "3관", 1000000,10000),
("2019-12-13 11:00:00", "3관", 1000000,10000),
("2019-12-13 13:00:00", "3관", 1000000,10000),
("2019-12-13 15:00:00", "3관", 1000000,10000),
("2019-12-13 17:00:00", "3관", 1000000,10000),
("2019-12-13 19:00:00", "3관", 1000000,10000),
("2019-12-13 21:00:00", "3관", 1000000,10000),
("2019-12-13 23:30:00", "3관", 1000000,10000),
("2019-12-14 10:00:00", "3관", 1000000,10000),
("2019-12-14 13:00:00", "3관", 1000000,10000),
("2019-12-14 16:00:00", "3관", 1000000,10000),
("2019-12-14 19:00:00", "3관", 1000000,10000),
("2019-12-14 22:00:00", "3관", 1000000,10000),
("2019-12-15 10:00:00", "3관", 1000000,10000),
("2019-12-15 12:00:00", "3관", 1000000,10000),
("2019-12-15 14:00:00", "3관", 1000000,10000),
("2019-12-15 16:00:00", "3관", 1000000,10000),
("2019-12-15 18:00:00", "3관", 1000000,10000),
("2019-12-15 20:00:00", "3관", 1000000,10000),
("2019-12-15 22:00:00", "3관", 1000000,10000),
("2019-12-12 10:00:00", "4관", 1000000,10007),
("2019-12-12 13:00:00", "4관", 1000000,10007),
("2019-12-12 16:00:00", "4관", 1000000,10007),
("2019-12-12 19:00:00", "4관", 1000000,10007),
("2019-12-12 22:00:00", "4관", 1000000,10007),
("2019-12-13 11:00:00", "4관", 1000000,10007),
("2019-12-13 16:00:00", "4관", 1000000,10007),
("2019-12-13 21:00:00", "4관", 1000000,10007),
("2019-12-13 23:30:00", "4관", 1000000,10007),
("2019-12-14 13:00:00", "4관", 1000000,10007),
("2019-12-14 17:00:00", "4관", 1000000,10007),
("2019-12-14 21:00:00", "4관", 1000000,10007),
("2019-12-15 14:00:00", "4관", 1000000,10007),
("2019-12-15 20:00:00", "4관", 1000000,10007),
("2019-12-12 8:30:00", "5관", 1000000,10002),
("2019-12-12 11:30:00", "5관", 1000000,10002),
("2019-12-12 14:30:00", "5관", 1000000,10002),
("2019-12-12 17:30:00", "5관", 1000000,10002),
("2019-12-12 20:30:00", "5관", 1000000,10002),
("2019-12-12 23:30:00", "5관", 1000000,10002),
("2019-12-13 8:00:00", "5관", 1000000,10002),
("2019-12-13 11:00:00", "5관", 1000000,10002),
("2019-12-13 14:00:00", "5관", 1000000,10002),
("2019-12-13 17:00:00", "5관", 1000000,10002),
("2019-12-13 20:00:00", "5관", 1000000,10002),
("2019-12-13 23:00:00", "5관", 1000000,10002),
("2019-12-14 9:45:00", "5관", 1000000,10002),
("2019-12-14 12:45:00", "5관", 1000000,10002),
("2019-12-14 15:45:00", "5관", 1000000,10002),
("2019-12-14 18:45:00", "5관", 1000000,10002),
("2019-12-14 21:45:00", "5관", 1000000,10002),
("2019-12-15 9:30:00", "5관", 1000000,10002),
("2019-12-15 12:30:00", "5관", 1000000,10002),
("2019-12-15 15:30:00", "5관", 1000000,10002),
("2019-12-15 18:30:00", "5관", 1000000,10002),
("2019-12-15 21:30:00", "5관", 1000000,10002),
("2019-12-12 9:30:00", "6관", 1000000,10004),
("2019-12-12 11:30:00", "6관", 1000000,10004),
("2019-12-12 14:00:00", "6관", 1000000,10004),
("2019-12-12 17:00:00", "6관", 1000000,10004),
("2019-12-12 20:00:00", "6관", 1000000,10004),
("2019-12-12 23:00:00", "6관", 1000000,10004),
("2019-12-13 10:00:00", "6관", 1000000,10004),
("2019-12-13 13:30:00", "6관", 1000000,10004),
("2019-12-13 17:00:00", "6관", 1000000,10004),
("2019-12-13 20:30:00", "6관", 1000000,10004),
("2019-12-14 00:00:00", "6관", 1000000,10004),
("2019-12-14 10:00:00", "6관", 1000000,10004),
("2019-12-14 14:00:00", "6관", 1000000,10004),
("2019-12-14 18:00:00", "6관", 1000000,10004),
("2019-12-14 22:00:00", "6관", 1000000,10004),
("2019-12-15 10:00:00", "6관", 1000000,10004),
("2019-12-15 13:30:00", "6관", 1000000,10004),
("2019-12-15 17:00:00", "6관", 1000000,10004),
("2019-12-15 20:30:00", "6관", 1000000,10004),
("2019-12-12 10:30:00", "7관", 1000000,10005),
("2019-12-12 13:30:00", "7관", 1000000,10005),
("2019-12-12 16:30:00", "7관", 1000000,10005),
("2019-12-12 19:00:00", "7관", 1000000,10005),
("2019-12-12 22:00:00", "7관", 1000000,10005),
("2019-12-13 10:00:00", "7관", 1000000,10005),
("2019-12-13 13:00:00", "7관", 1000000,10005),
("2019-12-13 16:00:00", "7관", 1000000,10005),
("2019-12-13 19:00:00", "7관", 1000000,10005),
("2019-12-13 22:00:00", "7관", 1000000,10005),
("2019-12-14 11:00:00", "7관", 1000000,10005),
("2019-12-14 14:00:00", "7관", 1000000,10005),
("2019-12-14 17:00:00", "7관", 1000000,10005),
("2019-12-14 20:00:00", "7관", 1000000,10005),
("2019-12-15 10:30:00", "7관", 1000000,10005),
("2019-12-15 15:00:00", "7관", 1000000,10005),
("2019-12-15 19:30:00", "7관", 1000000,10005),
("2019-12-12 10:30:00", "VIP관", 1000000,10010),
("2019-12-12 19:30:00", "VIP관", 1000000,10010),
("2019-12-13 10:00:00", "VIP관", 1000000,10010),
("2019-12-13 16:00:00", "VIP관", 1000000,10010),
("2019-12-13 20:00:00", "VIP관", 1000000,10010),
("2019-12-14 14:00:00", "VIP관", 1000000,10010),
("2019-12-14 20:00:00", "VIP관", 1000000,10010),
("2019-12-15 15:00:00", "VIP관", 1000000,10010);

insert into Seat values
  ("J3", "1관", 1000000, "커플석"),
  ("J1", "1관", 1000000, "커플석"),
  ("J2", "1관", 1000000, "커플석"),
  ("J4", "1관", 1000000, "커플석"),
  ("J5", "1관", 1000000, "커플석"),
  ("A1", "1관", 1000000, "장애인석"),
  ("A2", "1관", 1000000, "장애인석"),
  ("A3", "1관", 1000000, "장애인석"),
  ("A4", "1관", 1000000, "장애인석"),
  ("A5", "1관", 1000000, "장애인석"),
  ("C1", "1관", 1000000, "일반석"),
  ("C2", "1관", 1000000, "일반석"),
  ("C3", "1관", 1000000, "일반석"),
  ("C4", "1관", 1000000, "일반석"),
  ("C5", "1관", 1000000, "일반석"),
  ("C6", "1관", 1000000, "일반석"),
  ("C7", "1관", 1000000, "일반석"),
  ("C8", "1관", 1000000, "일반석"),
  ("C9", "1관", 1000000, "일반석"),
  ("C10", "1관", 1000000, "일반석"),
  ("D1", "1관", 1000000, "일반석"),
  ("D2", "1관", 1000000, "일반석"),
  ("D3", "1관", 1000000, "일반석"),
  ("D4", "1관", 1000000, "일반석"),
  ("D5", "1관", 1000000, "일반석"),
  ("D6", "1관", 1000000, "일반석"),
  ("D7", "1관", 1000000, "일반석"),
  ("D8", "1관", 1000000, "일반석"),
  ("D9", "1관", 1000000, "일반석"),
  ("D10", "1관", 1000000, "일반석"),
  ("E1", "1관", 1000000, "일반석"),
  ("E2", "1관", 1000000, "일반석"),
  ("E3", "1관", 1000000, "일반석"),
  ("E4", "1관", 1000000, "일반석"),
  ("E5", "1관", 1000000, "일반석"),
  ("E6", "1관", 1000000, "일반석"),
  ("E7", "1관", 1000000, "일반석"),
  ("E8", "1관", 1000000, "일반석"),
  ("E9", "1관", 1000000, "일반석"),
  ("E10", "1관", 1000000, "일반석"),
  ("F1", "1관", 1000000, "일반석"),
  ("F2", "1관", 1000000, "일반석"),
  ("F3", "1관", 1000000, "일반석"),
  ("F4", "1관", 1000000, "일반석"),
  ("F5", "1관", 1000000, "일반석"),
  ("F6", "1관", 1000000, "일반석"),
  ("F7", "1관", 1000000, "일반석"),
  ("F8", "1관", 1000000, "일반석"),
  ("F9", "1관", 1000000, "일반석"),
  ("F10", "1관", 1000000, "일반석"),
  ("G1", "1관", 1000000, "일반석"),
  ("G2", "1관", 1000000, "일반석"),
  ("G3", "1관", 1000000, "일반석"),
  ("G4", "1관", 1000000, "일반석"),
  ("G5", "1관", 1000000, "일반석"),
  ("G6", "1관", 1000000, "일반석"),
  ("G7", "1관", 1000000, "일반석"),
  ("G8", "1관", 1000000, "일반석"),
  ("G9", "1관", 1000000, "일반석"),
  ("G10", "1관", 1000000, "일반석"),
  ("H1", "1관", 1000000, "일반석"),
  ("H2", "1관", 1000000, "일반석"),
  ("H3", "1관", 1000000, "일반석"),
  ("H4", "1관", 1000000, "일반석"),
  ("H5", "1관", 1000000, "일반석"),
  ("H6", "1관", 1000000, "일반석"),
  ("H7", "1관", 1000000, "일반석"),
  ("H8", "1관", 1000000, "일반석"),
  ("H9", "1관", 1000000, "일반석"),
  ("H10", "1관", 1000000, "일반석"),
  ("I1", "1관", 1000000, "일반석"),
  ("I2", "1관", 1000000, "일반석"),
  ("I3", "1관", 1000000, "일반석"),
  ("I4", "1관", 1000000, "일반석"),
  ("I5", "1관", 1000000, "일반석"),
  ("I6", "1관", 1000000, "일반석"),
  ("I7", "1관", 1000000, "일반석"),
  ("I8", "1관", 1000000, "일반석"),
  ("I9", "1관", 1000000, "일반석"),
  ("I10", "1관", 1000000, "일반석"),
  ("B1", "1관", 1000000, "일반석"),
  ("B2", "1관", 1000000, "일반석"),
  ("B3", "1관", 1000000, "일반석"),
  ("B4", "1관", 1000000, "일반석"),
  ("B5", "1관", 1000000, "일반석"),
  ("B6", "1관", 1000000, "일반석"),
  ("B7", "1관", 1000000, "일반석"),
  ("B8", "1관", 1000000, "일반석"),
  ("B9", "1관", 1000000, "일반석"),
  ("B10", "1관", 1000000, "일반석"),
  ("A3", "7관", 1000000, "커플석"),
  ("J3", "3관", 1000000, "커플석"),
  ("J1", "3관", 1000000, "커플석"),
  ("J2", "3관", 1000000, "커플석"),
  ("J4", "3관", 1000000, "커플석"),
  ("J5", "3관", 1000000, "커플석"),
  ("A1", "3관", 1000000, "장애인석"),
  ("A2", "3관", 1000000, "장애인석"),
  ("A3", "3관", 1000000, "장애인석"),
  ("A4", "3관", 1000000, "장애인석"),
  ("A5", "3관", 1000000, "장애인석"),
  ("C1", "3관", 1000000, "일반석"),
  ("C2", "3관", 1000000, "일반석"),
  ("C3", "3관", 1000000, "일반석"),
  ("C4", "3관", 1000000, "일반석"),
  ("C5", "3관", 1000000, "일반석"),
  ("C6", "3관", 1000000, "일반석"),
  ("C7", "3관", 1000000, "일반석"),
  ("C8", "3관", 1000000, "일반석"),
  ("C9", "3관", 1000000, "일반석"),
  ("C10", "3관", 1000000, "일반석"),
  ("D1", "3관", 1000000, "일반석"),
  ("D2", "3관", 1000000, "일반석"),
  ("D3", "3관", 1000000, "일반석"),
  ("D4", "3관", 1000000, "일반석"),
  ("D5", "3관", 1000000, "일반석"),
  ("D6", "3관", 1000000, "일반석"),
  ("D7", "3관", 1000000, "일반석"),
  ("D8", "3관", 1000000, "일반석"),
  ("D9", "3관", 1000000, "일반석"),
  ("D10", "3관", 1000000, "일반석"),
  ("E1", "3관", 1000000, "일반석"),
  ("E2", "3관", 1000000, "일반석"),
  ("E3", "3관", 1000000, "일반석"),
  ("E4", "3관", 1000000, "일반석"),
  ("E5", "3관", 1000000, "일반석"),
  ("E6", "3관", 1000000, "일반석"),
  ("E7", "3관", 1000000, "일반석"),
  ("E8", "3관", 1000000, "일반석"),
  ("E9", "3관", 1000000, "일반석"),
  ("E10", "3관", 1000000, "일반석"),
  ("F1", "3관", 1000000, "일반석"),
  ("F2", "3관", 1000000, "일반석"),
  ("F3", "3관", 1000000, "일반석"),
  ("F4", "3관", 1000000, "일반석"),
  ("F5", "3관", 1000000, "일반석"),
  ("F6", "3관", 1000000, "일반석"),
  ("F7", "3관", 1000000, "일반석"),
  ("F8", "3관", 1000000, "일반석"),
  ("F9", "3관", 1000000, "일반석"),
  ("F10", "3관", 1000000, "일반석"),
  ("G1", "3관", 1000000, "일반석"),
  ("G2", "3관", 1000000, "일반석"),
  ("G3", "3관", 1000000, "일반석"),
  ("G4", "3관", 1000000, "일반석"),
  ("G5", "3관", 1000000, "일반석"),
  ("G6", "3관", 1000000, "일반석"),
  ("G7", "3관", 1000000, "일반석"),
  ("G8", "3관", 1000000, "일반석"),
  ("G9", "3관", 1000000, "일반석"),
  ("G10", "3관", 1000000, "일반석"),
  ("H1", "3관", 1000000, "일반석"),
  ("H2", "3관", 1000000, "일반석"),
  ("H3", "3관", 1000000, "일반석"),
  ("H4", "3관", 1000000, "일반석"),
  ("H5", "3관", 1000000, "일반석"),
  ("H6", "3관", 1000000, "일반석"),
  ("H7", "3관", 1000000, "일반석"),
  ("H8", "3관", 1000000, "일반석"),
  ("H9", "3관", 1000000, "일반석"),
  ("H10", "3관", 1000000, "일반석"),
  ("I1", "3관", 1000000, "일반석"),
  ("I2", "3관", 1000000, "일반석"),
  ("I3", "3관", 1000000, "일반석"),
  ("I4", "3관", 1000000, "일반석"),
  ("I5", "3관", 1000000, "일반석"),
  ("I6", "3관", 1000000, "일반석"),
  ("I7", "3관", 1000000, "일반석"),
  ("I8", "3관", 1000000, "일반석"),
  ("I9", "3관", 1000000, "일반석"),
  ("I10", "3관", 1000000, "일반석"),
  ("B1", "3관", 1000000, "일반석"),
  ("B2", "3관", 1000000, "일반석"),
  ("B3", "3관", 1000000, "일반석"),
  ("B4", "3관", 1000000, "일반석"),
  ("B5", "3관", 1000000, "일반석"),
  ("B6", "3관", 1000000, "일반석"),
  ("B7", "3관", 1000000, "일반석"),
  ("B8", "3관", 1000000, "일반석"),
  ("B9", "3관", 1000000, "일반석"),
  ("B10", "3관", 1000000, "일반석"),
  ("A1", "7관", 1000000, "커플석"),
  ("A2", "7관", 1000000, "커플석"),
  ("A4", "7관", 1000000, "커플석"),
  ("A5", "7관", 1000000, "커플석"),
  ("B1", "7관", 1000000, "일반석"),
  ("B2", "7관", 1000000, "일반석"),
  ("B3", "7관", 1000000, "일반석"),
  ("B4", "7관", 1000000, "일반석"),
  ("B5", "7관", 1000000, "일반석"),
  ("B6", "7관", 1000000, "일반석"),
  ("B7", "7관", 1000000, "일반석"),
  ("B8", "7관", 1000000, "일반석"),
  ("B9", "7관", 1000000, "일반석"),
  ("B10", "7관", 1000000, "일반석"),
  ("O9" ,"1관", 1000001, "일반석"),
  ("G6", "2관", 1000002, "일반석"),
  ("G1", "2관", 1000002, "일반석"),
  ("G2", "2관", 1000002, "일반석"),
  ("G3", "2관", 1000002, "일반석"),
  ("G4", "2관", 1000002, "일반석"),
  ("G5", "2관", 1000002, "일반석"),
  ("G7", "2관", 1000002, "일반석"),
  ("G8", "2관", 1000002, "일반석"),
  ("G9", "2관", 1000002, "일반석"),
  ("G10", "2관", 1000002, "일반석"),
  ("A1", "VIP관", 1000000, "특별석"),
  ("A2", "VIP관", 1000000, "특별석"),
  ("A3", "VIP관", 1000000, "특별석"),
  ("A4", "VIP관", 1000000, "특별석"),
  ("A5", "VIP관", 1000000, "특별석"),
  ("A6", "VIP관", 1000000, "특별석"),
  ("A7", "VIP관", 1000000, "특별석"),
  ("A8", "VIP관", 1000000, "특별석"),
  ("A9", "VIP관", 1000000, "특별석"),
  ("A10", "VIP관", 1000000, "특별석"),
  ("B1", "2관", 1000001, "일반석"),
  ("B2", "2관", 1000001, "일반석"),
  ("B3", "2관", 1000001, "일반석"),
  ("B4", "2관", 1000001, "일반석"),
  ("B5", "2관", 1000001, "일반석"),
  ("B6", "2관", 1000001, "일반석"),
  ("B7", "2관", 1000001, "일반석"),
  ("B8", "2관", 1000001, "일반석"),
  ("B9", "2관", 1000001, "일반석"),
  ("B10", "2관", 1000001, "일반석"),
  ("D12", "특별관", 1000002, "장애인석");

insert into Food_salelist(payment, coupon_number, customer_id) values
(11900, NULL, NULL),
(5700, 44, "dkssud"),
(23400, 4, "dkssud"),
(12500, 444, "dkssud"),
(1500, 4444, "dkssud"),
(9000,NULL,"dkssud")
;

insert into Ticketing_info(pay_amount,pay_way,send_contact,movie_time,theater_name,cinema_id,movie_id) values
(10000000,"신한000000000000","01012344444","2019-12-12 19:00:00","1관",1000000,10000);

insert into Purchase_list(sales_id, menu_id, cinema_id) values
(1, "더블콤보", 1000000),
(2, "더블콤보", 1000000),
(3, "더블콤보", 1000000),
(3, "더블콤보", 1000000),
(3, "즉석구이오징어", 1000000),
(4, "더블콤보", 1000000),
(4, "크리미갈릭핫도그", 1000000),
(5, "즉석구이오징어", 1000000),
(6, "크리미갈릭핫도그", 1000000),
(6, "크리미갈릭핫도그", 1000000);

insert into Schedule_seat(movie_time, theater_name, cinema_id, movie_id, seat_number, ticket_id) values
("2019-12-12 19:00:00", "1관", 1000000, 10000, "A1", 1);
