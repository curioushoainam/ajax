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
                url : "result.php",
                type : "post",
                dataType : "text",
                data : {},
                success : function(result){
                    $('#result').html(result);
                }
            });
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