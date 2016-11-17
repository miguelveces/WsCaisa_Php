<?php 
require_once ('lib/nusoap.php'); 

//$wsdl= "http://". $_SERVER['SERVER_NAME']."/WSCaisa/MyService.php?wsdl";
$wsdl= "http://". $_SERVER['SERVER_NAME']."/demos/WSCaisa/MyService.php?wsdl";
//Create object that referer a web services 
$client = new nusoap_client($wsdl,true); 
//$param = array(); 
//$connect=mysqli_connect("localhost","UserCaisa","UserCaisa","planilla");
//Give it value at parameter 
    //$id_empresa = isset($_SESSION['id_empresa']) ? mysqli_real_escape_string($connect, $_SESSION['id_empresa']) :  "";
	$id_empresa = 6;
    $id_periodo = 3;	
	$param = array('id_empresa' => $id_empresa,'id_periodo' => $id_periodo); 
	$result = $client->call('AddReceiptsEmployees',$param,'','','',true);
 header('Content-type: application/json');
 $json = array("status" => 1, "info" => $result);
 echo json_encode($json);
 exit();
		
?>