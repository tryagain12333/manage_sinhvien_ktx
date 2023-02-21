<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />

<div id="content-header">
        <div id="breadcrumb"> <a href="?page=dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Quản Lí Sinh Viên</a> </div>
    <h1>Quản lí sinh viên</h1>
      </div>
    <!--End-breadcrumbs-->
    
    <!--Action boxes-->
      <div class="container-fluid">
		<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Table sinh viên</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Mã Sv</th>
                  <th>Họ Tên</th>
                  <th>Phòng</th>
                  <th>Lớp</th>
                  <th>Ngày sinh</th>
                  <th>Quê Quán</th>
                  <th>Giới Tính</th>
                  <th>Phone</th>
                  <th >Sửa</th>
                  <th >Xóa</th>
                  
                </tr>
              </thead>
              <tbody>
                
             
                  <?php
                  	$sql="select * from sinhvien,lop,phong,tinhthanh where sinhvien.MaLop=lop.MaLop AND sinhvien.MaPhong=phong.MaPhong and sinhvien.NoiSinhID=tinhthanh.IDTinhThanh";
					$query=mysqli_query($conn,$sql);
					while($row=mysqli_fetch_assoc($query)){
						echo "
							 <tr class='gradeU'>
								<th>".$row['MaSV']."</th>
								<th>".$row['HoTen']."</th>
								<th>".$row['TenPhong']."</th>
								<th>".$row['TenLop']."</th>
								<th>".$row['NgaySinh']."</th>
								<th>".$row['TenTinhThanh']."</th>
								<th>".$row['GioiTinh']."</th>
								<th>".$row['Sdt']."</th>
								<th><a href='?page=Sua-Sv&&masv=".$row['MaSV']."&&maphong=".$row['MaPhong']."'>Sửa</a></th>
								<th><a href='?page=Xoa-Sv&&masv=".$row['MaSV']."&&maphong=".$row['MaPhong']."' onclick='return deleteAction();'>Xóa</a></th>
							</tr>
						";
							
					}
				  ?>
                
               
                
                
              </tbody>
            </table>
          </div>
        </div> 
        </div>
