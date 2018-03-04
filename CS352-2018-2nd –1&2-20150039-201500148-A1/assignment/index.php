<?php


$weather_url = 'http://api.weatherbit.io/v2.0/current?ip=auto&key=1ef7e3ee827d48b8af5802f009c7d26c';
$weather_json = file_get_contents($weather_url);
$weather_array = json_decode($weather_json, true);

$countrycode = $weather_array['data']['0']['country_code'];
$time_zone =$weather_array['data']['0']['timezone'];
$cityname =$weather_array['data']['0']['city_name'];
$dateandtime =$weather_array['data']['0']['ob_time'];
$sunrise =$weather_array['data']['0']['sunrise'];
$sunset =$weather_array['data']['0']['sunset'];
$temp =$weather_array['data']['0']['temp'];
$weather =$weather_array['data']['0']['weather']['description'];

//581a935f78dae2550a18115384bb3de4
//	
//	a57cc799c4397424


$flickr_url='https://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=581a935f78dae2550a18115384bb3de4&lat='.$weather_array['data']['0']['lat'].'&lon='.$weather_array['data']['0']['lon'].'&format=json&nojsoncallback=1';
$flickr_json = file_get_contents($flickr_url);
$flickr_array = json_decode($flickr_json , true);

$photos = $flickr_array['photos']['photo'];
?>


<!doctype html>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/style.css"/>
<meta charset="utf-8">
<title>SW2A1</title>
</head>

<body class="container">
<br><br>
<table class="table table-bordered table-hover text-center text-capitalize text-dark">
<tr><th class="text-primary font-weight-bold" colspan="2">Here are some infromation about your city based on your IP address</th></tr>
<tr>
	<td>
	country code
	</td>
	<td>
	<?php echo $countrycode ?>
	</td>
</tr>
<tr>
	<td>
	time zone
	</td>
	<td>
	<?php echo $time_zone ?>
	</td>
</tr>
<tr>
	<td>
	city name
	</td>
	<td>
	<?php echo $cityname ?>
	</td>
</tr>
<tr>
	<td>
	date and time
	</td>
	<td>
	<?php echo $dateandtime ?>
	</td>
</tr>
<tr>
	<td>
	sunrise
	</td>
	<td>
	<?php echo $sunrise ?>
	</td>
</tr>
<tr>
	<td>
	sunset
	</td>
	<td>
	<?php echo $sunset ?>
	</td>
</tr>
<tr>
	<td>
	temprature
	</td>
	<td>
	<?php echo $temp	?>
	</td>
</tr>
<tr>
	<td>
	weather description
	</td>
	<td>
	<?php echo $weather	?>
	</td>
</tr>
</table>
<div class="text-primary font-weight-bold text-center">
<h4>And here are some images uploaded by people from your city on flickr! </h4>
</div>

<div class="text-center">

<?php
	$i=0;

foreach($photos as $photo){
	if($i>30 and $i<40){
		$image_url = 'https://farm'.$photo['farm'].'.staticflickr.com/'.$photo['server'].'/'.$photo['id'].'_'.$photo['secret'].'_'.'m'.'.jpg';
		echo '<img src="'.$image_url.'">';
	}
	$i++;
	if($i==40){
		break;
	}
}
	
	
?>
</div>
</body>
</html>