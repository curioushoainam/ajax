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
	<input type="button" name="clickme" id="text-click" value="Text-Click">
	<input type="button" name="clickme" id="json-click" value="Json-Click">
	<input type="button" name="clickme" id="xml-click" value="XML-Click">
	<br><br>
	<div id="text-result">TEXT</div>
	<div id="json-result">JSON</div>
	<div id="xml-result">XML</div>

<script type="text/javascript" charset="utf-8">
	$('#json-click').click(function(){	
				
		$.ajax({
            url : 'ajax_php_mysql.php',		// send request to file result.php on server
            //type : "post",			// post method
            type : 'get',			// GET method
            
            dataType : 'json',		// data type of server respose
            //dataType : "text",		// data type of server respose
            contentType: "application/json; charset=utf-8",          
            data : {				// list of arguments will be sent to server            	
            },            
            success : function(result){			// call-back function uses for process server response which will store inside variable result
            	//console.log('In success');
                var html = '';
                html += '<table border="1" cellspacing="0" cellpadding="10">';
				html += '<tr>';
					html += '<th>Track_id</th>';
					html += '<th>Title</th>';
				html += '</tr>';

	    		$.each (result, function(key, item){	        	
	        	html += '<tr>';
					html += '<td>' + item['track_id'] + '</td>';
					html += '<td>' + item['title'] + '</td>';
				html += '</tr>';
	    		});
	     		html += '</table>';	   			
	   			
	     		$('#json_result').html(html);
            },
            error : function( jqXHR, textStatus, errorThrown ) {
        		console.log( 'Ajax gets error => ' + textStatus + ' : ' + errorThrown );
        	}

        	// parsererror : SyntaxError: Unexpected token C in JSON at position
        	// lỗi này xuất hiện là do php trả về json dưới dạng text hoặc html

        });
	});
	
</script>

</body>
</html>