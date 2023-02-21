<div id="content-header">
        <div id="breadcrumb"> <a href="?page=dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="?page=QL-Phong" class="current">Quản Lí Phòng</a> </div>
    <h1>Quản lí Phòng</h1>
   
      </div>
    <!--End-breadcrumbs-->
    
    <!--Action boxes-->
      <div class="container-fluid">
		<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Table phòng</h5>
            <h5 style="color:#41BE80">(*)Mỗi phòng tối đa 4 sinh viên</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Mã Phòng</th>
                  <th>Tên Phòng</th>
                  <th>Số Người </th>
                  <th>Tình Trạng Phòng</th>
                  <th>Chi Tiết</th>
                  <th>Sửa</th>
                  <th>Xóa</th>
                  
                </tr>
              </thead>
              <tbody>
              	<?php
                	$sql="select * from phong";
					$query=mysqli_query($conn,$sql);
					while($row=mysqli_fetch_assoc($query))
					{	?>
						
							<tr class='gradeU'>
								<th><?php echo $row['MaPhong'] ?></th>
								<th><?php echo $row['TenPhong']?></th>
								<th><?php echo $row['SoNguoi'] ?></th>
								<th><?php
                                	if($row['TinhTrangPhong']==0)
										echo "Trống";
									else 
										echo"Đầy";
								?></th>
                                <th> <a href="?page=ChiTiet-Phong&&maphong=<?php echo $row['MaPhong'] ?>">Xem</a></th>
                                <th> <a href="?page=Sua-Phong&&maphong=<?php echo $row['MaPhong'] ?>">Sửa</a></th>
                                <th> <a href="?page=Xoa-Phong&&maphong=<?php echo $row['MaPhong'] ?>" onclick='return deleteAction();'>Xóa</a></th>
                              </tr>  
						<?php
					}
				?>
               </tbody>
            </table>
          </div>
        </div> 
        </div>
