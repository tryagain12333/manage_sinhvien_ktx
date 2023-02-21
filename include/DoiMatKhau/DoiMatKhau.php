<script type="text/javascript" src="js/ajax-jquery.js"></script>
<script type="text/javascript" src="include/DoiMatKhau/XuLiMK.js"></script>

<div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Form elements</a> <a href="#" class="current">Đổi mật khẩu cấp 1</a> </div>
    <h1>Đổi mật khẩu cấp 1</h1>
  </div>
    <div class="container-fluid"><hr>
        <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
                <h5>Đổi mật khẩu 1</h5>
              </div>
              <div class="widget-content nopadding">
                <form id="form-wizard" class="form-horizontal" method="post">
                  <div id="form-wizard-1" class="step">
                    <div class="control-group">
                      <label class="control-label">Current password</label>
                      <div class="controls">
                        <input type="password" name="passHienTai" required/>
                        
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">New Password</label>
                      <div class="controls">
                        <input id="password" type="password" name="password" required/>
                        
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Confirm Password</label>
                      <div class="controls">
                        <input id="password2" type="password" name="password2"  required/><span id="mess" ></span>
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-actions">
                    <input name="DoiMauKhau" class="btn btn-primary" type="submit" value="Đổi Mật Khẩu" />
                    
                    <div id="status"></div>
                  </div>
                  <div id="submitted"></div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
      	if(isset($_POST['DoiMauKhau']))
		{	$passHienTai=$_POST['passHienTai'];
			 $pass1=$_POST['password'];
			 $pass2=$_POST['password2'];
			 $sql2="select * from user where Password='$passHienTai'and UserName='admin' ";
			 $num2=mysqli_num_rows(mysqli_query($conn,$sql2));
				
			if($pass1==$pass2&&$num2==1)
			{	
				$sql="Update user Set 	Password='$pass1' where UserName='admin'";
				if(mysqli_query($conn,$sql))
				{
					echo"<script>alert('Đổi Mật Khẩu  Thành Công');window.location='index.php'</script>";
				}
				else
					echo"<script>alert('Loi xu li');</script>";
			}
			else
				echo"<script>alert('Thất Bại!Kiểm tra lại mật khẩu đã nhập');</script>";
		}
	  
	  ?>