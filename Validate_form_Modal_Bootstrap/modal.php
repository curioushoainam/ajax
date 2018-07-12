<!DOCTYPE html>
<html>
<head>
	<title>Bootstrap Validation</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<script type="text/javascript" 
             src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <style>
    	.row {
    		margin-bottom: 10px;
    	}
    </style>		

</head>
<body>	
<div class="container">
    <!-- Button -->
    <button class="btn" data-toggle="modal" data-target="#myModal">Popup</button>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

             <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">ĐĂNG KÝ THÀNH VIÊN</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">Username</div>
                        <div class="col-md-8">
                            <input type="text" id="username" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Password</div>
                        <div class="col-md-8">
                            <input type="text" id="password" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Email</div>
                        <div class="col-md-8">
                            <input type="text" id="email" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Fullname</div>
                        <div class="col-md-8">
                            <input type="text" id="fullname" />
                        </div>
                    </div>
                </div>
                <div class="alert alert-danger hide">
                    <!-- use for display the validating result failed -->
                </div>
                <div class="alert alert-success hide">
                    <!-- use for display the validating result success -->
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="register-btn">Đăng ký</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function(){

        $('#myModal').on('hidden.bs.modal', function () {
            $('.alert-danger').addClass('hide');
            $('.alert-success').addClass('hide');
        });
        
         // Khi người dùng click Đăng ký
        $('#register-btn').click(function(){
            // Lấy dữ liệu
            var data = {
                username    : $('#username').val(),
                password    : $('#password').val(),
                email       : $('#email').val(),
                fullname    : $('#fullname').val()
            };

            // Gửi ajax
            $.ajax({
                type : "post",
                dataType : "JSON",
                url : "register.php",
                data : data,
                success : function(result){
                    // Có lỗi, tức là key error = 1
                    if (result.hasOwnProperty('error') && result.error == '1'){
                        var html = '';
     
                        // Lặp qua các key và xử lý nối lỗi
                        $.each(result, function(key, item){
                            // Tránh key error ra vì nó là key thông báo trạng thái
                            if (key != 'error'){ 
                                html += '<li>' + item + '</li>';
                            }
                        });
                        $('.alert-danger').html(html).removeClass('hide');
                        $('.alert-success').addClass('hide');
                    }

                    else{ // Thành công
                        $('.alert-success').html('Đăng ký thành công!').removeClass('hide');
                        $('.alert-danger').addClass('hide');
     
                        // 4 giay sau sẽ tắt popup
                        setTimeout(function(){
                            $('#myModal').modal('hide');
                            // Ẩn thông báo lỗi
                            $('.alert-danger').addClass('hide');
                            $('.alert-success').addClass('hide');
                        }, 4000);
                    }
                }
            });

        });
    });
</script>	
</body>
</html>