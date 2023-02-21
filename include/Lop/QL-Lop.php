<div id="content-header">
        <div id="breadcrumb"> <a href="?page=dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="?page=QL-Lop" class="current">Quản Lí Lớp</a> </div>
    <h1>Quản lí Lớp</h1>
   
</div>
    <!--End-breadcrumbs-->
    
    <!--Action boxes-->
      <div class="container-fluid">
		<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Quản lí lớp</h5>
            
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Mã Lớp</th>
                  <th>Tên Phòng</th>
                  <th>Sửa </th>
                  <th>Xóa</th>
                  
                  
                </tr>
              </thead>
              <tbody>
              	<?php
                	$sql="select * from lop  ";
					$query=mysqli_query($conn,$sql);
					while($row=mysqli_fetch_assoc($query))
					{	?>
						
							<tr class='gradeU'>
								<th><?php echo $row['MaLop'] ?></th>
								<th><?php echo $row['TenLop']?></th>
								
                                <th> <a href="?page=Sua-Lop&&MaLop=<?php echo $row['MaLop'] ?>">Sửa</a></th>
                                <th> <a href="?page=Xoa-Lop&&MaLop=<?php echo $row['MaLop'] ?>" onclick='return deleteAction();'>Xóa</a></th>
                              </tr>  
						<?php
					}
				?>
               </tbody>
            </table>
          </div>
        </div> 
  
        </div>
        
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
              <label class="control-label">Tên Lớp</label>
              <div class="controls">
                <input type="text" name="Lop" class="span8"required  />
              </div>
            </div>
            
           
            <div class="form-actions">
              <button type="submit" name="btnThemLop" class="btn btn-success">Thêm</button>
            </div>
          </form>
        </div>
      </div>
<?php
	if(isset($_POST['btnThemLop']))
	{   $Tenlop=$_POST['Lop'];
		
		$sql2="select * from lop where TenLop='$Tenlop' ";	
		$query2=mysqli_query($conn,$sql2);
		if(mysqli_num_rows($query2)>0)
		{
			echo"<script>alert('Tên này đã có !');</script>";
		}
		else
			{
				$sql3="insert into lop(TenLop) values('$Tenlop')";
				if(mysqli_query($conn,$sql3))
					echo"<script>alert('Thêm lớp thành công !');window.location='index.php?page=QL-Lop';</script>";
			}
	}

?>

