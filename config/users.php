<?php
require_once __DIR__ . '/config.php';

class API{
	function Select(){
		$db = new Connect;
		$user = array();
		$data = $db->prepare('SELECT * FROM user ORDER BY user_id');
		$data->execute();

		while($OutputData = $data->fetch(PDO::FETCH_ASSOC)){
			$user[$OutputData['user_id']] = array(
				'user_id'=> $OutputData['user_id'],
				'user_name'=> $OutputData['user_name'],
				'user_email_address'=> $OutputData['user_email_address'],
				'user_status'=> $OutputData['user_status']

			);		
		}
		return json_encode($user,JSON_PRETTY_PRINT);
	}
}
$API = new API;
header('Content-type: application/json');
echo $API ->Select();
?>