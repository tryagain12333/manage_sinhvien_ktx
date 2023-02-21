<div id="content-header">
        <div id="breadcrumb"> <a href="?page=dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Thêm Sinh Viên</a> </div>
    <h1>Thêm sinh viên</h1>
      </div>
    <!--End-breadcrumbs-->
    
    <!--Action boxes-->
      <div class="container-fluid">
      <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Thêm Sinh Viên</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="post" class="form-horizontal">
          	<div class="control-group">
              <label class="control-label">Mã Sinh Viên:</label>
              <div class="controls">
                <input type="text" name="MaSV" class="span8" placeholder="Mã Sinh Viên" required />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Họ tên:</label>
              <div class="controls">
                <input type="text" name="hoten" class="span8" placeholder="Họ Tên" required/>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">Lớp</label>
              <div class="controls">
                <select name="lop">
                  <?php 
                    
								$sql1="select MaLop,TenLop from lop";
								$kq1=mysqli_query($conn,$sql1);
								while ($r1=mysqli_fetch_assoc($kq1))
								echo "<option value=".$r1['MaLop'].">  ".$r1['TenLop']."  </option>";
				 ?>
                </select>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">Phòng</label>
              <div class="controls">
                <select  name="phong">
                   <?php 
                    
								$sql2="select * from phong";
								$kq2=mysqli_query($conn,$sql2);
								while ($r2=mysqli_fetch_assoc($kq2))
								echo "<option value=".$r2['MaPhong'].">  ".$r2['TenPhong']."  </option>";
							  ?>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" >Quê quán</label>
              <div class="controls">
                <select  name="tinhthanh">
                   <?php 
                    
								$sql3="select * from tinhthanh";
								$kq3=mysqli_query($conn,$sql3);
								while ($r3=mysqli_fetch_assoc($kq3))
								echo "<option value=".$r3['IDTinhThanh'].">  ".$r3['TenTinhThanh']."  </option>";
							  ?>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Ngày Sinh</label>
              <div class="controls">
                <input type="date" name="ngaysinh" class="span8"  required />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Giới Tính</label>
              <div class="controls">
                <label>
                  <input type="radio"  name="gt" value="Nam" checked="checked" />
                  Nam</label>
                <label>
                  <input type="radio"  name="gt" value="Nữ"  />
                  Nữ</label>
                
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Số điện thoại</label>
              <div class="controls">
                <input type="text" name="phone" class="span8" />
                
            </div>
           
            <div class="form-actions">
              <button type="submit" name="btnThemSv" class="btn btn-success">Thêm</button>
            </div>
          </form>
        </div>
      </div>
      
            <?php
			
			if(isset($_POST['btnThemSv']))
			{	$masv=$_POST['MaSV']; 
				$hoten=$_POST['hoten'];        $diachi=$_POST['tinhthanh'];
				$lop=$_POST['lop'];			$ngaysinh=$_POST['ngaysinh'];
				$phong=$_POST['phong'];       $gioitinh=$_POST['gt'];
				$phone=$_POST['phone'];
				
				 $tv="select * from phong where MaPhong='$phong'";
				 $tv2=mysqli_query($conn,$tv);
				 $tv3=mysqli_fetch_assoc($tv2);
				 if($tv3['SoNguoi']<4)
				 {
						
						$sql="insert into sinhvien(MaSV,HoTen,MaLop,MaPhong,NoiSinhID,GioiTinh,NgaySinh,Sdt)
						values ('$masv','$hoten','$lop','$phong','$diachi','$gioitinh','$ngaysinh','$phone')";
						$query=mysqli_query($conn,$sql);
						
						if($query){
								
								$soluongnguoi=$tv3['SoNguoi']+1;
								$sql2="update phong SET SoNguoi='$soluongnguoi' where MaPhong='$phong'";
								$query2=mysqli_query($conn,$sql2);
								
								if($tv3['SoNguoi']==3)
								{
									$sql3="update phong SET TinhTrangPhong='1' where MaPhong='$phong'";
									$query3=mysqli_query($conn,$sql3);
								}
								
								echo"<script>alert('Thêm Thành Công !');window.location='index.php?page=Them-Sv'</script>";
							}
						else 
							echo "xu li that bai";	
				
				 }
				 else {
					 echo"<script>alert('Phòng Này đã đầy !');window.location='index.php?page=Them-Sv'</script>";
					 
					 }
			}
			?>
      </div>
      