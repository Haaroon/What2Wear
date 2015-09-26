<!DOCTYPE html>
<?php

//~ http://api.worldweatheronline.com/free/v1/weather.ashx?key=xxxxxxxxxxxxxxxxx&q=SW1&num_of_days=3&format=xml

//Minimum request
//Can be city,state,country, zip/postal code, IP address, longtitude/latitude. If long/lat are 2 elements, they will be assembled. IP address is one element.
//echo $_POST['posted'];
//$value = $_POST['posted'];

	$value="London, United Kingdom";	

$value  = (explode(',', $value, 2));
$loc_array= Array("London", "United Kingdom");		//data validated in foreach. 
$api_key="96g83wx8mpewadbc5kdbr95e";		//should be embedded in your code, so no data validation necessary, otherwise if(strlen($api_key)!=24)
$num_of_days=1;					//data validated in sprintf

$loc_safe=Array();
foreach($loc_array as $loc){
	$loc_safe[]= urlencode($loc);
}
$loc_string=implode(",", $loc_safe);

//To add more conditions to the query, just lengthen the url string
//$basicurl=sprintf('http://api.worldweatheronline.com/free/v1/weather.ashx?key=%s&q=%s&num_of_days=%s', 
	//$api_key, $loc_string, intval($num_of_days));

//print $basicurl . "<br />";



//Premium API
//$premiumurl=sprintf('http://api.worldweatheronline.com/premium/v1/premium-weather-V2.ashx?key=%s&q=%s&num_of_days=%s', 
	//$api_key, $loc_string, intval($num_of_days));

//$xml_response = file_get_contents($basicurl);
//$xml = simplexml_load_string($xml_response);
//printf("<p>Current wind speed is %s mph blowing to %s</p>", 
	//$xml->current_condition->windspeedMiles, $xml->current_condition->winddir16Point );

//print "<pre>";
//print_r($xml);
//print "</pre>";
$area=  "London";
$area2 = "UK" ;
$temp =  "15" ;
$windspeed = "13";
if ($temp>18)
{
	$clothes_color="light";
	$top= "T-shirt";
	$bottom= "Short trouser";
	$footwear = "sandels/light trainers";
	$extraInfo = 'Seems very warm today, Enjoy it! Work outside, drink plenty of fluids.' ;
	$topurl = "images/T-Shirt.png";
	$bottomurl = "images/shorts.png";
	$footwearurl = "images/flipflop.png";
	
}
else if ($temp<5)
{
	$clothes_color="light";
	$top= "Long sleeved shirt , on top a jumper or hoodie";
	$bottom= "Long trousers";
	$footwear = "Thick trainers";
	$extraInfo =  'Seems quite cold,, Wrap up warm!' ;
	$topurl = "images/jacket.png";
	$bottomurl = "images/long-trousers.png";
	$footwearurl = "images/shoes.png";
	if ($temp<=0)
	{
		$top = "full length coat";
		$bottom = "full length thick pants";
		$extraInfo = 'It may snow, temperatures are below freezing so wrap up very well.';
		$footwear = 'Wear boots with thick socks, it will be very cold!';
		$topurl = "images/coat.png";
	$bottomurl = "images/pants.png";
	$footwearurl = "images/boots.png";
	}
}
else 
{
	$clothes_color="darkish ";
	$top= "long sleeved top";
	$bottom= "full length trouser";
	$footwear = "regular trainers";
	$extraInfo =  'Mild weather, Stay warm.';
	$topurl = "images/hoodie.png";
	$bottomurl = "images/long-trousers.png";
	$footwearurl = "images/shoes.png";
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


//$searchXML = sprintf('http://api.worldweatheronline.com/free/v1/search.ashx?key=96g83wx8mpewadbc5kdbr95e&query=London&num_of_results=3&format=xml');
//echo $searchXML;
//$p = xml_parser_create();
//xml_parse_into_struct($p, $searchXML, $vals, $index);
//xml_parser_free($p);
//echo "Index array\n";
//print_r($index);
//echo "\nVals array\n";
//print_r($vals);




//$dom = new DOMDocument();

//$dom->load('search.xml');
$i=0;

//foreach ($dom->getElementsByTagName('result') as $entry) {
 
	//$found[] = array(	'area_name'=>$area_name, 'country'=>$country, 'region'=$region );
	//$area_name = $entry->getElementsByTagName('areaName')->item(0)->textContent;
	//$country = $entry->getElementsByTagName('country')->item(0)->textContent;
	//$region = $entry->getElementsByTagName('region')->item(0)->textContent;
	//$found['area_name'] = $area_name;
	//$found['country']=$country;
	//$found['region'=$region;
	//$found[ ] = array(	"area_name"=>$area_name, "country"=>$country, "region"=>$region );

//}
//print_r($found);
//print('<br/>');

?>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>What 2 wear</title>
		<meta name="description" content="Expanding Overlay Effect: Revealing content using CSS clip" />
		<meta name="keywords" content="css, css3, clip, rect(), overlay, expand, fixed, effect, responsive" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/climacons.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
		<div class="container">	
			<!-- Codrops top bar --><!--/ Codrops top bar -->
			<header class="clearfix">
				<h1>What to Wear?<br/><br/>
				<span>Enter City Name/Country to Store</span></h1>	
<form action="search.php" method="POST">
<input type="text" name="cityName" style="position:relative; top:95px; right: -60px;"/>
<input type="submit" style="position:relative; top:95px; right: -80px;  border:2px solid grey; font-weight:bold; background-color:#930; color:white; border-radius:5px;" >
</form>

<?php $weatherType = "Sunny";

$weathercode=113;
$classIcon = 'icon-clima-1 rb-span-4';

if ($weathercode == 113)
{
$classIcon = 'icon-clima-2 rb-span-4'; 
}
else if ($weathercode >= 116 &&$weathercode <= 176)
{
$classIcon = 'icon-clima-4 rb-span-4';
}
else if ($weathercode >= 179 && $weathercode <= 184)
{
$classIcon = 'icon-clima-6 rb-span-4';
}
else if ($weathercode == 185)
{
$classIcon = 'icon-clima-3 rb-span-4';
}
else if ($weathercode == 200)
{
$classIcon = 'icon-clima-8 rb-span-4';
}
else if ($weathercode >= 227 && $weathercode <=230)
{
$classIcon = 'icon-clima-6 rb-span-4';
}
else if ($weathercode >= 240 && $weathercode<260)
{
$classIcon = 'icon-clima-1 rb-span-4';
}
else if ($weathercode >= 263 && $weathercode<=326)
{
$classIcon = 'icon-clima-3 rb-span-4';
}
else if ($weathercode == 359 )
{
$classIcon = 'icon-clima-3 rb-span-4';
}
else if ($weathercode >= 329 && $weathercode<=377)
{
$classIcon = 'icon-clima-6 rb-span-4';
}
else if ($weathercode >= 386 && $weathercode<=395)
{
$classIcon = 'icon-clima-8 rb-span-4';
}
else
{

}
?>
			  <nav class="codrops-demos"></nav>
			</header>
			<div class="main">

				<ul id="rb-grid" class="rb-grid clearfix">
                	<br/><br/><br/>
                    
					<li class="icon-clima-1 rb-span-4">
						<h3>UK</h3>
                        <span class="rb-temp"><?php echo $temp.'°C'; ?></span>
						<div class="rb-overlay">
						<span class="rb-close">close</span>
							<div class="rb-week">
								<div><span class="rb-city"><?php echo $area2; ?></span><span class="icon-clima-9"></span><span><?php echo $temp.'°C'; ?></span></div>
								<div><span>MinC</span>
                       <span>1 °C</span></div>
								<div><span>MaxC</span>
                       <span> 20°C</span></div>
								<div><span>MinF</span>
                       <span> 25</span></div>
								<div><span>MaxF</span>
                       <span>33</span></div>
								<div><span>Wind</span>
                       <span>15 <br/> MPH</span></div>
								<div><span>Hum</span>
                       <span>70</span></div>
								<div><span>Vis</span>
                       <span>6</span></div>
							</div>
						</div>
					</li>
					
							
					</li>
				</ul>
                
            <div>   
            <ul id="rb-grid" class="rb-grid clearfix">
                	
					<li class="icon-clima-1 rb-span-2">
						<h3>You should wear:</h3> 
            		</li>
             
           
					<li class="icon-clima-1 rb-span-1">
						<h3><?php echo $top; ?></h3> 
            		</li>
                    
                    <li class="icon-clima-1 rb-span-1">
						<h3><img src="<?php echo $topurl; ?>" width="200px" height="200px" /></h3> 
            		</li>
        
                    
            <div>   
            <ul id="rb-grid" class="rb-grid clearfix">
                	
					<li class="icon-clima-1 rb-span-1">
						<h3><?php echo $bottom; ?></h3> 
            		</li>
             
           
					<li class="icon-clima-1 rb-span-1">
						<h3><img src="<?php echo $bottomurl; ?>" width="200px" height="200px" /></h3> 
            		</li>
                    
                    <li class="icon-clima-1 rb-span-1">
						<h3><?php echo $footwear; ?></h3> 
            		</li>
                    
                    <li class="icon-clima-1 rb-span-1">
						<h3><img src="<?php echo $footwearurl; ?>" width="200px" height="200px" /></h3> 
            		</li>
                    
                    </ul></div>
				
			</div> 
            
            <div>   
            <ul id="rb-grid" class="rb-grid clearfix">
                	
					<li class="icon-clima-1 rb-span-1">
						<h3>Wind Speed: <?php echo $windDanger; ?></h3> 
            		</li>
             
           
					<li class="icon-clima-1 rb-span-2">
						<h3><?php echo $danger; ?></h3> 
            		</li>
                    
                    <li class="icon-clima-1 rb-span-1">
						<h3><?php echo $jacket; ?></h3> 
            		</li>
                    
                    </ul></div>
				
			</div> 
             
     
     <!-- /container -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="js/jquery.fittext.js"></script>
		<script src="js/boxgrid.js"></script>
		<script>
			$(function() {

				Boxgrid.init();
				

			});
		</script>
	</body>
</html>
