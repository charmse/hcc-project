<!DOCTYPE html>
<html>
	<title> HCC User Map </title>
	<head>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBk-H2GmsTKc_5ySfZ_NcfCje_wjmC6Wo0&callback=initMap" type="text/javascript" ></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
		<script>
			//Google Maps API Key = AIzaSyBk-H2GmsTKc_5ySfZ_NcfCje_wjmC6Wo0
			//object which refers to the users
			function user(user, campus, department, usage, ip, locId, lat, long)
			{
				this.userName = user;
				this.campus = campus;
				this.dep = department;
				this.usage = usage; //other usefull or interesting  information can be added if available
				this.ip = ip;
				this.locId = locId;
				this.lat = lat;
				this.long = long;
			}

			//creating the user array of the top 25 users
			var users = [];
			users[0] = new user("charms", "city", "csce", 1000, 3758096129, 0, 0, 0);
			/*
			$i = 0;
			//creating all of the user objects for HCC.
			while(1) {
				users[i] = new user(name, city, department, usage, ip, 0, 0, 0);
			}
			//figuring ip value that is able to get locId.
			for(i=0; i<users.length; i++) {
				users[i].ip = users[i].ip;
			}
			*/
			//Getting the location Id of each user based on their ip.
			$.ajax({
				type: "POST",
				dataType: "json",
				url: "ajaxRequests.php",
				data: {request:"get_blocks_json", parameter:users[0].ip},
				success: function(result) {
					$.each(result, function() {
						users[0].locId = parseInt(this);
						console.log(parseInt(this))
					});
				},
				error: function(err) {
					console.log(err);
				}
			});
			console.log(users[0].locId);
			//Getting the longitude and latitude based on the location ID previously obtained.
			/*$.ajax({
				type: "POST",
				dataType: "json",
				url: "ajaxRequests.php",
				data: {request:"get_location_json", parameter:users[0].locId},
				success: function(result) {
					console.log(result);
					/*$.each(result, function(i, result) {
						console.log(result.locId);
					});
				}
			});*/
			//Creating all of the maps and markers.
			function initialize()
			{
				var mapPropCity = {
					center: new google.maps.LatLng(40.820407, -96.700966),
					zoom: 17,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				var mapCity = new google.maps.Map(document.getElementById("city"), mapPropCity);
				var mapPropEast = {
					center: new google.maps.LatLng(40.831363, -96.665581),
					zoom: 17,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				var mapEast = new google.maps.Map(document.getElementById("east"), mapPropEast);
				var mapPropOmaha = {
					center: new google.maps.LatLng(41.244757, -95.962757),
					zoom: 14,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				var mapOmaha = new google.maps.Map(document.getElementById("omaha"), mapPropOmaha);
				var mapProp1 = {
					center: new google.maps.LatLng(37.0902, -95.7129),
					zoom: 4,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				var map1 = new google.maps.Map(document.getElementById("one"), mapProp1);
				var mapProp2 = {
					center: new google.maps.LatLng(51.786326, 8.424700),
					zoom: 4,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				var map2 = new google.maps.Map(document.getElementById("two"), mapProp2);
				var mapProp3 = {
					center: new google.maps.LatLng(35.270020, 101.542621),
					zoom: 4,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				var map3 = new google.maps.Map(document.getElementById("three"), mapProp3);
				var mapProp4 = {
					center: new google.maps.LatLng(-22.711332, -50.683941),
					zoom: 4,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				var map4 = new google.maps.Map(document.getElementById("four"), mapProp4);
				var mapProp5 = {
					center: new google.maps.LatLng(-3.878291, 38.659076),
					zoom: 4,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				var map5 = new google.maps.Map(document.getElementById("five"), mapProp5);
				var mapProp6 = {
					center: new google.maps.LatLng(-22.322435, 132.831684),
					zoom: 4,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				var map6 = new google.maps.Map(document.getElementById("six"), mapProp6);

				//for loop which goes through the users and
				//creates the markers for each user on the
				//corresponding map
				for(i=0; i<users.length; i++) {
					//var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
					var city0 = new google.maps.Marker({
						position: {lat: users[i].lat, lng: users[i].long},
						map: mapCity,
						visible: true
					});
					//infowindow.open(mapCity,city0);
					var east0 = new google.maps.Marker({
						position: {lat: users[i].lat, lng: users[i].long},
						map: mapEast,
						visible: true
					});
					//infowindow.open(mapEast,east0);
					var omaha0 = new google.maps.Marker({
						position: {lat: users[i].lat, lng: users[i].long},
						map: mapOmaha,
						visible: true
					});
					//infowindow.open(mapOmaha,omaha0);
					var one0 = new google.maps.Marker({
						position: {lat: users[i].lat, lng: users[i].long},
						map: map1,
						visible: true
					});
					//infowindow.open(map1,one0);
					var two0 = new google.maps.Marker({
						position: {lat: users[i].lat, lng: users[i].long},
						map: map2,
						visible: true
					});
					//infowindow.open(map2,two0);
					var three0 = new google.maps.Marker({
						position: {lat: users[i].lat, lng: users[i].long},
						map: map3,
						visible: true
					});
					//infowindow.open(map3,three0);
					var four0 = new google.maps.Marker({
						position: {lat: users[i].lat, lng: users[i].long},
						map: map4,
						visible: true
					});
					//infowindow.open(map4,four0);
					var five0 = new google.maps.Marker({
						position: {lat: users[i].lat, lng: users[i].long},
						map: map5,
						visible: true
					});
					//infowindow.open(map5,five0);
					var six0 = new google.maps.Marker({
						position: {lat: users[i].lat, lng: users[i].long},
						map: map6,
						visible: true
					});
					//infowindow.open(map6,six0);
				}
			}

			google.maps.event.addDomListener(window, 'load', initialize);

		</script>
	</head>
	<style>
		body{width:4096px; height:2160px;margin: 20px auto;}
		.boxed{width:100s%;height:5%;margin: 40px 40px 40px 40px auto;background-color:#d00000;text-shadow: 3px 3px #800000;box-shadow: 12px 12px 0px #800000;margin: auto;}
		.mapLabel{margin: 20px 20px;float:left;position:relative;text-align:center;font-size:20px;font-family:georgia;font-weight:bold;color:#d00000;text-shadow: 1px 1px #bdbdbd;}
		.googleMap{box-shadow: 12px 12px 0px #bdbdbd;width:100%;height:100%;float:inherit;position:inherit}
	</style>
	<body style="background-color:#FEFDFA;">
		<div align="center" id="banner" class="boxed" style="text-align:center;font-size:85px;font-family:Georgia;font-weight:bold;color:#FEFDFA;">
			<img src="R-N.HEX.png" alt="N" style="float:left;width:90px;height:90px;margin:7px 7px">
			<img src="R-N.HEX.png" alt="N" style="float:right;width:90px;height:90px;margin:7px 7px">
			- Holland Computing Center Users -
		</div>
		<div class="mapLabel" style="width:1324px;height:744px;"><div id="one" class="googleMap"></div></div>
		<div class="mapLabel" style="width:1324px;height:744px;"><div id="two" class="googleMap"></div></div>
		<div class="mapLabel" style="width:1324px;height:744px;"><div id="three" class="googleMap"></div></div>
		<div class="mapLabel" style="width:1324px;height:744px;"><div id="omaha" class="googleMap"></div></div>
		<div class="mapLabel" style="width:1324px;height:744px;"><div id="city" class="googleMap"></div></div>
		<div class="mapLabel" style="width:1324px;height:744px;"><div id="east" class="googleMap"></div></div>
		<div class="mapLabel" style="width:1324px;height:744px;"><div id="four" class="googleMap"></div></div>
		<div class="mapLabel" style="width:1324px;height:744px;"><div id="five" class="googleMap"></div></div>
		<div class="mapLabel" style="width:1324px;height:744px;"><div id="six" class="googleMap"></div></div>
	</body>
</html>
