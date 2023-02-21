<div id="content-header">
        <div id="breadcrumb"> <a href="?page=dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="?page=QL-Phong" class="current">Quản Lí Phòng</a> </div>
    <h1>Quản lí Phòng <?php  
		$maphong=$_GET['maphong'];
		$r=mysqli_fetch_assoc(mysqli_query($conn,"select * from phong where MaPhong='$maphong'"));
		echo "<b>".$r['TenPhong'];
		?>
        </b>
    </h1>
   
      </div>
    <!--End-breadcrumbs-->
    
    <!--Action boxes-->
      <div class="container-fluid">
<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Table phòng</h5>
            
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Mã Sv</th>
                  <th>Họ Tên</th>
                  <th>Lớp</th>
                  <th>Ngày sinh</th>
                  <th>Quê Quán</th>
                  <th>Giới Tính</th>
                  <th>Phone</th>
                </tr>
              </thead>
              <tbody>
             
             	 
			  <?php
			  		
                  	$sql="select * from sinhvien,lop,phong,tinhthanh where sinhvien.MaLop=lop.MaLop AND sinhvien.MaPhong=phong.MaPhong AND phong.MaPhong='$maphong' and sinhvien.NoiSinhID=tinhthanh.IDTinhThanh";
					$query=mysqli_query($conn,$sql);
					while($row=mysqli_fetch_assoc($query)){
						echo "
							 <tr class='gradeU'>
								<th>".$row['MaSV']."</th>
								<th>".$row['HoTen']."</th>
								<th>".$row['TenLop']."</th>
								<th>".$row['NgaySinh']."</th>
								<th>".$row['TenTinhThanh']."</th>
								<th>".$row['GioiTinh']."</th>
								<th>".$row['Sdt']."</th>
								
							</tr>
						";
							
					}
				  ?>
                  
              </tbody>
            </table>
          </div>
          
        </div> 
        </div>
