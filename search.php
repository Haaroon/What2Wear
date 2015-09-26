

<?php
//$searchXML = sprintf(echo $searchXML;
//$p = xml_parser_create();
//xml_parse_into_struct($p, $searchXML, $vals, $index);
//xml_parser_free($p);
//echo "Index array\n";
//print_r($index);
//echo "\nVals array\n";
//print_r($vals);

$correctCity = $_POST['cityName'];
$data = file_get_contents('http://api.worldweatheronline.com/free/v1/search.ashx?key=96g83wx8mpewadbc5kdbr95e&query='.$_POST['cityName'].'&num_of_results=3&format=xml.xml');
file_put_contents('file.xml', $data);
$dom = new DOMDocument();
$dom->load('file.xml');
$i=0;
$found[ ] =null;
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
<form method="POST" action="index.php">
<select name='posted' onchange="Change(this)"; >
	<option value="<?php echo $found[1]['area_name'].",".$found[1]['country'] ?>" > <?php echo $found[1]['area_name']."  , ".$found[1]['country']."   "; ?></option>
  <option value="<?php echo $found[2]['area_name'].",".$found[2]['country'] ?>" >  <?php echo $found[2]['area_name']."  , ".$found[2]['country']."   " ;?></option>
  <option value="<?php echo $found[3]['area_name'].",".$found[3]['country'] ?>" > <?php echo $found[3]['area_name']."  , ".$found[3]['country']."   " ;?></option>
 </select>
 
 <input type="submit" value="Confirm"/>
 </form>
