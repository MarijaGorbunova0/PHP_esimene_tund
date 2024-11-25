CREATE TABLE loomad(
                       id int PRIMARY key AUTO_INCREMENT,
                       loomanimi varchar(20),
                       omanik varchar(30),
                       varv varchar(20));

INSERT INTO loomad(loomanimi, omanik, varv)
values('kass Vassily', 'David', 'red');
SELECT * from loomad;