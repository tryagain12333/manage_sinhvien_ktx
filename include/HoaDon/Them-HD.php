<div id="content-header">
        <div id="breadcrumb"> <a href="?page=dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="?page=Them-Sv" class="current">Thêm Hóa Đơn</a> </div>
    <h1>Thêm Hóa Đơn</h1>
      </div>
    <!--End-breadcrumbs-->
    
    <!--Action boxes-->
      <div class="container-fluid">
      <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Thêm Hóa Đơn</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="post" class="form-horizontal">
          	
             <div class="control-group">
              <label class="control-label">Phòng</label>
              <div class="controls">
              	<select  name="phong" class="span5">
                       <?php 
                        			$phong=filter_input(INPUT_POST,'phong');
                                    $sql2="select * from phong";
                                    $kq=mysqli_query($conn,$sql2);
                                    while ($r2=mysqli_fetch_assoc($kq)){
									?>
                                    <option value="<?php echo $r2['MaPhong']?>"  <?php if($r2['MaPhong']==$phong) echo "selected"?>>  <?php echo $r2['TenPhong'] ?> </option>
									
                        				<?php }?>
                    </select>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Tháng Điện Nước</label>
              <div class="controls">
              <?php $thang=filter_input(INPUT_POST,'ThangGhiSo');?>
                <input type="month"  name="ThangGhiSo" class="span5"  value="<?php echo $thang?>" required />
                <button name="btnHien" class="btn btn-info"><i class="fa fa-eye"></i></button>
                
              </div>
            </div>
           <?php
           		if(isset($_POST['btnHien']))
				{ 
					$phong=$_POST['phong'];
					$thang=$_POST['ThangGhiSo'];
					
					if($thang=="")
					{	echo"<script>alert('Tháng Điện Nước Không Được Bỏ Trống !');</script>";
						}
					else{
						$sql="select * from dien 
						where MaPhong='$phong' and ThangGhiSo='$thang' ";
						$query=mysqli_query($conn,$sql);
						$row=mysqli_fetch_assoc($query);
						
						$TongTienDien=$row['TienDien'];
						$TongTienDien2=number_format($TongTienDien,0,',','.')." đ";
						
						$sql3="select * from nuoc
						where MaPhong='$phong' and ThangGhiSo='$thang' ";
						$query3=mysqli_query($conn,$sql3);
						$row3=mysqli_fetch_assoc($query3);

						$TongTienNuoc=$row3['TienNuoc'];
						$TongTienNuoc2=number_format($TongTienNuoc,0,',','.');
						
						if($num=mysqli_num_rows($query)>0||$num3=mysqli_num_rows($query3)>0)
						{
							echo "<div class='control-group'>
							 
							  <div class='input-prepend   offset2'> <span class='add-on icon-bolt'></span>
							  <input type='text'   class='span4'  value=" .$TongTienDien2." />
							  </div>
							  <div class='input-prepend  offset0'> <span class='add-on icon-tint'></span>
							  <input type='text'   class='span4'  value=" .$TongTienNuoc2." /></div>
							  </div>";
						}
						else
							{
								echo"<script>alert('Kiểm tra lại DNTT hoặc m3 nước tiêu thụ !');</script>";
								}
						}	
				}	
		   ?>
           
            <div class="form-actions">
              <button type="submit" name="btnThemHD" class="btn btn-success">Thêm Hóa Đơn</button>
            </div>
          </form>
        </div>
      </div>
      
            <?php
			
			
			
			if(isset($_POST['btnThemHD']))
			{	$phong=$_POST['phong'];
				 $thang=$_POST['ThangGhiSo'];
				 
									
									
				 if($thang=="")
					{	echo"<script>alert('Tháng Điện Nước Không Được Bỏ Trống !');</script>";
						}
				 else{
					 
					 	$tv="select * from hoadon where MaPhong='$phong' and ThangGhiSo='$thang' ";
						
						if($num=mysqli_num_rows(mysqli_query($conn,$tv))>0)
						{
							echo"<script>alert('Hóa Đơn Này Đã Có !');</script>";
							}
						else
						{
							$sql="select * from dien where MaPhong='$phong' and ThangGhiSo='$thang' ";
							$query=mysqli_query($conn,$sql);
							if(mysqli_num_rows($query)==0)
							{
								echo"<script>alert('Kiểm tra lại DNTT hoặc m3 nước tiêu thụ !');</script>";
							}
							else
							{
									$row=mysqli_fetch_assoc($query);
									
									$TienDien=$row['TienDien'];
									
									$sql3="select * from nuoc where MaPhong='$phong' and ThangGhiSo='$thang' ";
									$query3=mysqli_query($conn,$sql3);
									$row3=mysqli_fetch_assoc($query3);
									
									$TienNuoc=$row3['TienNuoc'];
									
									$TongTien=$TienDien+$TienNuoc;
									$datetime =date('Y-m-d H:i:s');
									
									$MaHD1=$thang."-".$phong;
				 
									$maphong= date("d",strtotime($MaHD1));
									$thang2 =date("m",strtotime($MaHD1));
									$nam= date("y",strtotime($MaHD1));
									$MaHD2="HD".$maphong.$thang2.$nam;
									

									
									 
									
									
									$sql4="insert into hoadon(SoHoaDon,NgayLap,MaPhong,ThangGhiSo,TongTien)
											values('$MaHD2','$datetime','$phong','$thang','$TongTien')
									";
									
									if(mysqli_query($conn,$sql4))
											echo"<script>alert('Thêm Hóa Đơn Thành Công !');window.location='index.php?page=Them-HD';</script>";
										
									else
										echo"<script>alert('Xảy ra lỗi !');</script>";
									
							}
						}	
						
				 	}
				
			}
			?>
      </div>
      