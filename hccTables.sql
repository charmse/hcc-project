#drop table if they exist
use charms;
DROP TABLE IF EXISTS Blocks;
DROP TABLE IF EXISTS Location;

CREATE TABLE Blocks (
	blocksID int not null auto_increment,
    startIpNum bigint not null,
    endIpNum bigint not null,
    locId int not null,
    primary key(blocksId),
    constraint uniqueStartIpNum unique index(startIpNum)
)Engine=InnoDB,COLLATE=latin1_general_cs;

CREATE TABLE Location (
	locationID int not null auto_increment,
    locId int not null,
    latitude double not null,
    longitude double not null,
    primary key(locationID),
    constraint uniqueLocId unique indedx(locId)
)Engine=InnoDB,COLLATE=latin1_general_cs;
