CREATE DATABASE societalIssue;

-- CREATE TABLE organ (
-- orgId serial PRIMARY KEY ,
-- name CHAR(15) NOT NULL,
-- email VARCHAR(30) NOT NULL,
-- website VARCHAR(20),
-- phoneNo VARCHAR(10),
-- address VARCHAR(20),
-- orgType VARCHAR(20) );



CREATE TABLE organ (
orgId serial PRIMARY KEY ,
name CHAR(15) NOT NULL,
email VARCHAR(30) NOT NULL,
phoneNo VARCHAR(10),
pass VARCHAR(10) );

CREATE TABLE bankAccount(
bankId serial PRIMARY KEY,
bankName CHAR(20) ,
accountNo VARCHAR(20) 
);

CREATE TABLE people(
perId serial PRIMARY KEY,
uname CHAR(15),
pno VARCHAR(10),
email VARCHAR (30),
pass VARCHAR (10)
);

CREATE TABLE events(
eventId serial PRIMARY KEY,
orgName VARCHAR(30),
eventName VARCHAR (20),
eventAddress VARCHAR(30),
eventDate date,
eventTime time);

INSERT INTO people(uname , pno,email,pass) VALUES ('Person1', '9123456780','per1@gmail.com','per1');
INSERT INTO people(uname , pno,email,pass) VALUES ('Person2', '9123456780','per2@gmail.com','per2');
INSERT INTO people(uname , pno,email,pass) VALUES ('Person3', '9123456780','per3@gmail.com','per3');
INSERT INTO people(uname , pno,email,pass) VALUES ('Person4', '9123456780','per4@gmail.com','per4');
INSERT INTO people(uname , pno,email,pass) VALUES ('Person5', '9123456780','per5@gmail.com','per5');
INSERT INTO people(uname , pno,email,pass) VALUES ('Person6', '9123456780','per6@gmail.com','per6');
INSERT INTO people(uname , pno,email,pass) VALUES ('Person7', '9123456780','per7@gmail.com','per7');





INSERT INTO events(eventName,orgName, eventAddress, eventDate, eventTime) VALUES ('event1', 'Org1','add1','2018-02-12','16:00:00');
INSERT INTO events(eventName,orgName, eventAddress, eventDate, eventTime) VALUES ('event2','Org2', 'add2','2018-03-12','17:00:00');
INSERT INTO events(eventName,orgName, eventAddress, eventDate, eventTime) VALUES ('event3','Org3', 'add3','2018-04-12','20:00:00');
INSERT INTO events(eventName,orgName, eventAddress, eventDate, eventTime) VALUES ('event4','Org4', 'add4','2018-05-12','21:00:00');
INSERT INTO events(eventName, orgName,eventAddress, eventDate, eventTime) VALUES ('event5','Org5', 'add5','2018-06-12','17:00:00');
INSERT INTO events(eventName,orgName, eventAddress, eventDate, eventTime) VALUES ('event6', 'Org6','add6','2018-07-12','13:00:00');
INSERT INTO events(eventName,orgName, eventAddress, eventDate, eventTime) VALUES ('event7', 'Org7','add7','2018-08-12','12:00:00');
INSERT INTO events(eventName,orgName, eventAddress, eventDate, eventTime) VALUES ('event8', 'Org8','add8','2018-09-12','11:00:00');
INSERT INTO events(eventName,orgName, eventAddress, eventDate, eventTime) VALUES ('event9','Org9', 'add9','2018-10-12','10:00:00');

