<div id="content-header">
        <div id="breadcrumb"> <a href="?page=dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Sửa Sinh Viên</a> </div>
    <h1>Sửa sinh viên</h1>
      </div>
    <!--End-breadcrumbs-->
    <?php 
		function GetLop($malop)
		{	include "config.php";
			$sql2 = "select MaLop,TenLop from lop order by MaLop ASC";
			$kq2 = mysqli_query($conn,$sql2);
			$s2="";
			
				while($r2=mysqli_fetch_assoc($kq2))
				{
					if($r2["MaLop"]==$malop)
						$s2.="<option value='".$r2["MaLop"]."' selected>";			
					else
						$s2.="<option value='".$r2["MaLop"]."'>";
					$s2.=$r2["TenLop"]."</option>";
				}
			
			return $s2;
		}
		
		function GetPhong($maphong)
		{	include "config.php";
			$sql2 = "select MaPhong,TenPhong from phong order by MaPhong ASC";
			$kq2 = mysqli_query($conn,$sql2);
			$s2="";
			
				while($r2=mysqli_fetch_assoc($kq2))
				{
					if($r2["MaPhong"]==$maphong)
						$s2.="<option value='".$r2["MaPhong"]."' selected>";			
					else
						$s2.="<option value='".$r2["MaPhong"]."'>";
					$s2.=$r2["TenPhong"]."</option>";
				}
			
			return $s2;
		}
		function GetTinh($maTinh)
		{	include "config.php";
			$sql2 = "select * from tinhthanh order by IDTinhThanh ASC";
			$kq2 = mysqli_query($conn,$sql2);
			$s2="";
			
				while($r2=mysqli_fetch_assoc($kq2))
				{
					if($r2["IDTinhThanh"]==$maTinh)
						$s2.="<option value='".$r2["IDTinhThanh"]."' selected>";			
					else
						$s2.="<option value='".$r2["IDTinhThanh"]."'>";
					$s2.=$r2["TenTinhThanh"]."</option>";
				}
			
			return $s2;
		}
		
		
		$masv=$_GET['masv'];
		$maphong=$_GET['maphong'];
		$sql="select * from sinhvien,lop,phong 
		where sinhvien.MaLop=lop.MaLop AND sinhvien.MaPhong=phong.MaPhong AND MaSV='$masv'";
		$query=mysqli_query($conn,$sql);
		$r=mysqli_fetch_assoc($query);
		$malop=$r['MaLop'];
		$maphong=$r['MaPhong'];
		$matinh=$r['NoiSinhID'];
	 ?>
    <!--Action boxes-->
      <div class="container-fluid">
      <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Sửa Sinh Viên</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="post" class="form-horizontal">
          	<div class="control-group">
              <label class="control-label">Mã Sinh Viên:</label>
              <div class="controls">
                <label class="span8"><?php echo $r['MaSV'] ?></label>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Họ tên:</label>
              <div class="controls">
                <input type="text" name="hoten" class="span8" placeholder="Họ Tên"  value="<?php echo $r['HoTen']?>"/>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">Lớp</label>
              <div class="controls">
                <select name="lop">
                 <?php 
							
                   			 echo GetLop($malop);
							  ?>
                </select>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">Phòng</label>
              <div class="controls">
                <select  name="phong">
                  <?php echo GetPhong($maphong);?>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" >Nơi Sinh</label>
              <div class="controls">
                <select  name="Tinh">
                  <?php echo GetTinh($matinh);?>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Ngày Sinh</label>
              <div class="controls">
                <input type="date" name="ngaysinh" class="span8" value="<?php echo $r['NgaySinh']?>"  />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Giới Tính</label>
              <div class="controls">
                <label>
                  <input type="radio"  name="gt" value="Nam" <?php if($r['GioiTinh']=="Nam") echo "checked='checked'"?> />
                  Nam</label>
                <label>
                  <input type="radio"  name="gt" value="Nữ" <?php if($r['GioiTinh']=="Nữ") echo "checked='checked'"?>/>
                  Nữ</label>
                
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Số điện thoại</label>
              <div class="controls">
                <input type="text" name="phone" class="span8" value="<?php echo $r['Sdt'] ?>"/>
                
            </div>
           
            <div class="form-actions">
              <button type="submit" name="btnSuaSV" class="btn btn-success">Sửa</button>
              <input type="hidden" name="act">
 						 <input type="hidden" name="masv" value="<?php echo "$masv"; ?>"  />
            </div>
          </form>
        </div>
      </div>
      </div>
      
            <?php
            if(isset($_POST["act"]))
			{	
				$hoten=$_POST['hoten'];        $diachi=$_POST['Tinh'];
				$lop=$_POST['lop'];			$ngaysinh=$_POST['ngaysinh'];
				$phong=$_POST['phong'];       $gioitinh=$_POST['gt'];
				$phone=$_POST['phone'];
				
				
				 $tv="select * from phong where MaPhong='$phong'";
				 $tv2=mysqli_query($conn,$tv);
				 $tv3=mysqli_fetch_assoc($tv2);
				 if($maphong==$phong)
				 {	
						 $sql="update sinhvien SET  					 HoTen='$hoten',MaLop='$lop',MaPhong='$phong',NoiSinhID='$diachi',GioiTinh='$gioitinh',NgaySinh='$ngaysinh',Sdt='$phone'  
				where MaSV='$masv'";
						 $kq=mysqli_query($conn,$sql);	
					 	echo"<script>alert('Cap nhat thanh cong !');window.location='index.php?page=QL-Sv'</script>";
			}
				 
				 else 
				 {
					 $tv="select * from phong where MaPhong='$phong'";
					 $tv2=mysqli_query($conn,$tv);
					 $tv3=mysqli_fetch_assoc($tv2);
					 
					 $t="select * from phong where MaPhong='$maphong'";
					 $t2=mysqli_query($conn,$t);
					 $t3=mysqli_fetch_assoc($t2);
					 
					  if($tv3['SoNguoi']<4)
					 {	 
									
									//tang so luong nguoi     
									$soluongnguoi=$tv3['SoNguoi']+1;
									$sql2="update phong SET SoNguoi='$soluongnguoi' where MaPhong='$phong'";
									$query2=mysqli_query($conn,$sql2);
									
									
									if($tv3['SoNguoi']==3)
									{
										$sql3="update phong SET TinhTrangPhong='1' where MaPhong='$phong'"; 
										$query3=mysqli_query($conn,$sql3);
									}
									 // ---------------------------------------------------------
									 
									//giam so luong nguoi
 									$SoNguoiGiam=$t3['SoNguoi']-1;
									$sql4="update phong SET SoNguoi='$SoNguoiGiam' where MaPhong='$maphong'";
									$query4=mysqli_query($conn,$sql4);
									
									if($t3['SoNguoi']==4)
									{
										$sql5="update phong SET TinhTrangPhong='0' where MaPhong='$maphong'";
										mysqli_query($conn,$sql5);
									}
									
									// ---------------------------------------------------------
									 $sql="update sinhvien SET  					 			 		HoTen='$hoten',MaLop='$lop',MaPhong='$phong',NoiSinhID='$diachi',GioiTinh='$gioitinh',NgaySinh='$ngaysinh',Sdt='$phone'  
							where MaSV='$masv'";
									 $kq=mysqli_query($conn,$sql);	
									echo"<script>alert('Cập nhật Thành Công !!');window.location='index.php?page=QL-Sv'</script>";
								 
					 }			
					 else {
						 echo"<script>alert('Phòng Này đã đầy !');</script>";
						 }
				 }
				
			
			}
			?>
            
            