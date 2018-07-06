<?php 
//echo 'This is a returned contents via Jquery';

// Nhập giá trị number bằng phương thức POST
//$number = isset($_POST['number_']) ? (int)$_POST['number_'] : false;

// Nhập giá trị number bằng phương thức GET
$number = isset($_GET['number_']) ? (int)$_GET['number_'] : false;

// Kiểm tra number có khác 0 hay không
if($number <= 0){
	die('<h1>Hãy nhập một số lớn hơn 0</h1>');
}
// Lặp từ 1 tới number để in ra màn hình
//echo 'Method : POST' . '<br>';
echo 'Method : GET' . '<br>';
for ($i = 1; $i <= $number; $i++){
	echo '<li>Số: '. $i .'</li>';
}

?>