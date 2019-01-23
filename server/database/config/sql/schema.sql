create database if not exists `WEB_APP_STORE`;

drop table if exists `USERS`;

drop table if exists `APPLICATIONS`;

drop table if exists `REVIEWS`;

create table if not exists `USERS` (
  `USERNAME` varchar(32) not null,
  `PASSWORD` varchar(32) not null,
  primary key `USERNAME` (`USERNAME`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

create table if not exists `APPLICATIONS` (
  `NAME` varchar(32) not null,
  `DESCRIPTION` varchar(255),
  `LOGO` longblob,
  `SOURCE` longblob not null,
  `ID` varchar(32) not null,
  primary key `ID` (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

create table if not exists `REVIEWS` (
  `SCORE` int not null,
  `COMMENT` varchar(255),
  `ID` varchar(32) not null,
  `REVIEWER_NAME` varchar(32) not null,
  `APPLICATION_ID` varchar(32) not null,
  primary key `ID` (`ID`),
  foreign key (`APPLICATION_ID`) references `APPLICATIONS`(`ID`) ON DELETE CASCADE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

