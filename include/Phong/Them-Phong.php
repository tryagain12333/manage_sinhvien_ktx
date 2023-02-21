<div id="content-header">
        <div id="breadcrumb"> <a href="?page=dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="?page=Them-Sv" class="current">Thêm Phòng</a> </div>
    <h1>Thêm Phòng</h1>
      </div>
    <!--End-breadcrumbs-->
    
    <!--Action boxes-->
      <div class="container-fluid">
      <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Thêm Phòng</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="post" class="form-horizontal">
          	
            <div class="control-group">
              
            <div class="control-group">
              <label class="control-label">Tên Phòng</label>
              <div class="controls">
                <input type="text" name="phong" class="span8"required  />
              </div>
            </div>
            
           
            <div class="form-actions">
              <button type="submit" name="btnPhong" class="btn btn-success">Thêm</button>
            </div>
          </form>
        </div>
      </div>
      
            <?php
			
			if(isset($_POST['btnPhong']))
			{	$phong=$_POST['phong'];
				$sql="select TenPhong from phong where TenPhong='$phong' ";
				$query=mysqli_query($conn,$sql);
				if($num=mysqli_num_rows($query)>0)
				{
					echo"<script>alert('Tên này đã có trong dữ liệu');</script>";
					}
				else
					{
						$sql2="insert into phong(TenPhong,SoNguoi,TinhTrangPhong) 
								values ('$phong','0','0')
								";
								mysqli_query($conn,$sql2);
								echo"<script>alert('Thêm Thành Công !');</script>";
					}	
			}
			?>
      </div>
      