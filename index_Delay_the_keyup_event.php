<!DOCTYPE html>
<html>
<head>
	<title>Delay the keyup event for jquery ajax</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<script type="text/javascript" 
             src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script> 	

</head>
<body>	
	<a href="#" title="Học lập trình online">Về trang chủ</a> <br/> <hr/>
    <input type="text" id="title" value=""/>
    <hr/>
    <div id="result"></div>

    <script>
    	$(document).ready(function(){
    		// Khai báo đối tượng timeout để dùng cho hàm clearTimeout
		    var timeout = null;

	    	$('#title').keyup(function()
	        {
	            // Xóa đi những gì ta đã thiết lập ở sự kiện 
		        // keyup của ký tự trước (nếu có)
		        clearTimeout(timeout);

		        // Sau khi xóa thì thiết lập lại timeout
		        // Chỉ khi nào ta dừng ko gõ thì i giây sau ajax sẽ được thực hiện
        		timeout = setTimeout(function (){
        			var data = {
						        title : $('#title').val()
						    };

					$.ajax({
						url : 'Delay_the_keyup_event.php',
				        type : 'get',
				        dataType : 'text',
				        data : data,		        
				        success : function (result){
				            $('#result').html(result);
				        }
				    });
        		}, 500);
	            
	        });
	    });
    </script>


</body>
</html>