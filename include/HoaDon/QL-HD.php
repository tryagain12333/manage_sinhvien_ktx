<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />

<div id="content-header">
        <div id="breadcrumb"> <a href="?page=dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="?page=QL-Sv" class="current">Quản Lí Hóa Đơn</a> </div>
    <h1>Quản lí Hóa Đơn</h1>
      </div>
    <!--End-breadcrumbs-->
    
    <!--Action boxes-->
      <div class="container-fluid">
		<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Table Hóa Đơn</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Số Hóa Đơn</th>
                  <th>Tên Phòng </th>
                  <th>Tháng Ghi Số</th>
                  <th>Ngày Lập</th>
                  <th>Điện Năng Tiêu Thụ</th>
                  <th>m3 Tiêu Thụ</th>
                  <th>Tổng Tiền Điện Nước</th>
                  	
                  <th>Xóa</th>
                </tr>
              </thead>
              <tbody>
                
             
                  <?php
                  	$sql="select * from hoadon,phong where  hoadon.MaPhong=phong.MaPhong ";
					$query=mysqli_query($conn,$sql);
					
					while($row=mysqli_fetch_assoc($query)){
						$sql2="select * from dien where MaPhong='".$row['MaPhong']."' and ThangGhiSo='".$row['ThangGhiSo']."'";
                    	$query2=mysqli_query($conn,$sql2);
						$row2=mysqli_fetch_assoc($query2);
						;
                        $TongTienDien=$row2['TienDien'];
						$TongTienDien2=number_format($TongTienDien,0,',','.')." đ";
						
						$sql3="select * from nuoc where MaPhong='".$row['MaPhong']."' and ThangGhiSo='".$row['ThangGhiSo']."'";
                    	$query3=mysqli_query($conn,$sql3);
						$row3=mysqli_fetch_assoc($query3);
						
                       	$TongTienNuoc=$row3['TienNuoc'];
						$TongTienNuoc2=number_format($TongTienNuoc,0,',','.')." đ";
						$TongCong=$TongTienDien+$TongTienNuoc;
						
						$TongCong2=number_format($TongCong,0,',','.')." đ";
						echo "
							 <tr class='gradeU'>
								<th>".$row['SoHoaDon']."</th>
								<th>".$row['TenPhong']."</th>
								<th>".$row['ThangGhiSo']."</th>
								<th>".$row['NgayLap']."</th>
								<th>".$TongTienDien2."</th>
								<th>".$TongTienNuoc2."</th>
								<th>".$TongCong2."</th>
								
								<th><a href='?page=Xoa-HD&&mahd=".$row['SoHoaDon']."' onclick='return deleteAction();'>Xóa</a></th>
							</tr>
						";
							
					}
				  ?>
                
               
                
                
              </tbody>
            </table>  
          </div>
        </div> 
        </div>
        <div class="container-fluid">
        <?php $SumTienDien=0;
				$today=date("Y-m-d");
				
				$ngay= date("d",strtotime($today));
				$thang =date("m",strtotime($today));
				$nam =date("Y",strtotime($today));
				if($ngay<25&&$ngay>=1)
				{
					if($thang==1)
					{
						$thang=12;
						$nam-=1;	
					}
					else
						$thang-=1;
				}
				
				if($thang>9)
					$namthang=$nam."-".$thang;
				else
					$namthang=$nam."-0".$thang;
				
				
				$sql4="select * from dien where ThangGhiSo='$namthang' ";
				$query4=mysqli_query($conn,$sql4);
            	while($row4=mysqli_fetch_assoc($query4))
				{
					 $SumTienDien+=$row4['TienDien'];
					
					
					
				}
				 $SumTienNuoc=0;
				$sql5="select * from nuoc where ThangGhiSo='$namthang' ";
				$query5=mysqli_query($conn,$sql5);
            	while($row5=mysqli_fetch_assoc($query5))
				{
					 $SumTienNuoc+=$row5['TienNuoc'];
					
					
					
				}
					$TongCongDN=$SumTienDien+$SumTienNuoc;	
					$TongCongDN2=number_format($TongCongDN,0,',','.')." đ";
			
											?>
        	<h5>Tổng Tiền Điện Nước Tháng <?php echo $thang?>= <?php echo $TongCongDN2?></h5><br />
            <?php
				$SumHoaDon=0;
				$sql6="select * from hoadon where ThangGhiSo='$namthang'";
				$query6=mysqli_query($conn,$sql6);
            	while($row6=mysqli_fetch_assoc($query6)){
					
					$SumHoaDon+=$row6['TongTien'];
				}
					$SumHoaDon2=number_format($SumHoaDon,0,',','.')." đ";
			?>
            <h5>Tổng Tiền đã thu được tháng <?php echo $thang?> = <?php echo $SumHoaDon2?></h5>
        </div>

        
