
<div id="content-header">
        <div id="breadcrumb"> <a href="?page=dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Sửa Phòng</a> </div>
    <h1>Sửa Phòng</h1>
      </div>
    <!--End-breadcrumbs-->
    <?php 
		
		
		
		$MaLop=$_GET['MaLop'];
		$sql="select * from Lop  where MaLop='$MaLop'
		";
		$query=mysqli_query($conn,$sql);
		$r=mysqli_fetch_assoc($query);
		
		$MaLop=$r['MaLop'];
		
	 ?>
    <!--Action boxes-->
      <div class="container-fluid">
      <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Sửa Phòng</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" method="post" class="form-horizontal">
          	<div class="control-group">
              <label class="control-label">Mã Lớp :</label>
              <div class="controls">
                <input class="span1 text-center" value="<?php echo $MaLop?>" disabled name="MaLop">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Phòng</label>
              <div class="controls">
                <input class="span2 text-center phong" value="<?php echo $r['TenLop']?>" required name="Lop" >  
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" name="btnSuaLop" class="btn btn-success">Sửa</button>
              
            </div>
          </form>
        </div>
      </div>
      </div>
      <?php
      	if(isset($_POST['btnSuaLop']))
		{	$TenLop=$_POST['Lop'];
			
			$sql2="select * from lop where TenLop='$TenLop' ";
			$query2=mysqli_query($conn,$sql2);
			$num2=mysqli_num_rows($query2);
			
			if($num2>0)
			{
				echo"<script>alert('Tên Lớp bị trùng !');</script>";	
			}
			else
				{mysqli_query($conn,"update lop SET TenLop='$TenLop' where MaLop='$MaLop'");
				echo"<script>alert('Cập nhật Thành Công !!');window.location='index.php?page=QL-Lop'</script>";
				}
		}
	  
	  
	  ?>
           
            
            