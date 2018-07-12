<?php 
// lấy thông tin từ form
$title = isset($_POST['title']) ? $_POST['title'] : false;
$artist_id = isset($_POST['artist_id']) ? $_POST['artist_id'] : false;

// Nếu form không có đầy đủ thông tin thì dừng chương trình
if (!$title || !$artist_id) {
	die ('{error: "bad request"}');
}

// Declare error variables
$error = array(
	'error' => 'success',
	'title' => ''		
);

// Connect database
$host = 'localhost';
$databaseName = 'music';
$user = 'root';
$password = '';
try {
	$dsn = "mysql:host=". $host ."; dbname=". $databaseName;
	$conn = new PDO($dsn, $user, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	

	// initial the query
	$stmt = $conn->prepare("SELECT * FROM album");	
	// thực thi câu truy vấn
	$stmt->execute();
	// set up fetch mode
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	// get all returned values
	$result = $stmt->fetchAll();

	// echo '<pre>';
	// echo print_r($result);
	// echo '</pre>';

	$isAvailable = [];
	foreach ($result as $item){
        $isAvailable[] = $item['title'];
    }

 //    echo '<pre>';
	// echo print_r($isAvailable);
	// echo '</pre>';

	// Check data
	if($title && $artist_id){
		if(in_array($title, $isAvailable)){
			$error['title'] = 'Album is available';
		} else {
			// save input album into the database
			$stmt = $conn->prepare("INSERT INTO album (title, artist_id) values (:title, :artist_id)");
			$stmt->bindParam(':title', $title);
			$stmt->bindParam(':artist_id', $artist_id);
			$title = $_POST['title'];
			$artist_id = $_POST['artist_id'];
			$stmt->execute();
		}	
	}
	// Disconnect
	$conn = null;
} 
catch (PDOException $e){
	$conn = null;
	die ('{"error" : ' . '"' .$e->getMessage() . '"' .'}');
}

die (json_encode($error));

?>