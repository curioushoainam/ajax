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
	<input type="button" name="clickme" id="text-click" onclick="load_text()" value="Text-Click">
	<input type="button" name="clickme" id="json-click" onclick="load_json()" value="Json-Click">
	<input type="button" name="clickme" id="xml-click" onclick="load_xml()" value="XML-Click">
	<br><br>
	<div id="text-result">TEXT</div>
    <div id="json-result">JSON</div>
    <div id="xml-result">XML</div>

<script type="text/javascript" charset="utf-8">
	function load_text(){
        $.ajax({
            url : "ajax_php_mysql.php",		// send request to file result.php on server
            //type : "post",			// post method
            type : "get",			// GET method
            dataType : "text",		// data type of server respose
            data : {				// list of arguments will be sent to server
            	number_ : $('#number').val()
            },
            success : function(result){			// call-back function uses for process server response which will store inside variable result
                $('#text-result').html(result);
            }
        });
   }
</script>

</body>
</html>