insert into coupon values
("생일축하쿠폰", "영화", 50.0),
("등급별혜택쿠폰", "영화", 35.0),
("더쳐먹길바라쿠폰", "음식", 40.0),
("씹고뜯고맛보고즐겨쿠폰", "영화&음식", 30.0),
("서버점검보상쿠폰", "영화", 100.0),
("계열사직원쿠폰", "영화&음식", 40.0),
("쓰는사람이있을카쿠폰", "영화", 5.0);
insert into customer_rank values ("SVIP","해당분기 20회 이상"),
("VVIP", "해당분기 20회미만 10회이상"),
("RVIP", "해당분기 10회미만 5회이상"),
("VIP", "해당분기 5회미만");

insert into Actor values
(1000,"제니퍼 로렌스","Jennifer Lawrence","미국","https://www.facebook.com/JenniferLawrence/","미국사람이다"),
(1001,"조시 허처슨","Josh Hutcherson","미국","https://twitter.com/jhutch1992","남자사람이다"),
(1002,"한효주","Hyo Joo Han","대한민국","https://www.instagram.com/hanhyojoo222/","한효주다"),
(1003, "박서준", "Seo Jun Park", "대한민국", "https://instagram.com/bn_sj2013", "박서준이다"),
(1004, "벤 버트", "Ben Burtt", "미국", "https://www.skysound.com/people/ben-burtt/", "벤 버트이다"),
(1005, "엘리사 나이트", "Elissa Knight", "미국", "https://www.imdb.com/name/nm2264184/", "엘리사 나이트이다"),
(1006, "이선", "Sun Lee", "대한민국", "https://lordofvoice.com/leesun", "이선이다"),
(1007, "이미자", "Mi Ja Lee", "대한민국", "google.com", "사이트가 없다."),
(1008, "이디나 멘젤", "Idina Mentzel", "미국", "https://twitter.com/idinamenzel", "이디나 멘젤이다"),
(1009,"크리스틴 벨","Kristen Bell","미국","https://twitter.com/IMKristenBell","크리스틴 벨이다"),
(1010,"조진웅","Jin Woong Cho","대한민국","http://esaram.co.kr/ko/chojinwoong","조진웅이다"),
(1011,"이하늬","Ha Nee Lee","대한민국","http://esaram.co.kr/ko/leehanee","이하늬이다"),
(1012,"송강호","Kang Ho Song","대한민국","google.com","송강호이다"),
(1013,"변희봉","Hee Bong Byun","대한민국","google.com","변희봉이다"),
(1014,"서현진","Hyun jin Seo","대한민국","naver.com","서현진이다"),
(1015,"이민기","Moon Ji-in","대한민국","naver.com","문지인이다"),
(1016,"코자쿠라 에츠코","Kozakura etsuko","일본","naver.com","일본인이다"),
(1017,"토마츠 하루카","Tomatsu haruka","일본","naver.com","일본인이다"),
(1018, "이선균", "Seon-gyun Lee", "대한민국", "https://www.kmdb.or.kr/db/per/00014334","이선균이다"),
(1019, "조여정", "Yeo Jeong Cho", "대한민국", "https://www.highentfamily.com/cho-yeo-jeong","조여정이다"),
(1020, "브리 라슨", "Brie Larson", "미국", "https://www.instagram.com/brielarson/", "브리 라슨이다."),
(1021, "새뮤얼 L. 잭슨", "Samuel L. Jackson", "미국", "https://www.instagram.com/samuelljackson/", "새뮤얼 잭슨이다."),
(1022, "류준열", "Jun Yeol Ryu", "대한민국", "http://www.c-jes.com/ko/artist/about.asp?artist=39", "류준열이다."),
(1023, "유지태", "Ji Tae Yoo", "대한민국", "http://namooactors.com/bbs/board.php?bo_table=nm2001", "유지태이다.");

insert into cinema(cinema_id,hp,name,assets,area,road_address) values
(1000000,01164723523,'안산 중앙 1호점',12000,'서울/경기','안산시 단원구 가루개로 560'),
(1000001,01146275332,'zx여수xz',5492814500,'전라남도','전라남도 여수시 어항단지로 474'),
(1000002,01047265826,'강남',12345678910,'서울/경기','서초대로77길 3');

insert into Department values
("총무","직원들이 회사 생활을 잘 할 수 있도록 도와주는 전체적인 업무"),
("경리","기업경영관리 업무"),
("영사","영화가 제대로 나오는지 확인하는 업무,상영관내 온도체크,홀 정리"),
("시설","시설물 관리"),
("청소","열심히 청소해랏!"),
("매점","매점에서 식품,물건 판매와 현장 티켓 발급"),
("아르바이트생 인사담당","아르바이트 직원 관리"),
("슈퍼바이저","가맹점에 대한 운영지원, 감독하는 역할"),
("필드매니저","본사에 보구업무"),
("영화관장","앉아서 돈버는 직업"),
("그외","잡다한 일");

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
insert into movie values
(10010,"뽀로로 극장판 보물섬 대모험","전체관람가",79,"2019-4-25","넥스트엔터테인먼트월드",1234567),
(10003, "괴물", "12세관람가", 119, "2006-7-27", "쇼박스", 13019991),
(10004, "블랙머니", "12세관람가", 113, "2019-11-13", "에이스메이커무비웍스",0),
(10006, "헝거게임1", "15세관람가", 142, "2012-4-5", "라이언스게이트",6453234),
(10007, "뷰티인사이드", "12세관람가", 127, "2015-8-20", "NEW",2000000),
(10008, "월E", "전체관람가", 104, "2008-8-6", "월트디즈니픽쳐스",1300000),
(10009,"극장판 요괴워치 탄생의 비밀이다냥!","전체관람가",97,"2015-7-22","도호",550961),
(10000,"겨울왕국2","전체관람가",103,"2019-11-21","월트 디즈니 컴퍼니 코리아",12435390),
(10002,"기생충","15세관람가",132,"2019-5-30","CJ엔터테인먼트",10084475),
(10001,"캡틴마블","12세관람가",123,"2019-3-6","월트 디즈니 컴퍼니 코리아",5801070),
(10005, "돈", "15세", 115, "2019-3-20", "쇼박스", 3348753)
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
(103, "이동준", "Dongjoon", "한국", "naver.com","킹왕짱 동준"),
(104, "봉준호", "Joon Ho Bong", "대한민국", "google.com", "봉준호 감독이다."),
(105, "애나 보든", "Anna Boden", "미국", "google.com", "애나 보든이다."),
(106, "박누리", "", "대한민국", "google.com", "박누리 감독이다.");

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
  (37001, "김우정", "9903071234567", "01081261399", 20000, 9, "756001-00-073689", 1000000, "총무"),
  (37002, "지창욱", "8707051234567", "01019203495", 15000, 8, "720941-00-012345", 1000001, "매점"),
  (37003, "박민영", "8603041234567", "01090342839", 10000, 7, "129955-00-392039", 1000002, "경리");

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

insert into movie_review values 
(10005, "dkssud", "2019-11-21 13:33:45", 7),
(10001, "dkssud", "2019-11-21 13:35:55", 2),
(10007, "gktpdy", "2018-11-21 11:55:24", 3),
(10003, "gktpdy", "2019-11-21 18:23:22", 2),
(10001, "gktpdy", "2016-11-21 12:44:54", 4),
(10008, "minjaejoa", "2017-05-12 17:12:00", 5),
(10002, "minjaejoa", "2018-08-31 17:12:00", 10),
(10001, "minjaejoa", "2017-05-12 17:12:00", 5),
(10000, "minjaejoa", "2017-05-12 17:12:00", 10);

insert into Movie_studio values
("아이코닉스",10010),
("청어람",10010),
("질라라비 아우라픽처스",10010),
("월트 디즈니 애니메이션 스튜디오",10000),
("바른손이앤에이", 10002),
("마블 스튜디오", 10001),
("사나이픽처스", 10005);

insert into notice(cinema_id, content) values
(1000000, "안녕하세요! 최강디비는 탈인간급 실력을 갖고있읍니다. 감사합니다 ㅎ"),
(1000001, "안녕하세요! zx여수xz점 점장 이동준입니다. 최강디비는 탈인간급 실력을 갖고있읍니다. 감사합니다 ㅎ"),
(1000002, "안녕하세요! 강남좋아. 감사합니다.");

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
("판타지",10000)
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
("2019-12-15 9:00:00","1관",1000000,10000),
("2019-12-16 12:00:00","1관",1000000,10000),
("2019-12-17 15:15:00","1관",1000000,10000),
("2019-12-18 18:30:00","1관",1000000,10000),
("2019-12-19 22:00:00","1관",1000000,10000),
("2019-12-20 9:00:00","7관",1000000,10001),
("2019-12-1 12:00:00","7관",1000000,10001),
("2019-12-2 15:15:00","7관",1000000,10001),
("2019-12-3 18:30:00","7관",1000000,10001),
("2019-12-4 22:00:00","7관",1000000,10001),
("2019-12-25 9:00:00","VIP관",1000000,10002),
("2019-12-20 12:00:00","VIP관",1000000,10002),
("2019-12-20 15:15:00","VIP관",1000000,10002),
("2019-12-20 18:30:00","VIP관",1000000,10002),
("2019-12-20 22:00:00","VIP관",1000000,10002),
("2019-12-15 9:25:00","1관",1000001,10003),
("2019-12-16 12:00:00","1관",1000001,10003),
("2019-12-17 15:15:00","1관",1000001,10003),
("2019-12-18 18:30:00","1관",1000001,10003),
("2019-12-19 22:00:00","1관",1000001,10003),
("2019-12-20 8:30:00","7관",1000001,10004),
("2019-12-1 12:00:00","7관",1000001,10004),
("2019-12-2 15:15:00","7관",1000001,10004),
("2019-12-3 18:30:00","7관",1000001,10004),
("2019-12-4 22:00:00","7관",1000001,10004),
("2019-12-25 9:00:00","2관",1000001,10005),
("2019-12-20 12:00:00","2관",1000001,10005),
("2019-12-20 15:15:00","2관",1000001,10005),
("2019-12-20 18:30:00","2관",1000001,10005),
("2019-12-20 22:00:00","2관",1000001,10005),
("2019-12-15 9:00:00","1관",1000002,10006),
("2019-12-16 12:00:00","1관",1000002,10006),
("2019-12-17 15:15:00","1관",1000002,10006),
("2019-12-18 18:30:00","1관",1000002,10006),
("2019-12-19 22:00:00","1관",1000002,10007),
("2019-12-20 9:00:00","2관",1000002,10007),
("2019-12-1 12:00:00","2관",1000002,10007),
("2019-12-2 15:15:00","2관",1000002,10007),
("2019-12-3 18:30:00","2관",1000002,10008),
("2019-12-4 22:00:00","2관",1000002,10008),
("2019-12-25 9:00:00","특별관",1000002,10008),
("2019-12-20 12:00:00","특별관",1000002,10008),
("2019-12-20 15:15:00","특별관",1000002,10009),
("2019-12-20 18:30:00","특별관",1000002,10009),
("2019-12-20 22:00:00","특별관",1000002,10009);

insert into Seat values
  ("A3", "1관", 1000000, "커플석"),
  ("A1", "1관", 1000000, "커플석"),
  ("A2", "1관", 1000000, "커플석"),
  ("A4", "1관", 1000000, "커플석"),
  ("A5", "1관", 1000000, "커플석"),
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

insert into Food_salelist(payment, coupon_number, coupon_name, customer_id) values
(11900, NULL, NULL, NULL),
(5700, 44, "쓰는사람이있을카쿠폰", "dkssud"),
(23400, 4, "쓰는사람이있을카쿠폰", "dkssud"),
(12500, 444, "쓰는사람이있을카쿠폰", "dkssud"),
(1500, 4444, "쓰는사람이있을카쿠폰", "dkssud"),
(9000,NULL,NULL,"dkssud")
;

insert into Ticketing_info(pay_amount,pay_way,send_contact,movie_time,theater_name,cinema_id,movie_id) values
(10000000,"신한000000000000",01012344444,"2019-12-15 9:00:00","1관",1000000,10000),
(10000000,"신한000000000000",01012344444,"2019-12-15 9:00:00","1관",1000000,10000),
(10000000,"신한000000000000",01012344444,"2019-12-15 9:00:00","1관",1000000,10000),
(10000000,"신한000000000000",01012344444,"2019-12-15 9:00:00","1관",1000000,10000),
(10000000,"신한000000000000",01012344444,"2019-12-15 9:00:00","1관",1000000,10000),
(10000000,"신한000000000000",01012344444,"2019-12-1 12:00:00","7관",1000000,10001),
(10000000,"신한000000000000",01012344444,"2019-12-1 12:00:00","7관",1000000,10001),
(10000000,"신한000000000000",01012344444,"2019-12-25 9:00:00","VIP관",1000000,10002),
(10000000,"신한000000000000",01012344444,"2019-12-25 9:00:00","VIP관",1000000,10002),
(10000000,"신한000000000000",01012344444,"2019-12-20 12:00:00","2관",1000001,10005),
(10000000,"신한000000000000",01012344444,"2019-12-15 9:00:00","1관",1000000,10000);

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
("2019-12-15 9:00:00", "1관", 1000000, 10000, "A1", 1),
("2019-12-15 9:00:00", "1관", 1000000, 10000, "A3", 2),
("2019-12-15 9:00:00", "1관", 1000000, 10000, "A5", 3),
("2019-12-15 9:00:00", "1관", 1000000, 10000, "A2", 4),
("2019-12-15 9:00:00", "1관", 1000000, 10000, "B1", 5),
("2019-12-15 9:00:00", "1관", 1000000, 10000, "B2", 5),
("2019-12-1 12:00:00", "7관", 1000000, 10001, "B4", 6),
("2019-12-1 12:00:00", "7관", 1000000, 10001, "B5", 6),
("2019-12-1 12:00:00", "7관", 1000000, 10001, "B7", 7),
("2019-12-25 9:00:00", "VIP관", 1000000, 10002, "A2", 8),
("2019-12-25 9:00:00", "VIP관", 1000000, 10002, "A3", 8),
("2019-12-25 9:00:00", "VIP관", 1000000, 10002, "B5", 9),
("2019-12-20 12:00:00", "2관", 1000001, 10005, "B5", 10),
("2019-12-15 9:00:00", "1관", 1000000, 10000, "B5", 11);