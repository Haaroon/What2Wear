<?php

//~ http://api.worldweatheronline.com/free/v1/weather.ashx?key=xxxxxxxxxxxxxxxxx&q=SW1&num_of_days=3&format=xml

//Minimum request
//Can be city,state,country, zip/postal code, IP address, longtitude/latitude. If long/lat are 2 elements, they will be assembled. IP address is one element.
echo $_POST['posted'];
$value = $_POST['posted'];
$value  = (explode(',', $value, 2));
$loc_array= Array($value[0], $value[1]);		//data validated in foreach. 
$api_key="96g83wx8mpewadbc5kdbr95e";		//should be embedded in your code, so no data validation necessary, otherwise if(strlen($api_key)!=24)
$num_of_days=1;					//data validated in sprintf

$loc_safe=Array();
foreach($loc_array as $loc){
	$loc_safe[]= urlencode($loc);
}
$loc_string=implode(",", $loc_safe);

//To add more conditions to the query, just lengthen the url string
$basicurl=sprintf('http://api.worldweatheronline.com/free/v1/weather.ashx?key=%s&q=%s&num_of_days=%s', 
	$api_key, $loc_string, intval($num_of_days));

//print $basicurl . "<br />";



//Premium API
$premiumurl=sprintf('http://api.worldweatheronline.com/premium/v1/premium-weather-V2.ashx?key=%s&q=%s&num_of_days=%s', 
	$api_key, $loc_string, intval($num_of_days));

$xml_response = file_get_contents($basicurl);
$xml = simplexml_load_string($xml_response);
//printf("<p>Current wind speed is %s mph blowing to %s</p>", 
	//$xml->current_condition->windspeedMiles, $xml->current_condition->winddir16Point );

//print "<pre>";
//print_r($xml);
//print "</pre>";
$area=  ($xml->request->type);
$area2 = ($xml->request->query);
$temp =  $xml->current_condition->temp_C;
$windspeed = $xml->weather->windspeedKmph;
if ($temp>18)
{
	$clothes_color="light";
	$top= "T-shirt";
	$bottom= "Short trouser";
	$footwear = "sandels/ligh trainers";
	$extraInfo = 'Seems very warm today, Enjoy it! Work outside, drink plenty of fluids.' ;
	$topurl = "";
	$bottomurl = "";
	$footwearurl = "";
	
}
else if ($temp<5)
{
	$clothes_color="light";
	$top= "Long sleeved shirt , on top a jumper or hoodie";
	$bottom= "Long trousers";
	$footwear = "Thick trainers";
	$extraInfo =  'Seems quite cold,, Wrap up warm!' ;
	$topurl = "";
	$bottomurl = "";
	$footwearurl = "";
	if ($temp<=0)
	{
		$extraInfo = 'It may snow, temperatures are below freezing so wrap up very well.';
		$footwear = 'Wear boots with thick socks, it will be very cold!';
		$topurl = "";
	$bottomurl = "";
	$footwearurl = "";
	}
}
else 
{
	$clothes_color="darkish ";
	$top= "long sleeved top";
	$bottom= "full length trouser";
	$footwear = "regular trainers";
	$extraInfo =  'Mild weather, Stay warm.';
	$topurl = "";
	$bottomurl = "";
	$footwearurl = "";
}




if ($windspeed==0)
{
	$windDanger = 'calm';
	$danger = "Nothing, mate you wont even notice";
}
else if ($windspeed>=6 && $windspeed<=11)
{
	$windDanger = 'light air';
	$danger = "You'll feel it on your face and see twigs moving";
}

else if ($windspeed>=12 && $windspeed<=19)
{
	$windDanger = 'slight breeze';
	$danger = "Paper's going to fly, Flags will dance";
	$jacket = "Wear a jacket!";
}
else if ($windspeed>=20 && $windspeed<=29)
{
	$windDanger = 'moderate speed';
	$danger = "Dust will start to move, beware, maybe wear goggles 8) ";
	$jacket = ' Wear a strong jacket to reflect the wind! ';
}
else if ($windspeed>=30)
{
	$windDanger = 'moderate speed';
	$danger = "Leaves will swag, chance of a hurricane, be very careful";
	$jacket = ' Wear a very thick jacket, also wear a face mask and goggles, wind speed is very high';
}





//search for country

//<form action='' method="post">
//Location : <input type="text" name="location">
//<input type="submit">
//</form>


$searchXML = sprintf('http://api.worldweatheronline.com/free/v1/search.ashx?key=96g83wx8mpewadbc5kdbr95e&query=London&num_of_results=3&format=xml');
//echo $searchXML;
$p = xml_parser_create();
xml_parse_into_struct($p, $searchXML, $vals, $index);
xml_parser_free($p);
//echo "Index array\n";
//print_r($index);
//echo "\nVals array\n";
//print_r($vals);




$dom = new DOMDocument();

//$dom->load('search.xml');
$i=0;

foreach ($dom->getElementsByTagName('result') as $entry) {
 
	//$found[] = array(	'area_name'=>$area_name, 'country'=>$country, 'region'=$region );
	$area_name = $entry->getElementsByTagName('areaName')->item(0)->textContent;
	$country = $entry->getElementsByTagName('country')->item(0)->textContent;
	$region = $entry->getElementsByTagName('region')->item(0)->textContent;
	//$found['area_name'] = $area_name;
	//$found['country']=$country;
	//$found['region'=$region;
	$found[ ] = array(	"area_name"=>$area_name, "country"=>$country, "region"=>$region );

}
//print_r($found);
//print('<br/>');

?>

<a href="index.php">Back to main</a>