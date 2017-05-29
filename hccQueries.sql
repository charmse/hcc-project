use charms;

#SELECT latitude AS 'Latitude', longitude AS 'Longitude' FROM Location WHERE locId = 836138;

#SELECT startIpNum AS 'Start', endIpNum AS 'End', locId AS 'LocId' FROM Blocks WHERE startIpNum = 3758096128;

SELECT locId FROM Blocks WHERE 3758096129 >= startIpNum AND 3758096129 <= endIpNum;