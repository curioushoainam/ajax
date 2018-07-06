<!DOCTYPE html>
<html>
<head>
	<title>first AJAX</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<script type="text/javascript" 
             src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script> 
	<script type="text/javascript" charset="utf-8">
		function load_ajax(){
            $.ajax({
                url : "result.php",		// send request to file result.php on server
                //type : "post",			// post method
                type : "get",			// GET method
                dataType : "text",		// data type of server respose
                data : {				// list of arguments will be sent to server
                	number_ : $('#number').val()
                },
                success : function(result){			// call-back function uses for process server response which will store inside variable result
                    $('#result').html(result);
                }
            });
	   }
	</script>

</head>
<body>
	<input type="text" id="number" value="">
	<input type="button" name="clickme" id="clickme" onclick="load_ajax()" value="Click me">
	<br><br>
	<div id="result">
		 <!-- Ajax content is here -->
	</div>
	
</body>
</html>