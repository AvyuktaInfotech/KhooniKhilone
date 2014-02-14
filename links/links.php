<?php
include 'urlConfig.php';
foreach ($_GET as $key=>$value) {
  $link.= "$key=" . urldecode($value) . "&";
  }
$link = substr($link,5);
  $link = substr($link, 0, -1);
if($link)
{
if(strpos($link,"http")===false)
$link = "http://".$link;
$temp = parse_url($link);
$tempStore = $temp["host"];
$store=str_replace("www.","",$tempStore);
$store=str_replace("WWW.","",$store);

$sql = "Select * from affiliate WHERE STORE = '".$store."' AND ACTIVE = 1 ORDER BY PAYOUT DESC";
$result = mysql_query($sql,$con);
if (!$result) {
    die('Invalid query: ' . mysql_error());
}
if($row = mysql_fetch_array($result))
{
	if($row["POSTFIX"]!==''){
		if(strpos($link,"?")>0 && $row["POSTFIX"]!='')
		{
			$specialChar = "&";
		}	
		else
		{
			$specialChar = "?";
		}
	}		
	$affiliate = $row["AFF_URL"];
	$postfix = $row["POSTFIX"];
	$append = $row["APPEND"];
	$link = $link.$specialChar.$postfix;
	if(strcasecmp($store,"jabong.com")==0)
	{
		$link = "http://ad-apac.doubleclick.net/clk;255835459;79473929;j?".$link;
		$link = get_tiny_url($link);
	}
	else
	{
		for($i=0;$i<$row["ENCODE"];$i++)
			$link = urlencode($link);
	}
	$link = $affiliate.$append.$link;
	$sql = "UPDATE affiliate SET COUNT = COUNT +1 WHERE ID = ".$row['ID'];
	mysql_query($sql,$con);
	if (!$result) {
    die('Invalid query: ' . mysql_error());
}
}
else 
{
	$cuelink = "http://linksredirect.com?pub_id=303CL293&url=";
	$link = $cuelink.$link;
	
}
if (isset($link)) {
	echo $link;
    	//header('Location: '.$link);
}}
else{
	header('Location: http://www.dealspitara.com');
	}
function between($s,$l,$r) {
  $il = strpos($s,$l,0)+strlen($l);
  $ir = strpos($s,$r,$il);
  return substr($s,$il,($ir-$il));
 }
 function get_tiny_url($url)  {  
  $ch = curl_init();  
  $timeout = 5;  
  curl_setopt($ch,CURLOPT_URL,'http://tinyurl.com/api-create.php?url='.$url);  
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);  
  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);  
  $data = curl_exec($ch);  
  curl_close($ch);  
  return $data;  
}
?>