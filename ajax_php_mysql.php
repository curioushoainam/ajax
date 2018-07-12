<?php 
//header('Content-Type: text/html; charset=utf-8');
//header('Content-Type: application/json; charset=utf-8');
header('Content-Type: xml; charset=utf-8');

// Set up a connection with a database 
$host = 'localhost';
$databaseName = 'music';
$user = 'root';
$password = '';

try{	
	$dsn = "mysql:host=". $host ."; dbname=". $databaseName;
	// ket noi
	$conn = new PDO($dsn, $user, $password)  or die ('Can not connect to mysql server');
	// thong bao thanh cong
	//echo "Connected successfully with db  name " . $databaseName .'<br>';
	// thiet lap che do loi
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// ================================================================

	// Đọc dữ liệu
	// Sử đụng Prepare 
    $stmt = $conn->prepare("SELECT track_id, title FROM track");

    // Thực thi câu truy vấn
    $stmt->execute();

    // Khai báo fetch kiểu mảng kết hợp
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();	
    // Kiểm tra mảng có giá trị hay không
    if (!count($result)){
    	echo "Database is empty";
    } else {

    	// RETURN THE RESULT IN TEXT TYPE 
   //  	echo '<table border="1" cellspacing="0" cellpadding="10">';
			// echo '<tr>';
			// 	echo '<th>Track_id</th>';
			// 	echo '<th>Title</th>';
			// echo '</tr>';

   //  		foreach ($result as $item){
   //      	//echo $item['track_id'] . ' - '. $item['title'] . '<br>';
   //      	echo '<tr>';
			// 	echo '<td>'. $item['track_id'] .'</td>';
			// 	echo '<td>'. $item['title'] .'</td>';
			// echo '</tr>';
   //  		}
   //  	echo '</table>';
    	// ===============================================================
    	 
        // RETURN THE RESULT IN JSON TYPE        
    	//die (json_encode($result));   

        // =============================================================== 	
        // RETURN THE RESULT IN XML TYPE
        echo '<?xml version="1.0" encoding="UTF-8"?>';
        echo '<root>';
        foreach($result as $item){
            echo '<item>';
                echo '<track_id>'. $item['track_id'] .'</track_id>';
                echo '<title>'. $item['title'] .'</title>';
            echo '</item>';
        }
        echo '</root>';

    }

    // echo '<pre>';
    // print_r($result);
    // echo '</pre>'; 

	// Lặp kết quả
    // foreach ($result as $item){
    //     echo $item['track_id'] . ' - '. $item['title'] . '<br>';
    // }
}
catch (PDOException $e) {
	echo "Failed: " . $e->getMessage();
	
}
// Ngắt kết nối
$conn = null;

?>