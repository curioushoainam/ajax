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
	<form action="" method="post">
		<table border="0" cellpadding="10" cellspacing="0">
			<tr>
				<td>Album title</td>
				<td><input type="text" id="title" name="title"></td>
			</tr>
			<tr>
				<td>Artist_id</td>
				<td><input type="text" id="artist_id" name="artist_id"></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="submit" value="Register">
					<input type="reset" name="submit" value="Clear">
				</td>
			</tr>
		</table>
	</form>
	<div id="err_display"></div>

	<script type="text/javascript">
		$('form').submit(function(){
			$('#err_display').html('');

			var title = $.trim($('#title').val());
			var artist_id = $.trim($('#artist_id').val());

			// check null value
			if(title == ''){
				alert('Album title đang bị trống');
				return false;
			}
			if(artist_id == ''){
				alert('Artist_id đang bị trống');
				return false;
			}

			$.ajax({
				url: 'validate_form.php',
				type: 'post',
				dataType: 'json',
				data: {
					title : title,
					artist_id : artist_id
				},
				success: function(result){
					if (!result.hasOwnProperty('error') || result['error'] != 'success'){
						alert('Kết quả trả về có chứa mã độc');
						return false;
					}

					// xử lý thông tin lỗi từ kết quả trả về
					var html = '';
					if($.trim(result.title) != ''){
						html += result.title + '<br>';
					}

					if(html != ''){
						$('#err_display').append(html);
					} else {
						$('#err_display').append('Thêm thông tin thành công');
					}

				},
				error: function(jqXHR, textStatus, errorThrown){
					console.log( 'Ajax gets error => ' + textStatus + ' : ' + errorThrown );
				}
			});


			return false;
		});
	</script>
	
</body>
</html>