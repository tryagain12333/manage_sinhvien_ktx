<?php
	ob_start();
	include('config.php');
	?>  
<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Matrix Admin</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/matrix-login.css" />
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <div id="loginbox">            
            <form id="loginform" class="form-vertical" action="" method="post">
				 <div class="control-group normal_text"> <h3><img src="img/logo.png" alt="Logo" /></h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" required name="user"placeholder="Username" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" required  name="pass"placeholder="Password" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>
                    <span class="pull-right"><button class="btn btn-success" name="btn_dangnhap" /> Login</span></span>
                </div>
            </form>
            <form id="recoverform" action="#" class="form-vertical" method="post">
				<p class="normal_text">Nh???p M???t Kh???u C???p 2 ????? t??m l???i M???t Kh???u 1.</p>
				
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-lock"></i></span><input type="password" required  name="passLv2"placeholder="M???t Kh???u 2" />
                        </div>
                    </div>
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password"  required id="password" name="pass1"placeholder="M???u Kh???u M???i " />
                        </div>
                    </div>
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input id="password2" required type="password"name="pass2" placeholder="Nh???p L???i M???u Kh???u " /> 
                        </div>
                    </div>
                    <div class="controls">
                        <div class="main_input_box">
                            <span id="mess" class="label label-important"></span>
                        </div>
                    </div>
               
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right"><button class="btn btn-info" name="DoiMauKhau">?????i m???t kh???u 1</button></span>
                </div>
            </form>
        </div>
         <?php
      	if(isset($_POST['DoiMauKhau']))
		{	$passLv2=$_POST['passLv2'];
			 $pass1=$_POST['pass1'];
			 $pass2=$_POST['pass2'];
			 $sql2="select * from user where Password2='$passLv2'and UserName='admin' ";
			 $num2=mysqli_num_rows(mysqli_query($conn,$sql2));
			 
				
			if($num2==1)
			{	if($pass1==$pass2&&$passLv2!=$pass1){
					$sql="Update user Set 	Password='$pass1' where UserName='admin'";
					if(mysqli_query($conn,$sql))
					{
						echo"<script>alert('?????i M???t Kh???u  Th??nh C??ng');window.location='login.php'</script>";
					}
					else
						echo"<script>alert('Loi xu li');</script>";
				}
				else
					echo"<script>alert('M???t kh???u 1 kh??ng tr??ng v???i m???t kh???u 2 v?? m???t kh???u 1 ph???i tr??ng kh???p v???i nhau');</script>";
			}
			else
				echo"<script>alert('M???t Kh???u C??p 2 Kh??ng ????ng');</script>";
		}
	  
	  ?>
        <?php
if(isset($_POST['btn_dangnhap'])){
	$user=$_POST['user'];
	$pass=$_POST['pass'];
		$sql="select * from user where UserName='$user' and 	Password='$pass'";
			$kq=mysqli_query($conn,$sql);
			$row=mysqli_fetch_array($kq);
			$hieuluc=$row["CapQuyen"];
			
			if($hieuluc==1)
			{	if(!isset($_SESSION))
					session_start();
					$_SESSION["user"]=$user;
					$_SESSION["success"]=true;
					$_SESSION['hotenadmin']=$row['Name'];	
					$_SESSION['capquyen']=$hieuluc;
					header("location:index.php");
				
			}	
			else 
			{	
				
					echo "<script>alert('Th??ng tin b???n nh???p kh??ng ch??nh x??c!');</script>";
				//header("location: login.php");
				
			}
}
?>
        <script src="js/jquery.min.js"></script>  
        <script src="js/matrix.login.js"></script>
        <script type="text/javascript" src="js/ajax-jquery.js"></script>
		<script type="text/javascript" src="include/DoiMatKhau/XuLiMK.js"></script> 
    </body>
	<?php
	ob_end_flush();
?>
</html>
