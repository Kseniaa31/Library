<?php
require_once __DIR__ . '/config.php';

class API{
	function Select(){
		$db = new Connect;
		$books = array();
		$data = $db->prepare('SELECT * FROM book ORDER BY book_id');
		$data->execute();

		while($OutputData = $data->fetch(PDO::FETCH_ASSOC)){
			$books[$OutputData['book_id']] = array(
				'book_id'=> $OutputData['book_id'],
				'book_category'=> $OutputData['book_category'],
				'book_author'=> $OutputData['book_author'],
				'book_name'=> $OutputData['book_name'],	
				'book_no_of_copy'=> $OutputData['book_no_of_copy'],
                'book_status'=> $OutputData['book_status']
			);			
		}
		return json_encode($books,JSON_PRETTY_PRINT);
	}
}

$API = new API;
header('Content-type: application/json');
echo $API ->Select();
?>