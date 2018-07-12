<!DOCTYPE html>
<html>
<head>
	<title>Processing ajax sending in queue</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<script type="text/javascript" 
             src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script> 
    <style>
    	.red {
    		color: red;
    	}
    	.pink {
    		color: pink;
    	}
    	.blue {
    		color: blue;
    	}

    </style>		

</head>
<body>	
	<!-- Attached file is sleep.php -->
	<input type="text" id="num-thread" value="10"/>
    <input type="button" id="send-request" value="Send"/>
    <div id="results"></div>

	<script>
		$(document).ready(function(){
			function display_html(num){
			    var html = '';
			 
			    html += '<table border="1" cellpadding="5" cellspacing="0" >';
			        html += '<tr>';
			            html += '<td>Num</td>';
			            html += '<td>Status</td>';
			        html += '</tr>';
			 
			    for (var i = 0; i < num; i++){
			        html += '<tr>';
			            html += '<td>'+(i+1)+'</td>';
			            html += '<td id="waitting'+i+'" class="pink">Waitting...</td>'; // hàm send_ajax() sẽ dựa vào id này để bik cần thay đổi trang thái cho task nào
			        html += '</tr>';
			    }
			    html += '</table>'
			 
			    $('#results').html(html);
			}

			function send_ajax(num, index){
			    // Kiểm tra xem task đã hết chưa, nếu hết thì dừng
			    if (index > (num - 1)){
			        return false;
			    }
			 
			    // Chuyển trang thái từ waitting san sendding
			    $('#waitting'+index).removeClass('pink').addClass('red').html('Sending...');
			 
			    // Gửi ajax
			    $.ajax({
			        url : 'sleep.php',
			        type : 'post',
			        dataType : 'text',
			        success : function()
			        {
			            // Sau khi thành công thì chuyển trạng thái sang finished
			            $('#waitting'+index).removeClass('red').addClass('blue');
			            $('#waitting'+index).html('Finished');
			        }
			    })
			    .always(function(){
			        // Xử lý task tiếp theo
			        send_ajax(num, ++index);
			    });
			}

			$('#send-request').click(function()	{   
			    // Lấy số lượng task từ user nhập vào
			    var num = parseInt($('#num-thread').val());
			 
			    // Ẩn textbox và button
			    $(this).remove();
			    $('#num-thread').remove();
			 
			    // Hiển thị table danh sách task
			    display_html(num);
			 
			    // gửi ajax cho lần đầu tiên (task = 1)
			    send_ajax(num, 0);
			});
		});
	</script>
</body>
</html>