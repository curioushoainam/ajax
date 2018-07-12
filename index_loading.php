<!DOCTYPE html>
<html>
<head>
	<title>first AJAX</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<script type="text/javascript" 
             src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script> 	

</head>
<body>	
	<div id="content"></div>
	<div id="loading" style="display: none; color: red;">Loading ...</div>
	<br>
	<button id="clickmetoload">Load Content</button>

	<script type="text/javascript">
		// validation variable
	var ajax_sending = false;
	
	$('#clickmetoload').click(function(){
		$('#clickmetoload').attr('disabled', true);
		$('#content').html('');

		if(ajax_sending == true){
			alert('Loading ajax');
			return false;
		}

		ajax_sending = true;
		$('#loading').show();

		$.ajax({
			url : 'data.php',
			type : 'post',
			dataType : 'json',
			success : function (result){
				var html = '';
				html += '<table border="1" cellspacing="0" cellpadding="1">';
				html += '<tr>';
					html += '<th>username</th>';
					html += '<th>email</th>';
				html += '</tr>';	
				$.each(result, function(key, item){
					html += '<tr>';
					html += '<td>' + item['username'] + '</th>';
					html += '<td>' + item['email'] + '</th>';					
					html += '</tr>';
				});
				html += '</table>';

				$('#content').html(html);
			}
		}).always(function(){
			ajax_sending = false;
			$('#loading').hide();
			$('#clickmetoload').attr('disabled', false);
		});
	});
	</script>
</body>
</html>