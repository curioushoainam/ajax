<!DOCTYPE html>
<html>
<head>
	<title>first AJAX</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<script type="text/javascript" charset="utf-8">
		function load_ajax(){
			// Tạo một biến lưu trữ đối tượng XML HTTP. Đối tượng này
	        // tùy thuộc vào trình duyệt browser ta sử dụng nên phải kiểm
	        // tra như bước bên dưới
	        var xmlhttp;

	        // Nếu trình duyệt là  IE7+, Firefox, Chrome, Opera, Safari
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } 
            // Nếu trình duyệt là IE6, IE5
            else {
            	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            // Khởi tạo một hàm mà nó sẽ được thực thi khi có phản hồi từ server
            xmlhttp.onreadystatechange = function(){
            	// Nếu đối tượng XML HTTP trả về với hai thông số bên dưới thì mọi chuyện 
                // coi như thành công
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
                	// Sau khi thành công tiến hành thay đổi nội dung của thẻ div, nội dung
                    // ở đây chính là 
                    document.getElementById('result').innerHTML = xmlhttp.responseText;
                }
            }

            // Khai báo với phương thức GET, và url chính là file result.php
            xmlhttp.open("GET", "result.php", true);

            // Cuối cùng là Gửi ajax, sau khi gọi hàm send thì function vừa tạo ở
            // trên (onreadystatechange) sẽ được chạy
            xmlhttp.send();
	}
	</script>

</head>
<body>
	<input type="button" name="clickme" id="clickme" onclick="load_ajax()" value="Click me">
	<br><br>
	<div id="result">
		 <!-- Ajax content is here -->
	</div>
	
</body>
</html>